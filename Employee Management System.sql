-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 01:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_Id` int(11) NOT NULL,
  `asset_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_Id`, `asset_name`) VALUES
(101, 'Car'),
(123, 'Bonds'),
(201, 'Medical Insurance'),
(301, 'House'),
(401, 'Motor'),
(501, 'Shares');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`user_id`, `first_name`, `last_name`, `email`, `pass`) VALUES
(25, 'Jane', 'Doe', 'jane.doe@gmail.com', '$2y$10$8DlLMWz5hbB3uz3hvLx1me0zdBZO/4F8SoMgYGsESpC07SOAFsXZe');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_Id` int(11) NOT NULL,
  `department_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_Id`, `department_name`) VALUES
(111, 'IT'),
(221, 'Finance'),
(331, 'Legal'),
(441, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `insert_time` datetime DEFAULT NULL,
  `employee_Id` int(11) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `payment_status` enum('Not paid','Paid') NOT NULL,
  `payment_status_update_time` datetime DEFAULT NULL,
  `role_Id` varchar(10) DEFAULT NULL,
  `asset_Id` int(11) DEFAULT NULL,
  `asset_update_time` datetime DEFAULT NULL,
  `department_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`insert_time`, `employee_Id`, `first_name`, `last_name`, `date_of_birth`, `salary`, `payment_status`, `payment_status_update_time`, `role_Id`, `asset_Id`, `asset_update_time`, `department_Id`) VALUES
(NULL, 34, 'Bruce', 'Banner', '1997-12-20', '0', 'Not paid', NULL, 'FN1230', NULL, NULL, 221),
(NULL, 100, 'Richard ', 'Whitcomb', '1978-01-01', '10000', 'Paid', NULL, 'FN1230', 101, NULL, 221),
(NULL, 123, 'Scanty', 'Sheldon', '2002-02-12', '5000', 'Paid', NULL, 'MA1230', 501, NULL, 111),
(NULL, 144, 'Thor', 'Odinson', '1990-04-11', '2000', 'Paid', NULL, 'FS1230', 101, NULL, 111),
(NULL, 200, 'Maya', 'Aloko', '2000-04-09', '8000', 'Not paid', NULL, 'FN1230', 501, NULL, 221),
(NULL, 202, 'Tony', 'Stark', '2001-06-14', '14000', 'Paid', NULL, 'DA1230', 201, NULL, 111),
(NULL, 234, 'Bruce', 'Wayne', '1999-05-24', '10000', 'Paid', NULL, 'BE1230', 401, NULL, 111),
(NULL, 256, 'Natasha', 'Bennet', '1998-01-20', '20000', 'Paid', NULL, 'LW1230', 401, NULL, 331),
(NULL, 400, 'Benjamin', 'Mendes', '2000-12-21', '10000', 'Paid', NULL, 'LW1230', NULL, NULL, 331),
(NULL, 512, 'Samuel', 'Aryee', '2000-09-18', '4000', 'Not paid', '2023-06-01 18:01:11', 'MS1230', 201, NULL, 441),
('2023-06-25 22:17:26', 555, 'Angela', 'Bassett', '1996-06-09', '20000', 'Not paid', '2023-06-04 17:52:55', 'MA1230', 401, NULL, 111),
(NULL, 659, 'Amanda', 'Waller', '1998-02-01', '8999', 'Paid', '2023-06-25 20:12:26', 'NE1230', 101, '2023-06-25 20:01:39', 111),
(NULL, 750, 'Wendy', 'Shay', '1998-09-05', '6000', 'Paid', NULL, 'FN1230', NULL, NULL, 221),
(NULL, 888, 'Jessica', 'Laryea', '2003-02-10', '9000', 'Not paid', NULL, 'LW1230', 201, NULL, 331);

-- --------------------------------------------------------

--
-- Table structure for table `employeerole`
--

CREATE TABLE `employeerole` (
  `role_Id` varchar(10) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeerole`
--

INSERT INTO `employeerole` (`role_Id`, `role_name`) VALUES
('BE1230', 'Back End Developer'),
('DA1230', 'Desktop App Developer'),
('FN1230', 'Auditor'),
('FS1230', 'Full Stack Developer'),
('LW1230', 'Lawyer'),
('MA1230', 'Mobile App Developer'),
('MS1230', 'Plumber'),
('NE1230', 'Network Engineer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_Id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_Id`),
  ADD KEY `role_Id` (`role_Id`),
  ADD KEY `asset_Id` (`asset_Id`),
  ADD KEY `department_Id` (`department_Id`);

--
-- Indexes for table `employeerole`
--
ALTER TABLE `employeerole`
  ADD PRIMARY KEY (`role_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `employeerole` (`role_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`asset_Id`) REFERENCES `assets` (`asset_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`department_Id`) REFERENCES `department` (`department_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
