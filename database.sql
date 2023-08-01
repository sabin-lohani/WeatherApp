-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 04:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `city` varchar(20) NOT NULL,
  `fetched_on` datetime NOT NULL,
  `country` varchar(4) NOT NULL,
  `timezone` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `weather_condition` varchar(30) NOT NULL,
  `pressure` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `wind_sp` float NOT NULL,
  `wind_deg` int(11) NOT NULL,
  `icon` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`city`, `fetched_on`, `country`, `timezone`, `temperature`, `weather_condition`, `pressure`, `humidity`, `wind_sp`, `wind_deg`, `icon`) VALUES
('Chickasaw', '2022-09-01 11:52:58', 'US', -18000, 24.88, 'Clear - clear sky', 1015, 83, 2.06, 310, '01n'),
('Kathmandu', '2022-09-01 11:50:29', 'NP', 20700, 24.12, 'Clouds - broken clouds', 1017, 83, 1.54, 320, '04d'),
('Pokhara', '2022-09-01 11:50:43', 'NP', 20700, 24.87, 'Rain - light rain', 1010, 90, 1.16, 154, '10d');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
