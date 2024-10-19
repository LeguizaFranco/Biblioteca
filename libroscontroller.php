<?php
require_once 'config.php'; // CONEXION A LA BASE DE DATOS

class LibrosController {
    public function ListarLibros() {
        global $conn;
        $sql = "SELECT libros.*, categorias.nombre AS genero FROM libros
                JOIN categorias ON libros.categoria_id = categorias.id";
        $result = $conn->query($sql);
        $libros = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $libros[] = $row;
            }
        }
        return $libros;
    }

    public function verDetalleLibro($id) {
        global $conn;
        $sql = "SELECT libros.*, categorias.nombre AS genero FROM libros
                JOIN categorias ON libros.categoria_id = categorias.id
                WHERE libros.id = ?";
                
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
