-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 03:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `poll_id` int(10) NOT NULL,
  `text` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vote_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`poll_id`, `text`, `vote_id`) VALUES
(1, 'Awesome', 1),
(1, 'Really good', 2),
(1, 'Not bad', 3),
(1, 'Bad', 4),
(2, 'Monthly', 5),
(2, 'Weekly', 6),
(2, 'Daily', 7),
(2, 'Two times per day', 8);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` int(10) NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `comment_date`, `role`, `idPost`) VALUES
(1, 'I hope this post will be interesting for you.', 1489860476, 'admin', 1),
(2, 'Great post, I love to go to your gym!', 1489860476, 'Perica', 1),
(3, 'I can\'t wait to train again here. Many thanks for y\'all!', 1489860476, 'Laza', 1),
(4, 'I hope this post will be interesting for you.', 1489861916, 'admin', 2),
(5, 'Cardio trainings is the most important thing for our health!', 1489862371, 'Perica', 2),
(25, 'Their running strips are awesome, all praises!', 1489862941, 'Laza', 2),
(26, 'I hope this post will be interesting for you.', 1489862949, 'admin', 3),
(27, 'Their personal trainers are very dedicated and patient!', 1489863694, 'Laza', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `picture_id` int(10) NOT NULL,
  `picture` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `big_picture` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `picture_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`picture_id`, `picture`, `big_picture`, `picture_title`) VALUES
(1, 'images/photos/1a.jpg', 'images/photos/1.jpg', 'Sprint cardio workout'),
(2, 'images/photos/2a.jpg', 'images/photos/2.jpg', 'Group pushup training'),
(3, 'images/photos/3a.jpg', 'images/photos/3.jpg', 'Pushups with personal trainer'),
(4, 'images/photos/4a.jpg', 'images/photos/4.jpg', 'Weightlifting training = big muscles'),
(5, 'images/photos/5a.jpg', 'images/photos/5.jpg', 'Short break after hard workout'),
(6, 'images/photos/6a.jpg', 'images/photos/6.jpg', 'Never miss legs workout'),
(7, 'images/photos/7a.jpg', 'images/photos/7.jpg', 'Very dedicated personal trainer'),
(8, 'images/photos/8a.jpg', 'images/photos/8.jpg', 'We are all family here'),
(9, 'images/photos/9a.jpg', 'images/photos/9.jpg', 'We have the best equipment to improve your results'),
(10, 'images/photos/1a.jpg', 'images/photos/1.jpg', 'Sprint cardio workout'),
(11, 'images/photos/2a.jpg', 'images/photos/2.jpg', 'Group pushup training'),
(12, 'images/photos/3a.jpg', 'images/photos/3.jpg', 'Pushups with personal trainer'),
(13, 'images/photos/4a.jpg', 'images/photos/4.jpg', 'Weightlifting training = big muscles'),
(14, 'images/photos/5a.jpg', 'images/photos/5.jpg', 'Short break after hard workout'),
(15, 'images/photos/6a.jpg', 'images/photos/6.jpg', 'Never miss legs workout'),
(16, 'images/photos/7a.jpg', 'images/photos/7.jpg', 'Very dedicated personal trainer'),
(17, 'images/photos/8a.jpg', 'images/photos/8.jpg', 'We are all family here'),
(18, 'images/photos/9a.jpg', 'images/photos/9.jpg', 'We have the best equipment to improve your results');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(10) NOT NULL,
  `page_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_title`) VALUES
(1, 'Home', 'home'),
(2, 'Posts', 'weight'),
(4, 'Gallery', 'gallery'),
(5, 'Contact', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `poll_id` int(11) NOT NULL,
  `poll_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`poll_id`, `poll_name`) VALUES
(1, 'How would you rate this website?'),
(2, 'How often do you go to gym?');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_pic` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_title1` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `post_title2` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_pic`, `post_name`, `post_title1`, `post_title2`) VALUES
(1, 'pictures/weight_big.jpg', 'Weightlifting', 'Weight training is a common type of strength training for developing the strength and size of skeletal muscles. It utilizes the force of gravity in the form of weighted bars, dumbbells or weight stacks in order to oppose the force generated by muscle through concentric or eccentric contraction. Weight training uses a variety of specialized equipment to target specific muscle groups and types of movement.', 'Sports where strength training is central are bodybuilding, weightlifting, powerlifting, and strongman, highland games, shot put, discus throw, and javelin throw. Many other sports use strength training as part of their training regimen, notably; mixed martial arts, American football, wrestling, rugby football, track and field, rowing, lacrosse, basketball, baseball, and hockey. Strength training for other sports and physical activities is becoming increasingly popular.'),
(2, 'pictures/cardio_big.jpg', 'Cardio training', 'Cardio exercise is any exercise that raises your heart rate. Face it our bodies were made to move. And we all know that to keep our muscles in shape we need move them. This movement makes them stronger and stronger muscles make for a more efficient and healthy body.', 'Even when you see no specific weight loss you are getting great benefits from a cardio workout. Benefits: Weight Loss Stronger Heart and Lungs Increased Bone Density Reduces Stress Better Sleep More Energy Reduces the Risk of Heart Disease Teaches the Heart to Work More Efficiently Strengthens Heart & Lungs Increased Energy Levels for a More Active Lifestyle Reduction in Mood Swings & Depression In order to feel good now and in the future you need cardio exercise.'),
(3, 'pictures/personal_big.jpg', 'Train with personal trainer', 'A personal trainer is an individual certified to have a varying degree of knowledge of general fitness involved in exercise prescription and instruction. They motivate clients by setting goals and providing feedback and accountability to clients. Trainers also measure their client\'s strengths and weaknesses with fitness assessments. These fitness assessments may also be performed before and after an exercise program to measure their client\'s improvements in physical fitness. They may also educate their clients in many other aspects of wellness besides exercise, including general health and nutrition guidelines.', 'Qualified personal trainers recognize their own areas of expertise. If a trainer suspects that one of his or her clients has a medical condition that could prevent the client from safe participation in an exercise program, they must refer the client to the proper health professional for prior clearance.');

-- --------------------------------------------------------

--
-- Table structure for table `rols`
--

CREATE TABLE `rols` (
  `idRole` int(10) NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rols`
--

INSERT INTO `rols` (`idRole`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(10) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `confirm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idRole` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `name`, `lastname`, `email`, `username`, `password`, `confirm`, `idRole`) VALUES
(1, 'Aleksandar', 'Atlagić', 'aleksandar.atlaigc.93.14@ict.edu.rs', 'Admin', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Pera', 'Peric', 'pera@gmail.com', 'Perica', 'd8795f0d07280328f80e59b1e8414c49', 'pera', 2),
(10, 'vladimira', 'Uskokvoic', 'dasdasdasd', 'AsdasDasd', '29413772fe53a5dd695f2103f9cf5897', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(10) NOT NULL,
  `num_votes` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `num_votes`) VALUES
(1, '70'),
(2, '50'),
(3, '0'),
(4, '0'),
(5, '22'),
(6, '10'),
(7, '16'),
(8, '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`poll_id`,`vote_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `picture_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rols`
--
ALTER TABLE `rols`
  MODIFY `idRole` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
