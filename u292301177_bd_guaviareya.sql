-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-08-2024 a las 02:18:01
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u292301177_bd_guaviareya`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`u292301177_guaviareya`@`127.0.0.1` PROCEDURE `insertar_administrador` (IN `p_correo` VARCHAR(50), IN `p_apodo` VARCHAR(50), IN `p_contrasena` VARCHAR(255), IN `p_rol` ENUM('administrador','super_administrador'), IN `p_ID_Restaurante` INT, IN `p_img_A` VARCHAR(200))   BEGIN
    INSERT INTO Administradores (correo, apodo, contrasena, rol, ID_Restaurante, img_A)
    VALUES (p_correo, p_apodo, MD5(p_contrasena), p_rol, p_ID_Restaurante, p_img_A);
END$$

--
-- Funciones
--
CREATE DEFINER=`u292301177_guaviareya`@`127.0.0.1` FUNCTION `verificar_estado_restaurante` (`id_restaurante` INT) RETURNS VARCHAR(15) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci  BEGIN
    DECLARE estado VARCHAR(15);
    
    SELECT Estado INTO estado
    FROM Restaurantes
    WHERE ID_Restaurante = id_restaurante;
    
    RETURN estado;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administradores`
--

CREATE TABLE `Administradores` (
  `id` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `apodo` varchar(50) NOT NULL,
  `ID_Restaurante` int(11) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('administrador','super_administrador') NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `img_A` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Administradores`
--

INSERT INTO `Administradores` (`id`, `correo`, `apodo`, `ID_Restaurante`, `contrasena`, `rol`, `fecha_creacion`, `img_A`) VALUES
(1, 'guaviareya@gmail.com', 'GuaviareYa', NULL, 'aad0163fa0f3c29e0145b15ac783b50d', 'super_administrador', '2024-08-13 02:12:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cupones`
--

CREATE TABLE `Cupones` (
  `ID_Cupon` int(11) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Codigo_Cupon` varchar(20) NOT NULL,
  `Descuento` int(11) NOT NULL,
  `Fecha_Expiracion` date NOT NULL,
  `Fecha_Usado` timestamp NULL DEFAULT NULL,
  `Fecha_Creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direccion_Entregas`
--

CREATE TABLE `Direccion_Entregas` (
  `ID_Dire_Entre` int(11) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Barrio` varchar(50) NOT NULL,
  `fecha_pedido` timestamp NULL DEFAULT current_timestamp(),
  `Descripcion` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Documentos_Identificacion`
--

CREATE TABLE `Documentos_Identificacion` (
  `ID_Documento` int(11) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Tipo_Documento` enum('DNI','Pasaporte','Licencia','Otro') NOT NULL,
  `Foto_Documento` varchar(255) NOT NULL,
  `Fecha_Subida` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Likes_Dislikes`
--

CREATE TABLE `Likes_Dislikes` (
  `ID` int(11) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `ID_Restaurante` int(11) NOT NULL,
  `Tipo` enum('like','dislike') NOT NULL,
  `Fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id_pago` int(11) NOT NULL,
  `numero` varchar(16) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `expiracion` varchar(4) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedidos`
--

CREATE TABLE `Pedidos` (
  `ID_pedido` int(11) NOT NULL,
  `ID_Restaurante` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Sub_total` double NOT NULL,
  `ID_Dire_Entre` int(11) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `Tipo_Envio` enum('Prioritaria','Básica') NOT NULL DEFAULT 'Básica',
  `Estado` enum('Pendiente','Enviado','Entregado','Cancelado') NOT NULL DEFAULT 'Pendiente',
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `ID_Producto` int(11) NOT NULL,
  `ID_Restaurante` int(11) NOT NULL,
  `Nombre_P` varchar(50) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Valor_P` int(11) NOT NULL,
  `img_P` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Restaurantes`
--

CREATE TABLE `Restaurantes` (
  `ID_Restaurante` int(11) NOT NULL,
  `Nombre_R` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `img_R` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `Correo` varchar(50) NOT NULL,
  `Apodo` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Fec_Regis` timestamp NOT NULL DEFAULT current_timestamp(),
  `aviso_cupon_visto` tinyint(1) DEFAULT 0,
  `img_U` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `Usuarios`
--
DELIMITER $$
CREATE TRIGGER `after_usuario_insert` AFTER INSERT ON `Usuarios` FOR EACH ROW BEGIN
    DECLARE cupon_codigo VARCHAR(20);
    DECLARE cupon_descuento INT;
    DECLARE cupon_expiracion DATE;

    -- Generar un código de cupón único
    SET cupon_codigo = CONCAT('CUPON', NEW.Correo, UNIX_TIMESTAMP());
    -- Establecer el descuento y la fecha de expiración
    SET cupon_descuento = 10; -- Descuento del 10%
    SET cupon_expiracion = DATE_ADD(CURRENT_DATE, INTERVAL 30 DAY); -- 30 días de validez

    -- Insertar el nuevo cupón en la tabla Cupones
    INSERT INTO Cupones (Correo, Codigo_Cupon, Descuento, Fecha_Expiracion)
    VALUES (NEW.Correo, cupon_codigo, cupon_descuento, cupon_expiracion);
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administradores`
--
ALTER TABLE `Administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `FK_Restaurantes_Administradores` (`ID_Restaurante`);

--
-- Indices de la tabla `Cupones`
--
ALTER TABLE `Cupones`
  ADD PRIMARY KEY (`ID_Cupon`),
  ADD UNIQUE KEY `Codigo_Cupon` (`Codigo_Cupon`),
  ADD KEY `idx_Correo_Cupones` (`Correo`);

--
-- Indices de la tabla `Direccion_Entregas`
--
ALTER TABLE `Direccion_Entregas`
  ADD PRIMARY KEY (`ID_Dire_Entre`),
  ADD KEY `idx_Correo` (`Correo`);

--
-- Indices de la tabla `Documentos_Identificacion`
--
ALTER TABLE `Documentos_Identificacion`
  ADD PRIMARY KEY (`ID_Documento`),
  ADD KEY `idx_Correo_Documentos_Identificacion` (`Correo`);

--
-- Indices de la tabla `Likes_Dislikes`
--
ALTER TABLE `Likes_Dislikes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Correo` (`Correo`,`ID_Restaurante`,`Tipo`),
  ADD KEY `idx_Correo_Likes_Dislikes` (`Correo`),
  ADD KEY `idx_ID_Restaurante_Likes_Dislikes` (`ID_Restaurante`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `idx_correo_metodos_pago` (`correo`);

--
-- Indices de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD PRIMARY KEY (`ID_pedido`),
  ADD KEY `FK_Direccion_Entregas_Pedidos` (`ID_Dire_Entre`),
  ADD KEY `idx_ID_Restaurante_Pedidos` (`ID_Restaurante`),
  ADD KEY `idx_ID_Producto_Pedidos` (`ID_Producto`),
  ADD KEY `idx_Correo_Pedidos` (`Correo`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `idx_ID_Restaurante` (`ID_Restaurante`);

--
-- Indices de la tabla `Restaurantes`
--
ALTER TABLE `Restaurantes`
  ADD PRIMARY KEY (`ID_Restaurante`),
  ADD UNIQUE KEY `Nombre_R` (`Nombre_R`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Administradores`
--
ALTER TABLE `Administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Cupones`
--
ALTER TABLE `Cupones`
  MODIFY `ID_Cupon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Direccion_Entregas`
--
ALTER TABLE `Direccion_Entregas`
  MODIFY `ID_Dire_Entre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Documentos_Identificacion`
--
ALTER TABLE `Documentos_Identificacion`
  MODIFY `ID_Documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Likes_Dislikes`
--
ALTER TABLE `Likes_Dislikes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  MODIFY `ID_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Productos`
--
ALTER TABLE `Productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Restaurantes`
--
ALTER TABLE `Restaurantes`
  MODIFY `ID_Restaurante` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Administradores`
--
ALTER TABLE `Administradores`
  ADD CONSTRAINT `FK_Restaurantes_Administradores` FOREIGN KEY (`ID_Restaurante`) REFERENCES `Restaurantes` (`ID_Restaurante`);

--
-- Filtros para la tabla `Cupones`
--
ALTER TABLE `Cupones`
  ADD CONSTRAINT `FK_Usuarios_Cupones` FOREIGN KEY (`Correo`) REFERENCES `Usuarios` (`Correo`);

--
-- Filtros para la tabla `Direccion_Entregas`
--
ALTER TABLE `Direccion_Entregas`
  ADD CONSTRAINT `FK_Usuarios_Direccion_Entregas` FOREIGN KEY (`Correo`) REFERENCES `Usuarios` (`Correo`);

--
-- Filtros para la tabla `Documentos_Identificacion`
--
ALTER TABLE `Documentos_Identificacion`
  ADD CONSTRAINT `FK_Usuarios_Documentos_Identificacion` FOREIGN KEY (`Correo`) REFERENCES `Usuarios` (`Correo`);

--
-- Filtros para la tabla `Likes_Dislikes`
--
ALTER TABLE `Likes_Dislikes`
  ADD CONSTRAINT `FK_Restaurantes_Likes_Dislikes` FOREIGN KEY (`ID_Restaurante`) REFERENCES `Restaurantes` (`ID_Restaurante`),
  ADD CONSTRAINT `FK_Usuarios_Likes_Dislikes` FOREIGN KEY (`Correo`) REFERENCES `Usuarios` (`Correo`);

--
-- Filtros para la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD CONSTRAINT `fk_usuarios_metodos_pago` FOREIGN KEY (`correo`) REFERENCES `Usuarios` (`Correo`);

--
-- Filtros para la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD CONSTRAINT `FK_Direccion_Entregas_Pedidos` FOREIGN KEY (`ID_Dire_Entre`) REFERENCES `Direccion_Entregas` (`ID_Dire_Entre`),
  ADD CONSTRAINT `FK_Productos_Pedidos` FOREIGN KEY (`ID_Producto`) REFERENCES `Productos` (`ID_Producto`),
  ADD CONSTRAINT `FK_Restaurantes_Pedidos` FOREIGN KEY (`ID_Restaurante`) REFERENCES `Restaurantes` (`ID_Restaurante`),
  ADD CONSTRAINT `FK_Usuarios_Pedidos` FOREIGN KEY (`Correo`) REFERENCES `Usuarios` (`Correo`);

--
-- Filtros para la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD CONSTRAINT `FK_Restaurantes_Productos` FOREIGN KEY (`ID_Restaurante`) REFERENCES `Restaurantes` (`ID_Restaurante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
