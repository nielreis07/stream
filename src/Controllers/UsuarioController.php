<?php

namespace App\Controllers;

use App\Core\FlashMessage;
use App\Core\Request;
use App\Core\View;
use App\Models\UsuarioModel;
use App\Entity\UsuarioEntity;

class UsuarioController
{
    public function index()
    {
        try {
            $usuarios = UsuarioModel::listarUsuario();
            
            $dadosView = [];
            if (FlashMessage::get('mensagem')) {
                $dadosView['mensagem'] = FlashMessage::get('mensagem');
                FlashMessage::clear('mensagem');
            }

            $dadosView['usuarios'] = $usuarios;

            return View::render('usuario.index', $dadosView, 'adm');
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function cadastrar($request, $id = null)
    {
        $dadosParaView = [];
        if (!empty($id)) {
            $dadosParaView = UsuarioModel::buscarPorId($id);
        }
        $dadosView = ['dados' => $dadosParaView];
        
        if (FlashMessage::get('mensagem')) {
            $dadosView['mensagem'] = FlashMessage::get('mensagem');
            FlashMessage::clear('mensagem');
        } 

        return View::render('usuario.cadastrar', $dadosView, 'adm');
    }

    public function pesquisa($request)
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

    public function salvar(Request $request)
    {
        $post = $request->getBody();
        $id = $post['id']?? null;

        try{
            $usuario = new UsuarioEntity();
            $usuario->setId((int) $post['id']);
            $usuario->setUsuario($post['usuario']);
            $usuario->setNome($post['nome']);
            $usuario->setEmail($post['email']);
            $usuario->setSenha($post['senha']);
    
            if (!empty($id)) {
                UsuarioModel::atualizar($usuario);
                FlashMessage::set('mensagem', 'Alteração realizada com sucesso');
                return header('Location: /usuario/cadastrar/' . $id);
            } else {
                UsuarioModel::adicionar($usuario);
                FlashMessage::set('mensagem', 'cadastro realizado com sucesso');
                return header('Location: /usuario');
            }

        } catch (\Exception $e) {
            FlashMessage::set('mensagem', $e->getMessage(), 'danger');
            return header('Location: /usuario');
        }
    }

    public function excluir(Request $request, int $id)
    {
        if (UsuarioModel::deletar($id)) {
            FlashMessage::set('mensagem', 'Usuário excluído com sucesso');
            header('Location: /usuario');
            exit;
        }

        FlashMessage::set('mensagem', 'Erro ao excluir usuário');
        return View::render('usuario.index', ['usuarios' => UsuarioModel::listarUsuario()], 'adm');
    }
}
