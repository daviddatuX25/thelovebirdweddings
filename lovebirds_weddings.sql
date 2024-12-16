-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 08:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovebirds_weddings`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roles` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `roles`, `facebook_url`, `instagram_url`, `email`, `photo`, `last_name`) VALUES
(1, 'David', 'Business Manager, Finance & Administrative Manager', 'https://www.facebook.com/ddxsarmiento', 'https://www.instagram.com/daviddatu_', 'sarmientodaviddatu@gmail.com', 'employee-1/profile.png', 'Sarmiento'),
(2, 'Aljhun', 'Lead Photographer, Creative Content Manager', 'https://www.facebook.com/aljhun.angala', 'https://www.instagram.com/aljhunangala', 'aljhunangala@gmail.com', 'employee-2/profile.png', 'Angala'),
(3, 'Christine', 'Event Manager, Marketing & Sales Manager', 'https://www.facebook.com/jj.hope.986', 'https://www.instagram.com/tin00105', 't1nepl005@gmail.com', 'employee-3/profile.png', 'Lopez'),
(4, 'Charlene', 'Catering Manager / Head Chef, Logistics Coordinator', 'https://www.facebook.com/100087400849949', 'https://www.instagram.com/charlenehipolito18', 'charlenehipolito@gmail.com', 'employee-4/profile.png', 'Hipolito'),
(5, 'Ruby Anne', 'Client Services Manager, Vendor & Supplier Manager', 'https://www.facebook.com/rowbi.yui', 'https://www.instagram.com/rowbi.yui', 'seraonrubyanne09@gmail.com', 'employee-5/profile.png', 'Seraon');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `participant_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`participant_id`, `first_name`, `last_name`, `birthday`, `contact_no`, `barangay`, `city`, `province`, `photo`, `gender`) VALUES
(1, 'Jane', 'Doe', NULL, NULL, NULL, NULL, NULL, 'partner-1/participants/bride/participant1.png', NULL),
(2, 'John', 'Smith', NULL, NULL, NULL, NULL, NULL, 'partner-1/participants/groom/participant2.png', NULL),
(3, 'Emily', 'Brown', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'David', 'Lee', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Sarah', 'Jones', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Michael', 'Davis', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Lily', 'Miller', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Ethan', 'Wilson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Olivia', 'Anderson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Noah', 'Taylor', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Sophia', 'Thomas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'James', 'Jackson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'William', 'White', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Charlotte', 'Harris', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Benjamin', 'Martin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Amelia', 'Thompson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Jacob', 'Garcia', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Mia', 'Martinez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Mason', 'Robinson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Chloe', 'Clark', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Ethan', 'Lewis', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Ava', 'Lee', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Alexander', 'Hall', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Emma', 'Allen', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Daniel', 'Young', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Sophia', 'King', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Marian', 'Rivera', NULL, NULL, NULL, NULL, NULL, 'partner-2/participants/bride/participant27.png', NULL),
(28, 'Dingdong', 'Dantes', NULL, NULL, NULL, NULL, NULL, 'partner-2/participants/groom/participant28.png', NULL),
(29, 'Christopher', 'Torres', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Abigail', 'Nelson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Andrew', 'Hill', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Elizabeth', 'Flores', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Joseph', 'Green', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Emily', 'Adams', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'David', 'Baker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Olivia', 'Gonzalez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Jacob', 'Nelson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Mia', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'William', 'Roberts', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Ethan', 'Scott', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'James', 'Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Noah', 'Allen', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Sophia', 'Evans', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Mason', 'Sanchez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Isabella', 'Mitchell', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Daniel', 'Moore', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Emma', 'Rodriguez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Alexander', 'Lewis', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Ava', 'Walker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Matthew', 'Hall', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Chloe', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Christopher', 'Brooks', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Abigail', 'Bailey', NULL, NULL, NULL, NULL, NULL, 'partner-3/participants/bride/participant53.png', NULL),
(54, 'Andrew', 'Rivera', NULL, NULL, NULL, NULL, NULL, 'partner-3/participants/groom/participant54.png', NULL),
(55, 'Elizabeth', 'Cooper', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Joseph', 'Cox', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Emily', 'Russell', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'David', 'Sanders', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Olivia', 'Clark', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Jacob', 'Patterson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Mia', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'William', 'Reed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Ethan', 'Kelly', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'James', 'Diaz', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Noah', 'Gray', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Sophia', 'Hayes', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Mason', 'Myers', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Isabella', 'Ford', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Daniel', 'James', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Emma', 'Stewart', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Alexander', 'Powell', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Ava', 'Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Matthew', 'Simmons', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Chloe', 'Burton', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Christopher', 'Gonzales', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Abigail', 'Cole', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Andrew', 'Bryant', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Elizabeth', 'Alexander', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Charmaigne', 'Grand', NULL, NULL, NULL, NULL, NULL, 'partner-4/participants/bride/participant79.png', NULL),
(80, 'Joseph', 'Wallace', NULL, NULL, NULL, NULL, NULL, 'partner-4/participants/groom/participant80.png', NULL),
(81, 'David', 'Lopez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Olivia', 'Bennett', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Jacob', 'Parker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Mia', 'Carter', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'William', 'Murphy', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Ethan', 'Cooper', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'James', 'Reed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'Noah', 'Richardson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'Sophia', 'Cox', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'Mason', 'Howard', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'Isabella', 'Ward', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'Daniel', 'Torres', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'Emma', 'Peterson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'Alexander', 'Gray', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'Ava', 'Ramirez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Matthew', 'Watson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'Chloe', 'Brooks', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Christopher', 'Davis', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'Abigail', 'Rogers', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'Andrew', 'Evans', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'Elizabeth', 'Fisher', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Joseph', 'Wilson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'Emily', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'David', 'Taylor', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'Olivia', 'Thomas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Jacob', 'Martinez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Mia', 'Jackson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'William', 'White', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'Ethan', 'Harris', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'James', 'Martin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Noah', 'Thompson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'Sophia', 'Garcia', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'Mason', 'Martinez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'Isabella', 'Robinson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Daniel', 'Clark', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Emma', 'Lewis', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Alexander', 'Lee', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'Ava', 'Hall', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'Matthew', 'Allen', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Chloe', 'Young', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'Christopher', 'King', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'Abigail', 'Wright', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Andrew', 'Scott', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'Elizabeth', 'Torres', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Joseph', 'Nelson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'Emily', 'Hill', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'David', 'Flores', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Olivia', 'Green', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Jacob', 'Adams', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'Mia', 'Baker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'William', 'Gonzalez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Ethan', 'Nelson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'James', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'Noah', 'Roberts', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'Sophia', 'Scott', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'Mason', 'Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'Isabella', 'Allen', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'Daniel', 'Evans', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'Emma', 'Sanchez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'Alexander', 'Mitchell', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'Ava', 'Moore', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'Matthew', 'Rodriguez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'Chloe', 'Lewis', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'Christopher', 'Walker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'Abigail', 'Hall', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'Andrew', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'Elizabeth', 'Brooks', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'Joseph', 'Bailey', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'Emily', 'Rivera', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'David', 'Cooper', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'Olivia', 'Cox', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'Jacob', 'Russell', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'Mia', 'Sanders', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'William', 'Clark', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'Ethan', 'Patterson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'James', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'Noah', 'Reed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'Sophia', 'Kelly', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'Mason', 'Diaz', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'Isabella', 'Gray', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'Daniel', 'Hayes', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'Emma', 'Myers', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'Alexander', 'Ford', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'Ava', 'James', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'Matthew', 'Stewart', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'Chloe', 'Powell', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'Christopher', 'Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'Abigail', 'Simmons', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'Andrew', 'Burton', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'Elizabeth', 'Gonzales', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'Joseph', 'Cole', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'Emily', 'Bryant', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'David', 'Alexander', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'Olivia', 'Wallace', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'Jacob', 'Wright', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'Mia', 'Lopez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'William', 'Bennett', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'Ethan', 'Parker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'James', 'Carter', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'Noah', 'Murphy', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'Sophia', 'Cooper', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'Mason', 'Reed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'Isabella', 'Richardson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'Daniel', 'Cox', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'Emma', 'Howard', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'Alexander', 'Ward', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'Ava', 'Torres', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 'Matthew', 'Peterson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 'Chloe', 'Gray', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 'Christopher', 'Ramirez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 'Abigail', 'Watson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 'Andrew', 'Brooks', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 'Elizabeth', 'Davis', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 'Joseph', 'Rogers', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 'Emily', 'Evans', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'David', 'Fisher', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'Olivia', 'Wilson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'Jacob', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'Mia', 'Taylor', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'William', 'Thomas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'Ethan', 'Martinez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'James', 'Jackson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 'Noah', 'White', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 'Sophia', 'Harris', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 'Mason', 'Martin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 'Isabella', 'Thompson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 'Daniel', 'Garcia', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 'Emma', 'Martinez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 'Alexander', 'Robinson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 'Ava', 'Clark', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 'Matthew', 'Lewis', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 'Chloe', 'Lee', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 'Christopher', 'Hall', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 'Abigail', 'Allen', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 'Andrew', 'Young', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 'Elizabeth', 'King', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 'Joseph', 'Wright', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 'Emily', 'Scott', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 'David', 'Torres', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 'Olivia', 'Nelson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 'Jacob', 'Hill', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 'Mia', 'Flores', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 'William', 'Green', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 'Ethan', 'Adams', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 'James', 'Baker', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, 'Noah', 'Gonzalez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 'Sophia', 'Nelson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 'Mason', 'Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 'Isabella', 'Roberts', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, 'Daniel', 'Scott', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, 'Emma', 'Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 'Alexander', 'Allen', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, 'Ava', 'Evans', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 'Matthew', 'Sanchez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 'Chloe', 'Mitchell', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Maid of Honor'),
(2, 'Best Man'),
(3, 'Bridesmaid'),
(4, 'Groomsman'),
(5, 'Flower Girl'),
(6, 'Ring Bearer'),
(7, 'Officiant'),
(8, 'Parent of the Bride'),
(9, 'Parent of the Groom'),
(10, 'Grandparent'),
(11, 'Guest'),
(12, 'Bride'),
(13, 'Groom');

-- --------------------------------------------------------

--
-- Table structure for table `role_assignments`
--

CREATE TABLE `role_assignments` (
  `assignment_id` int(11) NOT NULL,
  `wedding_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_assignments`
--

INSERT INTO `role_assignments` (`assignment_id`, `wedding_id`, `participant_id`, `role_id`) VALUES
(27, 1, 1, 12),
(28, 1, 2, 13),
(29, 1, 3, 1),
(30, 1, 4, 2),
(31, 1, 5, 3),
(32, 1, 6, 3),
(33, 1, 7, 4),
(34, 1, 8, 4),
(35, 1, 9, 5),
(36, 1, 10, 5),
(37, 1, 11, 6),
(38, 1, 12, 6),
(39, 1, 13, 7),
(40, 1, 14, 8),
(41, 1, 15, 8),
(42, 1, 16, 9),
(43, 1, 17, 9),
(44, 1, 18, 10),
(45, 1, 19, 10),
(46, 1, 20, 10),
(47, 1, 21, 10),
(48, 1, 22, 11),
(49, 1, 23, 11),
(50, 1, 24, 11),
(51, 1, 25, 11),
(52, 1, 26, 11),
(53, 2, 27, 12),
(54, 2, 28, 13),
(55, 2, 29, 1),
(56, 2, 30, 2),
(57, 2, 31, 3),
(58, 2, 32, 3),
(59, 2, 33, 4),
(60, 2, 34, 4),
(61, 2, 35, 5),
(62, 2, 36, 5),
(63, 2, 37, 6),
(64, 2, 38, 6),
(65, 2, 39, 7),
(66, 2, 40, 8),
(67, 2, 41, 8),
(68, 2, 42, 9),
(69, 2, 43, 9),
(70, 2, 44, 10),
(71, 2, 45, 10),
(72, 2, 46, 10),
(73, 2, 47, 10),
(74, 2, 48, 11),
(75, 2, 49, 11),
(76, 2, 50, 11),
(77, 2, 51, 11),
(78, 2, 52, 11),
(79, 3, 53, 12),
(80, 3, 54, 13),
(81, 3, 55, 1),
(82, 3, 56, 2),
(83, 3, 57, 3),
(84, 3, 58, 3),
(85, 3, 59, 4),
(86, 3, 60, 4),
(87, 3, 61, 5),
(88, 3, 62, 5),
(89, 3, 63, 6),
(90, 3, 64, 6),
(91, 3, 65, 7),
(92, 3, 66, 8),
(93, 3, 67, 8),
(94, 3, 68, 9),
(95, 3, 69, 9),
(96, 3, 70, 10),
(97, 3, 71, 10),
(98, 3, 72, 10),
(99, 3, 73, 10),
(100, 3, 74, 11),
(101, 3, 75, 11),
(102, 3, 76, 11),
(103, 3, 77, 11),
(104, 3, 78, 11),
(105, 4, 79, 12),
(106, 4, 80, 13),
(107, 4, 81, 1),
(108, 4, 82, 2),
(109, 4, 83, 3),
(110, 4, 84, 3),
(111, 4, 85, 4),
(112, 4, 86, 4),
(113, 4, 87, 5),
(114, 4, 88, 5),
(115, 4, 89, 6),
(116, 4, 90, 6),
(117, 4, 91, 7),
(118, 4, 92, 8),
(119, 4, 93, 8),
(120, 4, 94, 9),
(121, 4, 95, 9),
(122, 4, 96, 10),
(123, 4, 97, 10),
(124, 4, 98, 10),
(125, 4, 99, 10),
(126, 4, 100, 11),
(127, 4, 101, 11),
(128, 4, 102, 11),
(129, 4, 103, 11),
(130, 4, 104, 11);

-- --------------------------------------------------------

--
-- Table structure for table `testimonies`
--

CREATE TABLE `testimonies` (
  `testimony_id` int(11) NOT NULL,
  `role_assignment_id` int(11) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `ratings` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonies`
