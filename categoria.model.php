<?php
class Categoria {
    public static function getAll($db) {
        $stmt = $db->query("SELECT * FROM categorias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($db, $id) {
        $stmt = $db->prepare("SELECT * FROM categorias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($db, $nombre) {
        $stmt = $db->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        return $stmt->execute([$nombre]);
    }
}
?>
