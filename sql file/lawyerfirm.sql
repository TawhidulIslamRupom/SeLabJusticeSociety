-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 07:06 AM
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
-- Database: `lawyerfirm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `profilepic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `name`, `profilepic`) VALUES
('admin@gmail.com', 'admin', 'Admin ', '52014028_813386829016969_6102635605441642496_n_813386825683636.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `id` int(11) NOT NULL,
  `client` text NOT NULL,
  `lawyer` text NOT NULL,
  `fromdate` text NOT NULL,
  `details` text NOT NULL,
  `transaction` text NOT NULL,
  `approve` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`id`, `client`, `lawyer`, `fromdate`, `details`, `transaction`, `approve`, `status`) VALUES
(13, 'cronos@gmail.com', 'jhon22@gmail.com', '2024-02-28', 'I want to hire you.', 'TXD232103XF', 1, 'seen'),
(14, 'alvee@gmail.com', 'brian22@gmail.com', '2024-02-28', 'I want to hire you.', 'TXD232104XF', 1, 'unseen'),
(15, 'gggk@gmail.com', 'michael@gmail.com', '2024-04-16', 'Hello myself ggg', 'ffffff', -1, 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `email` varchar(700) NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `phonenumber` text NOT NULL,
  `picture` text NOT NULL,
  `joindate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`email`, `password`, `name`, `phonenumber`, `picture`, `joindate`) VALUES
('nazmul@gmail.com', 'nazmul', 'Nazmul pradhan', '01911725846\r\n', 'CRONOS.png', '2024-02-28 21:28:35'),
('takwa@gmail.com', 'takwa', 'Takwa Akter', '01720397255', 'home3.png', '2024-02-28 22:43:48'),
('tawhidul@gmail.com', 'tawhidul', 'Tawhidul Islam', '01938698723', '20200107_162654.jpg', '2024-02-28 22:45:17'),
('uuu@gmail.com', '1234', 'Thomas Shelby', '01234567896', 'n.jpg', '2024-02-29 21:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `lawyercategories`
--

CREATE TABLE `lawyercategories` (
  `id` int(11) NOT NULL,
  `category` varchar(700) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyercategories`
--

INSERT INTO `lawyercategories` (`id`, `category`, `description`, `image`) VALUES
(1, 'Bankruptcy Lawyer', 'Bankruptcy lawyers are experts in the U.S. Bankruptcy Code, and handle insolvency issues for individuals or corporations.', 'Bankruptcy Lawyer.jpg'),
(2, 'Business Lawyer', 'Business lawyers, also known as corporate lawyers, handle legal matters for businesses and ensure that all company transactions occur within the scope of local, state, and federal laws.', 'corporate-law-1024x782.jpg'),
(3, 'Criminal Defense Lawyer', 'Criminal defense lawyers advocate on behalf of those accused of criminal activity and ensure that their liberties and basic rights are fairly upheld within the justice system.', 'c3ee2a89-b973-445f-9337-1ca05736c950.jpg'),
(4, 'Employment and Labor Lawyer', 'Employment and labor lawyers broadly handle the relationships between unions, employers, and employees.', 'services1.jpg'),
(5, 'Estate Planning Lawyer', 'An estate planning lawyer is well-versed in the intricacies of property rights, wills, probate, and trusts.', 'services4.jpg'),
(6, 'Family Lawyer', 'While many people may think of family lawyers as divorce attorneys who handle the division of marital assets, child custody, and alimony, family law extends to many more issues.', 'services3.jpg'),
(7, 'Personal Injury Lawyer', 'Personal injury lawyers work primarily in civil litigations, representing clients who have sustained an injury.', 'town-n-country-florida-personal-injury-attorneys.jpg'),
(8, 'Immigration Lawyer', 'Immigration lawyers play a pivotal role in providing guidance to individuals and families navigating the necessary requirements to live, work, or study in the U.S.', 'immigration-lawyer-dallas.jpg'),
(9, 'Tax Lawyer', 'Tax lawyers understand the ins and outs of tax laws and regulations, and work in a variety of settings.', 'Tax-Law-Northern-Kentucky-Florence-Tax-Attorney.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `email` varchar(700) NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `categoryid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `phonenumber` text NOT NULL,
  `bkashnumber` text NOT NULL,
  `location` text NOT NULL,
  `picture` text NOT NULL,
  `joindate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`email`, `password`, `name`, `categoryid`, `rate`, `description`, `phonenumber`, `bkashnumber`, `location`, `picture`, `joindate`) VALUES
('brian22@gmail.com', 'brian22', 'Brian', 3, 6200, 'I am a senior lawyer at Justice Society and am the Founder of Justice Society Criminal Defense, a Full-Service Criminal Law firm with central law offices across Mymensingh. My professional experience consists of countless court appearances, thousands of successful defenses, and satisfied clients. Over the last 10 years, I have worked to build a law office where all the lawyers share our collective experience, resources, and passion for helping people. Our team approach to legal representation is client–rather than law–centered. We look for opportunities to add value to our clients through strategic thinking and creative solutions. Not every case is won through trial. In fact, the best results are often achieved through alternative resolution strategies, so that the matter never gets to trial. Although I am trained as a trial lawyer, I prefer to be viewed as a problem solver. My goal is to provide each and every client with the highest quality of care and the best possible result. In my professional legal career, I have successfully defended hundreds upon hundreds of criminal cases. I have appeared at all levels of courts in Mymensingh, including at the Supreme Court of Dhaka. I am also the advising lawyer for Student Legal Assistance, which is a non-profit group of law students at the University of Dhaka that helps low-income people get legal help and access to justice. ', '01497345511', '01497345511', 'Mymensingh', 'istockphoto-913062404-612x612.jpg', '2024-02-28 22:58:22'),
('elena22@gmail.com', 'elena22', 'Elena', 5, 11000, 'Hi, My Name is Elena.', '01789242311', '01789242311', 'Noyakhali', 'Elena-Small-Lawyer.jpg', '2024-02-28 20:26:34'),
('greg22@gmail.com', 'greg22', 'Greg', 4, 10000, 'Hi, My Name is Greg.', '01789242201', '01789242201', 'Dinajpur', 'Greg-Janzen-Lawyer.jpg', '2024-02-28 20:23:12'),
('ian22@gmail.com', 'ian22', 'Ian', 2, 7500, 'Hi, My Name is Ian.', '01399523019', '01399523019', 'Gazipur', 'ian-headshot-2.jpg', '2024-02-28 20:18:54'),
('james22@gmail.com', 'james22', 'James', 2, 5500, 'Hi, My Name is James.', '01699346510', '01699346510', 'Khulna', 'Lom_Andrew_AL16369_300dpi.jpg', '2024-02-28 21:04:48'),
('jennifer22@gmail.com', 'jennifer22', 'Jennifer', 4, 8500, 'Hi, My Name is Jennifer.', '01789298785', '01789298785', 'Khulna', 'istockphoto-515630181-612x612.jpg', '2024-02-28 22:53:30'),
('jhon22@gmail.com', 'jhon22', 'John', 1, 5000, 'Hi, My name is Jhon.', '01789242102', '01789242102', 'Dhaka', 'team4.jpg', '2024-02-28 20:55:39'),
('Joseph22@gmail.com', 'Joseph22', 'Joseph', 5, 8200, 'Hi, My Name is Joseph.', '01497346611', '01497346611', 'Chittagong', 'steven-bell-bio-large.jpg', '2024-02-28 21:24:32'),
('julia22@gmail.com', 'Julia22', 'Julia', 7, 9500, 'Hi, My Name is Julia.', '01897346610', '01897346610', 'Kumilla', 'Julia-Small-Lawyer.jpg', '2024-02-28 20:37:35'),
('michael@gmail.com', 'michael', 'Michael', 3, 9000, 'Hi, My name is Michael.', '018973465411', '018973465411', 'Dhaka', 'michael_oykhman.jpg', '2024-02-28 20:12:55'),
('moira22@gmail.com', 'moira22', 'Moira', 6, 8500, 'Hi, My Name is Moira.', '01789244103', '01789244103', 'Munshiganj', 'Moira-McAvoy.jpg', '2024-02-28 20:34:41'),
('Richard22@gmail.com', 'Richard22', 'Richard', 9, 6500, 'Hi, My Name is Richard.', '01399242106', '01399242106', 'Mymensingh', 'team3.jpg', '2024-02-28 21:19:00'),
('Robert22@gmail.com', 'Robert22', 'Robert', 6, 6000, 'Hi, My Name is Robert.', '01897346510', '01897346510', 'Narayanganj', 'team1.jpg', '2024-02-28 20:59:37'),
('ryan22@gmail.com', 'ryan22', 'Ryan', 1, 8000, 'Hi, My Name is Ryan.', '01632124351', '01632124351', 'Dhaka', 'ryan-headshot.jpg', '2024-02-28 20:15:39'),
('thomas22@gmail.com', 'thomas22', 'Thomas', 8, 8000, 'Hi, My name is Thomas.', '01897346511', '01897346511', 'Dhaka', 'Morgan.Craig_.LaunchEdit.jpg', '2024-02-28 19:36:35'),
('william22@gmail.com', 'william22', 'William', 7, 7500, 'Hi, My Name is William.', '01897346522', '01897346522', 'Narayanganj', 'Craig_Morgan.jpg', '2024-02-28 22:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote` varchar(750) NOT NULL,
  `writer` text NOT NULL,
  `identity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote`, `writer`, `identity`) VALUES
('A lawyer without history or literature is a mechanic, a mere working mason; if he possesses some knowledge of these, he may venture to call himself an architect.', 'Walter Scott', 'Scottish novelist'),
('Being a lawyer is not merely a vocation. It is a public trust, and each of us has an obligation to give back to our communities.', 'Janet Reno', 'Former United States Attorney General'),
('Discourage litigation. Persuade your neighbors to compromise whenever you can. As a peacemaker the lawyer has superior opportunity of being a good man. There will still be business enough.', 'Abraham Lincoln', '16th U.S. President'),
('The doctor sees all the weakness of mankind; the lawyer all the wickedness, the theologian all the stupidity.', 'Arthur Schopenhauer', 'German philosopher'),
('Your attitude will go a long way in determining your success, your recognition, your reputation and your enjoyment in being a lawyer.', 'Joe Jamail', 'American attorney');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `email` varchar(500) NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `twitter` text NOT NULL,
  `whatsapp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`email`, `facebook`, `instagram`, `twitter`, `whatsapp`) VALUES
('brian22@gmail.com', 'Brian22', '', 'Brian22', '01497345511'),
('elena22@gmail.com', 'elena', '', 'elena22', ''),
('greg22@gmail.com', 'Greg', 'I_AM_Greg', '', ''),
('ian22@gmail.com', 'iamian', '', '', '01399523019'),
('james22@gmail.com', 'James22', 'James22', '', ''),
('jennifer22@gmail.com', 'Jennifer', 'Jennifer', 'Jennifer22', ''),
('jhon22@gmail.com', 'jhon22', 'jhon22', 'jhon22', '0125849633347'),
('Joseph22@gmail.com', 'Joseph', '', 'Joseph22', '01497346611'),
('michael@gmail.com', '', 'michael22', '', '018973465411'),
('Richard22@gmail.com', 'Richard', 'Richard22', '', '01399242106'),
('Robert22@gmail.com', 'Robert', 'Robert22', 'Robert22', '01897346510'),
('ryan22@gmail.com', 'Ryan', 'Ryan22', 'Ryan22', '01632124351'),
('thomas22@gmail.com', 'Thomas', '', 'thomas22', '01897346511'),
('william22@gmail.com', 'William22', '', '', '01897346522');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `lawyercategories`
--
ALTER TABLE `lawyercategories`
  ADD PRIMARY KEY (`id`,`category`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lawyercategories`
--
ALTER TABLE `lawyercategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
