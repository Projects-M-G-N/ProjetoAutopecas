-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Abr-2024 às 23:57
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sis_analise`
--
CREATE DATABASE IF NOT EXISTS `sis_analise` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sis_analise`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `SENHA` varchar(100) DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL,
  `DATA_DE_NASCIMENTO` date DEFAULT NULL,
  `ENDERECO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID`, `NOME`, `EMAIL`, `SENHA`, `TELEFONE`, `DATA_DE_NASCIMENTO`, `ENDERECO`) VALUES
(1, 'ASD', 'a@gmail.com', '1', '1', '2024-04-23', '1'),
(2, 'g', 's@gmail.com', 'asa', 'asd', '2024-04-23', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL,
  `ENDERECO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `problema`
--

CREATE TABLE IF NOT EXISTS `problema` (
  `ID` int(11) NOT NULL,
  `ID_PRODUTO` int(11) DEFAULT NULL,
  `DESCRICAO` text,
  PRIMARY KEY (`ID`),
  KEY `ID_PRODUTO` (`ID_PRODUTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `DESCRICAO` text,
  `QUANTIDADE` int(11) DEFAULT NULL,
  `FORNECEDOR` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FORNECEDOR` (`FORNECEDOR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_vendedor`
--

CREATE TABLE IF NOT EXISTS `tipo_vendedor` (
  `ID` int(11) NOT NULL,
  `TIPO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE IF NOT EXISTS `vendedor` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL,
  `COD_TIPO` int(11) DEFAULT NULL,
  `DATA_DE_NASCIMENTO` date DEFAULT NULL,
  `ENDERECO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CPF` (`CPF`),
  KEY `COD_TIPO` (`COD_TIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `problema`
--
ALTER TABLE `problema`
  ADD CONSTRAINT `problema_ibfk_1` FOREIGN KEY (`ID_PRODUTO`) REFERENCES `produto` (`ID`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`FORNECEDOR`) REFERENCES `fornecedor` (`ID`);

--
-- Limitadores para a tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `vendedor_ibfk_1` FOREIGN KEY (`COD_TIPO`) REFERENCES `tipo_vendedor` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
