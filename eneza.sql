-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 03:12 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `msmservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(4, 'realfuad123', 'realfuad123@gmail.com', '0303cab5986706ad0cad22fe9f8e529e76e3fe7e');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) unsigned NOT NULL,
  `content_title` varchar(30) NOT NULL,
  `content_desc` varchar(300) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `posted` varchar(15) NOT NULL,
  PRIMARY KEY (`id`,`cat_id`) USING BTREE,
  KEY `FK_userad_1` (`cat_id`),
  FULLTEXT KEY `ad_title` (`content_title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=19 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `cat_id`, `content_title`, `content_desc`, `u_name`, `posted`) VALUES
(1, 3, 'new tutorial', 'details of the tutorials here', 'itbay', '1486117348'),
(7, 1, 'next tutorial', 'details of the tutorials here', 'itbay', '1543241694'),
(8, 1, 'next course', 'details of the tutorials here', 'itbay', '1486121679');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=18 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_title`) VALUES
(1, 'Primary'),
(2, 'Secondary'),
(3, 'Tertiary'),
(4, 'Advanced');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_posted` varchar(15) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `post_id`, `student_id`, `content`, `date_posted`) VALUES
(1, 1, 8, 'is your name fuad', '1543012584'),
(2, 7, 8, 'this is another question to be used as quize', '1543012584'),
(3, 7, 0, 'dffxdfghfbx', '1543251494'),
(4, 7, 0, 'my name', '1543275243');

-- --------------------------------------------------------

--
-- Table structure for table `quize`
--

CREATE TABLE IF NOT EXISTS `quize` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) unsigned NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans1` varchar(225) NOT NULL,
  `ans2` varchar(225) NOT NULL,
  `ans3` varchar(255) NOT NULL,
  `ans4` varchar(225) NOT NULL,
  `posted` varchar(15) NOT NULL,
  `u_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`,`cat_id`,`u_name`) USING BTREE,
  KEY `FK_userad_1` (`cat_id`),
  FULLTEXT KEY `ad_title` (`question`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--
-- Dumping data for table `quize`
--

INSERT INTO `quize` (`id`, `cat_id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `posted`, `u_name`) VALUES
(7, 1, 'what is noun', 'a', 'b', 'c', 'd', '2018', 'abu'),
(8, 1, 'is your name fuad plus', 'yes', 'b', 'may be', 'd', '1543244867', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `signup` datetime NOT NULL,
  `activation` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_id` int(10) unsigned NOT NULL,
  `sub_title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`sub_id`),
  KEY `FK_sub_heading_1` (`sub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=710 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_id`, `sub_title`) VALUES
(1, 1, 'English'),
(2, 1, 'Mathematics'),
(3, 1, 'Science');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
