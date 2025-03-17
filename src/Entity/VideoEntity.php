<?php

namespace App\Entity;

class VideoEntity {
   private $id;
    private $titulo;
    private $descricao;
    private $url;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getUrl(): mixed {
        return $this->url;
    }    public function setUrl($url) {
        $this->url = $url;
    }
}