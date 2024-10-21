<?php
require_once 'libs/Response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';
require_once './app/controllers/Book.controller.php';
require_once './app/controllers/Genre.controller.php';
require_once './app/controllers/Auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

$action = 'home'; // accion por defecto

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        $controller = new BookController($res);
        $controller->showBooks();
        break;
    case 'addBook':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new BookController($res);
        $controller->addBook();
        break;
    case 'updateBook':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new BookController($res);
        $controller->updateBook($params[1]);
        break;
    case 'deleteBook':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new BookController($res);
        $controller->deleteBook($params[1]);
        break;
    case 'bookDetail':
        sessionAuthMiddleware($res);
        $controller = new BookController($res);
        $controller->showBookById($params[1]);
        break;
    case 'genres':
        sessionAuthMiddleware($res);
        $controller = new GenreController($res);
        $controller->showGenres();
        break;
    case 'addGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new GenreController($res);
        $controller->addGenre();
        break;
    case 'updateGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new GenreController($res);
        $controller->updateGenre($params[1]);
        break;
    case 'deleteGenre':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new GenreController($res);
        $controller->deleteGenre($params[1]);
        break;
    case 'booksByGenre':
        sessionAuthMiddleware($res);
        $controller = new GenreController($res);
        $controller->showBooksByGenre($params[1]);
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        echo "404 Page Not Found";
        break;
}
