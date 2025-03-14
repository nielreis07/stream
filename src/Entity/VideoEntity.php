<?php

namespace Strem\Src\Entity;

class VideoEntity
{
    private $id;
    private $url;
    private $titulo;
    private $descricao;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        if (strlen($url) < 2 || strlen($url) > 255) {
            throw new \Exception("Url inválida", 422);
        }

        $this->url = $url;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo)
    {
        if (strlen($titulo) < 2 || strlen($titulo) > 100) {
            throw new \Exception("Título inválido", 422);
        }
        $this->titulo = $titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        if (strlen($descricao) < 2 || strlen($descricao) > 255) {
            throw new \Exception("Descrição inválida", 422);
        }
        $this->descricao = $descricao;
    }
}
