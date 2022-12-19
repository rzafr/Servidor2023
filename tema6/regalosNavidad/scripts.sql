CREATE SCHEMA IF NOT EXISTS `regalos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci ;


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;



CREATE TABLE `regalos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `destinatario` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_idx` (`id_usuario`),
  CONSTRAINT `fk_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


CREATE TABLE `enlaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_regalo` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `enlace` varchar(245) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `prioridad` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_regalo_idx` (`id_regalo`),
  CONSTRAINT `fk_regalo` FOREIGN KEY (`id_regalo`) REFERENCES `regalos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;



INSERT INTO `regalos`.`usuarios` (`email`, `password`) VALUES ('usuario1@email.com', '1111');
INSERT INTO `regalos`.`usuarios` (`email`, `password`) VALUES ('usuario2@email.com', '2222');
INSERT INTO `regalos`.`usuarios` (`email`, `password`) VALUES ('usuario3@email.com', '3333');


INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('1', 'Patinete', 'Sobrina Maria', '100', 'Pendiente', '2022');
INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('1', 'Taza personalizada', 'Abuelo Javier', '20', 'Envuelto', '2022');
INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('1', 'Collar', 'Abuela Mari Carmen', '20', 'Entregado', '2021');
INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('1', 'Libro', 'Julia', '30', 'Comprado', '2022');
INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('1', 'Consola', 'Primo Federico', '80', 'Entregado', '2021');

INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('2', 'Sudadera', 'Sobrina Irene', '15', 'Comprado', '2022');
INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('2', 'Chandal', 'Primo Daniel', '25', 'Entregado', '2021');
INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('2', 'Perfume', 'Tia Mercedes', '30', 'Envuelto', '2022');
INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('2', 'Pijama', 'Carlos', '25', 'Pendiente', '2022');
INSERT INTO `regalos`.`regalos` (`id_usuario`, `nombre`, `destinatario`, `precio`, `estado`, `year`) VALUES ('2', 'Bufanda', 'Abuela Encarna', '20', 'Entregado', '2021');


INSERT INTO `regalos`.`enlaces` (`id_regalo`, `nombre`, `enlace`, `precio`, `imagen`, `prioridad`) VALUES ('1', 'Patinete', 'https://www.accesoriospatineteelectrico.com/patinete-electrico-barato/', '80', 'vistas/img/barato.png', '2');
INSERT INTO `regalos`.`enlaces` (`id_regalo`, `nombre`, `enlace`, `precio`, `imagen`, `prioridad`) VALUES ('1', 'Patinete', 'https://www.ventajon.com/tiendas-online/categorias/movilidad-urbana-patinetes?order=recent', '100', 'vistas/img/honey.png', '1');


