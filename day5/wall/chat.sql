-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2018 at 02:51 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(10) UNSIGNED NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(32) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `dt`, `user`, `message`) VALUES
(1, '2018-08-23 08:31:29', 'Test', 'testtest'),
(2, '2018-08-23 08:38:37', 'User', 'Some textsdbbwertbwwwwwwwwwwwww'),
(3, '2018-08-23 09:59:22', 'Victor', 'Test\'\''),
(4, '2018-08-23 09:59:44', 'Victor', 'test\', drop'),
(5, '2018-08-23 11:10:08', 'Victor', 'wefwefwef'),
(6, '2018-08-23 11:11:53', 'User', 'lvjwerfv'),
(7, '2018-08-23 11:26:20', 'User', 'qerfef'),
(8, '2018-08-23 11:26:48', 'User', 'sdfvsvfdh'),
(9, '2018-08-23 11:38:30', 'User', 'erfrerfrferfvds'),
(10, '2018-08-23 11:40:20', 'Dude', 'dfvdfv'),
(11, '2018-08-23 12:24:25', 'wefw', 'wefwef'),
(12, '2018-08-23 12:32:57', 'Test', 'Text'),
(13, '2018-08-23 12:43:07', 'ty', 'tyjt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
