-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 10:55 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `posting_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=Admin',
  `verification_code` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `dob`, `age`, `address`, `email`, `contact`, `password`, `image`, `date_registered`, `user_type`, `verification_code`) VALUES
(25, 'Erwin', 'Cabag', 'Son', '', 'Male', '2022-04-06', 23, 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'admin@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', 'jassir-jonis-QWa0TIUW638-unsplash.jpg', '2022-04-17', 1, '456037');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`comment_Id` int(11) NOT NULL,
  `posted_Id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_added` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_Id`, `posted_Id`, `comment`, `date_added`) VALUES
(1, 23, 'fdsfs', '2022-12-04'),
(2, 0, 'fsdfs', '2022-12-04'),
(3, 0, 'fds', '2022-12-04'),
(4, 23, 'fds', '2022-12-04'),
(5, 23, 'dsa', '2022-12-04'),
(6, 23, 'ds', '2022-12-04'),
(7, 23, 'fd', '2022-12-04'),
(8, 23, 'ds', '2022-12-04'),
(9, 23, 'gdf', '2022-12-04'),
(10, 23, 'df', '2022-12-04'),
(11, 23, 'fd', '2022-12-04'),
(12, 23, 'fds', '2022-12-04'),
(13, 23, 'gfd', '2022-12-04'),
(14, 23, 'gfd', '2022-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `posted`
--

CREATE TABLE IF NOT EXISTS `posted` (
`post_Id` int(11) NOT NULL,
  `admin_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `city_from` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `disappearance_date` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `pronouns` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `hair_color` varchar(255) NOT NULL,
  `head_color` varchar(255) NOT NULL,
  `dye_color` varchar(255) NOT NULL,
  `eye` varchar(255) NOT NULL,
  `teeth` varchar(255) NOT NULL,
  `scars` varchar(255) NOT NULL,
  `piercings` varchar(255) NOT NULL,
  `tattoos` varchar(255) NOT NULL,
  `clothing` varchar(255) NOT NULL,
  `footwear` varchar(255) NOT NULL,
  `shoe_size` varchar(255) NOT NULL,
  `coat` varchar(255) NOT NULL,
  `head_wear` varchar(255) NOT NULL,
  `jewelry` varchar(255) NOT NULL,
  `eyewear` varchar(255) NOT NULL,
  `illnesses` varchar(255) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `drugs_alcohol` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `gadgets` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_location` varchar(255) NOT NULL,
  `last_person_with` varchar(255) NOT NULL,
  `last_person_with_address` varchar(255) NOT NULL,
  `last_person_with_contact` varchar(255) NOT NULL,
  `work_school_name` varchar(255) NOT NULL,
  `work_school_address` varchar(255) NOT NULL,
  `work_school_contact` varchar(255) NOT NULL,
  `date_report_filed` date NOT NULL,
  `time_missing` varchar(255) NOT NULL,
  `repeat_missing` varchar(255) NOT NULL,
  `agency_enforcement` varchar(255) NOT NULL,
  `officer` varchar(255) NOT NULL,
  `agency_phone` varchar(255) NOT NULL,
  `emergency_number` varchar(255) NOT NULL,
  `reward` varchar(255) NOT NULL,
  `family_contact` varchar(255) NOT NULL,
  `relationship_to_missing` varchar(255) NOT NULL,
  `family_email` varchar(255) NOT NULL,
  `family_fb` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `name_who_fill_up` varchar(255) NOT NULL,
  `name_who_fill_up_relationship` varchar(255) NOT NULL,
  `name_who_fill_up_contact` varchar(255) NOT NULL,
  `posted_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Missing',
  `verified` int(11) NOT NULL DEFAULT '0' COMMENT '0=missing, 1=found'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `posted`
--

INSERT INTO `posted` (`post_Id`, `admin_Id`, `user_Id`, `city_from`, `name`, `disappearance_date`, `gender`, `dob`, `pronouns`, `race`, `height`, `weight`, `hair_color`, `head_color`, `dye_color`, `eye`, `teeth`, `scars`, `piercings`, `tattoos`, `clothing`, `footwear`, `shoe_size`, `coat`, `head_wear`, `jewelry`, `eyewear`, `illnesses`, `medication`, `drugs_alcohol`, `hobbies`, `gadgets`, `contact`, `email`, `last_location`, `last_person_with`, `last_person_with_address`, `last_person_with_contact`, `work_school_name`, `work_school_address`, `work_school_contact`, `date_report_filed`, `time_missing`, `repeat_missing`, `agency_enforcement`, `officer`, `agency_phone`, `emergency_number`, `reward`, `family_contact`, `relationship_to_missing`, `family_email`, `family_fb`, `comments`, `name_who_fill_up`, `name_who_fill_up_relationship`, `name_who_fill_up_contact`, `posted_image`, `status`, `verified`) VALUES
(23, 0, 44, 'Cebu City', 'Ariel', '2022-10-11', 'Female', '2022-09-27', 'e', 'Cebu City', 'e', 'e', 'e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09359428963', 'sonerwin12@gmail.com', '', '', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', 'fds', 'fdsf', 'dsfds', '542', 'FB_IMG_1428294047184.jpg,FB_IMG_1428294084097.jpg,FB_IMG_1428294089143.jpg,FB_IMG_1428294210881.jpg', 'Missing', 0),
(31, 25, 0, 'fdsfsd', 'fdsfs', '2022-10-05', '', '2022-10-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9123456798', '6207ad7e34af5.jpg,4297150.jpg,minimalism-1644666519306-6515.jpg', 'Missing', 0),
(32, 25, 0, 'dsada', 'dsada', '2022-10-21', 'Male', '2022-10-12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 'dsad', 'dsadsa', '9123456798', '', 'Missing', 0),
(33, 25, 0, 'fdsfs', 'dd dd dd', '2022-10-05', '', '2022-10-12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 'fdsfds', 'fsdfs', '9123456798', '', 'Found', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE IF NOT EXISTS `testimony` (
`testimony_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `testimony` text NOT NULL,
  `testimony_image` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`testimony_Id`, `user_Id`, `testimony`, `testimony_image`, `date_added`) VALUES
(3, 44, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non veniam sapiente eum, corporis provident facilis nulla, aperiam, repudiandae a sed maiores ex, veritatis explicabo nihil. In quaerat, nisi vero excepturi enim, similique consequuntur labore voluptas libero quo porro quas. Aut illum velit fugit, sapiente cum quasi dignissimos ratione deserunt placeat ipsam repudiandae nulla est eius numquam reiciendis, labore suscipit voluptatum, quae. Dolores libero quia cupiditate ipsam facere sequi doloremque, odit repellat temporibus delectus tempore sed ullam ea harum laborum deleniti, necessitatibus corporis vitae a. Doloremque aspernatur quidem quam ex id neque obcaecati asperiores, et dolorum aut magni beatae. Animi consectetur amet quas ullam eum itaque dicta sequi esse nisi provident quod quibusdam vitae perferendis, enim maxime, quae quisquam reprehenderit, corporis repudiandae aliquam sapiente quo, similique! Fugit asperiores exercitationem et ducimus ea molestiae id amet accusantium consequatur unde officiis nihil, culpa, corporis deleniti commodi incidunt repellendus deserunt optio quasi velit adipisci autem nam aperiam? Aliquid suscipit nobis eos tempore natus debitis, eaque aliquam architecto, impedit! Doloribus exercitationem illum eius voluptatum nesciunt ex eaque inventore, maiores officia voluptatem reprehenderit, porro et aliquid fuga, quasi. Earum maiores quibusdam enim nam quis quidem iure consequuntur, possimus aut. Magnam maxime veritatis quia. Sed eos rerum voluptatem laborum!', 'FB_IMG_1428294613064.jpg', '2022-10-21'),
(5, 45, 'rewrewfdsfs', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_Id` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `verification_code` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `dob`, `age`, `address`, `email`, `contact`, `password`, `image`, `image_Id`, `date_registered`, `verification_code`) VALUES
(44, 'Erwin', 'Cabag', 'Son', '', 'Male', '2022-05-12', 343, 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin12@gmail.com', '09359428963', '0192023a7bbd73250516f069df18b500', '308654169_1789272404756082_5926404618530617886_n.jpg', 'art-hauntington-jzY0KRJopEI-unsplash.jpg', '2022-05-21', '528465'),
(45, 'dsa', 'dsad', 'dsa', 'e', 'Male', '2022-10-11', 22, 'dsa', 'dsads@gmail.com', '435454', '5f039b4ef0058a1d652f13d612375a5b', 'Screenshot (158).png', '', '2022-10-20', ''),
(46, 'fdsfs', 'dfsdfs', 'fdsfsdfsd', '', 'Female', '2022-02-09', 9, 'fdsfsfsfsfsdf', 'fdfdsfsdsfd23fsfdsfsdfsf@gmail.com', '9359428963', 'd340c5e973c682f96d59a024085bd202', '308654169_1789272404756082_5926404618530617886_n.jpg', '', '2022-12-04', ''),
(47, 'dsadad', 'sadadadas', 'dsadsad', '', 'Female', '2021-08-10', 1, 'dsada', 'fdfdsfsdsfd23fs@gmail.com', '9359428963', '033c91317f9b6795106a825cf8ef773d', '308654169_1789272404756082_5926404618530617886_n.jpg', '316380866_1455490064960906_6159136051481967122_n.jpg', '2022-12-04', ''),
(48, 'gfd', 'gdfgdf', 'gdfgdf', 'gdfgdf', 'Male', '2021-03-11', 1, 'fgdgdfgdg', 'admigfdgdfn@gmail.com', '9359428963', 'a1b0d5228df73c24196f32b30acc5285', '308654169_1789272404756082_5926404618530617886_n.jpg', 'ali-pazani-9uaNYCqjDLw-unsplash.jpg', '2022-12-04', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_Id`);

--
-- Indexes for table `posted`
--
ALTER TABLE `posted`
 ADD PRIMARY KEY (`post_Id`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
 ADD PRIMARY KEY (`testimony_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posted`
--
ALTER TABLE `posted`
MODIFY `post_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
MODIFY `testimony_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
