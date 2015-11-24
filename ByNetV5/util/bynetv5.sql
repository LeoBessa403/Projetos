-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Out 17, 2011 as 10:24 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bynetv5`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carrinho`
--

CREATE TABLE IF NOT EXISTS `tb_carrinho` (
  `CAR_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_CODIGO` int(11) NOT NULL,
  `PRO_VEN_QUANTIDADE` int(11) NOT NULL,
  `PRO_VEN_VALOR` decimal(10,2) NOT NULL,
  `VEN_SESSAO` varchar(50) NOT NULL,
  PRIMARY KEY (`CAR_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `tb_carrinho`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `CLI_CODIGO` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CLI_NOME` varchar(30) DEFAULT NULL,
  `CLI_ENDERECO` varchar(50) DEFAULT NULL,
  `CLI_TELEFONE` varchar(15) DEFAULT NULL,
  `CLI_EMAIL` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`CLI_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`CLI_CODIGO`, `CLI_NOME`, `CLI_ENDERECO`, `CLI_TELEFONE`, `CLI_EMAIL`) VALUES
(2, 'Mateus de Souza CamÃµes', 'Qr 403 conjunto 08 casa 25 samambaia norte', '3226-65544', 'mateus@hotmail.com'),
(4, 'Lilian Machado Carvalho Bessa', 'Qr 403 conjunto 10 casa 28', '3356-5656', 'lili@hotmaill.com'),
(5, 'Jackeline Michelly Torres', 'Qr 403 cj 17 casa 06', '3357-4455', 'mimi@hotmail.com'),
(8, 'Leticia Bessa Carvalho', 'Qr 403 samambaia norte', '3455-6266', 'lele@hotmail.com'),
(10, 'Marcelo Moura de Sousa', 'Vicente Poeira', '3366-6666', 'marcelo_moita@hotmail.com'),
(11, 'Maria Eduarda Fontes', 'Qnp conj 4 casa 12', '3636-1212', 'mariaedu@hotmail.com'),
(12, 'Regina Martins Fontenele', 'Asa Norte 102', '3665-9999', 'regis@hotmail.com'),
(13, 'George Andrade de Paula', 'Qnn o conj 16 casa 59', '9899-5656', 'georgedudu@gmail.com'),
(15, 'israel gonÃ§alves', 'quadra 200 taguatinga', '98986565', 'israel.goncalves@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE IF NOT EXISTS `tb_produto` (
  `PRO_CODIGO` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PRO_DESCRICAO` varchar(50) DEFAULT NULL,
  `PRO_UNID_VENDA` varchar(30) DEFAULT NULL,
  `PRO_ESTOQUE` int(8) DEFAULT NULL,
  `PRO_VALOR` decimal(10,2) DEFAULT NULL,
  `PRO_FOTO` varchar(60) NOT NULL,
  PRIMARY KEY (`PRO_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`PRO_CODIGO`, `PRO_DESCRICAO`, `PRO_UNID_VENDA`, `PRO_ESTOQUE`, `PRO_VALOR`, `PRO_FOTO`) VALUES
(22, 'Bola jabulane offside', 'Unidade', 11, '29.99', 'imagensCATAQLVS.jpg'),
(21, 'Papel Chamequinho', 'Pacote', 8, '2.65', 'tutuii.jpg'),
(6, 'Caneta BIC preta', 'Unidade', 11, '0.80', 'uuruy6u.jpg'),
(24, 'Linha de pipa grande', 'unidade', 39, '2.99', 'gdgdg.jpg'),
(9, 'Pilha raiovac alcalina grande', 'Unidade', 13, '2.80', 'khkyr.jpg'),
(10, 'Midia cd', 'Unidade', 72, '1.00', 'kuikiuiu.jpg'),
(11, 'Guarda-chuva barracÃ£o', 'Unidade', 15, '12.30', 'uioy.jpg'),
(25, 'TNT azul', 'metro', 75, '1.00', 'ryryr8.jpg'),
(14, 'Tesoura mundial 15', 'Unidade', 5, '12.25', 'juju.jpg'),
(19, 'RelÃ³gio despertador preto/branco', 'Unidade', 14, '14.50', 'yeryru.jpg'),
(17, 'Corda de varal', 'Pacote', 19, '1.80', 'imagensCARJ21PU.jpg'),
(23, 'Borracha tk Faber Castell', 'Unidade', 49, '0.85', 'koyoyoy.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_venda`
--

CREATE TABLE IF NOT EXISTS `tb_produto_venda` (
  `VEN_CODIGO` int(10) unsigned NOT NULL,
  `PRO_CODIGO` int(10) unsigned NOT NULL,
  `PRO_VEN_QUANTIDADE` int(11) NOT NULL,
  `PRO_VEN_VALOR` decimal(10,2) NOT NULL,
  PRIMARY KEY (`VEN_CODIGO`,`PRO_CODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produto_venda`
--

INSERT INTO `tb_produto_venda` (`VEN_CODIGO`, `PRO_CODIGO`, `PRO_VEN_QUANTIDADE`, `PRO_VEN_VALOR`) VALUES
(1, 6, 2, '0.80'),
(1, 25, 15, '1.00'),
(1, 10, 3, '1.00'),
(2, 21, 2, '2.65'),
(2, 14, 3, '12.25'),
(3, 9, 20, '2.80'),
(3, 6, 2, '0.80');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `USU_CODIGO` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `USU_NOME` varchar(30) DEFAULT NULL,
  `USU_LOGIN` varchar(20) DEFAULT NULL,
  `USU_SENHA` varchar(80) DEFAULT NULL,
  `USU_NIVEL` char(1) NOT NULL,
  PRIMARY KEY (`USU_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`USU_CODIGO`, `USU_NOME`, `USU_LOGIN`, `USU_SENHA`, `USU_NIVEL`) VALUES
(3, 'Administrador', 'administrador', 'YWRtaW4xMA==', 'A'),
(2, 'Leonardo', 'leonardo', 'bGVvMTIz', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_venda`
--

CREATE TABLE IF NOT EXISTS `tb_venda` (
  `VEN_CODIGO` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CLI_CODIGO` int(10) unsigned DEFAULT NULL,
  `VEN_TOTAL` varchar(15) DEFAULT NULL,
  `VEN_DATA` date DEFAULT NULL,
  `VEN_PAGAMENTO` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`VEN_CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_venda`
--

INSERT INTO `tb_venda` (`VEN_CODIGO`, `CLI_CODIGO`, `VEN_TOTAL`, `VEN_DATA`, `VEN_PAGAMENTO`) VALUES
(1, 8, 'R$ 19,60', '2011-06-22', 'A vista - Dinheiro'),
(2, 0, 'R$ 42,05', '2011-06-22', 'Cartao de Debito'),
(3, 15, 'R$ 57,60', '2011-06-22', 'Boleto Bancario');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
