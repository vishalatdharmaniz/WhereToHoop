-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2017 at 02:30 AM
-- Server version: 10.0.32-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dharmani_WhereToHoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `court_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `court_location` varchar(255) NOT NULL,
  `court_longitude` varchar(255) NOT NULL,
  `court_latitude` varchar(255) NOT NULL,
  `combo_box_1` varchar(255) NOT NULL,
  `combo_box_2` varchar(255) NOT NULL,
  `court_pic` text NOT NULL,
  `timing_start` varchar(255) NOT NULL,
  `timing_end` varchar(255) NOT NULL,
  `in_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`court_id`, `user_id`, `court_name`, `court_location`, `court_longitude`, `court_latitude`, `combo_box_1`, `combo_box_2`, `court_pic`, `timing_start`, `timing_end`, `in_out`) VALUES
(6, 8, 'why ', 'Delhi, India', '77.227396', '28.661898', 'NO', '2400', 'http://dharmani.com/WhereToHoop/CourtPics/59dc78cccd66a.jpg', '13:04:44', '13:04:44', ''),
(7, 8, 'Mumbai', 'Mumbai, Maharashtra, India', '72.877656', '19.075984', 'YES', '12500', 'http://dharmani.com/WhereToHoop/CourtPics/59dc798746edc.jpg', '13:10:25', '13:14:25', ''),
(9, 4, 'simran court ', 'Nabha, Punjab, India', '76.145190', '30.373674', 'YES', '100', 'http://dharmani.com/WhereToHoop/CourtPics/59dd437e1ec6b.jpg', '03:31:25', '15:31:25', ''),
(10, 8, 'vishal', 'Mohali, Punjab, India', '76.717873', '30.704649', 'YES', '15000', 'http://dharmani.com/WhereToHoop/CourtPics/59ddd4c55f5f0.jpg', '13:45:40', '14:45:40', ''),
(11, 2, 'Seminole rec', '9706 50th Ave N, Saint Petersburg, FL, United States', '-82.773171', '27.817489', 'YES', '5', 'http://dharmani.com/WhereToHoop/CourtPics/59e5c12727e2a.jpg', '17:33:19', '19:33:19', ''),
(12, 2, 'PCA STADIUM ', 'Phase 10, Mohali, Punjab, India', '76.740867', '30.686122', 'NO', '100', 'http://dharmani.com/WhereToHoop/CourtPics/59e6078a291b4.jpg', '19:06:24', '19:06:24', ''),
(13, 11, 'The Crossings at Santa Fe', 'Gainesville, FL, United States', '-82.324826', '29.651634', 'YES', 'ID at gate', 'http://dharmani.com/WhereToHoop/CourtPics/59e675f359dd4.jpg', '18:00:14', '21:00:14', ''),
(14, 2, 'Seminole', '9706 50th Ave N, Saint Petersburg, FL, United States', '-82.773171', '27.817489', 'YES', 'No', 'http://dharmani.com/WhereToHoop/CourtPics/59e67ceba4dd3.jpg', '17:55:50', '18:55:50', ''),
(15, 2, 'Seminole c', '9706 50th Avenue North, Saint Petersburg, FL, United States', '-82.773171', '27.817489', 'YES', 'no', 'http://dharmani.com/WhereToHoop/CourtPics/59e67f9d8d02a.jpg', '18:55:50', '19:55:50', ''),
(16, 2, 'akhil first court', 'Chandigarh, Punjab, India', '75.955033', '30.538994', 'NO', '15000', 'http://dharmani.com/WhereToHoop/CourtPics/59e73223521db.jpg', '04:20 PM', '04:22 PM', 'INSIDE'),
(18, 4, 'da court ', 'Sector 91, Mohali, Punjab, India', '76.678809', '30.700855', 'YES', '1500', 'http://dharmani.com/WhereToHoop/CourtPics/59ee2b1e3f691.jpg', '11:14 PM', '01:14 AM', 'INSIDE'),
(19, 4, 'court', 'New York, NY, United States', '-74.005973', '40.712775', 'YES', '0', 'http://dharmani.com/WhereToHoop/CourtPics/59ee2d8612f36.jpg', '01:14 AM', '01:14 AM', 'INSIDE'),
(20, 13, 'nmej', 'New Windsor, NY, United States', '-74.023752', '41.476760', 'N/A', '250', 'http://dharmani.com/WhereToHoop/CourtPics/59ef2f7f10896.jpg', '12:46 am', '05:46 am', 'INSIDE'),
(21, 10, 'abcshhp', 'Mohali, Punjab, India', '76.717873', '30.704649', 'NO', '23838', 'http://dharmani.com/WhereToHoop/CourtPics/59ef3b9a3c4a8.jpg', '05:58 pm', '05:58 am', 'OUTSIDE'),
(22, 10, 'akki', 'F- 335, Phase 8- B, Sector 73, Chandigarh, Punjab, India', '76.690208', '30.709860', 'NO', '15000', 'http://dharmani.com/WhereToHoop/CourtPics/59f076b242eb2.jpg', '05:03 pm', '06:03 pm', 'INSIDE');

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `user_id` varchar(255) NOT NULL,
  `device_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_tokens`
