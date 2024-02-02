-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Dez-2023 às 16:51
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `zcond`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas_comuns`
--

DROP TABLE IF EXISTS `areas_comuns`;
CREATE TABLE IF NOT EXISTS `areas_comuns` (
  `area_id` int NOT NULL,
  `nome_do_condomino` varchar(100) DEFAULT NULL,
  `unidade_id` int DEFAULT NULL,
  `condomino_id` int DEFAULT NULL,
  `nome_condomino` varchar(100) DEFAULT NULL,
  `email_empresa` varchar(100) DEFAULT NULL,
  `dt_reserva` date DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominios`
--

DROP TABLE IF EXISTS `condominios`;
CREATE TABLE IF NOT EXISTS `condominios` (
  `condominio_id` int NOT NULL AUTO_INCREMENT,
  `fundador_condominio` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nome_condominio` varchar(15) DEFAULT NULL,
  `cnpj_condominio` char(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `cpf_fundador` char(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `rg` varchar(10) DEFAULT NULL,
  `apartamentos` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`condominio_id`),
  UNIQUE KEY `cpf` (`cpf_fundador`) USING BTREE,
  UNIQUE KEY `cnpj` (`cnpj_condominio`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `condominios`
--

INSERT INTO `condominios` (`condominio_id`, `fundador_condominio`, `nome_condominio`, `cnpj_condominio`, `cpf_fundador`, `cep`, `rg`, `apartamentos`) VALUES
(21, 'Isabella Oasis', 'Edíficio Oasis', '54328705328705', '140666900', '11070300', NULL, '54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `documentos_id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`documentos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`documentos_id`, `titulo`, `descricao`) VALUES
(6, 'Gasto do mês', 'ata');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `funcionario_id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `celular` int DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `funcao` varchar(20) DEFAULT NULL,
  `admissao` date DEFAULT NULL,
  `demissao` date DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  PRIMARY KEY (`funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`funcionario_id`, `nome`, `cpf`, `telefone`, `celular`, `email`, `estado`, `cidade`, `funcao`, `admissao`, `demissao`, `dt_nasc`) VALUES
(1, 'Renan Stabile', '5496306806', 32518693, 981444230, 'renan@gmail.com', 'SP', 'Santos', 'Proprietário', '2023-02-13', '2050-11-23', '2005-07-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias`
--

DROP TABLE IF EXISTS `ocorrencias`;
CREATE TABLE IF NOT EXISTS `ocorrencias` (
  `registro_id` int NOT NULL AUTO_INCREMENT,
  `sujeito` varchar(30) NOT NULL,
  `funcao` varchar(30) NOT NULL,
  `solicitante` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`registro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `ocorrencias`
--

INSERT INTO `ocorrencias` (`registro_id`, `sujeito`, `funcao`, `solicitante`, `descricao`) VALUES
(50, 'Flavio Monteiro', 'Administrador', 'Juan Carlito', 'Me deu R');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id_morador` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `apartamento` int DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `celular` int DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` int DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id_morador`),
  UNIQUE KEY `email_condomino` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id_morador`, `nome`, `apartamento`, `telefone`, `celular`, `email`, `cpf`, `rg`, `data`) VALUES
(5, 'Gabriel Calvacante', 11, 2147483647, NULL, 'gabriel@gmail.com', '62413531413', 918394712, '2025-01-10'),
(7, 'teste', 0, 0, NULL, 'teste', 'teste', 0, '2024-01-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

DROP TABLE IF EXISTS `relatorios`;
CREATE TABLE IF NOT EXISTS `relatorios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL,
  `caminho_arquivo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `relatorios`
--

INSERT INTO `relatorios` (`id`, `titulo`, `descricao`, `caminho_arquivo`) VALUES
(158, 'Problema na Garagem', 'O portão central está com problema e precisa realizar uma manutenção urgente.', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `reservas_id` int NOT NULL AUTO_INCREMENT,
  `area` varchar(15) DEFAULT NULL,
  `residencia` int DEFAULT NULL,
  `solicitante` varchar(30) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario` time(4) DEFAULT NULL,
  `termino` time(4) DEFAULT NULL,
  `aluguel` int DEFAULT NULL,
  `taxa` int DEFAULT NULL,
  PRIMARY KEY (`reservas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`reservas_id`, `area`, `residencia`, `solicitante`, `data`, `horario`, `termino`, `aluguel`, `taxa`) VALUES
(9, 'Sala de Cinema', 77, 'Thayná', '2023-11-22', '19:54:00.0000', '20:54:00.0000', 1900, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(100) DEFAULT NULL,
  `nome_fundador` varchar(100) DEFAULT NULL,
  `cpf_fundador` char(11) DEFAULT NULL,
  `cnpj_empresa` char(14) DEFAULT NULL,
  `email_empresa` varchar(100) DEFAULT NULL,
  `telefone` varchar(21) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `cpf_fundador` (`cpf_fundador`),
  UNIQUE KEY `cnpj_empresa` (`cnpj_empresa`),
  UNIQUE KEY `email_empresa` (`email_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nome_empresa`, `nome_fundador`, `cpf_fundador`, `cnpj_empresa`, `email_empresa`, `telefone`, `senha`) VALUES
(6, 'Samsung', 'Renan Stabile', '08980721378', '68676134781', 'renan@gmail.com', '32518693', 'renanlindomaravilhoso'),
(10, 'LEMBREI PAGUEI', 'Isabella Santos', '140666900', '92798214621986', 'isa@gmail.com', '13981973154', 'renan1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
