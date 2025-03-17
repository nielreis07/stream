<?php 

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class VideoModel 
{
        public static function cadastrar($video)
    {
        try {
            $sql = "INSERT INTO video (titulo, descricao, url, id) VALUES (:titulo, :descricao, :url, :id)";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':titulo', $video->getTitulo());
            $stmt->bindValue(':descricao', $video->getDescricao());
            $stmt->bindValue(':url', $video->getUrl());
            $stmt->bindValue(':id', $video->getId());
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public static function buscarPorId($id)
    {
        $sql = 'SELECT * FROM video WHERE id = :id';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    
    public static function listarVideos()
    {
        $sql = 'SELECT * FROM video';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function buscarVideoPorTitulo($titulo)
    {
        $sql = 'SELECT * FROM video WHERE nome LIKE :titulo';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':titulo', "%$titulo%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function editar($video)
    {
        try {
            $sql = "UPDATE video SET 
                    titulo = :titulo, 
                    descricao = :descricao,
                    url = :url
                 WHERE id = :id";

            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':titulo', $video->getTitulo());
            $stmt->bindValue(':descricao', $video->getDescricao());
            $stmt->bindValue(':url', $video->getUrl());
            $stmt->bindValue(':id', $video->getId());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function excluir($id)
    {
        try {
            $sql = "DELETE FROM video WHERE id = :id";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}