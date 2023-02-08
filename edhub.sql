-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 10:19 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`) VALUES
(3, 'admin', '$2y$10$qPycX/sudx3pykNMKeDpXeNdRQW9cp5RSCfuO.ignFWLvws7ANfrS', '', '', '', ''),
(4, 'adminnisal', '$2y$10$WvMs5iW4F0fbEp.451uzdOLuA/yGskPXAbDM.accYbBpzhtABRgCS', 'Nisal', 'Avishka', 'nisalavishka@gmail.com', '0785643521');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `att_id` int(100) NOT NULL,
  `today` varchar(100) NOT NULL,
  `stid` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `intime` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`att_id`, `today`, `stid`, `firstname`, `lastname`, `class`, `intime`) VALUES
(1, '12/01/2023', 2, 'Sudesh', 'Gamage', '6', '2023-01-12 17:29:51'),
(2, '13/01/2023', 2, 'Sudesh', 'Gamage', '6', '2023-01-13 05:48:09'),
(3, '13/01/2023', 2, 'Sudesh', 'Gamage', '6', '2023-01-13 14:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ch_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `date_posted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ch_id`, `firstname`, `lastname`, `title`, `description`, `file`, `subject`, `class`, `date_posted`) VALUES
(2, 'Thushara', 'Senavirathne', 'Tutorial 01', 'Complete this tutorial before next Wednesday.', 'tutorial.png', 'Sinhala', '6', '2023-01-05 16:26:59'),
(4, 'Thushara', 'Senavirathne', 'message', 'message', 'Untitled design (1).png', 'Sinhala', '6', '2023-01-13 14:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cl_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cl_id`, `name`, `date_added`) VALUES
(6, '6', '2022-12-30 12:48:15'),
(7, '7', '2022-12-30 12:50:12'),
(8, '8', '2022-12-30 12:50:16'),
(9, '9', '2022-12-30 12:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `img_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(254) NOT NULL,
  `date_posted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`img_id`, `firstname`, `lastname`, `class`, `title`, `description`, `image`, `date_posted`) VALUES
(2, 'Sudesh', 'Gamage', '6', 'sss', 'description', 'design.png', '2023-01-11 12:44:58'),
(3, 'Sudesh', 'Gamage', '6', 'My Drawing', 'description', 'Untitled design.png', '2023-01-11 14:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `my_subject`
--

CREATE TABLE `my_subject` (
  `mys_id` int(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_subject`
--

INSERT INTO `my_subject` (`mys_id`, `class_name`, `subject_name`, `date_added`) VALUES
(1, '7', 'Mathematics', '2022-12-31 11:58:32'),
(2, '7', 'Science', '2022-12-31 11:58:43'),
(3, '7', 'Buddhism', '2022-12-31 11:58:45'),
(4, '7', 'English', '2022-12-31 11:58:46'),
(5, '7', 'Sinhala', '2022-12-31 11:58:48'),
(6, '7', 'History', '2022-12-31 11:58:49'),
(7, '7', 'Tamil', '2022-12-31 11:58:51'),
(8, '7', 'Health Science', '2022-12-31 11:58:52'),
(9, '7', 'Citizenship Studies', '2022-12-31 11:58:53'),
(10, '7', 'Aesthetics', '2022-12-31 11:58:54'),
(11, '7', 'Goegraphy', '2022-12-31 11:58:55'),
(12, '6', 'Mathematics', '2023-01-01 09:24:44'),
(13, '6', 'Science', '2023-01-01 09:24:45'),
(14, '6', 'Buddhism', '2023-01-01 09:24:47'),
(15, '6', 'English', '2023-01-01 09:24:48'),
(16, '6', 'Sinhala', '2023-01-01 09:24:48'),
(17, '6', 'History', '2023-01-01 09:24:50'),
(18, '6', 'Tamil', '2023-01-01 09:24:51'),
(19, '6', 'Health Science', '2023-01-01 09:24:53'),
(20, '6', 'Citizenship Studies', '2023-01-01 09:24:54'),
(21, '6', 'Aesthetics', '2023-01-01 09:24:55'),
(22, '6', 'Goegraphy', '2023-01-01 09:24:56'),
(23, '8', 'Mathematics', '2023-01-02 19:31:55'),
(24, '8', 'Science', '2023-01-02 19:35:30'),
(25, '8', 'Buddhism', '2023-01-13 05:41:19'),
(26, '8', 'English', '2023-01-13 05:41:21'),
(27, '8', 'Sinhala', '2023-01-13 05:41:21'),
(28, '8', 'History', '2023-01-13 05:41:22'),
(29, '8', 'Tamil', '2023-01-13 05:41:23'),
(30, '8', 'Health Science', '2023-01-13 05:41:24'),
(31, '8', 'Citizenship Studies', '2023-01-13 05:41:24'),
(32, '8', 'Aesthetics', '2023-01-13 05:41:25'),
(34, '8', 'Goegraphy', '2023-01-13 05:41:34'),
(35, '9', 'Mathematics', '2023-01-13 14:15:08'),
(36, '9', 'Mathematics', '2023-01-13 14:15:09'),
(37, '9', 'Science', '2023-01-13 14:15:10'),
(38, '9', 'Buddhism', '2023-01-13 14:15:11'),
(39, '9', 'English', '2023-01-13 14:15:12'),
(40, '9', 'Sinhala', '2023-01-13 14:15:12'),
(41, '9', 'History', '2023-01-13 14:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(100) NOT NULL,
  `lecdate` varchar(254) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `link` varchar(254) NOT NULL,
  `file` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `lecdate`, `class`, `subject`, `link`, `file`) VALUES
(2, '2023-01-08', '6', 'Sinhala', 'https://youtu.be/9GieKqWZ9pA', 'sample (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `pa_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(254) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `chfname` varchar(100) NOT NULL,
  `chlname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`pa_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `address`, `email`, `phone`, `chfname`, `chlname`) VALUES
(1, 'prtbandara', '$2y$10$pAdBGZZmE/A//D7J94mG9.6.2LvIBxlxUC5qk4l3X9djmUQE9D.IW', 'Bandara', 'Gamage', 'male', 'No 11, Millennium Park, Kaduwela', 'bandaragamage14@gmail.com', '0785234765', 'Sudesh', 'Gamage'),
(2, 'prtsenaka', '$2y$10$PKbGaTeiM/aFECjh9ZI4G.0CAI3Z56QrJCtd5Cl4XDvjn0yzgdHDW', 'Senaka', 'Bandara', 'male', 'No 10, Rose Lane, Malabe', 'senaka23@icloud.com', '0784572322', 'Kasun ', 'Bandara');

-- --------------------------------------------------------

--
-- Table structure for table `post_assignment`
--

CREATE TABLE `post_assignment` (
  `asign_id` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `date_posted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_assignment`
--

INSERT INTO `post_assignment` (`asign_id`, `type`, `due_date`, `file`, `subject`, `class`, `date_posted`) VALUES
(1, 'assignment', '2023-01-24', 'sample.pdf', 'Sinhala', '6', '2023-01-10 08:43:05'),
(2, 'assignment', '2023-01-24', 'sample.pdf', 'Sinhala', '6', '2023-01-10 08:44:23'),
(3, 'assignment', '2023-01-25', 'sample (1).pdf', 'Sinhala', '7', '2023-01-11 19:22:50'),
(4, 'assignment', '2023-01-20', 'Sinhala Assignment 1.pdf', 'Sinhala', '6', '2023-01-13 14:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `prtmeeting`
--

CREATE TABLE `prtmeeting` (
  `meet_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `mdate` varchar(100) NOT NULL,
  `mtime` varchar(100) NOT NULL,
  `link` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prtmeeting`
--

INSERT INTO `prtmeeting` (`meet_id`, `title`, `class`, `mdate`, `mtime`, `link`) VALUES
(1, 'Meeting 01', '6', '18/01/2023', '19:00-20:00', 'https://us02web.zoom.us/j/89533741416?pwd=YnBYUENyaTBmUEN1cWFmN1VJaC9DUT09');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sch_id` int(100) NOT NULL,
  `timeslot` varchar(254) NOT NULL,
  `title` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `link` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(254) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `date_birth` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `address`, `gender`, `date_birth`, `class`) VALUES
(1, 'stdkasun', '$2y$10$16ScPJaMo0u.YRYGikkeTuA6DeY3zQFXz0DMDP4IA140e2RErz90K', 'Kasun', 'Bandara', 'kasunbandara18@gmail.com', '0785642345', 'No 10, Rose Lane, Malabe', 'male', '19/07/2010', '6'),
(2, 'stdsudesh', '$2y$10$1K3nWlrFiur1xymoRVe7he8siCxOcgp9e0Vo1j0ZSgGnrWe3Q5JXi', 'Sudesh', 'Gamage', 'sudeshgamage12@gmail.com', '0763752372', 'No 11, Millennium Park, Kaduwela ', 'male', '10/08/2010', '6'),
(3, 'stdkushani', '$2y$10$NEMchc56d5UtveMiYJzu/uj2GUv9xKBOtK5Grq5oVaVg56Ai8pj4O', 'Kushani', 'Rathnayake', 'kushanirathnayake10@gmail.com', '0752783421', 'No 760/B, Kaduwela Road, Malabe', 'female', '23/05/2010', '7'),
(4, 'stdharshana', '$2y$10$EgCbftbaPzJKxu9.nCdH4OfQOXgJ.wRKAvZUpY4sHUT8VJKO.cDB6', 'Harshana', 'Wijerathne', 'harshanawijenew@gmail.com', '0784632721', '135/6, Josephs Street, Thalangama', 'male', '20/10/2009', '7'),
(5, 'stdsankha', '$2y$10$17sd7XAlN28DTNDiSoZZLO05fxcORial4OGn.bGYdhES.bmzlC8gq', 'Sankha', 'Dassanayake', 'sankhadassa20@gmail.com', '0789345678', 'No 10, Near School, Ragama', 'male', '05/08/2008', '8'),
(6, 'stdushani', '$2y$10$Mc/dV7IQ49887f41qBAodOl2yPYypuHL88aC1Rrtqb56oj43OWgLy', 'Ushani', 'Rajanayake', 'ushanirajanayake@gmail.com', '0763652453', 'No 120, Station Road, Kelaniya', 'female', '08/09/2009', '7'),
(7, 'stdtharaka', '$2y$10$vzz2X1YIt/WgSi1H7Ps2mepGUdaUgILUL2NJUI5vzpvUXC1ywvAtu', 'Tharaka', 'Mendis', 'mendisthara@gmail.com', '0763562981', 'No 10, 1st street, Kaduwela', 'male', '12/07/2008', '8'),
(8, 'stdkaveesha', '$2y$10$D6M82zYvMaGjcNkoo5Y.O.rBRGMKyL1KVxYoddvpYOjQxmuknOpTu', 'Kaveesha', 'Perera', 'kaveesha1234@gmail.com', '0779354281', 'No 12, Cross street, Maradana', 'female', '11/07/2007', '9');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sb_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sb_id`, `name`, `date_added`) VALUES
(1, 'Mathematics', '2022-12-30 14:37:43'),
(2, 'Science', '2022-12-30 14:44:11'),
(3, 'Buddhism', '2022-12-30 15:12:53'),
(4, 'English', '2022-12-30 15:13:03'),
(5, 'Sinhala', '2022-12-30 15:13:20'),
(6, 'History', '2022-12-30 15:13:34'),
(7, 'Tamil', '2022-12-30 15:13:41'),
(8, 'Health Science', '2022-12-30 15:13:55'),
(9, 'Citizenship Studies', '2022-12-30 15:14:14'),
(10, 'Aesthetics', '2022-12-30 15:14:48'),
(11, 'Goegraphy', '2022-12-30 15:15:01'),
(12, 'Information tech', '2023-01-13 14:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `subm_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `date_submitted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`subm_id`, `post_id`, `firstname`, `lastname`, `class`, `file`, `date_submitted`) VALUES
(1, 1, 'Sudesh', 'Gamage', '6', 'sample.pdf', '2023-01-10 16:48:56'),
(2, 2, 'Sudesh', 'Gamage', '6', 'sample.pdf', '2023-01-11 07:38:03'),
(3, 4, 'Sudesh', 'Gamage', '6', 'Submission-=Sudesh.pdf', '2023-01-13 14:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `th_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `regdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`th_id`, `username`, `password`, `firstname`, `lastname`, `town`, `email`, `phone`, `gender`, `subject`, `regdate`) VALUES
(1, 'ththushara', '$2y$10$T3MYz5vEBWzBAQGFvUPHne8vkpHu7ngBiRMRVkurAEVI35Kxow30S', 'Thushara', 'Senavirathne', 'Ragama', 'thusharasenevi78@gmail.com', '0789654345', 'male', 'Sinhala', '2022-12-31 16:40:36'),
(2, 'thkamal', '$2y$10$FTEPeg9jQt/DfBZzrGrAeu/fWYRjYRDbXYAwBKnmOcKFmDCa05Gni', 'Kamal', 'Dissanayake', 'Colombo', 'kamaldissa45@gmail.com', '0745823471', 'male', 'Mathematics', '2023-01-13 06:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

CREATE TABLE `video_gallery` (
  `vid_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `title` varchar(254) NOT NULL,
  `link` varchar(254) NOT NULL,
  `description` varchar(254) NOT NULL,
  `date_posted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_gallery`
--

INSERT INTO `video_gallery` (`vid_id`, `firstname`, `lastname`, `class`, `title`, `link`, `description`, `date_posted`) VALUES
(5, 'Kushani', 'Rathnayake', '7', 'Dance 1', 'https://www.youtube.com/embed/fdDKTWey8-0 ', 'Tradition dancing ', '2023-01-13 06:20:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `my_subject`
--
ALTER TABLE `my_subject`
  ADD PRIMARY KEY (`mys_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `post_assignment`
--
ALTER TABLE `post_assignment`
  ADD PRIMARY KEY (`asign_id`);

--
-- Indexes for table `prtmeeting`
--
ALTER TABLE `prtmeeting`
  ADD PRIMARY KEY (`meet_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`subm_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`th_id`);

--
-- Indexes for table `video_gallery`
--
ALTER TABLE `video_gallery`
  ADD PRIMARY KEY (`vid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `att_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ch_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cl_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `img_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `my_subject`
--
ALTER TABLE `my_subject`
  MODIFY `mys_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `pa_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_assignment`
--
ALTER TABLE `post_assignment`
  MODIFY `asign_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prtmeeting`
--
ALTER TABLE `prtmeeting`
  MODIFY `meet_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sch_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sb_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `subm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `th_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video_gallery`
--
ALTER TABLE `video_gallery`
  MODIFY `vid_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
