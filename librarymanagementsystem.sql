-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 06:19 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `adminemail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `adminemail`, `username`, `password`, `updationdate`) VALUES
(1, 'admin', 'admin23@gmail.com', 'admin', 'admin', '2019-01-18 01:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `authorname` varchar(255) NOT NULL,
  `creationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `authorname`, `creationdate`) VALUES
(1, 'Ashlee Vance', '2019-01-30'),
(2, ' E. Balagurusamy', '2019-01-30'),
(3, 'Isaac Asimov', '2019-01-30'),
(4, ' H W Wilson', '2019-01-30'),
(5, ' Camille Laurens', '2019-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publishers` varchar(255) NOT NULL,
  `isbn` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookname`, `category`, `author`, `publishers`, `isbn`, `price`, `regdate`) VALUES
(1, 'Elon Musk', '4', '1', 'Virgin Books', 2147483647, '382', '2019-01-30'),
(2, 'Little Dancer Aged Fourteen', '2', '5', 'Other Press ', 1590519582, '894.84', '2019-01-30'),
(3, 'PROGRAMMING IN ANSI C', '1', '2', 'McGraw Hill Education India Private Limited', 71329854, '413', '2019-01-30'),
(4, 'Applied Science and Technology Index, Volume 1914', '3', '4', 'Palala Press', 1354751930, '1489', '2019-01-30'),
(5, 'I, Robot', '5', '3', 'Gnome Press', 553294385, '507.98', '2019-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `creationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`, `creationdate`) VALUES
(1, 'Computer science', 'active', '2019-01-30'),
(2, 'Arts and recreation', 'active', '2019-01-30'),
(3, 'Technology and applied science', 'active', '2019-01-30'),
(4, 'Biography', 'active', '2019-01-30'),
(5, 'Science Fiction', 'active', '2019-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `issuedbooks`
--

CREATE TABLE `issuedbooks` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `issuedate` date NOT NULL,
  `returndate` date DEFAULT NULL,
  `returnstatus` enum('0','1','','') NOT NULL DEFAULT '0',
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuedbooks`
--

INSERT INTO `issuedbooks` (`id`, `bookid`, `email`, `issuedate`, `returndate`, `returnstatus`, `fine`) VALUES
(1, 3, 'bhargav2242@gmail.com', '2019-01-30', '2019-01-30', '1', 0),
(2, 5, 'bhariypatel23@gmail.com', '2019-01-30', '2019-02-03', '1', 0),
(3, 1, 'shehbaz.badi572@gmail.com', '2019-01-30', '2019-02-03', '1', 50),
(4, 2, 'patelyash60056@gmail.com', '2019-01-30', NULL, '0', NULL),
(5, 4, 'bhargav2242@gmail.com', '2019-01-30', NULL, '0', NULL),
(6, 5, 'shehbaz.badi572@gmail.com', '2019-02-02', NULL, '0', NULL),
(8, 4, 'bhariypatel23@gmail.com', '2019-02-03', '2019-02-03', '1', 0),
(9, 1, 'svkarmur5@gmail.com', '2019-02-03', NULL, '0', NULL),
(10, 2, 'shehbaz.badi572@gmail.com', '2019-02-03', '2019-02-03', '1', 0),
(11, 4, 'svkarmur5@gmail.com', '2019-02-03', NULL, '0', NULL),
(12, 3, 'shehbaz.badi572@gmail.com', '2019-02-03', '2019-02-03', '1', 0),
(13, 3, 'shehbaz.badi572@gmail.com', '2019-02-03', NULL, '0', NULL),
(14, 4, 'shehbaz.badi572@gmail.com', '2019-02-03', NULL, '0', NULL),
(15, 1, 'bhariypatel23@gmail.com', '2019-02-03', NULL, '0', NULL),
(16, 4, 'patelyash60056@gmail.com', '2019-02-03', '2019-02-03', '1', 0),
(17, 5, 'svkarmur5@gmail.com', '2019-02-03', NULL, '0', NULL),
(18, 2, 'shehbaz.badi572@gmail.com', '2019-02-03', '2019-02-03', '1', 0),
(19, 5, 'patelyash60056@gmail.com', '2019-02-03', '2019-02-15', '1', 50),
(20, 2, 'shehbaz.badi572@gmail.com', '2019-02-03', '2019-02-03', '1', 0),
(21, 2, 'svkarmur5@gmail.com', '2019-02-03', NULL, '0', NULL),
(22, 4, 'svkarmur5@gmail.com', '2019-02-03', NULL, '0', NULL),
(23, 5, 'patelyash60056@gmail.com', '2019-02-11', '2019-02-11', '1', 0),
(24, 1, 'patelyash60056@gmail.com', '2019-02-13', '2019-02-15', '1', 0),
(25, 4, 'shehbaz.badi572@gmail.com', '2019-02-14', NULL, '0', NULL),
(26, 5, 'patelyash60056@gmail.com', '2019-02-14', '2019-02-15', '1', 50),
(27, 3, 'shehbaz.badi572@gmail.com', '2019-02-15', '2019-02-15', '1', 0),
(28, 1, 'shehbaz.badi572@gmail.com', '2019-02-21', '2019-02-21', '1', 0),
(29, 3, 'shehbaz.badi572@gmail.com', '2019-02-21', NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `regdate` date NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobile`, `regdate`, `status`, `password`) VALUES
(1, 'Shehbaz', 'Badi', 'shehbaz.badi572@gmail.com', 2147483647, '2019-01-30', 'inactive', 's123'),
(2, 'Bhariy', 'Patel', 'bhariypatel23@gmail.com', 2147483647, '2019-01-30', 'inactive', 'b123'),
(3, 'Bhargav', 'Patel', 'bhargav2242@gmail.com', 2147483647, '2019-01-30', 'inactive', 'p123'),
(4, 'Yash', 'Patel', 'patelyash60056@gmail.com', 2147483647, '2019-01-30', 'inactive', '60056'),
(5, 'Subhash', 'Karmur', 'svkarmur5@gmail.com', 2147483647, '2019-01-30', 'inactive', 'ksv07'),
(6, 'test', 'aaa', 'test@gmail.com', 1234567890, '2019-01-30', 'active', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuedbooks`
--
ALTER TABLE `issuedbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issuedbooks`
--
ALTER TABLE `issuedbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
