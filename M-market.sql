-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 02:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shewaber`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(40) NOT NULL,
  `user` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `comment` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user`, `email`, `comment`) VALUES
(1, 'aku', 'akremmuktar332@gmail.com', ''),
(4, 'aku', 'akremmuktar332@gmail.com', 'this is comment'),
(5, 'aku', 'akremmuktar332@gmail.com', 'this is comment'),
(6, 'aku', 'akremmuktar332@gmail.com', 'this is comment2'),
(7, 'aku', 'akremmuktar332@gmail.com', 'this is comment2'),
(8, 'aku', 'akremmuktar332@gmail.com', 'this is comment3'),
(9, 'aku2', 'akremmuktar332@gmail.com', 'this is comment have to be wrong'),
(10, 'aku', 'akremmuktar332@gmail.com', 'this is comment have to be rite'),
(11, 'codechat', 'code@gmail.com', 'this is comment');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(9, 'aku', 'akremmuktar332@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'yakoba', 'yakoba@gmail.com', '81b073de9370ea873f548e31b8adc081'),
(13, 'aku2', 'akremmuktar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'temu', 'temu@gmail.com', '6562c5c1f33db6e05a082a88cddab5ea'),
(16, 'Guest', 'guest@gmail.com', '0000'),
(19, 'codechat', 'code@gmail.com', '81b073de9370ea873f548e31b8adc081');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(40) NOT NULL,
  `user` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `ammount` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user`, `email`, `password`, `ammount`) VALUES
(1, 'aku', 'akremmuktar332@gmail.com', '81b073de9370ea873f548e31b8adc081', 19828),
(3, 'temu', 'temu@gmail.com', '2e92962c0b6996add9517e4242ea9bdc', 0),
(4, 'codechat', 'code@gmail.com', '2e92962c0b6996add9517e4242ea9bdc', 9960);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD `role` VARCHAR(255);
--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--

-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
