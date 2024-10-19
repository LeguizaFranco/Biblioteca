<?php
require_once 'controllers/item.controller.php';

// Ruta para el listado de ítems
if ($_SERVER['REQUEST_URI'] == '/items') {
    $controller = new ItemController();
    $items = $controller->ListarItems();
    require 'views/list_items.phtml';
}

// Ruta para el detalle de ítems
if (preg_match('/^\/item\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = $matches[1];
    $controller = new ItemController();
    $item = $controller->DetalleItem($id);
    require 'views/item.detail.phtml'; // Asegúrate de que esta ruta sea correcta
}

// Ruta para el login
if ($_SERVER['REQUEST_URI'] == '/login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aquí debes definir la lógica para verificar las credenciales del usuario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales (esto es solo un ejemplo simple)
    if ($username === 'webadmin' && $password === 'admin') {
        // Iniciar sesión
        session_start();
        $_SESSION['user'] = $username;
        header('Location: /dashboard'); // Redirigir a la página de administración
        exit();
    } else {
        // Manejar credenciales incorrectas
        echo "Credenciales incorrectas.";
    }
}
?>
