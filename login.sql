
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(10000) COLLATE latin1_general_ci NOT NULL,
  `emailAddress` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `hash` varchar(10000) COLLATE latin1_general_ci NOT NULL,
  `confirmed` varchar(5) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
