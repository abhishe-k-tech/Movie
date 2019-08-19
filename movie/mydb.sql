-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 09:03 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `actorID` int(11) NOT NULL,
  `actorName` varchar(30) NOT NULL,
  `actorGender` varchar(6) NOT NULL,
  `actorDOB` date NOT NULL,
  `actorBio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actorID`, `actorName`, `actorGender`, `actorDOB`, `actorBio`) VALUES
(7, 'Robert Downey Jr', 'male', '1988-06-15', 'Actor of Hollywood Movies.'),
(8, 'Chris Hewsworth', 'male', '1988-06-15', 'Actor of Hollywood Movies.'),
(9, 'Mark Ruffalo', 'male', '1988-06-15', 'Actor of Hollywood Movies.'),
(10, 'Chris Evans', 'male', '1988-06-15', 'Actor of Hollywood Movies.'),
(12, 'Tom Cruise', 'male', '1986-06-13', 'Actor of Hollywood.'),
(13, 'Henry Cavill', 'male', '1986-06-13', 'Actor of Hollywood.'),
(14, 'Ving Rhames', 'male', '1986-06-13', 'Actor of Hollywood.'),
(15, 'Simon Pegg', 'male', '1986-06-13', 'Actor of Hollywood.');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movieID` int(11) NOT NULL,
  `movieName` varchar(100) NOT NULL,
  `releaseYear` int(5) NOT NULL,
  `plot` varchar(2000) NOT NULL,
  `PosterUrl` varchar(20) NOT NULL,
  `cast` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movieID`, `movieName`, `releaseYear`, `plot`, `PosterUrl`, `cast`) VALUES
(1, 'Avengers Infinity War', 2018, 'The Avangers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 'uploads/avenger.jpg', 'Robert Downey Jr, Chris Hewsworth, Mark Ruffalo, Chris Evans, '),
(2, 'Mission: Impossible - Fallout', 2018, 'Ethan Hunt and his IMF team, along with some familiar allies, race against time after a mission gone wrong.', 'uploads/mission.jpg', 'Tom Cruise, Henry Cavill, Ving Rhames, Simon Pegg, ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actorID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movieID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `actorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
