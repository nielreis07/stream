<?php 

namespace App\Controllers;

use App\Core\FlashMessage;
use App\Core\View;
use App\Models\UsuarioModel;

class LoginController
{
    public function login()
    {
        return View::render('usuario.login', [], 'adm');
    }

    public function autenticar()
    {
        try {
            session_regenerate_id(true);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = trim($_POST['email']);
                $senha = trim($_POST['senha']);
                
                if (empty($email) || empty($senha)) {
                    FlashMessage::set('mensagem', 'Preencha todos os campos!');
                    return View::render('usuario.login', ['mensagem' => FlashMessage::get('mensagem')], 'adm');
                }
    
                $usuario = UsuarioModel::buscarPorEmail($email);
                if (!$usuario || !password_verify($senha, $usuario['senha'])) {
                    FlashMessage::set('mensagem', 'E-mail ou senha inválidos!');
                    return View::render('usuario.login', ['mensagem' => FlashMessage::get('mensagem')], 'adm');
                }
    
                $_SESSION['usuario'] = $usuario;

                FlashMessage::clear('mensagem');
                header('Location: /home');
                exit;
            }
    
            return View::render('usuario.login', [], 'adm');
        } catch (\Exception $e) {
            dd($e->getMessage());
            error_log($e->getMessage());
            FlashMessage::set('mensagem', 'Ocorreu um erro ao tentar fazer login.', 'danger');
            return View::render('usuario.login', ['mensagem' => FlashMessage::get('mensagem')], 'adm');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
