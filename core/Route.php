<?php

class Route
{
    private array $routes;

    public function __construct()
    {
        $this->routes = [
            'accueil' => ['controller' => 'HomeController', 'template' => 'Accueil', 'defaultAction' => 'list'],
            'analyse' => ['controller' => 'AnalyseController', 'template' => 'Analyse', 'defaultAction' => 'check'],
            'categorie' => ['controller' => 'CategoryController', 'template' => 'Categorie', 'defaultAction' => 'list'],
            'utilisateur' => ['controller' => 'UserController', 'template' => 'Utilisateur', 'defaultAction' => 'list'],
            'site' => ['controller' => 'SiteController', 'template' => 'Site', 'defaultAction' => 'list'],
            '' => ['controller' => 'HomeController', 'template' => 'Accueil', 'defaultAction' => 'list'],
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
    
    public function resolveAction(array $routeConfig, ?string $action): string
    {
        $candidate = strtolower(trim((string) $action));
        if ($candidate === '') {
            return $routeConfig['defaultAction'];
        }

        return $candidate;
    }

    public function dispatch(array $routeConfig, string $action)
    {
        require_once __DIR__ . '/../Controllers/' . $routeConfig['controller'] . '.php';

        $controllerClass = $routeConfig['controller'];
        $controller = new $controllerClass();

        $resolvedAction = $this->resolveControllerMethod($controller, $action);
        if ($resolvedAction === null) {
            http_response_code(404);
            throw new RuntimeException('Action introuvable');
        }

        $data = $controller->{$resolvedAction}();
        if ($data === null) {
            return null;
        }

        return [
            'template' => $routeConfig['template'] . '/' . $resolvedAction . '.tpl',
            'data' => $data,
        ];
    }
    private function resolveControllerMethod(object $controller, string $action): ?string
    {
        foreach (get_class_methods($controller) as $method) {
            if (strtolower($method) === $action) {
                return $method;
            }
        }

        return null;
    }
}