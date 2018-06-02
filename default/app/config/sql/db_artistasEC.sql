CREATE DATABASE IF NOT EXISTS `db_artistasEC`;
USE `db_artistasEC`;

CREATE TABLE `usuarios` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `nivel` int(1) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `email`, `clave`, `nivel`, `nombre`) VALUES
(DEFAULT, 'eapazmino@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'esteban'), --12345
(DEFAULT, 'dbetan@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 'dbetan'); --123

CREATE TABLE IF NOT EXISTS `artista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `nombre_art` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `inf` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `artista` (`id`, `nombre`, `nombre_art`, `bio`, `inf`, `edad`, `email`, `foto`) VALUES
(DEFAULT,	'Fausto Miño',		'Fausto Miño',			'Cantante Ecuatoriano',	'Pop Rock', '40', 'fmino@gmail.com', 	DEFAULT),
(DEFAULT,	'Daniel Betancourt','Daniel Betancourt',	'Cantante Ecuatoriano',	'Pop Rock', '40', 'dbeta@gmail.com', 	DEFAULT),
(DEFAULT,	'Gerardo Moran',	'Gerardo Moran',		'Cantante Ecuatoriano',	'Pop Rock', '50', 'gmoran@gmail.com', 	DEFAULT),
(DEFAULT,	'Windinson',		'Widinson Serrano',		'Cantante Ecuatoriano',	'Pop Rock', '51', 'widinson@gmail.com', DEFAULT),
(DEFAULT,	'Aladino',			'Norberto Vargas',		'Cantante Ecuatoriano',	'Rockola', 	'55', 'aladino@gmail.com', 	DEFAULT),
(DEFAULT,	'Mirella Cesa',		'Mirella Cesa',			'Cantante Ecuatoriano',	'Pop Rock', '35', 'mirellac@gmail.com', DEFAULT),
(DEFAULT,	'Gaby Villalba',	'Gabriela Villalba',	'Cantante Ecuatoriano',	'Pop Rock', '40', 'gabyv@gmail.com', 	DEFAULT),
(DEFAULT,	'Pamela Cortez',	'Pamela Cortez',		'Cantante Ecuatoriano',	'Pop Rock', '45', 'pamcor@gmail.com', 	DEFAULT),
(DEFAULT,	'Karla Kanora',		'Carla Quiñonez',		'Cantante Ecuatoriano',	'Pop Rock', '48', 'karlak@gmail.com', 	DEFAULT),
(DEFAULT,	'AU-D',				'José Martín Galarza',	'Cantante Ecuatoriano',	'Rap', 		'50', 'aud@gmail.com', 		DEFAULT);

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `artista_id` int(4) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` date,
  `hora` time,
  PRIMARY KEY (`id`),
  KEY `FK_evento__artista` (`artista_id`),
  CONSTRAINT `FK_evento__artista` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `publicacion` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `artista_id` int(4) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha` date,
  `descripcion` varchar(100) NOT NULL,
  `contenido` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`id`),
  KEY `FK_publicacion__artista` (`artista_id`),
  CONSTRAINT `FK_publicacion__artista` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `publicacion` (`id`, `artista_id`, `titulo`, `fecha`, `descripcion`, `contenido`) VALUES
(DEFAULT, '1',  'Nuevo Sencillo 2017', '2017-01-10',  'Escucha mi nuevo Sencillo', DEFAULT),
(DEFAULT, '1',  'Nuevo Sencillo 2018', '2018-02-15',  'No te pierdas mi nuevo Sencillo', DEFAULT),
(DEFAULT, '1',  'Nuevo Album 2018',    '2018-06-30',  'Mi nueva placa discográfica', DEFAULT);

CREATE TABLE IF NOT EXISTS `seguidor` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `nombre_usr` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `seguidor` (`id`, `nombre`, `nombre_usr`) VALUES
(DEFAULT, 'Esteban Pazmiño',  'eapazmino'),
(DEFAULT, 'Diego Romo',       'daromo'),
(DEFAULT, 'Andres Perez',     'aperez'),
(DEFAULT, 'Carlos Mena',      'cmena'),
(DEFAULT, 'Julio Molina',     'jmolina'),
(DEFAULT, 'Juan Ayala',       'jayala'),
(DEFAULT, 'Daniel León',      'dleon'),
(DEFAULT, 'Andrea Medina',    'amedina'),
(DEFAULT, 'Lucia Paredes',    'lparedes'),
(DEFAULT, 'Daniela Cazares',  'dcazares');


CREATE TABLE IF NOT EXISTS `critica` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `publicacion_id` int(4) NOT NULL,
  `seguidor_id` int(4) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  `calificacion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_critica__publicacion` (`publicacion_id`),
  CONSTRAINT `FK_critica__publicacion` FOREIGN KEY (`publicacion_id`) REFERENCES `publicacion` (`id`),
  KEY `FK_critica__seguidor` (`seguidor_id`),
  CONSTRAINT `FK_critica__seguidor` FOREIGN KEY (`seguidor_id`) REFERENCES `seguidor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


