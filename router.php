<?php

require_once './app/controllers/Genre.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
        //case 'home':
        //$controller = new BookController()
        // $controller->showBooks()
        // case 'details':
        //$controller = new BookController()
        //$controller->bookByDetails($params[1])
    case 'genres':
        $controller = new GenreController();
        $controller->showGenres();
        break;
    case 'booksByGenre':
        $controller = new GenreController();
        $controller->showBooksByGenre($params[1]);
        break;
    default:
        echo "404 Page Not Found"; // corregir esto
        break;
}
