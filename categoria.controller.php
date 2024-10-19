<?php
require_once 'models/categoria.model';

class CategoriaController {
    public function index($db) {
        $categorias = Categoria::getAll($db);
        include 'views/categorias/list_categorias.phtml';
    }

    public function itemsByCategoria($db, $categoria_id) {
        $items = Item::getByCategoria($db, $categoria_id);
        include 'views/categorias/items_by_categoria.phtml';
    }
}
?>
