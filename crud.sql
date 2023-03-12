-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 12:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `password`, `file`, `status`) VALUES
(3, 'Elliott ', 'Kylan Wagner', 'judagefuru@mailinator.com', '$2y$10$ZIF7xdLCIDa7ilo5oHoVge0nvPGzTpHtN16UeWR3q1Yz6rHX7.pXu', '3.jpeg', 1),
(4, 'Yasir Serrano', 'Paula Joseph', 'nafiwacud@mailinator.com', '$2y$10$W0Gj6r41JgFdcF.SIbuzGeMB4/2dNVsqPwB7U8hxH3t1G9VBzUDrC', '4.jpg', 1),
(6, 'Jaquelyn King', 'Noah Huff', 'weheraj@mailinator.com', '$2y$10$bYnQMjWuDtibpKloEsElROv3kEtJaJgf3fjHwKMuEGNob7TA7OSYG', '6.jpeg', 1),
(9, 'Saria', 'Cullen Robles', 'kuzomu@mailinator.com', '$2y$10$eLDS7MR9qlCgJ//20yKvYeQK7tr2T49.4o/yclKGlB.1iIiMbcGC2', '9.jpg', 1),
(10, 'Simon ', 'Brett Bradford', 'berahusica@mailinator.com', '$2y$10$1eBP6NWtzP5xH/mo7KA8s.vbGMkqYYRiWozxaWM7oDAFj1dDL0Qeu', '10.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
