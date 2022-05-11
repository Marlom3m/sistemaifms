-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Maio-2022 às 13:42
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

DROP TABLE IF EXISTS `atividade`;
CREATE TABLE IF NOT EXISTS `atividade` (
  `id_atividade` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `observacao` varchar(200) COLLATE utf8_czech_ci DEFAULT NULL,
  `limite` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_sala` tinyint(3) UNSIGNED DEFAULT NULL,
  `fk_evento` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_atividade`),
  KEY `fk_atividade_sala1_idx` (`fk_sala`),
  KEY `fk_atividade_evento1_idx` (`fk_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id_atividade`, `nome`, `descricao`, `observacao`, `limite`, `fk_sala`, `fk_evento`) VALUES
(1, 'Teste 1', 'Aqui vai a descriÃ§Ã£o da atividade', NULL, 0, 2, 1),
(2, 'Quem vai ficar com mÃ¡rio?', 'filme brasileiro que serÃ¡ lanÃ§ado.', 'ComÃ©dia', 10, 1, 1),
(3, 'Teste3', 'sds', NULL, 0, 1, 1),
(4, 'teste 4', 'teste4', NULL, 0, 1, 1),
(5, 'teste 5', 'teste4', NULL, 0, 1, 1),
(6, 'Teste6', 'teste6', NULL, 0, 1, 1),
(7, 'Jbl', 'Teste de audio', NULL, 10, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_atividade`
--

DROP TABLE IF EXISTS `data_atividade`;
CREATE TABLE IF NOT EXISTS `data_atividade` (
  `id_data_atividade` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `duracao` time DEFAULT NULL,
  `fk_atividade` mediumint(8) UNSIGNED NOT NULL,
  `senha` varchar(15) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id_data_atividade`),
  KEY `fk_data_atividade_atividade1` (`fk_atividade`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `data_atividade`
--

INSERT INTO `data_atividade` (`id_data_atividade`, `data`, `hora`, `duracao`, `fk_atividade`, `senha`) VALUES
(1, '2021-08-18', '10:00:00', NULL, 1, NULL),
(2, '2021-08-31', '15:00:00', NULL, 2, NULL),
(3, '2021-08-24', '03:28:00', '00:00:00', 3, NULL),
(4, '2021-08-25', '10:00:00', '00:00:00', 4, NULL),
(5, '2021-08-25', '10:00:00', '00:00:00', 5, NULL),
(6, '2021-08-31', '05:00:00', '20:00:00', 6, NULL),
(7, '2021-10-01', '12:00:00', '20:00:00', 7, '123465');

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_atividade_participante`
--

DROP TABLE IF EXISTS `data_atividade_participante`;
CREATE TABLE IF NOT EXISTS `data_atividade_participante` (
  `fk_data_atividade` int(10) UNSIGNED NOT NULL,
  `fk_participante` int(10) UNSIGNED NOT NULL,
  `presenca` tinyint(3) UNSIGNED ZEROFILL DEFAULT NULL,
  PRIMARY KEY (`fk_data_atividade`,`fk_participante`),
  KEY `fk_data_atividade_has_participante_participante1_idx` (`fk_participante`),
  KEY `fk_data_atividade_has_participante_data_atividade1_idx` (`fk_data_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `inicio` date NOT NULL,
  `final` date NOT NULL,
  `ano` year(4) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nome`, `inicio`, `final`, `ano`) VALUES
(1, 'Coneg', '2021-08-16', '2021-08-25', 2021),
(2, 'Semana AcadÃªmica Integrada das AgrÃ¡rias do IFMS - SEAGRO', '2021-10-04', '2021-10-08', 2021);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento_participante`
--

DROP TABLE IF EXISTS `evento_participante`;
CREATE TABLE IF NOT EXISTS `evento_participante` (
  `fk_evento` smallint(5) UNSIGNED NOT NULL,
  `fk_participante` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`fk_evento`,`fk_participante`),
  KEY `fk_evento_has_participante_participante1_idx` (`fk_participante`),
  KEY `fk_evento_has_participante_evento1_idx` (`fk_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `evento_participante`
--

INSERT INTO `evento_participante` (`fk_evento`, `fk_participante`) VALUES
(2, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestrante`
--

DROP TABLE IF EXISTS `palestrante`;
CREATE TABLE IF NOT EXISTS `palestrante` (
  `id_palestrante` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `instituicao` varchar(70) COLLATE utf8_czech_ci DEFAULT NULL,
  `foto` varchar(70) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id_palestrante`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `palestrante`
--

INSERT INTO `palestrante` (`id_palestrante`, `nome`, `email`, `instituicao`, `foto`) VALUES
(1, 'Joao', 'j@j', 'IFMS', NULL),
(2, 'Arthur', 'f@f', 'dsa', NULL),
(3, 'Lucas', 'l@l', 'ifms', NULL),
(4, 'Bruno', 'b@b', 'ifms', NULL),
(5, 'teste', 'a@a', 'dd', NULL),
(6, 'tdf', 'f@d', 'ds', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestrante_atividade`
--

DROP TABLE IF EXISTS `palestrante_atividade`;
CREATE TABLE IF NOT EXISTS `palestrante_atividade` (
  `fk_atividade` mediumint(8) UNSIGNED NOT NULL,
  `fk_palestrante` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`fk_atividade`,`fk_palestrante`),
  KEY `fk_palestrante_has_atividade_atividade1_idx` (`fk_atividade`),
  KEY `fk_palestrante_atividade_palestrante1_idx` (`fk_palestrante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `palestrante_atividade`
--

INSERT INTO `palestrante_atividade` (`fk_atividade`, `fk_palestrante`) VALUES
(1, 1),
(2, 1),
(3, 2),
(5, 1),
(5, 2),
(6, 2),
(7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participante`
--

DROP TABLE IF EXISTS `participante`;
CREATE TABLE IF NOT EXISTS `participante` (
  `id_participante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_turma` tinyint(3) UNSIGNED DEFAULT NULL,
  `fk_usuario` int(10) UNSIGNED NOT NULL,
  `fk_turno` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_participante`),
  KEY `fk_participante_turma1_idx` (`fk_turma`),
  KEY `fk_participante_usuario1_idx` (`fk_usuario`),
  KEY `fk_participante_turno1_idx` (`fk_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `participante`
--

INSERT INTO `participante` (`id_participante`, `fk_turma`, `fk_usuario`, `fk_turno`) VALUES
(10, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `id_sala` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id_sala`, `nome`) VALUES
(1, 'sala 101'),
(2, 'projetos.ifms.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_turma`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome`) VALUES
(1, 'Agricultura 1º Semestre'),
(2, 'Informática 1º Semestre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

DROP TABLE IF EXISTS `turno`;
CREATE TABLE IF NOT EXISTS `turno` (
  `id_turno` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`id_turno`, `nome`) VALUES
(1, 'Matutino'),
(2, 'Vespertino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) COLLATE utf8_czech_ci NOT NULL,
  `cpf` char(11) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `ra` mediumint(8) UNSIGNED DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  `modificado` timestamp NULL DEFAULT NULL,
  `comunidade` varchar(70) COLLATE utf8_czech_ci DEFAULT NULL,
  `instituicao` varchar(70) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `cpf`, `email`, `senha`, `ra`, `tipo`, `modificado`, `comunidade`, `instituicao`) VALUES
(1, 'Marlom', '01992971188', 'admin', '$2y$10$98Ez6O8NupXHpK.6alzvtuZiixK5Oy.lUJi57GDatjzKezKXvyvaS', 123, 1, NULL, NULL, 'IFMS');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_atividade_evento1` FOREIGN KEY (`fk_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atividade_sala1` FOREIGN KEY (`fk_sala`) REFERENCES `sala` (`id_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `data_atividade`
--
ALTER TABLE `data_atividade`
  ADD CONSTRAINT `fk_data_atividade_atividade1` FOREIGN KEY (`fk_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `data_atividade_participante`
--
ALTER TABLE `data_atividade_participante`
  ADD CONSTRAINT `fk_data_atividade_has_participante_data_atividade1` FOREIGN KEY (`fk_data_atividade`) REFERENCES `data_atividade` (`id_data_atividade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_data_atividade_has_participante_participante1` FOREIGN KEY (`fk_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `evento_participante`
--
ALTER TABLE `evento_participante`
  ADD CONSTRAINT `fk_evento_has_participante_evento1` FOREIGN KEY (`fk_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_has_participante_participante1` FOREIGN KEY (`fk_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `palestrante_atividade`
--
ALTER TABLE `palestrante_atividade`
  ADD CONSTRAINT `fk_palestrante_atividade_palestrante1` FOREIGN KEY (`fk_palestrante`) REFERENCES `palestrante` (`id_palestrante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_palestrante_has_atividade_atividade1` FOREIGN KEY (`fk_atividade`) REFERENCES `atividade` (`id_atividade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `fk_participante_turma1` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participante_turno1` FOREIGN KEY (`fk_turno`) REFERENCES `turno` (`id_turno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participante_usuario1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
