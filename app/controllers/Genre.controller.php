<?php

require_once './app/models/Genre.model.php';
require_once './app/views/Genre.view.php';


class GenreController
{
    private $model;
    private $view;

    public function __construct($res)
    {
        $this->model = new GenreModel();
        $this->view = new GenreView($res->user);
    }

    public function showGenres()
    {
        $genres = $this->model->getGenres();
        if (isset($genres) && !empty($genres)) {
            $this->view->showGenres($genres);
        } else {
            $this->view->showError("No se encontraron géneros disponibles.");
        }
    }

    public function showBooksByGenre($id_genero)
    {
        if (!is_numeric($id_genero) || $id_genero <= 0) {
            $this->view->showError("ID de genero inválido");
            return;
        }
        $result = $this->model->getBooksByGenre($id_genero);

        if ((!empty($result['libros']) || (!empty($result['genero']->genero)))) {
            $this->view->showBooksByGenre($result);
        } else {
            $this->view->showError("No hay libros disponibles para el género seleccionado.");
        }
    }
    public function addGenre()
    {
        // Inicializar un array para los errores
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar genero
            $genero = trim($_POST['genero']);
            if (empty($genero)) {
                $errors['genero'] = 'El título es obligatorio.';
            } elseif (strlen($genero) > 255) {
                $errors['genero'] = 'El título no puede exceder los 255 caracteres.';
            }

            // Validar descripción
            $descripcion = trim($_POST['descripcion']);
            if (empty($descripcion)) {
                $errors['descripcion'] = 'La descripción es obligatoria.';
            }

            // Validar generos relacionados
            $generos_relacionados = trim($_POST['generos_relacionados']);
            if (empty($generos_relacionados)) {
                $errors['generos_relacionados'] = 'Falta completar generos relacionados.';
            }

            // Validar nivel de popularidad
            $nivel_popularidad = trim($_POST['nivel_popularidad']);
            if (empty($nivel_popularidad)) {
                $errors['nivel_popularidad'] = 'El nivel de popularidad es obligatorio.';
            } elseif (!is_numeric($nivel_popularidad) || $nivel_popularidad < 1 || $nivel_popularidad > 11) {
                $errors['nivel_popularidad'] = 'El nivel de popularidad debe ser un número válido entre 1 y 10';
            }

            // Solo insertar el genero si no hay errores
            if (empty($errors)) {
                $this->model->insertGenre($genero, $descripcion, $generos_relacionados, $nivel_popularidad);
                header('Location: genres');
            }
        }
        // Mostrar formulario (con o sin errores)
        $this->view->showAddGenre($errors);
    }

    public function updateGenre($id_genero)
    {
        $genre = $this->model->getGenreById($id_genero);

        // Inicializar un array para los errores
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar genero
            $genero = trim($_POST['genero']);
            if (empty($genero)) {
                $errors['genero'] = 'El título es obligatorio.';
            } elseif (strlen($genero) > 255) {
                $errors['genero'] = 'El título no puede exceder los 255 caracteres.';
            }

            // Validar descripción
            $descripcion = trim($_POST['descripcion']);
            if (empty($descripcion)) {
                $errors['descripcion'] = 'La descripción es obligatoria.';
            }

            // Validar generos relacionados
            $generos_relacionados = trim($_POST['generos_relacionados']);
            if (empty($generos_relacionados)) {
                $errors['generos_relacionados'] = 'Falta completar generos relacionados.';
            }

            // Validar nivel de popularidad
            $nivel_popularidad = trim($_POST['nivel_popularidad']);
            if (empty($nivel_popularidad)) {
                $errors['nivel_popularidad'] = 'El nivel de popularidad es obligatorio.';
            } elseif (!is_numeric($nivel_popularidad) || $nivel_popularidad < 0 || $nivel_popularidad > 11) {
                $errors['nivel_popularidad'] = 'El nivel de popularidad debe ser un número válido entre 1 y 10';
            }

            // Solo insertar el genero si no hay errores
            if ($genre && empty($errors)) {
                $this->model->updateGenre($genero, $descripcion, $generos_relacionados, $nivel_popularidad, $id_genero);
                header('Location: ' . BASE_URL);
            }
        }
        // Mostrar formulario (con o sin errores)
        $this->view->showUpdateGenre($genre, $errors);
    }

    public function deleteGenre($id_genero)
    {
        // Validar si el género tiene libros asociados
        $totalBooks = $this->model->hasBooks($id_genero);

        if ($totalBooks > 0) {
            // Si hay libros asociados, mostrar un mensaje de error

            $this->view->showError("No se puede eliminar el género. Hay $totalBooks libro(s) asociado(s) a este.");
        } else {
            // Si no hay libros asociados, eliminar el género

            $this->model->deleteGenre($id_genero);

            header('Location: ' . BASE_URL);
        }
    }
}
