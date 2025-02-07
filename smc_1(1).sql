-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 08:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smc_1(1)`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `email` varchar(300) NOT NULL,
  `sentdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `message`, `email`, `sentdate`) VALUES
(1, 'testing', 'susu@gmail.com', '2024-06-28 04:05:13'),
(5, 'asds fdsafsa fdsafsa ', 'kyaw@gmail.com', '2024-06-28 06:18:51'),
(6, 'qoekfwoefofowpf', 'maythu@gmail.com', '2024-07-08 18:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `howparenthelp`
--

CREATE TABLE `howparenthelp` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `howparenthelp`
--

INSERT INTO `howparenthelp` (`id`, `description`, `image1`, `image2`) VALUES
(1, 'shan', 'Screenshot 2023-10-06 190210.png', 'Screenshot 2023-10-30 180201.png'),
(3, 'wsfwefoejf', 'Screenshot 2023-10-30 180150.png', 'Screenshot 2024-06-15 154857.png');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(8) NOT NULL,
  `city` varchar(200) NOT NULL,
  `subscription` int(11) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `profile`, `name`, `email`, `password`, `city`, `subscription`, `usertype`) VALUES
(35, 'download.png', 'uuuuuuuu', 'uuu@gmail.com', 'uuuu', 'Yangon', 1, 0),
(36, 'Screenshot 2023-10-18 201123.png', 'Yati', 'yoo@gmail.com', 'yoo', 'Yangon', 1, 1),
(37, 'Screenshot 2023-10-18 201123.png', 'user', 'user@gmail.com', 'user', 'Yangon', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `img` varchar(200) NOT NULL,
  `publishdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `title`, `content`, `img`, `publishdate`) VALUES
(1, 'Online Safety News', 'This month our newsletter looks at a new app called Capcut.  It is owned by the same owners as TikTok and is a video editing app. CapCut state that their services are intended for those over the age of 13 and those under the age of 18 must have consent from their parent/legal guardian. It is rated as 12+ on the App store.', 'awareness1.jpg', '2024-06-28 04:18:59'),
(2, 'Online Safety Advice for Parents', 'Want to talk about it? Making space for conversations about life online.\r\n\r\nDuring the week, children worked with their teachers on whole class activities and also in small groups. They also discussed the messages around how to stay safe online and the the importance of speaking to adults if they need help. At the end of the week the whole school came together in a special assembly to share their learning. For further information, this page has lots of useful links as well as a library of monthly online safety newsletter containing information useful for parents.', 'bully4.jpg', '2024-06-28 04:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `img`, `title`, `description`, `info`, `createdat`, `display`) VALUES
(4, 'Screenshot 2024-07-03 144621.png', 'Cyber Bully Work shop', 'Join our interactive workshops to learn about online safety and responsible social media use. ', 'Date: November 15, 2024\r\n\r\nLocation: Virtual Event', '2024-06-28 03:47:19', 1),
(7, 'download.png', 'sdfwgf', 'wefwrgw', 'wggwrf', '2024-07-16 09:15:52', 1),
(11, 'download.png', 'asdfgh', 'asdfg', 'affgjsdf', '2024-07-16 17:12:42', 1),
(12, 'download.png', 'dsgdfsffg', 'awfdwef', 'wefdwet', '2024-07-16 17:13:39', 1),
(13, 'Screenshot 2024-07-07 214945.png', 'wferrert', 'wewrwef', 'rwrewadsd', '2024-07-19 18:22:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `socialmediaapps`
--

CREATE TABLE `socialmediaapps` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `privacylink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `socialmediaapps`
--

INSERT INTO `socialmediaapps` (`id`, `name`, `logo`, `link`, `privacylink`) VALUES
(4, 'Facebook', 'Facebook_Logo_2023.png', 'https://www.facebook.com/help/325807937506242', 'https://www.facebook.com/help/325807937506242'),
(7, 'X', 'X.jpg', 'https://x.com/?lang=en&mx=2', 'https://x.com/settings/account?lang=en'),
(9, 'Snapchat', 'snapchat.jpg', 'https://www.snapchat.com/', 'https://values.snap.com/privacy/privacy-policy'),
(10, 'TikTok', 'tiktok.png', 'https://www.tiktok.com/login', 'https://www.tiktok.com/legal/page/row/privacy-policy/en'),
(11, 'Telegram', 'telegram.png', 'https://telegram.org/', 'https://telegram.org/privacy?setln=fa'),
(12, 'Instragram', 'Untitled.jpg', 'https://www.instagram.com/', 'https://help.instagram.com/196883487377501');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howparenthelp`
--
ALTER TABLE `howparenthelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmediaapps`
--
ALTER TABLE `socialmediaapps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `howparenthelp`
--
ALTER TABLE `howparenthelp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `socialmediaapps`
--
ALTER TABLE `socialmediaapps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
