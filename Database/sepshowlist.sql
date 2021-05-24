-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 05:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepshowlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `userID` int(11) NOT NULL,
  `username` text NOT NULL,
  `password_hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`userID`, `username`, `password_hash`) VALUES
(1, 'admin1', '$2y$10$Td1/B4V6gGVezqxjeekIbOHsroyzlukriFAtjQFIltzvA0ngczMSy');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `catDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `catDesc`) VALUES
(1, 'Action/Adventure'),
(2, 'Drama'),
(3, 'Anime/Cartoon'),
(4, 'Sci-Fi'),
(5, 'Fantasy'),
(6, 'Historical Fiction'),
(7, 'Comedy'),
(8, 'Satire'),
(9, 'Mystery'),
(10, 'Game Show'),
(11, 'Soap Opera'),
(12, 'Children\'s TV'),
(13, 'Reality TV'),
(14, 'Sports'),
(15, 'Chat Show'),
(16, 'News'),
(17, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `showID` int(11) NOT NULL,
  `showName` text NOT NULL,
  `showDesc` text NOT NULL,
  `showEp` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `showCat` int(11) NOT NULL,
  `showStu` int(11) NOT NULL,
  `showImage` text NOT NULL,
  `isAiring` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`showID`, `showName`, `showDesc`, `showEp`, `startDate`, `endDate`, `showCat`, `showStu`, `showImage`, `isAiring`) VALUES
(3, 'Invincible', 'The series revolves around Mark Grayson, a 17-year-old boy whose father is Omni-Man, and his transformation into a superhero under the guidance of his father. In April 2021, Amazon renewed the series for a second and third season.', 9, '2021-03-25', '2021-04-29', 1, 14, 'invincible.jpg', NULL),
(4, 'Countdown', 'Countdown is a British game show involving word and number tasks.', 1239, '2011-02-14', '2021-05-20', 13, 7, 'countdown.jpg', 0),
(5, 'Star Wars: The Bad Batch', 'Members of a unique squad of clones find their way in a changing galaxy in the aftermath of the Clone War.', 4, '2021-05-04', '0000-00-00', 3, 2, 'badbatch.jpeg', 0),
(6, 'Friends', 'Follow the lives of six reckless adults living in Manhattan, as they indulge in adventures which make their lives both troublesome and happening.', 236, '1994-09-22', '2004-05-06', 13, 5, 'friends.jpg', NULL),
(7, 'Castlevania', 'Castlevania is an American anime-style adult animated streaming television series on Netflix produced by Frederator Studios. Based on the Japanese video game series of the same name by Konami, the first two seasons adapt the 1989 entry Castlevania III: Dracula\'s Curse and follow Trevor Belmont, Alucard and Sypha Belnades as they defend the nation of Wallachia from Dracula and his minions. Characters and elements from the 2005 entry Castlevania: Curse of Darkness are also featured beginning in the second season.', 32, '2017-07-07', '2021-05-13', 3, 1, 'castlevania.jpg', NULL),
(8, 'Friday Night Dinner', 'Adam and Jonny Goodman, two siblings belonging to an eccentric family, join their parents for a peaceful dinner every Friday night. However, despite great care, things always turn chaotic.\r\n', 37, '2011-02-25', '2020-05-01', 7, 7, 'fridaynightdinner.jpg', NULL),
(9, 'Jojo\'s Bizarre Adventure', 'Jonathan Joestar, nicknamed JoJo, becomes involved in a battle against his stepbrother, Dio Brando, who is intent on taking control of the Joestar fortune. To do this, Dio uses the power of an ancient stone mask, which allows him to become a powerful vampire. The hybrid anime series takes pieces from such genres as paranormal, adventure, comedy, action and fantasy.', 152, '2012-10-05', '0000-00-00', 3, 13, 'jojo.jpg', 0),
(10, 'Brooklyn 99', 'Ray Holt, an eccentric commanding officer, and his diverse and quirky team of odd detectives solve crimes in Brooklyn, New York City.\r\n', 143, '2013-09-17', '0000-00-00', 7, 11, 'brooklyn99.jpg', 0),
(11, 'It\'s Always Sunny in Philidelphia', 'A group of five selfish underachievers co-own a decrepit Irish bar and are involved in various controversies. There is no unity among them as they constantly keep plotting against each other.', 154, '2005-08-04', '0000-00-00', 7, 11, 'iasip.jpg', 0),
(12, 'Attack on Titan', 'Attack on Titan is a Japanese dark fantasy anime television series adapted from the manga of the same name by Hajime Isayama that premiered on April 7, 2013. It is set in a world where humanity lives inside cities surrounded by three enormous walls that protect them from the gigantic man-eating humanoids referred to as Titans; the story follows Eren Yeager, who vows to exterminate the Titans after a Titan brings about the destruction of his hometown and the death of his mother.', 75, '2013-04-07', '0000-00-00', 3, 12, 'aot.jpg', 0),
(13, 'The Simpsons', 'Working-class father Homer Simpson and his dysfunctional family deal with comical situations and the ups-and-downs of life in the town of Springfield.', 705, '1989-12-17', '0000-00-00', 2, 11, 'simpsons.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `stuID` int(11) NOT NULL,
  `stuName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`stuID`, `stuName`) VALUES
(1, 'Netflix'),
(2, 'Disney'),
(3, 'ITV Studios'),
(4, 'Marvel Studios'),
(5, 'Sony Pictures Television'),
(6, 'E1 Entertainment'),
(7, 'BBC Television'),
(8, 'Lucasfilm'),
(9, 'Pinewood Group'),
(10, 'AMC Studios'),
(11, 'Fox Broadcasting Company'),
(12, 'Wit Studio'),
(13, 'David Production'),
(14, 'studio Bones'),
(15, '20th Television'),
(16, 'Big Talk Production'),
(17, 'Amazon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`showID`) USING BTREE;

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`stuID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `showID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `stuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
