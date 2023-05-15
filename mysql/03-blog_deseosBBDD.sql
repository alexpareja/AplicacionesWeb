
--
-- Base de datos: `laquintacaja`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` text NOT NULL,
  `descripcion` text NOT NULL,
  `autor` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosblog`
--

CREATE TABLE `comentariosblog` (
  `id` int(10) UNSIGNED NOT NULL,
  `entradaBlog` int(10) UNSIGNED NOT NULL,
  `usuario` int(10) UNSIGNED NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `respuesta` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosproducto`
--

CREATE TABLE `comentariosproducto` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto` int(10) UNSIGNED NOT NULL,
  `usuario` int(10) UNSIGNED NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `review` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `listadeseos` (
  `id` int(11) NOT NULL,
  `usuario` int(10) UNSIGNED NOT NULL,
  `producto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listadeseos`
--
ALTER TABLE `listadeseos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `producto` (`producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listadeseos`
--
ALTER TABLE `listadeseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `listadeseos`
--
ALTER TABLE `listadeseos`
  ADD CONSTRAINT `listadeseos_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `listadeseos_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;


--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tituloEntrada` (`titulo`),
  ADD KEY `autor` (`autor`) USING BTREE;

--
-- Indices de la tabla `comentariosblog`
--
ALTER TABLE `comentariosblog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEntradaBlog` (`entradaBlog`),
  ADD KEY `idUsuario` (`usuario`),
  ADD KEY `respuesta` (`respuesta`);


-- Indices de la tabla `comentariosproducto`
--
ALTER TABLE `comentariosproducto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProducto` (`producto`),
  ADD KEY `idUsuario` (`usuario`),
  ADD KEY `review` (`review`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentariosblog`
--
ALTER TABLE `comentariosblog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentariosproducto`
--
ALTER TABLE `comentariosproducto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--


ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;
--
-- Filtros para la tabla `comentariosblog`
--
ALTER TABLE `comentariosblog`
  ADD CONSTRAINT `comentariosblog_ibfk_1` FOREIGN KEY (`entradaBlog`) REFERENCES `blog` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentariosblog_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

--
-- Filtros para la tabla `comentariosproducto`
--
ALTER TABLE `comentariosproducto`
  ADD CONSTRAINT `comentariosproducto_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentariosproducto_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;
