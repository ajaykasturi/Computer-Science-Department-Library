-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2023 at 05:59 PM
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
-- Database: `dept_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `aid` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`aid`, `admin_name`, `username`, `email`, `password`, `created_on`) VALUES
(3, 'admin', 'admin', 'admin@rgukt.ac.in', 'rgukt', '2023-08-25 22:02:56'),
(1, 'Ajay', 'root', 'root@rgukt.ac.in', 'root', '2023-08-25 20:03:13'),
(2, 'supermain root', 'superroot', 'super@rgukt.ac.in', 'super', '2023-08-25 20:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_history`
--

CREATE TABLE `admin_history` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `login_date` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_history`
--

INSERT INTO `admin_history` (`id`, `username`, `login_date`, `logout_date`) VALUES
(1, 'root', '2023-08-23 20:04:56', '0000-00-00 00:00:00'),
(2, 'root', '2023-08-23 20:05:18', '0000-00-00 00:00:00'),
(3, 'root', '2023-08-23 20:07:13', '2023-08-23 20:10:09'),
(4, 'superroot', '2023-08-23 20:10:51', '2023-08-23 20:10:59'),
(5, 'superroot', '2023-08-23 20:11:16', '2023-08-23 20:11:38'),
(6, 'root', '2023-08-23 20:11:43', '2023-08-23 20:18:06'),
(7, 'root', '2023-08-23 20:18:10', '2023-08-23 20:22:24'),
(8, 'root', '2023-08-23 20:45:14', '0000-00-00 00:00:00'),
(9, 'root', '2023-08-24 14:53:11', '0000-00-00 00:00:00'),
(10, 'root', '2023-08-25 11:29:43', '0000-00-00 00:00:00'),
(11, 'root', '2023-08-25 19:21:28', '2023-08-25 20:14:29'),
(12, 'superroot', '2023-08-25 20:14:40', '0000-00-00 00:00:00'),
(13, 'root', '2023-08-26 10:17:35', '0000-00-00 00:00:00'),
(14, 'root', '2023-08-26 20:28:54', '2023-08-26 20:28:59'),
(15, 'root', '2023-08-26 20:35:53', '2023-08-26 21:25:49'),
(16, 'superroot', '2023-08-26 21:29:02', '0000-00-00 00:00:00'),
(17, 'root', '2023-08-27 17:15:58', '2023-08-27 17:32:37'),
(18, 'root', '2023-08-28 21:00:54', '0000-00-00 00:00:00'),
(19, 'root', '2023-08-29 10:16:22', '2023-08-29 11:13:28'),
(20, 'root', '2023-08-29 12:45:22', '2023-08-29 12:58:48'),
(21, 'root', '2023-08-29 12:59:58', '2023-08-29 14:01:06'),
(22, 'root', '2023-08-29 14:12:52', '2023-08-29 14:31:18'),
(23, 'root', '2023-08-29 14:34:54', '2023-08-29 14:36:37'),
(24, 'root', '2023-08-29 20:47:21', '2023-08-29 20:47:29'),
(25, 'root', '2023-08-29 20:48:21', '2023-08-29 20:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `books_db`
--

CREATE TABLE `books_db` (
  `book_id` int(11) NOT NULL,
  `book_title` text NOT NULL,
  `book_desc` text NOT NULL,
  `book_author` text NOT NULL,
  `book_count` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_db`
--

