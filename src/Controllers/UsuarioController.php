<?php

namespace App\Controllers;

use App\Core\FlashMessage;
use App\Core\View;
use App\Models\UsuarioModel;
use strem\Entity\UsuarioEntity;

class UsuarioController
{
    public function index()
    {
        try {
            $usuarios = UsuarioModel::listarUsuario();
            return View::render('usuario.index', ['usuarios' => $usuarios], 'adm');
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function cadastroUsuario($request, $id = null)
    {
        $dadosParaView = [];
        if (!empty($id)) {
            $dadosParaView = UsuarioModel::buscarPorId($id);
        }
        $dadosView = ['dados' => $dadosParaView];

        return View::render('usuario.cadastrar', $dadosView, 'adm');
    }

    public function pesquisaUsuario($request)
    {
        $post = $request->getBody();
        $termo = $post['termo'] ?? null;
        $usuarios = [];

        if (empty($termo)) {
            $usuarios = UsuarioModel::listarUsuario();
            return View::render('usuario.index', ['usuarios' => $usuarios], 'adm');
        }

        $usuarios = UsuarioModel::buscarUsuarioPorNome($termo);
        return View::render('usuario.index', ['usuarios' => $usuarios], 'adm');
    }

    public function salvarUsuario($request)
    {
        $post = $request->getBody();
        $id = $post['id']?? null;

        try{
            $usuario = new UsuarioEntity();
            $usuario->setId((int) $post['id']);
            $usuario->setNome($post['nome']);
            $usuario->setEmail($post['email']);
            $usuario->setSenha($post['senha']);

            if (UsuarioModel::atualizar($usuario)) {
                return View::render('usuario.index', ['usuarios' => UsuarioModel::listarUsuario()], 'adm');
            }
            
            FlashMessage::set('mensagem', 'Erro ao salvar usuário');
            return View::render('usuario.cadastrar', ['dados' => $usuario], 'adm');

        } catch (\Exception $e) {
            FlashMessage::set('mensagem', $e->getMessage(), 'danger');
            return header('Location: /usuario/' . $id);
        }
    }

    public function excluirUsuario($request)
    {
        $post = $request->getBody();
        $id = $post['id'] ?? null;

        if (UsuarioModel::deletar($id)) {
            return View::render('usuario.index', ['usuarios' => UsuarioModel::listarUsuario()], 'adm');
        }

        FlashMessage::set('mensagem', 'Erro ao excluir usuário');
        return View::render('usuario.index', ['usuarios' => UsuarioModel::listarUsuario()], 'adm');
    }
}
