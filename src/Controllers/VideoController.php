<?php 

namespace App\Controllers;

use App\Core\Database;
use App\Core\FlashMessage;
use App\Core\Request;
use App\Core\View;
use PDOException;
use App\Entity\UsuarioEntity;
use App\Entity\VideoEntity;
use App\Models\VideoModel;
use Exception;
use PDO;
use Strem\Src\Entity\Video;

class VideoController
{

    public function index()
    {
        try {
            $videos = VideoModel::listarVideos();
            return View::render('video.index', ['videos' => $videos], 'adm');
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function cadastrar(Request $request)
    {
        try {
            if ($request->getMethod() === 'POST') {
                $post = $request->getBody();

                $video = new VideoEntity();
                $video->setTitulo($post['titulo']);
                $video->setDescricao($post['descricao']);
                $video->setUrl($post['url']);

                VideoModel::cadastrar($video);
                FlashMessage::set('mensagem', 'Vídeo cadastrado com sucesso!');
                return header('Location: /video');
            }

            return View::render('video.cadastrar', [
                'action' => '/video/cadastrar'
            ], 'adm');
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function excluir(Request $request, ?int $id)
    {
        try {
            VideoModel::excluir($id);
            FlashMessage::set('mensagem', 'Cliente excluído com sucesso!');
            return header('Location: /video');
        } catch (Exception $e) {
            FlashMessage::set('mensagem', $e->getMessage(), 'danger');
            return header('Location: /video');
        }
    }

    public function editar(Request $request, int $id)
    {
        try {
            if ($request->getMethod() === 'POST') {
                $post = $request->getBody();

                $video = new VideoEntity();
                $video->setId($id);
                $video->setTitulo($post['titulo']);
                $video->setDescricao($post['descricao']);
                $video->setUrl($post['url']);

                VideoModel::editar($video);
                FlashMessage::set('mensagem', 'Vídeo editado com sucesso!');
                return header('Location: /video');
            }

            $video = VideoModel::buscarPorId($id);
            return View::render('video.cadastrar', [
                'action' => '/video/editar/' . $id,
                'video' => $video
            ], 'adm');
        } catch (Exception $e) {
            FlashMessage::set('mensagem', $e->getMessage(), 'danger');
            return header('Location: /video/editar/');
        }
    }
    
}