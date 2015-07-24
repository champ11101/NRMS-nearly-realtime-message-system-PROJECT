-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2015 at 11:09 AM
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
  `sender` varchar(30) NOT NULL,
  `send_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `acceptor` varchar(30) NOT NULL,
  `accept_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `send_to`, `title`, `detail`, `sender`, `send_time`, `read_status`, `acceptor`, `accept_time`) VALUES
(001, 'Champ', 'เพชรจากต่างดาว', 'เรียนท่านเทพแชมป์ยังงี้ว่า ที่ท่านได้ทำการมอบเพชร20กะรัตให้พวกเราฟรีๆนั้น พวกเราซาบซึ้งใจเป็นอย่างมาก พวกเราจึงอยากมาระบายอารมณ์ว่า "เพชรที่ท่านมอบให้มานั้น เมื่อพวกเรานำไปตรวจสอบ ก็พบว่าเป็นเพชรที่มาจากดาวไซเบอร์ตรอน ซึ่งมีมูลค่ามากมายมหาศาลเกินกว่าจะจินตนาการได้" จึงนึกเกิดความเกรงใจ อยากนำเพชรเม็ดนี้กลับไปคืนท่าน แต่เราก็ยังอยากได้เหมือนกัน ก็เลยขอละกันนะ เท่านี้แหละ', 'Brown', '2015-07-17 11:07:10', 'read', 'Champ', '2015-07-24 15:19:16'),
(002, 'White', 'LP City', 'เนื่องด้วยเมือง LP เป็นเมืองที่มีจำนวนของแซ้บสูงติดอันดับต้นๆของประเทศ จึงขอความร่วมมือทุกฝ่ายช่วยกันจับแซ้บเหล่านี้มาปรับทัศนคติโดยด่วน', 'Champ', '2015-07-14 10:44:25', 'unread', '', '0000-00-00 00:00:00'),
(003, 'Champ', 'How to speak English', 'Arigatougosaimasu', 'John', '2015-07-14 19:20:00', 'unread', '', '0000-00-00 00:00:00'),
(004, 'Champ', 'อยากยืมตังค์ซัก 200', 'พอจะมีเงินให้ยืมซัก 200 มั้ย.ย...ย', 'Brown', '2015-07-14 20:53:51', 'read', 'Champ', '2015-07-24 15:21:34'),
(005, 'Champ', 'test accept time', 'test test test test test test', 'White', '2015-07-17 11:15:31', 'read', 'Champ', '2015-07-20 09:26:30'),
(006, 'Champ', 'Owarese Night', 'Owarase Night is a japanese song.', 'John', '2015-07-17 11:17:53', 'read', 'Champ', '2015-07-24 11:25:51'),
(007, 'White', 'testtest1234', 'testeset1234 message.....', 'Champ', '2015-07-20 16:14:19', 'read', 'White', '2015-07-20 16:15:59'),
(008, 'John', 'Hello John', 'Good afternoon John.', 'Champ', '2015-07-20 16:17:43', 'read', 'John', '2015-07-24 15:26:11');

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
  MODIFY `ID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `ID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
