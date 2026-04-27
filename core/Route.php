<?php

class Route
{
    private array $routes;

    public function __construct()
    {
        $this->routes = [
            'accueil' => ['controller' => 'HomeController', 'template' => 'Accueil'],
            'analyse' => ['controller' => 'AnalyseController', 'template' => 'Analyse'],
            'categorie' => ['controller' => 'CategoryController', 'template' => 'Categorie'],
            'utilisateur' => ['controller' => 'UserController', 'template' => 'Utilisateur'],
            'site' => ['controller' => 'SiteController', 'template' => 'Site'],
            '' => ['controller' => 'HomeController', 'template' => 'Accueil'],
        ];
    }

    public function resolve(?string $page): array
    {
        $key = strtolower(trim((string) $page));
        if (!array_key_exists($key, $this->routes)) {
            http_response_code(404);
            throw new RuntimeException('Page introuvable');
        }

        return $this->routes[$key];
    }
}