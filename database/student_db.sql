-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 05:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `standard` tinyint(12) NOT NULL,
  `subject` varchar(111) NOT NULL COMMENT 'subject id sperated by comma',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `standard`, `subject`, `status`, `created_on`, `updated_on`) VALUES
(16, 'Harry Updated', 4, 'Math,Science', 'active', '2022-02-11 21:51:05', '2022-02-11 21:51:34'),
(17, 'John', 12, 'Math', 'active', '2022-02-11 21:53:21', NULL),
(18, 'Gaurav', 2, 'Hindi,Social Science', 'active', '2022-02-11 22:00:42', NULL),
(19, 'Ritin', 3, 'Science', 'active', '2022-02-11 22:00:59', NULL),
(20, 'Rohit', 4, 'Math', 'active', '2022-02-11 22:01:13', NULL),
(21, 'Amit', 4, 'Science', 'active', '2022-02-11 22:01:23', NULL),
(22, 'Rajiv', 5, 'Social Science', 'active', '2022-02-11 22:01:36', NULL),
(23, 'Vishali', 6, 'Hindi', 'active', '2022-02-11 22:01:49', NULL),
(24, 'Nidhi Chopra', 7, 'Math', 'active', '2022-02-11 22:02:11', NULL),
(25, 'Parvesh Kumar', 8, 'Science', 'active', '2022-02-11 22:02:48', NULL),
(26, 'Gurpreet Singh', 11, 'Math', 'active', '2022-02-11 22:03:03', '2022-02-11 22:03:11'),
(27, 'Chintu', 12, 'Hindi', 'active', '2022-02-11 22:03:59', NULL),
(28, 'Imran', 11, 'Science', 'active', '2022-02-11 22:04:53', NULL),
(29, 'deepak', 9, 'Science', 'active', '2022-02-11 22:05:02', NULL),
(30, 'Jatin', 8, 'Social Science', 'active', '2022-02-11 22:05:32', NULL),
(31, 'Mehar Chopra', 7, 'Social Science', 'active', '2022-02-11 22:05:53', NULL),
(32, 'Fateh Singh', 11, 'Social Science', 'active', '2022-02-11 22:06:12', NULL),
(33, 'Shanvi', 5, 'Math', 'active', '2022-02-11 22:06:49', NULL),
(34, 'Gunia', 9, 'Science', 'active', '2022-02-11 22:07:09', NULL),
(35, 'Mushkan', 5, 'Science', 'active', '2022-02-11 22:07:22', NULL),
(36, 'Ruchi', 10, 'Math', 'active', '2022-02-11 22:08:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students_subjects`
--

CREATE TABLE `students_subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_subjects`
--

INSERT INTO `students_subjects` (`id`, `subject`, `status`) VALUES
(1, 'Social Science', '1'),
(2, 'Math', '1'),
(3, 'Hindi', '1'),
(4, 'Science', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_subjects`
--
ALTER TABLE `students_subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `students_subjects`
--
ALTER TABLE `students_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
