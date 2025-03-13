<?php

namespace App\Core;

class Request
{
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        return parse_url($uri, PHP_URL_PATH);
    }

    public function getBody(): array
    {
        if ($this->getMethod() === 'POST') {
            return $_POST;
        }

        return [];
    }

    public function getParams(): array
    {
        return $_GET;
    }
}
