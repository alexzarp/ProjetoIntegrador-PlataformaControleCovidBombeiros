-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Maio-2021 às 23:32
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `covidbombeiros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalia_retorno`
--

CREATE TABLE `avalia_retorno` (
  `id` int(11) NOT NULL,
  `fk_id_pretestagem` int(11) NOT NULL,
  `dt_teste` date NOT NULL,
  `dt_prevista` date DEFAULT NULL,
  `dt_real` date DEFAULT NULL,
  `dt_nova` date DEFAULT NULL,
  `comentario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avalia_retorno`
--

INSERT INTO `avalia_retorno` (`id`, `fk_id_pretestagem`, `dt_teste`, `dt_prevista`, `dt_real`, `dt_nova`, `comentario`) VALUES
(17, 29, '2021-05-24', '0000-00-00', NULL, NULL, 'tESTANDOA  AAIO'),
(18, 29, '2021-05-24', '0000-00-00', NULL, NULL, 'tESTANDOA  AAIO'),
(19, 29, '2021-05-24', '0000-00-00', NULL, NULL, 'Testando aqui'),
(20, 29, '2021-05-24', '0000-00-00', NULL, NULL, 'Testando aqui'),
(21, 29, '2021-05-25', '0000-00-00', NULL, NULL, 'dsdasiuas janoajasdjadnsk a'),
(22, 29, '2021-05-25', '0000-00-00', NULL, NULL, 'dsdasiuas janoajasdjadnsk a'),
(23, 29, '2021-05-24', '2021-05-24', '0000-00-00', '0000-00-00', 'Teste olha o email'),
(24, 29, '2021-05-24', '0000-00-00', '2021-05-24', '2021-05-25', 'saasis iuaashi is'),
(25, 29, '2021-05-24', '0000-00-00', '0000-00-00', '0000-00-00', 'olha aqui '),
(26, 29, '2021-05-24', '0000-00-00', '0000-00-00', '0000-00-00', 'Olha isso aqui Bruna'),
(27, 30, '2021-05-24', '2021-05-26', '0000-00-00', '0000-00-00', 'Testando aqui');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bombeiro`
--

CREATE TABLE `bombeiro` (
  `matricula` int(7) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bombeiro`
--

INSERT INTO `bombeiro` (`matricula`, `email`, `senha`, `nome`, `adm`) VALUES
(1234455, 'usuario@u.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teste Usuario', 0),
(1234567, 'admin@a.com', 'e10adc3949ba59abbe56e057f20f883e', 'Alessandro Souza', 1),
(1234568, 'nao@h.com', 'e10adc3949ba59abbe56e057f20f883e', 'Alex Sandro', 0),
(1268452, 'nao@h.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teste as aaa ', 0),
(5556265, 'nao@h.com', 'e10adc3949ba59abbe56e057f20f883e', 'Bruna Gabriela', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pretestagem`
--

CREATE TABLE `pretestagem` (
  `id` int(11) NOT NULL,
  `dt_ini_sint` date NOT NULL,
  `descr` varchar(1000) NOT NULL,
  `tipo_teste` varchar(20) DEFAULT NULL,
  `dt_teste` date DEFAULT NULL,
  `result_teste` binary(1) DEFAULT NULL,
  `faixa_etaria` varchar(7) NOT NULL,
  `matricula` int(7) NOT NULL,
  `id_vacina` int(11) DEFAULT NULL,
  `data_primeira` date DEFAULT NULL,
  `data_segunda` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pretestagem`
--

INSERT INTO `pretestagem` (`id`, `dt_ini_sint`, `descr`, `tipo_teste`, `dt_teste`, `result_teste`, `faixa_etaria`, `matricula`, `id_vacina`, `data_primeira`, `data_segunda`) VALUES
(29, '2021-05-23', 'usuiA HIAiuiaaiAIU ', 'PCR', '2021-05-24', 0x31, '30 - 39', 1234568, 0, '0000-00-00', '0000-00-00'),
(30, '2021-05-24', 'Eu tossi ', 'PCR', '2021-05-24', 0x31, '30 - 39', 5556265, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacina`
--

CREATE TABLE `vacina` (
  `id_vacina` int(11) NOT NULL,
  `nome_vac` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vacina`
--

INSERT INTO `vacina` (`id_vacina`, `nome_vac`) VALUES
(0, 'Sem'),
(1, 'CORONAVAC -  Instituto Butantan'),
(2, 'OXFORD - AstraZeneca'),
(3, 'PFIZER');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avalia_retorno`
--
ALTER TABLE `avalia_retorno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pretestagem` (`fk_id_pretestagem`);

--
-- Índices para tabela `bombeiro`
--
ALTER TABLE `bombeiro`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `pretestagem`
--
ALTER TABLE `pretestagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `fk_id_vacina` (`id_vacina`);

--
-- Índices para tabela `vacina`
--
ALTER TABLE `vacina`
  ADD PRIMARY KEY (`id_vacina`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avalia_retorno`
--
ALTER TABLE `avalia_retorno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `pretestagem`
--
ALTER TABLE `pretestagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `vacina`
--
ALTER TABLE `vacina`
  MODIFY `id_vacina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avalia_retorno`
--
ALTER TABLE `avalia_retorno`
  ADD CONSTRAINT `avalia_retorno_ibfk_1` FOREIGN KEY (`fk_id_pretestagem`) REFERENCES `pretestagem` (`id`);

--
-- Limitadores para a tabela `pretestagem`
--
ALTER TABLE `pretestagem`
  ADD CONSTRAINT `fk_id_vacina` FOREIGN KEY (`id_vacina`) REFERENCES `vacina` (`id_vacina`),
  ADD CONSTRAINT `pretestagem_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `bombeiro` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
