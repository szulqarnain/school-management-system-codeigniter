-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 10:42 PM
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
-- Database: `bent`
--

-- --------------------------------------------------------

--
-- Table structure for table `bz_activities`
--

CREATE TABLE `bz_activities` (
  `act_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `act_name` varchar(200) NOT NULL,
  `act_description` text NOT NULL,
  `act_start_date` date NOT NULL,
  `act_end_date` date NOT NULL,
  `act_publish_date` date NOT NULL,
  `act_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_admins`
--

CREATE TABLE `bz_admins` (
  `adm_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_admins`
--

INSERT INTO `bz_admins` (`adm_id`, `sch_id`, `use_id`) VALUES
(1, 1, 1),
(2, 3, 14),
(3, 4, 15),
(4, 5, 17);

-- --------------------------------------------------------

--
-- Table structure for table `bz_attendance`
--

CREATE TABLE `bz_attendance` (
  `att_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `att_date` date NOT NULL,
  `att_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_attendance`
--

INSERT INTO `bz_attendance` (`att_id`, `use_id`, `att_date`, `att_status`) VALUES
(1, 8, '2022-06-07', 'half_leave');

-- --------------------------------------------------------

--
-- Table structure for table `bz_classes`
--

CREATE TABLE `bz_classes` (
  `cla_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `cla_name` varchar(50) NOT NULL,
  `cla_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_classes`
--

INSERT INTO `bz_classes` (`cla_id`, `sch_id`, `cla_name`, `cla_entrytime`) VALUES
(1, 1, 'Primary Class', '2022-03-12 17:17:47'),
(2, 1, '1st Class', '2022-03-12 17:17:47'),
(3, 1, '2nd Class', '2022-03-12 17:17:47'),
(5, 1, 'new cla', '2022-04-09 18:04:17'),
(6, 1, 'asdfas', '2022-04-09 18:05:43'),
(7, 1, 'Hello World', '2022-04-09 18:05:53'),
(8, 1, 'mmmm', '2022-04-10 20:04:52'),
(9, 1, '10 th', '2022-04-13 19:00:33'),
(10, 1, 'testtest', '2022-05-22 17:31:51'),
(11, 5, '1st Class', '2022-05-22 18:47:52'),
(12, 5, 'Class 12', '2022-06-01 13:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `bz_exams`
--

CREATE TABLE `bz_exams` (
  `exa_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `exa_name` varchar(100) NOT NULL,
  `exa_start_date` date NOT NULL,
  `exa_date` date NOT NULL,
  `exa_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_fee`
--

CREATE TABLE `bz_fee` (
  `fee_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `fee_status` int(11) NOT NULL,
  `fee_from` date NOT NULL,
  `fee_to` date NOT NULL,
  `fee_description` text NOT NULL,
  `fee_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_gallery`
--

CREATE TABLE `bz_gallery` (
  `gal_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `gal_file` varchar(200) NOT NULL,
  `gal_title` varchar(200) NOT NULL,
  `gal_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_inventory`
--

CREATE TABLE `bz_inventory` (
  `inv_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `int_id` int(11) NOT NULL,
  `inv_name` varchar(100) NOT NULL,
  `inv_qty` int(11) NOT NULL,
  `inv_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_inventory_types`
--

CREATE TABLE `bz_inventory_types` (
  `int_id` int(11) NOT NULL,
  `int_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_notifications`
--

CREATE TABLE `bz_notifications` (
  `not_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `not_title` varchar(200) NOT NULL,
  `not_description` text NOT NULL,
  `not_date` date NOT NULL,
  `not_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_notifications`
--

INSERT INTO `bz_notifications` (`not_id`, `sch_id`, `not_title`, `not_description`, `not_date`, `not_entrytime`) VALUES
(1, 1, 'Send Due Invoice Alert', 'Send Due Invoice Alert', '0000-00-00', '2022-06-07 04:24:08'),
(2, 1, 'Send Due Invoice Alert', 'Send Due Invoice Alert', '0000-00-00', '2022-06-14 20:31:20'),
(3, 1, 'test', 'test', '0000-00-00', '2022-06-14 20:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `bz_salaries`
--

CREATE TABLE `bz_salaries` (
  `sal_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `sal_amount` int(11) NOT NULL,
  `sal_status` int(11) NOT NULL,
  `sal_date` date NOT NULL,
  `sal_description` text NOT NULL,
  `sal_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_schools`
--

CREATE TABLE `bz_schools` (
  `sch_id` int(11) NOT NULL,
  `sch_name` varchar(250) NOT NULL,
  `sch_city` varchar(100) NOT NULL,
  `sch_address` varchar(400) NOT NULL,
  `sch_logo` varchar(150) NOT NULL,
  `sch_token` varchar(100) NOT NULL,
  `sch_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_schools`
--

INSERT INTO `bz_schools` (`sch_id`, `sch_name`, `sch_city`, `sch_address`, `sch_logo`, `sch_token`, `sch_entrytime`) VALUES
(1, 'Bentzip School', 'Mumbai', 'Phase 4, Bahria Town', '', '2', '2022-05-20 14:01:06'),
(3, 'Abdali School', 'Islamabad', 'Khana Pul', '', '44170094', '2022-05-20 14:05:43'),
(4, 'test', 'test', 'test', '', '50424830', '2022-05-22 17:30:53'),
(5, 'Tahir Academy', 'Mumbai', 'mubai new city', '', '68408774', '2022-05-22 18:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `bz_sections`
--

CREATE TABLE `bz_sections` (
  `sec_id` int(11) NOT NULL,
  `cla_id` int(11) NOT NULL,
  `sec_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_sections`
--

INSERT INTO `bz_sections` (`sec_id`, `cla_id`, `sec_name`) VALUES
(1, 1, 'Sec A'),
(2, 1, 'Sec B'),
(3, 2, 'Sec A'),
(4, 2, 'Sec B'),
(5, 1, 'Sec C'),
(6, 1, 'Sec D'),
(7, 1, 'Sec E'),
(8, 1, 'Sec F'),
(9, 3, 'A One'),
(10, 3, 'A Two'),
(11, 3, 'A Three'),
(12, 7, 'New A'),
(13, 8, 'A'),
(14, 9, 'A'),
(15, 9, 'B'),
(16, 5, 'A Three'),
(17, 10, 'testtesttest'),
(18, 11, 'A'),
(19, 12, 'A'),
(20, 12, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `bz_students`
--

CREATE TABLE `bz_students` (
  `stu_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `cla_id` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_students`
--

INSERT INTO `bz_students` (`stu_id`, `sch_id`, `use_id`, `cla_id`, `sec_id`) VALUES
(5, 1, 9, 3, 11),
(6, 1, 13, 9, 14),
(7, 1, 16, 3, 11),
(8, 5, 18, 11, 18),
(9, 5, 19, 12, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bz_syllabus`
--

CREATE TABLE `bz_syllabus` (
  `syl_id` int(11) NOT NULL,
  `cla_id` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `syl_course` varchar(200) NOT NULL,
  `syl_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_teachers`
--

CREATE TABLE `bz_teachers` (
  `tea_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `cla_id` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_teachers`
--

INSERT INTO `bz_teachers` (`tea_id`, `sch_id`, `use_id`, `cla_id`, `sec_id`) VALUES
(1, 1, 8, 3, 11),
(2, 5, 22, 12, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bz_users`
--

CREATE TABLE `bz_users` (
  `use_id` int(11) NOT NULL,
  `ust_id` int(11) NOT NULL,
  `use_fname` varchar(200) NOT NULL,
  `use_mname` varchar(200) DEFAULT NULL,
  `use_lname` varchar(200) NOT NULL,
  `use_email` varchar(250) NOT NULL,
  `use_username` varchar(100) NOT NULL,
  `use_password` varchar(250) NOT NULL,
  `use_father_name` varchar(200) NOT NULL,
  `use_mother_name` varchar(200) NOT NULL,
  `use_birthday` date NOT NULL,
  `use_gender` varchar(10) NOT NULL,
  `use_image` varchar(250) NOT NULL,
  `use_address` text DEFAULT NULL,
  `use_status` int(11) NOT NULL,
  `use_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_users`
--

INSERT INTO `bz_users` (`use_id`, `ust_id`, `use_fname`, `use_mname`, `use_lname`, `use_email`, `use_username`, `use_password`, `use_father_name`, `use_mother_name`, `use_birthday`, `use_gender`, `use_image`, `use_address`, `use_status`, `use_entrytime`) VALUES
(1, 2, 'Ranjan', 'Test test', 'Tech', 'admin@admin.com', 'admin', 'admin123', 'Ranjan Khan2', 'Ranjan Khan', '1996-03-31', 'female', 'IMG_7446.jpg', 'Ranjan TEst', 0, '2022-06-14 19:32:30'),
(8, 3, 'Saira', ' ', 'Khan', 'wali@gmail.com', '814', '40919839', 'Wali Khan', 'Tahmeena Khan', '2022-04-28', 'female', 'new1.jpg', 'Islamabad Pakistan', 0, '2022-04-13 18:46:56'),
(9, 4, 'Sheriyar', 'Ahmad', 'Khan', 'kashif@gmail.com', '420', '24093450', 'Kashif Khan', 'Saira Khan', '2022-04-27', 'male', 'stuu1.jpg', 'Multan Pakistan', 0, '2022-04-13 18:47:43'),
(11, 1, 'Admin', '', 'Admin', 'superadmin@admin.com', 'superadmin', 'admin123', 'Ranjan', 'Ranjan', '1996-03-31', 'male', '', 'Ranjan House', 0, '2022-04-09 12:08:50'),
(13, 4, 'Arisha', ' ', 'Kashif', 'kashif2@gmail.com', '673', '48560691', 'Kashif Abas', 'Humaira Farooq', '2022-04-13', 'female', 'stuu3.jpg', 'Multan Pakistan', 0, '2022-04-13 19:08:56'),
(14, 2, 'Naeem ', 'Khan ', 'Abdali', 'naeem@admin.com', '721', '46466129', 'Naeem Khan', 'Mrs. Naeem ', '2022-05-20', 'male', '', 'Bahria Phase 2', 0, '2022-05-20 14:29:36'),
(15, 2, 'test', 'test', 'test', 'test@test.com', '830', '93382534', 'test', 'test', '2022-12-31', 'male', '', 'tes', 0, '2022-05-22 17:30:53'),
(16, 4, 'Bunny', 'rt', '7', 'testtesttest@test.com', '611', '23104966', 'test', 'test', '2022-12-31', 'female', 'photo-1521572163474-6864f9cf17ab.jpg', 'test', 0, '2022-05-22 18:01:04'),
(17, 2, 'Tahir', 'Abas', 'khan', 'ABC@AB.COM', '671', '32900910', 'ABC', 'xyzAB', '2022-12-31', 'male', '', 'address here', 0, '2022-05-22 18:46:42'),
(18, 4, 'ABHINEET', 'A', 'RANJAN', 'ABHINEET@GMAIL.COM', '409', '95220382', 'hd', 'ma', '2022-12-22', 'male', 'WhatsApp_Image_2022-04-15_at_10_54_47_PM.jpeg', '8C, TOWER 2, POCKET A, HIG FLATS, EXPRESS VIEW APARTMENT, SECTOR-105, NOIDA', 0, '2022-05-22 18:50:47'),
(19, 4, 'Danish', 's', 'Khan', 'abc@gmail.com', '154', '47464216', 'Mr. Khan', 'Mrs. Khan', '2021-12-27', 'male', 'images-removebg-preview_(1).png', 'Ankleshwar', 0, '2022-06-01 13:07:22'),
(22, 3, 'Monika', 'm', 'Singh', 'Abc1@gmail.com', '803', '65433903', 'TT', 'SS', '2014-12-29', 'female', 'stuu13.jpg', 'Ankleshwar', 0, '2022-06-01 13:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `bz_users_docs`
--

CREATE TABLE `bz_users_docs` (
  `udo_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `udo_file` varchar(250) NOT NULL,
  `udo_filename` varchar(250) NOT NULL,
  `udo_entrytime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bz_users_types`
--

CREATE TABLE `bz_users_types` (
  `ust_id` int(11) NOT NULL,
  `ust_name` varchar(100) NOT NULL,
  `ust_base` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bz_users_types`
--

INSERT INTO `bz_users_types` (`ust_id`, `ust_name`, `ust_base`) VALUES
(1, 'Super Admin', ''),
(2, 'Admin', 'bz_admins'),
(3, 'Teacher', 'bz_teachers'),
(4, 'Student', 'bz_students');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bz_activities`
--
ALTER TABLE `bz_activities`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `bz_admins`
--
ALTER TABLE `bz_admins`
  ADD PRIMARY KEY (`adm_id`),
  ADD UNIQUE KEY `use_id` (`use_id`);

--
-- Indexes for table `bz_attendance`
--
ALTER TABLE `bz_attendance`
  ADD PRIMARY KEY (`att_id`),
  ADD UNIQUE KEY `use_id` (`use_id`,`att_date`);

--
-- Indexes for table `bz_classes`
--
ALTER TABLE `bz_classes`
  ADD PRIMARY KEY (`cla_id`);

--
-- Indexes for table `bz_exams`
--
ALTER TABLE `bz_exams`
  ADD PRIMARY KEY (`exa_id`);

--
-- Indexes for table `bz_fee`
--
ALTER TABLE `bz_fee`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `bz_gallery`
--
ALTER TABLE `bz_gallery`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `bz_inventory`
--
ALTER TABLE `bz_inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `bz_inventory_types`
--
ALTER TABLE `bz_inventory_types`
  ADD PRIMARY KEY (`int_id`);

--
-- Indexes for table `bz_notifications`
--
ALTER TABLE `bz_notifications`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `bz_salaries`
--
ALTER TABLE `bz_salaries`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indexes for table `bz_schools`
--
ALTER TABLE `bz_schools`
  ADD PRIMARY KEY (`sch_id`),
  ADD UNIQUE KEY `sch_token` (`sch_token`);

--
-- Indexes for table `bz_sections`
--
ALTER TABLE `bz_sections`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `bz_students`
--
ALTER TABLE `bz_students`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `use_id` (`use_id`);

--
-- Indexes for table `bz_syllabus`
--
ALTER TABLE `bz_syllabus`
  ADD PRIMARY KEY (`syl_id`);

--
-- Indexes for table `bz_teachers`
--
ALTER TABLE `bz_teachers`
  ADD PRIMARY KEY (`tea_id`),
  ADD UNIQUE KEY `use_id` (`use_id`);

--
-- Indexes for table `bz_users`
--
ALTER TABLE `bz_users`
  ADD PRIMARY KEY (`use_id`),
  ADD UNIQUE KEY `use_username` (`use_username`),
  ADD UNIQUE KEY `use_email` (`use_email`);

--
-- Indexes for table `bz_users_docs`
--
ALTER TABLE `bz_users_docs`
  ADD PRIMARY KEY (`udo_id`);

--
-- Indexes for table `bz_users_types`
--
ALTER TABLE `bz_users_types`
  ADD PRIMARY KEY (`ust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bz_activities`
--
ALTER TABLE `bz_activities`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_admins`
--
ALTER TABLE `bz_admins`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bz_attendance`
--
ALTER TABLE `bz_attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bz_classes`
--
ALTER TABLE `bz_classes`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bz_exams`
--
ALTER TABLE `bz_exams`
  MODIFY `exa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_fee`
--
ALTER TABLE `bz_fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_gallery`
--
ALTER TABLE `bz_gallery`
  MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_inventory`
--
ALTER TABLE `bz_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_inventory_types`
--
ALTER TABLE `bz_inventory_types`
  MODIFY `int_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_notifications`
--
ALTER TABLE `bz_notifications`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bz_salaries`
--
ALTER TABLE `bz_salaries`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_schools`
--
ALTER TABLE `bz_schools`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bz_sections`
--
ALTER TABLE `bz_sections`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bz_students`
--
ALTER TABLE `bz_students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bz_syllabus`
--
ALTER TABLE `bz_syllabus`
  MODIFY `syl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_teachers`
--
ALTER TABLE `bz_teachers`
  MODIFY `tea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bz_users`
--
ALTER TABLE `bz_users`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bz_users_docs`
--
ALTER TABLE `bz_users_docs`
  MODIFY `udo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bz_users_types`
--
ALTER TABLE `bz_users_types`
  MODIFY `ust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
