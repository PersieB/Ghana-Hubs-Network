-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 09:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pb40382022`
--

-- --------------------------------------------------------

--
-- Table structure for table `chairperson`
--
CREATE DATABASE pb40382022;
Use pb40382022;
CREATE TABLE `chairperson` (
  `ChairpersonID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Gmail` varchar(100) NOT NULL,
  `Phone_number` varchar(20) NOT NULL,
  `Password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chairperson`
--

INSERT INTO `chairperson` (`ChairpersonID`, `Firstname`, `Lastname`, `Username`, `Gmail`, `Phone_number`, `Password`) VALUES
(1, 'Percy', 'Brown', 'percy', 'persiebrown285@gmail.com', '+233277776087', '83794f99d5b8a52ccb44ce320df6d4e4');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `Title` varchar(225) NOT NULL,
  `Date` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Venue` varchar(225) NOT NULL,
  `Description` varchar(400) NOT NULL,
  `Logo_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Title`, `Date`, `StartTime`, `EndTime`, `Venue`, `Description`, `Logo_name`) VALUES
(1, 'Machine Learning & Artificial Intelligence Workshop', '2020-12-31', '13:00:00', '17:00:00', 'National Theartre, opposite Efua Sutherlands Park', 'This workshop seeks to equip individuals with Machine Learning and Artificial Intelligence concepts and skills to help them solve challenges through technology to make life easier to members in our society.', 'erik-mclean-mlyzucy0-38-unsplash.jpg'),
(2, 'Ghana Tech Summit', '2020-12-31', '14:00:00', '16:00:00', 'Ashesi University', 'The event seeks to equip the youth with technical skills that will help them solve challenges in their societies using technology. There will be great speakers and promises to be a wonderful occasion.', 'nmg-network-kKV1gkdVfzM-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hubs`
--

CREATE TABLE `hubs` (
  `HubID` int(11) NOT NULL,
  `Company_name` varchar(100) NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Address` varchar(225) NOT NULL,
  `Website` varchar(225) NOT NULL,
  `Description` varchar(400) NOT NULL,
  `Logo_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hubs`
--

INSERT INTO `hubs` (`HubID`, `Company_name`, `Gmail`, `Telephone`, `Address`, `Website`, `Description`, `Logo_name`) VALUES
(1, 'Ispace', 'ispace@gmail.com', '+233245031253', 'Cantonments', 'https://www.ispacegh.com/', 'iSpace Foundation is a technology hub in Ghana known to offer a co-working space, tools and facilities for entrepreneurs and startups to launch and manage their business ideas.', 'austin-distel-rxpThOwuVgE-unsplash.jpg'),
(5, 'Norkwary', 'norkwary@gmail.com', '+233277776087', 'Accra', 'https://www.ispacegh.com/', 'Norkwary equips people with Machine Learning and Artificial Intelligence skills in order to help the youth solve technical skills.  The aim of the enterprise is to be the leading Artificial Intelligence company in Africa.', 'danielle-cerullo-dN7085rORJo-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `individual_partnership`
--

CREATE TABLE `individual_partnership` (
  `IndPartID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `HubID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individual_partnership`
--

INSERT INTO `individual_partnership` (`IndPartID`, `UserID`, `HubID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registered_events`
--

CREATE TABLE `registered_events` (
  `UserEventID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_events`
--

INSERT INTO `registered_events` (`UserEventID`, `UserID`, `EventID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Gmail` varchar(100) NOT NULL,
  `Phone_number` varchar(20) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Firstname`, `Lastname`, `Username`, `Gmail`, `Phone_number`, `Location`, `Password`) VALUES
(1, 'George', 'Brown', 'george', 'persiebrown285@gmail.com', '0543814371', 'Accra', '10992b699c898d4d59f5e782323116f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chairperson`
--
ALTER TABLE `chairperson`
  ADD PRIMARY KEY (`ChairpersonID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `hubs`
--
ALTER TABLE `hubs`
  ADD PRIMARY KEY (`HubID`),
  ADD UNIQUE KEY `Gmail` (`Gmail`);

--
-- Indexes for table `individual_partnership`
--
ALTER TABLE `individual_partnership`
  ADD PRIMARY KEY (`IndPartID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `HubID` (`HubID`);

--
-- Indexes for table `registered_events`
--
ALTER TABLE `registered_events`
  ADD PRIMARY KEY (`UserEventID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chairperson`
--
ALTER TABLE `chairperson`
  MODIFY `ChairpersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hubs`
--
ALTER TABLE `hubs`
  MODIFY `HubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `individual_partnership`
--
ALTER TABLE `individual_partnership`
  MODIFY `IndPartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `registered_events`
--
ALTER TABLE `registered_events`
  MODIFY `UserEventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `individual_partnership`
--
ALTER TABLE `individual_partnership`
  ADD CONSTRAINT `individual_partnership_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `individual_partnership_ibfk_2` FOREIGN KEY (`HubID`) REFERENCES `hubs` (`HubID`);

--
-- Constraints for table `registered_events`
--
ALTER TABLE `registered_events`
  ADD CONSTRAINT `registered_events_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `registered_events_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
