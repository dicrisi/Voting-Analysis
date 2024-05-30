-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2024 at 10:40 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voter`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `cid` int(50) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `psym` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cid`, `cname`, `pname`, `psym`) VALUES
(1, 'sk', 'penny', 'pen.jpg'),
(2, 'shan', 'lion', 'lion.jpg'),
(3, 'akash', 'Drum', 'drum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `uimg` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `aadhar` varchar(50) NOT NULL,
  `vid` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `otp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `dob`, `mobile`, `email`, `address`, `uimg`, `fname`, `mname`, `aadhar`, `vid`, `login`, `otp`) VALUES
(1, 'rindhi', '1234', '2024-02-28', '9767654342', 'rindhiyamanickam23@gmail.com', 'cbe', 'a.jpg', 'manickam', 'bharathi', '34547667687878', '12', 'yes', '241311'),
(2, 'sakshi', '1234', '2024-02-14', '9767654342', 'sakshi@gmail.com', 'cbe', 'b.jpg', 'jeyakodi', 'jeyarani', '35546576889', '11', 'no', 'no'),
(3, 'gowsi', '1234', '2024-02-20', '9047872334', 'gowsi@gmail.com', 'mduu', 'girl.jpg', 'ravi', 'maheshwari', '25366547895', '10', 'no', '968908');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `vid` int(50) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dat` varchar(50) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vid`, `cname`, `pname`, `email`, `dat`) VALUES
(2, 'sk', 'penny', 'rindhiyamanickam23@gmail.com', '2024-03-01'),
(3, 'akash', 'Drum', 'rindhiyamanickam23@gmail.com', '2024-03-01'),
(4, 'sk', 'penny', 'rindhiyamanickam23@gmail.com', '2024-03-01'),
(5, 'akash', 'Drum', 'rindhiyamanickam23@gmail.com', '2024-03-01'),
(20, 'sk', 'penny', 'rindhiyamanickam23@gmail.com', '2024-03-02');
