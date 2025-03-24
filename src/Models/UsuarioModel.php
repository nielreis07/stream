<?php

namespace App\Models;

use App\Core\Database;
use PDOException;
use App\Entity\UsuarioEntity;
use PDO;

class UsuarioModel
{

    public static function buscarPorEmail($email)
    {
        try {

        $sql = 'SELECT * FROM usuario WHERE email = :email';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
    public static function listarUsuario(): array
    {
        try {

            $sql = 'SELECT * FROM usuario';
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function buscarUsuarioPorNome($nome)
    {
        $sql = 'SELECT * FROM usuario WHERE nome LIKE :nome';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':nome', "%$nome%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function atualizar($usuario)
    {
        try {
            $sql = "UPDATE usuario SET 
                    nome = :nome, 
                    usuario = :usuario,
                    email = :email";

            if (!empty($usuario->getSenha())) {

                $sql .= 'senha = :senha';
            }
            $sql .= ' WHERE id = :id';

            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':usuario', $usuario->getUsuario());
            $stmt->bindValue(':email', $usuario->getEmail());

            if (!empty($usuario->getSenha())) {
                $stmt->bindValue(':senha', password_hash($usuario->getSenha(), PASSWORD_BCRYPT));
            }

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
            $stmt->bindValue(':senha', password_hash($usuario->getSenha(), PASSWORD_BCRYPT));
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
