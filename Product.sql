-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8850
-- Generation Time: Jul 28, 2020 at 12:15 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Product`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_net_amount` int(11) NOT NULL,
  `product_tax_percent` int(11) NOT NULL,
  `product_gross_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `profile_id`, `product_name`, `product_quantity`, `product_net_amount`, `product_tax_percent`, `product_gross_amount`) VALUES
(1, 1, '1st changed again', 3131, 31, 31, 10),
(2, 1, 'only 23 as well', 31, 31, 131311, 40706),
(3, 1, 'U think HaldiRAMMM', 13131, 31, 31, 10),
(6, 2, 'AS', 12, 4141, 909, 0),
(109, 1, '1313', 31, 3, 13, 0),
(111, 1, 'NEW 0909090', 310301, 9, 3019, 272),
(113, 1, 'SHAUS', 3131, 3, 131, 4),
(121, 1, 'Shubham added', 3131, 31, 1313, 407),
(127, 1, 'A is V', 898, 98, 9831, 9634),
(128, 1, '1313', 3131, 31, 313, 97),
(129, 1, '1e13', 31331, 3131, 13131, 411132),
(130, 1, '1313', 3131, 31, 131, 41),
(131, 1, '1313', 3131131, 3112, 1312, 40829),
(132, 1, 'sh', 131, 31, 31, 10),
(133, 1, '1212', 12, 121, 212, 257),
(134, 1, '13131', 31, 31, 1331, 413),
(135, 1, ' NNNNNNNNN', 1313, 131, 3131, 4102),
(136, 1, 'WOWZER', 3323, 23, 3, 1),
(137, 1, '1313', 131, 31, 313, 97),
(138, 1, 'No more haldiram', 31, 13, 31, 4),
(139, 1, 'U think HaldiRAMMM', 13131, 31, 31, 10),
(140, 1, 'Alaso', 3131, 31, 1, 0),
(142, 1, 'Not ASaS', 31313, 13, 11, 1),
(143, 1, '131313', 131, 13, 11, 1),
(144, 1, 'change 25', 313131, 311, 31, 96),
(145, 1, '242424', 2, 4242, 42, 1782),
(146, 1, '1313', 13, 1313, 131, 1720),
(147, 1, '13131', 3131, 3131, 3131, 98032),
(148, 1, 'Just chaged it', 3131, 3131, 3131, 98032),
(150, 1, '13131', 31, 31, 31, 10),
(151, 1, 'Agin13131', 31, 3131, 31313, 980410);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin'),
(2, 'a@a.com', 'a'),
(3, 'admin1@admin.com', 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
