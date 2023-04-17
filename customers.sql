-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 apr 2023 kl 19:52
-- Serverversion: 10.4.27-MariaDB
-- PHP-version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `library`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'emil', 'hylen', 'ehylen@example.com', 'password'),
(2, 'evan', 'clarke', 'pancig@example.com', 'abc123'),
(3, 'joe', 'cavasola', 'jcavasola@example.com', 'admin'),
(4, 'jason', 'norman', 'jnorman@example.com', 'pass');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
