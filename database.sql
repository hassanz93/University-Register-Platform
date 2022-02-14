-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 09:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_Person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_Person`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `login_page`
--

CREATE TABLE `login_page` (
  `id_person` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass_word` text NOT NULL,
  `page_role` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_page`
--

INSERT INTO `login_page` (`id_person`, `username`, `pass_word`, `page_role`) VALUES
(1, 'hassanz93', 'haz', 1),
(2, 'nzein90', '12345', 0),
(3, 'ahjazi', '123', 0),
(4, 'jamoulm95', 'mirna', 0),
(6, 'ali90', '1234', 0),
(7, 'Daniellorem', '0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `FN` varchar(20) NOT NULL,
  `LN` varchar(20) NOT NULL,
  `Phone` int(11) NOT NULL,
  `City` varchar(35) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Major` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `FN`, `LN`, `Phone`, `City`, `Email`, `Major`) VALUES
(1, 'Hassan', 'Zahra', 76804396, 'Saida', 'hassanz93@hotmail.com', ''),
(2, 'Nader', 'Zein', 70899076, 'Nabatiya', 'nzein90@outlook.com', ''),
(3, 'Abbas', 'Hjazi', 81564738, 'Beirut', 'ahjazi@gmail.com', ''),
(4, 'Mirna', 'Jamoul', 70899045, 'Der Zahrani', 'jamoulm95@outlook.com', ''),
(6, 'Ali', 'Mantach', 80456789, 'Nabatiya', 'ali90@hotmail.com', ''),
(7, 'Danial', 'Lorem', 71234567, 'Byblos', 'Daniellorem@hotmail.com', 'Civil Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_person` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `subject_name` text NOT NULL,
  `year_date` int(5) NOT NULL,
  `semester_season` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_person`, `id_subject`, `full_name`, `subject_name`, `year_date`, `semester_season`) VALUES
(2, 3, 'Nader_Zein', 'Physics211', 2021, 'SummerI'),
(2, 4, 'Nader_Zein', 'English101', 2020, 'Fall'),
(2, 4, 'Nader_Zein', 'English101', 2021, 'Fall'),
(2, 5, 'Nader_Zein', 'English102', 2021, 'Spring'),
(2, 6, 'Nader_Zein', 'English210', 2021, 'SummerI'),
(3, 1, 'Abbas_Hjazi', 'Math211', 2021, 'Fall'),
(3, 2, 'Abbas_Hjazi', 'Math212', 2021, 'Spring'),
(3, 3, 'Abbas_Hjazi', 'Physics211', 2021, 'SummerI'),
(4, 2, 'Mirna_Jamoul', 'Math212', 2022, 'Spring'),
(4, 3, 'Mirna_Jamoul', 'Physics211', 2022, 'SummerI'),
(4, 8, 'Mirna_Jamoul', 'French', 2021, 'SummerII'),
(6, 4, 'Ali_Mantach', 'English101', 2022, 'Fall'),
(6, 5, 'Ali_Mantach', 'English102', 2022, 'Spring'),
(6, 11, 'Ali_Mantach', 'Robotics272', 2022, 'Fall');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id_std` int(11) NOT NULL,
  `id_subj` int(11) NOT NULL,
  `student_grade` tinyint(4) NOT NULL,
  `year_dates` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id_std`, `id_subj`, `student_grade`, `year_dates`) VALUES
(2, 5, 77, 2021),
(3, 3, 77, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id_subjects` int(11) NOT NULL,
  `subject_name` varchar(15) NOT NULL,
  `semester` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id_subjects`, `subject_name`, `semester`) VALUES
(1, 'Math211', 'Fall'),
(2, 'Math212', 'Spring'),
(3, 'Physics211', 'SummerI'),
(4, 'English101', 'Fall'),
(5, 'English102', 'Spring'),
(6, 'English210', 'SummerI'),
(7, 'Philosophy112', 'SummerII'),
(8, 'French', 'SummerII'),
(10, 'Programming', 'Fall'),
(11, 'Robotics272', 'Fall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id_Person` (`id_Person`) USING BTREE;

--
-- Indexes for table `login_page`
--
ALTER TABLE `login_page`
  ADD PRIMARY KEY (`id_person`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `FN` (`FN`,`LN`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `id_person` (`id_person`,`id_subject`,`year_date`) USING BTREE;

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD UNIQUE KEY `id_std` (`id_std`,`id_subj`,`year_dates`) USING BTREE;

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subjects`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_page`
--
ALTER TABLE `login_page`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subjects` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_Person`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_page`
--
ALTER TABLE `login_page`
  ADD CONSTRAINT `login_page_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_Person`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subjects`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`id_person`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD CONSTRAINT `student_grades_ibfk_1` FOREIGN KEY (`id_std`) REFERENCES `students` (`id_Person`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_grades_ibfk_2` FOREIGN KEY (`id_subj`) REFERENCES `subjects` (`id_subjects`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
