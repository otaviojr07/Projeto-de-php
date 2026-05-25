-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 07:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proj35`
--
CREATE DATABASE IF NOT EXISTS `db_proj35` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_proj35`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_carrinhos`
--

DROP TABLE IF EXISTS `tb_carrinhos`;
CREATE TABLE `tb_carrinhos` (
  `id_carrinho` int(11) NOT NULL,
  `numero_carrinho` varchar(30) DEFAULT NULL,
  `id_usuario_carrinho` int(11) DEFAULT NULL,
  `id_produto_carrinho` int(11) DEFAULT NULL,
  `quantidade_carrinho` int(11) DEFAULT NULL,
  `status_carrinho` int(11) DEFAULT NULL,
  `data_carrinho` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produtos`
--

DROP TABLE IF EXISTS `tb_produtos`;
CREATE TABLE `tb_produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(30) DEFAULT NULL,
  `descricao_produto` varchar(200) DEFAULT NULL,
  `caracteristica_produto` varchar(200) DEFAULT NULL,
  `estoque_produto` int(11) DEFAULT NULL,
  `valor_produto` decimal(8,2) DEFAULT NULL,
  `imagem_produto` varchar(20) DEFAULT NULL,
  `barcode_produto` varchar(13) DEFAULT NULL,
  `status_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produtos`
--

INSERT INTO `tb_produtos` (`id_produto`, `nome_produto`, `descricao_produto`, `caracteristica_produto`, `estoque_produto`, `valor_produto`, `imagem_produto`, `barcode_produto`, `status_produto`) VALUES
(1, 'Produto 1', 'Desc prod 1', 'Carac prod 1', 20, 32.56, 'fone.jpg', '1245788956235', 1),
(2, 'Prod 2', 'dçmvçsdvmdçmmk ´pokkgwopr rwopgj pjgp', 'jpofrk gpo k´po ko´pg ke´p k´ket´k et kge´pok´htkre´pfhke´k´hk', 20, 23.66, 'roda.jpg', '8522649464646', 1),
(3, 'Prod 3', 'kookokokobfdjkgpfekgp kgko pepoj gpjpj', 'jkvfpojkpo´grjkogrjbprsjvpojvpsojbpbpskbpp', 12, 155.69, 'celular.jpg', '1446485644646', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `apelido_usuario` varchar(15) DEFAULT NULL,
  `cpf_usuario` varchar(14) DEFAULT NULL,
  `email_usuario` varchar(50) DEFAULT NULL,
  `cep_usuario` varchar(9) DEFAULT NULL,
  `rua_usuario` varchar(50) DEFAULT NULL,
  `numero_rua_usuario` varchar(5) DEFAULT NULL,
  `bairro_usuario` varchar(30) DEFAULT NULL,
  `cidade_usuario` varchar(30) DEFAULT NULL,
  `uf_usuario` varchar(2) DEFAULT NULL,
  `nascimento_usuario` date DEFAULT NULL,
  `senha_usuario` varchar(32) DEFAULT NULL,
  `tempero_usuario` varchar(32) DEFAULT NULL,
  `telefone_usuario` varchar(11) DEFAULT NULL,
  `recupera_usuario` varchar(8) DEFAULT NULL,
  `nivel_usuario` int(11) DEFAULT NULL,
  `dt_criacao_usuario` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nome_usuario`, `apelido_usuario`, `cpf_usuario`, `email_usuario`, `cep_usuario`, `rua_usuario`, `numero_rua_usuario`, `bairro_usuario`, `cidade_usuario`, `uf_usuario`, `nascimento_usuario`, `senha_usuario`, `tempero_usuario`, `telefone_usuario`, `recupera_usuario`, `nivel_usuario`, `dt_criacao_usuario`) VALUES
(1, 'João Silva', 'joaos', '123.456.789-00', 'joao.silva@example.com', '14020-000', 'Rua A', '123', 'Centro', 'Ribeirão Preto', 'SP', '1990-01-01', 'senha123', '', '16999999999', '', 1, '2025-04-29 16:09:14'),
(2, 'Maria Oliveira', 'mariao', '987.654.321-00', 'maria.oliveira@example.com', '14021-000', 'Rua B', '456', 'Jardim', 'Ribeirão Preto', 'SP', '1985-05-15', 'senha456', '', '16988888888', '', 10, '2025-04-29 16:09:14'),
(3, 'Carlos Souza', 'carloss', '111.222.333-44', 'carlos.souza@example.com', '14022-000', 'Rua C', '789', 'Vila', 'Ribeirão Preto', 'SP', '1978-09-23', 'senha789', '', '16977777777', '', 10, '2025-04-29 16:09:14'),
(4, 'Ana Costa', 'anac', '555.666.777-88', 'ana.costa@example.com', '14023-000', 'Rua D', '101', 'Industrial', 'Ribeirão Preto', 'SP', '1995-12-30', 'senha101', '', '16966666666', '', 1, '2025-04-29 16:09:14'),
(5, 'Pedro Lima', 'pedrol', '999.888.777-66', 'pedro.lima@example.com', '14024-000', 'Rua E', '202', 'Residencial', 'Ribeirão Preto', 'SP', '1982-07-07', 'senha202', '', '16955555555', '', 1, '2025-04-29 16:09:14'),
(6, 'Paulo Castro', 'paulommc', '26357889873', 'paulommc@gmail.com', '14037410', 'Rua José de Fátima Souza', '450', 'Loteamento Santa Marta', 'Ribeirão Preto', 'SP', '1977-04-21', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '16996434242', '', 10, '2025-05-06 15:31:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_carrinhos`
--
ALTER TABLE `tb_carrinhos`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_carrinhos`
--
ALTER TABLE `tb_carrinhos`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
