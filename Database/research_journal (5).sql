-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 06:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_journal`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `Author ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Contact` int(12) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Author ID`, `Name`, `Contact`, `Email`, `Password`) VALUES
(1, 'auth1', 4758, 'auth@12', '456'),
(3, 'Prajjal', 748911, 'p@m', '1'),
(5, 'ankit', 88, 'dd@ss', '1');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `Editor ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Contact` int(12) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`Editor ID`, `Name`, `Contact`, `Email`, `Password`) VALUES
(1, 'Editor1', 124, 'edtor@12', '789'),
(2, 'Ankit Sha', 9332, 'edtor@15', '9330'),
(3, 'Nabendu', 798879789, 'uiiujk@595', '44546'),
(36, 'Ankit', 88, 'a@s', '2');

-- --------------------------------------------------------

--
-- Table structure for table `manuscript submission`
--

CREATE TABLE `manuscript submission` (
  `Manuscript ID` int(11) NOT NULL,
  `Author ID` int(11) NOT NULL,
  `Submission Date` date NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 0,
  `Manu Name` varchar(200) NOT NULL,
  `Description` varchar(256) NOT NULL,
  `FileContent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manuscript submission`
--

INSERT INTO `manuscript submission` (`Manuscript ID`, `Author ID`, `Submission Date`, `Status`, `Manu Name`, `Description`, `FileContent`) VALUES
(3, 1, '2024-01-01', 0, 'Social Connection And Mortality In UK Biobank: A Prospective Cohort Analysis', 'Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Quis Sint Suscipit Vel Repudiandae Nisi. Pariatur Culpa Atque Ducimus Incidunt Nesciunt Dicta Iusto. Voluptates Ullam Vitae Minima, Doloribus Aliquid Omnis Eveniet, Nam Dolor Doloremque Minus Repell', ''),
(4, 1, '2023-11-07', 2, 'A New Course on R&D Project Management in Computer Science and Engineering: Subjects Taught, Rationales Behind, and Lessons Learned', 'Some research papers provide insight into full solutions when no backhaul is available, providing inter-eNB connectivity because of WiFi links and including D2D communications that were not yet defined by the ProSe specifications of 3GPP studies [GOM 14]. ', ''),
(5, 1, '2023-11-01', -1, 'How to Write a Research Paper | A Beginner\'s Guide', 'Research papers are similar to academic essays, but they are usually longer and more detailed assignments, designed to assess not only your writing skills but also your skills in scholarly research. Writing a research paper requires you to demonstrate a st', ''),
(17, 3, '2024-01-13', 0, 'BBBB', 'CCCC', 'Group06_P2_Documentation (2) (1).pdf'),
(18, 3, '2024-01-13', 0, 'CCCC', 'DDDD', 'research_journal (2) (1).sql');

-- --------------------------------------------------------

--
-- Table structure for table `manuscript_review`
--

CREATE TABLE `manuscript_review` (
  `Comment_ID` int(11) NOT NULL,
  `Manuscript ID` int(11) NOT NULL,
  `Reviewer ID` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manuscript_review`
--

INSERT INTO `manuscript_review` (`Comment_ID`, `Manuscript ID`, `Reviewer ID`, `Comment`, `status`) VALUES
(3, 4, 4, '                    okk ut another comment  JDGAJSDAJDSG                  ', 2),
(4, 4, 3, '                                  asdfasfd good      ', 2),
(5, 3, 3, '                                   hhhh     ', 1),
(6, 3, 3, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manuscript_subject`
--

CREATE TABLE `manuscript_subject` (
  `manuscript_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manuscript_subject`
--

INSERT INTO `manuscript_subject` (`manuscript_id`, `subject`) VALUES
(3, 'History'),
(4, 'Geography'),
(4, 'History'),
(17, 'Geography'),
(18, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `Reviewer ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Grade Points` int(5) NOT NULL DEFAULT 0,
  `Availability` tinyint(1) NOT NULL DEFAULT 0,
  `Topic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`Reviewer ID`, `Name`, `Contact`, `Password`, `Email`, `Grade Points`, `Availability`, `Topic`) VALUES
(3, 'Reviewer1', '456', '456', 'rev@12', 0, 1, 'history'),
(4, 'Reviewer2', '456', '456', 'rev2@12', 0, 1, 'Geography');

-- --------------------------------------------------------

--
-- Table structure for table `review_request_temp`
--

CREATE TABLE `review_request_temp` (
  `Manuscript ID` int(11) NOT NULL,
  `Reviewer ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Author ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`Editor ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Email_2` (`Email`);

--
-- Indexes for table `manuscript submission`
--
ALTER TABLE `manuscript submission`
  ADD PRIMARY KEY (`Manuscript ID`),
  ADD KEY `Author ID` (`Author ID`);

--
-- Indexes for table `manuscript_review`
--
ALTER TABLE `manuscript_review`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `Reviewer ID` (`Reviewer ID`),
  ADD KEY `Manuscript ID` (`Manuscript ID`);

--
-- Indexes for table `manuscript_subject`
--
ALTER TABLE `manuscript_subject`
  ADD PRIMARY KEY (`manuscript_id`,`subject`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`Reviewer ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Email_2` (`Email`);

--
-- Indexes for table `review_request_temp`
--
ALTER TABLE `review_request_temp`
  ADD PRIMARY KEY (`Manuscript ID`,`Reviewer ID`),
  ADD KEY `Reviewer ID` (`Reviewer ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `Author ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `Editor ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `manuscript submission`
--
ALTER TABLE `manuscript submission`
  MODIFY `Manuscript ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `manuscript_review`
--
ALTER TABLE `manuscript_review`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `Reviewer ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manuscript submission`
--
ALTER TABLE `manuscript submission`
  ADD CONSTRAINT `manuscript submission_ibfk_1` FOREIGN KEY (`Author ID`) REFERENCES `author` (`Author ID`);

--
-- Constraints for table `manuscript_review`
--
ALTER TABLE `manuscript_review`
  ADD CONSTRAINT `manuscript_review_ibfk_1` FOREIGN KEY (`Reviewer ID`) REFERENCES `reviewer` (`Reviewer ID`),
  ADD CONSTRAINT `manuscript_review_ibfk_2` FOREIGN KEY (`Manuscript ID`) REFERENCES `manuscript submission` (`Manuscript ID`);

--
-- Constraints for table `manuscript_subject`
--
ALTER TABLE `manuscript_subject`
  ADD CONSTRAINT `manuscript_subject_ibfk_1` FOREIGN KEY (`manuscript_id`) REFERENCES `manuscript submission` (`Manuscript ID`);

--
-- Constraints for table `review_request_temp`
--
ALTER TABLE `review_request_temp`
  ADD CONSTRAINT `review_request_temp_ibfk_1` FOREIGN KEY (`Manuscript ID`) REFERENCES `manuscript submission` (`Manuscript ID`),
  ADD CONSTRAINT `review_request_temp_ibfk_2` FOREIGN KEY (`Reviewer ID`) REFERENCES `reviewer` (`Reviewer ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
