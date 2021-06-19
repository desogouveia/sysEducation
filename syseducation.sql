-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jun-2021 às 04:40
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `syseducation`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `ra` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_matricula` date NOT NULL,
  `cod_turma` int(5) DEFAULT NULL,
  `cod_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`ra`, `nome`, `cpf`, `rg`, `telefone`, `email`, `data_matricula`, `cod_turma`, `cod_login`) VALUES
(1, 'Aluno Teste', '1234567891', '1234567891', '1234567891', '123456789@123456', '2021-06-19', 1, 1),
(420201266, 'Aluno Teste 2', '1234567891', '1234567891', '1234567891', '123456789@123456', '2021-06-19', 1, 4),
(420201267, 'Aluno Teste Final', '213213', '12321321321', '321321321', '123456789@123456', '2021-06-19', 3, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `cod_curso` int(10) NOT NULL,
  `desc_curso` varchar(50) NOT NULL,
  `long_curso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `desc_curso`, `long_curso`) VALUES
(1, 'Análise e Desenvolvimento de Sistemas', 'Teste ADS'),
(2, 'Administração', 'Teste de Cadastro'),
(3, 'Publicidade e Propaganda', 'Teste de Cadastro'),
(4, 'Segurança da Informação', 'Teste de Edição');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `userpw` varchar(30) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `user`, `userpw`, `tipo`) VALUES
(1, 'aluno', 'aluno', 3),
(2, 'prof', 'prof', 2),
(3, 'adm', 'adm', 1),
(4, 'aluno2', 'teste', 3),
(5, 'aluno3', 'pw', 3),
(6, 'prof2', 'prof', 2),
(7, 'prof3', 'teste', 2),
(8, 'prof4', 'teste', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissionais`
--

CREATE TABLE `profissionais` (
  `registro` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_admissao` date NOT NULL,
  `formacao` varchar(30) NOT NULL,
  `cod_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profissionais`
--

INSERT INTO `profissionais` (`registro`, `nome`, `cpf`, `rg`, `telefone`, `email`, `data_admissao`, `formacao`, `cod_login`) VALUES
(1, 'Professor Teste 1', '46513029805', '536384083', '11942031255', 'andregouveia@uni9.edu.br', '2020-08-01', 'Tecnologia', 2),
(2, 'Profissional Teste', '123456789', '123456789', '123456789', 'profissional@prof.com.br', '2021-06-18', 'Medicina', 6),
(3, 'Profissional Teste 2', '123456789', '123456789', '123456789', 'profissional@prof.com.br', '2021-06-18', 'Medicina', 7),
(7, 'Jorge', '132456789', '12345798', '12345798', 'profissional@prof.com.br', '2021-06-19', 'Jornalismo', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `cod_turma` int(10) NOT NULL,
  `desc_turma` varchar(50) NOT NULL,
  `sem_turma` int(2) NOT NULL,
  `data_ini` date NOT NULL,
  `data_fim` date NOT NULL,
  `cod_curso` int(10) NOT NULL,
  `cod_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod_turma`, `desc_turma`, `sem_turma`, `data_ini`, `data_fim`, `cod_curso`, `cod_prof`) VALUES
(1, 'Teste', 1, '2020-08-01', '2022-12-01', 1, 1),
(2, 'Turma Teste Cadastro', 1, '2021-06-19', '2021-11-30', 3, 1),
(3, 'Turma Teste Aluno', 1, '2021-06-19', '2021-11-30', 2, 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`ra`),
  ADD KEY `FK_TURMA` (`cod_turma`),
  ADD KEY `FK_ALOGIN` (`cod_login`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`registro`),
  ADD KEY `FK_LOGINPROF` (`cod_login`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod_turma`),
  ADD KEY `FK_CURSO` (`cod_curso`),
  ADD KEY `FK_PROF` (`cod_prof`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `ra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420201268;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cod_curso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `cod_turma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_ALOGIN` FOREIGN KEY (`cod_login`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `FK_TURMA` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`cod_turma`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD CONSTRAINT `FK_LOGINPROF` FOREIGN KEY (`cod_login`) REFERENCES `login` (`id`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `FK_CURSO` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`),
  ADD CONSTRAINT `FK_PROF` FOREIGN KEY (`cod_prof`) REFERENCES `profissionais` (`registro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
