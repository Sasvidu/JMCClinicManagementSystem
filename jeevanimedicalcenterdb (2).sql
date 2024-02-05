-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 11:44 AM
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
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_schedule_id` int(11) NOT NULL,
  `appointment_patient_id` int(11) NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_prescription_status` int(11) NOT NULL DEFAULT 0,
  `appointment_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_schedule_id`, `appointment_patient_id`, `appointment_time`, `appointment_prescription_status`, `appointment_status`) VALUES
(1, 2, 8, '09:30:00', 1, 1),
(2, 4, 8, '08:00:00', 0, 1),
(3, 2, 1, '09:40:00', 1, 1),
(5, 5, 8, '08:00:00', 1, 1),
(6, 5, 8, '08:10:00', 0, 0),
(7, 5, 8, '08:20:00', 0, 0),
(8, 6, 1, '08:00:00', 0, 0),
(9, 6, 8, '08:10:00', 0, 0),
(10, 7, 8, '10:00:00', 1, 1),
(11, 7, 1, '10:10:00', 0, 1),
(12, 7, 11, '10:20:00', 0, 1),
(13, 8, 11, '09:00:00', 1, 1),
(14, 9, 15, '08:45:00', 0, 1),
(15, 10, 8, '08:00:00', 1, 1),
(16, 11, 8, '08:10:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_specialisation` varchar(128) NOT NULL,
  `doctor_qualifications` text NOT NULL,
  `doctor_experience` text NOT NULL,
  `doctor_tel_no` int(10) NOT NULL,
  `doctor_user_id` int(11) NOT NULL,
  `doctor_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_specialisation`, `doctor_qualifications`, `doctor_experience`, `doctor_tel_no`, `doctor_user_id`, `doctor_status`) VALUES
