<?php
class Item {
    public static function getAll($db) {
        $stmt = $db->query("SELECT * FROM items");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($db, $id) {
        $stmt = $db->prepare("SELECT * FROM items WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($db, $data) {
        $stmt = $db->prepare("INSERT INTO items (nombre, descripcion, categoria_id, url_imagen) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['nombre'], $data['descripcion'], $data['categoria_id'], $data['url_imagen']]);
    }
}
?>

