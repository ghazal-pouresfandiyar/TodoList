-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 10:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`name`) VALUES
('English'),
('Exercising'),
('Programming'),
('Studying');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `task_name` varchar(11) NOT NULL,
  `task_subject` varchar(11) DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `reminder` datetime NOT NULL,
  `alert` varchar(10) NOT NULL,
  `priority` varchar(10) NOT NULL DEFAULT 'Low',
  `task_status` varchar(10) NOT NULL DEFAULT 'Undone',
  `info` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `username`, `task_name`, `task_subject`, `deadline`, `reminder`, `alert`, `priority`, `task_status`, `info`) VALUES
(20, 'ghazal', 'task1-gh', 'Studying', '2023-06-29 19:43:21', '0000-00-00 00:00:00', '', 'High', 'Done', ''),
(21, 'sara', 'sara-task', NULL, '2023-06-29 19:43:55', '0000-00-00 00:00:00', 'Deactive', 'Medium', 'Undone', ''),
(24, 'sara', 'correct', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'Low', 'Done', ''),
(26, 'ghazal', 'ghaz', 'English', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Deactive', 'Low', 'Undone', ''),
(27, 'ghazal', 'test', 'Programming', '2023-07-06 14:04:00', '2023-07-01 00:32:00', 'Deactive', 'High', 'Undone', ''),
(28, 'ghazal', 'test2', 'Exercising', '2023-07-07 04:54:00', '2023-07-01 00:31:00', 'Deactive', 'Medium', 'Done', ''),
(30, 'ghazal', 'new', 'English', '2023-07-06 01:57:00', '2023-06-30 03:54:00', 'Active', 'Medium', 'Undone', 'test info'),
(32, 'admin', 'test', 'Exercising', '2023-07-06 23:26:00', '2023-06-30 23:28:00', 'Active', 'Low', 'Undone', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', '123'),
('admin@admin.com', 'admin'),
('ghazal', 'Ghazal'),
('sara', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_ibfk_1` (`username`),
  ADD KEY `subject` (`task_subject`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`task_subject`) REFERENCES `subjects` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
