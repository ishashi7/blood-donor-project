-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2018 at 12:21 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('blooddonor@gmail.com', 'varun123456');

-- --------------------------------------------------------

--
-- Table structure for table `bd_camps`
--

CREATE TABLE IF NOT EXISTS `bd_camps` (
  `id` int(11) NOT NULL,
  `campid` int(255) NOT NULL,
  `orgname` varchar(255) NOT NULL,
  `bbname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doc` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `caddress` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bd_camps`
--

INSERT INTO `bd_camps` (`id`, `campid`, `orgname`, `bbname`, `phone`, `email`, `doc`, `place`, `caddress`) VALUES
(1, 7830, 'Nss Atri', 'Sanjeevani Blood Bank', '04066272727', 'atrinss@gmail.com', '2018-07-11', 'HYDERABAD', 'ATRI Campus, Parvathapur, Uppal, Hyderabad-98'),
(2, 7142, 'NSS ASTRA', 'Chiranjeevi Blood Bank', '04046464644', 'nssastra@gmail.com', '2018-07-28', 'MEDCHAL-MALKAJIGIRI', 'ASTRA Campus, Bandlaguda, Hyderabad-88'),
(3, 1127, 'Aurora', 'Lions Club of Hyderabad', '9876543210', 'lch123@gmail.com', '2018-07-21', 'MEDAK', 'Aurora Campus, Medak Highway'),
(5, 2632, 'Gaytri college', 'Sri Ram Blood Bank', '7893762276', 'srirambb@gmail.com', '2018-07-30', 'HYDERABAD', 'Sri Gayatri Jr College, Habsiguda-70');

-- --------------------------------------------------------

--
-- Table structure for table `c_inbox`
--

CREATE TABLE IF NOT EXISTS `c_inbox` (
  `id` int(11) NOT NULL,
  `contactid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_inbox`
--

INSERT INTO `c_inbox` (`id`, `contactid`, `name`, `phone`, `email`, `message`) VALUES
(2, 9883, 'sriram', '8096913303', 'sriram@gmail.com', 'Hey..!! I want to donate my blood immediately. do you have any need.'),
(3, 5611, 'varun', '9700457489', 'varun123@gmail.com', 'Hey..!! I want to donate my blood immediately. do you have any need.'),
(4, 3313, 'saiteja', '8523032083', 'saitejadippy@gmail.com', 'Hey..!! I want to donate my blood. do you have  need.'),
(5, 4343, 'nandish', '9876543210', 'nandudon@gmail.com', 'Hey..!! iam nandu second bazar don. I want to donate my blood immediately.');

-- --------------------------------------------------------

--
-- Table structure for table `emg_req`
--

CREATE TABLE IF NOT EXISTS `emg_req` (
  `id` int(11) NOT NULL,
  `request_id` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `bgroup` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dor` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `hname` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emg_req`
--

INSERT INTO `emg_req` (`id`, `request_id`, `pname`, `bgroup`, `phone`, `dor`, `location`, `hname`) VALUES
(2, 2041, 'varun', 'AB+', '9700457489', '2018-07-31', 'MEDCHAL', 'Supraja Hospital, Nagole X Roads, Hyderabad-91.'),
(3, 4043, 'saitej', 'A+', '8523032083', '2018-08-15', 'SECUNDERABAD', 'Sun Shine Hospital, Paradise, Secunderabad-66.'),
(4, 7147, 'sriram', 'Bombay Blood Group', '8096913303', '2018-09-08', 'ECIL', 'Polumi Hospitals, As Rao Nagar, Hyderabad-78.');

-- --------------------------------------------------------

--
-- Table structure for table `post_need`
--

CREATE TABLE IF NOT EXISTS `post_need` (
  `id` int(11) NOT NULL,
  `postid` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `bgroup` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `dnob` date NOT NULL,
  `hname` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_need`
--

INSERT INTO `post_need` (`id`, `postid`, `pname`, `bgroup`, `phone`, `place`, `dnob`, `hname`) VALUES
(1, 6835, 'varun', 'O+', '9700457489', 'HYDERABAD', '2018-07-26', 'Sun Shine Hospital, Paradise, Secunderabad-66.'),
(2, 9388, 'Saiteja', 'B-', '8523032083', 'HYDERABAD', '2018-07-28', 'Supraja Hospital, Nagole X Roads, Hyderabad-91.'),
(3, 9587, 'Sriram', 'Bombay Blood Group', '8096913303', 'MEDCHAL-MALKAJIGIRI', '2018-07-31', 'Polumi Hospitals, As Rao Nagar, Hyderabad-78.');

-- --------------------------------------------------------

--
-- Table structure for table `reg_don`
--

CREATE TABLE IF NOT EXISTS `reg_don` (
  `id` int(11) NOT NULL,
  `regid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bgroup` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_don`
--

INSERT INTO `reg_don` (`id`, `regid`, `name`, `bgroup`, `phone`, `email`, `gender`, `dob`, `status`, `place`, `address`) VALUES
(1, 1411, 'varuntest', 'A1-', '9502630805', 'varun123@gmail.com', 'male', '2018-07-09', 'Availabe', 'HYDERABAD', 'H.No. 5-16/132/A/1, Gandhi Nagar Indra Park Lane, Hyderabad-99.'),
(2, 7649, 'saiteja', 'B-', '8523032083', 'saitejadippy@gmail.com', 'male', '2018-07-16', 'Availabe', 'MEDCHAL-MALKAJIGIRI', 'H.No. 1-16/A/2, Bhag Amberpet Main Road, Hyderabad-86'),
(5, 1396, 'shashi', 'O+', '8686864770', 'shashi30@ymail.com', 'male', '1997-01-27', 'Un Availabe', 'MEDCHAL-MALKAJIGIRI', 'H.No.3-1-16/137/36/1,Nagalaxmi Nagar, Mallapur-76.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bd_camps`
--
ALTER TABLE `bd_camps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_inbox`
--
ALTER TABLE `c_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emg_req`
--
ALTER TABLE `emg_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_need`
--
ALTER TABLE `post_need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_don`
--
ALTER TABLE `reg_don`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bd_camps`
--
ALTER TABLE `bd_camps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `c_inbox`
--
ALTER TABLE `c_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `emg_req`
--
ALTER TABLE `emg_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post_need`
--
ALTER TABLE `post_need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reg_don`
--
ALTER TABLE `reg_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
