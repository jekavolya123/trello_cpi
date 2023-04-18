-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 05:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_teamx`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_board`
--

CREATE TABLE `tbl_board` (
  `bid` int(11) NOT NULL,
  `fk_tbl_u` int(11) NOT NULL,
  `board_title` varchar(220) NOT NULL,
  `board_desc` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_board`
--

INSERT INTO `tbl_board` (`bid`, `fk_tbl_u`, `board_title`, `board_desc`, `created_at`) VALUES
(1, 5, 'TeamX', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati totam officia eum.', '2022-03-25 03:51:58'),
(2, 5, 'TeamY', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati totam officia eum.', '2022-03-25 03:52:57'),
(3, 7, 'Second Test Board', 'This is a test board ', '2022-03-25 04:08:18'),
(4, 5, 'New Board', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s ', '2022-03-25 04:23:28'),
(5, 8, 'New Board from 7', 'Lorem Ipsum is simply dummy text ', '2022-03-25 09:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_board_user`
--

CREATE TABLE `tbl_board_user` (
  `buid` int(11) NOT NULL,
  `fk_tbl_board` int(11) NOT NULL,
  `tbl_u` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_board_user`
--

INSERT INTO `tbl_board_user` (`buid`, `fk_tbl_board`, `tbl_u`, `created_at`) VALUES
(1, 3, 5, '2022-03-25 04:08:56'),
(2, 1, 7, '2022-03-25 08:14:02'),
(3, 2, 7, '2022-03-25 08:20:17'),
(4, 5, 5, '2022-03-25 09:19:04'),
(5, 1, 8, '2022-03-25 09:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card`
--

CREATE TABLE `tbl_card` (
  `cid` int(11) NOT NULL,
  `fk_tbl_board` int(11) NOT NULL,
  `fk_tbl_u` int(11) NOT NULL,
  `fk_tbl_label` int(11) NOT NULL,
  `fk_tbl_cat` int(11) NOT NULL,
  `ctitle` varchar(220) NOT NULL,
  `cdesc` text NOT NULL,
  `craeted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_card`
--

INSERT INTO `tbl_card` (`cid`, `fk_tbl_board`, `fk_tbl_u`, `fk_tbl_label`, `fk_tbl_cat`, `ctitle`, `cdesc`, `craeted_at`) VALUES
(1, 1, 7, 1, 1, 'First Todo', 'lorem Ispsum dollar asit ', '2022-03-25 05:49:28'),
(2, 1, 5, 1, 1, 'Second card', 'this is a progress card', '2022-03-25 05:49:28'),
(3, 1, 5, 1, 1, 'Third Card', 'This is the third card', '2022-03-25 05:49:28'),
(4, 1, 5, 1, 1, 'The final step', 'This took so long', '2022-03-25 05:49:28'),
(5, 1, 7, 3, 1, 'Test', 'Test', '2022-03-25 07:00:45'),
(6, 1, 7, 3, 1, 'Test2', 'Test445', '2022-03-25 07:01:29'),
(7, 1, 7, 2, 1, 'Testtt', 'tttt', '2022-03-25 07:02:22'),
(8, 2, 7, 3, 2, 'TEst', 'test', '2022-03-25 07:43:33'),
(9, 5, 7, 3, 1, 'Final testing', 'lorem ipsum', '2022-03-25 09:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_cat`
--

CREATE TABLE `tbl_card_cat` (
  `ccid` int(11) NOT NULL,
  `cat_name` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_card_cat`
--

INSERT INTO `tbl_card_cat` (`ccid`, `cat_name`) VALUES
(1, 'Todo'),
(2, 'Progress'),
(3, 'Code Review'),
(4, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_label`
--

CREATE TABLE `tbl_card_label` (
  `clid` int(11) NOT NULL,
  `label_name` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_card_label`
--

INSERT INTO `tbl_card_label` (`clid`, `label_name`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `rid` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`rid`, `role`) VALUES
(1, 'A007'),
(2, 'U006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sprint_meeting`
--

CREATE TABLE `tbl_sprint_meeting` (
  `smid` int(11) NOT NULL,
  `fk_tbl_board` int(11) NOT NULL,
  `smtitle` varchar(220) NOT NULL,
  `smdesc` text NOT NULL,
  `smduedate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sprint_meeting`
--

INSERT INTO `tbl_sprint_meeting` (`smid`, `fk_tbl_board`, `smtitle`, `smdesc`, `smduedate`) VALUES
(1, 1, 'Testing', 'testing', '2022-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_u`
--

CREATE TABLE `tbl_u` (
  `uid` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `pwd` varchar(220) NOT NULL,
  `fk_role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_u`
--

INSERT INTO `tbl_u` (`uid`, `name`, `email`, `pwd`, `fk_role`, `created_at`) VALUES
(5, 'Ashir Irfan', 'ashirirfan507@gmail.com', '4297f44b13955235245b2497399d7a93', 2, '2022-03-25 02:21:13'),
(7, 'Test User', 'test@gmail.com', '4297f44b13955235245b2497399d7a93', 2, '2022-03-25 04:07:46'),
(8, 'shoaib Hussain', 'shoaib@gmail.com', '078563f337ec6d6fedf131ddc857db19', 2, '2022-03-25 09:17:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_board`
--
ALTER TABLE `tbl_board`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tbl_board_user`
--
ALTER TABLE `tbl_board_user`
  ADD PRIMARY KEY (`buid`);

--
-- Indexes for table `tbl_card`
--
ALTER TABLE `tbl_card`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_card_cat`
--
ALTER TABLE `tbl_card_cat`
  ADD PRIMARY KEY (`ccid`);

--
-- Indexes for table `tbl_card_label`
--
ALTER TABLE `tbl_card_label`
  ADD PRIMARY KEY (`clid`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbl_sprint_meeting`
--
ALTER TABLE `tbl_sprint_meeting`
  ADD PRIMARY KEY (`smid`);

--
-- Indexes for table `tbl_u`
--
ALTER TABLE `tbl_u`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_board`
--
ALTER TABLE `tbl_board`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_board_user`
--
ALTER TABLE `tbl_board_user`
  MODIFY `buid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_card`
--
ALTER TABLE `tbl_card`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_card_cat`
--
ALTER TABLE `tbl_card_cat`
  MODIFY `ccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_card_label`
--
ALTER TABLE `tbl_card_label`
  MODIFY `clid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sprint_meeting`
--
ALTER TABLE `tbl_sprint_meeting`
  MODIFY `smid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_u`
--
ALTER TABLE `tbl_u`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
