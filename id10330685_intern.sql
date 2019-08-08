-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2019 at 07:13 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10330685_intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `eid` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`eid`, `name`, `username`, `Password`) VALUES
('E001', 'Animesh', 'admin', '5c428d8875d2948607f3e3fe134d71b4');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `cid` varchar(50) NOT NULL,
  `CompanyName` varchar(20) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Job` varchar(50) NOT NULL,
  `Contact_Person` varchar(50) NOT NULL,
  `Contact_Email` varchar(50) NOT NULL,
  `Contact_Mob` varchar(10) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`cid`, `CompanyName`, `Location`, `Job`, `Contact_Person`, `Contact_Email`, `Contact_Mob`, `CreationDate`, `Status`) VALUES
('CID5d4c54756e6b7', 'Tata', 'Jamshedpur', 'Critical', 'Mark', 'mark123@gmail.com', '8697846321', '2019-08-08 16:57:25', '1'),
('CID5d4c566fefb96', 'Infosys', 'Bengaluru', 'Programmer', 'Chandan', 'chandu@gmail.com', '65454545', '2019-08-08 17:05:51', '1'),
('CID5d4c5a822fa24', 'Amazon', 'Atlanta', 'Pro', 'Chandu', 'chandandu@gmail.com', '1235896742', '2019-08-08 17:23:14', '1'),
('CID5d4c603fa7452', 'tisco', 'mumbai', 'Sweeping', 'Swtha', 'swetha@yahoo.in', '1231234', '2019-08-08 17:47:43', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `eid` varchar(30) NOT NULL,
  `FullName` varchar(20) NOT NULL,
  `Number` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `RegDate` datetime NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`eid`, `FullName`, `Number`, `email`, `password`, `RegDate`, `status`) VALUES
('EID5d43923896140', 'Suraj', '8638237491', 'fakenotsuraj@gmail.com', '562c23d13dc428ef19b5be223ded5cd2', '2019-08-02 01:30:32', 1),
('EID5d43d22340bb6', 'Indumathy', '9444144325', 'i_mathy@yahoo.com', 'aaacd843a8f50e465ad08fa28a6c22c0', '2019-08-02 06:03:15', 0),
('EID5d4428a53e0de', 'Durgesh', '7889966443', 'sahudurgesh1998@gmail.com', '95044d2ddf576b139ecd45c1cf636a2b', '2019-08-02 12:12:21', 0),
('EID5d4c3c7d897c9', 'Animesh Banerjee', '7904977045', 'stant581@gmail.com', 'f5dd8f016f851c2ad4aa124ecd36b6f9', '2019-08-08 15:15:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblopportunity`
--

CREATE TABLE `tblopportunity` (
  `Contract_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Contract_scope` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LEB` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Forecast_val` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Net_contribution` decimal(20,0) NOT NULL,
  `Booking_reporting_val` decimal(20,0) NOT NULL,
  `Proposal_man` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sales_man` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Creator` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Bid_request_actual` date NOT NULL,
  `Proposal_expected` date NOT NULL,
  `Proposal(last_rev)` date NOT NULL,
  `Ord_date_expected` date NOT NULL,
  `Ord_date_actual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblopportunity`
--

INSERT INTO `tblopportunity` (`Contract_type`, `Contract_scope`, `LEB`, `Forecast_val`, `Net_contribution`, `Booking_reporting_val`, `Proposal_man`, `Sales_man`, `Creator`, `Status`, `Bid_request_actual`, `Proposal_expected`, `Proposal(last_rev)`, `Ord_date_expected`, `Ord_date_actual`) VALUES
('Spare Parts', 'Engg + Materail Only', 'B', '78925', 67, 987, 'Animesh', 'Suraj', 'Indumathy', 'Budget', '2019-08-10', '2019-08-23', '2019-08-28', '2019-09-07', '2019-09-07'),
('Renovation', 'Service Only', 'B', 'ABC', 89, 85, 'EID5d43923896140', 'EID5d4428a53e0de', 'EID5d4c3c7d897c9', 'Cancelled', '2019-07-04', '2019-07-07', '2019-07-17', '2019-07-31', '2019-08-16'),
('Spare Parts', 'Service Only', 'A', '4535', 98, 89, 'EID5d4428a53e0de', 'EID5d4c3c7d897c9', 'EID5d43923896140', 'Won', '2019-07-28', '2019-07-29', '2019-07-30', '2019-07-31', '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `tblproject`
--

CREATE TABLE `tblproject` (
  `Opportunity_No` varchar(30) NOT NULL,
  `OldOpportunity` varchar(30) NOT NULL,
  `Reference` varchar(30) NOT NULL,
  `Opportunity_Name` varchar(30) NOT NULL,
  `Opportunity_Des` varchar(100) NOT NULL,
  `Plant` varchar(30) NOT NULL,
  `Business_unit` varchar(30) NOT NULL,
  `Entity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproject`
--

INSERT INTO `tblproject` (`Opportunity_No`, `OldOpportunity`, `Reference`, `Opportunity_Name`, `Opportunity_Des`, `Plant`, `Business_unit`, `Entity`) VALUES
('P09190552', 'N', '123', 'Dekho na', 'Kal dekhenge', 'DSP', 'Electrostatic precipitator', 'KCKR'),
('P09192524', 'P202', '2132432', 'fdgfd', 'sdgad', 'cvbvnvb', 'Fabric Filters', 'KCUS'),
('P09194693', 'P20012', 'Animesh', 'Minetree', 'Project', 'Chennai', 'Electrostatic precipitator', 'KCKR'),
('P09195833', 'NA', '1223523', 'Bol na ', 'Kya hai', 'Wahi toj', 'DeSOX', 'KCIN'),
('P09199003', 'NA', 'Dekh le .. Whatever', 'Naya Project', 'Anything Relevant', 'ABc XYZ', 'Electrostatic precipitator', 'KCKR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `tblproject`
--
ALTER TABLE `tblproject`
  ADD PRIMARY KEY (`Opportunity_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
