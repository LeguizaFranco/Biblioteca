<?php

require_once './app/controllers/Book.controller.php';

class BookView
{
    private $user = null;

    public function __construct($user)
    {
        $this->user = $user;
    }


    public function showBooks($books)
    {
        require './templates/booksList.phtml';
    }

    public function showBookById($book)
    {
        require './templates/bookDetail.phtml';
    }

    public function showError($message)
    {
        require './templates/error.phtml';
    }

    public function showAddBook($genres, $errors = '')
    {
        require './templates/formAddBook.phtml';
    }
    public function showUpdateBook($book, $genres, $errors = '')
    {
        require './templates/formUpdateBook.phtml';
    }
}
