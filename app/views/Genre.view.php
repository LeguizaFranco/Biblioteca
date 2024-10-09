<?php

require_once './app/controllers/Genre.controller.php';

class GenreView
{

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
}
