-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2017 at 06:51 PM
-- Server version: 10.1.23-MariaDB-8
-- PHP Version: 5.6.7-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footb`
--

-- --------------------------------------------------------

--
-- Table structure for table `champs`
--

CREATE TABLE `champs` (
  `champ_id` int(255) NOT NULL,
  `champ_name` varchar(255) NOT NULL,
  `champ_loc` varchar(255) NOT NULL,
  `champ_logo` varchar(255) NOT NULL,
  `champ_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `chan_id` int(255) NOT NULL,
  `chan_name` varchar(255) NOT NULL,
  `chan_logo` varchar(255) NOT NULL,
  `chan_lang` varchar(10) NOT NULL DEFAULT 'ar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `cl_id` int(255) NOT NULL,
  `cl_name` varchar(255) NOT NULL,
  `cl_country` varchar(255) NOT NULL,
  `cl_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commentor`
--

CREATE TABLE `commentor` (
  `comm_id` int(255) NOT NULL,
  `comm_name` varchar(255) NOT NULL,
  `comm_country` varchar(255) NOT NULL,
  `comm_chan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `mat_id` int(255) NOT NULL,
  `mat_team1` varchar(255) NOT NULL,
  `mat_team2` varchar(255) NOT NULL,
  `mat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mat_chan` int(255) NOT NULL,
  `mat_comm` int(255) NOT NULL,
  `mat_champ` int(255) NOT NULL,
  `mat_address` varchar(255) NOT NULL,
  `mat_note` varchar(255) NOT NULL,
  `mat_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `mat_lang` varchar(255) NOT NULL DEFAULT 'ar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nft`
--

CREATE TABLE `nft` (
  `nft_id` int(255) NOT NULL,
  `nft_name` varchar(255) NOT NULL,
  `nft_logo` varchar(255) NOT NULL,
  `nft_num` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `pl_id` int(255) NOT NULL,
  `pl_name` varchar(255) NOT NULL,
  `pl_nat` varchar(255) NOT NULL,
  `pl_leng` int(255) NOT NULL,
  `pl_chanum` int(255) NOT NULL,
  `pl_goals` int(255) NOT NULL,
  `pl_curclub` int(255) NOT NULL,
  `pl_lastedit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `mov_id` int(255) NOT NULL,
  `mov_pl` varchar(255) NOT NULL,
  `mov_club` int(255) NOT NULL,
  `mov_sal` int(255) NOT NULL,
  `mov_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `url_id` int(255) NOT NULL,
  `url_href` varchar(255) NOT NULL,
  `url_channel` int(255) NOT NULL,
  `url_game` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(255) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_pass`) VALUES
(1, 'admin', 'admin@email', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `champs`
--
ALTER TABLE `champs`
  ADD PRIMARY KEY (`champ_id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`chan_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `commentor`
--
ALTER TABLE `commentor`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `comm_chan` (`comm_chan`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `mat_chan` (`mat_chan`),
  ADD KEY `mat_comm` (`mat_comm`),
  ADD KEY `mat_champ` (`mat_champ`);

--
-- Indexes for table `nft`
--
ALTER TABLE `nft`
  ADD PRIMARY KEY (`nft_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`pl_id`),
  ADD KEY `pl_curclub` (`pl_curclub`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`mov_id`),
  ADD KEY `mov_club` (`mov_club`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`url_id`),
  ADD KEY `url_channel` (`url_channel`),
  ADD KEY `url_game` (`url_game`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `champs`
--
ALTER TABLE `champs`
  MODIFY `champ_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `chan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `cl_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commentor`
--
ALTER TABLE `commentor`
  MODIFY `comm_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `mat_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nft`
--
ALTER TABLE `nft`
  MODIFY `nft_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `pl_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `mov_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `url_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentor`
--
ALTER TABLE `commentor`
  ADD CONSTRAINT `commentor_ibfk_1` FOREIGN KEY (`comm_chan`) REFERENCES `channels` (`chan_id`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`mat_chan`) REFERENCES `channels` (`chan_id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`mat_comm`) REFERENCES `commentor` (`comm_id`),
  ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`mat_champ`) REFERENCES `champs` (`champ_id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`pl_curclub`) REFERENCES `clubs` (`cl_id`);

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`mov_club`) REFERENCES `clubs` (`cl_id`);

--
-- Constraints for table `urls`
--
ALTER TABLE `urls`
  ADD CONSTRAINT `urls_ibfk_1` FOREIGN KEY (`url_channel`) REFERENCES `channels` (`chan_id`),
  ADD CONSTRAINT `urls_ibfk_2` FOREIGN KEY (`url_game`) REFERENCES `matches` (`mat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
