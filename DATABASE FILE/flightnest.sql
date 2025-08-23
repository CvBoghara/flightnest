-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 06:36 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flightnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uname`, `admin_email`, `admin_pwd`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(3, 'flightNest', 'flightNest@admin.com', '$2a$12$7ZBT3BzlpIKKrljphWPMe.2G6PkUmMyupo3ey3h6pYAXDg1G/9zoa');


-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `airline_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`airline_id`, `name`, `seats`) VALUES
(1, 'IndiGo', 165),
(2, 'Air India', 220),
(3, 'Vistara', 125),
(4, 'SpiceJet', 210),
(5, 'Akasa Air', 185);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city`) VALUES
('Mumbai'),
('Delhi'),
('Bengaluru'),
('Ahmedabad'),
('Surat'),
('Rajkot'),
('Hyderabad'),
('Pune'),
('Kolkata'),
('Chennai'),
('Goa'),
('Dubai'),
('Sharjah'),
('Doha'),
('Muscat'),
('Jeddah'),
('London'),
('Singapore'),
('Bangkok'),
('Kuwait City'),
('Abu Dhabi');


-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `q1` varchar(250) NOT NULL,
  `q2` varchar(20) NOT NULL,
  `q3` varchar(250) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `arrivale` datetime NOT NULL,
  `departure` datetime NOT NULL,
  `Destination` varchar(20) NOT NULL,
  `source` varchar(20) NOT NULL,
  `airline` varchar(20) NOT NULL,
  `Seats` varchar(110) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `flight_code` varchar(10) NOT NULL,
  `status` varchar(6) DEFAULT NULL,
  `issue` varchar(50) DEFAULT NULL,
  `last_seat` varchar(5) DEFAULT '',
  `bus_seats` int(11) DEFAULT '20',
  `last_bus_seat` varchar(5) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `admin_id`, `arrivale`, `departure`, `Destination`, `source`, `airline`, `Seats`, `duration`, `Price`, `flight_code`, `status`, `issue`, `last_seat`, `bus_seats`, `last_bus_seat`) VALUES
(1, 1, '2025-08-04 08:30:00', '2025-08-04 07:15:00', 'Mumbai', 'Ahmedabad', 'IndiGo', 180, 1, 3200, '6E2451', 'dep', '', '', 20, ''),
(2, 1, '2025-08-04 09:45:00', '2025-08-04 08:25:00', 'Delhi', 'Surat', 'SpiceJet', 160, 1, 3500, 'SG3165', 'dep', '', '', 20, ''),
(3, 1, '2025-08-04 11:20:00', '2025-08-04 10:00:00', 'Bengaluru', 'Rajkot', 'Air India', 150, 1, 4300, 'AI6542', 'dep', '', '', 20, ''),
(4, 1, '2025-08-04 13:30:00', '2025-08-04 11:45:00', 'Pune', 'Ahmedabad', 'Akasa Air', 190, 2, 3600, 'QP1201', 'dep', '', '', 20, ''),
(5, 1, '2025-08-04 15:00:00', '2025-08-04 13:30:00', 'Hyderabad', 'Surat', 'Vistara', 170, 2, 3900, 'UK2213', 'dep', '', '', 20, ''),
(6, 1, '2025-08-04 18:10:00', '2025-08-04 16:40:00', 'Dubai', 'Ahmedabad', 'Emirates', 300, 3, 14900, 'EK538', 'dep', '', '', 20, ''),
(7, 1, '2025-08-04 21:20:00', '2025-08-04 19:50:00', 'Sharjah', 'Surat', 'Air Arabia', 200, 2, 13300, 'G9443', 'dep', '', '', 20, ''),
(8, 1, '2025-08-04 23:45:00', '2025-08-04 21:30:00', 'London', 'Ahmedabad', 'Air India', 280, 8, 48500, 'AI1314', 'dep', '', '', 20, ''),
(9, 1, '2025-08-04 20:45:00', '2025-08-04 18:50:00', 'Kolkata', 'Rajkot', 'SpiceJet', 165, 2, 4400, 'SG2086', 'dep', '', '', 20, ''),
(10, 1, '2025-08-04 22:15:00', '2025-08-04 20:45:00', 'Chennai', 'Ahmedabad', 'IndiGo', '180', '2', 4100, '6E1180', 'dep', '', '', 20, ''),
(11, 1, TIMESTAMP(CURDATE(),'07:55:00'), TIMESTAMP(CURDATE(),'06:15:00'), 'Hyderabad', 'Surat', 'IndiGo', '180', '1', 3200, '6E928', '', NULL, '', 20, ''),
(12, 1, TIMESTAMP(CURDATE(),'08:00:00'), TIMESTAMP(CURDATE(),'06:10:00'), 'Delhi', 'Surat', 'IndiGo', '190', '2', 4500, '6E2275', '', NULL, '', 20, ''),
(13, 1, TIMESTAMP(CURDATE(),'10:30:00'), TIMESTAMP(CURDATE(),'08:25:00'), 'Chennai', 'Surat', 'IndiGo', '200', '2', 5000, '6E991', '', NULL, '', 20, ''),
(14, 1, TIMESTAMP(CURDATE(),'13:05:00'), TIMESTAMP(CURDATE(),'11:15:00'), 'Delhi', 'Surat', 'IndiGo', '210', '2', 8000, '6E5387', '', NULL, '', 20, ''),
(15, 1, TIMESTAMP(CURDATE(),'13:35:00'), TIMESTAMP(CURDATE(),'12:50:00'), 'Diu', 'Surat', 'IndiGo', '240', '1', 9000, '6E7967', '', NULL, '', 20, ''),
(16, 1, TIMESTAMP(CURDATE(),'14:10:00'), TIMESTAMP(CURDATE(),'12:55:00'), 'Pune', 'Surat', 'IndiGo', '260', '2', 10000, '6E6191', '', NULL, '', 20, ''),
(17, 1, TIMESTAMP(CURDATE(),'15:45:00'), TIMESTAMP(CURDATE(),'14:25:00'), 'Jaypur', 'Surat', 'IndiGo', '280', '1', 10000, '6E715', '', NULL, '', 20, ''),
(18, 1, TIMESTAMP(CURDATE(),'17:05:00'), TIMESTAMP(CURDATE(),'14:15:00'), 'Kolkata', 'Surat', 'IndiGo', '170', '3', 11000, '6E967', '', NULL, '', 20, ''),
(19, 1, TIMESTAMP(CURDATE(),'17:10:00'), TIMESTAMP(CURDATE(),'15:20:00'), 'Delhi', 'Surat', 'IndiGo', '160', '2', 15000, '6E2557', '', NULL, '', 20, ''),
(20, 1, TIMESTAMP(CURDATE(),'20:25:00'), TIMESTAMP(CURDATE(),'18:30:00'), 'Bengaluru', 'Surat', 'IndiGo', '180', '2', 6500, '6E6008', '', NULL, '', 20, ''),
(21, 1, TIMESTAMP(CURDATE(),'21:00:00'), TIMESTAMP(CURDATE(),'19:10:00'), 'Delhi', 'Surat', 'IndiGo', '190', '2', 4500, '6E6511', '', NULL, '', 20, ''),
(22, 1, TIMESTAMP(CURDATE(),'10:25:00'), TIMESTAMP(CURDATE(),'08:25:00'), 'Bengaluru', 'Surat', 'IndiGo', '200', '2', 5000, '6R6009', '', NULL, '', 20, ''),
(23, 1, TIMESTAMP(CURDATE(),'10:20:00'), TIMESTAMP(CURDATE(),'08:30:00'), 'Delhi', 'Surat', 'IndiGo', '210', '2', 8000, '6E2078', '', NULL, '', 20, ''),
(24, 1, TIMESTAMP(CURDATE(),'14:10:00'), TIMESTAMP(CURDATE(),'13:55:00'), 'Diu', 'Surat', 'IndiGo', '240', '1', 9000, '6E7968', '', NULL, '', 20, ''),
(25, 1, TIMESTAMP(CURDATE(),'16:40:00'), TIMESTAMP(CURDATE(),'15:20:00'), 'Goa', 'Surat', 'IndiGo', '260', '1', 10000, '6E419', '', NULL, '', 20, ''),
(26, 1, TIMESTAMP(CURDATE(),'17:40:00'), TIMESTAMP(CURDATE(),'16:20:00'), 'Jaypur', 'Surat', 'IndiGo', '280', '1', 15000, '6E784', '', NULL, '', 20, ''),
(27, 1, TIMESTAMP(CURDATE(),'19:30:00'), TIMESTAMP(CURDATE(),'17:40:00'), 'Delhi', 'Surat', 'IndiGo', '170', '1', 6500, '6E5035', '', NULL, '', 20, ''),
(28, 1, TIMESTAMP(CURDATE(),'20:00:00'), TIMESTAMP(CURDATE(),'17:45:00'), 'Kolkata', 'Surat', 'IndiGo', '160', '3', 7500, '6E968', '', NULL, '', 20, ''),
(29, 1, TIMESTAMP(CURDATE(),'21:10:00'), TIMESTAMP(CURDATE(),'19:05:00'), 'Bengaluru', 'Surat', 'IndiGo', '192', '2', 8000, '6E5034', '', NULL, '', 20, '');


-- --------------------------------------------------------

--
-- Table structure for table `passenger_profile`
--

CREATE TABLE `passenger_profile` (
  `passenger_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `mobile` varchar(110) NOT NULL,
  `dob` datetime NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `m_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger_profile`
