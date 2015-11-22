-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jan 11, 2012 as 06:47 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `missao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cadastro`
--

CREATE TABLE IF NOT EXISTS `tb_cadastro` (
  `CAD_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `CAD_NOME` varchar(50) NOT NULL,
  `CAD_DATA` varchar(10) NOT NULL,
  `CAD_TELEFONE` varchar(15) NOT NULL,
  `CAD_EMAIL` varchar(50) NOT NULL,
  `CAD_PROF_RESP` varchar(25) NOT NULL,
  PRIMARY KEY (`CAD_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`CAD_CODIGO`, `CAD_NOME`, `CAD_DATA`, `CAD_TELEFONE`, `CAD_EMAIL`, `CAD_PROF_RESP`) VALUES
(1, 'leonardo bessa', '06/07/1984', '(61)3082-6060', 'leodjx@hotmail.com', 'Michelly'),
(2, 'jackeline michelly silva torres', '23/03/1986', '61-91411519', 'jackeline.michelly@hotmail.com', 'Jackeline'),
(3, 'Marcelo moura', '28/12/1985', '61 33975960', 'moita@hotmail.com', 'Aristocles'),
(4, 'lili bessa', '31/10/1988', '61 30826060', 'lili@gmail.com', 'Musculacao'),
(5, 'lele bessa', '27/08/1992', '61 33975960', 'leodjx@hotmail.com', 'Thiago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_peso`
--

CREATE TABLE IF NOT EXISTS `tb_peso` (
  `PES_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `PES_VALOR` varchar(7) NOT NULL,
  `PES_COD_CADASTRO` int(11) NOT NULL,
  `PES_DATA` varchar(10) NOT NULL,
  PRIMARY KEY (`PES_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `tb_peso`
--

INSERT INTO `tb_peso` (`PES_CODIGO`, `PES_VALOR`, `PES_COD_CADASTRO`, `PES_DATA`) VALUES
(1, '78.500', 1, '10/01/2012'),
(2, '60', 2, '10/01/2012'),
(3, '75', 3, '10/01/2012'),
(4, '48', 2, '10/01/2012'),
(5, '92.5', 3, '10/01/2012'),
(6, '87.20', 2, '11/01/2012'),
(7, '60', 3, '11/01/2012'),
(8, '72', 2, '11/01/2012'),
(9, '76.3', 1, '11/01/2012'),
(10, '77.95', 1, '11/01/2012'),
(11, '69.851', 3, '11/01/2012'),
(12, '55.30', 4, '11/01/2012'),
(13, '78.6', 4, '11/01/2012'),
(14, '42.30', 4, '11/01/2012'),
(15, '58.60', 4, '11/01/2012'),
(16, '44.8', 5, '11/01/2012');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ranking`
--

CREATE TABLE IF NOT EXISTS `tb_ranking` (
  `RAN_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_CLI` int(11) NOT NULL,
  PRIMARY KEY (`RAN_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_ranking`
--

INSERT INTO `tb_ranking` (`RAN_CODIGO`, `CODIGO_CLI`) VALUES
(1, 3),
(2, 1),
(3, 5),
(4, 4),
(5, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
