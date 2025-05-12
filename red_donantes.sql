-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2025 a las 17:05:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `red_donantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('administrador','doctor') NOT NULL DEFAULT 'administrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `password`, `rol`) VALUES
(1, 'admin1', '$2y$10$ayhdLI/dq.3jQm8sHKlFSOUGzh4VrI6.NvA9kaBLbxBY8RlVkA9N6', 'administrador'),
(2, 'doctor1', '$2y$10$rqBRc2e75t3oY1goxPwp7eE0vT7aWBHSrYv8OhBvoFD9wXYYfAunC', 'doctor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_donacion` enum('voluntaria','paciente') NOT NULL,
  `nombre_paciente` varchar(100) DEFAULT NULL,
  `numero_afiliacion_paciente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donaciones`
--

INSERT INTO `donaciones` (`id`, `usuario_id`, `fecha`, `tipo_donacion`, `nombre_paciente`, `numero_afiliacion_paciente`) VALUES
(1, 4, '2025-01-07', 'voluntaria', NULL, NULL),
(2, 4, '2025-02-12', 'voluntaria', NULL, NULL),
(3, 4, '2025-02-19', 'voluntaria', NULL, NULL),
(4, 4, '2025-02-11', 'paciente', 'asdfg', '123456789'),
(8, 14, '2024-09-04', 'voluntaria', NULL, NULL),
(9, 15, '2024-04-03', 'voluntaria', NULL, NULL),
(10, 16, '2023-02-19', 'voluntaria', NULL, NULL),
(11, 17, '1999-06-23', 'voluntaria', NULL, NULL),
(12, 18, '2022-08-19', 'voluntaria', NULL, NULL),
(13, 19, '2024-12-13', 'paciente', 'Rafael Ignacio Suárez Camacho', '1234567'),
(14, 20, '2025-04-03', 'voluntaria', NULL, NULL),
(15, 21, '2024-01-24', 'voluntaria', NULL, NULL),
(16, 22, '2024-12-12', 'voluntaria', NULL, NULL),
(17, 23, '2023-10-03', 'voluntaria', NULL, NULL),
(18, 24, '2024-10-27', 'voluntaria', NULL, NULL),
(19, 25, '2025-01-20', 'voluntaria', NULL, NULL),
(20, 26, '2024-10-09', 'voluntaria', NULL, NULL),
(21, 27, '2024-07-09', 'voluntaria', NULL, NULL),
(22, 28, '2024-12-14', 'paciente', 'Mariana Rocío Vargas Lucero', ''),
(23, 28, '2024-06-04', 'paciente', 'Rafael Ignacio Suárez Camacho', '452412874');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `tipo_sangre` varchar(5) DEFAULT NULL,
  `ultima_donacion` date DEFAULT NULL,
  `ha_donado` tinyint(1) DEFAULT 0,
  `sexo` char(1) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `dui` varchar(10) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `correo`, `contraseña`, `nombre`, `telefono`, `fecha_nacimiento`, `direccion`, `tipo_sangre`, `ultima_donacion`, `ha_donado`, `sexo`, `foto_perfil`, `fecha_registro`, `dui`, `edad`, `ocupacion`, `peso`) VALUES
