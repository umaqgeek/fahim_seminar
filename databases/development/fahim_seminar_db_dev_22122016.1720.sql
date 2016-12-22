-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2016 at 10:20 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fahim_seminar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('355b33f553def47723d2fadb69142386', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1480663802, ''),
('421f6ebb554c1daac68e011fe3907497', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1482398390, ''),
('689cf0a04a21a9fabca3ebc2e35fc3ac', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1479543448, ''),
('78985bf389400f32813993e978997342', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1480676208, 'a:7:{s:4:"u_id";s:1:"1";s:10:"u_fullname";s:9:"God Admin";s:10:"u_username";s:5:"admin";s:7:"u_email";s:18:"umaqgeek@gmail.com";s:5:"ut_id";s:1:"1";s:8:"u_status";s:1:"1";s:9:"logged_in";b:1;}'),
('914d0ebdd512a2f6041588613ded2b34', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1482380070, ''),
('9b967a48c69f59035d4edce326f137cd', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1480670990, ''),
('be0c26fb85b616817e79c22817ba81c9', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1480672870, ''),
('d74019462566bfd01e3dfeac13a4ed0e', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1482397510, ''),
('eba9f6e4afc69011f1f627ecfb7ecf49', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1482397799, ''),
('f82fc5bae3eb4a3416903a0e0b8b674d', '0.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) Ap', 1480083435, '');

-- --------------------------------------------------------

--
-- Table structure for table `negeri`
--

CREATE TABLE IF NOT EXISTS `negeri` (
  `n_id` int(11) NOT NULL,
  `n_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negeri`
--

INSERT INTO `negeri` (`n_id`, `n_desc`) VALUES
(1, 'JOHOR'),
(2, 'MELAKA'),
(3, 'NEGERI SEMBILAN'),
(4, 'SELANGOR'),
(5, 'KEDAH'),
(6, 'PERLIS'),
(7, 'PULAU PINANG'),
(8, 'PERAK'),
(9, 'KELANTAN'),
(10, 'TERENGGANU'),
(11, 'PAHANG'),
(12, 'SABAH'),
(13, 'SARAWAK'),
(14, 'LABUAN'),
(15, 'WILAYAH PERSEKUTUAN'),
(16, 'PUTRAJAYA'),
(17, 'KUALA LUMPUR');

-- --------------------------------------------------------

--
-- Table structure for table `post_page`
--

CREATE TABLE IF NOT EXISTS `post_page` (
  `pp_id` int(11) NOT NULL,
  `pp_title` varchar(200) NOT NULL,
  `pp_post` text NOT NULL,
  `pp_image1` varchar(200) DEFAULT NULL,
  `pp_image2` varchar(200) DEFAULT NULL,
  `pp_image3` varchar(200) DEFAULT NULL,
  `pp_image4` varchar(200) DEFAULT NULL,
  `pp_image5` varchar(200) DEFAULT NULL,
  `pp_datetime` datetime DEFAULT NULL,
  `pp_priority` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_registration`
--

CREATE TABLE IF NOT EXISTS `seminar_registration` (
  `sr_id` int(11) NOT NULL,
  `sr_name` varchar(200) NOT NULL,
  `sr_icno` varchar(200) NOT NULL,
  `sr_email` varchar(200) NOT NULL,
  `sr_phone` varchar(200) NOT NULL,
  `sr_address` text NOT NULL,
  `sr_poskod` varchar(200) NOT NULL,
  `n_id` int(11) NOT NULL,
  `sr_resit` varchar(500) NOT NULL,
  `sr_datetime` datetime NOT NULL,
  `srs_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sr_status`
--

CREATE TABLE IF NOT EXISTS `sr_status` (
  `srs_id` int(11) NOT NULL,
  `srs_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_status`
--

INSERT INTO `sr_status` (`srs_id`, `srs_desc`) VALUES
(1, 'Pending'),
(2, 'Confirmed'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL,
  `u_fullname` varchar(200) NOT NULL,
  `u_username` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `ut_id` int(11) NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fullname`, `u_username`, `u_password`, `u_email`, `ut_id`, `u_status`) VALUES
(1, 'God Admin', 'admin', 'admin', 'nine40trainer89@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE IF NOT EXISTS `users_type` (
  `ut_id` int(11) NOT NULL,
  `ut_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`ut_id`, `ut_desc`) VALUES
(1, 'Administrator'),
(2, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `negeri`
--
ALTER TABLE `negeri`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `post_page`
--
ALTER TABLE `post_page`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `seminar_registration`
--
ALTER TABLE `seminar_registration`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `sr_status`
--
ALTER TABLE `sr_status`
  ADD PRIMARY KEY (`srs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_username` (`u_username`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`ut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `negeri`
--
ALTER TABLE `negeri`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `post_page`
--
ALTER TABLE `post_page`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seminar_registration`
--
ALTER TABLE `seminar_registration`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sr_status`
--
ALTER TABLE `sr_status`
  MODIFY `srs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
