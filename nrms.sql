-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2015 at 11:43 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `ID` int(3) unsigned zerofill NOT NULL,
  `send_to` varchar(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  `detail` text NOT NULL,
  `from` varchar(30) NOT NULL,
  `send_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_status` enum('read','unread') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `send_to`, `title`, `detail`, `from`, `send_time`, `read_status`) VALUES
(001, 'Champ', 'เพชรจากต่างดาว', 'เรียนท่านเทพแชมป์ยังงี้ว่า ที่ท่านได้ทำการมอบเพชร20กะรัตให้พวกเราฟรีๆนั้น พวกเราซาบซึ้งใจเป็นอย่างมาก พวกเราจึงอยากมาระบายอารมณ์ว่า "เพชรที่ท่านมอบให้มานั้น เมื่อพวกเรานำไปตรวจสอบ ก็พบว่าเป็นเพชรที่มาจากดาวไซเบอร์ตรอน ซึ่งมีมูลค่ามากมายมหาศาลเกินกว่าจะจินตนาการได้" จึงนึกเกิดความเกรงใจ อยากนำเพชรเม็ดนี้กลับไปคืนท่าน แต่เราก็ยังอยากได้เหมือนกัน ก็เลยขอละกันนะ เท่านี้แหละ แอะๆ', 'Brown', '2015-07-14 10:44:25', 'unread'),
(002, 'White', 'LP City', 'เนื่องด้วยเมือง LP เป็นเมืองที่มีจำนวนของแซ้บสูงติดอันดับต้นๆของประเทศ จึงขอความร่วมมือทุกฝ่ายช่วยกันจับแซ้บเหล่านี้มาปรับทัศนคติโดยด่วน', 'Champ', '2015-07-14 10:44:25', 'unread'),
(003, 'Champ', 'How to speak English', 'Arigatougosaimasu', 'John', '2015-07-14 19:20:00', 'unread'),
(004, 'Champ', 'อยากยืมตังค์ซัก 200', 'hello hello hello hello hello', 'Brown', '2015-07-14 20:53:51', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `ID` int(3) unsigned zerofill NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ID`, `username`, `password`, `name`, `detail`) VALUES
(001, 'user1', '1234', 'Champ', 'Scientist from Pluto Planet.'),
(002, 'user2', '1234', 'John', 'Hunter from Austin.'),
(003, 'user3', '1234', 'Brown', 'A color'),
(004, 'user4', '1234', 'White', 'I am Sparta hahahahahahaha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `ID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
