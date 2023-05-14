INSERT INTO `comentariosblog` (`id`, `entradaBlog`, `usuario`, `contenido`, `fecha`, `respuesta`) VALUES
(1, 1, 3, 'Me encanta!', '2023-05-14 20:22:52', 0),
(2, 1, 2, 'Buen artículo', '2023-05-14 20:23:06', 1),
(3, 1, 3, 'Muy bueno!', '2023-05-14 20:23:14', 2),
(4, 1, 1, 'Genial', '2023-05-14 20:23:26', 0),
(5, 1, 1, 'No me convence', '2023-05-14 20:23:35', 0),
(6, 1, 3, 'Bueeno...', '2023-05-14 20:23:42', 0),
(7, 1, 2, 'Comentario 5', '2023-05-14 20:23:51', 0),
(8, 1, 3, 'Comentario 6', '2023-05-14 20:23:56', 0);

INSERT INTO `comentariosproducto` (`id`, `producto`, `usuario`, `contenido`, `fecha`, `review`) VALUES
(1, 8, 3, 'Me encanta', '2023-05-14 20:25:49', '5'),
(2, 8, 3, 'No es para tanto', '2023-05-14 20:26:03', '2');