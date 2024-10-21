-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2024 a las 03:13:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `generos_relacionados` varchar(100) NOT NULL,
  `nivel_popularidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`, `descripcion`, `generos_relacionados`, `nivel_popularidad`) VALUES
(1, 'terror', 'El género de terror busca evocar miedo, horror o tensión en el lector a través de situaciones sobrenaturales, monstruos, psicópatas o escenarios oscuros y espeluznantes.', 'Fantasía, Misterio, Suspenso.', 8),
(3, 'poesía', 'La poesía es una forma literaria caracterizada por la expresión estética de sentimientos, emociones e ideas mediante el ritmo, la métrica y el verso, utilizando un lenguaje cuidadosamente seleccionado.', 'Literatura Clásica, Filosofía.', 6),
(4, 'fantasía', 'La fantasía es un género que transporta al lector a mundos imaginarios llenos de magia, criaturas míticas y aventuras heroicas, donde las leyes de la naturaleza a menudo se ven alteradas.', 'Ciencia Ficción, Aventura.', 9),
(5, 'aventura', 'El género de aventura narra historias de exploración, acción y desafíos, centradas en héroes o personajes que enfrentan peligros y viajes emocionantes en busca de algo valioso o para cumplir una misión.', 'Fantasía, Acción, Historia.', 7),
(6, 'realismo mágico', 'El realismo mágico combina la realidad cotidiana con elementos fantásticos o mágicos que son presentados de manera natural, difuminando las fronteras entre lo real y lo extraordinario en la narrativa.', 'Literatura Latinoamericana, Fantasía, Surrealismo.', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `sinopsis` text NOT NULL,
  `autor` varchar(25) NOT NULL,
  `anio_publicacion` year(4) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `imagen_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `sinopsis`, `autor`, `anio_publicacion`, `id_genero`, `imagen_url`) VALUES
(3, 'El resplandor', 'Jack Torrance acepta un trabajo como vigilante de invierno en el aislado Hotel Overlook, donde su familia se enfrenta a fuerzas sobrenaturales que desatan la locura en Jack. La historia explora la interacción entre la psique humana y lo paranormal.', 'Stephen King', '1977', 1, 'https://e00-elmundo.uecdn.es/elmundo/imagenes/2011/09/29/cultura/1317286638_extras_ladillos_1_0.jpg'),
(4, 'It', 'En el pequeño pueblo de Derry, un grupo de amigos se enfrenta a una entidad maligna que toma la forma de un payaso llamado Pennywise. La novela alterna entre su infancia y la adultez, cuando deben enfrentarse nuevamente a su antiguo enemigo.', 'Stephen King', '1986', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/It_%281986%29_front_cover%2C_first_edition.jpg/800px-It_%281986%29_front_cover%2C_first_edition.jpg'),
(7, 'Harry Potter y la piedra filosofal', 'Harry Potter, un joven mago huérfano, descubre que es un mago y empieza su aventura en la escuela de magia Hogwarts, donde enfrenta desafíos y descubre secretos sobre su pasado.', 'J. K. Rowling', '1997', 4, 'https://beta-content.tap-commerce.com.ar/cover/original/9788498388909_1.jpg?id_com=1169'),
(8, 'Harry Potter y la cámara secreta', 'En su segundo año en Hogwarts, Harry Potter debe enfrentarse a una serie de ataques en la escuela que parecen estar relacionados con una cámara secreta legendaria.', 'J. K. Rowling', '1998', 4, 'https://i.pinimg.com/736x/42/b7/85/42b785799b135b806a22b7abf74c905d.jpg'),
(10, 'Cien años de soledad', 'La novela narra la historia de la familia Buendía a lo largo de siete generaciones en el pueblo ficticio de Macondo. Combina elementos de la realidad y lo fantástico para explorar temas de la historia y la política de América Latina.', 'Gabriel García Márquez', '1967', 6, 'https://m.media-amazon.com/images/I/91TvVQS7loL._AC_UF1000,1000_QL80_.jpg'),
(11, 'El amor en los tiempos del cólera', 'La historia sigue a Fermina Daza y Florentino Ariza a lo largo de más de 50 años, desde su primer amor hasta su reencuentro en la vejez. La novela explora el amor y la persistencia a través del tiempo.', 'Gabriel García Márquez', '1965', 6, 'https://wmagazin.com/wp-content/uploads/2019/03/El-amor-en-los-tiempos-del-colera-Portada-759x1024.jpg'),
(12, 'El hacedor', 'Un libro de cuentos y poemas que mezcla la poesía con la prosa, abarcando temas como el tiempo, la identidad y la creación literaria.', 'Jorge Luis Borges', '1960', 3, 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhTkeao6NfGcKLMOW5GisUoqtO5i_zTmx_GZc_NXYkZZLebpQKxEMTqkW5dyPKnrLxGXsFYhOgJIgQITvDBfGUqQ3WXc8iUk8cDkjE1MkD5opFXo7rbJwiCylsUK1gENWXXiavdKgGwP2I/s1600/BORGES-EL+HACEDOR.jpg'),
(13, 'La cifra', 'Este libro reúne la última poesía publicada por Borges en vida. Explora temas como el tiempo, la existencia, la memoria y la identidad, manteniendo el estilo distintivo del autor, caracterizado por su erudición y profundidad filosófica.', 'Jorge Luis Borges', '1981', 3, 'https://images.cdn1.buscalibre.com/fit-in/360x360/f0/bb/f0bb4cb26c2ad8870e44912a7e1854a8.jpg'),
(14, 'Jurassic Park', 'Un parque temático en el que los dinosaurios clonados se vuelven incontrolables, poniendo en peligro a los visitantes y empleados. La novela combina elementos de ciencia ficción con una intensa trama de supervivencia y aventura.', 'Michael Crichton', '1990', 5, 'https://i.pinimg.com/736x/8b/cd/c5/8bcdc516a541a417ad33bc41c9bf8f6c.jpg'),
(15, 'El mundo perdido', 'Secuela de Jurassic Park, en la que un grupo de personajes regresa a la isla para investigar la supervivencia de los dinosaurios que se pensaban extintos. Incluye nuevas aventuras y desafíos en un entorno lleno de peligros.', 'Michael Crichton', '1995', 5, 'https://images.cdn1.buscalibre.com/fit-in/360x360/c3/13/c313e9378d1cf90b395a799358fe543c.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(1, 'webadmin@unicen.tudai', '$2y$10$ddC8sbbnG.zZItIPp01h6edkKGAjmy5LcgFt7unbxr6.SDGILOALW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_libro_genero` (`id_genero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
