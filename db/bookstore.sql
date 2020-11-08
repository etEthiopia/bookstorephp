-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 01:50 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `ISBN` int(50) NOT NULL COMMENT 'ISBN NUMBER',
  `Author_Name` varchar(100) NOT NULL,
  `Book_Title` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Publisher` varchar(100) NOT NULL,
  `Edition` int(11) NOT NULL,
  `Book_Image` text NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Book_Description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`ISBN`, `Author_Name`, `Book_Title`, `Category`, `Publisher`, `Edition`, `Book_Image`, `Price`, `Quantity`, `Book_Description`) VALUES
(19, 'Peter Seibel', 'Coders at work', 'programming', 'nova books', 1, 'images/Peter SeibelCoders at work.jpg', '100', 40, 'This book includes interviews with some of the most successful programmers alive. Their experiences will help a fellow student in a massive way'),
(18, 'Douglas E. Comer', 'InterNetworking with TCP/IP', 'networking', 'tcpbooks', 6, 'images/Douglas E. ComerInterNetworking with TCPIP.jpg', '200', 14, 'This is the book which will take you by a storm in terms of networking. You will be very interested in the subject matter just by reading a few pages.'),
(17, 'Arnold Robbins', 'Linux programming by Example', 'Linux Programming', 'PTR', 1, 'images/Arnold RobbinsLinux programming by Example.jpg', '250', 15, 'This book is very good tutor for the operating system of Linux, And very helpful for Linux programmers.'),
(20, 'Y. Daniel Liang', 'Intro to Java Programming', 'java programming', 'willey', 9, 'images/Y. Daniel LiangIntro to Java Programming.jpg', '300', 10, 'This is a step by step guide for starting java programming.'),
(21, 'Rollen Geln', 'Java Programming', 'java programming', 'wikibooks', 3, 'images/Rollen GelnJava Programming.jpg', '100', 14, 'This a fun, and graphic book to learn java.'),
(22, 'James Barrat', 'Our Final Invention', 'Artificial Intellegence', 'idea Books', 1, 'images/James BarratOur Final Invention.jpg', '500', 14, 'This book is entitled of AI and the end of the human era. Explains the future of us and the smart robots which are coming.'),
(23, 'Aaron Gustafson', 'Adaptive Web Design', 'Web Design', 'Chamelon books', 1, 'images/Aaron GustafsonAdaptive Web Design.jpg', '400', 19, 'Very easy, nice and contains many graphic examples for web design templates.'),
(24, 'Mark Luiz', 'Programming Python', 'python programming', 'OREILLY', 4, 'images/Mark LuizProgramming Python.jpg', '200', 13, 'Really easy book to learn python in a short time'),
(49, 'Endriyas Haile', 'Java Programing 1', 'Java Programming', 'AAiT books', 2, 'images/d360414ece0a55cb9dfeeefc537cd917.jpg', '400', 15, 'This book is really good'),
(48, 'Endriyas Haile', 'Java Programing 1', 'Java Programming', 'AAiT books', 4, 'images/65358a2c9ee069ac3d0fd45f4d4e458c.jpg', '200', 20, 'This book is really good');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `rent_day` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `return_day` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `Book_id`, `User_id`, `rent_day`, `return_day`) VALUES
(7, 18, '4', '2018-06-09 21:00:00', '2018-06-09 21:00:00'),
(6, 17, '4', '2018-06-09 21:00:00', '2018-06-09 21:00:00'),
(8, 19, '4', '2018-06-09 21:00:00', '2018-06-09 21:00:00'),
(11, 24, '4', '2018-06-20 21:00:00', '2018-06-20 21:00:00'),
(19, 21, '16', '2018-06-20 21:00:00', '2018-06-20 21:00:00'),
(18, 24, '16', '2018-06-20 21:00:00', '2018-06-20 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(5) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `email_address` varchar(40) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `password_key` varchar(20) NOT NULL,
  `join_table` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `user_fname`, `user_lname`, `user_type`, `email_address`, `Phone_Number`, `password_key`, `join_table`) VALUES
(1, 'dagmawi', 'negussu', 'Admin', 'daginegussu@gmail.com', '+251937886725', 'bookstore', '2018-06-07 21:00:00'),
(4, 'Abenezer', 'Kinde', 'User', 'abkinde@gmail.com', '+25195000089', 'firmino', '2018-06-08 03:30:17'),
(2, 'dave', 'yonas', 'User', 'daveY@gmail.com', '+251943869199', 'dava', '2018-06-08 03:21:46'),
(5, 'daniel', 'geremew', 'User', 'daniG@gmail.com', '+25195789900', 'mycutedog', '2018-06-08 06:28:48'),
(12, 'desalegn', 'mihret', 'User', 'dese@gmail.com', '+25195567889', 'desse', '2018-06-08 06:58:12'),
(22, 'Biruk', 'Nigusse', 'User', 'biruk@yahoo.com', '+251909787654', 'birukn', '2018-06-22 08:09:29'),
(15, 'abel', 'tefera', 'User', 'ab16@gmail.com', '+251923886725', 'reminder', '2018-06-11 06:45:23'),
(23, 'Negussu', 'Wube', 'User', 'nugu@gmail.com', '+251934889077', 'zxcvbn', '2018-06-22 03:11:03'),
(17, 'Endriyas', 'Haile', 'User', 'endu@gmail.com', '+25195000089', 'endu', '2018-06-21 06:17:12'),
(25, 'Dani', 'Man', 'User', 'dani@ethionet.com', '+251934889011', 'qwertyuio', '2018-06-22 03:31:00'),
(24, 'Wondemagegn', 'web', 'User', 'wonde@hotmal.com', '+25167889900', 'wonde', '2018-06-03 21:00:00'),
(26, 'Abebe', 'Haile', 'User', 'abebe@gmail.com', '+25195000089', 'qwertyui', '2018-06-22 09:01:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_table`
--
ALTER TABLE `book_table`
  MODIFY `ISBN` int(50) NOT NULL AUTO_INCREMENT COMMENT 'ISBN NUMBER', AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
