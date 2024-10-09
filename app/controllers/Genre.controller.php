<?php

require_once './app/models/Genre.model.php';
require_once './app/views/Genre.view.php';


class GenreController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new GenreModel();
        $this->view = new GenreView();
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
}
