-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 11:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeblock`
--

-- --------------------------------------------------------

--
-- Table structure for table `codeblockset`
--

CREATE TABLE `codeblockset` (
  `CodeBlockSetID` int(10) NOT NULL,
  `CodeBlock` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `Guru_ID` int(10) NOT NULL,
  `Username` char(50) NOT NULL,
  `Email` char(50) NOT NULL,
  `Password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`Guru_ID`, `Username`, `Email`, `Password`) VALUES
(1, 'desta', 'desta@gmail.com', 'desta'),
(2, 'test', 'test@test.test', 'test'),
(3, 'dummy', 'dummy@gmail.com', 'dummy'),
(4, 'test2', 'test2', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `lobby`
--

CREATE TABLE `lobby` (
  `lobbyID` int(10) NOT NULL,
  `playerID` int(10) NOT NULL,
  `stageID` int(10) NOT NULL,
  `Score` int(10) NOT NULL,
  `Time` int(10) NOT NULL,
  `Grade` int(10) NOT NULL,
  `Steps` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `MapID` int(10) NOT NULL,
  `stageID` int(10) NOT NULL,
  `MapTexture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `Player_ID` int(10) NOT NULL,
  `Username` char(50) NOT NULL,
  `Email` char(50) NOT NULL,
  `Password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `punishment`
--

CREATE TABLE `punishment` (
  `punishmentID` int(11) NOT NULL,
  `HeadTexture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `rewardID` int(10) NOT NULL,
  `rewardTexture` varchar(50) NOT NULL,
  `rewardTitle` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `stageID` int(10) NOT NULL,
  `mapID` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  `steps` int(10) NOT NULL,
  `punishmentID` int(10) NOT NULL,
  `rewardID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stage_progres`
--

CREATE TABLE `stage_progres` (
  `progressID` int(10) NOT NULL,
  `stageID` int(10) NOT NULL,
  `playerID` int(10) NOT NULL,
  `Score` int(20) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codeblockset`
--
ALTER TABLE `codeblockset`
  ADD PRIMARY KEY (`CodeBlockSetID`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`Guru_ID`);

--
-- Indexes for table `lobby`
--
ALTER TABLE `lobby`
  ADD PRIMARY KEY (`lobbyID`),
  ADD KEY `playerID` (`playerID`),
  ADD KEY `stageID` (`stageID`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`MapID`),
  ADD KEY `stageID` (`stageID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`Player_ID`);

--
-- Indexes for table `punishment`
--
ALTER TABLE `punishment`
  ADD PRIMARY KEY (`punishmentID`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`rewardID`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`stageID`),
  ADD KEY `mapID` (`mapID`),
  ADD KEY `punishmentID` (`punishmentID`),
  ADD KEY `rewardID` (`rewardID`);

--
-- Indexes for table `stage_progres`
--
ALTER TABLE `stage_progres`
  ADD PRIMARY KEY (`progressID`),
  ADD KEY `stageID` (`stageID`),
  ADD KEY `playerID` (`playerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codeblockset`
--
ALTER TABLE `codeblockset`
  MODIFY `CodeBlockSetID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `Guru_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lobby`
--
ALTER TABLE `lobby`
  MODIFY `lobbyID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `MapID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `Player_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `punishment`
--
ALTER TABLE `punishment`
  MODIFY `punishmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `rewardID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `stageID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage_progres`
--
ALTER TABLE `stage_progres`
  MODIFY `progressID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
