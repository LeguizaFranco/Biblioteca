<?php
require_once 'config.php'; // Conexión a la base de datos
require_once 'models/item.model.php';


class ItemController {
    public function ListarItems() {
        global $conn;
        $sql = "SELECT items.*, categorias.nombre AS categoria FROM items
                JOIN categorias ON items.categoria_id = categorias.id";
        $result = $conn->query($sql);
        $items = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }
        return $items;
    }

    public function DetalleItem($id) {
        global $conn;
        $sql = "SELECT items.*, categorias.nombre AS categoria FROM items
                JOIN categorias ON items.categoria_id = categorias.id
                WHERE items.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
