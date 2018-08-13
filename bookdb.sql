-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 11:43 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `book_id` int(3) UNSIGNED NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_price` decimal(10,2) NOT NULL,
  `book_author_name` varchar(50) NOT NULL,
  `book_category_id` int(3) NOT NULL,
  `book_stocks` int(3) NOT NULL,
  `book_dated_added` datetime NOT NULL,
  `book_is_deleted` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `book_name`, `book_price`, `book_author_name`, `book_category_id`, `book_stocks`, `book_dated_added`, `book_is_deleted`) VALUES
(1, 'Resolution', '300.00', 'Joking Rowling', 6, 3, '2018-08-13 13:32:54', 0),
(2, 'Resolution', '300.00', 'Joking Rowling', 6, 3, '2018-08-13 13:33:13', 1),
(3, 'awa', '0.00', 'awdawd', 6, 0, '2018-08-13 13:33:48', 0),
(4, 'Ruled', '0.00', 'awdawd', 4, 8, '2018-08-13 13:47:37', 0),
(5, 'cuopcake', '300.00', 'lokoloko', 6, 50, '2018-08-13 14:14:32', 1),
(6, 'AWDAWD', '0.00', 'DAD', 1, 5, '2018-08-13 14:39:10', 1),
(7, '123123', '3123123.00', '123123', 3, 123123, '2018-08-13 14:46:41', 1),
(8, '00000', '200.00', 'Pointer', 2, 50, '2018-08-13 15:09:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(3) UNSIGNED NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category`) VALUES
(1, 'Romance'),
(2, 'Information Security'),
(3, 'Referrence'),
(4, 'Food'),
(5, 'Spiritual'),
(6, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `level_id` int(3) UNSIGNED NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(3) UNSIGNED NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_date_registered` datetime NOT NULL,
  `user_level_id` int(1) NOT NULL,
  `user_is_deleted` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_username`, `user_password`, `user_email`, `user_date_registered`, `user_level_id`, `user_is_deleted`) VALUES
(2, 'burukutung', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'KwakKwak@gmal.com', '2018-08-12 14:52:42', 2, 0),
(3, 'chikichiki', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'bumbumyeah@gmail.com', '2018-08-12 16:01:30', 1, 0),
(6, 'burukutung', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'KwakKwak@gmal.com', '2018-08-12 16:26:11', 1, 0),
(7, 'fbhg', '68b81972273b6524e919ec36084ce2f4a7d20422', 'za;', '2018-08-12 16:28:24', 1, 0),
(8, 'burukutung', '6facba866453e4ef6530892b3300a45739386157', 'kwak@gmail.com', '2018-08-13 10:15:03', 1, 0),
(9, 'chikichikibumbum', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yeah@gmail.com', '2018-08-13 10:19:52', 2, 0),
(11, 'burukutung', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kwak@gmail.com', '2018-08-13 10:35:46', 1, 0),
(12, 'chikichikibumbum', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kwak@gmail.com', '2018-08-13 10:35:54', 2, 0),
(13, 'burukutung', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kwak@gmail.com', '2018-08-13 10:36:45', 1, 0),
(14, 'chikichikibumbum', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'yeah@gmail.com', '2018-08-13 10:36:52', 1, 0),
(15, 'burukutung', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kwak@gmail.com', '2018-08-13 10:37:50', 1, 0),
(16, 'chikichikibumbum', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kwak@gmail.com', '2018-08-13 10:37:57', 1, 0),
(17, 'burukutung', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kwak@gmail.com', '2018-08-13 10:38:58', 1, 0),
(18, '231123312321', 'c4d1321228810da145cd71bfeddb11af02acf3a0', '21312321', '2018-08-13 10:39:44', 2, 0),
(19, '', '0f79f847571b57dd03a49dd97d215984d7a24c9c', '231123312321', '2018-08-13 10:51:19', 0, 0),
(20, '123123123', '6398bcf67edc223f4169d54ec425d144bc5bb9fe', 'awwwwwwwww', '2018-08-13 10:51:29', 1, 0),
(21, 'bbbb111', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'bbb111@bb.com', '2018-08-13 10:51:37', 2, 0),
(22, 'Mr Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', '2018-08-13 16:05:49', 1, 1),
(23, 'Mr User', '12dea96fec20593566ab75692c9949596833adc9', 'user@gmail.com', '2018-08-13 16:06:12', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `level_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
