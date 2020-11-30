-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2020 at 01:30 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `integrador_bases`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `id` tinyint(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` tinyint(11) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `nombre`, `fecha`) VALUES
(1, 'I think you think too much of me', '2019-07-11'),
(2, '909', '2020-08-11'),
(3, 'Love is not dying', '2020-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `album_cancion`
--

CREATE TABLE `album_cancion` (
  `id` tinyint(11) NOT NULL,
  `id_cancion` tinyint(11) UNSIGNED NOT NULL,
  `id_album` tinyint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album_cancion`
--

INSERT INTO `album_cancion` (`id`, `id_cancion`, `id_album`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `artista`
--

CREATE TABLE `artista` (
  `id` tinyint(11) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artista`
--

INSERT INTO `artista` (`id`, `nombre`, `genero`, `descripcion`) VALUES
(1, 'EDEN', 'Indie', 'Eden es un srtista que lorem ipsum dolor sit amet consectetur aditis.'),
(2, 'Jeremy Zucker', 'Pop', 'lorem ipsum dolor site amet');

-- --------------------------------------------------------

--
-- Table structure for table `artista_album`
--

CREATE TABLE `artista_album` (
  `id` tinyint(11) NOT NULL,
  `id_album` tinyint(11) UNSIGNED NOT NULL,
  `id_artista` tinyint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artista_album`
--

INSERT INTO `artista_album` (`id`, `id_album`, `id_artista`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cancion`
--

CREATE TABLE `cancion` (
  `id` tinyint(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cancion`
--

INSERT INTO `cancion` (`id`, `nombre`, `file`) VALUES
(1, '909', '/path.mp3'),
(2, 'drugs', '/path.mp3'),
(3, 'rock and roll', '/path.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` tinyint(11) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'Angel', 'angelrivasyt@hotmail.com', 'b9f2c9d4b376e09daf863404aabe93252f752a00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_cancion`
--
ALTER TABLE `album_cancion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cancion` (`id_cancion`),
  ADD KEY `id_album` (`id_album`);

--
-- Indexes for table `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artista_album`
--
ALTER TABLE `artista_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_album` (`id_album`),
  ADD KEY `id_artista` (`id_artista`);

--
-- Indexes for table `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` tinyint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `album_cancion`
--
ALTER TABLE `album_cancion`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artista`
--
ALTER TABLE `artista`
  MODIFY `id` tinyint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artista_album`
--
ALTER TABLE `artista_album`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id` tinyint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` tinyint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_cancion`
--
ALTER TABLE `album_cancion`
  ADD CONSTRAINT `album_cancion_ibfk_1` FOREIGN KEY (`id_cancion`) REFERENCES `cancion` (`id`),
  ADD CONSTRAINT `album_cancion_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id`);

--
-- Constraints for table `artista_album`
--
ALTER TABLE `artista_album`
  ADD CONSTRAINT `artista_album_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id`),
  ADD CONSTRAINT `artista_album_ibfk_2` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id`);
