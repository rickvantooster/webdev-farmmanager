-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2020 at 01:09 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `size` bigint(20) NOT NULL,
  `money` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmlivestock`
--

CREATE TABLE `farmlivestock` (
  `id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `livestock_id` int(11) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmmachine`
--

CREATE TABLE `farmmachine` (
  `id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `status` enum('ready','repairing','toDamaged','') NOT NULL,
  `damage` double NOT NULL,
  `fuellevel` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmsupplies`
--

CREATE TABLE `farmsupplies` (
  `id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `supplies_id` int(11) NOT NULL,
  `status` enum('awaiting','delivered','market','') NOT NULL,
  `remaining` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `livestock`
--

CREATE TABLE `livestock` (
  `id` int(10) UNSIGNED NOT NULL,
  `livestockTypes_id` int(10) UNSIGNED NOT NULL,
  `status` enum('active','sold','retired') DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `legalRegistrationTag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livestock`
--

INSERT INTO `livestock` (`id`, `livestockTypes_id`, `status`, `quantity`, `birthdate`, `name`, `legalRegistrationTag`) VALUES
(1, 1, 'active', 4, NULL, NULL, NULL),
(2, 2, 'active', 1, '2018-09-09 00:00:00', 'Bella 1', '20180909_bella_1'),
(3, 2, 'sold', 1, '2017-04-14 00:00:00', 'Mina 4', '20170414_Mina_4');

-- --------------------------------------------------------

--
-- Table structure for table `livestockmarket`
--

CREATE TABLE `livestockmarket` (
  `id` int(11) NOT NULL,
  `farmlivestock_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `livestocksales`
--

CREATE TABLE `livestocksales` (
  `id` int(10) UNSIGNED NOT NULL,
  `livestock_id` int(10) UNSIGNED NOT NULL,
  `salesRegister_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livestocksales`
--

INSERT INTO `livestocksales` (`id`, `livestock_id`, `salesRegister_id`) VALUES
(3, 1, 2),
(4, 1, 1),
(5, 3, 3),
(6, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `livestocktypes`
--

CREATE TABLE `livestocktypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `heldAs` enum('individual','group') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livestocktypes`
--

INSERT INTO `livestocktypes` (`id`, `name`, `heldAs`) VALUES
(1, 'chicken', 'group'),
(2, 'cow', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `machinemarket`
--

CREATE TABLE `machinemarket` (
  `id` int(11) NOT NULL,
  `farmmachine_id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machinepricing`
--

CREATE TABLE `machinepricing` (
  `id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` enum('harvester','tractor','combiner','fertilizerTrailer','lawnmower','balepress','storageTrailer','baleSealer','cropsprayer','') NOT NULL,
  `owned` tinyint(1) NOT NULL,
  `fuelconsumption` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `type`, `owned`, `fuelconsumption`) VALUES
(1, 'John-Deere', 'tractor', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesregister`
--

CREATE TABLE `salesregister` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('buy','sale') DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesregister`
--

INSERT INTO `salesregister` (`id`, `type`, `date`, `price`, `quantity`, `notes`) VALUES
(1, 'buy', '2020-04-01 00:00:00', '12.00', 2, NULL),
(2, 'sale', '2020-03-01 00:00:00', '15.00', 2, NULL),
(3, 'sale', '2019-12-05 00:00:00', '150.00', 1, NULL),
(4, 'buy', '2018-04-21 00:00:00', '50.00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` enum('corn','grain','soja','fertilizer','grassSeeds','fuel') NOT NULL,
  `amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliespricing`
--

CREATE TABLE `suppliespricing` (
  `id` int(11) NOT NULL,
  `supplies_id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplymarket`
--

CREATE TABLE `supplymarket` (
  `id` int(11) NOT NULL,
  `farmsupplies_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `farmlivestock`
--
ALTER TABLE `farmlivestock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm_id` (`farm_id`),
  ADD KEY `livestock_id` (`livestock_id`);

--
-- Indexes for table `farmmachine`
--
ALTER TABLE `farmmachine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm_id` (`farm_id`),
  ADD KEY `machine_id` (`machine_id`);

--
-- Indexes for table `farmsupplies`
--
ALTER TABLE `farmsupplies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farm_id` (`farm_id`),
  ADD KEY `supplies_id` (`supplies_id`);

--
-- Indexes for table `livestock`
--
ALTER TABLE `livestock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livestock_livestockTypes_idx` (`livestockTypes_id`);

--
-- Indexes for table `livestockmarket`
--
ALTER TABLE `livestockmarket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmlivestock_id` (`farmlivestock_id`);

--
-- Indexes for table `livestocksales`
--
ALTER TABLE `livestocksales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livestockSales_livestock1_idx` (`livestock_id`),
  ADD KEY `fk_livestockSales_salesRegister1_idx` (`salesRegister_id`);

--
-- Indexes for table `livestocktypes`
--
ALTER TABLE `livestocktypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machinemarket`
--
ALTER TABLE `machinemarket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machinepricing`
--
ALTER TABLE `machinepricing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machine_id` (`machine_id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesregister`
--
ALTER TABLE `salesregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliespricing`
--
ALTER TABLE `suppliespricing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplies_id` (`supplies_id`);

--
-- Indexes for table `supplymarket`
--
ALTER TABLE `supplymarket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmsupplies_id` (`farmsupplies_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `farmlivestock`
--
ALTER TABLE `farmlivestock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `farmmachine`
--
ALTER TABLE `farmmachine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `farmsupplies`
--
ALTER TABLE `farmsupplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `livestock`
--
ALTER TABLE `livestock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `livestockmarket`
--
ALTER TABLE `livestockmarket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `livestocksales`
--
ALTER TABLE `livestocksales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `livestocktypes`
--
ALTER TABLE `livestocktypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `machinemarket`
--
ALTER TABLE `machinemarket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `machinepricing`
--
ALTER TABLE `machinepricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salesregister`
--
ALTER TABLE `salesregister`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliespricing`
--
ALTER TABLE `suppliespricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplymarket`
--
ALTER TABLE `supplymarket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `farm`
--
ALTER TABLE `farm`
  ADD CONSTRAINT `farm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `farmlivestock`
--
ALTER TABLE `farmlivestock`
  ADD CONSTRAINT `farmlivestock_ibfk_1` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`id`),
  ADD CONSTRAINT `farmlivestock_ibfk_2` FOREIGN KEY (`livestock_id`) REFERENCES `livestock` (`id`);

--
-- Constraints for table `farmmachine`
--
ALTER TABLE `farmmachine`
  ADD CONSTRAINT `farmmachine_ibfk_1` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`id`),
  ADD CONSTRAINT `farmmachine_ibfk_2` FOREIGN KEY (`machine_id`) REFERENCES `farmmachine` (`id`);

--
-- Constraints for table `farmsupplies`
--
ALTER TABLE `farmsupplies`
  ADD CONSTRAINT `farmsupplies_ibfk_1` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`id`),
  ADD CONSTRAINT `farmsupplies_ibfk_2` FOREIGN KEY (`supplies_id`) REFERENCES `supplies` (`id`);

--
-- Constraints for table `livestock`
--
ALTER TABLE `livestock`
  ADD CONSTRAINT `fk_livestock_livestockTypes` FOREIGN KEY (`livestockTypes_id`) REFERENCES `livestocktypes` (`id`);

--
-- Constraints for table `livestockmarket`
--
ALTER TABLE `livestockmarket`
  ADD CONSTRAINT `livestockmarket_ibfk_1` FOREIGN KEY (`farmlivestock_id`) REFERENCES `farmlivestock` (`id`);

--
-- Constraints for table `livestocksales`
--
ALTER TABLE `livestocksales`
  ADD CONSTRAINT `fk_livestockSales_livestock1` FOREIGN KEY (`livestock_id`) REFERENCES `livestock` (`id`),
  ADD CONSTRAINT `fk_livestockSales_salesRegister1` FOREIGN KEY (`salesRegister_id`) REFERENCES `salesregister` (`id`);

--
-- Constraints for table `machinepricing`
--
ALTER TABLE `machinepricing`
  ADD CONSTRAINT `machinepricing_ibfk_1` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`);

--
-- Constraints for table `suppliespricing`
--
ALTER TABLE `suppliespricing`
  ADD CONSTRAINT `suppliespricing_ibfk_1` FOREIGN KEY (`supplies_id`) REFERENCES `supplies` (`id`);

--
-- Constraints for table `supplymarket`
--
ALTER TABLE `supplymarket`
  ADD CONSTRAINT `supplymarket_ibfk_1` FOREIGN KEY (`farmsupplies_id`) REFERENCES `farmsupplies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
