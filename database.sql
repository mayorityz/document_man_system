-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 12:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fms_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `date_uploaded` varchar(50) NOT NULL,
  `date_updated` varchar(50) NOT NULL DEFAULT '-- No New Updates --',
  `uploaded_by_whom` varchar(250) NOT NULL,
  `updated_by_whom` varchar(250) NOT NULL DEFAULT '-- NOT UPDATED --'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fms_id`, `title`, `file_path`, `category`, `date_uploaded`, `date_updated`, `uploaded_by_whom`, `updated_by_whom`) VALUES
(14, 'Travel Doc For The Dept.', 'everything-curl.pdf', 'travel documents', '14-05-2019 10:48:06:pm', '16-05-2019 04:47:39:pm', '1', 'drake@drake.com'),
(15, 'Invoice For System by Drake', 'Detailed Description of ecommerce website project -2019.pdf', 'receipt', '14-05-2019 11:11:32:pm', '16-05-2019 04:49:53:pm', '1', 'drake@drake.com');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `office` varchar(70) NOT NULL,
  `passcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberid`, `username`, `email`, `office`, `passcode`) VALUES
(3, 'zadok', 'df@gh.com', 'cleaneer', 'af3d2c50aee141929525e76b78372ffb0290221504c59d03aafb75b4e6dde9ef'),
(4, 'zadok', 'df@gh.com', 'cleaneer', 'af3d2c50aee141929525e76b78372ffb0290221504c59d03aafb75b4e6dde9ef'),
(5, 'Issac Newton', 'sir@newt.on', 'scientist', '755bdaba51d401dbd1f0ddd300be91f5e331ad1ae1d7336103524a3c3742c044'),
(6, 'Jane Doe', 'jane.doe@janet.com', 'Accounts', '51f135d75b86659e98ab4033e18b6b1d9e550baa4bfb6e5058b38b23c6e8ff92'),
(7, 'drac ula', 'drake@drake.com', 'mixer', '3c5d60199b041b2feb2187e8f048d5887f81a9d227addb40aab8167c0dd98202');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fms_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
