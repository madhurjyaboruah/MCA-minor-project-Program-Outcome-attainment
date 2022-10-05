-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2021 at 07:50 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poco`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `course_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `course_code` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `p_fk` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `program_id`, `course_name`, `course_code`) VALUES
(2, 1, 'PPS', 'CS504'),
(3, 1, 'DBMS', 'CS102'),
(4, 1, 'OOPD', 'CS392'),
(5, 1, 'DAA', 'CS555'),
(15, 1, 'CN', 'CS432'),
(16, 1, 'OOPD', 'CS290');

-- --------------------------------------------------------

--
-- Table structure for table `course_outcome`
--

DROP TABLE IF EXISTS `course_outcome`;
CREATE TABLE IF NOT EXISTS `course_outcome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `co_title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_outcome`
--

INSERT INTO `course_outcome` (`id`, `course_id`, `co_title`, `description`) VALUES
(1, 3, 'CO1', 'Broad Understanding of how to Create and manage a database using RDBMS like Oracle. \r\n'),
(2, 3, 'CO2', 'Perform queries on the database. '),
(3, 3, 'CO3', 'have a high-level understanding of major DBMS components and their function'),
(4, 3, 'CO4', 'Develop database applications. \r\n'),
(5, 4, 'CO1', 'knowledge'),
(6, 4, 'CO2', 'understanding'),
(7, 16, 'CO1', 'knowledge'),
(8, 16, 'CO2', 'understand'),
(9, 16, 'CO3', 'Apply');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

DROP TABLE IF EXISTS `course_student`;
CREATE TABLE IF NOT EXISTS `course_student` (
  `course_id` int(11) NOT NULL,
  `student_id` int(30) NOT NULL,
  UNIQUE KEY `course_id` (`course_id`,`student_id`),
  KEY `student_id` (`student_id`),
  KEY `course_id_2` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`course_id`, `student_id`) VALUES
(3, 10),
(15, 10),
(16, 10),
(3, 545),
(15, 545),
(16, 545);

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

DROP TABLE IF EXISTS `course_teacher`;
CREATE TABLE IF NOT EXISTS `course_teacher` (
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_teacher`
--

INSERT INTO `course_teacher` (`teacher_id`, `course_id`) VALUES
(3, 3),
(1, 15),
(9, 16);

-- --------------------------------------------------------

--
-- Table structure for table `programe`
--

DROP TABLE IF EXISTS `programe`;
CREATE TABLE IF NOT EXISTS `programe` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `program_duration` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `programe`
--

INSERT INTO `programe` (`program_id`, `program_name`, `program_duration`) VALUES
(1, 'MCA', '3'),
(2, 'BTech CSE', '4'),
(3, 'MTech IT', '2'),
(4, 'phd', '5');

-- --------------------------------------------------------

--
-- Table structure for table `program_outcome`
--

DROP TABLE IF EXISTS `program_outcome`;
CREATE TABLE IF NOT EXISTS `program_outcome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `po_title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `program_fk` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_outcome`
--

INSERT INTO `program_outcome` (`id`, `program_id`, `po_title`, `description`) VALUES
(1, 1, 'CO1', 'Graduates will apply domain knowledge, abstraction and conceptualization of computing \r\nmodels from defined problems and requirements. '),
(2, 1, 'CO2', 'Graduates will be able to design experiments, analyse and interpret data, solve complex \r\ncomputing problems and synthesize the information to provide valid conclusions by creating, \r\nselecting, adapting and applying appropriate techniques, resources, and modern computing \r\ntools with an understanding of the limitations. '),
(3, 1, 'CO3', 'Graduates will be able to communicate effectively with the computing community, and with \r\nsociety at large, about complex computing activities by being able to comprehend and write \r\neffective reports, design documentation, make effective presentations, and give and \r\nunderstand clear instructions. ');

-- --------------------------------------------------------

--
-- Table structure for table `question_co`
--

DROP TABLE IF EXISTS `question_co`;
CREATE TABLE IF NOT EXISTS `question_co` (
  `question_id` int(11) NOT NULL,
  `co_title` varchar(20) NOT NULL,
  KEY `qid_fk` (`question_id`,`co_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_co`
--

INSERT INTO `question_co` (`question_id`, `co_title`) VALUES
(7, 'CO1'),
(7, 'CO2'),
(8, 'CO2'),
(8, 'CO3'),
(9, 'CO2'),
(9, 'CO3'),
(12, 'CO3'),
(13, 'CO1'),
(13, 'CO3'),
(14, 'CO1'),
(14, 'CO3'),
(15, 'CO2'),
(15, 'CO4');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `roll` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `fathername` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `mothername` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `program_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `startyear` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `endyear` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `saddress` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `sstate` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `pincode` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`user_id`),
  KEY `st_fk` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=547 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `program_id`, `user_id`, `student_name`, `roll`, `fathername`, `mothername`, `dob`, `gender`, `program_name`, `startyear`, `endyear`, `saddress`, `city`, `sstate`, `pincode`, `country`, `mobile`) VALUES
