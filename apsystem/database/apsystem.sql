-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 03:41 AM
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
-- Database: `apsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permission` int(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `permission`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$PWCik57/vQ6TmY6FWVPLF.y3L6e0tYq4TAY3jkPxDAxqEcHU1xWKG', 'Harry', 'Den', 'johnmatrixmariano@gmail.com', 5, 'male6.jpg', '2018-04-30'),
(11, 'MarvPelig', '$2y$10$xY5nERECRyUR5fyzIgO/CuTKlRhcxNDSRZSYZGBcnlkqYD/y.tuxy', 'Marv', 'Peligrino', 'marvpeligrino@gmail.com', 5, '', '2024-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
(13, 1, '2018-04-27', '08:00:00', 1, '17:00:00', 8),
(14, 1, '2018-04-28', '08:00:00', 1, '17:00:00', 8),
(15, 1, '2018-05-04', '08:00:00', 1, '17:00:00', 8),
(16, 1, '2018-05-02', '08:00:00', 1, '17:00:00', 8),
(17, 1, '2018-05-01', '08:00:00', 1, '17:00:00', 8),
(18, 1, '2018-05-03', '08:00:00', 1, '17:00:00', 8),
(74, 1, '2018-04-30', '08:00:00', 1, '16:44:23', 7.7333333333333),
(75, 3, '2018-04-18', '08:00:00', 1, '17:00:00', 8),
(76, 4, '2018-04-19', '08:00:00', 1, '17:00:00', 8),
(77, 4, '2018-04-27', '08:00:00', 1, '17:00:00', 7),
(78, 4, '2018-04-28', '08:00:00', 1, '17:00:00', 8),
(79, 4, '2018-05-01', '08:30:00', 1, '17:00:00', 8),
(80, 4, '2018-05-03', '08:00:00', 1, '17:00:00', 0),
(81, 4, '2018-05-05', '08:00:00', 1, '17:00:00', 9),
(83, 4, '2018-05-31', '12:00:00', 0, '18:00:00', 5),
(84, 4, '2018-05-18', '08:00:00', 1, '17:00:00', 7),
(85, 4, '2018-05-09', '09:00:00', 1, '18:00:00', 8),
(86, 5, '2018-07-11', '07:41:00', 1, '16:00:00', 7),
(87, 1, '2018-07-11', '06:27:00', 1, '15:00:00', 6),
(88, 6, '2018-07-11', '07:45:00', 1, '14:48:00', 3.8),
(89, 7, '2018-07-11', '07:56:00', 1, '17:00:00', 8),
(90, 8, '2018-07-11', '06:05:12', 1, '16:00:00', 7),
(91, 9, '2018-07-11', '18:12:06', 0, '00:00:00', 0),
(92, 10, '2018-07-11', '18:13:01', 0, '00:00:00', 0),
(93, 11, '2018-07-11', '18:14:30', 0, '00:00:00', 0),
(94, 12, '2018-07-11', '18:16:14', 0, '00:00:00', 0),
(95, 13, '2018-07-11', '18:17:32', 0, '00:00:00', 0),
(96, 14, '2018-07-11', '18:18:33', 0, '00:00:00', 0),
(97, 15, '2018-07-11', '18:19:26', 0, '00:00:00', 0),
(98, 16, '2018-07-11', '18:20:26', 0, '00:00:00', 0),
(99, 17, '2018-07-11', '18:21:41', 0, '00:00:00', 0),
(100, 18, '2018-07-12', '23:46:31', 1, '00:00:00', 0),
(101, 19, '2018-07-12', '23:50:28', 1, '00:00:00', 0),
(102, 20, '2018-07-12', '23:52:48', 1, '00:00:00', 0),
(103, 21, '2018-07-12', '23:54:50', 1, '00:00:00', 0),
(104, 22, '2018-07-12', '23:56:02', 1, '00:00:00', 0),
(105, 23, '2018-07-12', '13:57:00', 0, '00:00:00', 12.95),
(106, 1, '2024-02-17', '21:33:19', 0, '21:35:32', 3.55);

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `id` int(11) NOT NULL,
  `date_advance` date NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`id`, `date_advance`, `employee_id`, `amount`) VALUES
(2, '2018-05-02', '1', 1000),
(3, '2018-05-02', '1', 1000),
(4, '2018-07-12', '5', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `description`, `amount`) VALUES
(1, 'SSS', 100),
(2, 'Pagibig', 150),
(3, 'PhilHealth', 150),
(4, 'Project Issues', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `lastname`, `middlename`, `emailAddress`, `address`, `birthdate`, `contact_info`, `civil_status`, `religion`, `citizenship`, `gender`, `position_id`, `schedule_id`, `photo`, `created_on`) VALUES
(1, 'ABC123456789', 'Christine', 'Smither', 'Ayyy', 'chrisSmith@gmail.com', 'Brgy. Mambulac, Silay City', '2018-04-02', '09000035719', 'Married', 'Roman Catholic', 'Filipino', 'Female', 1, 2, 'desktop.jpg', '2018-04-28'),
(2, 'QID176543908', 'Johnny', 'Matrix', 'asdad', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2023-11-13', '12313131', 'Widowed', 'Roman Catholic', 'Filipino', 'Male', 1, 3, '', '2024-02-29'),
(4, 'JIE625973480', 'Gemalyn', 'Cepe', '', '', 'Carmen, Bohol', '1995-10-02', '09468029840', '', '', '', 'Female', 2, 3, '', '2018-04-30'),
(5, 'TQO238109674', 'Bruno', 'Den', '', '', 'Test', '1995-08-23', '5454578965', '', '', '', 'Male', 1, 2, 'thanossmile.jpg', '2018-07-11'),
(6, 'EDQ203874591', 'Henry', 'Doe', '', '', 'New St. Esp', '1991-07-25', '9876543210', '', '', '', 'Male', 2, 4, 'male.png', '2018-07-11'),
(7, 'TWY781946302', 'Johnny', 'Jr', '', '', 'Esp', '1995-07-11', '8467067344', '', '', '', 'Male', 1, 2, 'profile.jpg', '2018-07-11'),
(8, 'GWZ071342865', 'Tonny', 'Jr', '', '', 'Esp 12 South Street', '1994-07-19', '9876543210', '', '', '', 'Male', 1, 2, 'profile.jpg', '2018-07-11'),
(9, 'HEL079321846', 'Jacob', 'Carter', '', '', 'St12 N1', '1995-07-18', '5454578965', '', '', '', 'Male', 1, 2, 'profile.jpg', '2018-07-11'),
(10, 'OCN273564901', 'Benjamin', 'Cohen', '', '', 'TEST', '1991-07-25', '78548852145', '', '', '', 'Male', 2, 3, 'profile.jpg', '2018-07-11'),
(11, 'PGX413705682', 'Ethan', 'Carson', '', '', 'DEMO', '1994-07-19', '8467067344', '', '', '', 'Male', 1, 2, 'profile.jpg', '2018-07-11'),
(12, 'YWX536478912', 'Daniel', 'Cooper', '', '', 'Test', '1995-07-11', '9876543210', '', '', '', 'Male', 2, 4, 'profile.jpg', '2018-07-11'),
(13, 'ALB590623481', 'Emma', 'Wallis', '', '', 'Test', '1994-07-19', '9632145655', '', '', '', 'Female', 1, 3, 'female4.jpg', '2018-07-11'),
(14, 'IOV153842976', 'Sophia', 'Maguire', '', '', 'Test', '1995-07-11', '5454578965', '', '', '', 'Female', 2, 2, 'profile.jpg', '2018-07-11'),
(15, 'CAB835624170', 'Mia', 'Hollister', '', '', 'Test', '1995-07-18', '9632145655', '', '', '', 'Female', 2, 3, 'profile.jpg', '2018-07-11'),
(16, 'MGZ312906745', 'Emily', 'JK', '', '', 'Test', '1996-07-24', '9876543210', '', '', '', 'Female', 2, 3, 'profile.jpg', '2018-07-11'),
(17, 'HSP067892134', 'Nakia', 'Grey', '', '', 'Test', '1995-10-24', '8467067344', '', '', '', 'Female', 1, 2, 'profile.jpg', '2018-07-11'),
(18, 'BVH081749563', 'Dave', 'Cruze', '', '', 'Demo', '1990-01-02', '5454578965', '', '', '', 'Male', 2, 2, 'profile.jpg', '2018-07-11'),
(19, 'ZTC714069832', 'Logan', 'Paul', '', '', 'Esp 16', '1994-12-30', '0202121255', '', '', '', 'Male', 1, 1, 'profile.jpg', '2018-07-11'),
(20, 'VFT157620348', 'Jack', 'Adler', '', '', 'Test', '1991-07-25', '6545698880', '', '', '', 'Male', 1, 4, 'profile.jpg', '2018-07-11'),
(21, 'XRF342608719', 'Mason', 'Beckett', '', '', 'Demo', '1996-07-24', '8467067344', '', '', '', 'Male', 2, 1, 'profile.jpg', '2018-07-11'),
(22, 'LVO541238690', 'Lucas', 'Cooper', '', '', 'Demo', '1995-07-18', '9632145655', '', '', '', 'Male', 2, 1, 'profile.jpg', '2018-07-11'),
(23, 'AEI036154829', 'Alex', 'Cohen', '', '', 'Demo', '1995-08-23', '9632145655', '', '', '', 'Male', 1, 2, 'profile.jpg', '2018-07-11'),
(25, 'LRA096518347', 'Matrix', 'Matrix', 'Canonigo', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2024-02-21', '12313131', 'Single', 'Roman Catholic', 'Filipino', 'Male', 1, 1, 'ericute.jpg', '2024-02-29'),
(27, 'URC586920137', 'Matrix', 'Matrix', 'Canonigo', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2023-06-21', '12313131', 'Widowed', 'Roman Catholic', 'Filipino', 'Male', 2, 1, '', '2024-02-29'),
(28, 'SZB302759816', 'New', 'Mariano', 'Canonigo', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2023-11-07', '09000035719', 'Single', 'Roman Catholic', 'Filipino', 'Male', 1, 1, 'thanossmile.jpg', '2024-02-29'),
(29, 'UXY960732518', 'Matrixssssssssssss', 'Matrix', 'Canonigo', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2018-04-02', '12313131', 'Single', 'Roman Catholic', 'Filipino', 'Male', 1, 1, '', '2024-02-29'),
(30, 'OZU178043256', 'Bafagnaskljn', 'Sabfmkamfklfm', 'sdnfkladsklfsdlf', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2024-02-29', 'gesgesgse', 'Married', 'gersgesrgse', 'gsegseg', 'Male', 1, 3, '', '2024-02-29'),
(31, 'EFV942530167', 'dsa', 'dsa', 'fdgfdgdgd', 'gfedgedfg@gmail.com', 'fedgdfg', '2024-02-29', 'sgdgd', 'Single', 'gdgdg', 'dgds', 'Male', 2, 3, '', '2024-02-29'),
(32, 'LKT812953047', 'John Matrix', 'Mariano', 'Canonigo', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '1999-09-17', '09958879402', 'Single', 'Roman Catholic', 'Filipino', 'Male', 5, 2, 'thanossmile.jpg', '2024-02-29'),
(33, 'FLU249058167', 'Matrixfasfgfdgbgdsbg', 'Matrix', 'asdad', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2024-02-06', '09000035719', '', '', '', 'Male', 2, 3, '', '2024-02-29'),
(34, 'MRF879260415', 'Hfdhfdh', 'Dhdhdh', 'dhdhdh', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2024-02-21', '09000035719', 'Married', 'gersgesrgse', 'Filipino', 'Female', 2, 1, '', '2024-02-29'),
(35, 'HTY467829501', 'Hfdhfdh', 'Dhdhdh', 'dhdhdh', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2024-02-21', '09000035719', 'Married', 'gersgesrgse', 'Filipino', 'Female', 2, 1, '', '2024-02-29'),
(36, 'AOP258916703', 'Hfdhfdh', 'Dhdhdh', 'dhdhdh', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2024-02-21', '09000035719', 'Married', 'gersgesrgse', 'Filipino', 'Female', 2, 1, '', '2024-02-29'),
(37, 'FBK234869071', 'Matrix', 'Matrix', 'Canonigo', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2024-02-07', '', 'Married', '', '', 'Female', 4, 3, '', '2024-02-29'),
(38, 'FJK237915680', 'Gsdfgs', 'Gsgsg', 'sgsdgsg', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2024-02-12', '3242424', 'Married', 'sdgsg', 'sgsgs', 'Male', 2, 2, '', '2024-02-29'),
(39, 'DFB718523604', 'Matrix', 'Matrix', 'Canonigo', 'johnmatrixmariano@gmail.com', '#9-A Villa Silva Palatiw', '2018-04-02', '09000035719', 'Married', 'Roman Catholic', 'Filipino', 'Female', 1, 1, '', '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(20) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `created_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `email`, `token`, `used`, `created_on`) VALUES
(7, 'johnmatrixmariano@gmail.com', 'AzkKwyzxmtipRVgjQU9K', 1, '2024-03-07 14:57:09.642362'),
(8, 'johnmatrixmariano5@gmail.com', 'ZP4R132MULgoWeaGcVKs', 1, '2024-03-07 15:04:05.522976'),
(9, 'johnmatrixmariano5@gmail.com', 'LKe5nT2uZlP6qMeIwHkM', 1, '2024-03-07 15:06:08.990914'),
(10, 'johnmatrixmariano5@gmail.com', 'qeDY6BK7ImW1ky6FuBQy', 1, '2024-03-07 15:08:27.958371'),
(11, 'johnmatrixmariano5@gmail.com', 'ZdIW3M53YZViPUJRUrQR', 0, '2024-03-07 15:20:30.000000'),
(12, 'johnmatrixmariano5@gmail.com', 'P5OuMz8LzRAGIu6TbLZm', 0, '2024-03-07 15:22:18.000000'),
(13, 'johnmatrixmariano5@gmail.com', 'J53JDGBYTFun3D1jd8bZ', 0, '2024-03-07 15:26:21.000000'),
(14, 'johnmatrixmariano5@gmail.com', 'DoEkAMA3ze0fpFWJSlBf', 0, '2024-03-07 15:27:48.000000'),
(15, 'johnmatrixmariano5@gmail.com', 'pxOlaRvHUM6Qevvh8md3', 0, '2024-03-07 15:29:21.000000'),
(16, 'johnmatrixmariano5@gmail.com', 'R1C2hLlZbd8sTklhhMiX', 0, '2024-03-07 15:30:51.000000'),
(17, 'johnmatrixmariano5@gmail.com', '5U1VtAdmGrfihY4Yy2j2', 0, '2024-03-07 15:32:00.000000'),
(18, 'johnmatrixmariano5@gmail.com', 'DjnBS7hZh6PzcXIvmDA3', 0, '2024-03-07 15:32:50.000000'),
(19, 'johnmatrixmariano5@gmail.com', '4LBIMrqk3r7mNX9vXA5q', 0, '2024-03-07 15:35:31.000000'),
(20, 'johnmatrixmariano5@gmail.com', 'Ol5u075ai0q1GKcQPj43', 0, '2024-03-07 15:35:54.000000'),
(21, 'johnmatrixmariano5@gmail.com', 'cUHar57zP2RmiuxFCnme', 0, '2024-03-07 15:36:15.000000'),
(22, 'johnmatrixmariano5@gmail.com', 'B5IyewtJZQM7kkNIwZ5k', 0, '2024-03-07 15:36:25.000000'),
(23, 'johnmatrixmariano@gmail.com', 'FkS1Pn74olKpfQbabYHj', 1, '2024-03-11 07:31:42.433987'),
(24, 'johnmatrixmariano5@gmail.com', '4nAVun9wxkbe8WknFTd6', 0, '2024-03-11 07:31:47.000000'),
(25, 'johnmatrixmariano5@gmail.com', 'o0MctJnA4xid4jTgKL6u', 0, '2024-03-11 07:43:35.000000'),
(26, 'johnmatrixmariano5@gmail.com', 'gwcOcuacAiXX7lsMszNg', 0, '2024-03-11 08:55:53.000000'),
(27, 'johnmatrixmariano@gmail.com', 'eq6fTTgacqeO5PGpDacn', 0, '2024-03-11 08:56:21.000000'),
(28, 'johnmatrixmariano@gmail.com', 'pMReNrNk2OrvSlspxZmY', 0, '2024-03-11 08:57:16.000000'),
(29, 'johnmatrixmariano@gmail.com', '4bcYAqqv2hdUqNQjFoKA', 0, '2024-03-11 08:58:02.000000'),
(30, 'johnmatrixmariano@gmail.com', 'zkXY69Cd76ubGOzBq53Q', 0, '2024-03-11 08:58:06.000000'),
(31, 'johnmatrixmariano@gmail.com', 'p6pK5QHvS1fb3quA81BM', 0, '2024-03-11 08:58:31.000000'),
(32, 'johnmatrixmariano@gmail.com', '4PoQiUImiAMhMrhENB9W', 0, '2024-03-11 10:21:00.000000'),
(33, 'johnmatrixmariano@gmail.com', '6Nb7p9G2xXAm7HMIW0OQ', 1, '2024-03-11 10:21:55.625576'),
(34, 'johnmatrixmariano@gmail.com', '78kQW26mhB3NchnMXTr7', 1, '2024-03-11 10:22:52.117569'),
(35, 'marvpeligrino@gmail.com', 'DXlzhQicot9R9OuVVQXR', 0, '2024-03-11 10:30:55.000000'),
(36, 'johnmatrixmariano@gmail.com', 'Zu2jNgOQmrCfgn1hZu9E', 0, '2024-03-11 10:46:09.000000');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `hours` double NOT NULL,
  `rate` double NOT NULL,
  `date_overtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `employee_id`, `hours`, `rate`, `date_overtime`) VALUES
(4, '6', 240, 1500, '2031-11-08'),
(5, '4', 283.33333333333, 3600, '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(1, 'Programmer', 100),
(2, 'Writer', 50),
(3, 'Marketing ', 35),
(4, 'Graphic Designer', 75),
(5, 'Human Resource', 100);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
