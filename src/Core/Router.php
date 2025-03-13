<?php

namespace App\Core;

class Router
{
    protected array $routes = [];
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $uri, array $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, array $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $uri = trim($this->request->getPath(), '/');

        foreach ($this->routes[$method] as $route => $action) {
            // Substitui parâmetros obrigatórios e opcionais corretamente
            $routePattern = preg_replace('/\{([^\}\/\?]+)\?\}/', '([^/]+)?', trim($route, '/'));
            $routePattern = preg_replace('/\{([^\}\/]+)\}/', '([^/]+)', $routePattern);
            $routePattern = "#^" . $routePattern . "$#";

            if (preg_match($routePattern, $uri, $matches)) {
                array_shift($matches); // Remove a string completa da URL

                // Garante que parâmetros opcionais ausentes sejam passados como null
                $matches = array_map(fn($param) => $param ?: null, $matches);

                [$controller, $method] = $action;
                $controller = new $controller();
                
                // Passa a requisição e os parâmetros capturados
                echo call_user_func_array([$controller, $method], array_merge([new Request()], $matches));
                return;
            }
        }

        http_response_code(404);
        echo "404 - Página não encontrada";
    }


}
