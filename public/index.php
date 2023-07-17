<?php
// Incluir el archivo de configuración
//require_once 'config/config.php';

// Incluir el archivo de enrutamiento
//require_once 'router.php';



// Obtener la ruta actual


$route = $_SERVER['REQUEST_URI'];
$route = str_replace('/proyectoWeb3/public', '', $route);
// Enrutamiento


switch ($route) {
    case '/':
        if (
    isset($_COOKIE['projectManagerCookies']) &&
    isset($_COOKIE['userid_cookie']) &&
    in_array($route, ['/', '/login', '/register'])
) {
            // Redirigir al usuario a la página "app"
            header('Location: http://localhost/proyectoWeb3/public/app');
            exit; 
        }

        // Cargar el controlador de página de inicio
        require_once('../app/Controllers/homeController.php');
        $controller = new HomeController();
        $controller->index();
        break;
    case '/login':
        if (
    isset($_COOKIE['projectManagerCookies']) &&
    isset($_COOKIE['userid_cookie']) &&
    in_array($route, ['/', '/login', '/register'])
) {
            // Redirigir al usuario a la página "app"
            header('Location: http://localhost/proyectoWeb3/public/app');
            exit; 
        }
        // Cargar el controlador de página de login
        require_once('../app/Controllers/loginController.php');
        $controller = new LoginController();
        $controller->index();  
        break;
    case '/register':
        if (
    isset($_COOKIE['projectManagerCookies']) &&
    isset($_COOKIE['userid_cookie']) &&
    in_array($route, ['/', '/login', '/register'])
) {
            // Redirigir al usuario a la página "app"
            header('Location: http://localhost/proyectoWeb3/public/app');
            exit; 
        }
        // Cargar el controlador de página de login
        require_once('../app/Controllers/registerController.php');
        $controller = new RegisterController();
        $controller->index();  
        break;
    case '/app':

        // Obtener el segundo argumento de la URL
        $args = explode('/', $route);
        $action = isset($args[2]) ? $args[2] : 'home';

        // Llamar al método correspondiente en base al segundo argumento
        if ($action === 'task') {
            loadAppControllerApp()->task();

        } elseif($action == "/" || $action =="home") {
            loadAppControllerApp()->home();
        }
        break;

        case strpos($route, '/app/') === 0:
            $pathAfterApp = substr($route, strlen('/app/'));
            require_once('../app/Controllers/appGroupController.php');
            $controller = new AppGroupController();
            $controller->home($pathAfterApp);

        break;

    default:
        // Cargar el controlador de página de error 404
        //    require_once 'controllers/errorController.php';
        //  $controller = new ErrorController();
        //      $controller->index();
    //    echo "Location: http://localhost/proyectoWeb3/public/app";
        require_once '../app/View/page404.html';

        break;
}

function loadAppControllerApp() {
    require_once('../app/Controllers/appController.php');
    $controller = new AppController();
    return $controller;
}