--

INSERT INTO `passenger_profile` (`passenger_id`, `user_id`, `flight_id`, `mobile`, `dob`, `f_name`, `m_name`, `l_name`) VALUES
(1, 1, 1, '9825001122', '1990-03-15 00:00:00', 'Jay', 'Vinubhai', 'Kataria'),
(2, 2, 2, '9898003344', '1992-07-20 00:00:00', 'Kiran', 'Yogeshbhai', 'Patel'),
(3, 3, 3, '9879005566', '1988-12-01 00:00:00', 'Mayur', 'Vijaybhai', 'Antala'),
(4, 4, 4, '9723007788', '1995-01-10 00:00:00', 'Hina', 'Milanbhai', 'Desai');


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `card_no` varchar(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `expire_date` varchar(5) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`card_no`, `user_id`, `flight_id`, `expire_date`, `amount`) VALUES
('1010555677851111', 4, 2, '10/26', 370),
('1111888889897778', 2, 3, '12/25', 205),
('1400565800004478', 2, 8, '12/25', 1230),
('1458799990001450', 3, 2, '12/25', 185),
('4204558500014587', 1, 1, '02/25', 350);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwd_reset_id` int(11) NOT NULL,
  `pwd_reset_email` varchar(50) NOT NULL,
  `pwd_reset_selector` varchar(80) NOT NULL,
  `pwd_reset_token` varchar(120) NOT NULL,
  `pwd_reset_expires` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `flight_code` varchar(10) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seat_no` varchar(10) NOT NULL,
  `cost` int(11) NOT NULL,
  `class` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `passenger_id`, `flight_code`, `flight_id`, `user_id`, `seat_no`, `cost`, `class`) VALUES