(1, 'modificado123', 'modificado@example.com', '$2y$10$TTwxv4nOn7/aE08Wcq93v.PtwjySk4GmjgyJM3bgPwyGHeLKSy7cC', 'Nombre Modificado', '999999999', '1990-01-01', 'Nueva dirección 123', 'B+', '2025-01-15', 1, 'F', NULL, '2025-05-04 03:59:16', NULL, NULL, NULL, 0),
(4, 'Némesis Alejandra', 'nemesis.horan3009@gmail.com', NULL, 'Némesis Alejandra Valencia Rivera', '23333335', '2002-09-30', 'sdfghjkl', 'A+', '2025-02-11', 1, 'F', 'https://lh3.googleusercontent.com/a/ACg8ocL7tQtlIr7uGJkyARiGhqr3hgaQoQ0odIqAQjh7d7TNPhOSgqcPmA=s96-c', '2025-05-04 06:42:24', '12345678-9', 22, 'estudiante', 65),
(14, 'JuanRamírez ', 'JuanRamirez@gmail.com', '$2y$10$bbTEo/T33b44LWguVn8Ec.hXheDm9N.Uy27uFh2dZ/njnpyNdk8X6', 'Juan Carlos Ramírez Gómez', '70123456', '1992-02-21', 'Calle El Progreso #12, Colonia Escalón, San Salvador', 'O-', '2024-09-04', 1, 'M', 'Public/Uploads/68216a18028de_3176151.png', '2025-05-12 03:11:55', '01234567-8', 33, 'Médico general', 70),
(15, 'LuisMartinez', 'LuisMartinez@gmail.com', '$2y$10$KypptgXaeW5bpddeJSZSpupJ3Kov3nZOsnrO226yO7Kfv7HKcOvhm', 'Luis Alberto Martínez Pérez', '71234567', '1985-08-15', 'Pasaje Los Cipreses #7, Colonia San Patricio, Soyapango', 'O+', '2024-04-03', 1, 'M', 'Public/Uploads/68216ac882c80_3176151.png', '2025-05-12 03:26:18', '12345678-9', 39, 'Ingeniero civil', 80),
(16, 'JoseSanchez', 'JoseSanchez@gmail.com', '$2y$10$ZGe7c4qRYStr01OdPmMMSeyneX3MlJoqjYQtcrZKqpkFmfrmy3bGO', 'José Antonio Sánchez Ruiz', '72345678', '1968-07-11', 'Avenida Las Camelias #45, Colonia Miramonte, San Salvador', 'AB-', '2023-02-19', 1, 'M', 'Public/Uploads/68216bc63b69d_3176151.png', '2025-05-12 03:30:36', '23456789-0', 56, 'Profesor de secundaria', 85),
(17, 'CarlosHerrera', 'CarlosHerrera@gmail.com', '$2y$10$h0QulYuwWRyyHk2c.ZXi6e8ipyyULqpCNlGNt3bvNKfov8d6wZyxS', 'Carlos Eduardo Herrera Díaz', '73456789', '1940-11-27', 'Calle Antigua a Zacamil #98, Colonia Zacamil, Mejicanos', 'AB+', '1999-06-23', 1, 'M', 'Public/Uploads/68216cebd5521_3176151.png', '2025-05-12 03:35:34', '34567890-1', 84, 'Profesor de secundaria', 75),
(18, 'MarcoTorres', 'MarcoTorres@gmail.com', '$2y$10$/FPbl7nWJyQn6HedbLcCvOVPymmlx8/4ZDdzoztmzPpHE3KLOGldi', 'Marco Alejandro Torres Molina', '74567890', '1998-05-15', '2a Calle Oriente #110, Barrio El Centro, Santa Ana', 'B-', '2022-08-19', 1, 'M', 'Public/Uploads/68216daedfa13_3176151.png', '2025-05-12 03:38:56', '45678901-2', 26, 'Abogado', 72),
(19, 'MiguelMorales', 'MiguelMorales@gmail.com', '$2y$10$Wa7EIeMsCLe3orDkaorR7ekhbTid6A2MerJ3.CxIo8ybAC.yp1twe', 'Miguel Ángel Morales Castro', '76789012', '1985-07-06', 'Avenida Roosevelt Norte #24, Colonia Roma, San Miguel', 'B+', '2024-12-13', 1, 'M', 'Public/Uploads/68216e5ec558f_3176151.png', '2025-05-12 03:41:28', '67890123-4', 39, 'Arquitecto', 75),
(20, 'JorgeOrtega', 'JorgeOrtega@gmail.com', '$2y$10$whGTal9iy.qCOQyywCiuzOuDvMH2iQjcKp0Kv9CSkjmZ1KLqFZHbS', 'Jorge Luis Ortega Navarro', '77890123', '1995-03-15', 'Pasaje Los Pinos #9, Residencial La Cima, San Salvador', 'B+', '2025-04-03', 1, 'M', 'Public/Uploads/68216f288cb71_3176151.png', '2025-05-12 03:45:25', '78901234-5', 30, 'Mecánico automotriz', 84),
(21, 'PedroLopez', 'PedroLopez@gmail.com', '$2y$10$zuNYrbidBn8O83aSPfqw5.h/W4hikJkCt9ibLHfC/LWrjCSKUBqz6', 'Pedro Javier López Vargas', '78901234', '2000-07-05', 'Calle Los Álamos #15, Colonia Médica, San Salvador', 'A-', '2024-01-24', 1, 'M', 'Public/Uploads/68216fe0e01b3_3176151.png', '2025-05-12 03:48:10', '89012345-6', 24, 'Panadero', 79),
(22, 'FernandoRivas', 'FernandoRivas@gmail.com', '$2y$10$wADijEmtnQO5WzK8fKBJoes12g1UEY41QPfo3hmySLXEUx715kGNy', 'Fernando Daniel Rivas Soto', '79012345', '1997-09-02', 'Calle Principal #36, Colonia El Trébol, Apopa', 'A+', '2024-12-12', 1, 'M', 'Public/Uploads/682170d11d785_3176151.png', '2025-05-12 03:52:29', '90123456-7', 27, 'Electricista', 67),
(23, 'RicardoAguirre', 'RicardoAguirre@gmail.com', '$2y$10$qbNiBL0b5kA.l1TIVpJsSOC5z9ZdC0KMgJjh0BYZEDqrTiwBY3/Ai', 'Ricardo Manuel Aguirre León', '60123456', '1997-08-10', '5a Avenida Sur #22, Barrio El Calvario, Santa Tecla', 'O-', '2023-10-03', 1, 'M', 'Public/Uploads/68217188e48e3_3176151.png', '2025-05-12 03:54:56', '14725836-2', 27, 'Contador público', 71),
(24, 'MariaGonzalez', 'MariaGonzalez@gmail.com', '$2y$10$lKkQEs7pzPKCYx6drKqtx.cKNGvz12nK/vXM7ajdXoXQ7ZXWLKxI.', 'María Fernanda González López', '61234567', '1999-01-21', 'Calle Real #50, Residencial Altavista, Ilopango', 'AB-', '2024-10-27', 1, 'F', 'Public/Uploads/6821734c9a7a4_images.png', '2025-05-12 04:03:12', '25836914-5', 26, 'Enfermera', 58),
(25, 'AnaRodriguez', 'AnaRodriguez@gmail.com', '$2y$10$nUWI4hvOx2wo.vNib3m3HONIT.LCHSkmjSrgxDDl8Ay/MbLO9BYn.', 'Ana Sofía Rodríguez Herrera', '62345678', '1988-09-29', 'Avenida Las Rosas #27, Colonia San Benito, San Salvador', 'O-', '2025-01-20', 1, 'F', 'Public/Uploads/682173ec43eff_images.png', '2025-05-12 04:05:34', '36947158-7', 36, 'Dentista', 66),
(26, 'LauraJimenez', 'LauraJimenez@gmail.com', '$2y$10$PXAgRXs4peeJoux4NWjtmOOFXBsSU87pL6fbncN.YKM9D19wEj2xO', 'Laura Isabel Jiménez Torres', '63456789', '2002-07-26', 'Pasaje El Sauce #3, Urbanización Las Delicias, Santa Ana', 'AB+', '2024-10-09', 1, 'F', 'Public/Uploads/682175340b628_images.png', '2025-05-12 04:11:10', '47158269-1', 22, 'Farmacéutica', 73),
(27, 'PaulaVega', 'PaulaVega@gmail.com', '$2y$10$qfIcsj/2Z4D1lgRH21eEuOj1rvkdv3rDzCIJqKHXavm3B4U2Bkq5i', 'Paula Andrea Vega Castillo', '64567890', '1979-05-15', 'Avenida Cuscatlán #16, Colonia Miraflores, Sonsonate', 'B+', '2024-07-09', 1, 'F', 'Public/Uploads/682175fddff7d_images.png', '2025-05-12 04:14:35', '58269370-4', 45, 'Estilista', 76),
(28, 'CamilaDiaz', 'CamilaDiaz@gmail.com', '$2y$10$waWf49HmhhsQKKepBXGxuO1aP2173Y8HId8hTpcy3THsKblJEERHu', 'Camila Alejandra Díaz Romero', '64567890', '2005-05-13', 'Calle a Planes de Renderos #40, Colonia San Mateo, San Salvador', 'O+', '2024-06-04', 1, 'F', 'Public/Uploads/682176c07970a_images.png', '2025-05-12 04:17:29', '69370481-6', 19, 'Diseñadora gráfica', 81);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
