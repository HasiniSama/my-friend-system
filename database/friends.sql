-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2021 at 08:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_id` int(11) UNSIGNED NOT NULL,
  `friend_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_name` varchar(100) NOT NULL,
  `date_started` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `friend_email`, `password`, `profile_name`, `date_started`) VALUES
(3, 'hasinisama99@gmail.com', '202cb962ac59075b964b07152d234b70', 'Hasini', '2021-09-01 17:24:58'),
(4, 'chamalsha@gmail.com', '202cb962ac59075b964b07152d234b70', 'Chamalsha', '2021-09-01 13:40:56'),
(5, 'nsadisha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Sadisha', '2021-09-01 13:41:15'),
(6, 'waruni@gmail.com', '202cb962ac59075b964b07152d234b70', 'Waruni', '2021-09-01 13:41:39'),
(7, 'supuni@gmail.com', '202cb962ac59075b964b07152d234b70', 'Supuni', '2021-09-01 13:41:56'),
(8, 'warunajith@gmail.com', '202cb962ac59075b964b07152d234b70', 'Warunajith', '2021-09-01 17:00:16'),
(9, 'krishan@gmail.com', '202cb962ac59075b964b07152d234b70', 'Krishan', '2021-09-01 13:42:40'),
(10, 'pasandevin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Devin', '2021-09-01 13:43:13'),
(11, 'Nipuni@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nipuni', '2021-09-01 17:25:53'),
(12, 'Asitha@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Asitha', '2021-09-01 17:26:13'),
(13, 'Nethmini@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Nethmini', '2021-09-01 17:26:27'),
(14, 'Mahela@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Mahela', '2021-09-01 17:26:55'),
(15, 'Poornajith@gmail.com', '202cb962ac59075b964b07152d234b70', 'Poornajith', '2021-09-01 17:27:24'),
(16, 'Vinojan@gmail.com', '202cb962ac59075b964b07152d234b70', 'Vinojan', '2021-09-01 17:28:09'),
(17, 'Radhushani@gmail.com', '202cb962ac59075b964b07152d234b70', 'Radhushani', '2021-09-01 17:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `myfriends`
--

CREATE TABLE `myfriends` (
  `friend_id1` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `friend_id2` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myfriends`
--

INSERT INTO `myfriends` (`friend_id1`, `friend_id2`) VALUES
(3, 4),
(4, 3),
(3, 5),
(5, 3),
(3, 6),
(6, 3),
(3, 10),
(10, 3),
(3, 15),
(15, 3),
(3, 17),
(17, 3),
(10, 4),
(4, 10),
(10, 11),
(11, 10),
(10, 8),
(8, 10),
(16, 3),
(3, 16),
(16, 10),
(10, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