(1, '20A, Jayarathne Street, Polgasowita', 'Cardiology', 'MD in Medicine\r\nMBBS in Medicine', 10, 9, 0),
(3, 'Gynecology', 'MD in Medicine\r\nBSc in Biomedicine', '5 years in Australan National Hospital\r\n2 years in Colombo Hospital', 754574385, 13, 1),
(4, 'Neorosurgeon', 'MD in Neurology\r\nMBBS', '20 Years at Colombo Hospital', 773644499, 18, 1);

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
(2, 'Piriton', 'PIRITON-1023', 'Piriton', 'GSK', 'Syrup', '100ml', 3000.00, 'Suspension', 1, 1),
(3, 'test', 'test', 'test', 'test', 'test', 'test', 69.00, 'test', 0, 0),
(4, 'ABC Traders', 'hgugu', 'Dell', 'ddvavd', 'Processor', 'fsf', 0.00, '', 0, 0),
(5, 'Dell XPS', 'hgugu', 'Dell', 'ddvavd', 'Processor', 'fsf', 0.00, 'abba', 0, 0),
(6, 'Dell XPS', 'hgugu', 'Dell', 'ddvavd', 'Processor', 'srbsb', 100.00, 'avaevaev', 0, 0),
(7, 'Aspirin', 'ASPRN-333', 'Aspirin', 'GSK', 'Tablet', '1-pack, 6-cards, 12-tablets, 500mg', 3000.00, 'hmmmmm', 0, 0),
(8, 'Augmentine', 'AUG-001', 'Antibiotic44', '[Dont know]', 'Tablet', '1-pack, 6-cards, 12-tablets, 500mg', 10000.00, 'saeb', 0, 0),
(9, 'Omithrisol', 'OMITHRI-001', 'Omithrisol', 'SPC', 'Tablet', '1-pack, 6-cards, 12-tablets, 500mg', 4800.00, 'Used for mild gasritis', 0, 1),
(10, 'ABC Traders', 'hgugu', 'Intel', 'GSK', 'Injection', '1-pack, 6-cards, 12-tablets each, 500mg', 0.03, 'eqv', 0, 0),
(11, 'ea ', 'ae ae', 'aev', 'av ae', 'Injection', ' ae ', 0.02, 'qeve', 0, 0),
(12, 'd d ', 'da ad ', 'ae  ', 'ae ae ', 'Syrup', 'ad ', 0.02, 'a a aee', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patientdata`
--

CREATE TABLE `patientdata` (
  `patientdata_id` int(11) NOT NULL,
  `patientdata_bloodGroup` enum('O+','O-','A+','A-','B+','B-','AB+','AB-') NOT NULL,
  `patientdata_allergies` text DEFAULT NULL,
  `patientdata_heartDisease` tinyint(1) NOT NULL,
  `patientdata_highBloodPressure` tinyint(1) NOT NULL,
  `patientdata_accident` tinyint(1) NOT NULL,
  `patientdata_diabetes` tinyint(1) NOT NULL,
  `patientdata_surgery` tinyint(1) NOT NULL,
  `patientdata_cholesterol` tinyint(1) NOT NULL,
  `patientdata_description` text NOT NULL,
  `patientdata_history` text NOT NULL,
  `patientdata_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdata`
--

INSERT INTO `patientdata` (`patientdata_id`, `patientdata_bloodGroup`, `patientdata_allergies`, `patientdata_heartDisease`, `patientdata_highBloodPressure`, `patientdata_accident`, `patientdata_diabetes`, `patientdata_surgery`, `patientdata_cholesterol`, `patientdata_description`, `patientdata_history`, `patientdata_status`) VALUES
(1, 'O+', 'Chicken', 1, 1, 0, 0, 0, 1, 'Patient has Asthma.\r\nIs currently taking prescribed inhalers.', 'Father, Grandmother, Grandfather as well as several aunts also have asthma.', 1),
(3, 'B+', 'None', 1, 0, 0, 0, 0, 0, 'No prescriptions are currently being taken.', 'No significant family history with diseases.', 1),
(4, 'A-', 'None', 0, 1, 0, 1, 0, 0, 'Diagnosed for diabetes.\r\nNo prescriptions are currently being taken.', 'Family history of diabetes.', 1),
(5, 'B+', 'None.', 0, 0, 0, 0, 0, 0, 'Suffering from Cough.', 'No significant history.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` decimal(12,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_supplier_id` int(11) NOT NULL,
  `payment_order_id` int(11) DEFAULT NULL,
  `payment_comment` varchar(128) DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_amount`, `payment_date`, `payment_supplier_id`, `payment_order_id`, `payment_comment`, `payment_status`) VALUES
(1, 5000.00, '2023-11-13', 1, 3, '', 1),
(2, 10000.00, '2023-11-13', 3, 0, 'Advance Offered to Supplier', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `prescription_appointment_id` int(11) NOT NULL,
  `prescription_medicine_id` int(11) NOT NULL,
  `prescription_medicine_qty` int(11) NOT NULL,
  `prescription_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `prescription_appointment_id`, `prescription_medicine_id`, `prescription_medicine_qty`, `prescription_status`) VALUES
(1, 5, 1, 0, 1),
(3, 3, 2, 5, 0),
(10, 10, 1, 2, 1),
(13, 13, 2, 5, 1),
(15, 15, 2, 5, 1);

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
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_doctor_id` int(11) NOT NULL,
  `schedule_start_time` time NOT NULL,
  `schedule_end_time` time NOT NULL,
  `schedule_available_time` time NOT NULL,
  `schedule_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_date`, `schedule_doctor_id`, `schedule_start_time`, `schedule_end_time`, `schedule_available_time`, `schedule_status`) VALUES
(1, '2023-11-30', 3, '08:00:00', '18:00:00', '08:00:00', 0),
(2, '2023-12-01', 3, '09:30:00', '10:30:00', '09:30:00', 1),
(3, '2023-11-29', 3, '08:00:00', '11:40:00', '08:00:00', 1),
(4, '2023-11-30', 4, '08:00:00', '13:00:00', '08:00:00', 1),
(5, '2023-12-03', 3, '08:00:00', '08:30:00', '08:30:00', 1),
(6, '2023-12-04', 3, '08:00:00', '14:00:00', '08:20:00', 1),
(7, '2024-01-28', 3, '10:00:00', '13:45:00', '10:30:00', 1),
(8, '2024-02-04', 3, '09:00:00', '14:00:00', '09:10:00', 1),
(9, '2024-02-05', 3, '08:45:00', '12:45:00', '08:55:00', 1),
(10, '2024-02-07', 3, '08:00:00', '14:00:00', '08:10:00', 1),
(11, '2024-02-05', 4, '08:10:00', '13:10:00', '08:20:00', 1);

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
(1, 1, 550, 200, 9, '2023-08-05', '2023-08-05', 1),
(2, 2, 200, 170, 130, '2023-11-13', '2023-11-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockorder`
--

CREATE TABLE `stockorder` (
  `order_id` int(11) NOT NULL,
  `order_medicine_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_price` decimal(12,2) NOT NULL,
  `order_completed_payment` decimal(12,2) NOT NULL DEFAULT 0.00,
  `order_supplier_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockorder`
--

INSERT INTO `stockorder` (`order_id`, `order_medicine_id`, `order_date`, `order_qty`, `order_price`, `order_completed_payment`, `order_supplier_id`, `order_status`) VALUES
(1, 1, '2023-11-13', 10, 22000.00, 0.00, 1, 1),
(2, 1, '2023-11-14', 5, 11000.00, 0.00, 1, 1),
(3, 2, '2023-11-13', 150, 450000.00, 5000.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(128) NOT NULL,
  `supplier_origin` varchar(128) NOT NULL,
  `supplier_specialisation` varchar(256) NOT NULL,
  `supplier_pending_payment` decimal(12,2) NOT NULL DEFAULT 0.00,
  `supplier_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_origin`, `supplier_specialisation`, `supplier_pending_payment`, `supplier_status`) VALUES
(1, 'GSK', 'London', 'Vaccines', 478000.00, 1),
(2, 'SPC', 'Colombo', 'Painkillers', 0.00, 0),
(3, 'SPC', 'Colombo', 'Painkillers', -10000.00, 1);

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
(1, 'John ', 'Doe', '71, Wackwella road, Kottawa', '1977-08-17', 'johndoe@gmail.com', '111122223333', '$2y$10$TKLbwpxVCE1zFYZLanlDdOHSaHGIbaw.K9G5YCvfxKFO5VH.EFFFq', 4, 3, 1),
(8, 'Thumuditha', 'Jayawardhana', '38, Wackwella road, Kottawa', '2006-06-08', 'thumuditha@gmail.com', '798831775V', '$2y$10$GD89xAnKxBwfI0Fg/Czgu.b2jaBKF.nfP.dV2Qlk6tWH58IdXjZcW', 4, 4, 1),
(9, 'Sanuk', 'Hansana', '20A, Jayarathne Street, Polgasowita', '2002-09-18', 'sanuksanuk@yahoo.com', '111122334444', '$2y$10$MSYGE8fYijYglGzfV37ncO9r7lM6ZV3hAsPRSJYcUOQ.5opZrTkLW', 4, 1, 1),
(10, 'Sasvidu', 'Ranthul', '56B/51, Greenvelley 1st lane, Galwaladeniya road, Mattegoda.', '2007-01-31', 'amsranthul@gmail.com', '111122223334', '$2y$10$Z0y9JIGZIPFw/J7bl1vq8u/Hwq5wYmZft/FyDHa8jf6b599yHDj8O', 1, NULL, 1),
(11, 'Azmaan', 'Nazoofar', '22, Pissan Kotuwa, Angoda', '2006-07-31', 'azmaan@gmail.com', '222211113333', '$2y$10$QMMBYZ45qQIRduDmYo8NQ./1GABa.2kPhmX4Ql0CysuZZG9qzf99q', 4, 5, 1),
(12, 'PatientTest', 'TestLast', 'Random Address', '2007-02-07', 'tester@test.com', '111122223456', '$2y$10$jd2xo79r5Q/OybmM8w.wSeOTBSRtRyHqZ81AT2yl.FEa4nqMBLe4K', 4, NULL, 1),
(13, 'Johann', 'Jayathilake', '42, Fernando road, Maharagama', '2006-01-31', 'johann@gmail.com', '112233445567', '$2y$10$hQmGbfAhMne2QKdKr0rLoOI4XidhOyeU0qmLHGGyoms5fX69nYMJS', 2, 3, 1),
(14, 'Kaveesha', 'Perera', '11, Thumbovila road, Kasbewa', '2006-11-09', 'kaveesha@gmail.com', '114455662233', '$2y$10$45g4RE8otSlQbTFn6EvpZ.8P.VR6zvVGVyR07gJwjvNs1Z8bvVBuy', 3, NULL, 1),
(15, 'Samadhi', 'Bimsath', '73, Maliban road, Colombo 10', '2006-11-14', 'samadhi@gmail.com', '111128223334', '$2y$10$VU43BO9r89wrZWKRRwXWpulZTrr6HX8usRj3d3gjwB.I4SVLHmNPu', 4, NULL, 1),
(16, 'Didula', 'Kotahewa', '33, Honourable street, Gampaha', '2007-01-09', 'didula@gmail.com', '111126233334', '$2y$10$e3vWBVi.BFP2VI4NXizJ2uzRnpG1xNnnwIXaJ8depPwIaLsv.uidW', 4, NULL, 1),
(17, 'Eyasa', 'Munasinghe', '56B/51, Greenvelley 1st lane, Galwaladeniya Road ', '1976-11-24', 'eyasa1979@gmail.com', '222244446666', '$2y$10$BfoFOJ2vDW5mt1c5XS8PceHKX48iaDXhK4GII273ORu4l3aHvYiji', 1, NULL, 1),
(18, 'Chaminda', 'Jayathilake', '56B/51,Greenvelley 1st lane, Galwaladeniya Road', '1964-02-29', 'cjranadith@gmail.com', '446512591111', '$2y$10$kMJL5CWuAa.wD6DUOtWxa.ieLoh5ELpyMvxrrRc16trq8RAhC9.qe', 2, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD PRIMARY KEY (`patientdata_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stockorder`
--
ALTER TABLE `stockorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patientdata`
--
ALTER TABLE `patientdata`
  MODIFY `patientdata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stockorder`
--
ALTER TABLE `stockorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
