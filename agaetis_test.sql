-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 03:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agaetis_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `batch_class` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `english_marks` int(3) NOT NULL,
  `hindi_marks` int(3) NOT NULL,
  `math_marks` int(3) NOT NULL,
  `science_marks` int(3) NOT NULL,
  `history_marks` int(3) NOT NULL,
  `geography_marks` int(3) NOT NULL,
  `remarks` text NOT NULL,
  `grade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `student_id`, `first_name`, `last_name`, `batch_class`, `email`, `english_marks`, `hindi_marks`, `math_marks`, `science_marks`, `history_marks`, `geography_marks`, `remarks`, `grade`) VALUES
(8, 1234, 'Ujjwal', 'Dubey', 'B3', 'dubeyujjwal97@gmail.com', 76, 86, 98, 74, 87, 76, 'Testing...', 'Distinction'),
(9, 256272, 'Ujju', 'Dubey', 'C3', 'dubeyujjwal97@gmail.com', 45, 54, 24, 43, 12, 23, 'Test 2', 'Pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
