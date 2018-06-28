-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 12:52 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ium`
--

-- --------------------------------------------------------

--
-- Table structure for table `counterz`
--

CREATE TABLE IF NOT EXISTS `counterz` (
  `counter` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cvalue` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counterz`
--

INSERT INTO `counterz` (`counter`, `cname`, `cvalue`) VALUES
(1, 'semester', '14');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL,
  `dep` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep`) VALUES
(1, 'BUSINESS INFORMATION SYSTEMS'),
(2, 'ECONOMICS');

-- --------------------------------------------------------

--
-- Table structure for table `insmod`
--

CREATE TABLE IF NOT EXISTS `insmod` (
  `insno` varchar(20) NOT NULL,
  `modname` varchar(150) NOT NULL,
  `date_of_capture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` varchar(5) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insmod`
--

INSERT INTO `insmod` (`insno`, `modname`, `date_of_capture`, `visibility`, `id`) VALUES
('INS01', 'BIS01', '2016-08-01 09:02:14', 'V', 8),
('INS01', 'BIS02', '2016-08-01 09:02:29', 'V', 9),
('INS01', 'BIS03', '2016-08-01 09:02:37', 'V', 10),
('INS02', 'BIS04', '2016-08-01 09:54:08', 'V', 11),
('INS02', 'BIS05', '2016-08-01 09:54:20', 'V', 12),
('INS02', 'BIS06', '2016-08-01 09:54:29', 'V', 13);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE IF NOT EXISTS `instructors` (
  `id` int(11) NOT NULL,
  `insno` varchar(20) NOT NULL,
  `insname` varchar(50) NOT NULL,
  `inslname` varchar(50) NOT NULL,
  `insgender` varchar(10) NOT NULL,
  `insdob` date NOT NULL,
  `inspob` varchar(100) NOT NULL,
  `inscit` varchar(100) NOT NULL,
  `insdep` varchar(100) NOT NULL,
  `insid` varchar(20) NOT NULL,
  `insidt` varchar(50) NOT NULL,
  `insmob` varchar(12) NOT NULL,
  `insphyadd` varchar(150) NOT NULL,
  `insposadd` varchar(150) NOT NULL,
  `insnokname` varchar(150) NOT NULL,
  `insnokmob` varchar(12) NOT NULL,
  `date_of_capture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `insno`, `insname`, `inslname`, `insgender`, `insdob`, `inspob`, `inscit`, `insdep`, `insid`, `insidt`, `insmob`, `insphyadd`, `insposadd`, `insnokname`, `insnokmob`, `date_of_capture`, `visibility`) VALUES
