-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2022 at 11:18 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.2.15-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web16_ddurro18`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appID` int(10) NOT NULL,
  `date` date NOT NULL,
  `hour` varchar(100) NOT NULL,
  `clientname` varchar(100) NOT NULL,
  `clientsurname` varchar(100) NOT NULL,
  `clientemail` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appID`, `date`, `hour`, `clientname`, `clientsurname`, `clientemail`, `type`) VALUES
(1, '2021-02-08', '09:40AM-10:00AM', 'test', 'user', 'test@epoka.edu.al', 'Simple'),
(2, '2021-02-09', '11:20AM-11:40AM', '', '', '', 'Haircut'),
(3, '2021-02-09', '11:20AM-11:40AM', '', '', '', 'Haircut'),
(4, '2021-02-09', '11:00AM-11:20AM', 'test', 'user', 'test@epoka.edu.al', 'Haircut'),
(5, '2021-02-09', '11:40AM-12:00PM', '', '', '', 'Haircut'),
(6, '2021-02-09', '13:40PM-14:00PM', 'test', 'user', 'test@epoka.edu.al', 'Haircut'),
(7, '2021-02-09', '13:40PM-14:00PM', 'test', 'user', 'test@epoka.edu.al', 'Haircut'),
(8, '2021-02-09', '13:40PM-14:00PM', 'test', 'user', 'test@epoka.edu.al', 'Haircut'),
(9, '2021-02-10', '09:40AM-10:00AM', 'test', 'user', 'test@epoka.edu.al', 'Haircut'),
(10, '2021-05-03', '09:20AM-09:40AM', 'test', 'user', 'test@epoka.edu.al', 'Haircut'),
(11, '2022-07-03', '09:00AM-09:20AM', 'test', 'user', 'test@epoka.edu.al', 'Haircut'),
(12, '2022-08-06', '13:40PM-14:00PM', 'test', 'user', 'test@epoka.edu.al', 'Haircut');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `appID` int(10) NOT NULL,
  `date` date NOT NULL,
  `hour` varchar(100) NOT NULL,
  `clientname` varchar(100) NOT NULL,
  `clientsurname` varchar(100) NOT NULL,
  `clientemail` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`appID`, `date`, `hour`, `clientname`, `clientsurname`, `clientemail`, `type`) VALUES
(1, '2021-02-08', '09:00AM', 'test', 'user', 'test@epoka.edu.al', 'Durres'),
(2, '2021-02-09', '11:00AM', 'Teuta', 'Shefit', 'tsh@yahoo.com', 'Kavaje'),
(3, '2021-02-09', '12:00AM', 'ester', 'duro', 'dester@gmail.com', 'Fier'),
(4, '2021-02-09', '10:00AM', 'sanada', 'naco', 'snaco@gmail.com', 'Vlore'),
(5, '2021-02-09', '12:00AM', 'soleil', 'dalipi', 'soleiild@yahoo.com', 'Elbasan'),
(6, '2021-02-09', '10:00AM', 'edeil', 'dielli', 'dedeil@gmail.com', 'Shkoder'),
(7, '2022-08-06', '13:20PM-13:40PM', 'test', 'user', 'test@epoka.edu.al', 'Durres'),
(8, '2022-08-06', '11:20AM-11:40AM', 'test', 'user', 'test@epoka.edu.al', 'Durres');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `Price` varchar(35) NOT NULL,
  `Description` varchar(35) NOT NULL,
  `CustCount` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `Name`, `Price`, `Description`, `CustCount`) VALUES
(1, 'Durres', '$10', 'Every 30 min the bus departs', '150'),
(2, 'Elbasan', '$12', 'Every 45 min the bus departs', '120'),
(3, 'Fier', '$15', 'Every 1 hour the van departs', '80'),
(4, 'Vlore', '$15', 'Every 1 hour the bus departs', '140'),
(5, 'Lushnje', '$15', 'Every 1 hour the van departs l', '60'),
(6, 'Lezhe', '$15', 'Every 2 hours the bus departs', '50'),
(7, 'Shkoder', '$15', 'Every 4 hours the bus departs', '100'),
(8, 'Sarande', '$15', 'Every 5 hours the bus departs', '70');

-- --------------------------------------------------------

--
-- Table structure for table `consumables`
--

CREATE TABLE `consumables` (
  `id` int(10) NOT NULL,
  `name` varchar(35) NOT NULL,
  `type` varchar(35) NOT NULL,
  `category` varchar(35) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `code` varchar(35) NOT NULL,
  `brand` varchar(35) NOT NULL,
  `quantity` int(10) NOT NULL,
  `purchaseprice` int(10) NOT NULL,
  `sellingprice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumables`
--

INSERT INTO `consumables` (`id`, `name`, `type`, `category`, `picture`, `code`, `brand`, `quantity`, `purchaseprice`, `sellingprice`) VALUES
(1, 'Neutrogena Cleanser', ' Cleanser', 'consumable', 'cleanser.jpeg', 'N543J', 'Neutrogena', 20, 10, 12),
(3, 'Blonde Shampoo', 'Shampoo', 'consumable', 'anti.jpg', 'N186J', 'Infinity', 15, 8, 13);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `quality_score` tinyint(50) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `quality_score`, `feedback`) VALUES
(1, 1, 'Great service');

-- --------------------------------------------------------

--
-- Table structure for table `itemssold`
--

CREATE TABLE `itemssold` (
  `id` int(42) NOT NULL,
  `date` date NOT NULL,
  `clientname` varchar(42) NOT NULL,
  `clientsurname` varchar(42) NOT NULL,
  `itemname` varchar(42) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `labten`
--

CREATE TABLE `labten` (
  `id` int(11) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `Surname` varchar(35) NOT NULL,
  `Job` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labten`
