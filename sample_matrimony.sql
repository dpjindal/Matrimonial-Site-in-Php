-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 04:07 PM
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
-- Database: `vivahsanyog`
--

-- --------------------------------------------------------

--
-- Table structure for table `match_suggestions`
--

CREATE TABLE `match_suggestions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `suggested_user_id` int(11) NOT NULL,
  `match_score` int(11) NOT NULL,
  `suggested_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT current_timestamp(),
  `read_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `education` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `family_details` text NOT NULL,
  `partner_preferences` text NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `UploadedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `name`, `gender`, `dob`, `height`, `weight`, `education`, `occupation`, `income`, `address`, `family_details`, `partner_preferences`, `profile_picture`, `UploadedOn`) VALUES
(1001, 1003, 'Siddharth Agarwal', 'M', '1993-01-01', '', '', 'M. Tech', '', '', '', 'Late Mr. Arun Agarwal \r\nNoida', '', '', '2025-01-08 19:40:01'),
(1002, 1001, 'Abhijeet Jindal', 'M', '1988-07-01', '5\' 6\"', '60 Kg', 'MBA', 'Online selling, Insurance', '50000 pm', '', 'Father: Dharam Pal Jindal, M.COM., CAIIB, LL.B., Retired Deputy Manager, State Bank of India\r\nMother: Indira Jindal, MA, B.Ed., Retired Teacher\r\nElser sister married and well settled', 'Girl should be homely, may be working or non-working. ', 'abhi-pp-2.jpg', '2025-01-08 19:48:35'),
(1003, 1004, 'Dr Pallav Garg', 'M', '1990-04-23', '', '', 'MD Medicine', '', '', '', 'Father: Dr Ram Kirti Garg\r\nKaithal', '', '', '2025-01-08 19:53:07'),
(1004, 1005, 'Piya Agarwal ', 'F', '0000-00-00', '', '', 'M. Com', '', '', '', 'Father: Sudhir Agrawal\r\nAshok Vihar, Delhi', '', '', '2025-01-08 19:55:08'),
(1005, 1006, 'Pooja', 'F', '0000-00-00', '', '', 'B.Tech', '', '', '', 'Delhi\r\n', '', '', '2025-01-08 20:13:24'),
(1006, 1007, 'Niharika Jaiswal', 'F', '0000-00-00', '', '', 'MBA+PGDM', '', '', '', 'Father: Sanjeev Jaiswal\r\n', '', '', '2025-01-08 20:15:15'),
(1007, 1009, 'Mansi Agarwal', 'F', '0000-00-00', '', '', 'B .Tech', '', '', '', 'Father: Alok Agarwal\r\nDelhi, anand vihar\r\n', '', '', '2025-01-08 20:26:48'),
(1008, 1010, 'SANDEEP JAIN', 'M', '1983-04-20', '', '', 'B.COM, LL.B', '', '', '', 'Father: SHRI SANTOSH JAIN\r\nMandsaur, M.P.\r\n', '', '', '2025-01-08 20:30:00'),
(1009, 1011, 'Mudit Maheshwari', 'M', '0000-00-00', '', '', 'B.Com., L.L.B.', '', '', '', 'Sanjeev Maheswari\r\nSardhana Meerut(U.P.)\r\n\r\n', '', '', '2025-01-08 20:31:39'),
(1010, 1012, 'Keshav Agrawal', 'M', '1993-01-01', '', '', 'MTech', '', '', '', 'Mr. Dev Krishna Agarwal \r\nVasant Kunj, Delhi', '', '', '2025-01-08 20:33:38'),
(1011, 1013, 'Sanaya Agarwal', 'F', '1999-01-01', '', '', 'M.SC', '', '', '', 'Akhilesh Agarwal\r\n\r\nNoida UP\r\n', '', '', '2025-01-08 20:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `profile_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `r_name`, `username`, `password`, `email`, `mobile`, `profile_created`) VALUES
(1001, 'Dharam Pal Jindal', 'dpjindal', '$2y$10$p.1yZxC114xTTeeogZnxSewoOSp1LtNxaFX2FwY/XY3c.k8VtsaIe', 'dpjindal@gmail.com', 9717007044, '2024-12-30 19:32:27'),
(1003, 'Siddharth Agarwal', '7481970616', '$2y$10$hLneKvlHkXJ8zdkodjT/t.kXWCBAZl7ewxv3h/ToD5lT/0dxATClC', '', 7481970616, '2025-01-08 19:08:50'),
(1004, 'Dr Pallav Garg', '9315507980', '$2y$10$qu9jkKZEmUYfK9D.BBsg8Od.nZipy5qlYFOfLPcAqQpUp71KejoqC', '', 9315507980, '2025-01-08 19:50:37'),
(1005, 'Piya Agarwal ', '7254894211', '$2y$10$qOgf510LnsO6CY./6PHOdep5jl3vhHvBZ5R4CXsATAGn0p5MKnCKW', '', 7254894211, '2025-01-08 19:53:56'),
(1006, 'Pooja', '9525380576', '$2y$10$ty7rfZfYNlrDGlk8zKYUleYDxzTih3t7ESmsNfqejeRXmNfmQHCNa', '', 9525380576, '2025-01-08 20:12:24'),
(1007, 'Niharika Jaiswal', '8877844178', '$2y$10$L.Rl/im8MxkT8XwOSw7cy.PfeW46t4ET5ovGBq9w6gCxGhRHR9zVi', '', 8877844178, '2025-01-08 20:14:16'),
(1009, 'Mansi Agarwal', '7481970617', '$2y$10$/n9gK1JsI66IEbWLHL9/SuTUoChvmV1IU9G4RgSO3grNmfeMvu8jm', '', 7481970617, '2025-01-08 20:25:06'),
(1010, 'SANDEEP JAIN', '9893507826', '$2y$10$18VJFxdAVtKS8omq1DnY/uTe2XC3arhTzc4iN1OBVKpgz7dvaU6rK', '', 9893507826, '2025-01-08 20:27:59'),
(1011, 'Mudit Maheshwari', '9917558621', '$2y$10$tCU/RL7WsejHAqpCL76U0ewE1JVO8.T0Q3qMEQT6P/uXlA9IHNkkG', '', 9917558621, '2025-01-08 20:30:30'),
(1012, 'Keshav Agrawal', '7644934589', '$2y$10$HHRBUbEdncJIgFlsMJ4oPuuMf3uiU0Y5gXT6mWnj3pNiFQa2wwEFu', '', 7644934589, '2025-01-08 20:32:11'),
(1013, 'Sanaya Agarwal', '7808775278', '$2y$10$98a4d45mwZv/L57HXNXoce0C1sQDYkvHjgfsQtjKNc6HZUnu.1bKO', '', 7808775278, '2025-01-08 20:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match_suggestions`
--
ALTER TABLE `match_suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `suggested_user_id` (`suggested_user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match_suggestions`
--
ALTER TABLE `match_suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `match_suggestions`
--
ALTER TABLE `match_suggestions`
  ADD CONSTRAINT `match_suggestions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `match_suggestions_ibfk_2` FOREIGN KEY (`suggested_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
