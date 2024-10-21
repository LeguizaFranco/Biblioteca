<?php
require_once './app/models/Model.php';
class BookModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // metodo para obtener todos los libros
    public function getBooks()
    {
        // Preparamos la consulta SQL para seleccionar todos los libros
        $query = $this->db->prepare('SELECT * FROM libro');
        // Ejecutamos la consulta
        $query->execute();
        // Obtengo los datos en un arreglo de objetos
        $books = $query->fetchAll(PDO::FETCH_OBJ);
        // Devolvemos la lista de libros
        return $books;
    }

    // metodo para obtener un libro
    public function getBookById($id)
    {
        // Preparamos la consulta SQL para seleccionar el libro y su género
        $query = $this->db->prepare(
            'SELECT libro.*, genero.genero AS nombre_genero 
         FROM libro 
         JOIN genero ON libro.id_genero = genero.id_genero
         WHERE libro.id = ?'
        );
        // Ejecutamos la consulta
        $query->execute([$id]);
        // Obtengo el libro y su género
        $book = $query->fetch(PDO::FETCH_OBJ);
        // Devolvemos el libro con su género
        return $book;
    }


    // Metodo para añadir libro

    public function insertBook($title, $sinopsis, $autor, $anio, $id_genero, $imagen_url)
    {
        $query = $this->db->prepare('INSERT INTO libro(titulo, sinopsis, autor, anio_publicacion,id_genero, imagen_url) VALUES (?, ?, ?, ?, ?,?)');
        $query->execute([$title, $sinopsis, $autor, $anio, $id_genero, $imagen_url]);

        $id = $this->db->lastInsertId();

        return $id;
    }
    public function updateBook($id, $titulo, $sinopsis, $autor, $anio, $id_genero, $imagen_url)
    {
        $query = $this->db->prepare('UPDATE libro SET  titulo = ?, sinopsis = ?, autor = ?, anio_publicacion = ? , id_genero = ?, imagen_url = ? WHERE id = ?');
        $query->execute([$titulo, $sinopsis, $autor, $anio, $id_genero, $imagen_url, $id]);
    }


    public function deleteBook($id)
    {
        $query = $this->db->prepare('DELETE FROM libro WHERE id = ?');
        $query->execute([$id]);
    }
}