--

INSERT INTO `testimonies` (`testimony_id`, `role_assignment_id`, `comment`, `ratings`) VALUES
(1, 27, 'Lovebirds Weddings did an amazing job with our beach wedding! Everything was perfect.', 4.5),
(2, 28, 'We highly recommend Lovebirds Weddings! They made our wedding day stress-free and unforgettable.', 5),
(3, 29, 'The attention to detail from Lovebirds Weddings was incredible. We couldn\'t have asked for more.', 5),
(4, 30, 'Lovebirds Weddings exceeded all our expectations. The wedding was truly magical.', 5),
(5, 31, 'Thank you, Lovebirds Weddings, for making our dream wedding come true!', 4.5),
(6, 53, 'Lovebirds Weddings planned a beautiful garden wedding for us. We were so impressed!', 5),
(7, 54, 'We couldn\'t have imagined a more perfect garden wedding. Thanks, Lovebirds Weddings!', 5),
(8, 55, 'The service from Lovebirds Weddings was exceptional. We highly recommend them.', 5),
(9, 56, 'Our garden wedding was everything we dreamed of, thanks to Lovebirds Weddings.', 5),
(10, 57, 'Lovebirds Weddings made our garden wedding truly unforgettable.', 5),
(11, 79, 'Lovebirds Weddings helped us plan the most romantic vineyard wedding.', 5),
(12, 80, 'Our vineyard wedding was a dream come true, thanks to Lovebirds Weddings.', 5),
(13, 81, 'The attention to detail from Lovebirds Weddings was impeccable.', 5),
(14, 82, 'We were blown away by the beauty of our vineyard wedding, thanks to Lovebirds Weddings.', 5),
(15, 83, 'Lovebirds Weddings made our vineyard wedding truly unforgettable.', 5),
(16, 105, 'Lovebirds Weddings helped us plan a classic and elegant chapel wedding.', 5),
(17, 106, 'Our chapel wedding was everything we hoped for, thanks to Lovebirds Weddings.', 5),
(18, 107, 'The service from Lovebirds Weddings was outstanding.', 5),
(19, 108, 'We highly recommend Lovebirds Weddings for a stress-free and beautiful wedding.', 5),
(20, 109, 'Lovebirds Weddings made our chapel wedding a truly memorable experience.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_name`) VALUES
(1, 'Beach'),
(2, 'Vintage'),
(3, 'Bohemian'),
(4, 'Garden');

-- --------------------------------------------------------

--
-- Table structure for table `weddings`
--

CREATE TABLE `weddings` (
  `wedding_id` int(11) NOT NULL,
  `wedding_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `wedding_key` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `theme_color` varchar(255) DEFAULT NULL,
  `wedding_location` varchar(255) DEFAULT NULL,
  `wedding_photo` text DEFAULT NULL,
  `prenup_location` varchar(255) DEFAULT NULL,
  `prenup_photo` text DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weddings`
--

INSERT INTO `weddings` (`wedding_id`, `wedding_date`, `description`, `wedding_key`, `password`, `theme_id`, `theme_color`, `wedding_location`, `wedding_photo`, `prenup_location`, `prenup_photo`, `email_address`, `mobile_number`) VALUES
(1, '2024-12-12', 'A romantic beach wedding', 'beachWedding2024', 'secret123', 1, '#F5DEB3', 'Beach Resort', 'clients/1/weddingPhoto/beachWedding.jpg', 'Beachfront', 'clients/1/prenupPhoto/beachPrenup.jpg', NULL, ''),
(2, '2025-03-08', 'A fairytale garden wedding', 'gardenWedding2025', 'secret456', 2, '#4CAF50', 'Garden', 'clients/2/weddingPhoto/gardenWedding.jpg', 'Botanical Garden', 'clients/2/prenupPhoto/gardenPrenup.jpg', NULL, ''),
(3, '2025-06-21', 'A rustic vineyard wedding', 'vineyardWedding2025', 'secret789', 3, '#D2691E', 'Vineyard', 'clients/3/weddingPhoto/vineyardWedding.jpg', 'Vineyard', 'clients/3/prenupPhoto/vineyardPrenup.jpg', NULL, ''),
(4, '2025-10-15', 'A classic chapel wedding', 'chapelWedding2025', 'secret000', 4, '#FFFFFF', 'Chapel', 'clients/4/weddingPhoto/chapelWedding.jpg', 'Historic Manor', 'clients/4/prenupPhoto/chapelPrenup.jpg', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participant_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_assignments`
--
ALTER TABLE `role_assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD UNIQUE KEY `wedding_id` (`wedding_id`,`participant_id`,`role_id`),
  ADD KEY `participant_id` (`participant_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`testimony_id`),
  ADD KEY `role_assignment_id` (`role_assignment_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `weddings`
--
ALTER TABLE `weddings`
  ADD PRIMARY KEY (`wedding_id`),
  ADD KEY `FK_weddings_themes` (`theme_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_assignments`
--
ALTER TABLE `role_assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `testimony_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `weddings`
--
ALTER TABLE `weddings`
  MODIFY `wedding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_assignments`
--
ALTER TABLE `role_assignments`
  ADD CONSTRAINT `role_assignments_ibfk_1` FOREIGN KEY (`wedding_id`) REFERENCES `weddings` (`wedding_id`),
  ADD CONSTRAINT `role_assignments_ibfk_2` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`participant_id`),
  ADD CONSTRAINT `role_assignments_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `testimonies`
--
ALTER TABLE `testimonies`
  ADD CONSTRAINT `testimonies_ibfk_1` FOREIGN KEY (`role_assignment_id`) REFERENCES `role_assignments` (`assignment_id`);

--
-- Constraints for table `weddings`
--
ALTER TABLE `weddings`
  ADD CONSTRAINT `FK_weddings_themes` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`theme_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
