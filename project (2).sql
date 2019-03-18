-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 04:18 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pwd`, `id`) VALUES
('admin', 'naresh6101999', 4);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `depname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`, `depname`) VALUES
(1, 'A', 'Humanity'),
(2, 'B', 'Humanity'),
(3, 'C', 'Humanity'),
(4, 'D', 'Humanity'),
(5, 'A', 'Computer'),
(6, 'B', 'Computer'),
(7, 'A', 'IT'),
(8, 'A', 'Civil'),
(9, 'B', 'Civil'),
(10, 'A', 'ETRX'),
(11, 'A', 'EXTC');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_reg`
--

CREATE TABLE `faculty_reg` (
  `id` int(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_reg`
--

INSERT INTO `faculty_reg` (`id`, `fname`, `designation`, `mobileno`, `email`, `pwd`) VALUES
(1, 'Kanchan dabre', 'professor', '9856472513', 'kanchandabre@gmail.com', 'kanchan'),
(2, 'John kenny', 'professor', '9856472513', 'johnkenny@gmail.com', 'john'),
(3, 'Sridhar Iyer', 'professor', '9856472513', 'sridhariyer@gmail.com', 'sridhar'),
(4, 'chinmay raut', 'professor', '9856472513', 'chinmayraut@gmail.com', 'chinmay'),
(5, 'Snehal modi', 'professor', '9856472513', 'snehalmodi@gmail.com', 'snehal'),
(6, 'Ankita kadu', 'professor', '9856472513', 'ankitakadu@gmail.com', 'ankita'),
(7, 'Shilpa jaiswal', 'professor', '9856472513', 'shilpajaiswal@gmail.com', 'shilpa'),
(8, 'Teena trivedi', 'professor', '9856472513', 'teenatrivedi@gmail.com', 'teena'),
(9, 'Shivam shukla', 'professor', '9856472513', 'shivamshukla@gmail.com', 'shivam'),
(10, 'Rajesh giri', 'professor', '9856472513', 'rajeshgiri@gmail.com', 'rajesh'),
(11, 'Sushant gaikwad', 'professor', '9856472513', 'sushantgaikwad@gmail.com', 'sushant'),
(12, 'Pranit gaikwad', 'professor', '9856472513', 'pranitgaikwad@gmail.com', 'pranit'),
(13, 'Hezal lopes', 'professor', '9856472513', 'hezallopes@gmail.com', 'hezal'),
(14, 'Allan lopes', 'professor', '9856472513', 'allanlopes@gmail.com', 'allan'),
(15, 'Vishakha shelke', 'professor', '9856472513', 'vishakhashelke@gmail.com', 'vishakha');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `percent`
--

CREATE TABLE `percent` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `Q1` varchar(10) NOT NULL,
  `Q2` varchar(10) NOT NULL,
  `Q3` varchar(10) NOT NULL,
  `Q4` varchar(10) NOT NULL,
  `Q5` varchar(10) NOT NULL,
  `Q6` varchar(10) NOT NULL,
  `Q7` varchar(10) NOT NULL,
  `Q8` varchar(10) NOT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `depname` varchar(50) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `division` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `faculty_id`, `depname`, `sem`, `subject_name`, `division`) VALUES
(1, 4, 'Computer', 'V', 'CSS', 'B'),
(2, 15, 'Computer', 'V', 'ML', 'B'),
(3, 6, 'Computer', 'V', 'DWM', 'B'),
(4, 13, 'Computer', 'V', 'SPCC', 'B'),
(5, 5, 'Computer', 'V', 'SE', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `s_reg`
--

CREATE TABLE `s_reg` (
  `id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `depname` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `division` varchar(10) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rollno` int(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_reg`
--

INSERT INTO `s_reg` (`id`, `fname`, `depname`, `year`, `semester`, `division`, `mobileno`, `email`, `rollno`, `pwd`, `gender`) VALUES
(20, 'Aarti thakur', 'Computer', 'third year', 'V', 'B', '9874563210', 'aartithakur@gmail.com', 5, 'aarti', 'female'),
(24, 'Isha wala', 'Computer', 'third year', 'V', 'B', '9874563210', 'ishawala@gmail.com', 5, 'isha', 'female'),
(21, 'Jay trivedi', 'Computer', 'third year', 'V', 'B', '9874563210', 'jaytrivedi@gmail.com', 5, 'jay', 'male'),
(22, 'Jay vyas', 'Computer', 'third year', 'V', 'B', '9874563210', 'jayvyas@gmail.com', 5, 'jay', 'male'),
(19, 'Naresh yenagandula', 'Computer', 'third year', 'V', 'B', '9874563210', 'nareshyenagandula@gmail.com', 5, 'naresh', 'male'),
(26, 'Nishnat vekariya', 'Computer', 'third year', 'V', 'B', '9874563210', 'nishnatvekariya@gmail.com', 5, 'nishnat', 'male'),
(25, 'Shivani singh', 'Computer', 'third year', 'V', 'B', '9874563210', 'shivanisingh@gmail.com', 5, 'shivani', 'female'),
(23, 'shruti suvarna', 'Computer', 'third year', 'V', 'B', '9874563210', 'shrutisuvarna@gmail.com', 5, 'shruti', 'female'),
(27, 'Sneha sanap', 'Computer', 'third year', 'V', 'B', '9874563210', 'snehasanap@gmail.com', 5, 'sneha', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_reg`
--
ALTER TABLE `faculty_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_ibfk_1` (`student_id`),
  ADD KEY `feedback_ibfk_2` (`faculty_id`);

--
-- Indexes for table `percent`
--
ALTER TABLE `percent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `percent_ibfk_1` (`faculty_id`),
  ADD KEY `percent_ibfk_2` (`subject_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_ibfk_1` (`faculty_id`);

--
-- Indexes for table `s_reg`
--
ALTER TABLE `s_reg`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculty_reg`
--
ALTER TABLE `faculty_reg`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `percent`
--
ALTER TABLE `percent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `s_reg`
--
ALTER TABLE `s_reg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `s_reg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_reg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `percent`
--
ALTER TABLE `percent`
  ADD CONSTRAINT `percent_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_reg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `percent_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_reg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
