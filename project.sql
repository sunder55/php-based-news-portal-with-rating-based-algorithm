-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 06:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `aid` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`, `description`, `slug`) VALUES
(2, 'sports ', 'It show sports related news', 'sports'),
(4, 'Economics', 'It shows news related to the economics', 'eco'),
(7, 'Weather', 'It show weather related news', 'weather'),
(16, 'Health', 'Health is Wealth', 'health');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `nid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `comm` varchar(200) DEFAULT NULL,
  `status` varchar(23) NOT NULL DEFAULT 'unconfirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `nid`, `name`, `comm`, `status`) VALUES
(53, 20, 'check12@gmail.com', 'good to see that', 'approved'),
(56, 29, 'hari@gmail.com', 'take care', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `nid` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nid`, `category`, `title`, `slug`, `description`, `image`, `date`) VALUES
(13, 2, 'kathmandu', 'kath', 'kathmandu gets into the final', '1656355203.jpg', '2022-06-28 00:25:03'),
(17, 4, 'rainy season', 'rain', 'Rainy season started in nepal', '1656442383.jpg', '2022-06-29 00:38:03'),
(18, 2, '24 teams in 2024 worldcup', 'world', ' Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n Libero omnis repellendus velit facere fuga consectetur quae molestias, tempore ab cumque, delectus voluptates aliquam!\r\n Nihil esse eveniet labore vero, debitis placeat!', '1656442453.jpg', '2022-06-29 00:39:13'),
(20, 7, 'weather of kathmandu is rainy having 70f cloudy', 'wea', '\"Rainy season\" redirects here. For the film, see Wet Season (film). For other uses, see Rainy Season (disambiguation).\r\nPart of a series on\r\nWeather\r\nGlobal tropical cyclone tracks-edit2.jpg\r\nTemperate and polar seasons\r\nTropical seasons\r\nStorms\r\nPrecipitation\r\nTopics\r\nGlossaries\r\nicon Weather portal\r\nvte\r\n\r\nThe rainfall distribution by month in Cairns, Australia.\r\nThe wet season (sometimes called the rainy season) is the time of year when most of a regions average annual rainfall occurs. Generally, the season lasts at least a month.[1] The term green season is also sometimes used as a euphemism by tourist authorities.[2] Areas with wet seasons are dispersed across portions of the tropics and subtropics.[3]\r\n\r\nUnder the Köppen climate classification, for tropical climates, a wet season month is defined as a month where average precipitation is 60 millimetres (2.4 in) or more.[4] In contrast to areas with savanna climates and monsoon regimes, Mediterranean climates have wet winters and dry summers. Dry and rainy months are characteristic of tropical seasonal forests: in contrast to tropical rainforests, which do not have dry or wet seasons, since their rainfall is equally distributed throughout the year.[5] Some areas with pronounced rainy seasons will see a break in rainfall mid-season, when the intertropical convergence zone or monsoon trough moves to higher latitudes in the middle of the warm season.[6]', '1656446048.jpg', '2022-06-29 01:39:08'),
(22, 4, 'hello it nice news', 'share', 'share market increasing in nepal', '1659342422.jpg', '2022-08-01 14:12:02'),
(25, 2, 'kathmandu', 'kaths', 'sdfsfd', '1659783085.jpg', '2022-08-06 16:36:25'),
(29, 16, 'Corona virus is spreading', 'Covid-19', 'CORONA virus cases are increasing.', '1660976006.jfif', '2022-08-20 11:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `counts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rid`, `nid`, `uid`, `counts`) VALUES
(5, 17, 'sunder@gmail.com', 4),
(6, 17, 'user@gmail.com', 4),
(8, 20, 'user@gmail.com', 5),
(9, 17, 'check@gmail.com', 1),
(10, 18, 'check@gmail.com', 3),
(11, 13, 'check@gmail.com', 4),
(13, 17, 'test@gmail.com', 5),
(15, 20, 'check12@gmail.com', 5),
(16, 29, 'harry@gmail.com', 5),
(20, 29, 'sunder@gmail.com', 2),
(21, 22, 'tony@gmail.com', 4),
(23, 29, 'hari@gmail.com', 5),
(24, 20, 'hari@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emails` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `emails`, `password`, `confirm`) VALUES
(4, 'test', 'test@gmail.com', 'test22', 'test22'),
(5, 'check', 'check@gmail.com', 'check', 'check'),
(6, 'test', 'test@gmail.cccc', 'test2', 'test2'),
(8, 'sunder', 'sunder@gmail.com', 'sunder', 'sunder'),
(9, 'newuser', 'new@gmail.com', 'new', 'new'),
(10, 'check check', 'check12@gmail.com', 'check12', 'check12'),
(11, 'Harry', 'harry@gmail.com', 'harry', 'harry'),
(12, 'lol', 'lol@gmail.com', 'lol', 'lol'),
(13, 'tony strack', 'tony@gmail.com', 'tony', 'tony'),
(14, 'hari', 'hari@gmail.com', 'hari', 'hari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nid` (`nid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nid`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `nid` (`nid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `emails` (`emails`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `news` (`nid`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `news` (`nid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
