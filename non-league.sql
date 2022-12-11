-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 07:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `non-league`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Players'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(3) NOT NULL,
  `message_player_id` int(3) NOT NULL,
  `message_sender` varchar(255) NOT NULL,
  `message_email` varchar(255) NOT NULL,
  `message_content` text NOT NULL,
  `message_date` date NOT NULL,
  `message_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_player_id`, `message_sender`, `message_email`, `message_content`, `message_date`, `message_status`) VALUES
(5, 4, 'harry', 'test@test.com', 'this is message', '2022-10-18', 'Unread'),
(6, 7, 'harry', 'hgaskell92@hotmail.com', 'a message', '2022-10-26', 'Unread'),
(7, 8, 'gerry', 'test@test.com', 'looking good', '2022-10-26', 'Unread'),
(8, 10, 'gerry', 'test@test.com', 'hi david......', '2022-11-02', 'Unread'),
(12, 11, 'tim', 'tim@test.com', 'hi tim again', '2022-11-02', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(3) NOT NULL,
  `player_category_id` int(3) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `player_image` text NOT NULL,
  `player_dob` date NOT NULL,
  `player_position` text NOT NULL,
  `player_region` text NOT NULL,
  `player_bio` text NOT NULL,
  `player_email` text NOT NULL,
  `player_height` int(3) NOT NULL,
  `player_preferred_foot` text NOT NULL,
  `player_tags` varchar(255) NOT NULL,
  `player_user_id` int(255) NOT NULL,
  `player_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_category_id`, `player_name`, `player_image`, `player_dob`, `player_position`, `player_region`, `player_bio`, `player_email`, `player_height`, `player_preferred_foot`, `player_tags`, `player_user_id`, `player_status`) VALUES
(10, 0, 'David Jones', 'campo.jpg', '1992-04-21', 'Defender', 'Wales', 'jones bio', 'test@test.com', 136, 'Right', 'Featured', 15, 'Active'),
(11, 0, 'Matt Cook', 'gomez.jpg', '2022-03-16', 'Midfielder', 'Scotland', 'cooks bio', 'test@test.com', 177, 'Right', '', 16, 'Active'),
(12, 0, 'Robert Parker', 'parker.JPG', '2009-06-17', 'Goalkeeper', 'England', 'parkers bio', 'parker@test.com', 183, 'Left', '', 19, 'Active'),
(13, 0, 'Tom Kelly', 'kelly.JPG', '2020-01-15', 'Attacker', 'Northern Ireland', 'kellys bio', 'tom@test.com', 190, 'Left', '', 20, 'Active'),
(14, 0, 'Kalsoom', 'kal.JPG', '2022-08-09', 'Defender', 'England', 'kal likes to play ', 'kal@test.com', 80, 'Right', '', 23, 'Active'),
(15, 0, 'Tim Smith', '', '2015-07-22', 'Defender', 'England', 'dsfdgs', 'test@test.com', 147, 'Left', '', 13, 'Active'),
(16, 0, 'User Check', '', '2004-02-04', 'Defender', 'England', 'jhjffgvbf', 'test@test.com', 76, 'Left', '', 13, 'Active'),
(17, 0, 'Mark Green', '', '2003-02-12', 'Attacker', 'Scotland', 'lorem ipson', 'green@test.com', 128, 'Left', '', 21, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_handle` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_handle`, `user_firstname`, `user_lastname`, `user_password`, `user_email`, `user_role`, `randSalt`) VALUES
(13, 'hgaskell', 'Harry', 'Gaskell', '$2y$10$iusesomecrazystrings2uXpDj7PNsdvAx0ySGMSdgKFPdTXZjg46', 'hgaskell92@hotmail.com', 'Admin', '$2y$10$iusesomecrazystrings22'),
(15, 'willy2', 'Will', 'Fox', '$2y$10$iusesomecrazystrings2uXpDj7PNsdvAx0ySGMSdgKFPdTXZjg46', 'test@test.com', 'User', '$2y$10$iusesomecrazystrings22'),
(16, 'tim1', '', '', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'tim@test.com', 'User', '$2y$10$iusesomecrazystrings22'),
(19, 'kim2', '', '', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'kim@test.com', 'User', '$2y$10$iusesomecrazystrings22'),
(20, 'ted1', '', '', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'ted@test.com', 'User', '$2y$10$iusesomecrazystrings22'),
(21, 'mark1', '', '', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'mark@test.com', 'User', '$2y$10$iusesomecrazystrings22'),
(22, 'craig1', '', '', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'craig@test.com', 'Admin', '$2y$10$iusesomecrazystrings22'),
(23, 'kal007', '', '', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'kal@test.com', 'User', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
