-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2018 at 08:55 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(64) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `adminLevel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `adminLevel`) VALUES
(1, 'Trevor', 'a', 'a', 'Super'),
(2, 'Jack', 'b', 'b', 'Super'),
(3, 'Jason Blood', 'c', 'c', 'Protocol'),
(4, 'J', 'j', 'j', 'Campus Life');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `eventID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateAdded` date NOT NULL,
  `eventTime` time NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `venue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Descp` text COLLATE utf8_unicode_ci NOT NULL,
  `protApprov` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `CampApprov` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `stats` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventID`, `title`, `dateAdded`, `eventTime`, `created`, `modified`, `venue`, `Descp`, `protApprov`, `CampApprov`, `stats`) VALUES
(1, 'dele@gmail.com', 'Graduation', '2018-06-03', '15:00:00', '2018-05-03 21:50:49', '2018-05-03 21:50:49', 'Sports Complex', 'Graduation Ceremony For Students', 'Approved', 'Approved', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `registert`
--

CREATE TABLE `registert` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registert`
--

INSERT INTO `registert` (`id`, `firstname`, `lastname`, `username`, `phone`, `password`, `email`, `dept`) VALUES
(1, 'George', 'Thomas', 'George20', '08023112390', '5f4dcc3b5aa765d61d8327deb882cf99', 'opemipoharyson@rocketmail.com', 'Computer Technology'),
(2, 'Isaac', 'Olaolu', 'Isaac20', '09087776231', '5f4dcc3b5aa765d61d8327deb882cf99', 'isaacolaolu10@gmail.com', 'Computer Technology');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_ID` int(11) NOT NULL,
  `venue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_ID`, `venue`) VALUES
(14, 'Amphitheathre'),
(15, 'Andrews Park'),
(16, 'B.U.T.H.'),
(7, 'Bethel Activity Hall'),
(11, 'BUHS Auditorium'),
(4, 'Crystal Activity Hall'),
(8, 'Gideon Troopers Activity Hall'),
(17, 'Marigold Activity Hall'),
(1, 'New Horizon'),
(12, 'Pioneer Church'),
(3, 'Platinum Activity Hall'),
(10, 'Queen Esther Activity Hall'),
(5, 'Royal Activity Hall'),
(19, 'S.C.T.'),
(6, 'Samuel Akande Activity Hall'),
(21, 'Sports Complex'),
(18, 'W.R.A.'),
(9, 'Welch Activity Hall'),
(20, 'White Hall Activity Hall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registert`
--
ALTER TABLE `registert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_ID`),
  ADD UNIQUE KEY `venue` (`venue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `registert`
--
ALTER TABLE `registert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