INSERT INTO `books_db` (`book_id`, `book_title`, `book_desc`, `book_author`, `book_count`, `dt`) VALUES
(3, 'The Pragmatic Programmer: Your Journey to MasteryThe Pragmatic Programmer: Your Journey to Mastery', 'This book is a practical guide to software development, focusing on the mindset, techniques, and best practices that help programmers become more efficient and effective in their work.\r\n', ' Andrew Hunt, David Thomas', 3, '2023-07-10 21:41:18'),
(4, 'Design Patterns: Elements of Reusable Object-Oriented SoftwareThe Pragmatic Programmer:', 'This classic book presents the concept of design patterns in software development, offering reusable solutions to common design problems, and illustrating them using various programming languages.\r\n', 'Erich Gamma, Richard Helm, Ralph Johnson, John', 10, '2023-07-10 21:41:18'),
(6, 'Introduction to Algorithms', 'Widely known as \"CLRS,\" this book is a comprehensive guide to algorithms, covering a broad range of algorithms and their analysis techniques.', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein', 3, '2023-07-10 21:41:18'),
(7, 'Computer Organization and Design: The Hardware/Software Interface', 'This book provides a comprehensive introduction to computer architecture and organization, covering topics such as instruction set architecture, memory hierarchy, pipelining, and parallelism.', 'David A. Patterson, John L. Hennessy', 3, '2023-07-10 21:41:18'),
(9, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'This book emphasizes the importance of writing clean and maintainable code and provides practical guidelines, principles, and best practices for software development.\r\n', 'Robert C. Martin (Uncle Bob)', 1, '2023-07-10 21:43:18'),
(10, 'Database System Concepts', 'This book covers the fundamental concepts of database systems, including data models, database design, query processing, and transaction management.', 'Abraham Silberschatz, Henry F. Korth, S. Sudarshan', 0, '2023-07-10 21:42:18'),
(11, 'Introduction to Data Mining', 'This book provides a comprehensive introduction to data mining techniques and concepts, including data preprocessing, classification, clustering, and association analysis.', 'Pang-Ning Tan, Michael Steinbach, Vipin Kumar', 6, '2023-07-10 21:41:18'),
(47, 'Computer Networks by Rahul Sir', 'Computer Networks by Rahul Sir', 'Rahul Sir', 15, '2023-08-29 12:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `enotice`
--

CREATE TABLE `enotice` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `url` text DEFAULT NULL,
  `publisher` varchar(40) NOT NULL DEFAULT 'CSE Dept. Library RGUKT-Basar',
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enotice`
--

INSERT INTO `enotice` (`id`, `heading`, `content`, `url`, `publisher`, `dt`) VALUES
(1, 'Examination:Hall Ticket Distribution for AY22-23_[P1,P2]_Sem-2_EST(Re-Rem)_Aug & Sep -23', 'Dear students,\r\nIt is hereby informed to all the students registered for AY 22-23 PUC Sem-2 Re-Rem examinations that Hall tickets will be distributed on 26-08-23 [Saturday] near AB-II 105.All those students can collect their hall tickets in the below mentioned timings.\r\nAfter Noon: 2:30 PM to 4:30 PM\r\nSd/-\r\nController of Examinations', '2', '', '2022-07-05 00:00:00'),
(2, 'Examination:Hall Ticket Distribution for AY22-23_[P1,P2]_Sem-2_EST(Re-Rem)_Aug & Sep -23', 'Dear students,\r\nIt is hereby informed to all the students registered for AY 22-23 PUC Sem-2 Re-Rem examinations that Hall tickets will be distributed on 26-08-23 [Saturday] near AB-II 105.All those students can collect their hall tickets in the below mentioned timings.\r\nAfter Noon: 2:30 PM to 4:30 PM\r\nSd/-\r\nController of Examinations', NULL, 'ADDITIONAL COE PUC', '2023-08-26 00:00:00'),
(3, 'Testing 1 2', 'Dear all,\r\n\r\nPlease find the attached Mechanical Engineering E4-Sem1 tentative time table as on 25.08.2023.\r\n\r\nThanks & Regards/-\r\nAcademic Section 3', 'www.rgukt.ac.in 4', 'CSE Dept. RGUKT-Basar', '2023-08-28 22:30:58'),
(4, 'Testing 2', 'It is bring to fourth-year students of the Academic Year of 2023-24 attention to an opportunity to update your profile on T&P Portal. \r\n\r\nEdit Option Period:  http://tpcrt.rf.gd\r\nCommencing: 25.08.2023\r\nConcluding: 	27.08.2023\r\n\r\nDuring this brief window of three days, you have the chance to access the edit option on the T&P Portal at http://tpcrt.rf.gd \r\n\r\nPlease note that following august 27, 2023, the edit option temporarily suspended until the release of the examination results. We encourage you to seize this opportunity to update your profile, as subsequent edit options will only be accessible after the results have been declared.\r\n\r\nFor Student not registered on T&P Portal:\r\n\r\nWe wish to extend this opportunity to those students who have not registered on the T&P Portal. This serves as a chance to register.\r\n\r\n\r\nSd/-\r\nT & P Office', 'www.rgukt.ac.in', 'CSE Dept. Library RGUKT-Basar', '2023-08-26 21:10:43'),
(5, 'testing 3', 'testing 3 content', 'rgukt.ac.in', 'ajay kasturi', '2023-08-26 21:29:58'),
(6, 'Hello Sai', 'What are you doing? tomarrow come to gym at sharp 6 O clock', '', 'AJAY KASTURI', '2023-08-27 17:18:21'),
(7, 'CSE ', 'TESTING', '', '', '2023-08-28 21:15:52'),
(8, 'hello ', 'teing', '', '', '2023-08-28 21:19:16'),
(11, 'hi11', 'hi11', '11', 'CSE Dept. Library RGUKT-Basar', '2023-08-28 00:00:00'),
(12, 'T&P Office/Notice/A24/008: Job Openings for RGUKTian students at FOSSEE. IIT BombayT&P Office/Notice/A24/008: Job Openings for RGUKTian students at FOSSEE. IIT Bombay', 'T&P Office/Notice/A24/008: Job Openings for RGUKTian students at FOSSEE. IIT Bombay', 'T&P Office/Notice/A24/008: Job Openings for RGUKTian students at FOSSEE. IIT Bombay', 'CSE Dept. Library RGUKT-Basar', '2023-08-28 23:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `OTP`
--

CREATE TABLE `OTP` (
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `verify_status` int(1) NOT NULL DEFAULT 0,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OTP`
--

INSERT INTO `OTP` (`username`, `email`, `password`, `otp`, `verify_status`, `timestamp`) VALUES
('ajaykasturi', 'saikumar@gmail.com', '12345', '1234', 0, '2023-07-17 21:16:02'),
('ajayjkdsf', 'ajaykasturi2081111@gmail.com', '1', '1836', 0, '2023-07-17 21:16:30'),
('aja', 'ajaykasturi2111@gmail.com', '1', '5251', 1, '2023-07-17 21:18:26'),
('ajaysai', 'ajayreigns0@gmail.com', '1234', '2749', 1, '2023-07-17 21:31:21'),
('b182081@rgukt.ac.in', 'b182081@rgukt.ac.in', '1234', '5650', 1, '2023-07-20 19:06:25'),
('manoj', 'b182187@rgukt.ac.in', '12345', '5899', 1, '2023-08-15 22:57:59'),
('ajaykasturi2081', 'ajaykasturi2081@gmail.com', '$2y$10$arIwHVjg4a6qUzDZhJoVEOWddOkbluUyn5PJ9.9JjzuHpOngjzqna', '$2y$10$OTeqt.JzPDWV0AcAxIA1yuCCrN6C.kd9n1NRuhoLQNaUP6CBxC2VK', 1, '2023-08-24 15:37:16'),
('sai2461', 'palojisahithi@gmail.com', '$2y$10$7H0WRNJ13P9jPMqku2mVhuhTTneC/jQV0rWu/xkPHI4FyKyvpd3rq', '$2y$10$YiEYOa0gEX3ceugetNvsLelCa2aaomsSrRQlmP9Qgqbwqwd/X3e6W', 1, '2023-08-27 17:22:50'),
('ajaye', 'ajayermulla@gmail.com', '$2y$10$6KjhPWbQx9diUo0OBlDqE.5bTmDWNiXAPQt8Y5zTh7NVvlUxgAW2a', '$2y$10$Q2I0BOH6sXU38tBpjvP4fePhrSHPBRegVKo07UrKDDrismzDYr2/q', 0, '2023-08-29 12:10:33'),
('ajay1', 'ajaykasturi2@gmail.com', '$2y$10$ZBp6CJFWJsYWJ9iUJM97MeteDissLVwPYeqAALJN..PCU6IjVejVG', '$2y$10$MJu8kjo40.GtyIGuyOaLK.eIIUCevO9MyqOaAhvvBmKT0p.DNn9iq', 0, '2023-08-29 12:12:24'),
('ajayerumalla', 'b181725@rgukt.ac.in', '$2y$10$Z5Vm6eMCKj8wFESYT6kpsuxpcTl2EGHX56U3El1F6qPcUC3M2BOGm', '$2y$10$4hHWoY2V2hxrx2te/YGFJeNi.zR5RZBRz8kRD2rP2rVp0j5XtV5em', 1, '2023-08-29 12:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `sno` int(11) NOT NULL,
  `reserve_book_id` int(11) NOT NULL,
  `reserve_book_title` text NOT NULL,
  `username` varchar(40) NOT NULL,
  `status` varchar(1) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp(),
  `approval_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`sno`, `reserve_book_id`, `reserve_book_title`, `username`, `status`, `request_date`, `approval_date`) VALUES
(13, 1, 'data science', 'ajay2081', '1', '2023-08-19 11:14:17', NULL),
(19, 8, 'Operating System Concepts', 'b182081@rgukt.ac.in', '0', '2023-08-23 23:04:50', NULL),
(22, 3, 'The Pragmatic Programmer: Your Journey to MasteryThe Pragmatic Programmer: Your Journey to Mastery', 'admin', '1', '2023-08-29 14:00:17', '2023-08-29 14:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE `returned` (
  `book_id` int(11) NOT NULL,
  `book_title` text NOT NULL,
  `username` varchar(40) NOT NULL,
  `request_date` datetime NOT NULL,
  `approval_date` datetime NOT NULL,
  `return_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returned`
--

INSERT INTO `returned` (`book_id`, `book_title`, `username`, `request_date`, `approval_date`, `return_date`) VALUES
(1, 'intro', 'ajay2081', '2023-08-19 09:52:36', '2023-08-02 09:54:43', '2023-08-19 10:02:51'),
(1, 'intro', 'ajay2081', '2023-08-19 11:07:15', '2023-08-19 11:13:21', '2023-08-19 11:13:26'),
(3, 'The Pragmatic Programmer: Your Journey to MasteryThe Pragmatic Programmer: Your Journey to Mastery', 'ajayerumalla', '2023-08-29 12:44:49', '2023-08-29 12:53:27', '2023-08-29 13:02:51'),
(1, 'introduction to algorithms', 'ajayreigns0@gmail.com', '2023-07-15 00:14:09', '0000-00-00 00:00:00', '2023-08-19 01:41:09'),
(1, 'Introduction to the Theory of Computation', 'ajayreigns0@gmail.com', '2023-07-15 01:36:34', '2023-08-18 20:04:54', '2023-08-19 01:42:00'),
(1, 'Introduction to the Theory of Computation', 'ajayreigns0@gmail.com1435', '2023-07-15 17:54:30', '2023-08-18 20:05:04', '2023-08-20 01:47:31'),
(3, 'The Pragmatic Programmer: Your Journey to Mastery', 'b182081@rgukt.ac.in', '2023-08-23 18:37:13', '2023-08-23 18:38:02', '2023-08-23 22:55:13'),
(6, 'Introduction to Algorithms', 'b182081@rgukt.ac.in', '2023-08-23 23:03:39', '2023-08-23 23:03:47', '2023-08-23 23:04:39'),
(3, 'The Pragmatic Programmer: Your Journey to Mastery', 'manoj', '2023-08-19 18:23:41', '2023-08-19 18:24:11', '2023-08-29 12:54:43'),
(8, 'Operating System Concepts', 'sai2461', '2023-08-27 17:28:39', '2023-08-27 17:30:39', '2023-08-27 17:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT 'RGUKTB',
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `full_name`, `username`, `email`, `password`, `timestamp`) VALUES
(40, 'admin', 'admin', 'admin@rgukt.ac.in', '$2y$10$J842UZmzCftMLU.Hl8MYmOlDlJT9fC1to17HdRGQP.c7LYFFEcm26', '2023-08-25 22:01:47'),
(34, 'Ajay Sai', 'aja', 'ajaykasturi2111@gmail.com', '1234', '2023-07-17 21:18:34'),
(25, '0', 'ajay', 'ajaykasturi@gmail.com', '1', '2023-07-17 19:46:42'),
(35, '0', 'ajay2081', 'ajayreigns0@gmail.com', '1234', '2023-07-17 21:31:47'),
(31, '0', 'ajayd', 'ajaykasturi208@gmail.com', '1', '2023-07-17 19:57:27'),
(32, '0', 'ajayd4', 'ajaykasturi208@gmail.com', '1', '2023-07-17 20:39:43'),
(42, 'Ajay Erumalla 1725', 'ajayerumalla', 'b181725@rgukt.ac.in', '$2y$10$DLbpK4MIj.6oQEuSvp8gF.ZXoK3LFqtCSiqyWgSRfJySe80f.iU8S', '2023-08-29 12:41:11'),
(24, '0', 'ajaykas', 'ajaykasturi2081@gmail.com1', '1', '2023-07-17 19:37:25'),
(29, '0', 'ajaykastjeds', 'ajaykasturi20812@gmail.com', '1', '2023-07-17 19:55:00'),
(27, '0', 'ajaykastjedsn', 'ajaykasturi20812@gmail.com', '1', '2023-07-17 19:53:26'),
(28, '0', 'ajaykastjedsndf', 'ajaykasturi20812@gmail.com', '1', '2023-07-17 19:54:10'),
(26, '0', 'ajaykastjedsnds', 'ajaykasturi20812@gmail.com', '1', '2023-07-17 19:52:51'),
(30, '0', 'ajaykastjedsnf', 'ajaykasturi20812@gmail.com', '1', '2023-07-17 19:55:12'),
(38, '0', 'ajaykasturi', 'ajaykasturi@gmail.com1', '2', '2023-08-19 09:38:57'),
(39, 'AjaySai Kasturi', 'ajaykasturi2081', 'ajaykasturi2081@gmail.com', '$2y$10$yqREpBRuAfkqCvXQTOLZUu.YdAcigCXWxg5PbXptjcHETZuISgd3e', '2023-08-24 15:37:48'),
(23, '0', 'ajaykasturidfgd', '1saikumar@gmail.com', '12345', '2023-07-17 10:57:34'),
(33, '0', 'ajaykasturiii', 'ajaykasturi20822@gmail.com', '1', '2023-07-17 20:43:46'),
(36, 'Ajay Kasturi', 'b182081@rgukt.ac.in', 'b182081@rgukt.ac.in', '$2y$10$Nu7PWM0qGj2K4h10tv9x8umIniWQAtm.XFkH.0xlWnIVugTqeNfJ2', '2023-07-20 19:07:17'),
(37, 'rgukt', 'manoj', 'b182187@rgukt.ac.in', '12345', '2023-08-15 22:59:41'),
(41, 'Kasturi Sahithi', 'sai2461', 'palojisahithi@gmail.com', '$2y$10$7H0WRNJ13P9jPMqku2mVhuhTTneC/jQV0rWu/xkPHI4FyKyvpd3rq', '2023-08-27 17:24:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`) USING BTREE,
  ADD UNIQUE KEY `aid` (`aid`);

--
-- Indexes for table `admin_history`
--
ALTER TABLE `admin_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_db`
--
ALTER TABLE `books_db`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `enotice`
--
ALTER TABLE `enotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `OTP`
--
ALTER TABLE `OTP`
  ADD PRIMARY KEY (`timestamp`) USING BTREE;

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`sno`,`username`,`request_date`) USING BTREE;

--
-- Indexes for table `returned`
--
ALTER TABLE `returned`
  ADD PRIMARY KEY (`username`,`request_date`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`username`) USING BTREE,
  ADD UNIQUE KEY `sid` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_history`
--
ALTER TABLE `admin_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `books_db`
--
ALTER TABLE `books_db`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `enotice`
--
ALTER TABLE `enotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_history`
--
ALTER TABLE `admin_history`
  ADD CONSTRAINT `admin_history_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admins` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
