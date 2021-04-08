-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08/04/2021 às 19:29
-- Versão do servidor: 10.4.18-MariaDB
-- Versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test_crud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `desc_cidade` varchar(200) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id`, `desc_cidade`, `id_estado`) VALUES
(1, 'Porto Alegre', 1),
(2, 'Gravataí', 1),
(3, 'Canoas', 1),
(4, 'Caxias do Sul', 1),
(5, 'Cachoeirinha', 1),
(6, 'São Paulo', 2),
(7, 'Campinas', 2),
(8, 'Intaiatuba', 2),
(9, 'Atibaia', 2),
(10, 'Florianópolis', 3),
(11, 'Blumenau', 3),
(12, 'Chapecó', 3),
(13, 'São José', 3),
(14, 'Curitiba', 4),
(15, 'São José dos Pinhais', 4),
(16, 'Foz do Iguaçu', 4),
(17, 'Rio de Janeiro', 5),
(18, 'Niterói', 5),
(19, 'Duque de Caxias', 5),
(20, 'Petrópolis', 5),
(21, 'Belo Horizonte', 6),
(22, 'Ouro Preto', 6),
(23, 'Santa Luzia', 6),
(24, 'Vila Velha', 7),
(25, 'Cariacica', 7),
(26, 'Serra', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `desc_estado` varchar(200) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id`, `desc_estado`, `uf`) VALUES
(1, 'Rio Grande do Sul', 'RS'),
(2, 'São Paulo', 'SP'),
(3, 'Santa Catarina', 'SC'),
(4, 'Paraná', 'PR'),
(5, 'Rio de Janeiro', 'RJ'),
(6, 'Minas Gerais', 'MG'),
(7, 'Espírito Santo', 'ES');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `dt_nascimento`, `email`, `telefone`, `id_cidade`, `id_estado`) VALUES
(5, 'José Jesus', '99999999999', '1980-10-01', 'email@gmail.com', '11999999999', 6, 2),
(6, 'Maria Jesus', '88888888888', '1979-08-17', 'email2@gmail.com', '51999999999', 2, 1),
(7, 'Rosa Jesus', '11111111111', '2011-03-06', 'email3@hotmail.com', '11999999999', 23, 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;