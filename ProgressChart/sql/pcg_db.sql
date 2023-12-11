-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 12:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `en_id` int(11) NOT NULL,
  `sj_id` int(11) NOT NULL,
  `usr_std_id` int(11) NOT NULL,
  `en_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`en_id`, `sj_id`, `usr_std_id`, `en_detail`) VALUES
(1, 1, 1, 'en_detail test');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `pg_id` int(11) NOT NULL,
  `sj_id` int(11) NOT NULL,
  `usr_no_id` int(11) NOT NULL,
  `task_name` text NOT NULL,
  `score` int(11) NOT NULL,
  `ack_std` tinyint(1) NOT NULL,
  `ack_teacher` tinyint(1) NOT NULL,
  `score_std` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`pg_id`, `sj_id`, `usr_no_id`, `task_name`, `score`, `ack_std`, `ack_teacher`, `score_std`) VALUES
(1, 1, 1, 'Select Data from databases', 10, 1, 1, 8),
(2, 1, 1, 'Select Data from databases', 10, 1, 0, 0),
(3, 1, 1, 'Basic Database and DBMS.', 10, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sj_id` int(11) NOT NULL,
  `sj_name` text NOT NULL,
  `term` text NOT NULL,
  `description` text NOT NULL,
  `sj_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sj_id`, `sj_name`, `term`, `description`, `sj_owner`) VALUES
(1, 'ระบบฐานข้อมูลเบื้องต้น', '2/2566', 'ระบบฐานข้อมูลเบื้องต้น', 2),
(2, 'การโปรแกรม PHP เบื้องต้น', '2/2566', 'การโปรแกรม PHP เบื้องต้น', 2),
(3, 'การสร้างภาพเคลื่อนไหว', '2/2566', 'การสร้างภาพเคลื่อนไหวเบื้องต้น', 12),
(4, 'การสร้างภาพเคลื่อนไหว', '2/2566', 'เรียนรู้การสร้างภาพเคลื่อนไหว ด้วย AE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no_usr` int(11) NOT NULL,
  `usr_card_no` varchar(20) NOT NULL,
  `usr_std_id` varchar(20) NOT NULL,
  `usr_name` varchar(50) NOT NULL,
  `usr_fullname` varchar(50) NOT NULL,
  `usr_address` text NOT NULL,
  `usr_type` int(11) NOT NULL,
  `pic` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no_usr`, `usr_card_no`, `usr_std_id`, `usr_name`, `usr_fullname`, `usr_address`, `usr_type`, `pic`, `password`) VALUES
(1, '1436975124', '010N8083', 'natthawat', 'Natthawat Sakubol', '131 m 9', 3, 'none.png', ''),
(2, 'TEACHER', 'TEACHER', 'krunat', 'ครูณัฏฐวัสน์ ศักดิ์อุบล', '131 xx', 2, '', 'krunat'),
(3, 'ADMIN', 'ADMIN', 'admin', 'อัครพล ลพครอัค', '123/111', 1, '', 'admin'),
(6, '1238128980', '65301010001', 'user1', 'ทักษิณ ชัยกิจมงคลกุล', '564-1 ม.7 ต.หมากแข้ง อ.เมือง อุดรธานี 41000', 3, '', '123456'),
(7, '1235074276', '65301010002', 'user2', 'เรียวตะ อาจสุวรรณ', '270 ม.4 ต.เชียงพิณ อ.เมือง อุดรธานี 41000', 3, '', '123456'),
(8, '1235078708', '65301010003', 'user3', 'ปิติพงศ์ ทามาตร', '223 ม.13 ต.ขอนยูง อ.กุดจับ อุดรธานี 41250', 3, '', '123456'),
(9, '0304155056', '65301010004', 'user4', 'เอกพล ไปได้', '225-1 ม.1 ต.บ้านเลื่อม อ.เมือง อุดรธานี 41000', 3, '', '123456'),
(10, '-', 'KU00001', 'saksit', 'ศักสิทธิ์ สร้อยสังวาลย์', '23 ม.9 ต.หมากแข้ง อ.เมือง จ.อุดรธานี', 2, '', '123456'),
(12, '-', 'KU00003', 'rujira', 'รุจิรา สิทธิพิสัย', '12 ม.9 ต.หมากแข้ง อ.เมือง จ.อุดรธานี', 2, '', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`en_id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sj_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no_usr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `en_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
