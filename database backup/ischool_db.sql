-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 06:42 PM
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
-- Database: `ischool_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminPass`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `courseName` text NOT NULL,
  `courseDesc` text NOT NULL,
  `courseAuthor` varchar(255) NOT NULL,
  `courseImg` text NOT NULL,
  `courseDuration` text NOT NULL,
  `coursePrice` int(11) NOT NULL,
  `courseOriginalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `courseDesc`, `courseAuthor`, `courseImg`, `courseDuration`, `coursePrice`, `courseOriginalPrice`) VALUES
(48, '   A Deep Introduction to Programming', 'This course for guys who have 0 programming knowledge but are willing to jump into this fascinating journey of programming. The main goal of this phase is to LEARN HOW TO FEEL AND VISUALISE PROGRAMMING AND UNDERSTAND WHY THEY SAY \"PROGRAMMING IS FUN\".', '   Mehedi Hasan Sajjat', '../image/courseImage/algo-og.jpg', '   9 weeks', 2499, 2999),
(49, 'Deeeep Dive into Problem Solving and Competitive Programming', 'This is the second phase of the \"A Complete Guideline to Competitive Programming\" series. In this phase, you will learn deeply about all sorts of topics.', 'Mehedi Hasan Sajjat', '../image/courseImage/competitive_programming_1.png', '12 weeks', 3000, 3499),
(51, ' Lean HTML in effective way', 'This HTML course is excellent for beginners. The interactive approach to learning makes it engaging and enjoyable.', ' Mehedi Hasan Sajjat', '../image/courseImage/html1.jpg', ' 4 weeks', 1000, 1499),
(52, 'Bootstrap', 'If you want to quickly create a website without writing tons of CSS from scratch, then Bootstrap 4 might be the framework you’re looking for. In this course, you’ll see how Bootstrap makes it easy to layout and create interactive and responsive sites.', 'Mehedi Hasan Sajjat', '../image/courseImage/bootstrap-logo.png', '4 weeks', 1199, 1399);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `coId` int(11) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `stuEmail` varchar(255) NOT NULL,
  `courseID` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `cardType` text NOT NULL,
  `amount` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `tnxId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`coId`, `orderId`, `stuEmail`, `courseID`, `status`, `cardType`, `amount`, `orderDate`, `tnxId`) VALUES
(44, 'ORDS93902527', 'sajjat@gmail.com', '48', 'VALID', 'BKASH-BKash', 2499, '2023-07-18', 'SSLCZ_TEST_64b6920e4119a'),
(46, 'ORDS28368328', 'adeeb@gmail.com', '51', 'VALID', 'BANKASIA-Bank Asia Internet Banking', 1000, '2023-07-18', 'SSLCZ_TEST_64b693307da2b'),
(47, 'ORDS67124108', 'adeeb@gmail.com', '52', 'VALID', 'CITYBANKIB-City Bank', 1199, '2023-07-18', 'SSLCZ_TEST_64b6934107a28'),
(49, 'ORDS30963946', 'sajjat@gmail.com', '49', 'VALID', 'BKASH-BKash', 3000, '2023-07-18', 'SSLCZ_TEST_64b69d6c3a82b');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fId` int(11) NOT NULL,
  `fContent` text NOT NULL,
  `stuId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fId`, `fContent`, `stuId`) VALUES
(4, 'HTML course is excellent for beginners. The interactive approach to learning makes it engaging and enjoyable, and the course is structured in a way that is easy to follow. Overall, I highly recommend the course to anyone looking to learn web development.', '21'),
(5, 'This CSS course is rich and well-structured to give students a very strong foundation. It gives me the opportunity to learn by doing which is one of the key ways to assimilate during the learning process. 100% thumbs up!\r\n', '22'),
(6, '\r\nWell-designed course. For me Bootstrap was like a maze, after taking this course, I feel very comfortable with Bootstrap. It also made me understand the strength of Bootstrap in website development.', '23');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lessonId` int(11) NOT NULL,
  `lessonName` text NOT NULL,
  `lessonDesc` text NOT NULL,
  `lessonLink` text NOT NULL,
  `courseID` int(11) NOT NULL,
  `courseName` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lessonId`, `lessonName`, `lessonDesc`, `lessonLink`, `courseID`, `courseName`) VALUES
(8, ' Introduction and overview', 'Introduction of competitive programming and basic concept of C programming languages', '../video/lessonVideo/nature2.mp4', 48, '     A Deep'),
(9, 'Overflow and Infinite Loop', 'Here we will discuss about the overflow and different types of loops', '../video/lessonVideo/flower.mp4', 48, '    A Deep '),
(10, 'Codeforces & problem solving', 'This lecture about the codeforces online judge and introduction to problem solving.', '../video/lessonVideo/birds1.mp4', 48, '    A Deep '),
(11, 'Number theory & math', 'This lecture about the number theory and different math topics related to the competitive programming', '../video/lessonVideo/nature2.mp4', 49, ' Deeeep Div'),
(12, 'Data structure', 'This lecture about the different type of data structure like stack, queue, dqueue, linkedlist etc', '../video/lessonVideo/flower.mp4', 49, ' Deeeep Div'),
(13, 'Graph theory', 'This lecture about the graph theory', '../video/lessonVideo/birds2.mp4', 49, ' Deeeep Div'),
(14, 'Elements and Structure', 'Learn about HTML elements and structure, the building blocks of websites.', '../video/lessonVideo/flower.mp4', 51, '  Lean HTML'),
(15, 'Tables', 'Learn all the syntax you need to create tables in your HTML documents.', '../video/lessonVideo/nature2.mp4', 51, '  Lean HTML'),
(16, 'Forms', 'Learn how to create your own form and integrate HTML5 validations.', '../video/lessonVideo/birds2.mp4', 51, '  Lean HTML'),
(17, 'Bootstrap 5 Grids', 'This lecture is all about bootstrap grids.', '../video/lessonVideo/flower.mp4', 52, ' Bootstrap'),
(18, 'Bootstrap 5 Dropdowns', 'This lecture is about dropdown menubar / sidebar', '../video/lessonVideo/nature2.mp4', 52, ' Bootstrap'),
(19, 'Bootstrap 5 Buttons', 'This lecture about bootstrap button styles and their uses', '../video/lessonVideo/birds1.mp4', 52, ' Bootstrap'),
(20, 'Bootstrap 5 Buttons', 'This lecture about bootstrap button styles and their uses', '../video/lessonVideo/birds1.mp4', 52, ' Bootstrap');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stuId` int(11) NOT NULL,
  `stuName` varchar(255) NOT NULL,
  `stuEmail` varchar(255) NOT NULL,
  `stuPass` varchar(255) NOT NULL,
  `stuOcc` varchar(255) NOT NULL,
  `stuImg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stuId`, `stuName`, `stuEmail`, `stuPass`, `stuOcc`, `stuImg`) VALUES
(21, ' sajjat', 'sajjat@gmail.com', 'sajjat', ' student', '../image/stuImage/sajjat.jpg'),
(22, ' mezba', 'mezba@gmail.com', 'mezba', ' student', '../image/stuImage/mezba.jpg'),
(23, ' adeeb', 'adeeb@gmail.com', 'adeeb', ' student', '../image/stuImage/adeeb.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`coId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fId`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lessonId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `coId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lessonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
