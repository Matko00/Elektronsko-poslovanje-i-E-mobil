-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 12:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dizajneri`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rent_start` date NOT NULL,
  `rent_end` date NOT NULL,
  `price` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `property_type` int(11) NOT NULL,
  `rented_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image`, `location`, `description`, `rent_start`, `rent_end`, `price`, `user_id`, `active`, `property_type`, `rented_by`) VALUES
(10, '956.jpg', 'Subotica2', '3', '2021-07-20', '2021-07-21', '3', 8, 1, 4, 2),
(18, '469.jpg', 'asdasd', 'qwe', '2022-08-10', '2022-08-26', '12345', 9, 1, 3, 10),
(20, '434.jpg', 'Test subocita', 'Hotel', '2022-08-10', '2022-09-03', '1566514', 9, 0, 3, NULL),
(21, '494.jpg', 'Subotica', 'Hotel', '2022-08-31', '2022-09-04', '3000', 26, 1, 4, 27),
(22, '456.jpg', 'test', 'test', '2022-08-31', '2022-09-14', '123', 32, 1, 3, NULL),
(23, '363.jpg', 'test1', 'ddd', '2022-09-02', '2022-09-15', '3562', 26, 0, 3, NULL),
(24, '753.jpg', 'Novi Sad', 'dddd', '2022-09-01', '2022-09-11', '35000', 33, 0, 4, 32),
(25, '433.jpg', 'Subotica', 'Stan', '2022-09-02', '2022-09-10', '2500', 34, 1, 4, 28);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `ads_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `ads_id`, `code`, `userid`, `comment_date`) VALUES
(1, 'q', 10, '22', 2, '2021-08-01'),
(2, NULL, 18, 'WybunHwjauGdvxjCwwjd', 10, '2022-09-09'),
(3, NULL, 18, 'WybunHwjauGdvxjCwwjd', 10, '2022-09-09'),
(4, NULL, 18, 'LmtamqbmHgigjaerPfhv', 10, '2022-09-09'),
(5, NULL, 18, 'LmtamqbmHgigjaerPfhv', 10, '2022-09-09'),
(6, NULL, 21, 'KnnzdpQaijbsUgprmeAp', 27, '2022-09-18'),
(7, NULL, 21, 'KnnzdpQaijbsUgprmeAp', 27, '2022-09-18'),
(8, NULL, 24, 'MgirsjlLzewmilLxhgqu', 33, '2022-09-25'),
(9, NULL, 24, 'MgirsjlLzewmilLxhgqu', 33, '2022-09-25'),
(10, NULL, 24, 'RqoHvkJjaEgeJpjHxqQr', 32, '2022-09-25'),
(11, NULL, 24, 'RqoHvkJjaEgeJpjHxqQr', 32, '2022-09-25'),
(12, NULL, 25, 'OxnjssdfZsmpdivfHwnl', 28, '2022-09-24'),
(13, NULL, 25, 'OxnjssdfZsmpdivfHwnl', 28, '2022-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `seen` int(2) NOT NULL DEFAULT 0,
  `message` varchar(255) NOT NULL,
  `new_conversation` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `seen`, `message`, `new_conversation`) VALUES
(22, 10, 9, 1, 'desi', 0),
(23, 10, 9, 1, 'desidesi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `ID` int(11) NOT NULL,
  `property_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`ID`, `property_type`) VALUES
(3, 'Home'),
(4, 'Flat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `code` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registration_expires` datetime DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT 0,
  `code_password` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_password_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `firstname`, `lastname`, `phone`, `password`, `user_type`, `code`, `registration_expires`, `active`, `code_password`, `new_password_expires`) VALUES
(26, 'test@test.com', 'test@test.com', 'test', 'test', '123123123', '$2y$10$2ur2PfqfmD5bJJReHSAftuS41AkAl8NwJiOEav14y92vcdxDvQDMC', 1, 'LanBoyPjwKkcPgoYpaSkeMjzFkbKulXapIqkEjmQ', '2022-08-31 16:53:57', 1, NULL, NULL),
(27, 'test1@test.com', 'test1@test.com', 'test1', 'test1', '123123123', '$2y$10$4mg5MD.XstDHxCng7P/DPeXwJnSclvbeqKShVLvBncVWTgqWxZ4B.', 2, 'NwbjzbMsqekpCdzfpwZdrtctTovvrfZpqzkzEuyv', '2022-08-31 16:54:12', 1, NULL, NULL),
(28, 'test2@test.com', 'test2@test.com', 'test2', 'test2', '123123123', '$2y$10$nrBoEHbebhOfXulBqRYXDO4rXSnGWB81HC56Z0ma5BTDUcC.g5xRW', 2, '', NULL, 1, NULL, NULL),
(29, 'test3@test.com', 'test3@test.com', 'test3', 'test3', '123123123', '$2y$10$rMhlSVqFx3.mf0nqpxVDreyHK/WuXCVDO9/cSXqViKeygB0FGxO4W', 2, 'UgpCigSszUfmWtyFxlFspJpfGlbOrlQmvTtzRppH', '2022-08-31 18:18:36', 1, NULL, NULL),
(30, 'testing@site.com', 'testing@site.com', 'test', 'test', '123123123', '$2y$10$lu6804vj78tPTQI6ui2ZY.6RdYDV6mmJWJxBn3jawb6Bch.VTwiIO', 3, '', NULL, 1, NULL, NULL),
(31, 'matko@matko.com', 'matko@matko.com', 'test', 'test', '123123123', '$2y$10$8B/2iXN19MJhuw.C1vR4fO.Haui9LJPGIvHeAU.OOmaOWCCqL6BO.', 3, '', NULL, 1, NULL, NULL),
(32, 't@t.com', 't@t.com', 't', 't', '123123123', '$2y$10$b96VtZ.GwwwigjqzEfD2hOF2VBneh8e2Aj5jYhL8Q8uY1eJPoUl5O', 2, '', NULL, 1, NULL, NULL),
(33, 'test4@test.com', 'test4@test.com', 'test4', 'test4', '123123123', '$2y$10$B3HQCbO6d92H/AOzTXA2y.c2A6QODQscQC9uNetUHIPyQCGop2wJq', 2, '', NULL, 1, NULL, NULL),
(34, 'test5@test.com', 'test5@test.com', 'test5', 'test5', '1234567', '$2y$10$lcF51lP/serEkyX1nelpDuNdNuQPECYQ05HuN1CZs8BKq3YzO0i7y', 2, '', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `ID` int(11) NOT NULL,
  `user_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`ID`, `user_type`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Property_type` (`property_type`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `Property_type` FOREIGN KEY (`property_type`) REFERENCES `property_types` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
