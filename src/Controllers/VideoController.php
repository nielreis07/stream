<?php 

namespace App\Controllers;

use App\Core\Database;
use PDOException;
use App\Entity\UsuarioEntity;
use PDO;

class VideoController
{
    public static function listarVideos()
    {
        $sql = 'SELECT * FROM video';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function buscarPorId($id)
    {
        $sql = 'SELECT * FROM video WHERE id = :id';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function buscarVideoPorTitulo($titulo)
    {
        $sql = 'SELECT * FROM video WHERE nome LIKE :titulo';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':titulo', "%$titulo%");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function atualizar($video)
    {
        try {
            $sql = "UPDATE video SET 
                nome = :nome, 
                descricao = :descricao,
                url = :url, 
                categoria = :categoria
                 WHERE id = :id";

            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':nome', $video->getNome());
            $stmt->bindValue(':descricao', $video->getDescricao());
            $stmt->bindValue(':url', $video->getUrl());
            $stmt->bindValue(':categoria', $video->getCategoria());
            $stmt->bindValue(':id', $video->getId());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function salvar($video)
    {
        try{
            $sql = "INSERT INTO video (nome, descricao, url, id) VALUES (:nome, :descricao, :url, :id)";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':nome', $video->getNome());
            $stmt->bindValue(':descricao', $video->getDescricao());
            $stmt->bindValue(':url', $video->getUrl());
            $stmt->bindValue(':id', $video->getId());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function deletar($id)
    {
        try {
            $sql = "DELETE FROM video WHERE id = :id";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function adicionar($video)
    {
        try {
            $sql = "INSERT INTO video (nome, descricao, url, id) VALUES (:nome, :descricao, :url, :id)";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':nome', $video->getNome());
            $stmt->bindValue(':descricao', $video->getDescricao());
            $stmt->bindValue(':url', $video->getUrl());
            $stmt->bindValue(':id', $video->getId());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}