--

INSERT INTO `labten` (`id`, `Name`, `Surname`, `Job`) VALUES
(1, 'Eda', 'Kuca', 'Data Analyst'),
(2, 'Mira', 'Luli', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `nonconsumables`
--

CREATE TABLE `nonconsumables` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `type` varchar(35) NOT NULL,
  `category` varchar(35) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `purchaseprice` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nonconsumables`
--

INSERT INTO `nonconsumables` (`id`, `name`, `type`, `category`, `picture`, `quantity`, `purchaseprice`) VALUES
(1, 'philips dryer', 'dryer', 'nonconsumable', 'dryer.jpeg', 3, 80),
(2, 'Hair Straightener', 'Straightener', 'nonconsumable', 'hair.jpg', 3, 90);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `rid` int(100) NOT NULL,
  `linename` varchar(100) NOT NULL,
  `start` varchar(100) NOT NULL,
  `finish` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`rid`, `linename`, `start`, `finish`, `time`) VALUES
(1, 'Line 1 Selite-Kristal-Qender-Stacioni i Trenit-Allias', 'Selite', 'Allias', 'every 10 min departs'),
(2, 'Line 2 Teg-Sauk-Kopshti Zoologjik-Ish Stacioni Trenit', 'Teg', 'Ish Stacioni Trenit', 'every 10 min departs'),
(3, 'Line 3  Kashar-Yzberisht-Qender', 'Kashar', 'Qender', 'every 10 min'),
(4, 'Line 4  Qender-QTU-Megatek-CityPark', 'Qender', 'City Park', 'every 10 min'),
(5, 'Line 5 Ish Kombinati i Autotraktoreve-Institut', 'Ish Kombinati i Autotraktoreve', 'Institut', 'every 10 min'),
(6, 'Line 6  Laprak-Qender', 'Laprak', 'Qender', 'every 10 min'),
(7, 'Line 7  Tufine-Qender', 'Tufine', 'Qender', 'every 10 min departs'),
(8, 'Line 8  Ish St Trenit-Qendër-Sauk-Sanatorium-Teg', 'Ish St Trenit-Qendë', 'Teg', 'every 10 min departs'),
(9, 'Line 9 Qyteti Studenti-Jordan Misja', 'Qyteti Studenti', 'Jordan Misja', 'every 10 min departs'),
(10, 'Line  10 Mihal Grameno-Marteniteti Ri-Ish F.Aviacionit ', 'Mihal Grameno', 'Ish F.Aviacionit', 'every 10 min departs'),
(11, 'Line 11  Uzina Dinamo e Re-Sharrë-5 Maji', ' Uzina Dinamo', '5 Maji', 'every 10 min departs'),
(12, 'Line 12  Porcelan-Qender', 'Laprak', 'Qender', 'every 10 min departs'),
(13, 'Line 13 Tirana e re', ' Blv. Zogu I ', 'Blv. “Zogu I', 'every 10 min departs'),
(14, 'Line 14  Unaza', 'Laprak', 'Qender', 'every 10 min departs'),
(15, 'Line 15 Kombinat-Kinostudio', ' Rruga Reshit Petrela', 'Rruga Reshit Petrela', 'every 10 min departs');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schID` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `start` varchar(10) NOT NULL,
  `finish` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schID`, `tid`, `start`, `finish`, `date`, `time`, `fee`) VALUES
(1, 2, '2022-02-08', 'Selite', '2022-03-09', '20:00', 2.55),
(2, 3, '2022-02-25', 'Qender', '2022-03-01', '14:20', 2.55),
(3, 4, '2022-02-08', 'Laprak', '0000-00-00', '07:00', 4.55),
(4, 5, '2022-02-25', 'Qyteti Stu', '0000-00-00', '09:30', 2.55);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `Price` varchar(35) NOT NULL,
  `Description` varchar(35) NOT NULL,
  `CustCount` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `Name`, `Price`, `Description`, `CustCount`) VALUES
(1, 'Haircut', '$10', 'Our professionals have great experi', '5'),
(2, 'Make Up', '$12', 'Make up by the best make up artists', '3'),
(3, 'Nails', '$15', 'We offer a variety of gels verlay l', '6');

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `stafid` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `phonenr` int(15) NOT NULL,
  `payrate` int(12) NOT NULL,
  `picture` varchar(11) NOT NULL,
  `Hours per Week` int(35) NOT NULL,
  `Social Insurance` int(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`stafid`, `name`, `surname`, `phonenr`, `payrate`, `picture`, `Hours per Week`, `Social Insurance`, `position`) VALUES
(1, 'John', 'Mayers', 673456154, 12, 'john.jpeg', 42, 60, 'Hair Dresser'),
(2, 'Maria', 'Andersen', 683440198, 8, 'maria.jpeg', 40, 60, 'Nail Technician');

-- --------------------------------------------------------

--
-- Table structure for table `transportvehicle`
--

CREATE TABLE `transportvehicle` (
  `tid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vnumber` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportvehicle`
--

INSERT INTO `transportvehicle` (`tid`, `name`, `vnumber`) VALUES
(1, 'Irisbus', 12),
(2, 'Solaris', 353),
(3, ' SOR', 799),
(4, ' polaris', 717),
(5, ' RNU', 33),
(6, ' RNV', 35);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(10) NOT NULL,
  `level` varchar(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `surname` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `level`, `name`, `surname`, `username`, `password`, `email`, `phonenumber`) VALUES
(1, '0', 'Admin', 'auser', 'admin', 'admin123', 'admin@epoka.edu.al', 692397401),
(2, '1', 'test', 'user', 'tester', 'test123', 'test@epoka.edu.al', 697298208),
(8, '1', 'user', 'tester', 'ddurro18', '9cee315f7111db4d902595f866dc6cd7', 'test@epoka.edu.al', 692794407),
(10, '1', 'User', 'Username', 'User', '5725dbcc7254ee8422d1cb60db29625c', 'test@gmail.com', 695487632),
(11, '1', 'Test', 'User', 'Test', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'testUser@hotmail.com', 698757438);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(100) NOT NULL,
  `name` varchar(42) NOT NULL,
  `surname` varchar(42) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `level` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`appID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumables`
--
ALTER TABLE `consumables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `labten`
--
ALTER TABLE `labten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonconsumables`
--
ALTER TABLE `nonconsumables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schID`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`stafid`);

--
-- Indexes for table `transportvehicle`
--
ALTER TABLE `transportvehicle`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `appID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consumables`
--
ALTER TABLE `consumables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labten`
--
ALTER TABLE `labten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nonconsumables`
--
ALTER TABLE `nonconsumables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `rid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staf`
--
ALTER TABLE `staf`
  MODIFY `stafid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transportvehicle`
--
ALTER TABLE `transportvehicle`
  MODIFY `tid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
