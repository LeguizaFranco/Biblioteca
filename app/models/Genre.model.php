<?php

require_once './app/models/Model.php';

class GenreModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


    // metodo para obtener todos los géneros
    public function getGenres()
    {
        // Preparamos la consulta SQL para seleccionar todos los géneros
        $query = $this->db->prepare('SELECT * FROM genero');
        // Ejecutamos la consulta
        $query->execute();
        // Obtengo los datos en un arreglo de objetos
        $genres = $query->fetchAll(PDO::FETCH_OBJ);
        // Devolvemos la lista de géneros
        return $genres;
    }

    public function getGenreById($id_genero)
    {
        $query = $this->db->prepare('SELECT * FROM genero WHERE id_genero = ?');
        $query->execute([$id_genero]);
        $genre = $query->fetch(PDO::FETCH_OBJ);
        return $genre;
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

        // Obtengo los libros en un arreglo de objetos
        $books = $query2->fetchAll(PDO::FETCH_OBJ);

        $result =  [
            'genero' => $genre,
            'libros' => $books
        ];

        // Devolvemos la lista de libros
        return $result;
    }

    public function insertGenre($genero, $descripcion, $generos_relacionados, $nivel_popularidad)
    {
        $query = $this->db->prepare('INSERT INTO genero(genero, descripcion, generos_relacionados, nivel_popularidad) VALUES (?, ?, ?, ?)');
        $query->execute([$genero, $descripcion, $generos_relacionados, $nivel_popularidad]);

        $id = $this->db->lastInsertId();

        return $id;
    }

    public function updateGenre($genero, $descripcion, $generos_relacionados, $nivel_popularidad, $id_genero)
    {
        $query = $this->db->prepare('UPDATE genero SET  genero = ?, descripcion = ?, generos_relacionados = ?, nivel_popularidad = ? WHERE id_genero = ?');
        $query->execute([$genero, $descripcion, $generos_relacionados, $nivel_popularidad, $id_genero]);
    }

    // Método para verificar si hay libros asociados a un género
    public function hasBooks($id_genero)
    {
        // Consulta para contar los libros asociados al género
        $query = $this->db->prepare('SELECT COUNT(*) AS total FROM libro WHERE id_genero = ?');
        $query->execute([$id_genero]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        // Devolvemos el número de libros asociados
        return $result->total;
    }

    // Método para eliminar el género si no hay libros asociados
    public function deleteGenre($id_genero)
    {
        $query = $this->db->prepare('DELETE FROM genero WHERE id_genero = ?');
        $query->execute([$id_genero]);
    }
}
