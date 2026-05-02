-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2025 at 07:33 AM
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
-- Database: `oevs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `CandidateID` int(11) NOT NULL,
  `abc` varchar(1) NOT NULL,
  `Position` varchar(200) NOT NULL,
  `Party` varchar(100) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `Qualification` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`CandidateID`, `abc`, `Position`, `Party`, `FirstName`, `LastName`, `MiddleName`, `Gender`, `Year`, `Photo`, `Qualification`) VALUES
(212, 'a', 'Governor', 'Team 1', 'Joseph', 'Santos', 'C', 'Male', '4th year', 'upload/Santos.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(205, 'v', 'Vice-President', 'Team 2', 'Eljohn', 'Miranda', 'G', 'Male', '4th year', 'upload/Miranda.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(204, 'v', 'Vice-President', 'Team 1', 'John Arnie ', 'Mariano', 'A', 'Male', '4th year', 'upload/Mariano.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(203, 'p', 'President', 'Team 2', 'Cristian', 'Fernandez', '', 'Male', '4th year', 'upload/Fernandez.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(202, 'p', 'President', 'Team 1', 'Kristopher Glenn', 'Martinez', '', 'Male', '4th year', 'upload/Martinez.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(207, 'a', 'Governor', 'Team 2', 'Don Emmanuel', 'Aluquin', '', 'Male', '4th year', 'upload/Aluquin.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(208, 'b', 'Vice-Governor', 'Team 1', 'Margarette', 'Roque', 'E', 'FeMale', '4th year', 'upload/Roque.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(213, 'b', 'Vice-Governor', 'Team 1', 'Kurt Angelo', 'Aragon', 'S', 'Male', '4th year', 'upload/Aragon.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(210, 's', 'Secretary', 'Team 1', 'Aeron Paul', 'Salipsip', '', 'Male', '4th year', 'upload/Salipsip.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(211, 's', 'Secretary', 'Team 2', 'Justine', 'Retiro', 'D', 'Male', '4th year', 'upload/Retiro.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(214, 't', 'Treasurer', 'Team 1', 'Vincent', 'Francisco', '', 'Male', '4th year', 'upload/Francisco.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(215, 't', 'Treasurer', 'Team 2', 'Jeff', 'Ladignon', '', 'Male', '4th year', 'upload/Ladignon.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(216, 's', 'Social-Media Officer', 'Team 1', 'Cyrell', 'Domingo', '', 'Male', '4th year', 'upload/Domingo.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(217, 's', 'Social-Media Officer', 'Team 2', 'Vincent', 'Unarce', '', 'Male', '4th year', 'upload/Unarce.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(218, 'r', 'Representative', 'Team 1', 'Amiel Angelo', 'Villanueva', '', 'Male', '4th year', 'upload/Villanueva.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(222, 'p', 'President', 'Team 2', 'John Cedrick', 'Melegrito', 'A', 'Male', '4th year', 'upload/Melegrito.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(223, 'p', 'President', 'Team 1', 'Adrianne Aebes', 'Maligaya', 'Q', 'Male', '4th year', 'upload/Maligaya.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(224, 'v', 'Vice-President', 'Team 2', 'John Riel', 'Parcasio', 'N', 'Male', '4th year', 'upload/Parcasio.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(225, 'b', 'Vice-Governor', 'Team 1', 'Sharmaine', 'Blanca', '', 'FeMale', '4th year', 'upload/Blanca.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(226, 's', 'Secretary', 'Team 1', 'David Tristan', 'Bernal', 'M', 'Male', '4th year', 'upload/Bernal.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(227, 'b', 'Vice-Governor', 'Team 2', 'Ma.Alyssa', 'Sevilla', '', 'FeMale', '4th year', 'upload/Sevilla.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(228, 'b', 'Vice-Governor', 'Team 2', 'Erika Lorraine', 'Frliciano', '', 'FeMale', '4th year', 'upload/Frliciano.jpg', ''),
(229, 't', 'Treasurer', 'Team 1', 'Lanz Andrei', 'Molina', 'T', 'Male', '4th year', 'upload/Molina.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(230, 'v', 'Vice-President', 'Team 2', 'Jerald', 'Torrs', '', 'Male', '4th year', 'upload/Torrs.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(231, 's', 'Social-Media Officer', 'Team 1', 'Jessica', 'Villabriga', '', 'FeMale', '4th year', 'upload/Villabriga.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.'),
(232, 'p', 'President', 'Team 1', 'Franz Andrei ', 'Villasquez', '', 'Male', '4th year', 'upload/Villasquez.jpg', 'I am a currently enrolled student with a strong academic record, maintaining a general weighted average of 85% or higher. I have no disciplinary issues and am an active participant in various school activities and organizations. I have demonstrated leadership skills through previous roles and possess relevant experience related to the position I am running for. I am committed to serving my peers with dedication, responsibility, and integrity.');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `voterID` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','in_progress','resolved') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Username` varchar(100) NOT NULL,
  `SchoolID` varchar(50) NOT NULL,
  `Year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `voterID`, `subject`, `description`, `status`, `created_at`, `updated_at`, `Username`, `SchoolID`, `Year`) VALUES
(10, 100, '1', 'Voting machines malfunctioned, causing long delays and confusion at polls.', 'pending', '2025-06-03 11:03:55', '2025-06-03 11:03:55', 'joan.mariano.au@phinmaed.com', '01-1234-12345', '4th year'),
(11, 96, '2', 'Some voters were turned away due to missing names on lists.', 'pending', '2025-06-03 11:05:27', '2025-06-03 11:05:27', 'jimz.aluquin.au@phinmaed.com', '01-1234-12345', '4th year'),
(12, 97, '3', 'Ballots were not properly secured, risking tampering during the counting.', 'pending', '2025-06-03 11:06:10', '2025-06-03 11:06:10', 'elgo.miranda.au@phinmaed.com', '01-1234-12345', '4th year'),
(13, 98, '4', 'Campaign materials were removed unfairly, limiting candidates’ chances to communicate.', 'resolved', '2025-06-03 11:07:03', '2025-06-03 11:25:32', 'don.aluquin.au@phinmaed.com', '01-1234-12345', '4th year'),
(14, 101, '5', 'Polling stations opened late, resulting in voters missing their chance.', 'in_progress', '2025-06-03 11:09:13', '2025-06-03 11:25:31', 'aeron.salipsip.au@phinmaed.com	', '01-1234-12345', '4th year');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `data` varchar(30) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `data`, `action`, `date`, `user`) VALUES
(793, 'Laydee Champagne', 'Login', '2025-05-26 16:41:40', 'admin'),
(792, 'Vincent Unarce', 'Added Voter', '5/26/2025 16:39:31', 'admin'),
(791, 'Jeff Ladignon', 'Added Voter', '5/26/2025 16:38:43', 'admin'),
(790, 'Aeron Paul Salipsip', 'Added Voter', '5/26/2025 16:38:6', 'admin'),
(789, 'Laydee Champagne', 'Login', '2025-05-26 16:38:03', 'admin'),
(788, 'Kat CSDL', 'Logout', '2025-05-26 16:37:48', 'admin'),
(787, 'Kat CSDL', 'Login', '2025-05-26 16:36:55', 'admin'),
(786, 'Kat CSDL', 'Logout', '2025-05-26 16:35:07', 'admin'),
(785, 'Kat CSDL', 'Login', '2025-05-26 16:34:51', 'admin'),
(784, 'Laydee Champagne', 'Logout', '2025-05-26 16:34:37', 'admin'),
(783, 'Amiel Villanueva', 'Added Voter', '5/26/2025 16:32:55', 'admin'),
(782, 'Jimmuel Aluquin', 'Added Voter', '5/26/2025 16:32:16', 'admin'),
(781, 'Don Aluquin', 'Added Voter', '5/26/2025 16:31:28', 'admin'),
(780, 'Eljohn Miranda', 'Added Voter', '5/26/2025 16:31:3', 'admin'),
(779, 'Jay Mariano', 'Added Voter', '5/26/2025 16:30:37', 'admin'),
(778, 'Joseph Santos', 'Added Voter', '5/26/2025 16:29:46', 'admin'),
(777, 'Laydee Champagne', 'Login', '2025-05-26 16:28:51', 'admin'),
(776, 'Kat CSDL', 'Logout', '2025-05-26 16:25:14', 'admin'),
(775, 'Kat CSDL', 'Login', '2025-05-26 16:24:59', 'admin'),
(794, 'Laydee Champagne', 'Added Voter', '5/27/2025 8:37:16', 'admin'),
(795, 'Laydee Champagne', 'Added Voter', '5/27/2025 8:37:56', 'admin'),
(796, 'Laydee Champagne', 'Login', '2025-06-01 18:10:44', 'admin'),
(797, 'Laydee Champagne', 'Logout', '2025-06-01 19:13:40', 'admin'),
(798, 'Laydee Champagne', 'Login', '2025-06-01 19:13:56', 'admin'),
(799, 'Laydee Champagne', 'Login', '2025-06-01 19:15:34', 'admin'),
(800, 'Laydee Champagne', 'Logout', '2025-06-01 19:20:35', 'admin'),
(801, 'Laydee Champagne', 'Login', '2025-06-03 17:09:31', 'admin'),
(802, 'Joseph FAFA', 'Added Candidate', '2025-06-03 17:15:27', 'admin'),
(803, 'ASDFA FAFA', 'Added Candidate', '2025-06-03 17:17:54', 'admin'),
(804, 'Joseph FAFA', 'Added Candidate', '2025-06-03 17:23:07', 'admin'),
(805, 'Joseph FAFA', 'Deleted Candidate', '6/3/2025 17:23:37', 'Admin'),
(806, '', 'Deleted Candidate', '6/3/2025 17:23:46', 'Admin'),
(807, 'Joseph FAFA', 'Edit Candidate', '2025-06-03 17:26:47', 'admin'),
(808, 'Joseph FAFA', 'Edit Candidate', '2025-06-03 17:27:22', 'admin'),
(809, 'Joseph FAFA', 'Edit Candidate', '2025-06-03 17:29:23', 'admin'),
(810, 'Joseph FAFA', 'Edit Candidate', '2025-06-03 17:29:26', 'admin'),
(811, 'Joseph FAFA', 'Edit Candidate', '2025-06-03 17:30:34', 'admin'),
(812, 'Joseph FAFA', 'Edit Candidate', '2025-06-03 17:30:44', 'admin'),
(813, 'Laydee Champagne', 'Login', '2025-06-03 17:36:51', 'admin'),
(814, 'Joseph FAFA', 'Deleted Candidate', '6/3/2025 18:8:50', 'Admin'),
(815, 'test test', 'Added Voter', '6/3/2025 18:9:6', 'admin'),
(816, 'test1 test1', 'Added Voter', '6/3/2025 18:9:24', 'admin'),
(817, 'test2 test2', 'Added Voter', '6/3/2025 18:9:42', 'admin'),
(818, ' ', 'Logout', '2025-06-03 18:20:05', ''),
(819, 'Laydee Champagne', 'Login', '2025-06-03 18:20:10', 'admin'),
(820, 'Laydee Champagne', 'Login', '2025-06-03 18:20:59', 'admin'),
(821, 'Laydee Champagne', 'Login', '2025-06-03 18:22:07', 'admin'),
(822, 'Laydee Champagne', 'Login', '2025-06-03 18:23:42', 'admin'),
(823, 'Jimmuel Aluquin', 'Added Voter', '6/3/2025 18:40:40', 'admin'),
(824, 'Eljohn Miranda', 'Added Voter', '6/3/2025 18:41:15', 'admin'),
(825, 'Don Aluquin', 'Added Voter', '6/3/2025 18:41:38', 'admin'),
(826, 'Joseph Santos', 'Added Voter', '6/3/2025 18:41:54', 'admin'),
(827, 'John Arnie Mariano', 'Added Voter', '6/3/2025 18:42:15', 'admin'),
(828, 'Aeron Paul Salipsip', 'Added Voter', '6/3/2025 18:42:42', 'admin'),
(829, 'Amiel Villanueva', 'Added Voter', '6/3/2025 18:42:57', 'admin'),
(830, 'Jeff Ladignon', 'Added Voter', '6/3/2025 18:43:17', 'admin'),
(831, 'Vincent Unarce', 'Added Voter', '6/3/2025 18:43:37', 'admin'),
(832, 'Laydee Champagne', 'Added Voter', '6/3/2025 18:43:56', 'admin'),
(833, 'Laydee Champagne', 'Added Voter', '6/3/2025 18:44:17', 'admin'),
(834, 'Joseph Santos', 'Edit Candidate', '2025-06-03 18:47:23', 'admin'),
(835, 'Don Emmanuel Aluquin', 'Edit Candidate', '2025-06-03 18:48:02', 'admin'),
(836, 'Margarette Roque', 'Edit Candidate', '2025-06-03 18:48:06', 'admin'),
(837, 'Kurt Angelo Aragon', 'Edit Candidate', '2025-06-03 18:48:11', 'admin'),
(838, 'Sharmaine Blanca', 'Edit Candidate', '2025-06-03 18:48:18', 'admin'),
(839, 'Ma.Alyssa Sevilla', 'Edit Candidate', '2025-06-03 18:48:22', 'admin'),
(840, 'Cristian Fernandez', 'Edit Candidate', '2025-06-03 18:48:34', 'admin'),
(841, 'Cristian Fernandez', 'Edit Candidate', '2025-06-03 18:48:38', 'admin'),
(842, 'Kristopher Glenn Martinez', 'Edit Candidate', '2025-06-03 18:48:42', 'admin'),
(843, 'Aleacel Postor', 'Edit Candidate', '2025-06-03 18:48:48', 'admin'),
(844, 'John Cedrick Melegrito', 'Edit Candidate', '2025-06-03 18:48:54', 'admin'),
(845, 'Adrianne Aebes Maligaya', 'Edit Candidate', '2025-06-03 18:48:58', 'admin'),
(846, 'Franz Andrei  Villasquez', 'Edit Candidate', '2025-06-03 18:49:02', 'admin'),
(847, 'Amiel Angelo Villanueva', 'Edit Candidate', '2025-06-03 18:49:06', 'admin'),
(848, 'John Michael Parungao', 'Edit Candidate', '2025-06-03 18:49:10', 'admin'),
(849, 'Aeron Paul Salipsip', 'Edit Candidate', '2025-06-03 18:49:17', 'admin'),
(850, 'Justine Retiro', 'Edit Candidate', '2025-06-03 18:49:22', 'admin'),
(851, 'Cyrell Domingo', 'Edit Candidate', '2025-06-03 18:49:28', 'admin'),
(852, 'Vincent Unarce', 'Edit Candidate', '2025-06-03 18:49:44', 'admin'),
(853, 'David Tristan Bernal', 'Edit Candidate', '2025-06-03 18:49:54', 'admin'),
(854, 'Jessica Villabriga', 'Edit Candidate', '2025-06-03 18:50:00', 'admin'),
(855, 'Vincent Francisco', 'Edit Candidate', '2025-06-03 18:50:06', 'admin'),
(856, ' ', 'Logout', '2025-06-03 18:50:08', ''),
(857, 'Laydee Champagne', 'Login', '2025-06-03 18:50:13', 'admin'),
(858, 'Jeff Ladignon', 'Edit Candidate', '2025-06-03 18:50:26', 'admin'),
(859, 'Lanz Andrei Molina', 'Edit Candidate', '2025-06-03 18:50:31', 'admin'),
(860, 'Eljohn Miranda', 'Edit Candidate', '2025-06-03 18:50:40', 'admin'),
(861, 'John Arnie  Mariano', 'Edit Candidate', '2025-06-03 18:50:48', 'admin'),
(862, 'John Riel Parcasio', 'Edit Candidate', '2025-06-03 18:50:55', 'admin'),
(863, 'Jerald Torrs', 'Edit Candidate', '2025-06-03 18:51:21', 'admin'),
(864, 'Laydee Champagne', 'Logout', '2025-06-03 18:51:44', 'admin'),
(865, 'Laydee Champagne', 'Login', '2025-06-03 18:51:48', 'admin'),
(866, 'Laydee Champagne', 'Logout', '2025-06-03 18:58:57', 'admin'),
(867, 'Laydee Champagne', 'Login', '2025-06-03 18:59:26', 'admin'),
(868, 'Laydee Champagne', 'Login', '2025-06-03 19:00:11', 'admin'),
(869, 'Laydee Champagne', 'Login', '2025-06-03 19:01:15', 'admin'),
(870, 'Laydee Champagne', 'Login', '2025-06-03 19:07:32', 'admin'),
(871, 'Laydee Champagne', 'Login', '2025-06-03 19:12:01', 'admin'),
(872, 'Laydee Champagne', 'Logout', '2025-06-03 19:26:01', 'admin'),
(873, 'Laydee Champagne', 'Login', '2025-06-05 19:17:47', 'admin'),
(874, 'Laydee Champagne', 'Logout', '2025-06-05 19:17:59', 'admin'),
(875, 'Laydee Champagne', 'Login', '2025-06-05 19:22:24', 'admin'),
(876, 'Laydee Champagne', 'Login', '2025-07-06 16:19:06', 'admin'),
(877, 'Laydee Champagne', 'Login', '2025-07-31 21:10:36', 'admin'),
(878, 'Laydee Champagne', 'Login', '2025-08-01 12:16:38', 'admin'),
(879, 'Laydee Champagne', 'Logout', '2025-08-01 12:29:58', 'admin'),
(880, 'Laydee Champagne', 'Login', '2025-08-01 12:30:03', 'admin'),
(881, 'Laydee Champagne', 'Logout', '2025-08-01 15:07:08', 'admin'),
(882, 'Laydee Champagne', 'Login', '2025-08-01 15:10:16', 'admin'),
(883, 'Laydee Champagne', 'Logout', '2025-08-01 15:12:12', 'admin'),
(884, 'Laydee Champagne', 'Login', '2025-08-01 15:12:17', 'admin'),
(885, 'Laydee Champagne', 'Login', '2025-08-02 10:35:08', 'admin'),
(886, 'Laydee Champagne', 'Logout', '2025-08-02 11:06:17', 'admin'),
(887, 'Laydee Champagne', 'Login', '2025-08-02 11:06:33', 'admin'),
(888, 'Laydee Champagne', 'Logout', '2025-08-02 11:35:04', 'admin'),
(889, 'Laydee Champagne', 'Login', '2025-08-02 11:35:14', 'admin'),
(890, 'Jay Mariano', 'Deleted Voter', '8/2/2025 11:38:29', 'admin'),
(891, 'Laydee Champagne', 'Logout', '2025-08-02 11:39:19', 'admin'),
(892, 'Laydee Champagne', 'Login', '2025-08-02 11:39:34', 'admin'),
(893, 'Laydee Champagne', 'Logout', '2025-08-02 11:39:48', 'admin'),
(894, 'Laydee Champagne', 'Login', '2025-08-02 11:40:31', 'admin'),
(895, 'Laydee Champagne', 'Logout', '2025-08-02 11:50:18', 'admin'),
(896, 'Laydee Champagne', 'Login', '2025-08-02 13:49:50', 'admin'),
(897, 'a a', 'Added Voter', '8/2/2025 15:15:15', 'admin'),
(898, ' ', 'Logout', '2025-08-02 15:20:40', ''),
(899, 'Laydee Champagne', 'Login', '2025-08-02 15:25:59', 'admin'),
(900, 'Laydee Champagne', 'Login', '2025-08-02 15:30:48', 'admin'),
(901, 'a a', 'Added Voter', '8/2/2025 15:31:17', 'admin'),
(902, 'a a', 'Added Voter', '8/2/2025 15:31:34', 'admin'),
(903, 'Laydee Champagne', 'Login', '2025-08-02 15:35:44', 'admin'),
(904, 'Laydee Champagne', 'Login', '2025-08-02 20:14:47', 'admin'),
(905, 'Laydee Champagne', 'Logout', '2025-08-02 20:15:10', 'admin'),
(906, 'Laydee Champagne', 'Login', '2025-08-02 20:25:31', 'admin'),
(907, 'Laydee Champagne', 'Login', '2025-08-02 20:26:01', 'admin'),
(908, 'Laydee Champagne', 'Logout', '2025-08-02 20:26:05', 'admin'),
(909, 'Laydee Champagne', 'Login', '2025-08-02 20:28:00', 'admin'),
(910, 'Laydee Champagne', 'Login', '2025-08-02 20:28:55', 'admin'),
(911, 'Laydee Champagne', 'Logout', '2025-08-02 20:28:59', 'admin'),
(912, 'Laydee Champagne', 'Login', '2025-08-02 20:33:40', 'admin'),
(913, 'Laydee Champagne', 'Logout', '2025-08-02 20:33:44', 'admin'),
(914, 'Laydee Champagne', 'Login', '2025-08-02 20:35:58', 'admin'),
(915, 'Laydee Champagne', 'Login', '2025-08-02 20:36:20', 'admin'),
(916, 'Laydee Champagne', 'Logout', '2025-08-02 20:36:26', 'admin'),
(917, 'Laydee Champagne', 'Login', '2025-08-02 20:37:50', 'admin'),
(918, 'Laydee Champagne', 'Logout', '2025-08-02 20:38:10', 'admin'),
(919, 'Laydee Champagne', 'Login', '2025-08-02 20:46:55', 'admin'),
(920, 'Jay Marinao', 'Added Voter', '8/2/2025 20:47:18', 'admin'),
(921, 'Laydee Champagne', 'Login', '2025-08-02 21:03:59', 'admin'),
(922, 'Laydee Champagne', 'Login', '2025-08-02 21:36:50', 'admin'),
(923, 'Laydee Champagne', 'Login', '2025-08-03 10:56:06', 'admin'),
(924, 'Laydee Champagne', 'Login', '2025-08-03 11:26:23', 'admin'),
(925, 'Laydee Champagne', 'Login', '2025-08-03 12:01:53', 'admin'),
(926, ' ', 'Logout', '2025-08-03 12:11:34', ''),
(927, 'Laydee Champagne', 'Login', '2025-08-03 12:11:41', 'admin'),
(928, 'Laydee Champagne', 'Login', '2025-08-03 17:39:22', 'admin'),
(929, 'Laydee Champagne', 'Login', '2025-08-03 21:40:17', 'admin'),
(930, 'Laydee Champagne', 'Login', '2025-08-03 21:40:58', 'admin'),
(931, 'Laydee Champagne', 'Login', '2025-08-03 21:50:27', 'admin'),
(932, 'Laydee Champagne', 'Login', '2025-08-03 22:11:29', 'admin'),
(933, 'Laydee Champagne', 'Logout', '2025-08-03 22:12:58', 'admin'),
(934, 'Laydee Champagne', 'Login', '2025-08-03 22:13:23', 'admin'),
(935, 'Laydee Champagne', 'Login', '2025-08-04 11:20:57', 'admin'),
(936, 'Laydee Champagne', 'Login', '2025-08-04 11:24:57', 'admin'),
(937, 'Laydee Champagne', 'Login', '2025-08-14 13:21:58', 'admin'),
(938, 'Laydee Champagne', 'Login', '2025-08-14 13:31:16', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `User_Type` varchar(50) NOT NULL,
  `Position` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `FirstName`, `LastName`, `UserName`, `Password`, `User_Type`, `Position`) VALUES
(6, 'Laydee', 'Champagne', 'admin', '1234567', 'admin', 'Admin'),
(13, 'John', 'Leabres', 'John', '12345', 'admin', 'Secretary Officer'),
(12, 'Evelyn ', 'Juliano', 'evelyn', '12345', 'admin', 'Faculty Officer'),
(14, 'Isaiah', 'Mizona', 'Isaiah', '12345', 'admin', 'Election Officer 1'),
(15, 'Kat', 'CSDL', 'Kat', '12345', 'admin', 'CSDL Officer'),
(16, 'Laydee', 'Champagne', 'Laydee', '12345', 'admin', 'CSDL Officer');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `VoterID` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `SchoolID` varchar(100) NOT NULL,
  `Verified` enum('Verified','Not Verified') NOT NULL DEFAULT 'Not Verified',
  `DateVoted` varchar(50) NOT NULL,
  `TimeVoted` varchar(50) NOT NULL,
  `Room` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`VoterID`, `FirstName`, `LastName`, `MiddleName`, `Username`, `Password`, `Email`, `Year`, `Status`, `SchoolID`, `Verified`, `DateVoted`, `TimeVoted`, `Room`) VALUES
(106, 'Laydee', 'Champagne', '', 'laydee.champagne1.au@phinmaed.com', '01-1234-12345', '', '4th year', 'Unvoted', '01-1234-12345', 'Verified', '', '', ''),
(105, 'Laydee', 'Champagne', '', 'laydee.champagne.au@phinmaed.com', '12345', '', '4th year', 'Unvoted', '01-1234-12345', 'Verified', '', '', ''),
(104, 'Vincent', 'Unarce', '', 'Vincent.Unarce.au@phinmaed.com	', '01-1234-12345', '', '4th year', 'Unvoted', '01-1234-12345', 'Verified', '', '', ''),
(103, 'Jeff', 'Ladignon', '', 'jeff.ladignon.au@phinmaed.com', '01-1234-123456', '', '4th year', 'Voted', '01-1234-12345', 'Verified', '2025-06-03', '19:10:34', 'Comlab 4'),
(102, 'Amiel', 'Villanueva', '', 'amiel.villanueva.au@phinmaed.com', '01-1234-12345', '', '4th year', 'Voted', '01-1234-12345', 'Verified', '2025-06-03', '19:10:10', 'Comlab 3'),
(101, 'Aeron Paul', 'Salipsip', '', 'aeron.salipsip.au@phinmaed.com	', '01-1234-12345', '', '4th year', 'Voted', '01-1234-12345', 'Verified', '2025-06-03', '19:09:31', 'Comlab 2'),
(100, 'John Arnie', 'Mariano', '', 'joan.mariano.au@phinmaed.com', '01-1234-12345', '', '4th year', 'Voted', '01-1234-12345', 'Verified', '2025-06-03', '19:04:38', 'Comlab 1'),
(99, 'Joseph', 'Santos', '', 'maca.santos.au@phinmaed.com	', '01-1234-12345', '', '4th year', 'Voted', '01-1234-12345', 'Verified', '2025-06-03', '19:08:36', 'Comlab 1'),
(98, 'Don', 'Aluquin', '', 'don.aluquin.au@phinmaed.com', '01-1234-12345', '', '4th year', 'Voted', '01-1234-12345', 'Verified', '2025-06-03', '19:07:23', 'Comlab 4'),
(97, 'Eljohn', 'Miranda', '', 'elgo.miranda.au@phinmaed.com', '01-1234-12345', '', '4th year', 'Voted', '01-1234-12345', 'Verified', '2025-06-03', '19:06:29', 'Comlab 3'),
(96, 'Jimmuel', 'Aluquin', '', 'jimz.aluquin.au@phinmaed.com', '01-1234-12345', '', '4th year', 'Voted', '01-1234-12345', 'Verified', '2025-06-03', '19:05:51', 'Comlab 2'),
(111, 'Jay', 'Marinao', '', 'jayzxc.trader01@gmail.com', '01-1234-123457', '', '1st year', 'Unvoted', '01-1234-123457', 'Verified', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `ID` int(11) NOT NULL,
  `CandidateID` int(11) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`ID`, `CandidateID`, `votes`) VALUES
(461, 218, 0),
(460, 217, 0),
(459, 215, 0),
(458, 210, 0),
(457, 213, 0),
(456, 212, 0),
(455, 204, 0),
(454, 202, 0),
(453, 218, 0),
(452, 217, 0),
(451, 215, 0),
(450, 210, 0),
(449, 213, 0),
(448, 212, 0),
(447, 204, 0),
(446, 203, 0),
(445, 218, 0),
(444, 217, 0),
(443, 215, 0),
(442, 210, 0),
(441, 213, 0),
(440, 212, 0),
(439, 204, 0),
(438, 203, 0),
(437, 218, 0),
(436, 217, 0),
(435, 215, 0),
(434, 210, 0),
(433, 213, 0),
(432, 212, 0),
(431, 204, 0),
(430, 202, 0),
(429, 218, 0),
(428, 217, 0),
(427, 215, 0),
(426, 210, 0),
(425, 213, 0),
(424, 212, 0),
(423, 204, 0),
(422, 202, 0),
(421, 218, 0),
(420, 217, 0),
(419, 215, 0),
(418, 210, 0),
(417, 213, 0),
(416, 212, 0),
(415, 204, 0),
(414, 203, 0),
(413, 218, 0),
(412, 216, 0),
(411, 214, 0),
(410, 210, 0),
(409, 208, 0),
(408, 212, 0),
(407, 204, 0),
(406, 202, 0),
(405, 218, 0),
(404, 216, 0),
(403, 214, 0),
(402, 210, 0),
(401, 208, 0),
(400, 212, 0),
(399, 205, 0),
(398, 203, 0),
(462, 203, 0),
(463, 205, 0),
(464, 212, 0),
(465, 208, 0),
(466, 210, 0),
(467, 214, 0),
(468, 216, 0),
(469, 218, 0),
(470, 202, 0),
(471, 204, 0),
(472, 207, 0),
(473, 213, 0),
(474, 211, 0),
(475, 214, 0),
(476, 217, 0),
(477, 218, 0),
(478, 222, 0),
(479, 204, 0),
(480, 207, 0),
(481, 213, 0),
(482, 210, 0),
(483, 214, 0),
(484, 216, 0),
(485, 218, 0),
(486, 203, 0),
(487, 205, 0),
(488, 212, 0),
(489, 208, 0),
(490, 210, 0),
(491, 214, 0),
(492, 216, 0),
(493, 218, 0),
(494, 203, 0),
(495, 205, 0),
(496, 212, 0),
(497, 208, 0),
(498, 210, 0),
(499, 214, 0),
(500, 216, 0),
(501, 218, 0),
(502, 203, 0),
(503, 205, 0),
(504, 212, 0),
(505, 208, 0),
(506, 210, 0),
(507, 214, 0),
(508, 216, 0),
(509, 218, 0),
(510, 203, 0),
(511, 205, 0),
(512, 212, 0),
(513, 208, 0),
(514, 210, 0),
(515, 214, 0),
(516, 216, 0),
(517, 218, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CandidateID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`VoterID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `CandidateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=939;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `VoterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
