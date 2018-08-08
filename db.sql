-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2018 at 07:10 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dotcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activationcode` varchar(255) NOT NULL,
  `forgetpasswordcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `role_id`, `name`, `password`, `activationcode`, `forgetpasswordcode`, `email`, `active`) VALUES
(2, 1, 'admin', '611028f613c65f5dd1627c515c724e84', 'bb7d8a896f8577179d69964fc0553f7d', '1d117cfe1395a94218b9308564f70656', 'grthayalan18@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertisement_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `locationplaced` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryname`, `description`, `active`) VALUES
(20, 'action', 'action games', 1),
(21, 'adventure', 'adventure games', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `adddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `subject`, `content`, `attachment`, `adddate`) VALUES
(20, 12, 'all set', 'work completed', 'BeautyPlus_20161214115942_fast.jpg', '2017-12-31 20:54:16'),
(21, 12, 'video testing', 'testing video downloading attachment', 'test.mp4', '2017-12-31 21:00:13'),
(22, 12, 'kwgdskg', 'jhblhbil', '', '2018-01-02 19:03:07'),
(23, 12, 'kwgdskg', 'jhblhbil', '', '2018-01-02 19:03:37'),
(24, 12, 'kwgdskg', 'jhblhbil', '', '2018-01-02 19:03:41'),
(25, 12, 'kwgdskg', 'jhblhbil', '', '2018-01-02 19:03:44'),
(26, 12, 'sample', 'sss', '', '2018-07-29 14:48:58'),
(27, 12, 'sasas', 'asasas', '', '2018-07-29 22:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `gamename` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `filetype` varchar(255) DEFAULT NULL,
  `code` longtext,
  `ftppath` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `levels` int(11) NOT NULL,
  `adddate` datetime NOT NULL,
  `editdate` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `gamename`, `category_id`, `filetype`, `code`, `ftppath`, `image`, `levels`, `adddate`, `editdate`, `active`) VALUES
(35, '2048-master', 21, NULL, NULL, '../games/images/2048-master/index.html', 'battlefield_squad-3840x2160.jpg', 6, '2018-01-05 03:09:59', '2018-01-06 10:10:35', 1),
(38, 'clumsy-birds', 21, NULL, NULL, '../games/images/clumsy-bird-master/index.html', 'logo.png', 16, '2018-01-05 03:13:52', '2018-01-07 08:28:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL,
  `giftname` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pointvalue` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`gift_id`, `giftname`, `description`, `image`, `pointvalue`, `active`) VALUES
(3, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1),
(4, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1),
(5, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1),
(6, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1),
(7, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1),
(8, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1),
(9, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1),
(10, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1),
(11, 'test', 'testt', '2015_halo_5_guardians-3840x2160.jpg', 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` longtext NOT NULL,
  `imagefilepath` varchar(255) NOT NULL,
  `videofilepath` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `imagefilepath`, `videofilepath`, `active`) VALUES
(4, 'asbahjb', 'Latest news and live updates on politics, arts, entertainment, events in India, World, States and Cities from The Hindu.', 'assassins_creed_chronicles_russia-3840x2160.jpg', '', 1),
(7, 'chania', 'Chania is the capital of the Chania region on the island of Crete. The city can be divided in two parts, the old town and the modern city.   0:03 / 0:10', '', 'thayasnehicover.mp4', 1),
(8, 'machoo', 'And when you\'ve stolen the keys to the kingdom, such as cryptographic secrets, you\'ll probably find you can indeed corrupt, modify or delete data, pal. ... issues, which is why Intel and other vendors had planned to disclose this issue next wee', 'far_cry_himalayas-3840x2160.jpg', 'Kodi - Ei Suzhali Tamil Video _ Dhanush, Trisha _ Santhosh Narayanan_HD.mp4', 1),
(9, 'machoo', 'And when you\'ve stolen the keys to the kingdom, such as cryptographic secrets, you\'ll probably find you can indeed corrupt, modify or delete data, pal. ... issues, which is why Intel and other vendors had planned to disclose this issue next wee', 'far_cry_himalayas-3840x2160.jpg', 'Kodi - Ei Suzhali Tamil Video _ Dhanush, Trisha _ Santhosh Narayanan_HD.mp4', 1),
(10, 'machoo', 'And when you\'ve stolen the keys to the kingdom, such as cryptographic secrets, you\'ll probably find you can indeed corrupt, modify or delete data, pal. ... issues, which is why Intel and other vendors had planned to disclose this issue next wee', 'far_cry_himalayas-3840x2160.jpg', 'Kodi - Ei Suzhali Tamil Video _ Dhanush, Trisha _ Santhosh Narayanan_HD.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderedgift`
--

CREATE TABLE `orderedgift` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `orderdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playedgames`
--

CREATE TABLE `playedgames` (
  `playedgames_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `played time` time NOT NULL,
  `played date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `point_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `sno` int(11) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`sno`, `a`, `b`, `c`) VALUES
(1, '0', '0', '0'),
(2, '', '', ''),
(3, '', '', ''),
(4, '', '', ''),
(5, '', '', ''),
(6, 'a', 'b', 'c'),
(7, 'a', 'b', 'c'),
(8, 'a', 'b', 'c'),
(9, '111', '111', '111'),
(10, '111', '111', '111'),
(11, '111', '111', '112'),
(12, '111', '111', '114');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `activationcode` varchar(255) NOT NULL,
  `forgetpasswordcode` varchar(255) NOT NULL,
  `batchno` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `interest` varchar(255) NOT NULL,
  `exception` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `name`, `birthdate`, `gender`, `email`, `mobile`, `password`, `activationcode`, `forgetpasswordcode`, `batchno`, `upload_image`, `active`, `interest`, `exception`) VALUES
(12, 2, 'ThayalanGR', '1988-05-05', 'male', 'grthayalan18@gmail.com', '8489455901', '4297f44b13955235245b2497399d7a93', '8386c45b0f34184b30ce596a42f4da14', '6115e83e90387ab572a9c85e9ad95e41', 'thayalann', 'freelance.jpg', 1, 'webdevelopment', 'Networking');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisement_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `UK` (`user_id`) USING BTREE;

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orderedgift`
--
ALTER TABLE `orderedgift`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK` (`user_id`),
  ADD KEY `fk1` (`gift_id`);

--
-- Indexes for table `playedgames`
--
ALTER TABLE `playedgames`
  ADD PRIMARY KEY (`playedgames_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`point_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `UK_it77eq964jhfqtu54081ebtio` (`role_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderedgift`
--
ALTER TABLE `orderedgift`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playedgames`
--
ALTER TABLE `playedgames`
  MODIFY `playedgames_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `orderedgift`
--
ALTER TABLE `orderedgift`
  ADD CONSTRAINT `FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk1` FOREIGN KEY (`gift_id`) REFERENCES `gift` (`gift_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `playedgames`
--
ALTER TABLE `playedgames`
  ADD CONSTRAINT `playedgames_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `playedgames_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Constraints for table `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `point_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `point_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
