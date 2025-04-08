-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4307
-- Generation Time: Apr 09, 2025 at 01:54 AM
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
-- Database: `skillspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` enum('worker','employer') NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `username`, `email`, `password`, `phone`, `is_verified`, `created_at`) VALUES
(1, 'worker', 'a', 'a', 'a', 'a@a', '$2y$10$e8iVuOPkUZALR3BZis7PBOzMbbvQRorEcJu.oZsxgegteAOQZim.K', '2312', 0, '2025-02-16 14:35:16'),
(4, 'worker', 'sv', 'dfb', 'db', 'db@df', '$2y$10$RuJGiEpQRuIxZkWYfxrtNuW70qBG8K2s3HggFkwwiMnCGR18N1LlK', '45', 0, '2025-02-16 14:40:10'),
(5, 'worker', 'fgb', 'gfb', 'frgb', 'fgb@defg', '$2y$10$YjKMpF87LNzpzZ7KLSjNXuCKoXm9QRSJdsijZPSjDFbqfKIJrh5TO', '1243231', 0, '2025-02-16 14:44:50'),
(6, 'worker', 'Amit', 'Kumar', 'amitkumar', 'amitkumar@gmail.com', '$2y$10$yOgpXP9996oXtk9rh4HNJeNM3olpJGCknH6qnNGBsaEsh.Gp5HacG', '+18077075530', 0, '2025-02-16 14:54:26'),
(7, 'employer', 'df', 'wf', 'wre', 'wfw@sd', '$2y$10$zWar.7xrwjnq4srjblNb8ewYyX.WjvJdL.DZhriPNQYVPV0UR9Upi', '1243', 1, '2025-02-16 15:01:56'),
(12, 'worker', 'Amit', 'Kumar', 'amitkumarr', 'amitkumarr@gmail.com', '$2y$10$C3eOJNYW1ModKj.QugJRGuJIZDixwUkozZZYlWM7rCaeQtChzKlsK', '1234567890', 0, '2025-02-16 15:09:16'),
(13, 'employer', 'amit', 'kumar', 'amit', 'amit@amit.com', '$2y$10$Q4NifNn8X7BBoBIn/9U9CONXKMXVjlUmB/oS/WHmCvm9nBmqP/5Ky', '123433124', 1, '2025-02-16 15:11:29'),
(20, 'worker', 'Amit', 'Kumar', 'amitkumar4025', 'amitkumar4025@gmail.com', '$2y$10$lJeRNl43brWPl6VUcWyOB.9AcNO2KflgHO2OHz7iAL2e1pacYJjXC', '7837161439', 1, '2025-02-17 07:17:21'),
(21, 'worker', 'Amit', 'Kumar', 'amitkumar402525', 'amitkumar402525@gmail.com', '$2y$10$rb.HE0h4URnp7wWyhg77bekwOyF481vVrk5H1fpnQwH9eOD9aWRXm', '8077075530', 1, '2025-02-17 08:00:47'),
(22, 'employer', 'bhrukuti', 'patel', 'brukspatel', 'brukspatel@gmail.com', '$2y$10$BSo8w2jwcyLZhmnLHHlsXOSy6MD0malF9UTkPBbK/1LB6HZbtaY/u', '222', 1, '2025-02-18 16:51:14'),
(23, 'worker', 'Ravi', 'Kumar', 'ravikumar', 'ravikumar@gmail.com', '$2y$10$Hx0RiYc2NC5jaNKWsM4nnOnup8uoZkcbukhYSDL/DFU2vAeDrCWnG', '916280815282', 1, '2025-03-03 23:24:13'),
(24, 'employer', 'bhrukuti', 'patel', 'bhrukutipatel', 'bhrukutipatel@gmail.com', '$2y$10$Uso8q8KOb3DdVq.p69hjs.ojmQz4Rhh1IDtHFNWAl4ihg0vRdUV16', '8078078077', 1, '2025-03-14 14:01:07'),
(25, 'worker', 'work', 'test', 'worktest', 'worktest@gmail.com', '$2y$10$U4QZIpfkjjQSLj8Sa1cZuOSJ9xX3hdVMrxgeC/PbJORTVjPajpCka', '123456789', 1, '2025-03-19 22:53:05'),
(26, 'employer', 'employer', 'test', 'employertest', 'employertest@gmail.com', '$2y$10$uZvh7TDTJn3mx0iVm1qQHesvim/QFR8y4AK5OEcarC3lZP53LCkYq', '123456788', 1, '2025-03-19 22:53:53'),
(27, 'employer', 'employer', 'employer', 'employer', 'employer@gmail.com', '$2y$10$sw598FitJjaVs0mfgNsDTe0NK5Va5wWv.5I/4gaCCnNwIMCNyA.jW', '0123456789', 1, '2025-04-08 07:13:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `first_name` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
