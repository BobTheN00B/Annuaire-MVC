
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//todo gérer le coeur de l'appli en POO
//Chargement du moteur de template Smarty
require_once('libs/smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'Views/templates/';
$smarty->compile_dir = 'Views/templates_c/';
$smarty->config_dir = 'Views/configs/';
$smarty->cache_dir = 'Views/cache/';
$smarty->assign('isConnected', isset($_SESSION['user']['id']));
$smarty->assign('currentUser', isset($_SESSION['user']) ? $_SESSION['user'] : null);
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$smarty->assign('flash', $flash);

// Routeur (gestion des routes)
require_once __DIR__ . '/core/Route.php';
$route = new Route();
$page = $_GET['page'] ?? '';
$action = $_GET['action'] ?? 'list';

try {
    $routeConfig = $route->resolve($page);

    require 'Controllers/' . $routeConfig['controller'] . '.php';
    $controllerClass = $routeConfig['controller'];
    $ctrl = new $controllerClass();

    if (!method_exists($ctrl, $action)) {
        http_response_code(404);
        //todo: 404
        exit;
    }
// chargement du chemin de la vue dans une variable Smarty
    $smarty->assign('tpl', $routeConfig['template'] . '/' . $action . '.tpl');
    // Chargement du tableau associative des controlleurs pour ma vue.
    $smarty->assign('vue', $ctrl->{$action}());
    $smarty->display('index.tpl');
} catch (RuntimeException $exception) {
    http_response_code(404);

    echo 'Page introuvable';

}