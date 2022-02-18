-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 03:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_work_io`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp`
--

CREATE TABLE `tbl_emp` (
  `m_id` int(11) NOT NULL,
  `m_username` varchar(50) NOT NULL,
  `m_password` varchar(50) NOT NULL,
  `m_firstname` enum('นาย','นางสาว','นาง') NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_lastname` varchar(100) NOT NULL,
  `m_position` enum('พนักงาน','ผู้จัดการ','แอดมิน') NOT NULL,
  `m_img` varchar(100) DEFAULT NULL,
  `m_phone` varchar(20) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_level` enum('staff','admin') NOT NULL,
  `m_datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_emp`
--

INSERT INTO `tbl_emp` (`m_id`, `m_username`, `m_password`, `m_firstname`, `m_name`, `m_lastname`, `m_position`, `m_img`, `m_phone`, `m_email`, `m_level`, `m_datesave`) VALUES
(1, '111', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'นาย', 'ทด', 'ประพันธ์', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(2, '222', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9', 'นาย', 'พงษ์', 'ใจดี', 'พนักงาน', 'e2.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(3, '333', '43814346e21444aaf4f70841bf7ed5ae93f55a9d', 'นางสาว', 'สุนิสา', 'แก้วสุข', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(4, '444', '9a3e61b6bcc8abec08f195526c3132d5a4a98cc0', 'นาย', 'สมจิต', 'ศรีสุข', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(5, '555', 'cfa1150f1787186742a9a884b73a43d8cf219f9b', 'นางสาว', 'มีนา', 'สุโขรัมย์', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(7, '666', 'cd3f0c85b158c08a2b113464991810cf2cdfc387', 'นาย', 'วิชัย', 'เฉวียงหงส์', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(8, '777', 'eaa67f3a93d0acb08d8a5e8ff9866f51983b3c3b', 'นาง', 'ประนอม', 'เฉวียงหงส์', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(9, '888', 'eaa67f3a93d0acb08d8a5e8ff9866f51983b3c3b', 'นาย', 'กฤษณะ', 'จันทร์คืน', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(10, '999', 'adf07da64533f5a5b08fe0e439583c8058ad6a46', 'นาย', 'ธนกฤษ', 'จุลหงส์', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(11, '101', 'dbc0f004854457f59fb16ab863a3a1722cef553f', 'นาง', 'อำนวย', 'จุลหงส์', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(12, '102', 'c8306ae139ac98f432932286151dc0ec55580eca', 'นาย', 'ธนพล', 'ยางสามัญ', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(13, '103', '934385f53d1bd0c1b8493e44d0dfd4c8e88a04bb', 'นาง', 'ศิริพร', 'ยางสามัญ', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(14, '104', '78a8efcbaaa1a9a30f9f327aa89d0b6acaaffb03', 'นาง', 'อัญญาดา', 'จุลหงส์', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(15, '105', 'e114c448f4ab8554ad14eff3d66dfeb3965ce8fc', 'นาย', 'กิตติภณ', 'สอดสุข', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(16, '106', '7224f997fc148baa0b7f81c1eda6fcc3fd003db0', 'นางสาว', 'สุนิสา ', 'ผิวทอง', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(17, '107', '524e05dc77239f3a15dab766aaa59a9e432efde7', 'นางสาว', 'อารีลักษณ์', 'พินิจกรรณ์', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(18, '108', '17503a6b2326f09fbc4e3a7c03874c7333002038', 'นาง', 'ขมวน', 'สุโรัมย์', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(19, '109', 'a1422e6a168630cdd214ac5e31ca01ae1bee8d92', 'นาย', 'สมชาย', 'สายใย', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(20, '120', '775bc5c30e27f0e562115d136e7f7edbd3cead89', 'นาย', 'กฤษณะ', 'มีทรัพย์', 'พนักงาน', 'e1.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(21, '121', '8bd7954c40c1e59a900f71ea3a266732609915b1', 'นาง', 'ปราณี', 'สุโรัมย์', 'พนักงาน', 'e3.png', '0948616709', 'devbanban@gmail.com', 'staff', '2020-03-24 04:00:33'),
(22, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'นางสาว', 'ผู้ดูแล', 'ระบบ', 'แอดมิน', 'e1.png', '9999999999', 'admin@localhost.com', 'admin', '2022-02-18 05:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id` int(11) NOT NULL,
  `ref_m_id` int(11) NOT NULL,
  `job_detail` enum('ลาป่วย','ลากิจ','พักร้อน') NOT NULL,
  `job_remark` text NOT NULL,
  `job_by` varchar(200) NOT NULL,
  `date_start` date NOT NULL DEFAULT current_timestamp(),
  `date_end` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`id`, `ref_m_id`, `job_detail`, `job_remark`, `job_by`, `date_start`, `date_end`) VALUES
(9, 1, 'พักร้อน', 'หยุดปีใหม่', 'ทด', '2022-02-01', '2022-02-02'),
(10, 1, 'ลาป่วย', 'อุบัตเหตุ', 'ทด', '2022-02-08', '2022-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_io`
--

CREATE TABLE `tbl_work_io` (
  `id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL COMMENT 'ไอดี พนง.',
  `workdate` date NOT NULL,
  `workin` time NOT NULL,
  `workout` time NOT NULL DEFAULT '17:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbl_work_io`
--

INSERT INTO `tbl_work_io` (`id`, `m_id`, `workdate`, `workin`, `workout`) VALUES
(12, 1, '2022-01-29', '10:09:37', '17:00:00'),
(13, 1, '2022-02-03', '11:04:53', '17:00:00'),
(14, 20, '2022-02-10', '11:41:48', '17:00:00'),
(15, 2, '2022-02-10', '13:40:12', '17:00:00'),
(16, 1, '2022-02-18', '14:24:14', '17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_emp`
--
ALTER TABLE `tbl_emp`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work_io`
--
ALTER TABLE `tbl_work_io`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_emp`
--
ALTER TABLE `tbl_emp`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_work_io`
--
ALTER TABLE `tbl_work_io`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
