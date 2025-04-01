<?php 

namespace App\Controllers;

use App\Core\FlashMessage;
use App\Core\View;
use App\Models\UsuarioModel;

class LoginController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        return View::render('usuario.login', [], 'adm');
    }

    public function autenticar()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
                $senha = trim($_POST['senha']);
                
                if (!$email || empty($senha)) {
                    FlashMessage::set('mensagem', 'Preencha todos os campos corretamente!', 'danger');
                    return View::render('usuario.login', ['mensagem' => FlashMessage::get('mensagem')], 'adm');
                }
    
                $usuario = UsuarioModel::buscarPorEmail($email);
                if (!$usuario || !isset($usuario['senha']) || !password_verify($senha, $usuario['senha'])) {
                    FlashMessage::set('mensagem', 'E-mail ou senha inválidos!', 'danger');
                    return View::render('usuario.login', ['mensagem' => FlashMessage::get('mensagem')], 'adm');
                }
    
                $_SESSION['usuario'] = $usuario;
    
                FlashMessage::clear('mensagem');
                header('Location: /home');
                exit;
            }
    
            return View::render('usuario.login', [], 'adm');
        } catch (\Exception $e) {
            error_log($e->getMessage());
            FlashMessage::set('mensagem', 'Ocorreu um erro ao tentar fazer login.', 'danger');
            return View::render('usuario.login', ['mensagem' => FlashMessage::get('mensagem')], 'adm');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