(1, 'INS01', 'TANGENI', 'AMUPANDA', 'MALE', '1980-08-07', 'LUANDA ANGOLA', 'NAMIBIAN', 'BUSINESS INFORMATION SYSTEMS', '60606060606060', 'ID DOCUMENT', '0816060606', 'WINDHOEK WEST', 'P.O BOX 606 KATUTURA', 'JOB AMUPANDA', '0816060606', '2016-07-30 16:53:47', 'V'),
(2, 'INS02', 'MAGDALENA', 'CLOETE', 'FEMALE', '1980-02-23', '', 'NAMIBIAN', 'BUSINESS INFORMATION SYSTEMS', '234444', 'PASSPORT', '0812345677', 'eeeee', '', 'eeeeeee', '08134444', '2016-07-30 17:21:44', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE IF NOT EXISTS `lecture` (
  `id` int(11) NOT NULL,
  `date_of_lecture` date NOT NULL,
  `time_s` time NOT NULL,
  `time_e` time NOT NULL,
  `modcode` varchar(20) NOT NULL,
  `semno` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `date_of_lecture`, `time_s`, `time_e`, `modcode`, `semno`) VALUES
(15, '2016-09-01', '10:00:00', '12:00:00', 'BIS01', '1'),
(16, '2016-10-01', '10:00:00', '12:00:00', 'BIS01', '1'),
(17, '2016-10-04', '15:00:00', '18:00:00', 'BIS01', '1'),
(18, '2016-10-08', '10:00:00', '12:00:00', 'BIS01', '1'),
(19, '2016-10-15', '12:00:00', '14:00:00', 'BIS01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_attendence`
--

CREATE TABLE IF NOT EXISTS `lecture_attendence` (
  `id` int(11) NOT NULL,
  `lecture_id` varchar(20) NOT NULL,
  `stuno` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'A',
  `reason_for_absence` varchar(200) NOT NULL,
  `proof` blob NOT NULL,
  `decision` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_attendence`
--

INSERT INTO `lecture_attendence` (`id`, `lecture_id`, `stuno`, `status`, `reason_for_absence`, `proof`, `decision`) VALUES
(13, '15', 'R0436022', 'P', '', '', ''),
(14, '15', 'R0436023', 'A', '', '', 'NOT Valid'),
(15, '16', 'R0436021', 'P', '', '', ''),
(16, '16', 'R0436023', 'P', '', '', ''),
(17, '17', 'R0436021', 'P', '', '', ''),
(18, '17', 'R0436023', 'P', '', '', ''),
(19, '18', 'R0436021', 'A', '', '', ''),
(20, '18', 'R0436023', 'A', 'went to play soccer', '', 'NOT Valid'),
(21, '19', 'R0436021', 'P', '', '', ''),
(22, '19', 'R0436023', 'P', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lecturing_staff`
--

CREATE TABLE IF NOT EXISTS `lecturing_staff` (
  `counter` int(11) NOT NULL,
  `staff_no` varchar(20) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `cit` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_of_capture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_of_comm` date NOT NULL,
  `id` varchar(30) NOT NULL,
  `id_type` varchar(20) NOT NULL,
  `po_address` varchar(150) NOT NULL,
  `ph_address` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturing_staff`
--

INSERT INTO `lecturing_staff` (`counter`, `staff_no`, `firstname`, `surname`, `gender`, `dob`, `cit`, `mobile`, `tel`, `email`, `date_of_capture`, `date_of_comm`, `id`, `id_type`, `po_address`, `ph_address`) VALUES
(1, 'ium001', 'Tangeni', 'Amupadhi', 'Male', '1987-10-09', 'Namibian', '264818390950', '2646124089', 'tangsten@gmail.com', '2016-07-09 00:00:00', '2016-07-01', '871000022300', 'ID', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lecturing_users`
--

CREATE TABLE IF NOT EXISTS `lecturing_users` (
  `counter` int(11) NOT NULL,
  `staff_no` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturing_users`
--

INSERT INTO `lecturing_users` (`counter`, `staff_no`, `username`, `password`) VALUES
(1, 'INS01', 'Tangeni', 'tangsten');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL,
  `modcode` varchar(20) NOT NULL,
  `modname` varchar(150) NOT NULL,
  `moddep` varchar(150) NOT NULL,
  `modnotes` varchar(200) NOT NULL,
  `date_of_capture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `modcode`, `modname`, `moddep`, `modnotes`, `date_of_capture`, `visibility`) VALUES
(1, 'BIS01', 'INTRODUCTION TO COMPUTERS', 'BUSINESS INFORMATION SYSTEMS', 'INTRO TO COMPS - 4 DUMMIES', '2016-07-30 10:22:41', 'V'),
(2, 'BIS02', 'COMPUTER ARCHITECTURE', 'BUSINESS INFORMATION SYSTEMS', 'SO CHALLENGING THIS MODULE', '2016-07-30 10:58:41', 'V'),
(3, 'BIS03', 'DATA LOGIC AND DESIGN', 'BUSINESS INFORMATION SYSTEMS', 'COOL STUFF', '2016-07-31 16:46:48', 'V'),
(4, 'BIS04', 'SYSTEMS ANALYSIS AND DESIGN', 'BUSINESS INFORMATION SYSTEMS', 'LIKE THIS TOO', '2016-07-31 16:47:41', 'V'),
(5, 'BIS05', 'INTRODUCTION TO PROGRAMMING in C LANGUAGE', 'BUSINESS INFORMATION SYSTEMS', 'CHALLENGING STUFF', '2016-07-31 16:48:52', 'V'),
(6, 'BIS06', 'OOP PROGRAMMING in JAVA LANGUAGE', 'BUSINESS INFORMATION SYSTEMS', 'SOMEBODYS HEAD IS GOING TO CRACK', '2016-07-31 16:50:37', 'V'),
(7, 'BIS07', 'MANAGEMENT INFORMATION SYSTEMS', 'BUSINESS INFORMATION SYSTEMS', 'COOL', '2016-07-31 18:48:34', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE IF NOT EXISTS `programmes` (
  `id` int(11) NOT NULL,
  `procode` varchar(20) NOT NULL,
  `proname` varchar(150) NOT NULL,
  `profac` varchar(150) NOT NULL,
  `pronotes` varchar(200) NOT NULL,
  `date_of_capture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `procode`, `proname`, `profac`, `pronotes`, `date_of_capture`, `visibility`) VALUES
(1, 'BIS-S-01', 'Business Information Systems', 'Science and Technology', 'BIS we love it', '2016-07-30 09:01:29', 'V'),
(2, 'BM-C-01', 'Business management', 'Commerce', 'BM kak programme', '2016-07-30 09:30:13', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `promod`
--

CREATE TABLE IF NOT EXISTS `promod` (
  `id` int(11) NOT NULL,
  `proname` varchar(100) NOT NULL,
  `modname` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL,
  `date_of_capture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promod`
--

INSERT INTO `promod` (`id`, `proname`, `modname`, `level`, `date_of_capture`, `visibility`) VALUES
(13, 'BIS-S-01', 'BIS01', '1.1', '2016-08-01 00:15:53', 'V'),
(14, 'BIS-S-01', 'BIS02', '1.1', '2016-08-01 00:16:06', 'V'),
(15, 'BIS-S-01', 'BIS03', '1.1', '2016-08-01 00:16:20', 'V'),
(16, 'BIS-S-01', 'BIS04', '1.1', '2016-08-01 00:16:43', 'V'),
(17, 'BIS-S-01', 'BIS06', '1.1', '2016-08-01 00:17:03', 'V'),
(18, 'BIS-S-01', 'BIS07', '1.1', '2016-08-01 00:17:18', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `counter` int(11) NOT NULL,
  `semno` varchar(10) NOT NULL,
  `semcode` varchar(20) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `notes` varchar(200) NOT NULL,
  `oc` varchar(5) NOT NULL,
  `visibility` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`counter`, `semno`, `semcode`, `sdate`, `edate`, `notes`, `oc`, `visibility`) VALUES
(1, '1', '1', '2016-07-01', '2016-09-08', 'pretty cool like that', 'O', 'V'),
(2, '2', '2', '2016-07-06', '2016-07-05', 'aaaaaaaaaaa', 'C', 'V'),
(3, '3', '3', '2016-07-05', '2016-07-06', 'ssss', 'c', 'V'),
(4, '4', '4', '2016-07-05', '2016-07-05', 'wersdfrtg', 'c', 'V'),
(5, '5', '5', '2016-07-13', '2016-07-13', 'frf', 'c', 'V'),
(6, '6', '6', '2016-07-12', '2016-07-13', 'sderft', 'c', 'V'),
(7, '7', '7', '2016-07-21', '2016-07-21', 'ggggg', 'c', 'V'),
(8, '8', '8', '2016-07-15', '2016-07-20', 'gggg', 'c', 'V'),
(20, '9', '9', '2016-09-20', '2016-09-30', '', 'C', 'V'),
(21, '10', '10', '2016-10-20', '2016-10-30', '', 'C', 'V'),
(22, '11', '11', '2016-11-20', '2016-11-30', '', 'C', 'V'),
(23, '12', '12', '2016-12-20', '2016-12-30', 'this is some sample data', 'C', 'V'),
(24, '13', '13', '2017-01-20', '2017-01-30', 'some notes once more', 'C', 'V'),
(25, '14', '14', '2017-02-20', '2017-02-27', 'some feb semester', 'C', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `stuno` varchar(20) NOT NULL,
  `stuname` varchar(100) NOT NULL,
  `stulname` varchar(100) NOT NULL,
  `stugender` varchar(10) NOT NULL,
  `studob` date NOT NULL,
  `stupob` varchar(100) NOT NULL,
  `stucit` varchar(100) NOT NULL,
  `stupro` varchar(100) NOT NULL,
  `stuid` varchar(20) NOT NULL,
  `stuidt` varchar(20) NOT NULL,
  `stumob` varchar(12) NOT NULL,
  `stuphyadd` varchar(200) NOT NULL,
  `stuposadd` varchar(200) NOT NULL,
  `stunokname` varchar(150) NOT NULL,
  `stunokmob` varchar(12) NOT NULL,
  `date_of_capture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` varchar(5) NOT NULL,
  `level` varchar(5) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `stuno`, `stuname`, `stulname`, `stugender`, `studob`, `stupob`, `stucit`, `stupro`, `stuid`, `stuidt`, `stumob`, `stuphyadd`, `stuposadd`, `stunokname`, `stunokmob`, `date_of_capture`, `visibility`, `level`, `file`) VALUES
(1, 'R0436021', 'TAPIWA', 'CHIKADZI', 'MALE', '1985-04-29', 'KADOMA', 'ZIMBABWEAN', 'BIS-S-01', '24-150306', 'PASSPORT', '0818390950', '1435 WAVERLEY KADOMA ZIMBABWE', 'P.O BOX 24089 KADOMA ZIMBABWE', 'ABISAI CHIKADZI', '0814444444', '2016-07-30 14:28:52', 'V', '1.1', 'r0436021.jpg'),
(2, 'R0436022', 'MARIA', 'UUGWANGA', 'FEMALE', '1988-11-24', 'OSHAKATI', 'NAMIBIAN', 'BIS-S-02', '10101010101010', 'ID DOCUMENT', '0812020202', 'OKURYANGAVA WINDHOEK', '', 'JUDITH UUGWANGA', '0813030303', '2016-07-30 15:39:30', 'V', '0', ''),
(3, 'R0436023', 'BRIAN', 'NEKWAYA', 'MALE', '1996-02-13', 'WINDHOEK', 'NAMIBIAN', 'BIS-S-01', '40404040404040', 'ID DOCUMENT', '0814040404', 'ROCKY CREST', 'P.O BOX 404 AUSSPANPLAZZ', 'DADDY', '0814040404', '2016-07-30 15:53:32', 'V', '1.1', '');

-- --------------------------------------------------------

--
-- Table structure for table `stureg`
--

CREATE TABLE IF NOT EXISTS `stureg` (
  `id` int(11) NOT NULL,
  `stuno` varchar(20) NOT NULL,
  `modcode` varchar(20) NOT NULL,
  `semno` varchar(10) NOT NULL,
  `date_of_capture` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` varchar(5) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stureg`
--

INSERT INTO `stureg` (`id`, `stuno`, `modcode`, `semno`, `date_of_capture`, `visibility`, `level`) VALUES
(14, 'R0436021', 'BIS01', '1', '2016-08-01 00:22:29', 'V', '1.1'),
(15, 'R0436021', 'BIS02', '1', '2016-08-01 00:22:29', 'V', '1.1'),
(16, 'R0436021', 'BIS03', '1', '2016-08-01 00:22:29', 'V', '1.1'),
(17, 'R0436021', 'BIS04', '1', '2016-08-01 00:22:29', 'V', '1.1'),
(18, 'R0436021', 'BIS06', '1', '2016-08-01 00:22:29', 'V', '1.1'),
(19, 'R0436021', 'BIS07', '1', '2016-08-01 00:22:29', 'V', '1.1'),
(20, 'R0436023', 'BIS01', '1', '2016-08-01 00:23:52', 'V', '1.1'),
(21, 'R0436023', 'BIS02', '1', '2016-08-01 00:23:52', 'V', '1.1'),
(22, 'R0436023', 'BIS03', '1', '2016-08-01 00:23:52', 'V', '1.1'),
(23, 'R0436023', 'BIS04', '1', '2016-08-01 00:23:53', 'V', '1.1'),
(24, 'R0436023', 'BIS06', '1', '2016-08-01 00:23:53', 'V', '1.1'),
(25, 'R0436023', 'BIS07', '1', '2016-08-01 00:23:53', 'V', '1.1');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `id` int(11) NOT NULL,
  `modcode` varchar(20) NOT NULL,
  `the_day` varchar(12) NOT NULL,
  `the_time_s` time NOT NULL,
  `semno` varchar(20) NOT NULL,
  `the_time_e` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `modcode`, `the_day`, `the_time_s`, `semno`, `the_time_e`) VALUES
(1, 'BIS01', 'Monday', '08:00:00', '1', '10:00:00'),
(2, 'BIS05', 'Monday', '08:00:00', '1', '10:00:00'),
(3, 'BIS06', 'Monday', '10:00:00', '1', '12:00:00'),
(4, 'BIS01', 'Wednesday', '12:00:00', '1', '14:00:00'),
(6, 'BIS01', 'Monday', '16:00:00', '1', '18:00:00'),
(7, 'BIS01', 'Tuesday', '15:00:00', '1', '18:00:00'),
(8, 'BIS01', 'Wednesday', '08:00:00', '1', '10:00:00'),
(9, 'BIS01', 'Saturday', '10:00:00', '1', '12:00:00'),
(10, 'BIS01', 'Wednesday', '14:00:00', '1', '16:00:00'),
(11, 'BIS01', 'Wednesday', '16:00:00', '1', '18:00:00'),
(12, 'BIS01', 'Thursday', '10:00:00', '1', '12:00:00'),
(13, 'BIS01', 'Saturday', '12:00:00', '1', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE IF NOT EXISTS `users_admin` (
  `id` int(11) NOT NULL,
  `staffno` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id`, `staffno`, `password`) VALUES
(1, '001', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `users_instructors`
--

CREATE TABLE IF NOT EXISTS `users_instructors` (
  `id` int(11) NOT NULL,
  `insno` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_instructors`
--

INSERT INTO `users_instructors` (`id`, `insno`, `password`) VALUES
(1, 'INS01', '0812345677');

-- --------------------------------------------------------

--
-- Table structure for table `users_students`
--

CREATE TABLE IF NOT EXISTS `users_students` (
  `id` int(11) NOT NULL,
  `stuno` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_students`
--

INSERT INTO `users_students` (`id`, `stuno`, `password`) VALUES
(1, 'R0436023', '0814040404');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counterz`
--
ALTER TABLE `counterz`
  ADD PRIMARY KEY (`counter`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insmod`
--
ALTER TABLE `insmod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_attendence`
--
ALTER TABLE `lecture_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturing_staff`
--
ALTER TABLE `lecturing_staff`
  ADD PRIMARY KEY (`counter`);

--
-- Indexes for table `lecturing_users`
--
ALTER TABLE `lecturing_users`
  ADD PRIMARY KEY (`counter`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promod`
--
ALTER TABLE `promod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`counter`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stureg`
--
ALTER TABLE `stureg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_instructors`
--
ALTER TABLE `users_instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_students`
--
ALTER TABLE `users_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counterz`
--
ALTER TABLE `counterz`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `insmod`
--
ALTER TABLE `insmod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lecture_attendence`
--
ALTER TABLE `lecture_attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `lecturing_staff`
--
ALTER TABLE `lecturing_staff`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lecturing_users`
--
ALTER TABLE `lecturing_users`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `promod`
--
ALTER TABLE `promod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stureg`
--
ALTER TABLE `stureg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_instructors`
--
ALTER TABLE `users_instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_students`
--
ALTER TABLE `users_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
