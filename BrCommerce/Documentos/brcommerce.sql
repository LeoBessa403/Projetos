-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2012 at 03:18 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brcommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `acesso`
--

CREATE TABLE IF NOT EXISTS `acesso` (
  `ACE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ULTIMO_ACESSO` varchar(200) NOT NULL,
  PRIMARY KEY (`ACE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `acesso`
--

INSERT INTO `acesso` (`ACE_ID`, `ULTIMO_ACESSO`) VALUES
(1, '20110601031437');

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE IF NOT EXISTS `serial` (
  `SER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SER_SERIAL` varchar(255) NOT NULL,
  `SER_MES` varchar(11) NOT NULL,
  `SER_STATUS` varchar(200) NOT NULL,
  PRIMARY KEY (`SER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `serial`
--

INSERT INTO `serial` (`SER_ID`, `SER_SERIAL`, `SER_MES`, `SER_STATUS`) VALUES
(1, 'DDE5WZH5BFT1JNG5', '201206', 'pendente'),
(2, 'MWA7GCT0EBS1ELO6', '201207', 'pendente'),
(3, 'VKP2AKL2FMI6LMC6', '201208', 'pendente'),
(4, 'DKY0GQK4GNU4DPY4', '201209', 'pendente'),
(5, 'JXY2WBL3GDY5KUY0', '201210', 'pendente'),
(6, 'QBP8COU1GIS9ZCB5', '201211', 'pendente'),
(7, 'VVA7TDI8EEG7CML8', '201212', 'pendente'),
(8, 'AEE9VVD3CPN9SZC0', '201301', 'pendente'),
(9, 'DDB5JQC7WON4TOW0', '201302', 'pendente'),
(10, 'GRQ4LNK8UEF2HGA9', '201303', 'pendente'),
(11, 'KVW6ZMT9QIQ4HAH6', '201304', 'pendente'),
(12, 'JOZ2WOJ8JDT9TYU1', '201305', 'pendente'),
(13, 'JYT2JSG5ENQ8RVN5', '201306', 'pendente'),
(14, 'JUF5KZI0YMF0BYM8', '201307', 'pendente'),
(15, 'IHJ1SKR4OAN6WAQ8', '201308', 'pendente'),
(16, 'HJH1OTE7GEN5HGA8', '201309', 'pendente'),
(17, 'ECX4YHX8YWG7CPQ5', '201310', 'pendente'),
(18, 'BJG1RWY7LHS3IAL1', '201311', 'pendente'),
(19, 'YHK1WQB5AFY2COM6', '201312', 'pendente'),
(20, 'RUC4RML1OTT5KET9', '201401', 'pendente'),
(21, 'LYP1YIB6BYI1AYF0', '201402', 'pendente'),
(22, 'ENV2NJX9NOS1ERX0', '201403', 'pendente'),
(23, 'XUT6RMZ1ZXT4UOV8', '201404', 'pendente'),
(24, 'OQJ3HRG1JUN0YOW5', '201405', 'pendente'),
(25, 'FCU4KZS9THZ0LQH0', '201406', 'pendente'),
(26, 'VDY8XIL6CIF4LVY4', '201407', 'pendente'),
(27, 'JUS5XVI1LBD1WCR6', '201408', 'pendente'),
(28, 'WAF6IJN5SKT1XLR7', '201409', 'pendente'),
(29, 'MVM1KBY7ZFD4IXX5', '201410', 'pendente'),
(30, 'WGL9TUM8ERF2GMK3', '201411', 'pendente'),
(31, 'JGD0QRH7ITZ2QCA9', '201412', 'pendente'),
(32, 'VYN5ZPH5OJN6MYX3', '201501', 'pendente'),
(33, 'GBR3VQN1RQT4URZ6', '201502', 'pendente'),
(34, 'PYN5CTZ5TMS4OPK7', '201503', 'pendente'),
(35, 'WGB0YZR8VXI9UQY6', '201504', 'pendente'),
(36, 'FGK8CHO9YWT7NTP4', '201505', 'pendente');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `USU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USU_NOME` varchar(255) NOT NULL,
  `USU_SENHA` varchar(255) NOT NULL,
  `USU_EMAIL` varchar(255) NOT NULL,
  `USU_NIVEL` varchar(50) NOT NULL,
  `USU_COR` varchar(255) NOT NULL,
  `USU_LOGIN` varchar(255) NOT NULL,
  PRIMARY KEY (`USU_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`USU_ID`, `USU_NOME`, `USU_SENHA`, `USU_EMAIL`, `USU_NIVEL`, `USU_COR`, `USU_LOGIN`) VALUES
(1, 'leo', '123', 'leodjx@hotmail.com', 'master', 'azul', ''),
(2, 'mimi', '123', 'mimi@hotmail.com', 'master', 'verde', ''),
(3, 'ama', '123', 'am', 'master', 'amarelo', ''),
(4, 'verm', '123', 'vm', 'master', 'vermelho', ''),
(50, '', '', '', '', '2', ''),
(48, 'teste', 'teste', 'teste', '1', 'verde', ''),
(49, 'lola', 'lola', 'lola', '', '2', ''),
(51, 'leonardo machado carvalho bessa', '123456', 'leodjx@hotmail.com', '1', 'azul', 'leobessa'),
(52, 'leonardo', 'brg', 'leodjx@hotmail.com.br', '4', 'azul', 'leobessa'),
(53, 'leonardo', 'geg', 'leodjx@hotmail.com.br', '4', 'azul', 'leodjx@hotmail.com'),
(54, 'leonardo', 'htht', 'leodjx@hotmail.com.brh', '4', 'azul', 'leodjx@hotmail.com'),
(55, 'lola', 'gdgfd', 'lele.403@hotmail.com', '4', 'verde', 'leodjx@hotmail.com'),
(56, 'lola', 'efe', 'lele.403@hotmail.com', '4', 'azul', 'leodjx@hotmail.com'),
(57, 'leonardo', 'FEWF', 'EFEFEFE', '4', 'azul', 'leodjx@hotmail.com'),
(58, 'FEFEW', 'FWEFEWF', 'FEWFEWF', '4', 'azul', 'FEWFE'),
(59, 'EFWEF', 'EWFEWF', 'EFEWF', '4', 'azul', 'EWFEWF'),
(60, 'EWFWEF', 'EWFEWF', 'EFE', '4', 'azul', 'EFEWF'),
(61, 'EWFEWF', 'EWFFEW', 'FEWFEW', '4', 'azul', 'EWFEWF'),
(62, 'THTRH', 'HTRHTR', 'HTRHTR', '4', 'azul', 'TRHTR'),
(63, 'REGREG', 'RGR', 'GRGRG', '4', 'azul', 'REGREG'),
(64, 'GRGR', 'RGRG', 'RGRG', '4', 'azul', 'GRG'),
(65, 'GRG', 'GRGR', 'GRG', '4', 'azul', 'RGRG'),
(66, '', '', '', '4', 'azul', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
