<?php

require_once './app/controllers/Genre.controller.php';

class GenreView
{
    private $user = null;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function showGenres($genres)
    {
        require './templates/genresList.phtml';
    }

    public function showBooksByGenre($result)
    {
        require './templates/booksByGenre.phtml';
    }

    public function showError($message)
    {
        require './templates/error.phtml';
    }

    public function showAddGenre($errors)
    {
        require './templates/formAddGenre.phtml';
    }

    public function showUpdateGenre($genre, $errors)
    {
        require './templates/formUpdateGenre.phtml';
    }
}
