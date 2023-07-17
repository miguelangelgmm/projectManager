-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2023 a las 22:05:15
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectmanager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendar`
--

INSERT INTO `calendar` (`id`, `user_id`, `date`, `content`, `type`) VALUES
(1, 1, '2023-07-01', 'Sssd', 0),
(2, 1, '2023-07-02', 'ASD', 2),
(3, 1, '2023-07-03', 'ASDSD', 1),
(4, 1, '2023-07-04', 'asd', 0),
(5, 8, '2023-07-01', 'ad', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `contenido` text NOT NULL,
  `title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `contenido`, `title`) VALUES
(3, 1, 'sad', 'sad'),
(4, 1, 'wqe', 'wewq'),
(5, 1, 'qwer', 'wqer'),
(6, 1, 'wererw', 'wer'),
(7, 1, 'rwerewr', 'ewr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_notificate` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` text NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `creator_id`) VALUES
(1, 'MiguelyDavid', 'ccd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_assignments`
--

CREATE TABLE `project_assignments` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `project_assignments`
--

INSERT INTO `project_assignments` (`project_id`, `user_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(120) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `state` tinyint(4) NOT NULL,
  `subtasks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `project_id`, `name`, `description`, `start_date`, `end_date`, `state`, `subtasks`) VALUES
(18, 1, 'rreq', 'qewr', '2023-07-11', '2023-07-11', 2, 'wqer'),
(19, 1, 'af', 'asdf', '2023-07-11', '2023-07-11', 2, 'adsf'),
(22, 1, 'Desarrollo de interfaz', 'Desarrollo del front-end: Aquí se implementa el diseño de la interfaz utilizando HTML, CSS y JavaScript. Se crean los co', '2023-07-11', '2023-07-11', 0, 'adsf,dsafd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks_assignments`
--

CREATE TABLE `tasks_assignments` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tasks_assignments`
--

INSERT INTO `tasks_assignments` (`task_id`, `user_id`) VALUES
(18, 1),
(19, 1),
(22, 1),
(22, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `image`) VALUES
(1, 'miguel', 'Miguel22!', 'miguel@gmail.com', 'miguel.jpg'),
(2, 'David', 'David22!', 'david@gmail.com', 'David.jpg'),
(3, 'Jose', 'Jose123!', 'jose@gmail.com', 'default.png'),
(4, 'pepe1', 'Pepe123!', 'josea@gmail.com', 'default.png'),
(5, 'Mario', 'Mario123!', 'mario@gmail.com', 'default.png'),
(6, 'Marta', 'Marta123!', 'marta@gmail.com', 'default.png'),
(7, 'Maria', 'Maria123!', 'maria@gmail.com', 'Maria.jpg'),
(8, 'luigi', '$2y$10$EzZis239WVn2tD55A2x.Luv/I6nhtuZtNuXLMpWVLqoOdxtXl3/XK', 'dfasd2sddasd3as2d@gmail.com', 'default.png'),
(9, 'miguelpr', '$2y$10$SC/lSUeJCX.KRm.W1aXXZuhYMm8SSTKEnG3a6g2Kvv59PtPYN/XP6', 'asf@gmasil.com', 'default.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendar_user` (`user_id`);

--
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_user` (`user_id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notificate` (`user_notificate`),
  ADD KEY `user_send` (`user_id`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `user_createproject` (`creator_id`);

--
-- Indices de la tabla `project_assignments`
--
ALTER TABLE `project_assignments`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `user_assign` (`user_id`);

--
-- Indices de la tabla `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_project` (`project_id`);

--
-- Indices de la tabla `tasks_assignments`
--
ALTER TABLE `tasks_assignments`
  ADD PRIMARY KEY (`task_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `user_notificate` FOREIGN KEY (`user_notificate`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_send` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `user_createproject` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `project_assignments`
--
ALTER TABLE `project_assignments`
  ADD CONSTRAINT `project_assignments` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_assign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Filtros para la tabla `tasks_assignments`
--
ALTER TABLE `tasks_assignments`
  ADD CONSTRAINT `tasks_assignments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_assignments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
