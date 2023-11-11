-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 09:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeevanimedicalcenterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(256) NOT NULL,
  `medicine_batch_no` varchar(256) NOT NULL,
  `medicine_brand` varchar(256) NOT NULL,
  `medicine_company` varchar(256) NOT NULL,
  `medicine_category` varchar(256) NOT NULL,
  `medicine_size` varchar(64) NOT NULL,
  `medicine_price` decimal(12,2) NOT NULL,
  `medicine_info` text DEFAULT NULL,
  `medicine_stock_status` int(11) NOT NULL DEFAULT 0,
  `medicine_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `medicine_batch_no`, `medicine_brand`, `medicine_company`, `medicine_category`, `medicine_size`, `medicine_price`, `medicine_info`, `medicine_stock_status`, `medicine_status`) VALUES
(1, 'Panadol', 'PAN-001', 'Panadol', 'GSK', 'Tablet', '1-pack, 6-cards, 12-tablets, 500mg', 2200.00, 'Pain killer', 1, 1),
(2, 'Piriton', 'PIRITON-1023', 'Piriton', 'GSK', 'Syrup', '100ml', 3000.00, 'Suspension', 0, 1),
(3, 'test', 'test', 'test', 'test', 'test', 'test', 69.00, 'test', 0, 0),
(4, 'ABC Traders', 'hgugu', 'Dell', 'ddvavd', 'Processor', 'fsf', 0.00, '', 0, 0),
(5, 'Dell XPS', 'hgugu', 'Dell', 'ddvavd', 'Processor', 'fsf', 0.00, 'abba', 0, 0),
(6, 'Dell XPS', 'hgugu', 'Dell', 'ddvavd', 'Processor', 'srbsb', 100.00, 'avaevaev', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'doctor'),
(3, 'clerk'),
(4, 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_medicine_id` int(11) NOT NULL,
  `stock_qty_max` int(11) NOT NULL,
  `stock_qty_buffer` int(11) NOT NULL,
  `stock_qty_current` int(11) NOT NULL DEFAULT 0,
  `stock_created_date` date NOT NULL,
  `stock_updated_date` date NOT NULL,
  `stock_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_medicine_id`, `stock_qty_max`, `stock_qty_buffer`, `stock_qty_current`, `stock_created_date`, `stock_updated_date`, `stock_status`) VALUES
(1, 1, 500, 200, 0, '2023-08-05', '2023-08-05', 1),
(2, 3, 500, 200, 0, '2023-08-05', '2023-08-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(256) NOT NULL,
  `user_lname` varchar(256) NOT NULL,
  `user_address` text DEFAULT 'N/A',
  `user_dob` date NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_nic` varchar(12) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_attached_info_id` int(11) DEFAULT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_address`, `user_dob`, `user_email`, `user_nic`, `user_password`, `user_role_id`, `user_attached_info_id`, `user_status`) VALUES
(1, 'John ', 'Doe', '71, Wackwella road, Kottawa', '1977-08-17', 'johndoe@gmail.com', '111122223333', '$2y$10$TKLbwpxVCE1zFYZLanlDdOHSaHGIbaw.K9G5YCvfxKFO5VH.EFFFq', 4, 0, 1),
(8, 'Thumuditha', 'Jayawardhana', '38, Wackwella road, Kottawa', '2006-06-08', 'thumuditha@gmail.com', '798831775V', '$2y$10$L4SLX96WDcqnZtDX8ShjyeL4nOTEaAp1mAEZXCfB7MxyUY1J70DOq', 4, NULL, 1),
(9, 'Sanuk', 'Hansana', '20A, Fernando Street, Polgasowita', '2002-09-18', 'sanuksanuk@yahoo.com', '446512591100', '$2y$10$MSYGE8fYijYglGzfV37ncO9r7lM6ZV3hAsPRSJYcUOQ.5opZrTkLW', 4, NULL, 1),
(10, 'Sasvidu', 'Ranthul', '56B/51, Greenvelley 1st lane, Galwaladeniya road, Mattegoda.', '2007-01-31', 'amsranthul@gmail.com', '111122223334', '$2y$10$Z0y9JIGZIPFw/J7bl1vq8u/Hwq5wYmZft/FyDHa8jf6b599yHDj8O', 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
