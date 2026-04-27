
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//todo gérer le coeur de l'appli en POO
//Chargement du moteur de template Smarty
session_start();

require_once __DIR__ . '/libs/smarty/Smarty.class.php';
require_once __DIR__ . '/core/Route.php';

$smarty = new Smarty();
$smarty->template_dir = 'Views/templates/';
$smarty->compile_dir = 'Views/templates_c/';
$smarty->config_dir = 'Views/configs/';
$smarty->cache_dir = 'Views/cache/';

// Routeur (gestion des routes)
$page = $_GET['page'] ?? 'accueil';
$action = $_GET['action'] ?? 'list';

try {
    $route = (new Route())->resolve($page);
    $controllerClass = $route['controller'];
    $templateFolder = $route['template'];

    require_once __DIR__ . '/Controllers/' . $controllerClass . '.php';
    $controller = new $controllerClass();

    if (!method_exists($controller, $action)) {
        http_response_code(404);
        //todo: 404
        throw new RuntimeException('Action introuvable');
    }
$smarty->assign('tpl', $templateFolder . '/' . $action . '.tpl');
    $smarty->assign('vue', $controller->{$action}());
    $smarty->assign('isConnected', isset($_SESSION['user']));
    $smarty->display('index.tpl');
} catch (Throwable $e) {
    http_response_code(http_response_code() === 200 ? 500 : http_response_code());
    echo '<h1>Erreur</h1><p>' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}
 