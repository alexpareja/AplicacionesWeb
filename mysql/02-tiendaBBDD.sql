DROP TABLE IF EXISTS `usuarios`;
DROP TABLE IF EXISTS `productos`;
DROP TABLE IF EXISTS `compras`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float UNSIGNED NOT NULL,
  `stockXS` int(10) UNSIGNED NOT NULL,
  `stockS` int(10) UNSIGNED NOT NULL,
  `stockM` int(10) UNSIGNED NOT NULL,
  `stockL` int(10) UNSIGNED NOT NULL,
  `stockXL` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido1` varchar(20) NOT NULL,
  `apellido2` varchar(20),
  `password` varchar(60) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `direccion` varchar(35) NOT NULL,
  `rol` enum('A','P','U') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` int(10) UNSIGNED NOT NULL,
  `producto` int(10) UNSIGNED NOT NULL,
  `talla` enum('xs','s','m','l','xl') NOT NULL,
  `fecha` datetime NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `precio` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `cupones` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `descuento` float UNSIGNED NOT NULL,
  `fechaExpiracion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`usuario`),
  ADD KEY `idProducto` (`producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombreProducto` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombreUsuario` (`nombre`),
  ADD KEY `correoUsuario` (`correo`);

ALTER TABLE `usuarios` ADD UNIQUE(`correo`);
ALTER TABLE `productos` ADD UNIQUE(`nombre`);

-- Indices de la tabla `cupones`

ALTER TABLE `cupones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoCupon` (`codigo`);
  
--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
  
  
  --
-- AUTO_INCREMENT de la tabla `cupones`
--
  ALTER TABLE `cupones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;
COMMIT;

