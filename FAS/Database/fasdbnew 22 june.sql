-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 07:37 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fasdbnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assessmentmethod`
--

CREATE TABLE `assessmentmethod` (
  `courseID` int(10) NOT NULL,
  `assignNo` varchar(20) NOT NULL,
  `CO_no` varchar(10) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audcomment`
--

CREATE TABLE `audcomment` (
  `id` int(9) NOT NULL,
  `courseID` int(5) NOT NULL,
  `academicYear` varchar(9) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `year` varchar(10) NOT NULL,
  `sem` varchar(5) NOT NULL,
  `courseName` varchar(30) NOT NULL,
  `subjectCode` varchar(8) NOT NULL,
  `division` varchar(2) NOT NULL,
  `teaUsername` varchar(30) NOT NULL,
  `hodUsername` varchar(30) NOT NULL,
  `role` varchar(15) NOT NULL,
  `audUsername` varchar(30) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit_docs`
--

CREATE TABLE `audit_docs` (
  `courseID` int(5) NOT NULL,
  `tea_username` varchar(50) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `teaRole` varchar(30) DEFAULT NULL,
  `audType` varchar(20) DEFAULT NULL,
  `division` varchar(2) NOT NULL,
  `year` int(5) NOT NULL,
  `prerequisite` mediumblob DEFAULT NULL,
  `documentsVerified` mediumblob DEFAULT NULL,
  `defaulterList` mediumblob DEFAULT NULL,
  `lms` mediumblob DEFAULT NULL,
  `dcf` mediumblob DEFAULT NULL,
  `eAttendance` mediumblob DEFAULT NULL,
  `syllabusCoverage` mediumblob DEFAULT NULL,
  `workshopConduction` mediumblob DEFAULT NULL,
  `booksReferred` mediumblob DEFAULT NULL,
  `identifyStudents` mediumblob DEFAULT NULL,
  `evaluationLabs` mediumblob DEFAULT NULL,
  `additionalExperiments` mediumblob DEFAULT NULL,
  `epi` mediumblob DEFAULT NULL,
  `sampleCopies` mediumblob DEFAULT NULL,
  `ict` mediumblob DEFAULT NULL,
  `smartBoard` mediumblob DEFAULT NULL,
  `extension` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit_res`
--

CREATE TABLE `audit_res` (
  `courseID` int(5) NOT NULL,
  `tea_username` varchar(50) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `teaRole` varchar(30) DEFAULT NULL,
  `audType` varchar(20) DEFAULT NULL,
  `division` varchar(2) NOT NULL,
  `year` int(5) NOT NULL,
  `prerequisite_fdbk` varchar(5) NOT NULL,
  `documentsVerified_fdbk` varchar(5) NOT NULL,
  `defaulterList_fdbk` varchar(5) NOT NULL,
  `lms_fdbk` varchar(5) NOT NULL,
  `dcf_fdbk` varchar(5) NOT NULL,
  `eAttendance_fdbk` varchar(5) NOT NULL,
  `syllabusCoverage_fdbk` varchar(5) NOT NULL,
  `workshopConduction_fdbk` varchar(5) NOT NULL,
  `booksReferred_fdbk` varchar(5) NOT NULL,
  `identifyStudents_fdbk` varchar(5) NOT NULL,
  `evaluationLabs_fdbk` varchar(5) NOT NULL,
  `additionalExperiments_fdbk` varchar(5) NOT NULL,
  `EPI_fdbk` varchar(5) NOT NULL,
  `sample_copies_fdbk` varchar(5) NOT NULL,
  `ICT_fdbk` varchar(5) NOT NULL,
  `smart_board_fdbk` varchar(5) NOT NULL,
  `finalSugg_fdbk` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `fromAcadYr` int(11) NOT NULL,
  `toAcadYr` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subjectCode` varchar(10) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `credits` int(11) DEFAULT NULL,
  `lectHr` int(11) DEFAULT NULL,
  `totLectHr` int(11) DEFAULT NULL,
  `practHr` int(11) DEFAULT NULL,
  `totPractHr` int(11) DEFAULT NULL,
  `submitStatus` bit(1) DEFAULT NULL,
  `submitTime` datetime(6) DEFAULT NULL,
  `DQAapproved` bit(1) DEFAULT NULL,
  `HODcommentTea` varchar(100) DEFAULT NULL,
  `HODcommentDqa` varchar(100) DEFAULT NULL,
  `HODcommentAud` varchar(100) DEFAULT NULL,
  `classOrLab` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `dept`, `fromAcadYr`, `toAcadYr`, `sem`, `subjectCode`, `courseName`, `credits`, `lectHr`, `totLectHr`, `practHr`, `totPractHr`, `submitStatus`, `submitTime`, `DQAapproved`, `HODcommentTea`, `HODcommentDqa`, `HODcommentAud`, `classOrLab`) VALUES
(3, 'CE', 2021, 0, 4, 'CSC401', 'DBMS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'class');

-- --------------------------------------------------------

--
-- Table structure for table `coursel`
--

CREATE TABLE `coursel` (
  `courseID` int(11) NOT NULL,
  `fromAcadYr` int(11) NOT NULL,
  `toAcadYr` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subjectCode` varchar(10) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `credits` int(11) DEFAULT NULL,
  `lectHr` int(11) DEFAULT NULL,
  `totLectHr` int(11) DEFAULT NULL,
  `practHr` int(11) DEFAULT NULL,
  `totPractHr` int(11) DEFAULT NULL,
  `submitStatus` bit(1) DEFAULT NULL,
  `submitTime` datetime(6) DEFAULT NULL,
  `DQAapproved` bit(1) DEFAULT NULL,
  `HODcommentTea` varchar(100) DEFAULT NULL,
  `HODcommentDqa` varchar(100) DEFAULT NULL,
  `HODcommentAud` varchar(100) DEFAULT NULL,
  `classOrLab` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courseobjective`
--

CREATE TABLE `courseobjective` (
  `courseID` int(11) NOT NULL,
  `objNo` int(11) NOT NULL,
  `objName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courseobjectivel`
--

CREATE TABLE `courseobjectivel` (
  `courseID` int(11) NOT NULL,
  `objNo` int(11) NOT NULL,
  `objName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courseoutcome`
--

CREATE TABLE `courseoutcome` (
  `courseID` int(11) NOT NULL,
  `CO_no` varchar(5) NOT NULL,
  `CO_name` varchar(400) NOT NULL,
  `weightagePercent` int(11) DEFAULT NULL,
  `durationHr` int(11) DEFAULT NULL,
  `noOfExp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courseoutcomel`
--

CREATE TABLE `courseoutcomel` (
  `courseID` int(11) NOT NULL,
  `CO_no` varchar(5) NOT NULL,
  `CO_name` varchar(250) NOT NULL,
  `weightagePercent` int(11) DEFAULT NULL,
  `durationHr` int(11) DEFAULT NULL,
  `noOfExp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coursetopics`
--

CREATE TABLE `coursetopics` (
  `courseID` int(11) NOT NULL,
  `chp_expNo` int(11) NOT NULL,
  `chp_expTopic` varchar(500) NOT NULL,
  `CO_meet` varchar(5) NOT NULL,
  `chp_exp_weightage` int(11) DEFAULT NULL,
  `duration` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coursetopicsl`
--

CREATE TABLE `coursetopicsl` (
  `courseID` int(11) NOT NULL,
  `chp_expNo` int(11) NOT NULL,
  `chp_expTopic` varchar(250) NOT NULL,
  `CO_meet` varchar(5) NOT NULL,
  `chp_exp_weightage` int(11) DEFAULT NULL,
  `duration` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_admin`
--

CREATE TABLE `course_admin` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tea_username` varchar(50) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `division` varchar(2) NOT NULL,
  `year` varchar(8) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_admin`
--

INSERT INTO `course_admin` (`id`, `name`, `tea_username`, `subject_name`, `division`, `year`, `role`) VALUES
(1, '', '', '', '', '2021', 'class'),
(2, '', '', '', '', '2021', 'class'),
(3, '', '', '', '', '2021', 'class');

-- --------------------------------------------------------

--
-- Table structure for table `co_po_mapping`
--

CREATE TABLE `co_po_mapping` (
  `courseID` int(10) NOT NULL,
  `CO_no` varchar(5) NOT NULL,
  `PO_no` varchar(5) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `co_po_mappingl`
--

CREATE TABLE `co_po_mappingl` (
  `courseID` int(10) NOT NULL,
  `CO_no` varchar(5) NOT NULL,
  `PO_no` varchar(5) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `co_pso_mapping`
--

CREATE TABLE `co_pso_mapping` (
  `courseID` int(10) NOT NULL,
  `CO_no` varchar(5) NOT NULL,
  `PSO_no` varchar(5) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_pso_mappingl`
--

CREATE TABLE `co_pso_mappingl` (
  `courseID` int(10) NOT NULL,
  `CO_no` varchar(5) NOT NULL,
  `PSO_no` varchar(5) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dqa`
--

CREATE TABLE `dqa` (
  `courseID` int(20) NOT NULL,
  `courseDetails` varchar(5) NOT NULL,
  `courseDetailsSugg` varchar(250) DEFAULT NULL,
  `courseObj` varchar(5) NOT NULL,
  `courseObjSugg` varchar(250) DEFAULT NULL,
  `courseOut` varchar(5) NOT NULL,
  `courseOutSugg` varchar(250) DEFAULT NULL,
  `progOut` varchar(5) NOT NULL,
  `progOutSugg` varchar(250) DEFAULT NULL,
  `m_copo` varchar(5) NOT NULL,
  `m_copoSugg` varchar(250) DEFAULT NULL,
  `pso` varchar(5) NOT NULL,
  `psoSugg` varchar(250) DEFAULT NULL,
  `m_copso` varchar(5) NOT NULL,
  `m_copsoSugg` varchar(250) DEFAULT NULL,
  `courseWeig` varchar(5) NOT NULL,
  `courseWeigSugg` varchar(250) DEFAULT NULL,
  `chpPlan` varchar(5) NOT NULL,
  `chpPlanSugg` varchar(250) DEFAULT NULL,
  `lesPlan` varchar(5) NOT NULL,
  `lesPlanSugg` varchar(250) DEFAULT NULL,
  `ia` varchar(5) NOT NULL,
  `iaSugg` varchar(250) DEFAULT NULL,
  `btLevel` varchar(5) NOT NULL,
  `grammar` varchar(5) NOT NULL,
  `finalSugg` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dqal`
--

CREATE TABLE `dqal` (
  `courseID` int(20) NOT NULL,
  `courseDetails` varchar(5) NOT NULL,
  `courseDetailsSugg` varchar(250) DEFAULT NULL,
  `courseObj` varchar(5) NOT NULL,
  `courseObjSugg` varchar(250) DEFAULT NULL,
  `courseOut` varchar(5) NOT NULL,
  `courseOutSugg` varchar(250) DEFAULT NULL,
  `progOut` varchar(5) NOT NULL,
  `progOutSugg` varchar(250) DEFAULT NULL,
  `m_copo` varchar(5) NOT NULL,
  `m_copoSugg` varchar(250) DEFAULT NULL,
  `pso` varchar(5) NOT NULL,
  `psoSugg` varchar(250) DEFAULT NULL,
  `m_copso` varchar(5) NOT NULL,
  `m_copsoSugg` varchar(250) DEFAULT NULL,
  `courseWeig` varchar(5) NOT NULL,
  `courseWeigSugg` varchar(250) DEFAULT NULL,
  `chpPlan` varchar(5) NOT NULL,
  `chpPlanSugg` varchar(250) DEFAULT NULL,
  `lesPlan` varchar(5) NOT NULL,
  `lesPlanSugg` varchar(250) DEFAULT NULL,
  `ia` varchar(5) NOT NULL,
  `iaSugg` varchar(250) DEFAULT NULL,
  `btLevel` varchar(5) NOT NULL,
  `grammar` varchar(5) NOT NULL,
  `finalSugg` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dqateam`
--

CREATE TABLE `dqateam` (
  `courseID` int(11) NOT NULL,
  `BTlevel` bit(1) DEFAULT NULL,
  `grammar` bit(1) DEFAULT NULL,
  `commentCO` varchar(250) DEFAULT NULL,
  `properDistriMap` bit(1) DEFAULT NULL,
  `commentMap` varchar(250) DEFAULT NULL,
  `syllabusCoverage` bit(1) DEFAULT NULL,
  `COweightage` bit(1) DEFAULT NULL,
  `chp_expWeightage` bit(1) DEFAULT NULL,
  `commentWeightage` varchar(250) DEFAULT NULL,
  `CO_coverageAssMethod` bit(1) DEFAULT NULL,
  `marksDistribution` bit(1) DEFAULT NULL,
  `QuestionQuality` varchar(50) DEFAULT NULL,
  `commentAssMethod` varchar(250) DEFAULT NULL,
  `typeOfExp` varchar(50) DEFAULT NULL,
  `timeJustified` bit(1) DEFAULT NULL,
  `modernToolsUsed` bit(1) DEFAULT NULL,
  `OutOfSyllabus` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `experimentlist`
--

CREATE TABLE `experimentlist` (
  `courseID` int(20) NOT NULL,
  `expNo` int(20) NOT NULL,
  `CO_no` varchar(20) NOT NULL,
  `expName` varchar(100) NOT NULL,
  `weight` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tea_username` varchar(50) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `reply` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hodfeedback`
--

CREATE TABLE `hodfeedback` (
  `courseID` int(10) NOT NULL,
  `division` varchar(2) DEFAULT NULL,
  `teaType` varchar(10) DEFAULT NULL,
  `teacher` varchar(250) DEFAULT NULL,
  `dqaTeam` varchar(250) DEFAULT NULL,
  `audit1` varchar(250) DEFAULT NULL,
  `audit2` varchar(250) DEFAULT NULL,
  `auditor1` varchar(250) DEFAULT NULL,
  `auditor2` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hodhomee`
--

CREATE TABLE `hodhomee` (
  `courseID` int(10) NOT NULL,
  `tea_username` varchar(50) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  `teaType` varchar(20) NOT NULL,
  `audType` varchar(20) NOT NULL,
  `division` varchar(2) NOT NULL,
  `year` int(5) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `dqa` varchar(20) DEFAULT NULL,
  `intAudit` varchar(20) DEFAULT NULL,
  `teacherInt` varchar(20) NOT NULL,
  `intAuditII` varchar(20) NOT NULL DEFAULT 'Napproved',
  `teacherIntII` varchar(20) NOT NULL DEFAULT 'Nsubmitted',
  `extAudit` varchar(20) NOT NULL,
  `hod` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hodhomel`
--

CREATE TABLE `hodhomel` (
  `courseID` int(20) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `auditorSheet` varchar(20) NOT NULL DEFAULT 'Nsubmitted',
  `dqa` varchar(20) DEFAULT NULL,
  `intAudit` varchar(20) DEFAULT NULL,
  `teacherInt` varchar(20) NOT NULL,
  `intAuditII` varchar(20) NOT NULL DEFAULT 'Napproved',
  `teacherIntII` varchar(20) NOT NULL DEFAULT 'Nsubmitted',
  `extAudit` varchar(20) NOT NULL,
  `hod` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hodhometea`
--

CREATE TABLE `hodhometea` (
  `courseID` int(20) NOT NULL,
  `teacher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hodhometeal`
--

CREATE TABLE `hodhometeal` (
  `courseID` int(50) NOT NULL,
  `teacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hod_feedback`
--

CREATE TABLE `hod_feedback` (
  `courseID` int(10) NOT NULL,
  `teacher` varchar(250) DEFAULT NULL,
  `dqaTeam` varchar(250) DEFAULT NULL,
  `intAudit` varchar(250) DEFAULT NULL,
  `extAudit` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hod_feedbackl`
--

CREATE TABLE `hod_feedbackl` (
  `courseID` int(10) NOT NULL,
  `teacher` varchar(250) DEFAULT NULL,
  `dqaTeam` varchar(250) DEFAULT NULL,
  `intAudit` varchar(250) DEFAULT NULL,
  `extAudit` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ia`
--

CREATE TABLE `ia` (
  `courseID` int(5) NOT NULL,
  `term` varchar(10) NOT NULL,
  `qNo` varchar(2) NOT NULL,
  `CO_no` varchar(5) NOT NULL,
  `marks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ial`
--

CREATE TABLE `ial` (
  `courseID` int(5) NOT NULL,
  `term` varchar(10) NOT NULL,
  `qNo` varchar(2) NOT NULL,
  `CO_no` varchar(5) NOT NULL,
  `marks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lessonplan`
--

CREATE TABLE `lessonplan` (
  `courseID` int(11) NOT NULL,
  `weekNo` int(11) NOT NULL,
  `lectNo` int(11) NOT NULL,
  `subTopics` varchar(650) DEFAULT NULL,
  `CO_meet` varchar(5) DEFAULT NULL,
  `weightage` float DEFAULT NULL,
  `teachingMethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lessonplanl`
--

CREATE TABLE `lessonplanl` (
  `courseID` int(11) NOT NULL,
  `weekNo` int(11) NOT NULL,
  `lectNo` int(11) NOT NULL,
  `subTopics` varchar(250) DEFAULT NULL,
  `CO_meet` varchar(5) DEFAULT NULL,
  `weightage` float DEFAULT NULL,
  `teachingMethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progoutcomes`
--

CREATE TABLE `progoutcomes` (
  `courseID` int(11) NOT NULL,
  `PO_no` varchar(5) NOT NULL,
  `PO_title` varchar(50) DEFAULT NULL,
  `PO_description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progoutcomesl`
--

CREATE TABLE `progoutcomesl` (
  `courseID` int(11) NOT NULL,
  `PO_no` varchar(5) NOT NULL,
  `PO_title` varchar(50) DEFAULT NULL,
  `PO_description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progspecificoutcome`
--

CREATE TABLE `progspecificoutcome` (
  `courseID` int(11) NOT NULL,
  `PSO_no` varchar(5) NOT NULL,
  `PSO_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progspecificoutcomel`
--

CREATE TABLE `progspecificoutcomel` (
  `courseID` int(11) NOT NULL,
  `PSO_no` varchar(5) NOT NULL,
  `PSO_description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(50) NOT NULL,
  `code` int(8) NOT NULL,
  `mobile_no` int(10) DEFAULT NULL,
  `dept` varchar(30) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `code`, `mobile_no`, `dept`, `last_login`) VALUES
(1, 'Tushar Ghorpade', 'tushar@fas', 'tushar', 'teacher', 0, 1234567892, 'CE', '0000-00-00 00:00:00'),
(2, 'Shilpa Shinde', 'shilpa@fas', 'shilpa', 'teacher', 0, 1234567891, 'CE', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audcomment`
--
ALTER TABLE `audcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `coursel`
--
ALTER TABLE `coursel`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `course_admin`
--
ALTER TABLE `course_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audcomment`
--
ALTER TABLE `audcomment`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coursel`
--
ALTER TABLE `coursel`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_admin`
--
ALTER TABLE `course_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