--

INSERT INTO `device_tokens` (`user_id`, `device_token`) VALUES
('2', '70c9dc73face8e14813ef9067bf4236b3c7722e3d92b5c7dfa5ede4b681c2f6d'),
('2', 'e84c4ad8b29d88bf7fced3c23f64a2a2d25388a993cd76855e290f650d02376d'),
('2', 'Array'),
('2', 'Array'),
('2', 'Array'),
('2', 'Array'),
('2', 'Array'),
('2', 'Array'),
('4', '5ed7231ea395cab59fbf5c5dc218eecd86966c7485943cb1fc95cbc3e057f3c6'),
('10', 'Array'),
('10', 'Array'),
('10', 'Array'),
('10', 'Array'),
('10', 'Array'),
('10', 'Array'),
('10', 'Array'),
('14', ''),
('2', 'Array'),
('15', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `favourite_brand` varchar(255) NOT NULL,
  `favourite_NBA_team` varchar(255) NOT NULL,
  `profile_pic` text NOT NULL,
  `device_token` longtext NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `location`, `password`, `favourite_brand`, `favourite_NBA_team`, `profile_pic`, `device_token`, `device_type`, `points`) VALUES
(2, 'Alonzo', 'Smith', 'akhil', 'akhi@gmail.com', 'Seminole', '123456', 'Nike', 'Warriors', 'http://dharmani.com/WhereToHoop/ProfilePics/59ed98882eb80.jpg', 'Array', 'iOS', 1000),
(8, 'testingios', '238', 'souravm', 'testingios238@gmail.com', 'mohali', 'qwerty', 'kkdhhd', 'kkr jdj', 'http://dharmani.com/WhereToHoop/ProfilePics/59e08d9eaa323.jpg', '70c9dc73face8e14813ef9067bf4236b3c7722e3d92b5c7dfa5ede4b681c2f6d', 'e00e78cd04cc48540485e20bdb10d1a96af006d8a6db478d3f9eb4b59a80eede', 230),
(3, 'vis', 'deep', 'user', 'v@hii', '', 'pass', 'fv', '', 'http://dharmani.com/WhereToHoop/ProfilePics/59d8bafe1ec2f.jpg', '', '666', 0),
(4, 'Simran Pal', 'Singh', 'Simran Pal Singh', 'dharmaniz.simranpal@gmail.com', 'chandigarh ', 'No password for facebook', '12345', 'yankees', 'http://dharmani.com/WhereToHoop/ProfilePics/59d8ca440d712.jpg', 'f3852588df547e01675b9294f1260280f0ffb6609e0b3b590147f31b330c0171', '5fded950810863042509d98839498094130bfadd9b6e945da939e206458898cf', 90),
(5, 'mac', 'new', 'mac', 'mac@m.com', 'mohali', '123456', 'nike', 'yankees', 'http://dharmani.com/WhereToHoop/ProfilePics/59d8bc538d091.jpg', '', '5fded950810863042509d98839498094130bfadd9b6e945da939e206458898cf', 0),
(6, 'testing ', 'ios 77', 'testingios77', 'testingios77@gmail.com', 'chandigarh', 'No password for facebook', 'kk', 'kk', 'http://dharmani.com/WhereToHoop/ProfilePics/59d8ce6fe0bb2.jpg', '', '5a532904db4495e330a06894b5800b4d67e77b13f0efa9f9b46ae9f41ac931e9', 0),
(7, 'sourav', 'mangal', 'sm', 'dharmaniz.souravm@gmail.com', 'chandigarh', 'qwerty', 'kk', 'kk', 'http://dharmani.com/WhereToHoop/ProfilePics/59d8cffea9e24.jpg', 'Array', 'd6a723d294fd31e551da0cc97df6f67d7e0a2ba5f2db929269eea62cbf90da3a', 0),
(9, 'vis', 'deep', 'useqr', 'vq@hii', '', 'pass', 'fv', '', 'http://dharmani.com/WhereToHoop/ProfilePics/59dcaa9e22e86.jpg', '', '666', 0),
(11, 'KJ', 'Roberson', 'kkrossover5', 'kelvinrob5.kr@gmail.com', 'Gainesville', 'No password for facebook', 'Jordan', 'Cleveland Cavaliers ', 'http://dharmani.com/WhereToHoop/ProfilePics/59e6747447fea.jpg', '', '6baa45b77d4881fbc36b82335745dbe6e7f92d415da0bcaffb8666be5bf3d808', 20),
(12, 'Naldy', 'Metellus', 'Naldy Metellus', 'naldymetellus@yahoo.com', 'winter haven ', 'No password for facebook', 'drake', 'mavs ', 'http://dharmani.com/WhereToHoop/ProfilePics/59e8b07b6eec2.jpg', '', 'dbf5cd785c51eeb1242b7d3c833f4ef4e2a5d2294cef9c073e8f19e07f211c0b', 0),
(13, 'tester account for ', 'testing', 'tester@123', 'dharmaniz.ramand@gmail.com', 'chd', 'qwerty', 'kk', 'kkr', 'http://dharmani.com/WhereToHoop/ProfilePics/59ef2ecf692c2.jpg', '', 'cbaa9b0862c4fdb615cab85b81f4cbfb1397031b0bd2ae8b059824a5392c2835', 20),
(14, 'Akhil', 'Chowdary', 'Akhil Chowdary', 'akki@gmail.com', 'mohali', 'No password for facebook', 'akhil', 'akhil', 'http://dharmani.com/WhereToHoop/ProfilePics/59f097821680d.jpg', '777', 'cbaa9b0862c4fdb615cab85b81f4cbfb1397031b0bd2ae8b059824a5392c2835', 10),
(15, 'Dharmani sourav m', 'Ios developer', 'Dharmani Ios', 'testingios@gmail.com', 'mohali', 'No password for facebook', 'sourav', 'sourav', 'http://dharmani.com/WhereToHoop/ProfilePics/59f094863705b.jpg', '117ea3650f84ce2a32402b63babf8ba2d0b37e8eba4896b8ccc0002cdb44819f', 'cbaa9b0862c4fdb615cab85b81f4cbfb1397031b0bd2ae8b059824a5392c2835', 40),
(16, 'akki', 'akhil', 'akki', 'ak@gmail.com', 'mohali', '123456', 'akki', 'akki', 'http://dharmani.com/WhereToHoop/ProfilePics/59f18ecc40338.jpg', '', 'cbaa9b0862c4fdb615cab85b81f4cbfb1397031b0bd2ae8b059824a5392c2835', 0);

