--
-- Database: `voting`
--
CREATE DATABASE IF NOT EXISTS `voting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `voting`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `final_pass` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `final_pass`, `name`) VALUES
(20130154, '698c9634246010398e8c427bdd12d374', 'Harish Rathor');

-- --------------------------------------------------------

--
-- Table structure for table `civ`
--

CREATE TABLE `civ` (
  `sn` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `post` varchar(60) NOT NULL,
  `cgpa` float NOT NULL,
  `year` int(11) NOT NULL,
  `VOTING_STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `csa`
--

CREATE TABLE `csa` (
  `sn` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `post` varchar(60) NOT NULL,
  `cgpa` float NOT NULL,
  `year` int(11) NOT NULL,
  `voting_status` int(11) DEFAULT NULL,
  `nom_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cse`
--

CREATE TABLE `cse` (
  `sn` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `post` varchar(60) NOT NULL,
  `cgpa` float NOT NULL,
  `year` int(11) NOT NULL,
  `VOTING_STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ece`
--

CREATE TABLE `ece` (
  `sn` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `post` varchar(60) NOT NULL,
  `cgpa` float NOT NULL,
  `year` int(11) NOT NULL,
  `VOTING_STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eee`
--

CREATE TABLE `eee` (
  `sn` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `post` varchar(60) NOT NULL,
  `cgpa` float NOT NULL,
  `year` int(11) NOT NULL,
  `VOTING_STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mech`
--

CREATE TABLE `mech` (
  `sn` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `post` varchar(60) NOT NULL,
  `cgpa` float NOT NULL,
  `year` int(11) NOT NULL,
  `VOTING_STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `vname` varchar(25) NOT NULL,
  `branch` char(3) NOT NULL,
  `age` int(2) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mob_no` bigint(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `final_pass` varchar(40) NOT NULL,
  `v_status` int(11) NOT NULL,
  `nom_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `vname`, `branch`, `age`, `student_id`, `roll_no`, `email`, `mob_no`, `password`, `final_pass`, `v_status`, `nom_status`) VALUES
(16, 'P Pand', 'CSE', 20, 20130001, 'BT13CSE011', 'ppang.CSE13@nituk.ac.in', 7757555577, '06a2d0ee513e2aaaaa84ef1039985094', '06a2d0ee513e2aaaaa84ef1039985094', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `valide_voters`
--

CREATE TABLE `valide_voters` (
  `id` int(11) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `valide_voters`
--

INSERT INTO `valide_voters` (`id`, `student_id`, `email`) VALUES
(1, 20130154, 'harish@nituk.ac.in'),
(2, 20130001, 'ppang.CSE13@nituk.ac.in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `civ`
--
ALTER TABLE `civ`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `csa`
--
ALTER TABLE `csa`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `cse`
--
ALTER TABLE `cse`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `ece`
--
ALTER TABLE `ece`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `eee`
--
ALTER TABLE `eee`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `mech`
--
ALTER TABLE `mech`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`,`student_id`);

--
-- Indexes for table `valide_voters`
--
ALTER TABLE `valide_voters`
  ADD PRIMARY KEY (`id`,`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `civ`
--
ALTER TABLE `civ`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `csa`
--
ALTER TABLE `csa`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cse`
--
ALTER TABLE `cse`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ece`
--
ALTER TABLE `ece`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eee`
--
ALTER TABLE `eee`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mech`
--
ALTER TABLE `mech`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `valide_voters`
--
ALTER TABLE `valide_voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
