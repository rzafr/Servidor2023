CREATE TABLE `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `titulo` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `subtitulo` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `autor` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `editorial` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `categoria` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `imgPortada` varchar(145) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `numTotal` int(11) DEFAULT NULL,
  `numDispo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn_UNIQUE` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `direccion` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `poblacion` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `DNI_UNIQUE` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;


CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prestamos_1_idx` (`id_usuario`),
  KEY `fk_prestamos_2_idx` (`id_libro`),
  CONSTRAINT `fk_prestamos_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamos_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;