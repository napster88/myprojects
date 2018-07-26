-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 02:27 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ca_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fname` varchar(500) DEFAULT NULL,
  `lname` varchar(500) DEFAULT NULL,
  `emailid` varchar(500) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `resetcode` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `user_type` varchar(500) DEFAULT NULL,
  `created` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `parentid` varchar(500) DEFAULT NULL,
  `layout` longtext,
  `description` longtext,
  `menu_order` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `created` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `parentid`, `layout`, `description`, `menu_order`, `status`, `created`) VALUES
(1, 'home', 'home', '', 'left', '<p>This is text editorascaca</p>', '1', '1', NULL),
(2, 'page 1', 'page-1', '', 'left', '<p>This is text editorewccsdsdvdsv</p>', '2', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `parentid` varchar(500) DEFAULT NULL,
  `layout` longtext,
  `description` longtext,
  `menu_order` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `created` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(500) DEFAULT NULL,
  `mata_value` varchar(500) DEFAULT NULL,
  `created` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `parentid` varchar(500) DEFAULT NULL,
  `layout` longtext,
  `description` longtext,
  `menu_order` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `created` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(500) DEFAULT NULL,
  `lname` varchar(500) DEFAULT NULL,
  `emailid` varchar(500) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `resetcode` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `user_type` varchar(500) DEFAULT NULL,
  `created` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `emailid`, `username`, `password`, `photo`, `resetcode`, `status`, `user_type`, `created`) VALUES
(0, 'kapil', 'thakur', 'thakur.1988ideas@gmail.com', 'thakur', 'thakur', NULL, NULL, '1', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
