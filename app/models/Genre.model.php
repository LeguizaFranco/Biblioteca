<?php

require_once './app/models/Model.php';

class GenreModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


    // metodo para obtener todos los generos
    public function getGenres()
    {
        // Preparamos la consulta SQL para seleccionar todos los generos
        $query = $this->db->prepare('SELECT * FROM genero');
        // Ejecutamos la consulta
        $query->execute();
        // Recuperamos todos los generos
        $genres = $query->fetchAll(PDO::FETCH_OBJ);
        // Devolvemos la lista de generos
        return $genres;
    }

    // metodo para obtener todos los libros por genero
    public function getBooksByGenre($id_genero)
    {
        // Preparamos la consulta SQL para seleccionar el genero según el id_genero
        $query = $this->db->prepare('SELECT * FROM genero WHERE id_genero = ?');

        // Ejecutamos la consulta con el valor del id_genero como parámetro
        $query->execute([$id_genero]);

        //Recuperamos el genero
        $genre = $query->fetch(PDO::FETCH_OBJ);

        // Preparamos la consulta SQL para seleccionar los libros según el id_genero
        $query2 = $this->db->prepare('SELECT * FROM libro WHERE id_genero = ?');

        // Ejecutamos la consulta con el valor del id_genero como parámetro
        $query2->execute([$id_genero]);

        // Recuperamos todos los libros
        $books = $query2->fetchAll(PDO::FETCH_OBJ);

        $result =  [
            'genero' => $genre,
            'libros' => $books
        ];

        // Devolvemos la lista de libros
        return $result;
    }
}
