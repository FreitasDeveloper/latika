-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/08/2023 às 23:20
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_latika`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_bairro`
--

CREATE TABLE `tb_bairro` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `CIDADE` varchar(50) NOT NULL DEFAULT 'Volta Redonda',
  `TAXA_ENTREGA` decimal(5,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `CPF` char(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `TELEFONE` varchar(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `SENHA` char(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `CODIGO` int(11) NOT NULL,
  `CPF_CLIENTE` char(11) NOT NULL,
  `ALIAS` varchar(10) DEFAULT NULL,
  `CODIGO_BAIRRO` int(11) NOT NULL,
  `RUA` varchar(100) NOT NULL,
  `NUMERO` varchar(10) NOT NULL,
  `COMPLEMENTO` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_forma_pagamento`
--

CREATE TABLE `tb_forma_pagamento` (
  `FORMA_PAGAMENTO` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `CPF` char(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `TELEFONE` varchar(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `SENHA` char(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_item_pedido`
--

CREATE TABLE `tb_item_pedido` (
  `CODIGO` int(11) NOT NULL,
  `CODIGO_PEDIDO` int(11) NOT NULL,
  `CPF_CLIENTE` char(11) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL DEFAULT 1,
  `OBSERVACAO` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `CODIGO` int(11) NOT NULL,
  `CPF_CLIENTE` char(11) NOT NULL,
  `DATA_HORA` datetime NOT NULL,
  `DATA_HORA_ENTREGA` datetime NOT NULL,
  `FORMA_PAGAMENTO` varchar(10) NOT NULL,
  `PAGO` enum('S','N') NOT NULL,
  `CODIGO_ENDERECO_ENTREGA` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL,
  `FOTO` blob DEFAULT NULL,
  `PRECO_VENDA` decimal(10,2) NOT NULL,
  `CODIGO_CATEGORIA` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produtodocarrinho`
--

CREATE TABLE `tb_produtodocarrinho` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_produtodocarrinho`
--
ALTER TABLE `tb_produtodocarrinho`
  ADD PRIMARY KEY (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
