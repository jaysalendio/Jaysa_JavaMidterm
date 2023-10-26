-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 02:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activityName` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `dateOfActivity` varchar(50) DEFAULT NULL,
  `timeOfActivity` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activityName`, `location`, `dateOfActivity`, `timeOfActivity`, `image`, `remarks`, `status`, `userID`) VALUES
(10, 'bikinga', 'nasipit', '10/11/2023', '11:29 PM', 'about.jpg', 'as', 'done', 2),
(12, 'jogging', 'Family Park', '10/12/2023', '10:31 PM', 'about.jpg', 'asfsa', 'done', 1),
(13, 'asf', 'nasipit', '10/26/2023', '11:32 PM', 'wall1.png', '', 'upcoming', 1),
(14, 'jogging', 'Family Park', '11/02/2023', '08:33 PM', 'pic-3.jpg', '', 'upcoming', 1),
(15, 'mee', 'asfas', '12/31/2023', '12:59 PM', 'wall.jpg', '', 'upcoming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `created_at`, `admin_id`) VALUES
(3, 'asfas', 'asfas', '2023-10-23 14:07:06', 2),
(4, 'No Work', 'safas', '2023-10-23 14:08:30', 2),
(5, 'No Work', 'safas', '2023-10-23 14:08:31', 2),
(6, 'Holidayyy', 'asfa', '2023-10-23 14:14:00', 2),
(7, 'asfas', 'asfas', '2023-10-23 14:15:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `firstName`, `lastName`, `gender`, `address`, `email`, `password`, `role`, `status`) VALUES
(1, 'Clark', 'Anore', 'Male', 'BABAG LLC', 'clark@gmail.com', 'clark', 'user', 'active'),
(2, 'paul', 'elizalde', 'Male', 'LEYTEa', 'paul@gmail.com', 'paul', 'admin', 'active'),
(6, 'arvie', 'ingal', 'Male', 'leyte', 'arvie@gmail.com', 'arb', 'user', 'active'),
(7, 'mond', 'calma', 'male', 'mandaue', 'calma@gmail.com', 'calma', 'user', 'deactivate'),
(8, 'marvin', 'teneb', 'Female', 'bantayan', 'mars@gmail.com', 'mar', 'user', 'active'),
(9, 'ken', 'chavez', 'Male', 'nasipitt', 'ken@gmail.com', 'ken', 'user', 'active'),
(10, 'aldrinn', 'taburada', 'Other', 'talamban', 'drin@gmail.com', 'drin', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
