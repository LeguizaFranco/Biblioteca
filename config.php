<?php
//DATOS DE CONEXION A LA BDD//

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define ('DB_PASSWORD', '');
define ('DB_NAME','biblioteca');

///CREE LA CONEXION//
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//VERIFICO LA CONEXION//
if ($conn->connect_error){
    die("Conexion fallida: ". $conn->connect_error);
}

//CREAR TABLAS AUTOMATICAMENTE SI NO EXISTEN//
$sql = "CREATE TABLE IF NOT EXISTS categorias (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(255) NOT NULL,
imagen_url TEXT
);

CREATE TABLE IF NOT EXISTS libros (
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(255) NOT NULL,
autor VARCHAR(255) NOT NULL,
descripcion TEXT,
categoria_id INT,
FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);";

if ($conn->multi_query($sql)===TRUE){
    echo "Tablas creadas correctamente.";
}else{
    echo "Error creando tablas: " . $conn->error;
}
$conn->close();
?>
