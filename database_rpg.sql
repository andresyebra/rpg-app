-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 02:35 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpg`
--
CREATE DATABASE IF NOT EXISTS `rpg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rpg`;

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `level` int(100) NOT NULL,
  `race` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `weapon` varchar(50) NOT NULL,
  `strength` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `first_name`, `last_name`, `level`, `race`, `class`, `weapon`, `strength`, `intelligence`, `dexterity`) VALUES
(11, 'Bheizer', 'Dhusher', 1, 'Elf', 'Paladin', 'Sword', 11, 11, 12),
(12, 'Murgil', 'Nav', 1, 'Elf', 'Ranger', 'Bow and Arrows', 12, 16, 13),
(13, 'Bheizer', '-', 1, 'Dwarf', 'Paladin', 'Sword', 17, 14, 9),
(14, 'Bheizer', 'Nema', 1, 'Halfling', 'Ranger', 'Bow and Arrows', 12, 13, 13),
(17, 'En', '-', 1, 'Human', 'Barbarian', 'Sword', 15, 10, 13),
(18, 'Edraf', 'Kadev', 1, 'Halfling', 'Thief', 'Dagger', 13, 9, 13);

-- --------------------------------------------------------

--
-- Table structure for table `hero_classes`
--

CREATE TABLE `hero_classes` (
  `id` int(11) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hero_classes`
--

INSERT INTO `hero_classes` (`id`, `class`) VALUES
(1, 'Paladin'),
(2, 'Ranger'),
(3, 'Barbarian'),
(4, 'Wizard'),
(5, 'Cleric'),
(6, 'Warrior'),
(7, 'Thief');

-- --------------------------------------------------------

--
-- Table structure for table `hero_first_name`
--

CREATE TABLE `hero_first_name` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hero_first_name`
--

INSERT INTO `hero_first_name` (`id`, `name`) VALUES
(1, 'Bheizer'),
(2, 'Khazun'),
(3, 'Grirgel'),
(4, 'Murgil'),
(5, 'Edraf'),
(6, 'En'),
(7, 'Grognur'),
(8, 'Grum'),
(9, 'Surhathion'),
(10, 'Lamos'),
(11, 'Melmedjad'),
(12, 'Shouthes'),
(13, 'Che'),
(14, 'Jun'),
(15, 'Rircurtun'),
(16, 'Zelen');

-- --------------------------------------------------------

--
-- Table structure for table `hero_last_name`
--

CREATE TABLE `hero_last_name` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hero_last_name`
--

INSERT INTO `hero_last_name` (`id`, `last_name`) VALUES
(1, 'Nema'),
(2, 'Dhusher'),
(3, 'Burningsun'),
(4, 'Hawkglow'),
(5, 'Nav'),
(6, 'Kadev'),
(7, 'Lightkeeper'),
(8, 'Heartdancer'),
(9, 'Fivrithrit'),
(10, 'Suechit'),
(11, 'Tuldethatvo'),
(12, 'Vrovakya'),
(13, 'Hiao'),
(14, 'Chiay'),
(15, 'Hogoscu'),
(16, 'Vedrimor');

-- --------------------------------------------------------

--
-- Table structure for table `hero_races`
--

CREATE TABLE `hero_races` (
  `id` int(11) NOT NULL,
  `race` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hero_races`
--

INSERT INTO `hero_races` (`id`, `race`) VALUES
(1, 'Human'),
(2, 'Elf'),
(3, 'Halfling'),
(4, 'Dwarf'),
(5, 'Half-orc'),
(6, 'Half-elf'),
(7, 'Dragonborn');

-- --------------------------------------------------------

--
-- Table structure for table `hero_weapons`
--

CREATE TABLE `hero_weapons` (
  `id` int(11) NOT NULL,
  `weapon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hero_weapons`
--

INSERT INTO `hero_weapons` (`id`, `weapon`) VALUES
(1, 'Sword'),
(2, 'Dagger'),
(3, 'Hammer'),
(4, 'Bow and Arrows'),
(5, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `monster`
--

CREATE TABLE `monster` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `race` varchar(50) NOT NULL,
  `abilities` varchar(50) NOT NULL,
  `strength` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monster`
--

INSERT INTO `monster` (`id`, `name`, `level`, `race`, `abilities`, `strength`, `intelligence`, `dexterity`) VALUES
(8, 'Word', 1, 'Drow', 'Crunch', 54, 44, 40),
(9, 'Raeblwo', 1, 'Owlbear', 'Ice Beam', 45, 45, 51),
(10, 'Tnaig mrots', 1, 'Storm Giant', 'Earthquake', 23, 35, 46),
(14, 'Tnaig tsorf', 1, 'Frost Giant', 'Thunderbolt', 18, 15, 8);

-- --------------------------------------------------------

--
-- Table structure for table `monster_powers`
--

CREATE TABLE `monster_powers` (
  `id` int(11) NOT NULL,
  `powers` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monster_powers`
--

INSERT INTO `monster_powers` (`id`, `powers`) VALUES
(1, 'Shadow Ball'),
(2, 'Aerial Ace'),
(3, 'Giga Drain'),
(4, 'Thunderbolt'),
(5, 'Earthquake'),
(6, 'Crunch'),
(7, 'Double Team'),
(8, 'Psychic'),
(9, 'Ice Beam'),
(10, 'Surf');

-- --------------------------------------------------------

--
-- Table structure for table `monster_races`
--

CREATE TABLE `monster_races` (
  `id` int(11) NOT NULL,
  `race` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monster_races`
--

INSERT INTO `monster_races` (`id`, `race`) VALUES
(1, 'Beholder'),
(2, 'Mind Flayer'),
(3, 'Drow'),
(4, 'Dragons'),
(5, 'Owlbear'),
(6, 'Bulette'),
(7, 'Rust Monster'),
(8, 'Gelatinous'),
(9, 'Cube'),
(10, 'Hill Giant'),
(11, 'Stone Giant'),
(12, 'Frost Giant'),
(13, 'Fire Giant'),
(14, 'Cloud Giant'),
(15, 'Storm Giant'),
(16, 'Displacer Beast'),
(17, 'Githyanki'),
(18, 'Kobold'),
(19, 'Kuo-Toa'),
(20, 'Lich'),
(21, 'Orc'),
(22, 'Slaad'),
(23, 'Umber Hulk'),
(24, 'Yuan-ti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_classes`
--
ALTER TABLE `hero_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_first_name`
--
ALTER TABLE `hero_first_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_last_name`
--
ALTER TABLE `hero_last_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_races`
--
ALTER TABLE `hero_races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_weapons`
--
ALTER TABLE `hero_weapons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monster`
--
ALTER TABLE `monster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monster_powers`
--
ALTER TABLE `monster_powers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monster_races`
--
ALTER TABLE `monster_races`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hero_classes`
--
ALTER TABLE `hero_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hero_first_name`
--
ALTER TABLE `hero_first_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hero_last_name`
--
ALTER TABLE `hero_last_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hero_races`
--
ALTER TABLE `hero_races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hero_weapons`
--
ALTER TABLE `hero_weapons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monster`
--
ALTER TABLE `monster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `monster_powers`
--
ALTER TABLE `monster_powers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `monster_races`
--
ALTER TABLE `monster_races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
