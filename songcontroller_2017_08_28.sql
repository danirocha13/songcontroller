-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/08/2017 às 08:59
-- Versão do servidor: 5.5.55-cll
-- Versão do PHP: 5.6.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crisfitn_songcontroller`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `culto`
--

CREATE TABLE `culto` (
  `id` int(11) NOT NULL,
  `local` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `nome` varchar(45) NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `culto`
--

INSERT INTO `culto` (`id`, `local`, `data`, `hora`, `nome`, `grupo_id`) VALUES
(33, 'Liberty Church', '2016-06-05', '09:00:00', 'Culto de Domingo', 28);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escala`
--

CREATE TABLE `escala` (
  `id` int(11) NOT NULL,
  `instrumento_id` int(11) NOT NULL,
  `integrante_id` int(11) NOT NULL,
  `culto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `igreja` varchar(45) DEFAULT NULL,
  `responsavel` varchar(45) NOT NULL,
  `imagem_grupo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`, `igreja`, `responsavel`, `imagem_grupo`) VALUES
(25, 'Meu grupo', NULL, 'Daniel Faria Rocha', NULL),
(26, 'Meu grupo', NULL, 'Daniel Faria Rocha', NULL),
(27, 'Meu grupo', NULL, 'Paulo Henrique da Silva', NULL),
(28, 'Worship Team', 'Liberty Church', 'Samuel Faria Rocha', 'worship-team.png'),
(29, 'Meu grupo', NULL, 'Rebeca Victória Rodrigues', NULL),
(30, 'Meu grupo', NULL, 'Walter Geraldo Rocho', NULL),
(31, 'Meu grupo', NULL, 'W G Rocha', NULL),
(32, 'Meu grupo', NULL, 'walter geraldo rocha', NULL),
(33, 'Meu grupo', NULL, 'Walter Geraldo Rocha', NULL),
(34, 'Meu grupo', NULL, 'Fabiano Santana', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `instrumento`
--

CREATE TABLE `instrumento` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `situacao` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `instrumento`
--

INSERT INTO `instrumento` (`id`, `nome`, `situacao`, `status`, `grupo_id`) VALUES
(40, 'baixo', 1, 1, 26),
(42, 'Korg Kross', 1, 1, 28),
(43, 'Yamaha s90', 1, 1, 28),
(44, 'Yamaha Motif X6', 1, 1, 28),
(46, 'Saxfone', 1, 1, 28),
(47, 'Guitarra', 1, 1, 26),
(48, 'Bateria', 1, 1, 26),
(49, 'Violão', 1, 1, 26),
(50, 'Teclado', 1, 1, 26),
(51, 'Microfone 1', 1, 1, 26),
(52, 'Microfone 2', 1, 1, 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `integrante`
--

CREATE TABLE `integrante` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `integrante`
--

INSERT INTO `integrante` (`id`, `nome`, `usuario`, `email`, `senha`, `categoria`, `status`, `tipo`, `foto`, `grupo_id`) VALUES
(59, 'Teste', 'admin', 'teste@hotmail.com', '123', 1, 1, 1, 'teste.jpg', 26),
(61, 'Paulo Henrique da Silva', 'paulohsilva', 'paulojunior18@gmail.com', '123', NULL, 1, 1, NULL, 27),
(62, 'Samuel Faria Rocha', 'samuelteclado', 'samuelteclado@hotmail.com', 'ec35abcd', 2, 1, 1, 'samuel-faria-rocha.jpg', 28),
(63, 'Ethan', 'ethan', 'ethan@hotmail.com', '645515', 2, 1, 2, NULL, 28),
(64, 'Fabiano daSilva', 'fabiano', 'fabiano@gmail.com', '454654', 2, 1, 2, NULL, 28),
(65, 'Bebe Lavergne', 'bebe', 'bebe@gmail.com', '369935', 2, 2, 2, NULL, 28),
(66, 'Pr.Mary Eliiot', 'mary', 'mary@gmail.com', '556662', 1, 1, 2, NULL, 28),
(67, 'Abimael Robles', 'abimael', 'abimael@gmail.com', '677688', 2, 1, 2, NULL, 28),
(68, 'Ron ', 'admin', 'ron@gmail.com', '124571', 2, 1, 2, NULL, 28),
(69, 'Rebeca Victória Rodrigues', 'RebecaVicty', 'rebecavicty166@gmail.com', '73253019', NULL, 1, 1, NULL, 29),
(70, 'Walter Geraldo Rocho', 'waltertaxi', 'walterrocha27hotmail.com', 'waltertaxi', NULL, 1, 1, NULL, 30),
(71, 'W G Rocha', 'walter geraldo rocha', 'walterrocha27@hotmail.com', 'waltergr', NULL, 1, 1, NULL, 31),
(72, 'walter geraldo rocha', 'WG rocha', 'walterrocha@ 27hotmail.com', 'walerrocha', NULL, 1, 1, NULL, 32),
(73, 'Walter Geraldo Rocha', 'W G Rocha', 'walterrocha27@hotmail.com', 'waltertaxi1010', NULL, 1, 1, NULL, 33),
(74, 'Ivan Tamietti', 'ivan', 'ivan@hotmail.com', '247041', 2, 1, 2, NULL, 26),
(76, 'vitor emiliano', 'vitor', 'vitor@hotmail.com', '399909', 2, 1, 2, NULL, 26),
(77, 'Douglas Junio', 'dogao', 'dogao@hotmail.com', '290597', 2, 1, 2, NULL, 26),
(78, 'marcos', 'marquinhos', 'marcos@hotmail.com', '770102', 2, 1, 2, NULL, 26),
(79, 'Alveci Silva', 'alvisilva', 'alvi@hotmail.com', '219475', 1, 1, 2, NULL, 26),
(80, 'Jonas Tamiieti', 'jonas', 'jonas@hotmail.com', '295766', 2, 1, 2, NULL, 26),
(81, 'Alexandre', 'xandy', 'xandy@hotmail.com', '444529', 1, 2, 2, NULL, 26),
(82, 'Lisa teixeira', 'lisa', 'lisa@hotmail.com', '733619', 1, 1, 2, NULL, 26),
(83, 'Arlinda Dantas', 'arlinda', 'arlinda@hotmail.com', '554577', 1, 1, 2, NULL, 26),
(84, 'Denny Silva', 'denny', 'santosdenny@hotmail.com', '113978', 2, 1, 2, NULL, 26),
(85, 'Fabiano Santana', 'Fabin', 'fabianosanttana@hotmail.com', 'fabin', NULL, 1, 1, NULL, 34);

-- --------------------------------------------------------

--
-- Estrutura para tabela `integrante_instrumento`
--

CREATE TABLE `integrante_instrumento` (
  `id` int(11) NOT NULL,
  `integrante_id` int(11) NOT NULL,
  `instrumento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `integrante_instrumento`
--

INSERT INTO `integrante_instrumento` (`id`, `integrante_id`, `instrumento_id`) VALUES
(70, 62, 42),
(73, 62, 44),
(74, 63, 44),
(75, 62, 43),
(76, 63, 43),
(78, 68, 46),
(79, 59, 47),
(80, 76, 47),
(81, 77, 48),
(83, 78, 50),
(84, 79, 50),
(85, 74, 49),
(86, 80, 49),
(87, 79, 51),
(88, 74, 40),
(94, 81, 52),
(95, 82, 52);

-- --------------------------------------------------------

--
-- Estrutura para tabela `musica`
--

CREATE TABLE `musica` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `artista_banda` varchar(45) DEFAULT NULL,
  `cifra` varchar(45) DEFAULT NULL,
  `power_point` varchar(45) DEFAULT NULL,
  `letra` varchar(45) DEFAULT NULL,
  `arquivo_mp3` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `musica`
--

INSERT INTO `musica` (`id`, `nome`, `artista_banda`, `cifra`, `power_point`, `letra`, `arquivo_mp3`, `link`, `grupo_id`) VALUES
(42, 'Endless Praise', 'Planet', NULL, NULL, 'endless-praisedocx', 'endless-praise.mp3', 'https://www.youtube.com/watch?v=eHPht8UrPWM', 28),
(43, 'Acende o fogo em mim', 'david quilan', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=yr_rcpGNYJU', 26),
(44, 'Mais forte que a morte', 'Juliano Son', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=Mvxh1oiZ_dc', 26),
(45, 'Creio que tu és a cura', 'GABRIELA ROCHA', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=HEkjg5ZZCMU', 26),
(46, 'Ancient of Days ', 'Ron Kenoly', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=UOe5GpqFJrE', 26),
(47, 'peso da tua gloria', 'nova geração', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=jLapl3ruDCI', 26),
(48, 'Names of god', 'Desconhecido', NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=T5-6gwssX0Y', 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `repertorio`
--

CREATE TABLE `repertorio` (
  `id` int(11) NOT NULL,
  `musica_id` int(11) NOT NULL,
  `culto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `repertorio`
--

INSERT INTO `repertorio` (`id`, `musica_id`, `culto_id`) VALUES
(64, 42, 33);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `culto`
--
ALTER TABLE `culto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_culto_grupo1_idx` (`grupo_id`);

--
-- Índices de tabela `escala`
--
ALTER TABLE `escala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_escala_instrumento1_idx` (`instrumento_id`),
  ADD KEY `fk_escala_integrante1_idx` (`integrante_id`),
  ADD KEY `fk_escala_culto1_idx` (`culto_id`);

--
-- Índices de tabela `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `instrumento`
--
ALTER TABLE `instrumento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_instrumento_grupo1_idx` (`grupo_id`);

--
-- Índices de tabela `integrante`
--
ALTER TABLE `integrante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_integrante_grupo1_idx` (`grupo_id`);

--
-- Índices de tabela `integrante_instrumento`
--
ALTER TABLE `integrante_instrumento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_integrante_instrumento_integrante1_idx` (`integrante_id`),
  ADD KEY `fk_integrante_instrumento_instrumento1_idx` (`instrumento_id`);

--
-- Índices de tabela `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_musica_grupo1_idx` (`grupo_id`);

--
-- Índices de tabela `repertorio`
--
ALTER TABLE `repertorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_repertorio_musica1_idx` (`musica_id`),
  ADD KEY `fk_repertorio_culto1_idx` (`culto_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `culto`
--
ALTER TABLE `culto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de tabela `escala`
--
ALTER TABLE `escala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de tabela `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de tabela `integrante`
--
ALTER TABLE `integrante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT de tabela `integrante_instrumento`
--
ALTER TABLE `integrante_instrumento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT de tabela `musica`
--
ALTER TABLE `musica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de tabela `repertorio`
--
ALTER TABLE `repertorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `culto`
--
ALTER TABLE `culto`
  ADD CONSTRAINT `fk_culto_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `escala`
--
ALTER TABLE `escala`
  ADD CONSTRAINT `fk_escala_culto1` FOREIGN KEY (`culto_id`) REFERENCES `culto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_escala_instrumento1` FOREIGN KEY (`instrumento_id`) REFERENCES `instrumento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_escala_integrante1` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `instrumento`
--
ALTER TABLE `instrumento`
  ADD CONSTRAINT `fk_instrumento_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `integrante`
--
ALTER TABLE `integrante`
  ADD CONSTRAINT `fk_integrante_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `integrante_instrumento`
--
ALTER TABLE `integrante_instrumento`
  ADD CONSTRAINT `fk_integrante_instrumento_instrumento1` FOREIGN KEY (`instrumento_id`) REFERENCES `instrumento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_integrante_instrumento_integrante1` FOREIGN KEY (`integrante_id`) REFERENCES `integrante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `fk_musica_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `repertorio`
--
ALTER TABLE `repertorio`
  ADD CONSTRAINT `fk_repertorio_culto1` FOREIGN KEY (`culto_id`) REFERENCES `culto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_repertorio_musica1` FOREIGN KEY (`musica_id`) REFERENCES `musica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
