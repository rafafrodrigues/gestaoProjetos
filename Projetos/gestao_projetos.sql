-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2021 às 04:14
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestao_projetos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_projetos`
--
-- Criação: 17-Jun-2021 às 22:58
--

DROP TABLE IF EXISTS `tb_projetos`;
CREATE TABLE `tb_projetos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tarefas` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `colaborador` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `auxiliando` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `prazo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `equipe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `tb_projetos`:
--   `status_id`
--       `tb_status` -> `id_status`
--   `users_id`
--       `users` -> `id`
--

--
-- Extraindo dados da tabela `tb_projetos`
--

INSERT INTO `tb_projetos` (`id`, `nome`, `tarefas`, `colaborador`, `auxiliando`, `prazo`, `equipe`, `criado`, `modificado`, `status_id`, `users_id`, `ativo`) VALUES
(3, 'Criar lista servidores', 'Catalogar servidores', 'Bruna', 'NÃ£o informado', '20/06/21', 'NOC', '2021-05-27 14:28:07', '2021-06-17 23:24:00', 1, 1, 1),
(5, 'Qualitor', 'processos e tarefas', 'Thiago', 'NÃ£o informado', '20/07/21', 'NOC', '2021-05-27 21:29:27', '2021-06-17 23:24:22', 2, 1, 1),
(6, 'Linhas Celulares', 'catalogar linhas e usuÃ¡rios', 'Leonardo', 'NÃ£o informado', '20/07/21', 'InfraN2', '2021-05-27 22:25:08', '2021-06-17 23:29:34', 2, 2, 1),
(7, 'Novos Notebooks', 'Configurar sistema e aplicativos', 'Bruno', 'NÃ£o informado', '23/05/21', 'Field', '2021-05-28 01:33:17', '2021-06-17 23:29:45', 3, 1, 1),
(8, 'Atualizar Wiki SD', 'Atualizar links, PDF\'s e manuais SD', 'Ramon', 'Rodrigo', '27/09/21', 'SD', '2021-05-28 01:34:58', '2021-06-17 23:29:58', 1, 1, 1),
(9, 'Manuais MFA', 'Atualizar PDF\'s e manuais', 'Daniel', 'Charles', '20/07/21', 'Infra', '2021-05-28 01:36:10', '2021-06-17 23:30:24', 1, 2, 1),
(10, 'SLA chamados', 'analisar histÃ³rico dos atendimentos', 'Matheus', 'NÃ£o informado', '29/05/21', 'SD', '2021-05-28 12:25:37', '2021-06-17 23:30:35', 3, 1, 1),
(11, 'SLA chamados', 'analisar histÃ³rico dos atendimentos', 'Matheus', 'NÃ£o informado', '27/05/21', 'SD', '2021-05-28 12:30:14', '2021-06-17 23:30:46', 1, 1, 1),
(12, 'Aparelhos celulares', 'levantamento de quantidade e modelos.', 'Marcos', 'Bruno', '25/06/21', 'Field', '2021-05-28 12:33:11', '2021-06-17 23:30:56', 1, 1, 1),
(13, 'Rotinas Qualitor', 'fluxo diÃ¡rio de atividades', 'Rafael', 'Thiago', '30/08/21', 'NOC', '2021-05-28 12:34:48', '2021-06-17 23:31:11', 1, 1, 1),
(14, 'Atividades SD', 'levantamento das atividades da Ã¡rea', 'Rodrigo', 'Denis', '24/02/21', 'SD', '2021-05-28 12:39:41', '2021-06-17 23:31:24', 2, 2, 1),
(15, 'Processos SD', 'levantamento das atividades da Ã¡rea', 'Rodrigo', 'Denis', '22/02/21', 'SD', '2021-05-28 12:39:47', '2021-06-17 23:31:35', 2, 1, 1),
(17, 'Zabbix', 'atualizar triggers', 'Paulo', 'Bruna', '21/07/21', 'NOC', '2021-05-28 12:41:34', '2021-06-17 23:31:50', 3, 1, 1),
(18, 'Adriana Doria', 'Atividades via qualitor', 'Daniel', 'Leonardo', '30/08/21', 'InfraN2', '2021-05-29 00:31:52', '2021-06-17 23:32:03', 2, 1, 1),
(19, 'Atualizar Wiki NOC', 'Atualizar PDF\'s e manuais', 'Paulo', 'NÃ£o informado', '30/09/21', 'NOC', '2021-05-29 22:44:34', '2021-06-17 23:32:17', 1, 2, 1),
(20, 'Treinamento SD', 'dar treinamento para novos colaboradores', 'Mathues', 'Thiago', '30/10/21', 'SD', '2021-05-29 22:45:18', '2021-06-17 23:32:39', 2, 1, 1),
(21, 'Adriana Doria', 'teste', 'tteste', 'denis', '20 dias', 'InfraN2', '2021-05-29 22:45:42', '2021-06-17 23:32:58', 1, 2, 1),
(22, 'Software Power Apps', 'Desenvolver app para centralizar informaÃ§Ãµes', 'Rafael', 'NÃ£o informado', '25/07/21', 'NOC', '2021-05-29 22:47:09', '2021-06-17 23:33:10', 2, 1, 1),
(23, 'SLA chamados NOC', 'analisar histÃ³rico dos atendimentos', 'Bruna', 'NÃ£o informado', '25/07/21', 'NOC', '2021-05-29 23:03:55', '2021-06-17 23:33:22', 2, 1, 1),
(24, 'Abertura chamados', 'identificar horÃ¡rio que chamados abrem automaticamente', 'Matheus', 'Thiago', '29/06/21', 'NOC', '2021-06-17 18:56:36', '2021-06-17 23:33:37', 1, 1, 1),
(30, 'teste 11', 'teste 11', 'teste 11', 'teste 1111', '30/08/21', 'teste 11', '2021-06-17 23:56:11', '2021-06-17 23:56:11', 2, 1, 1),
(31, 'Trigger Zabbix', 'atualizar triggers zabbix', 'Paulo', 'NÃ£o informado', '28/06/21', 'NOC', '2021-06-17 23:58:29', '2021-06-23 02:11:09', 3, 1, 1),
(32, 'Lista chamados', 'listar chamados automÃ¡ticos do Qualitor', 'Charles', 'Thiago', '30/06/21', 'NOC', '2021-06-18 00:05:12', '2021-06-23 02:04:41', 3, 2, 1),
(33, 'ConfiguraÃ§Ãµes notebooks', 'configurar novos notebooks', 'Marcos', 'NÃ£o informado', '15/07/21', 'Field', '2021-06-18 00:06:58', '2021-06-23 01:50:49', 3, 2, 1),
(34, 'teste 17', 'teste 17', 'teste 17', 'teste 17', '30/08/21', 'teste 17', '2021-06-18 00:07:58', '2021-06-18 00:07:58', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--
-- Criação: 27-Maio-2021 às 14:14
--

DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pendente',
  `ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `tb_status`:
--

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`, `ativo`) VALUES
(1, 'Pendente', 1),
(2, 'Em andamento', 1),
(3, 'Realizado', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--
-- Criação: 17-Jun-2021 às 18:50
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `criado`, `modificado`) VALUES
(1, 'Adriana Doria', 'adriana@gruporbs.com.br', 'a01183854d7e784f0455d559f4327d55', '2021-05-24 18:58:44', NULL),
(2, 'Jessica Chavier', 'jessica@gruporbs.com.br', 'aae039d6aa239cfc121357a825210fa3', '2021-05-24 19:13:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_projetos`
--
ALTER TABLE `tb_projetos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_projetos_ibfk_1` (`status_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_projetos`
--
ALTER TABLE `tb_projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_projetos`
--
ALTER TABLE `tb_projetos`
  ADD CONSTRAINT `tb_projetos_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_projetos_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
