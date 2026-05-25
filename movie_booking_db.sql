-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 25, 2026 at 11:32 AM
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
-- Database: `movie_booking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `theatre_id` int(11) DEFAULT NULL,
  `payment_method` varchar(30) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `total_amount` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `name`, `email`, `phone`, `seats`, `movie_id`, `booking_date`, `theatre_id`, `payment_method`, `payment_status`, `total_amount`) VALUES
(1, 'vishal', 'vishalreddykamatham@gmail.com', '9000838947', 2, 1, '2026-05-04', NULL, NULL, NULL, NULL),
(2, 'khabeer ', 'khabeer@gmail.com', '9478389999', 4, 1, '2026-05-04', NULL, NULL, NULL, NULL),
(3, 'khB=abe', 'vishalreddykamatham@gmail.com', '987665', 2, 1, '2026-05-04', NULL, NULL, NULL, NULL),
(4, 'monish', 'monish@gmail.com', '9398522991', 2, 1, '2026-05-04', NULL, NULL, NULL, NULL),
(5, 'suma', 'suma@gmail.com', '65424246365', 7, 2, '2026-05-04', NULL, NULL, NULL, NULL),
(6, 'ramu', 'ramu@gmai.com', '938410031488', 4, 3, '2026-05-04', NULL, NULL, NULL, NULL),
(7, 'raju', 'raju@gmail.com', '63069638229', 4, 1, '2026-05-05', 2, 'UPI', 'SUCCESS', 1000.00),
(8, 'raju', 'raju@gmail.com', '63069638229', 4, 1, '2026-05-05', 2, 'UPI', 'SUCCESS', 1000.00),
(9, 'vishal', 'vk8292@gmail.com', '784732498', 6, 3, '2026-05-05', 1, 'UPI', 'SUCCESS', 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `language` varchar(30) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `genre`, `duration`, `language`, `release_date`, `image_url`) VALUES
(1, 'Interstellar', 'Sci-Fi', 169, 'English', '2014-11-07', 'https://m.media-amazon.com/images/I/81kz06oSUeL._AC_UF1000,1000_QL80_.jpg'),
(2, 'Inception', 'Thriller', 148, 'English', '2010-07-16', 'https://m.media-amazon.com/images/I/71uKM+LdgFL._AC_UF1000,1000_QL80_.jpg'),
(3, 'Avengers: Endgame', 'Action', 181, 'English', NULL, 'https://m.media-amazon.com/images/I/81ExhpBEbHL._AC_UF1000,1000_QL80_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `theatre_id` int(11) NOT NULL,
  `theatre_name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`theatre_id`, `theatre_name`, `location`) VALUES
(1, 'PVR Cinemas', 'Chennai'),
(2, 'INOX', 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `theatre_id` (`theatre_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`theatre_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `theatre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`theatre_id`) REFERENCES `theatre` (`theatre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
