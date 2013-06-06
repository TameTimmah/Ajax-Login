
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2013 at 11:33 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a7155461_app`
--

-- --------------------------------------------------------

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
