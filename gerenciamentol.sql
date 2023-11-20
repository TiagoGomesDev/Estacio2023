-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Nov-2023 às 02:17
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciamentol`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome_forn` varchar(30) DEFAULT NULL,
  `cnpj` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome_forn`, `cnpj`) VALUES
(1, 'Tiago L', '11.122.223/3344-55	'),
(2, 'Luis G', '11.122.223/3344-55	'),
(3, 'Ira', '22.122.223/3344-55	\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `qtda_produto_solicitado` int(11) NOT NULL DEFAULT 1,
  `fk_produto` int(11) NOT NULL,
  `fk_fornecedor` int(11) NOT NULL,
  `fk_funcionario` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `qtda_produto_solicitado`, `fk_produto`, `fk_fornecedor`, `fk_funcionario`, `status`) VALUES
(1, 10, 1, 1, 1, 14),
(5, 80, 1, 1, 1, 14),
(6, 3, 1, 1, 1, 10),
(7, 2, 2, 2, 2, 2),
(8, 1, 2, 1, 1, 1),
(9, 22, 2, 2, 59, 16),
(10, 1000, 1, 1, 1, 15),
(11, 88, 1, 1, 1, 16),
(13, 59, 1, 1, 59, 25),
(14, 12, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Lector');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produtos` int(11) NOT NULL,
  `nome_produto` varchar(30) NOT NULL,
  `qtda_produtos` int(11) NOT NULL,
  `empresa` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produtos`, `nome_produto`, `qtda_produtos`, `empresa`) VALUES
(1, 'Refrigerante', 100, 'Coca Cola'),
(2, 'Água', 10, 'Dias D'),
(5, 'Ventilador', 200, 'Mundial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `r_entregas`
--

CREATE TABLE `r_entregas` (
  `id_entregas` int(11) NOT NULL,
  `fk_fornecedor` int(11) NOT NULL,
  `data_entrega` date NOT NULL,
  `produto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `r_estoque`
--

CREATE TABLE `r_estoque` (
  `id_estoque` int(11) NOT NULL,
  `fk_produto` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nome_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `nome_status`) VALUES
(1, 'Pago'),
(2, 'Não Pago'),
(3, 'Concluído'),
(4, 'Pendente'),
(5, 'Ativo'),
(6, 'Inativo'),
(7, 'Aberto'),
(8, 'Fechado'),
(9, 'Em Andamento'),
(10, 'Encerrado'),
(11, 'Aprovado'),
(12, 'Reprovado'),
(13, 'Enviado'),
(14, 'Não Enviado'),
(15, 'Agendado'),
(16, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `cargo` varchar(70) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `telefono`, `password`, `fecha`, `rol`, `imagen`, `cargo`, `usuario`) VALUES
(1, 'Tiago Gomes', 'tiago@gmail.com', '7100', '12345', '2023-10-08 00:59:47', 1, '', 'Dev', 'Tiago'),
(59, 'Emanuel', 'mugarte5672@gmail.com', '9911165670', '12345', '2023-10-24 23:54:29', 1, 'user1.png', 'Dono', 'Emanuel'),
(66, 'Tommy Shelby', 'Mafia@Irlandesa.com', '55825888', '12345', '2023-08-16 17:37:26', 2, 'qr.png', '', 'Tommt'),
(68, 'Maria', 'jt615257@gmail.com', '9911165670', '12345', '2023-10-08 01:33:18', 2, 'bg.jpg', 'Atendente', 'Maria'),
(70, 'Shaggy', 'Shaggy@Buu.net', '9911165670', '12345', '2023-08-16 17:37:26', 2, 'user.png', '', 'Shaggy'),
(72, 'gg', 'jj@gmail.com', '11', '12345', '2023-10-24 23:51:07', 1, '', '', 'James'),
(73, 'kk', 'jj@gmail.com', '55', '12345', '2023-10-24 23:54:15', 1, '', '', 'Gomes'),
(78, 'pp', 'pp@gmail.com', '', '12345', '2023-10-24 23:55:14', 2, '', '', 'Pedro'),
(80, 'ttt', 'ttt@gmail.com', '71555555555', '12345', '2023-10-28 23:11:52', 1, '', 'te', 'ttt'),
(81, 'testdriv', 'driv@gmail.com', '71', '12345t', '2023-10-30 00:39:46', 1, '', 'analista', 'tiagoDriv'),
(82, 'Tiago Luis Gomes Santos', 'tiago.dev9@gmail.com', '(71) 98637-6784', '12345', '2023-10-30 00:46:56', 1, '', 'dev', 'tiago gomes1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`);

--
-- Índices para tabela `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- Índices para tabela `r_entregas`
--
ALTER TABLE `r_entregas`
  ADD PRIMARY KEY (`id_entregas`);

--
-- Índices para tabela `r_estoque`
--
ALTER TABLE `r_estoque`
  ADD PRIMARY KEY (`id_estoque`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `r_entregas`
--
ALTER TABLE `r_entregas`
  MODIFY `id_entregas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `r_estoque`
--
ALTER TABLE `r_estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
