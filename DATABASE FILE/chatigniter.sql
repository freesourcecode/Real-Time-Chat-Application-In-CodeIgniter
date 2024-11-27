-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 05:54 AM
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
-- Database: `chatigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `block_user`
--

CREATE TABLE `block_user` (
  `blocked_from` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `blocked_to` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `unique_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `user_fname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `user_lname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `user_email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bio` varchar(100) CHARACTER SET latin1 NOT NULL,
  `created_at` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `dob` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `user_pass` varchar(20) CHARACTER SET latin1 NOT NULL,
  `user_avtar` varchar(200) CHARACTER SET latin1 NOT NULL,
  `user_status` varchar(10) CHARACTER SET latin1 NOT NULL,
  `last_logout` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `unique_id`, `user_fname`, `user_lname`, `user_email`, `bio`, `created_at`, `dob`, `phone`, `address`, `user_pass`, `user_avtar`, `user_status`, `last_logout`) VALUES
(1, '5f38c3', 'jude', 'suarez', 'jude@gmail.com', 'Programmer boy', '6-8-2021', '11-02-1996', '0927277733', 'Himamaylan City', '123', '19e524ee.jpg', 'deactive', '8/9/2021, 11:26:23 AM'),
(2, '9bc8b2', 'Adones', 'Evangelista', 'adones@gmail.com', '', '9-8-2021', '', '', '', '123', 'f46f30a1.jpg', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `time` datetime(6) NOT NULL,
  `sender_message_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `receiver_message_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `message` varchar(500) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`time`, `sender_message_id`, `receiver_message_id`, `message`) VALUES
('2021-08-06 19:47:08.000000', '5f38c3', '2bc812', 'hello'),
('2021-08-06 19:47:48.000000', '2bc812', '5f38c3', 'hallo'),
('2021-08-06 21:58:16.000000', '5f38c3', '2bc812', 'gh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`unique_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
