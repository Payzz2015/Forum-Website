-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 05:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE Database projectforum;
USE projectforum;
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Algorithms', ''),
(2, 'Architecture', ''),
(3, 'Theory Of Computation', ''),
(4, 'Database Management', ''),
(5, 'Probability &amp; Queuing', ''),
(6, 'Software Engineering', ''),
(7, 'Other', '');

-- --------------------------------------------------------

--
-- Table structure for table `quacat`
--

CREATE TABLE `quacat` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quacat`
--

INSERT INTO `quacat` (`id`, `category`) VALUES
(69, 'Algorithms'),
(70, 'Algorithms'),
(71, 'Algorithms');

-- --------------------------------------------------------

--
-- Table structure for table `quans`
--

CREATE TABLE `quans` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` mediumtext CHARACTER SET utf8 NOT NULL,
  `des` longtext CHARACTER SET utf8 NOT NULL,
  `answer` longtext CHARACTER SET utf8 DEFAULT NULL,
  `askedby` varchar(255) NOT NULL,
  `answeredby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quans`
--

INSERT INTO `quans` (`id`, `question`, `des`, `answer`, `askedby`, `answeredby`) VALUES
(69, '13123', '123123', '123123<h3>AND</h3>123123<h3>AND</h3>123<h3>AND</h3>123123123123<h3>AND</h3>123123123', '4', 'thepparat'),
(70, 'ช่วยด้วยครับ', '', '123123123<h3>AND</h3>qweqweqwe', 'thepparat', 'thepparat'),
(71, 'ช่วยด้วย', '123123', NULL, 'thepparat', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userlevel` int(1) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `userlevel`, `join_date`) VALUES
(54, '1', '$2y$10$Nv1Kwg.xLPRcVsRvMCmQ9.HUY6GyBzPDCctoG8kElKFlaAklAE7Ky', '1', '1@das.com', 0, '2020-11-12 02:24:19'),
(48, '4', '$2y$10$CwhmAP.qdy6ln.kQ0e5Cde2XKkKIAQF.fdepRvgDMx9DVYGNLsxBK', '4', '4@4.com', 0, '2020-11-10 02:35:04'),
(56, 'Alwee', '$2y$10$3D2p96FhFv7HxrCdE.1.DOCnPdyoLY7n0ceAHsACOQYT7zCNqIuwW', 'Alawee', 'Alj56@hotmail.com', 1, '2020-11-12 02:32:13'),
(55, 'john', '$2y$10$/QisUbvdzOHdbnFbX6Z7b.WzARcvGJD6zZ5rMV4Vt8/.lVAXfAURi', 'john', 'sawerq@gmail.com', 1, '2020-11-12 02:31:33'),
(53, 'thepparat', '$2y$10$gnguoVOkE9fXdCyLFV.4Qu4iHsetW1ik27JTvGCTr6h.MP/4m/7EC', 'thepparat', 'thepparat@gmail.com', 0, '2020-11-12 02:24:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`,`name`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `quacat`
--
ALTER TABLE `quacat`
  ADD PRIMARY KEY (`category`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `quans`
--
ALTER TABLE `quans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `askedby` (`askedby`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quans`
--
ALTER TABLE `quans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quacat`
--
ALTER TABLE `quacat`
  ADD CONSTRAINT `quacat_ibfk_1` FOREIGN KEY (`id`) REFERENCES `quans` (`id`),
  ADD CONSTRAINT `quacat_ibfk_3` FOREIGN KEY (`category`) REFERENCES `category` (`name`);

--
-- Constraints for table `quans`
--
ALTER TABLE `quans`
  ADD CONSTRAINT `quans_ibfk_1` FOREIGN KEY (`askedby`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
