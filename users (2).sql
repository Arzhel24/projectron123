-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 07:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ron_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `grade1` varchar(255) NOT NULL,
  `grade2` varchar(255) NOT NULL,
  `grade3` varchar(255) NOT NULL,
  `grade4` varchar(255) NOT NULL,
  `grade5` varchar(255) NOT NULL,
  `grade6` varchar(255) NOT NULL,
  `grade7` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `password`, `role`, `grade1`, `grade2`, `grade3`, `grade4`, `grade5`, `grade6`, `grade7`) VALUES
(1, 'ronnie', 'pamintuan', 'ronniepogi', 'pogironnie', 'admin', '', '', '', '', '', '', ''),
(4, 'lebayy', 'boblox1', 'lebay', '$2y$10$aw/PbwUXDQPglNItT.zP.eLbr6vKinK0.ers6ZD4D7zHD48pC8N8S', 'client', '', '', '', '', '', '', ''),
(6, 'brunaurrr', 'asdd', 'hana', '$2y$10$zPoboVjMOvMQy1WtYRKxeOLTLX8q1FnPUou3Ic07L3RaAQdRFSnFu', 'client', '', '', '', '', '', '', ''),
(9, 'hannii', 'pham', 'admin1', '$2y$10$pILCeZw2TRRaGTjvwvG8pOxW6SS.jn5IF7cSXJLjaX8TitbyX1EjW', 'admin', '', '', '', '', '', '', ''),
(10, 'ran', 'ni', 'client1', '$2y$10$7X.2HG.CmXmFo9SbJBKN/uDg0TDT6SXMB5Wedid25rd24Jzm1u/xu', 'client', '70', '70', '60', '60', '60', '31', '31'),
(14, 'run', 'rum', 'angelord', '$2y$10$gMsoYWdX2rYXNHjoZQMnjuA6yzqlM4J0GIiKUkNhlOK87pQB6strC', 'client', '', '', '', '', '', '', ''),
(15, 'ir', 'or', 'azure', '$2y$10$y0s/Hw4iauiwxR3.ZCmvzuMQLeolKZ85zHZzD9FR7IdGDefBMw/46', 'client', '', '', '', '', '', '', ''),
(17, 'angelu', 'lulu', 'lulu', '$2y$10$tZxq7M/nCy3kmMvPpkolY.QE6f5uVnBZpdqDGrErMRaEWfar61wZ6', 'client', '', '', '', '', '', '', ''),
(18, 'vali', 'vlau', 'kim', '$2y$10$r48KLbWqwlNm6ewCplU9XuvEEKqvkNaWg6500t0sYVCjsszcH1n9m', 'client', '99', '99', '99', '99', '99', '99', '99'),
(19, 'raven', 'salabas', 'raven', '$2y$10$8su2lLqcFVSRwjhgDJREv.ue9DUKZakS729ckJqowbKAbZ2nxaMq6', 'client', '75', '75', '75', '75', '75', '75', '75'),
(20, 'jusep', 'repil', 'jusip', '$2y$10$WuIKmqY34JsdvQ7djF2ZWu8HBcUcQYwU6SqIUE3civYcMEpxHI1Ou', 'client', '69', '69', '69', '69', '69', '69', '69');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
