<?php
require_once './app/models/Book.model.php';
require_once './app/models/Genre.model.php';
require_once './app/views/Book.view.php';

class BookController
{

    private $model;
    private $view;

    public function __construct($res)
    {
        $this->model = new BookModel();
        $this->view = new BookView($res->user);
    }
    public function showBooks()
    {
        $books = $this->model->getBooks();
        if (isset($books) && !empty($books)) {
            $this->view->showBooks($books);
        } else {
            $this->view->showError("No se encontraron libros disponibles.");
        }
    }
    public function showBookById($id)
    {
        // Verificar si el ID es numérico y válido
        if (!is_numeric($id) || $id <= 0) {
            $this->view->showError("ID de libro inválido");
            return;
        }

        // Obtener el libro por ID
        $book = $this->model->getBookById($id);

        // Verificar si se encontró el libro
        if ($book) {
            $this->view->showBookById($book);
        } else {
            $this->view->showError("No hay libro disponible para el ID seleccionado.");
        }
    }

    public function addBook()
    {
        $genresModel = new GenreModel();

        $genres = $genresModel->getGenres();

        // Inicializar un array para los errores
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar título
            $title = trim($_POST['title']);
            if (empty($title)) {
                $errors['title'] = 'El título es obligatorio.';
            } elseif (strlen($title) > 255) {
                $errors['title'] = 'El título no puede exceder los 255 caracteres.';
            }

            // Validar sinopsis
            $sinopsis = trim($_POST['sinopsis']);
            if (empty($sinopsis)) {
                $errors['sinopsis'] = 'La sinopsis es obligatoria.';
            }

            // Validar autor
            $autor = trim($_POST['autor']);
            if (empty($autor)) {
                $errors['autor'] = 'El autor es obligatorio.';
            } elseif (strlen($autor) > 100) {
                $errors['autor'] = 'El autor no puede exceder los 100 caracteres.';
            }

            // Validar año de publicación
            $anio = trim($_POST['anio']);
            if (empty($anio)) {
                $errors['anio'] = 'El año de publicación es obligatorio.';
            } elseif (!is_numeric($anio) || $anio < 1900 || $anio > date("Y")) {
                $errors['anio'] = 'El año de publicación debe ser un número válido entre 1900 y el año actual.';
            }

            // Validar id_genero
            $id_genero = $_POST['id_genero'];
            if (empty($id_genero)) {
                $errors['id_genero'] = 'Debes seleccionar un género.';
            }

            // Validar la imagen url
            $imagen_url = $_POST['imagen_url'];
            if (empty($imagen_url)) {
                $errors['imagen_url'] = 'Debes agregar una imagen.';
            }

            // Verifica si la URL de la imagen es válida
            if (!filter_var($imagen_url, FILTER_VALIDATE_URL)) {
                $errors[] = "La URL de la imagen no es válida.";
            }

            // Solo insertar el libro si no hay errores
            if (empty($errors)) {
                $this->model->insertBook($title, $sinopsis, $autor, $anio, $id_genero, $imagen_url);
                header('Location: ' . BASE_URL);
            }
        }
        // Mostrar formulario (con o sin errores)
        $this->view->showAddBook($genres, $errors);
    }

    public function updateBook($id)
    {
        $genresModel = new GenreModel();

        $genres = $genresModel->getGenres();

        $bookId = $this->model->getBookById($id);

        // Inicializar un array para los errores
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar título
            $titulo = trim($_POST['titulo']);
            if (empty($titulo)) {
                $errors['titulo'] = 'El título es obligatorio.';
            } elseif (strlen($titulo) > 255) {
                $errors['titulo'] = 'El título no puede exceder los 255 caracteres.';
            }

            // Validar sinopsis
            $sinopsis = trim($_POST['sinopsis']);
            if (empty($sinopsis)) {
                $errors['sinopsis'] = 'La sinopsis es obligatoria.';
            }

            // Validar autor
            $autor = trim($_POST['autor']);
            if (empty($autor)) {
                $errors['autor'] = 'El autor es obligatorio.';
            } elseif (strlen($autor) > 100) {
                $errors['autor'] = 'El autor no puede exceder los 100 caracteres.';
            }

            // Validar año de publicación
            $anio = trim($_POST['anio']);
            if (empty($anio)) {
                $errors['anio'] = 'El año de publicación es obligatorio.';
            } elseif (!is_numeric($anio) || $anio < 1900 || $anio > date("Y")) {
                $errors['anio'] = 'El año de publicación debe ser un número válido entre 1900 y el año actual.';
            }

            // Validar id_genero
            $id_genero = $_POST['id_genero'];
            if (empty($id_genero)) {
                $errors['id_genero'] = 'Debes seleccionar un género.';
            }

            // Validar la imagen url
            $imagen_url = $_POST['imagen_url'];
            if (empty($imagen_url)) {
                $errors['imagen_url'] = 'Debes agregar una imagen.';
            }

            // Verifica si la URL de la imagen es válida
            if (!filter_var($imagen_url, FILTER_VALIDATE_URL)) {
                $errors[] = "La URL de la imagen no es válida.";
            }

            // Si hay errores, volver a mostrar el formulario con errores
            if (empty($errors)) {

                // Modifico libro
                $this->model->updateBook($id, $titulo, $sinopsis, $autor, $anio, $id_genero, $imagen_url);

                header('Location: ' . BASE_URL);
            }
        }
        $this->view->showUpdateBook($bookId, $genres);
    }

    public function deleteBook($id)
    {
        // obtengo el libro por id
        $book = $this->model->getBookById($id);

        if (!$book) {
            return $this->view->showError("No existe el libro con el id=$id");
        }

        // borro la tarea y redirijo
        $this->model->deleteBook($id);

        header('Location: ' . BASE_URL);
    }
}
