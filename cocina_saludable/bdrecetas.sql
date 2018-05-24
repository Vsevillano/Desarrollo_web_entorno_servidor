-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-05-2018 a las 09:06:59
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdrecetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
CREATE TABLE IF NOT EXISTS `colaboradores` (
  `cuenta` varchar(50) NOT NULL,
  `saldo` decimal(12,2) DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`cuenta`, `saldo`, `idusuario`) VALUES
('6', '200.00', 6),
('7', '200.00', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` varchar(45) NOT NULL,
  `tiempoinactividad` int(11) DEFAULT NULL,
  `beneficios` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `tiempoinactividad`, `beneficios`) VALUES
('1', 60, '10000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `perfil` varchar(15) NOT NULL,
  PRIMARY KEY (`perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`perfil`) VALUES
('Admin'),
('Collaborator'),
('User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

DROP TABLE IF EXISTS `recetas`;
CREATE TABLE IF NOT EXISTS `recetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `ingredientes` mediumtext,
  `elaboracion` mediumtext,
  `etiquetas` varchar(250) DEFAULT NULL,
  `publica` tinyint(4) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `idColaborador` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recetas_colaboradores1_idx` (`idColaborador`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `titulo`, `ingredientes`, `elaboracion`, `etiquetas`, `publica`, `imagen`, `idColaborador`) VALUES
(30, 'Poke de tofu especiado y arroz salvaje', '300 g. de tofu \r\n100 g. de repollo \r\n75 g. de arroz salvaje\r\n50 g. de alga wakame soba\r\n1 pepino \r\n1 cebolleta \r\n1 trozo de jengibre\r\n1 cucharada de semillas de sésamo\r\nsal\r\nPara la marinada:\r\n4 cucharadas de zumo de lima\r\n4 cucharadas de salsa de soja\r\n2 ½ cucharadas de aceite de oliva \r\n2 cucharadas de aceite de sésamo\r\n2 cucharadas de miel\r\n1 cucharada de vinagre de manzana\r\n½ cucharada de jengibre rallado', 'Haz una marinada mezclando el zumo de lima, la salsa de soja, el aceite de oliva y de sésamo, la miel, el vinagre de manzana y el jengibre rallado. Introduce el tofu en la marinada y tápalo con plástico de cocina. Deja que se marine en el frigorífico entre 6 y 12 horas.\r\n\r\nSaca el tofu del frigorífico y márcalo en una sartén con un chorrito de la marinada a fuego suave, hasta que se dore.\r\n\r\nMezcla en un bol la cebolleta cortada en rodajas y el repollo en juliana fina. Aliña con el resto de la marinada.\r\n\r\nPon a cocer en una cazuela la mitad del arroz salvaje con tres veces más de agua. Agrega una pizca de sal y unos trocitos de jengibre para que le den aroma. Cuando esté cocido retira los trozos de jengibre. Introduce el resto del arroz salvaje en abundante aceite de oliva bien caliente. Retíralo en cuanto se infle. Sazónalo.\r\n\r\nColoca una base de arroz cocido en el fondo de un bol. Agrega la ensalada de repollo y cebolleta. Corta el tofu en dados y añádelo. Coloca encima unos montoncitos de alga wakame soba, tiras de pepino y arroz inflado. Espolvorea con semillas de sésamo. Sirve.', 'poke, poke de tofu, arroz salvaje', 1, '20181804151550poke-tofu-xl-848x477x80xX.jpg', 6),
(31, 'Salmorejo con raspas fritas', '½ kg. de tomates maduros\r\n6 raspas de anchoa\r\n4 filetes de boquerón\r\n2 rebanadas de pan integral\r\n1-2 dientes de ajo\r\nharina de garbanzo\r\naceite de oliva\r\nsal marina\r\nalbahaca\r\nperejil', 'Haz unos cortes en forma de cruz en la base de los tomates para que se puedan pelar más fácil. Escáldalos en agua hirviendo durante 2-3 minutos. Refréscalos en agua fría y quítales la piel. Trocéalos y despepítalos. Introdúcelos en un vaso batidor con una pizca de sal y un trocito de ajo. Bate y ve añadiendo aceite de oliva mientras sigues batiendo hasta obtener el salmorejo.\r\n\r\nMezcla la harina de garbanzo con un puñadito de perejil picado, un ajo picadito y una pizca de sal marina. Reboza las raspas en la mezcla y fríelas en aceite de oliva hasta que queden crujientes. Escúrrelas en papel absorbente.\r\n\r\nTuesta las rebanadas de pan. Coloca encima los filetes de boquerón, riégalos con un poco de salmorejo y decora con una hojita de albahaca.\r\n\r\nVierte una ración de salmorejo en una copa. Decórala con unas raspas fritas y una hojita de albahaca. Acompaña con una tostada de boquerón.', 'Salmorejo, raspas fritas, crema', 1, '20181804151921salmorejo-raspas-xl-848x477x80xX.jpg', 7),
(32, 'Pastel de carne a la boloñesa', '500 g. de carne picada (mezcla)\r\n600 g. de patatas\r\n1 cebolla\r\n1 zanahoria\r\n1 diente de ajo\r\n3 cucharadas de mantequilla\r\n100 ml. de leche\r\n200 g. de salsa de tomate\r\nqueso en polvo\r\naceite de oliva\r\nsal\r\npimienta\r\norégano\r\nhierbas provenzales', 'Pela y trocea las patatas y cuécelas en agua hirviendo con una pizca de sal durante 20 minutos. Escúrrelas y tritúralas con la leche, la mantequilla, un chorrito de aceite de oliva y una pizca de sal y de pimienta.\r\n\r\nPica la cebolla, la zanahoria y el ajo y póchalos en una sartén con un chorro de aceite de oliva durante 20 minutos. Incorpora la carne picada. Condiméntala con sal, pimienta, un puñado de orégano y otro de hierbas provenzales secas. Vierte la salsa de tomate y remueve para que se integre bien.\r\n\r\nIntroduce la carne en una bandeja para horno. Cúbrela con el puré de patata. Espolvorea con queso en polvo. Hornéala a 200ºC durante 20 minutos. Saca del horno y sirve.', 'Pastel de carne, pastel, carne, boloñesa', 1, '20181804152217pastel-carne-xl-848x477x80xX.jpg', 6),
(33, 'Guiso de patatas con fideos y calamares', '2 patatas\r\n2 zanahorias\r\n100 gramos anillas de calamar\r\n70 gramos fideos para fideuá\r\n1 cucharadita pimentón ahumado\r\nSal', 'Comenzamos pelando las patatas. Con ayuda de un cuchillo las chascamos. Para ello hacemos un corte con el cuchillo en la patata y tiramos para que se desgarre. Las ponemos en una olla.\r\n\r\nA continuación pelamos las zanahorias, las cortamos en rodajas no muy gruesas y las añadimos junto con las patatas.\r\n\r\nCubrimos con agua, añadimos sal a nuestro gusto y pimentón y ponemos al fuego.\r\n\r\nCuando las patatas estén casi hechas añadimos las anillas de calamar, removemos y seguimos cocinando.\r\n\r\nPor último añadimos los fideos y cocinamos hasta que estén blanditos. Si fuera necesario añadimos agua tibia durante el cocinado para que el guiso no se quede excesivamente seco.\r\n\r\n¡Buen provecho!', 'guiso, patata, fideos, calamares', 1, '20182304082812photo.jpg', 6),
(34, 'Piernas al cilantro con jugo de limón', '2 cucharadas de aceite de oliva\r\n4 dientes de ajo picados\r\n½ cucharadita de comino\r\n½ cucharadita de sal\r\nPimienta recién molida\r\n2 limones con la cáscara rallada\r\n½ manojo de (cilantro picado\r\n6 piernas de pollo', '1. MEZCLA el aceite de oliva, el ajo picado, el comino, la sal y un poco de pimienta recién molida en un recipiente.\r\n\r\n2. AGREGA 1 cucharadita de ralladura y 3 cucharadas de jugo de limón a la mezcla. Añade la mitad del cilantro picado y combina.\r\n\r\n3. VIERTE la salsa sobre una bolsa de plástico y añade las piernas de pollo. Cierra la bolsa y masajear para incorporar la mezcla a las piezas de pollo .Refrigera durante al menos 2 horas revolviendo la bolsa de vez en cuando para redistribuir el adobo.\r\n\r\n4. PRECALIENTA el horno a 400 grados F. Vacía las piezas de pollo a un plato para hornear, así como el resto de la marinada.\r\n\r\n5. HORNEA durante 40 o 45 minutos, moviendo una o dos veces. Para obtener más dorado, encienda el asador al final del tiempo de cocción y asa por 2-4 minutos, o hasta que se alcance la cantidad deseada de dorado.\r\n\r\n6. ADORNA el pollo con rodajas frescas de limón y cilantro picado.', 'pollo, pollo al horno', 1, '20182304083937recetaspiernaspollo.jpg', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_usuarios_perfiles`
--

DROP TABLE IF EXISTS `r_usuarios_perfiles`;
CREATE TABLE IF NOT EXISTS `r_usuarios_perfiles` (
  `Perfiles_perfil` varchar(15) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Perfiles_has_usuarios_usuarios1_idx` (`usuarios_id`),
  KEY `fk_Perfiles_has_usuarios_Perfiles1_idx` (`Perfiles_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `r_usuarios_perfiles`
--

INSERT INTO `r_usuarios_perfiles` (`Perfiles_perfil`, `usuarios_id`, `id`) VALUES
('User', 1, 1),
('User', 2, 2),
('User', 3, 3),
('Admin', 4, 4),
('Admin', 5, 5),
('Collaborator', 6, 6),
('Collaborator', 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_usuarios_recetas_favoritas`
--

DROP TABLE IF EXISTS `r_usuarios_recetas_favoritas`;
CREATE TABLE IF NOT EXISTS `r_usuarios_recetas_favoritas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `recetas_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_has_recetas_recetas3_idx` (`recetas_id`),
  KEY `fk_usuarios_has_recetas_usuarios2_idx` (`usuarios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `r_usuarios_recetas_favoritas`
--

INSERT INTO `r_usuarios_recetas_favoritas` (`id`, `usuarios_id`, `recetas_id`) VALUES
(8, 2, 31),
(26, 3, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_usuarios_recetas_votacion`
--

DROP TABLE IF EXISTS `r_usuarios_recetas_votacion`;
CREATE TABLE IF NOT EXISTS `r_usuarios_recetas_votacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `recetas_id` int(11) NOT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_has_recetas_recetas2_idx` (`recetas_id`),
  KEY `fk_usuarios_has_recetas_usuarios1_idx` (`usuarios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `r_usuarios_recetas_votacion`
--

INSERT INTO `r_usuarios_recetas_votacion` (`id`, `usuarios_id`, `recetas_id`, `puntuacion`) VALUES
(1, 1, 33, 3),
(2, 1, 32, 5),
(3, 1, 34, 2),
(4, 1, 30, 3),
(5, 1, 31, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `estado` enum('Activo','Bloqueado') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `estado`) VALUES
(1, 'Usuario1', 'usuario1', 'usuario1', 'Activo'),
(2, 'Usuario2', 'usuario2', 'usuario2', 'Activo'),
(3, 'Usuario3', 'usuario3', 'usuario3', 'Activo'),
(4, 'Usuario administrador 1', 'admin1', 'admin1', 'Activo'),
(5, 'Usuario administrador 2', 'admin2', 'admin2', 'Activo'),
(6, 'Usuario colaborador 1', 'colaborador1', 'colaborador1', 'Activo'),
(7, 'Usuario colaborador 2', 'colaborador2', 'colaborador2', 'Activo');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `fk_colaboradores_usuarios1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `fk_recetas_colaboradores1` FOREIGN KEY (`idColaborador`) REFERENCES `colaboradores` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `r_usuarios_perfiles`
--
ALTER TABLE `r_usuarios_perfiles`
  ADD CONSTRAINT `fk_Perfiles_has_usuarios_Perfiles1` FOREIGN KEY (`Perfiles_perfil`) REFERENCES `perfiles` (`perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Perfiles_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `r_usuarios_recetas_favoritas`
--
ALTER TABLE `r_usuarios_recetas_favoritas`
  ADD CONSTRAINT `fk_usuarios_has_recetas_recetas3` FOREIGN KEY (`recetas_id`) REFERENCES `recetas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_recetas_usuarios2` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `r_usuarios_recetas_votacion`
--
ALTER TABLE `r_usuarios_recetas_votacion`
  ADD CONSTRAINT `fk_usuarios_has_recetas_recetas2` FOREIGN KEY (`recetas_id`) REFERENCES `recetas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_recetas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
