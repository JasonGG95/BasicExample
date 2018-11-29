-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 02:48 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `album_name` varchar(30) NOT NULL,
  `artist` varchar(30) NOT NULL,
  `year_of_release` int(4) NOT NULL,
  `no_of_songs` int(3) NOT NULL,
  `album_art` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `album_name`, `artist`, `year_of_release`, `no_of_songs`, `album_art`) VALUES
(1, 'Test Album', 'Test Artist', 2018, 12, 'album_art/album.jpg'),
(2, 'Test Album', 'Test Artist', 2018, 15, ''),
(3, 'Test Album', 'Test Artist', 2018, 21, ''),
(4, 'Test Album', 'Test Artist', 2018, 21, ''),
(5, 'Test Album', 'Test Artist', 2018, 21, ''),
(6, 'Test Album', 'Test Artist', 2018, 21, ''),
(7, 'Test Album', 'Test Artist', 2018, 21, ''),
(8, 'Test Album', 'Test Artist', 2018, 21, ''),
(9, 'Test Album', 'Test Artist', 2018, 21, ''),
(10, 'Test Album', 'Test Artist', 2018, 21, ''),
(11, 'Test Album', 'Test Artist', 2018, 21, ''),
(12, 'Test Album', 'Test Artist', 2018, 21, ''),
(13, 'Test Album', 'Test Artist', 2018, 21, ''),
(14, 'Test Album', 'Test Artist', 2018, 21, ''),
(15, 'Test Album', 'Test Artist', 2018, 21, ''),
(16, 'Test Album', 'Test Artist', 2018, 21, ''),
(17, 'Test Album', 'Test Artist', 2018, 21, ''),
(18, 'Test Album', 'Test Artist', 2018, 21, ''),
(19, 'Test Album', 'Test Artist', 2018, 21, ''),
(20, 'Test Album', 'Test Artist', 2018, 21, '');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `song_name` varchar(30) NOT NULL,
  `artist` varchar(30) NOT NULL,
  `album_name` varchar(30) NOT NULL,
  `year_of_release` int(4) NOT NULL,
  `contributing_artist` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `song_name`, `artist`, `album_name`, `year_of_release`, `contributing_artist`) VALUES
(1, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(2, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(3, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(4, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(5, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(6, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(7, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(8, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(9, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(10, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(11, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(12, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(13, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(14, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(15, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(16, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(17, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(18, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(19, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist'),
(20, 'Test Song', 'Test Artist', 'Test Album', 2018, 'Test Contributing Artist');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='users table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'localhost', 'admin'),
(2, 'User1', 'admin'),
(3, 'User2', 'admin'),
(4, 'localhost2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