-- --------------------------------------------------------

--
-- Table structure for table `whos_hoopin`
--

CREATE TABLE `whos_hoopin` (
  `court_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `today_date` date NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whos_hoopin`
--

INSERT INTO `whos_hoopin` (`court_id`, `user_id`, `today_date`, `time`) VALUES
(2, 2, '0000-00-00', '00:00:02'),
(2, 2, '0000-00-00', '07:29:00'),
(2, 2, '0000-00-00', '00:00:00'),
(2, 2, '0000-00-00', '00:00:00'),
(2, 2, '0000-00-00', '06:42:00'),
(2, 2, '0000-00-00', '07:18:00'),
(2, 8, '0000-00-00', '12:53:00'),
(5, 2, '0000-00-00', '02:01:00'),
(5, 2, '0000-00-00', '02:09:00'),
(9, 2, '0000-00-00', '06:18:00'),
(10, 8, '0000-00-00', '05:04:00'),
(11, 2, '0000-00-00', '07:00:00'),
(11, 2, '0000-00-00', '07:00:00'),
(11, 2, '0000-00-00', '07:45:00'),
(10, 8, '2017-10-13', '15:11:00'),
(10, 8, '2017-10-13', '16:47:00'),
(10, 8, '2017-10-13', '16:49:00'),
(10, 8, '2017-10-13', '16:55:00'),
(10, 8, '2017-10-13', '16:55:00'),
(10, 8, '2017-10-13', '16:00:00'),
(10, 8, '2017-10-13', '17:00:00'),
(1, 1, '2017-10-18', '12:43 pm'),
(0, 0, '2017-10-18', ''),
(1, 1, '2017-10-18', '12:45 pm'),
(1, 2, '2017-10-18', '12:48 pm'),
(1, 2, '2017-10-18', '12:50 pm'),
(1, 2, '2017-10-18', '12:51 pm'),
(1, 2, '2017-10-18', '12:55 PM'),
(1, 2, '2017-10-18', '12:56 PM'),
(1, 2, '2017-10-18', '12:58 PM'),
(1, 2, '2017-10-18', '13:00 PM'),
(1, 2, '2017-10-18', '1:00 PM'),
(1, 2, '2017-10-18', '1:12 PM'),
(1, 2, '2017-10-18', '01:15 PM'),
(6, 2, '2017-10-18', '01:17 PM'),
(6, 2, '2017-10-18', '01:18 PM'),
(6, 2, '2017-10-18', '01:20 PM'),
(6, 2, '2017-10-18', '01:21 PM'),
(6, 2, '2017-10-18', '01:22 PM'),
(6, 2, '2017-10-18', '01:24 PM'),
(6, 2, '2017-10-18', '01:25 PM'),
(6, 2, '2017-10-18', '01:26 PM'),
(6, 2, '2017-10-18', '01:28 PM'),
(6, 2, '2017-10-18', '01:29 PM'),
(6, 2, '2017-10-18', '01:32 PM'),
(6, 2, '2017-10-18', '01:35 PM'),
(6, 2, '2017-10-18', '01:37 PM'),
(6, 2, '2017-10-18', '01:38 PM'),
(6, 2, '2017-10-18', '01:45 PM'),
(6, 2, '2017-10-18', '01:46 PM'),
(6, 2, '2017-10-18', '01:48 PM'),
(6, 2, '2017-10-18', '01:49 PM'),
(6, 2, '2017-10-18', '02:37 PM'),
(6, 2, '2017-10-18', '02:40 PM'),
(6, 2, '2017-10-18', '02:43 PM'),
(6, 2, '2017-10-18', '02:44 PM'),
(6, 2, '2017-10-18', '02:45 PM'),
(6, 2, '2017-10-18', '02:54 PM'),
(17, 2, '2017-10-18', '04:57 PM'),
(10, 4, '2017-10-23', '11:20 PM'),
(18, 2, '2017-10-24', '12:27 PM'),
(17, 2, '2017-10-24', '02:28 PM'),
(10, 2, '2017-10-24', '05:01 pm'),
(18, 14, '2017-10-25', '06:29 pm'),
(18, 15, '2017-10-26', '12:44 PM'),
(10, 15, '2017-10-26', '12:45 PM'),
(18, 2, '2017-10-26', '12:45 pm'),
(18, 2, '2017-10-26', '12:47 pm'),
(10, 15, '2017-10-26', '12:49 PM'),
(10, 15, '2017-10-26', '12:51 PM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
