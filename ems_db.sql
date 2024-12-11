-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 09, 2024 at 10:17 PM
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
-- Database: `ems_db`
--

-- --------------------------------------------------------

--
-- Table database
--

-- CREATE SCHEMA ems_db;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_time` time NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `emp_id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `e_mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`emp_id`, `phone`, `e_mail`) VALUES
(625802, '01024892454', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_name` varchar(50) DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_name`, `dept_id`, `manager_id`) VALUES
('IT', 1, NULL),
('Administration', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `position` varchar(10) NOT NULL,
  `branch_location` varchar(20) NOT NULL,
  `hire_date` date NOT NULL,
  `active_flag` varchar(10) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`fname`, `lname`, `username`, `emp_id`, `password`, `position`, `branch_location`, `hire_date`, `active_flag`, `manager_id`, `dept_id`, `image`) VALUES
('admin', 'admin', 'ad_sys_007', 625802, '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin', 'cairo', '2024-12-09', '1', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_request` longblob DEFAULT NULL,
  `leave_type` varchar(20) DEFAULT NULL,
  `leave_time` time NOT NULL,
  `leave_id` int(11) NOT NULL,
  `leave_date` date NOT NULL,
  `leave_status` varchar(10) NOT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_time` time NOT NULL,
  `review_id` int(11) NOT NULL,
  `reviewee_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `review_date` date NOT NULL,
  `feedback` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_date` date NOT NULL,
  `salary_time` time NOT NULL,
  `taxes` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `base_salary` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `token_id` int(11) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashed_validator` varchar(255) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`token_id`, `selector`, `hashed_validator`, `emp_id`, `expire`) VALUES
