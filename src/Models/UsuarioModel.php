<?php

namespace App\Models;

use App\Core\Database;
use PDOException;
use App\Entity\UsuarioEntity;
use PDO;

class UsuarioModel
{


    public static function listarUsuario(): array
    {
        try {

            $sql = 'SELECT * FROM usuario';
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function buscarPorId($id)
    {
        $sql = 'SELECT * FROM usuario WHERE id = :id';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function buscarUsuarioPorNome($nome)
    {
        $sql = 'SELECT * FROM usuario WHERE nome LIKE :nome';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':nome', "%$nome%");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function atualizar($usuario)
    {
        try {
            $sql = "UPDATE usuario SET 
                    nome = :nome, 
                    usuario = :usuario,
                    email = :email, 
                    senha = :senha
                    WHERE id = :id";

            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':usuario', $usuario->getUsuario());
            $stmt->bindValue(':email', $usuario->getEmail());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->bindValue(':id', $usuario->getId());
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
            $sql = "DELETE FROM usuario WHERE id = :id";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function adicionar($usuario)
    {
        try {
            $sql = "INSERT INTO usuario (nome, usuario, email, senha) VALUES (:nome, :usuario, :email, :senha)";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':usuario', $usuario->getUsuario());
            $stmt->bindValue(':email', $usuario->getEmail());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
