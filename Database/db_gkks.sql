-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 06:30 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gkks`
--
CREATE DATABASE IF NOT EXISTS `db_gkks` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_gkks`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_status` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_status`) VALUES
(1, 'Ravi Parmar', 'rviparmar18@gmail.com', '9638657382', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `cat_status` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_status`) VALUES
(9, 'Rakshbaandhan', '1'),
(10, 'Rakhi', '1'),
(11, 'asdas', '1'),
(12, 'sdfsdf', '1'),
(13, 'dfgdfgdfg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE IF NOT EXISTS `tbl_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_cat` int(11) NOT NULL,
  `event_detail` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_photo` varchar(5000) NOT NULL,
  `event_status` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_name`, `event_cat`, `event_detail`, `start_date`, `end_date`, `event_photo`, `event_status`) VALUES
(31, 'Samuh Bhojan', 10, 'dgsdfgdf', '2015-08-20', '2015-08-20', '../../image/event/Lighthouse.jpg,../../image/event/matrimonial bc.jpg', '1'),
(32, 'merrage', 11, 'adjklsajdlk\r\nsadsadsdasdasd\r\nasdasdasdasd\r\nasdasda\r\nads', '2015-08-22', '2015-08-23', '../../image/event/BAPS_Dhari_Mandir_Pratishtha_Sabha_19_f.jpg,../../image/event/Chrysanthemum.jpg', '1'),
(33, 'Samuh Bhojan', 10, 'weruui wueuiwyui wuieryu yuiwyeru uiyweuiry uyuiwery uiyweury uiwery uiwyer uyweuiry uiwery uiyeuiryw euiyrwuiery uiwery uiwyer uiywer yuiryew uiw', '2016-01-16', '2016-01-16', '../../image/event/imagebc.png', '1'),
(34, 'merrage', 11, 'asdsddasd\r\nasdasd\r\nasdasasdas\r\nsdfdsfsdf\r\nsaaasd s\r\nasdasdsadsa\r\nasdadasd', '2015-08-21', '2015-08-22', '../../image/event/Chrysanthemum.jpg,../../image/event/Lighthouse.jpg', '1'),
(35, 'andolan', 11, 'badha bhai ne khas vinanti chhe ke aa andolan ma bhag leva vinanti', '2015-08-22', '2015-08-26', '../../image/event/Lighthouse.jpg,../../image/event/Penguins.jpg', '1'),
(36, 'Job Fair', 11, 'We are arrange job fair for freshers', '2015-09-26', '2015-09-26', '../../image/event/bg.jpg,../../image/event/bx_loader.gif,../../image/event/imagebc.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `gallery_photo` varchar(500) NOT NULL,
  `gallery_status` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `category`, `gallery_photo`, `gallery_status`) VALUES
(1, 9, '../../image/gallery/Chrysanthemum.jpg', '1'),
(2, 9, '../../image/gallery/Desert.jpg', '1'),
(3, 11, '../../image/gallery/Hydrangeas.jpg', '1'),
(4, 11, '../../image/gallery/Hydrangeas.jpg', '1'),
(5, 11, '../../image/gallery/Desert.jpg', '1'),
(6, 10, '../../image/gallery/Penguins.jpg', '1'),
(7, 11, '../../image/gallery/Tulips.jpg', '1'),
(8, 13, '../../image/gallery/Lighthouse.jpg', '1'),
(9, 11, '../../image/gallery/Koala.jpg', '1'),
(10, 9, '../../image/gallery/Desert.jpg', '1'),
(11, 10, '../../image/gallery/Penguins.jpg', '1'),
(12, 11, '../../image/gallery/Hydrangeas.jpg', '1'),
(13, 11, '../../image/gallery/Penguins.jpg', '1'),
(14, 13, '../../image/gallery/Tulips.jpg', '1'),
(15, 13, '../../image/gallery/Jellyfish.jpg', '1'),
(17, 11, '../../image/gallery/BAPS_Dhari_Mandir_Pratishtha_Sabha_19_f.jpg', '1'),
(18, 11, '../../image/gallery/bg.jpg', '1'),
(19, 9, '../../image/gallery/imagebc.png', '1'),
(20, 11, '../../image/gallery/slide-2.jpg', '1'),
(21, 12, '../../image/gallery/Penguins.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

CREATE TABLE IF NOT EXISTS `tbl_inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `person_name` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`inquiry_id`, `person_name`, `city`, `state`, `country`, `mobile`, `email`, `message`) VALUES
(1, 'ravi parmar', 'ahmedabad', 'gujarat', 'india', '9638657382', 'rviparmar18@gmail.com', 'hello all how are you friends'),
(4, 'ravi', 'Ahmedabad', 'Gujarat', 'India', '9638657382', 'rvipamar18@yahoo.com', 'sdfuiy sdufiyui ysuidfyui'),
(5, 'ravi', 'Ahmedabad', 'Gujarat', 'India', '9638657382', 'rvipamar18@yahoo.com', 'hello Everyone How are you?\r\nI have some Problem?:( please Help Me'),
(6, 'asas', 'asds', 'asdasd', 'asdsd', '123456', 'abc123@gmail.com', 'abcdefghijklmnopqrstuvwxyz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `member_id` int(11) NOT NULL,
  `member_password` varchar(30) NOT NULL,
  `member_first_name` varchar(20) NOT NULL,
  `member_middle_name` varchar(20) NOT NULL,
  `member_surname` varchar(20) NOT NULL,
  `member_gender` varchar(7) NOT NULL,
  `member_dob` date NOT NULL,
  `member_type` varchar(30) NOT NULL,
  `member_education` varchar(50) NOT NULL,
  `member_company_name` varchar(50) NOT NULL,
  `member_designation` varchar(20) NOT NULL,
  `member_office_address` varchar(500) NOT NULL,
  `member_city` varchar(30) NOT NULL,
  `member_state` varchar(30) NOT NULL,
  `member_country` varchar(30) NOT NULL,
  `member_area` varchar(20) NOT NULL,
  `member_address` varchar(500) NOT NULL,
  `member_mobile` varchar(15) NOT NULL,
  `member_email` varchar(30) NOT NULL,
  `member_photo` varchar(500) NOT NULL,
  `member_status` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `member_password`, `member_first_name`, `member_middle_name`, `member_surname`, `member_gender`, `member_dob`, `member_type`, `member_education`, `member_company_name`, `member_designation`, `member_office_address`, `member_city`, `member_state`, `member_country`, `member_area`, `member_address`, `member_mobile`, `member_email`, `member_photo`, `member_status`) VALUES