(39, '03bf5c307fe947b308dbbaecac73c94d', '748704971c2981db258fac2a9748225d763eee2da0b416ae7930e20c2e1758ab', 625802, '2024-12-09 21:31:29'),
(40, '49ec44a503eb64595c88b0b5d04349cb', '68e16dd4b220717a35338eb6283cc73e17f389eabfeb07c2a52467561d6313f3', 625802, '2024-12-09 21:32:02'),
(41, 'f616d0d18c84ffd922d50b51368c63e6', '552f9100696f8a49959d8b706f5c06489801ae8cbc23d257cdf64026d018bde5', 625802, '2024-12-09 21:44:47'),
(42, '4e80ec78537205e2e77b1833d8874983', '170297b2d9cb1698659d0653f39cfde5ba40c35543aa2c72dde77ef86191e286', 625802, '2024-12-09 21:47:05'),
(43, 'e02699eb32cd2605e2ecc76130108cc7', '53a02a2fecddbfd6c82ad72b45be4a837c25e90a1c1e6667b9715a233e1d1731', 625802, '2024-12-09 21:48:02'),
(44, '150a9a2aed5bc29ff9cd8af27ef0b20d', 'a17ce3ca694de2769d5d32eb8af9dbe876b8b969a13dc0dfe95cff7eca262e39', 625802, '2024-12-09 21:51:11'),
(45, '40d8f3a24ee9179212692705a9784c5a', 'b10c43e2d2dfac8d1352585d9f563be9d3793cacefcce6b1334bdbea0bf5a797', 625802, '2024-12-09 21:51:22'),
(46, '98cdae59dc1de0bfe2cce010a255b635', '19500e4735a5b608d41baf0dc8694a8aedc3a578a0c26ff0f9d0fe16805bfad2', 625802, '2024-12-09 21:59:05'),
(47, 'ff7b6bdb81300c3a57db4b7f971ae76b', 'aa01bd64259b44d2718adda52b0a4decb4e437afe8fb2533a90c567938c6c966', 625802, '2024-12-09 21:59:11'),
(48, 'b09c229ec80415ad5d4dd86a5aa4e8f9', 'f43a4b2c0f97d4094ae21414cede411cb72e597a2c7bbafa7575adca76d30c9c', 625802, '2024-12-09 22:07:42'),
(49, '103770102fcb63c767337ee59bb0394f', 'b79e2d9b3f2ea6330d2874c5d06e067713e6f4dda8003ce6641f3ca4a73d541d', 625802, '2024-12-09 21:14:19'),
(50, 'd79363eb5c1be3d9adadf31483fadb32', 'b1341ec6750ab20b7546a30075309d10c8f1ccc2f72e04e257565c419626d394', 625802, '2024-12-09 22:20:55'),
(51, '210e6c7f98006e94bb8ef2e143ea7cc5', '12290113c1759db912e072e315cd2b47b21d04b32cf715cff1b36f9e1db6bae8', 625802, '2024-12-09 22:21:09'),
(52, '55a76e3608922ae8dcf7f5229e8e7425', 'b4206a15cea8812e31e75db417df9109d76b65661b916ab49f15c92a87f7d29f', 625802, '2024-12-09 23:23:51'),
(53, '8df7374a63de7a4c987756afb544634c', '159d81abb45b92a27d256a76b399e942c089691128a0ec7d0f40d986bc54a2af', 625802, '2024-12-09 23:34:36'),
(54, '9ddd3d1ec883c3ce77d7021918ad1ca3', '6dceb0f1def4875edbef48ad7224db49982345fece366922fd468ed47d2b4748', 625802, '2024-12-09 23:37:54'),
(55, '69fe4a4d5389c548d35b42d5feba2ccd', '893519e410341abafebeb35da845bdf16790f61ba90b786b8fb760eed1510584', 625802, '2024-12-09 23:41:17'),
(56, 'ebc869d72f18d324b1fd7c4e9ab98105', '0b4d789b6d4492bf8a3d90965cafbb043ccc81acf56aa07e7d2cdb8469f7d924', 625802, '2024-12-09 23:43:25'),
(57, '2d4f555b22ef69007dcd1d1f57d89dc8', 'd5e755320668da52aacaf27fd19ad1c1a1191175acfdcb8975a9fef63f7f9677', 625802, '2024-12-09 23:44:50'),
(58, 'cc14f050b46085207dd64277fafa10ac', '3de3b2536f179379c77177e64d1578811ec343de9e1fad249923710f5815b2cc', 625802, '2024-12-09 23:49:17'),
(59, 'a725088d18bacd6d5c6008b904a714d5', '74f016f7cd3e13a482aecd847661b749ce18a8323ff334136fd8436b4658e4a6', 625802, '2024-12-09 23:52:59'),
(60, '4a09db0b3e69d97d1c1cbdcb78980d85', 'fad90b47fa19053cef028509f5a9fda961214576eb613233aeb4393aa8968a08', 625802, '2024-12-09 23:57:43'),
(61, '97dd7fa6c688a09ac76a64c4b678fbad', '09e5ccaad218336315557e5e6e1f9f6d6522bc8eb2c64eecd4b7b582c7ad20ff', 625802, '2024-12-10 00:13:51'),
(62, '447f0f9014a88f2bf9dff3b2ad46b47c', 'e123d48d89542d971ac0893846a3d86ecc2621320c27ffe930c2daa6799b6202', 625802, '2024-12-10 00:14:20'),
(63, '0178eb8ee57e71996d40338ac67d1531', '7e1b85f758cc735c54b0b1e6582da073291c661ff57caca79f9760b241498e84', 625802, '2024-12-10 00:14:38'),
(64, '644797514b15720dffd6cdf5655e8b47', '8dc348bf0da241a63dd47d6992c22185ada86100eb361a2e7d6e5d5e137393e6', 625802, '2024-12-10 00:14:50'),
(65, '59ae30a9b8a2ebf4dc2eba6f40014b71', '098d0f68e019b985403520bc08f6037871900fecfac9bfe17425ed695137b727', 625802, '2024-12-10 00:14:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `att_fk` (`emp_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`phone`,`emp_id`,`e_mail`),
  ADD KEY `cont_fk` (`emp_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `pass_un` (`password`),
  ADD UNIQUE KEY `username_un` (`username`),
  ADD KEY `mang_fk` (`manager_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `lea_fk` (`emp_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `rev_fk` (`reviewee_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=625803;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `att_fk` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `cont_fk` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`),
  ADD CONSTRAINT `mang_fk` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `lea_fk` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `rev_fk` FOREIGN KEY (`reviewee_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
