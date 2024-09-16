-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2024 a las 01:48:09
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
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `nacionalidad`) VALUES
(1, 'Stephen King', 'estadounidense '),
(3, 'J.K. Rowling', 'inglesa'),
(5, 'Gabriel García Márquez', 'colombiano'),
(6, 'Jorge Luis Borges', 'argentino'),
(7, 'Michael Crichton', 'estadounidense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'terror'),
(3, 'poesía'),
(4, 'fantasía'),
(5, 'aventura'),
(6, 'realismo mágico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `sinopsis` text NOT NULL,
  `anio_publicacion` year(4) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `sinopsis`, `anio_publicacion`, `id_autor`, `id_genero`) VALUES
(3, 'El resplandor', 'Jack Torrance acepta un trabajo como vigilante de invierno en el aislado Hotel Overlook, donde su familia se enfrenta a fuerzas sobrenaturales que desatan la locura en Jack. La historia explora la interacción entre la psique humana y lo paranormal.', '1977', 1, 1),
(4, 'It', 'En el pequeño pueblo de Derry, un grupo de amigos se enfrenta a una entidad maligna que toma la forma de un payaso llamado Pennywise. La novela alterna entre su infancia y la adultez, cuando deben enfrentarse nuevamente a su antiguo enemigo.', '1986', 1, 1),
(7, 'Harry Potter y la piedra filosofal', 'Harry Potter, un joven mago huérfano, descubre que es un mago y empieza su aventura en la escuela de magia Hogwarts, donde enfrenta desafíos y descubre secretos sobre su pasado.', '1997', 3, 4),
(8, 'Harry Potter y la cámara secreta', 'En su segundo año en Hogwarts, Harry Potter debe enfrentarse a una serie de ataques en la escuela que parecen estar relacionados con una cámara secreta legendaria.', '1998', 3, 4),
(10, 'Cien años de soledad', 'La novela narra la historia de la familia Buendía a lo largo de siete generaciones en el pueblo ficticio de Macondo. Combina elementos de la realidad y lo fantástico para explorar temas de la historia y la política de América Latina.', '1967', 5, 6),
(11, 'El amor en los tiempos del cólera', 'La historia sigue a Fermina Daza y Florentino Ariza a lo largo de más de 50 años, desde su primer amor hasta su reencuentro en la vejez. La novela explora el amor y la persistencia a través del tiempo.', '1965', 5, 6),
(12, 'El hacedor', 'Un libro de cuentos y poemas que mezcla la poesía con la prosa, abarcando temas como el tiempo, la identidad y la creación literaria.', '1960', 6, 3),
(13, 'La cifra', 'Este libro reúne la última poesía publicada por Borges en vida. Explora temas como el tiempo, la existencia, la memoria y la identidad, manteniendo el estilo distintivo del autor, caracterizado por su erudición y profundidad filosófica.', '1981', 6, 3),
(14, 'Jurassic Park', 'Un parque temático en el que los dinosaurios clonados se vuelven incontrolables, poniendo en peligro a los visitantes y empleados. La novela combina elementos de ciencia ficción con una intensa trama de supervivencia y aventura.', '1990', 7, 5),
(15, 'El mundo perdido', 'Secuela de Jurassic Park, en la que un grupo de personajes regresa a la isla para investigar la supervivencia de los dinosaurios que se pensaban extintos. Incluye nuevas aventuras y desafíos en un entorno lleno de peligros.', '1995', 7, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

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
  ADD KEY `fk_libro_autor` (`id_autor`),
  ADD KEY `fk_libro_genero` (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  ADD CONSTRAINT `fk_libro_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