(1, 1, 'AKJ152H',1, 1, '21A', 350, 'E'),
(2, 2, 'AKJ152H',3, 2, '21A', 205, 'E'),
(4, 3, 'AKJ152H',2, 3, '21A', 185, 'E'),
(6, 4, 'AKJ152H',2, 4, '21C', 370, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'christine', 'christine@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(2, 'henry', 'henry@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(3, 'andre', 'andre@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(4, 'james', 'james@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  ADD PRIMARY KEY (`passenger_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`card_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwd_reset_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `airline`
--
ALTER TABLE `airline`
  MODIFY `airline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  ADD CONSTRAINT `passenger_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `passenger_profile_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_profile` (`passenger_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(11) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`);

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Table structure for table `airline_operations`
--

CREATE TABLE `airline_operations` (
  `operation_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `baggage_revenue` int(11) NOT NULL DEFAULT 0,
  `passenger_revenue` int(11) NOT NULL DEFAULT 0,
  `flight_cost` int(11) NOT NULL DEFAULT 0,
  `food_cost` int(11) NOT NULL DEFAULT 0,
  `fuel_cost` int(11) NOT NULL DEFAULT 0,
  `cancellation_ticket_loss` int(11) NOT NULL DEFAULT 0,
  `technical_issues_cost` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `airline_operations`
--
ALTER TABLE `airline_operations`
  ADD PRIMARY KEY (`operation_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- AUTO_INCREMENT for table `airline_operations`
--
ALTER TABLE `airline_operations`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `airline_operations`
--
ALTER TABLE `airline_operations`
  ADD CONSTRAINT `airline_operations_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);

-- --------------------------------------------------------

--
-- Table structure for table `daily_flight_schedule`
--

CREATE TABLE `daily_flight_schedule` (
  `schedule_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `daily_flight_schedule`
--
ALTER TABLE `daily_flight_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- AUTO_INCREMENT for table `daily_flight_schedule`
--
ALTER TABLE `daily_flight_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `daily_flight_schedule`
--
ALTER TABLE `daily_flight_schedule`
  ADD CONSTRAINT `daily_flight_schedule_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);

-- --------------------------------------------------------

--
-- Table structure for table `skypanel`
--

CREATE TABLE `skypanel` (
  `panel_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `panel_name` varchar(50) NOT NULL,
  `panel_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `skypanel`
--
ALTER TABLE `skypanel`
  ADD PRIMARY KEY (`panel_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- AUTO_INCREMENT for table `skypanel`
--
ALTER TABLE `skypanel`
  MODIFY `panel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `skypanel`
--
ALTER TABLE `skypanel`
  ADD CONSTRAINT `skypanel_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);

-- --------------------------------------------------------

--
-- Table structure for table `manifest`
--

CREATE TABLE `manifest` (
  `manifest_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `seat_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `manifest`
--
ALTER TABLE `manifest`
  ADD PRIMARY KEY (`manifest_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- AUTO_INCREMENT for table `manifest`
--
ALTER TABLE `manifest`
  MODIFY `manifest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `manifest`
--
ALTER TABLE `manifest`
  ADD CONSTRAINT `manifest_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`),
  ADD CONSTRAINT `manifest_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_profile` (`passenger_id`);
