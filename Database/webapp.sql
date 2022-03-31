-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 03:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `userId` int(255) NOT NULL,
  `robotName` varchar(255) NOT NULL,
  `gameName` varchar(255) NOT NULL,
  `betAmount` int(255) NOT NULL DEFAULT 0,
  `position` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userID`, `message`) VALUES
(80, 16, 'bro'),
(81, 16, 'hello'),
(82, 14, 'bro'),
(83, 14, 'hoooo'),
(84, 14, 'peee'),
(85, 14, 'Terry');

-- --------------------------------------------------------

--
-- Table structure for table `contact_admin`
--

CREATE TABLE `contact_admin` (
  `IDContact` int(255) NOT NULL,
  `viewer_partc` varchar(5) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `image_problem` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_admin`
--

INSERT INTO `contact_admin` (`IDContact`, `viewer_partc`, `Message`, `image_problem`, `email`) VALUES
(2, 'parti', 'Heeey Girlz', '', 'hey@yahoo.com'),
(3, 'viewe', 'Martino is my nemico', '', 'violettafazzi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `IDFeedback` int(255) NOT NULL,
  `ev_cool_ent` varchar(255) NOT NULL,
  `future_eve` varchar(255) NOT NULL,
  `viewer_partc` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `name` varchar(250) NOT NULL,
  `Descrption` varchar(250) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `robots`
--

CREATE TABLE `robots` (
  `robotName` varchar(100) NOT NULL,
  `serialNum` varchar(255) NOT NULL,
  `sound` blob NOT NULL,
  `robotPicture` varchar(50) NOT NULL,
  `teamName` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mac` varchar(40) NOT NULL,
  `ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `robots`
--

INSERT INTO `robots` (`robotName`, `serialNum`, `sound`, `robotPicture`, `teamName`, `points`, `password`, `mac`, `ip`) VALUES
('Robot_F', '6', '', 'path', 'Robot_F', 100, '$2y$10$uvWMvrSv22MVOOPbIZm..uG8KCCu1lbpuReejxjfEo8Vqg1H4atbK', '10:52:1c:5d:49:d0', '192.168.10.110'),
('Emmanuel', '5', '', 'path', 'Robot_E', 100, '$2y$10$EIffM/a47HOsmNsgZTKAmOEJ9CPFjr1XU6ZBRq.HYoMm2r/xD45S2', '10:52:1c:5e:0c:94', '192.168.10.109'),
('Robot_A', '1', '', 'path', 'Robot_A', 100, '$2y$10$QS9j7VnYIFVKuITFzDp2YOVLWm2dBAZTlPlNEB/hS2rvOENUkeJYO', '24:0a:c4:61:b1:48', '192.168.10.105'),
('Robot_C', '3', '', 'path', 'Robot_C', 100, '$2y$10$XmARxHqJJPXJmypF1LHV.u46cou61Qv/KpV5ZZm1ToBcjltr0mGwa', '7C:9E:BD:5F:7C:7C', '192.168.10.107'),
('Robot_D', '4', '', 'path', 'Robot_D', 100, '$2y$10$.iukM0OPqo/D1JGiTR68seV3jkEMB39mPxltO.8kNrqSoYa1egJ8u', '84:CC:A8:7E:C7:FC', '192.168.10.108'),
('Robot_B', '2', '', 'path', 'Robot_B', 100, '$2y$10$/eLCWTi77BxI6OywAzf3/e4H.Mi8FVorHEZQKw4FvGE70KXsqoIqi', 'ac:67:b2:36:29:7c', '192.168.10.106');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(3) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `points` int(255) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `DoB` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePic` varchar(30) NOT NULL DEFAULT 'defaultpfp.png',
  `vote` int(30) NOT NULL DEFAULT 0,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `email`, `points`, `firstName`, `lastName`, `DoB`, `password`, `profilePic`, `vote`, `status`) VALUES
(14, 'bro', 'bro@gmail.com', 500, 'bro', 'bro', 1, '$2y$10$1VO7CZvnQ4/PO.fMljhkYOWcfheRbbVEhxGQooNz1oBrvR2BQM9mK', 'defaultpfp.png', 0, 'user'),
(15, 'bro', 'bro@bro.com', 500, 'rbo', 'rbo', 1, '$2y$10$k54n/UD6J.xBDInRgCUBv.VnZI9SnuvFhfymZBdKsTBqMwBI7MOzC', 'defaultpfp.png', 0, 'user'),
(16, 'violetta', 'vio@vio.com', 500, 'violetta', 'violetta', 1, '$2y$10$jqaKJnA/K.J2zHmrLt73GusQ6aao4vIi/3MtQwc26qYE6nYi3bKw6', 'defaultpfp.png', 0, 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userID` (`userID`);

--
-- Indexes for table `contact_admin`
--
ALTER TABLE `contact_admin`
  ADD PRIMARY KEY (`IDContact`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`IDFeedback`);

--
-- Indexes for table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`mac`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `contact_admin`
--
ALTER TABLE `contact_admin`
  MODIFY `IDContact` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `IDFeedback` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