(10, 1, 111, 'Madhurjya Boruah', 'CSM19033', 'Buddha Boruah', 'Ranu Gogoi', '2021-11-17', 'Male', 'MCA', '2019', '2022', 'xz', 'zx', 'zx', 'zx', 'zx', '7893485548'),
(545, 1, 115, 'Dhrubanka  Chutia', 'CSM19016', 'aa', 'aa', '2021-11-05', 'Male', 'MCA', '2019', '2022', 'aaa', 'aa', 'aa', 'aa', 'aa', '70077873783'),
(546, 2, 118, 'Satyajit Das', 'CSB18007', '', '', '1997-06-04', 'Male', 'CSE', '2017', '2021', '', '', '', '', '', '9101080811');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `teacher_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `teacher_age` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `teacher_designation` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `user_id`, `teacher_name`, `teacher_age`, `teacher_designation`, `gender`, `mobile`) VALUES
(1, 25, 'Dr. ABC', '2021-10-07', 'Professor', 'Male', 'xxx'),
(2, 29, 'deba2', '2021-09-27', 'Asst. Professor', 'Male', '234234'),
(3, 59, 'asd', '2021-10-16', 'Professor', 'Male', '13424'),
(4, 60, 'adk', '2021-10-07', 'Professor', 'Male', '23234'),
(9, 117, 'xyz', '2021-12-02', 'asst. professor', 'Male', '9101080811');

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

DROP TABLE IF EXISTS `test_details`;
CREATE TABLE IF NOT EXISTS `test_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `test_name` varchar(30) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`id`, `course_id`, `test_name`, `total_marks`, `total_questions`) VALUES
(1, 4, 'dsd11', 11, 11),
(2, 4, 'wew', 12, 12),
(4, 3, 'test1', 20, 5),
(5, 3, 'test2', 20, 10),
(6, 16, 'test1', 20, 5),
(7, 16, 'test2', 20, 5),
(9, 3, 'test3', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `test_element`
--

DROP TABLE IF EXISTS `test_element`;
CREATE TABLE IF NOT EXISTS `test_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `qus_number` varchar(20) NOT NULL,
  `question` varchar(100) NOT NULL,
  `total_marks` varchar(20) NOT NULL,
  `waitage` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `fk_course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_element`
--

INSERT INTO `test_element` (`id`, `test_id`, `course_id`, `qus_number`, `question`, `total_marks`, `waitage`) VALUES
(7, 6, 16, 'Q1', ' What is the difference between a class and a structure?', '4', '60%'),
(8, 6, 16, 'Q2', 'what is OOP?', '4', '60%'),
(9, 6, 16, 'Q3', 'What are the limitations of inheritance?', '3', '50%'),
(12, 4, 3, 'Q1', ' What is meant by DBMS and what is its utility? ', '4', '50%'),
(13, 4, 3, 'Q2', 'What is meant by ACID properties in DBMS?', '5', '60%'),
(14, 4, 3, 'Q3', 'What is meant by an entity-relationship (E-R) model? ', '4', '60%'),
(15, 4, 3, 'Q4', 'Explain the difference between the DELETE and TRUNCATE command in a DBMS.', '4', '50%');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`) VALUES
(1, 'John', 'Doe', 'john@example.com', 'student'),
(25, 'teacher', '123', 'xx', 'teacher'),
(59, 'abcd', '123', 'asdadsdfsdf', 'teacher'),
(60, 'test', 'test', 'jkdhsfkj', 'teacher'),
(61, 'qwee', 'lsdfjlksfj', 'jkdhsfkj', 'teacher'),
(62, 'EWQWEASDDsdsdf', 'sdf', 'sdf', 'teacher'),
(63, 'EWQWEASDDsdsdf', 'sdf', 'sdf', 'teacher'),
(64, 'EWQWEASDDsdsdf', 'sdf', 'sdf', 'teacher'),
(70, 'NABAJIT', 'NABA', 'NABA@GMAIL.COM', 'student'),
(99, 'admin', 'admin', 'admin', 'admin'),
(111, 'madhurjya', 'as', 'mad@123', 'student'),
(112, 'aas', 'a', 'asAS', 'student'),
(113, 'aas', 'a', 'asAS', 'student'),
(114, 'aas', 'a', 'asAS', 'student'),
(115, 'dhrubanka', '123', 'ds@gmail,com', 'student'),
(116, 'nisanta_mama', 'nikumama', 'nisanta@gmail.com', 'student'),
(117, 'xyz', '123', 'xyz@gmail.com', 'teacher'),
(118, 'Satyjit', '123', 'xyz@gmail.com', 'student');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programe` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_outcome`
--
ALTER TABLE `course_outcome`
  ADD CONSTRAINT `course_outcome_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD CONSTRAINT `course_teacher_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_teacher_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_outcome`
--
ALTER TABLE `program_outcome`
  ADD CONSTRAINT `program_outcome_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programe` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_co`
--
ALTER TABLE `question_co`
  ADD CONSTRAINT `question_co_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `test_element` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programe` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_details`
--
ALTER TABLE `test_details`
  ADD CONSTRAINT `test_details_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_element`
--
ALTER TABLE `test_element`
  ADD CONSTRAINT `test_element_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_element_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