(1, '123456', 'Akash', 'Harshadbhai', 'Mavadiya', 'Male', '1980-04-07', 'Any Graduate', 'Diploma', 'Hollyhock Flower Co', 'Partner', 'hfkjdh djkfhjdkh kdjfhjdk sjdfh kj', 'Ahmedabad', 'Gujarat', 'India', 'Nirnaynagar', 'dfdfsdfkjh skjdfhsjkd sjf', '9638527410', 'abc123@gmail.com', 'image/member/Chrysanthemum.jpg', '1'),
(2, '147258', 'Ashish', 'Hasmukhbhai', 'Kacha', 'Male', '1991-06-16', 'Goverment Employee', 'M.TECH', 'SURAJ MUCHHALA POLYTECHNIC', 'PRINCIPAL', 'GONDAL , RAJKOT', 'Junagadh', 'Gujarat', 'India', 'Junagadh', '203,NAKSHATRA APPARTMENT - SARDARPARA JUNAGADH', '9428692258', 'victory@aashishkacha.com', 'image/member/Desert.jpg', '1'),
(3, '123456', 'Ravi', 'Rameshbhai', 'Parmar', 'Male', '1993-04-07', 'IT Professional', 'Mscit', 'Kudosknack', 'PHP Developer', 'askjadshkj jaksdhjksah hasjdh asjk hjashd', 'Ahmedabad', 'Gujarat', 'India', 'Thaltej', 'sfghjdsgfks kjshfkjhsdkjf skjdhfkjsdfh', '9638657382', 'rviparmar18@gmail.com', 'image/member/12032013938.jpg', '1'),
(4, 'bhaveshvs', 'Bhavesh', 'Vaghajibhai', 'Solanki', 'Male', '1995-10-16', 'Civil Engineer', 'Civil engineer', 'Geomaze consultancy & Infrastructure', 'Owner', 'FF, 53 Shirmad Bhavan Kanta Vikash Gruh Near Kathiyawadi Metal On 2Floor Rajkot', 'Rajkot', 'Gujarat', 'India', 'Rajkot', '5/3 Conear Ganesh Marbal Seri', '9909753539', 'bhavinvsolanki@gmail.com', 'image/member/Hydrangeas.jpg', '1'),
(5, '123456', 'Akshita', 'Maheshbhai', 'Rathod', 'Female', '1994-04-02', 'IT Professional', 'ma', 'Atri Foundation', 'Admin', 'Usmanpura', 'Ahmedabad', 'Gujarat', 'India', 'kankariya', '51-395, GHB Opp New Mentalbari,Meghaninagar road, Kalapinagar, Ahmedabad', '7894561235', 'akshitakadia@gmail.com', 'image/member/Jellyfish.jpg', '1'),
(6, '9638657382', 'Ravi', 'Rameshbhai', 'Parmar', 'Male', '1993-04-07', 'IT Professional', 'MscIT', 'Kudosknack', 'PHP Developer', 'SF 16 vandemataram arked, new sg road,gota ,Ahmedabad', 'Gunadala', 'Gujarat', 'India', 'Thaltej', '301 prajapati vas opp.AMC office thaltej Ahmedabad', '9638657382', 'rviparmar18@yahoo.com', 'image/member/12032013938.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_metrimonial`
--

CREATE TABLE IF NOT EXISTS `tbl_metrimonial` (
  `matrimonial_id` int(11) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `body_type` varchar(10) NOT NULL,
  `complexion` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `education` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `income` varchar(10) NOT NULL,
  `place_of_birth` varchar(20) NOT NULL,
  `grew_up_in` varchar(20) NOT NULL,
  `present_location` varchar(20) NOT NULL,
  `my_personality` varchar(500) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `partner_preference` varchar(500) NOT NULL,
  `father_name` varchar(20) NOT NULL,
  `mother_name` varchar(20) NOT NULL,
  `mosal_name` varchar(20) NOT NULL,
  `mosal_surname` varchar(30) NOT NULL,
  `mosal_native` varchar(20) NOT NULL,
  `no_of_brother` varchar(2) NOT NULL,
  `no_of_sister` varchar(2) NOT NULL,
  `family_detail` varchar(500) NOT NULL,
  `contact_detail` varchar(500) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_metrimonial`
--

INSERT INTO `tbl_metrimonial` (`matrimonial_id`, `email_id`, `password`, `first_name`, `middle_name`, `last_name`, `dob`, `height`, `weight`, `gender`, `body_type`, `complexion`, `photo`, `education`, `occupation`, `income`, `place_of_birth`, `grew_up_in`, `present_location`, `my_personality`, `hobbies`, `partner_preference`, `father_name`, `mother_name`, `mosal_name`, `mosal_surname`, `mosal_native`, `no_of_brother`, `no_of_sister`, `family_detail`, `contact_detail`, `status`) VALUES
(13, 'rviparmar18@yahoo.com', '147258', 'Ravi', 'Rameshbhai', 'Parmar', '1993-04-07', '5.8', '55', 'Male', 'Average', 'Wheatish', 'image/matrimonial/Koala.jpg', 'MscIt', 'Job', '10000', 'aaa', 'bbb', 'Ccc', 'qiouio kjhfkjh kjdsfh kjsdfkjh kjsdhf kj', 'asdasdsy yuisdyuisa uiasydui', 'sadsdyu yusadtuys uysduy uyasd', 'Rameshbhai', 'Bhanuben', 'asdasd', 'Tank', 'Piplana', '1', '0', 'slkdj adskj lkaj', 'lksajdlk', '1'),
(14, 'abc123@gmail.com', '123456', 'asd', 'adasd', 'asdasd', '1995-03-03', '5.2', '55', 'Male', 'Slim', 'Fair', 'image/matrimonial/Lighthouse.jpg', 'asda', 'lkjsadlkj', '5200', 'sajdlakj', 'kl kjlkjkl', 'Ahmedabad', 'sakjdlkajlak ksjalk jd', 'klsjdlkadsj kjasdlk jlkj', 'lkjslkdajlk jadkl jlk', 'jsadlkjdslkj', 'kjsadjlk', 'kksldj', 'kja kldsj', 'j kladsj', '1', '0', 'lksdjad kldsaj klj', 'ksjdlakdjlk kj', '1'),
(15, 'hjgjh@sad.com', '123456', 'sada', 'jhjkh', 'jhkj', '1985-02-02', '5.6', '55', 'Male', 'Average', 'Fair', 'image/matrimonial/Hydrangeas.jpg', 'Mscit', 'oiaudio', '52000', 'dois', 'opidsfopi', 'Ahmedabad', 'iosidfopsidfop odfsiop', 'oidsopai', 'opi iopiffi', 'oidsfopsop', 'opaidaopdi', 'opsidopsiad', 'oidsfop', 'osfiopsfi', '1', '0', 'dskfjk dflkjdslkfj', 'ksjdlkajdaksj', '1'),
(17, 'dfsfdsf@sdf.sdf', '111111', 'sfslf', 'llkl', 'klk', '1993-04-16', '5.5', '55', 'Female', 'Slim', 'Fair', 'image/matrimonial/Chrysanthemum.jpg', 'Mscit', 'kljsklf', '2400', 'lkjlkjlk', 'kjakdjsk', 'Ahmedabad', 'jhsajkdahkjsdh', 'jkasdajskh', 'jhsakjdjk', 'jkajsd', 'jhjkasdj', 'jkfha', 'jhjkash', 'kjdajsd', '1', '0', 'jsahdjk hjkashd kjhsadkjasd', 'kjsdhaskj kjsdhj kskjdh jsk', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_metrimonial`
--
ALTER TABLE `tbl_metrimonial`
  ADD PRIMARY KEY (`matrimonial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_metrimonial`
--
ALTER TABLE `tbl_metrimonial`
  MODIFY `matrimonial_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
