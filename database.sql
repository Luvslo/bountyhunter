-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2014 at 05:59 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bountyhunter`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `created`) VALUES
(3, 'ohswinbentvelzen@gmail.com', '$2a$10$JLOVb3Cj3MQBDQuNgkmAx.yjx1Df7nHRiT5AptUXGH8fWoa9rMUpa', '0000-00-00 00:00:00'),
(4, 'ohswin@virtuwows.com', '$2a$10$JLOVb3Cj3MQBDQuNgkmAx.yjx1Df7nHRiT5AptUXGH8fWoa9rMUpa', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `planet_id` int(11) unsigned NOT NULL,
  `factory_id` int(11) unsigned NOT NULL,
  `position` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `xp` int(11) NOT NULL DEFAULT '0',
  `health` int(11) unsigned NOT NULL DEFAULT '100',
  `shield` int(11) unsigned NOT NULL DEFAULT '0',
  `primary_weapon` int(11) unsigned NOT NULL DEFAULT '0',
  `secondary_weapon` int(11) unsigned NOT NULL DEFAULT '0',
  `heal_bot` int(11) unsigned NOT NULL DEFAULT '0',
  `security_bot` int(11) unsigned NOT NULL DEFAULT '0',
  `implants` int(11) unsigned NOT NULL DEFAULT '0',
  `jet_pack` int(11) unsigned NOT NULL DEFAULT '0',
  `planet_id` int(11) unsigned NOT NULL,
  `dead` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(11) unsigned NOT NULL,
  `factory_type` int(11) unsigned NOT NULL,
  `production` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

CREATE TABLE `planets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `name`) VALUES
(1, 'planet1'),
(2, 'planet2'),
(3, 'planet3'),
(4, 'planet4');
