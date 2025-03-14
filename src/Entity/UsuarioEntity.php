<?php

namespace strem\Entity;

class UsuarioEntity
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        if (strlen($nome) < 2 || strlen($nome) > 50) {
            throw new \Exception("Nome inválido", 422);
        }

        $this->nome = $nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Email inválido", 422);
        }

        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha)
    {
        if (strlen($senha) < 6 || strlen($senha) > 50) {
            throw new \Exception("Senha inválida", 422);
        }

        $this->senha = $senha;
    }
}

