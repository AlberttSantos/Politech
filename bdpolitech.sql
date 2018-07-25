-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Nov-2016 às 19:02
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdpolitech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `CDCARGO` int(10) UNSIGNED NOT NULL,
  `NMCARGO` varchar(70) NOT NULL,
  `DESCRICAO` text,
  `STATUS` enum('A','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`CDCARGO`, `NMCARGO`, `DESCRICAO`, `STATUS`) VALUES
(1, 'Assessor de Desenvolvimento', 'Trabalha demais', 'A'),
(2, 'Cargo teste', 'Cargo criado para teste', 'A'),
(3, 'Projetista', 'Faz projetos', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `CDCATEGORIA` int(10) UNSIGNED NOT NULL,
  `NMCATEGORIA` varchar(30) NOT NULL,
  `DESCRICAO` text,
  `STATUS` enum('A','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CDCLIENTE` int(10) UNSIGNED NOT NULL,
  `NMCLIENTE` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `NMPROFISSAO` varchar(100) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL,
  `OBSERVACAO` varchar(200) NOT NULL,
  `SEXO` enum('M','F') NOT NULL,
  `TELEFONE` varchar(14) DEFAULT NULL,
  `CELULAR` varchar(15) DEFAULT NULL,
  `CEP` varchar(10) NOT NULL,
  `LOGRADOURO` text NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMP` text NOT NULL,
  `BAIRRO` varchar(40) NOT NULL,
  `CIDADE` varchar(40) NOT NULL,
  `ESTADO` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') NOT NULL,
  `STATUS` enum('A','D') NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CDCLIENTE`, `NMCLIENTE`, `CPF`, `NMPROFISSAO`, `DESCRICAO`, `OBSERVACAO`, `SEXO`, `TELEFONE`, `CELULAR`, `CEP`, `LOGRADOURO`, `NUMERO`, `COMP`, `BAIRRO`, `CIDADE`, `ESTADO`, `STATUS`, `EMAIL`) VALUES
(3, 'Albertt Aurélio', '118.274.906-24', 'Assessor de Desenvolvimento', '', '', 'M', '(31) 9730-5845', '(31) 97305-8451', '35.170-370', 'Rua Vinte e Quatro', 12312, '', 'Belvedere', 'Coronel Fabriciano', 'MG', 'A', 'alberttaurelio@hotmail.com'),
(4, 'Eduardo de Castro Alvarenga', '118.274.906-24', 'Diretor de Projetos', '', 'nenhuma', 'M', '(31) 9730-5845', '(31) 97305-8453', '35.170-053', 'Rua Cônego Domingos', 1231231, '', 'Todos os Santos', 'Coronel Fabriciano', 'MG', 'D', 'eduardo@politech.com'),
(5, 'Albertt', '118.274.906-24', 'Assessor de Desenvolvimento', '', '', 'M', '(31) 9730-5841', '(31) 97305-8411', '35.170-370', 'Rua Vinte e Quatro', 211, '', 'Belvedere', 'Coronel Fabriciano', 'MG', 'A', 'alberttaurelio@hotmail.com'),
(6, 'Albertt Aurélio', '118.274.906-24', 'Assessor de Desenvolvimento', '', '', 'M', '(31) 9730-5845', '(31) 97305-8451', '35170-370', 'Rua Vinte e Quatro', 25, '', 'Belvedere', 'Coronel Fabriciano', 'MG', 'A', 'alberttaurelio@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `CDFORNECEDOR` int(10) UNSIGNED NOT NULL,
  `NMEMPRESA` varchar(100) NOT NULL,
  `NMCONTATO` varchar(100) NOT NULL,
  `CARGO` varchar(100) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `LOGRADOURO` text NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMP` text NOT NULL,
  `BAIRRO` varchar(40) NOT NULL,
  `CIDADE` varchar(40) NOT NULL,
  `ESTADO` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') NOT NULL,
  `TELEFONE` varchar(14) DEFAULT NULL,
  `CELULAR` varchar(15) DEFAULT NULL,
  `STATUS` enum('A','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `CDFUNCIONARIO` int(10) UNSIGNED NOT NULL,
  `NMFUNCIONARIO` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `DTNASC` varchar(10) NOT NULL,
  `SEXO` enum('M','F') NOT NULL,
  `DTADM` varchar(10) NOT NULL,
  `DTDESLIGAMENTO` varchar(10) NOT NULL,
  `PERIODO` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `CURSO` enum('Arquitetura e Urbanismo','Engenharia Ambiental e Sanitária','Engenharia Civil','Engenharia Elétrica','Engenharia Mecânica','Engenharia Metalúrgica','Engenharia de Produção','Engenharia Química','Sistemas de Informação','Tecnologia de Soldagem') NOT NULL,
  `CDCARGO` int(10) UNSIGNED NOT NULL,
  `TELEFONE` varchar(14) DEFAULT NULL,
  `CELULAR` varchar(15) DEFAULT NULL,
  `CEP` varchar(10) NOT NULL,
  `LOGRADOURO` text NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMP` text NOT NULL,
  `BAIRRO` varchar(40) NOT NULL,
  `CIDADE` varchar(40) NOT NULL,
  `ESTADO` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') NOT NULL,
  `STATUS` enum('A','D') NOT NULL,
  `FACEBOOK` varchar(100) NOT NULL,
  `LATTES` varchar(100) NOT NULL,
  `LINKEDIN` varchar(100) NOT NULL,
  `OBSERVACAO` varchar(200) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`CDFUNCIONARIO`, `NMFUNCIONARIO`, `EMAIL`, `CPF`, `DTNASC`, `SEXO`, `DTADM`, `DTDESLIGAMENTO`, `PERIODO`, `CURSO`, `CDCARGO`, `TELEFONE`, `CELULAR`, `CEP`, `LOGRADOURO`, `NUMERO`, `COMP`, `BAIRRO`, `CIDADE`, `ESTADO`, `STATUS`, `FACEBOOK`, `LATTES`, `LINKEDIN`, `OBSERVACAO`, `DESCRICAO`) VALUES
(1, 'Albertt Aurélio', 'alberttaurelio@hotmail.com', '118.274.906-24', '03/01/1995', 'M', '03/06/2016', '', '8', 'Sistemas de Informação', 1, '(31) 9730-5845', '(31) 97305-8451', '35.170-370', 'Rua Vinte e Quatro', 211, '', 'Belvedere', 'Coronel Fabriciano', 'MG', 'A', 'face@face.com', 'lattes@lattes.com', 'linkedin@linkedin.com', 'teste obs', 'site'),
(2, 'André Felipe', 'adeildo@gmail.com', '118.274.906-24', '03/01/1995', 'M', '03/01/2016', '', '3', 'Tecnologia de Soldagem', 3, '(31) 9730-5845', '(12) 31231-2312', '35.170-141', 'Rua Belo Horizonte', 55, '', 'Olaria', 'Coronel Fabriciano', 'MG', 'A', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoaj`
--

CREATE TABLE `pessoaj` (
  `CDPESSOAJ` int(10) UNSIGNED NOT NULL,
  `NMEMPRESA` varchar(100) NOT NULL,
  `CNPJ` varchar(18) NOT NULL,
  `NMREPRESENTANTE` varchar(100) NOT NULL,
  `SEGMENTO` varchar(100) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL,
  `OBSERVACAO` varchar(200) NOT NULL,
  `TELEFONE` varchar(14) DEFAULT NULL,
  `CELULAR` varchar(15) DEFAULT NULL,
  `CEP` varchar(10) NOT NULL,
  `LOGRADOURO` text NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMP` text NOT NULL,
  `BAIRRO` varchar(40) NOT NULL,
  `CIDADE` varchar(40) NOT NULL,
  `ESTADO` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') NOT NULL,
  `STATUS` enum('A','D') NOT NULL,
  `EMAILE` varchar(100) NOT NULL,
  `EMAILR` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoaj`
--

INSERT INTO `pessoaj` (`CDPESSOAJ`, `NMEMPRESA`, `CNPJ`, `NMREPRESENTANTE`, `SEGMENTO`, `DESCRICAO`, `OBSERVACAO`, `TELEFONE`, `CELULAR`, `CEP`, `LOGRADOURO`, `NUMERO`, `COMP`, `BAIRRO`, `CIDADE`, `ESTADO`, `STATUS`, `EMAILE`, `EMAILR`, `CPF`) VALUES
(1, 'Politech Projetos e Consultoria', '27.151.871/0001-62', 'Albertt Aurélio', 'Engenharia', '', '', '(31) 9730-5845', '(31) 97305-8451', '35.170-370', 'Rua Vinte e Quatro', 23, '', 'Belvedere', 'Coronel Fabriciano', 'MG', 'A', 'alberttaurelio@hotmail.com', 'alberttaurelio@hotmail.com', '118.274.906-24'),
(2, 'Thais Grossi LTDA', '27.151.871/0001-62', 'Thais', 'Biologia', '', '', '(31) 1451-4131', '(15) 31313-5135', '35.171-056', 'Rua Cirineu Teixeira', 293, '', 'Alipinho', 'Coronel Fabriciano', 'MG', 'D', 'thais@hotmail.com', 'thais@hotmail.com', '118.274.906-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `CDPROF` int(10) UNSIGNED NOT NULL,
  `NMPROF` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `DTNASC` varchar(10) NOT NULL,
  `SEXO` enum('M','F') NOT NULL,
  `FORMACAD` varchar(400) NOT NULL,
  `DISCIPLINAS` varchar(400) NOT NULL,
  `FORMORIENT` varchar(400) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `LOGRADOURO` text NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMP` text NOT NULL,
  `BAIRRO` varchar(40) NOT NULL,
  `CIDADE` varchar(40) NOT NULL,
  `ESTADO` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') NOT NULL,
  `TELEFONE` varchar(14) DEFAULT NULL,
  `CELULAR` varchar(15) DEFAULT NULL,
  `FACEBOOK` varchar(100) NOT NULL,
  `LATTES` varchar(100) NOT NULL,
  `LINKEDIN` varchar(100) NOT NULL,
  `OBSERVACAO` varchar(200) NOT NULL,
  `STATUS` enum('A','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`CDPROF`, `NMPROF`, `EMAIL`, `DTNASC`, `SEXO`, `FORMACAD`, `DISCIPLINAS`, `FORMORIENT`, `DESCRICAO`, `CEP`, `LOGRADOURO`, `NUMERO`, `COMP`, `BAIRRO`, `CIDADE`, `ESTADO`, `TELEFONE`, `CELULAR`, `FACEBOOK`, `LATTES`, `LINKEDIN`, `OBSERVACAO`, `STATUS`) VALUES
(8, 'Minerva McGonagall', 'minerva@hogwarts.com', '04/10/1935', 'F', '', '', '', '', '35.164-374', 'Rua Umuarama', 44, 'A', 'Caravelas', 'Ipatinga', 'MG', '(00) 3822-2222', '(00) 88888-8888', '', '', '', '', 'D'),
(18, 'Remus J. Lupin', 'remus@hogwarts.com', '10/03/1960', 'M', '', '', '', '', '35.160-022', 'Rua Sabará', 10, 'B', 'Centro', 'Ipatinga', 'MG', '(31) 3821-2121', '(44) 44444-4444', '', '', '', '', 'D'),
(19, 'Albus P. Dumbledore', 'albus@hogwarts.com', '01/01/1881', 'M', 'Formação Acadêmica', 'Disciplinas a Lecionar', 'Forma de Orientar', 'Politech', '35.160-021', 'Rua Paracatu', 123, 'A', 'Centro', 'Ipatinga', 'MG', '(33) 3833-3333', '(33) 77777-7777', 'wwww.facebook.com', 'wwww.latters.com', 'wwww.likedin.com', 'Observações', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_curso`
--

CREATE TABLE `professor_curso` (
  `CdCursoProf` int(11) NOT NULL,
  `CdProf` int(11) NOT NULL,
  `NmCurso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor_curso`
--

INSERT INTO `professor_curso` (`CdCursoProf`, `CdProf`, `NmCurso`) VALUES
(16, 8, 'Engenharia Mecânica'),
(17, 8, 'Engenharia Metalúrgica'),
(18, 18, 'Arquitetura e Urbanismo'),
(19, 18, 'Engenharia Civil'),
(20, 18, 'Engenharia Mecânica'),
(0, 19, 'Arquitetura e Urbanismo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `CDPROJETO` int(10) UNSIGNED NOT NULL,
  `NMPROJETO` varchar(100) NOT NULL,
  `DTENTRADA` varchar(10) NOT NULL,
  `DTINICIOPLAN` varchar(10) NOT NULL,
  `DTINICIOREAL` varchar(10) NOT NULL,
  `DTFINAL` varchar(10) NOT NULL,
  `PRECOR` float NOT NULL,
  `PRECOD` float NOT NULL,
  `CDFUNCGERENTE` int(10) UNSIGNED NOT NULL,
  `CDPROFESSOR` int(10) UNSIGNED NOT NULL,
  `AREAPROJ` text NOT NULL,
  `CDFUNCPARTICIPANTE` text NOT NULL,
  `CDFUNCRESPONSAVEL` int(10) UNSIGNED NOT NULL,
  `CDFUNCCOMERCIAL` int(10) UNSIGNED NOT NULL,
  `ATRASO` enum('Sim','Não') NOT NULL,
  `ATRASOSIM` int(11) NOT NULL,
  `TIPOCLIENTEPROJ` text NOT NULL,
  `CDCLIENTEPROJ` int(10) UNSIGNED NOT NULL,
  `DTASSINATURA` varchar(10) NOT NULL,
  `NUMVISITASTEC` int(11) NOT NULL,
  `CONTRAPROPOSTA` enum('Sim','Não') NOT NULL,
  `FORMAPAG` enum('Dinheiro','Transferencia Bancaria','Crédito','Débito','Boleto') NOT NULL,
  `STATUSPROJ` enum('Não Iniciado','Em andamento','Concluido') NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `LOGRADOURO` text NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `COMP` text NOT NULL,
  `BAIRRO` varchar(40) NOT NULL,
  `CIDADE` varchar(40) NOT NULL,
  `ESTADO` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') NOT NULL,
  `STATUS` enum('A','D') NOT NULL,
  `OBSERVACAO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`CDPROJETO`, `NMPROJETO`, `DTENTRADA`, `DTINICIOPLAN`, `DTINICIOREAL`, `DTFINAL`, `PRECOR`, `PRECOD`, `CDFUNCGERENTE`, `CDPROFESSOR`, `AREAPROJ`, `CDFUNCPARTICIPANTE`, `CDFUNCRESPONSAVEL`, `CDFUNCCOMERCIAL`, `ATRASO`, `ATRASOSIM`, `TIPOCLIENTEPROJ`, `CDCLIENTEPROJ`, `DTASSINATURA`, `NUMVISITASTEC`, `CONTRAPROPOSTA`, `FORMAPAG`, `STATUSPROJ`, `CEP`, `LOGRADOURO`, `NUMERO`, `COMP`, `BAIRRO`, `CIDADE`, `ESTADO`, `STATUS`, `OBSERVACAO`) VALUES
(30, 'Teste', '03/01/1995', '03/01/1995', '03/01/1995', '03/01/1995', 100, 90, 1, 0, '', '', 1, 1, 'Não', 0, 'pessoaJuridica', 1, '03/01/1995', 80, 'Não', 'Dinheiro', 'Em andamento', '35.170-141', 'Rua Belo Horizonte', 2, '', 'Olaria', 'Coronel Fabriciano', 'MG', 'A', 'nada'),
(31, 'Projeto de tratamento de água', '03/01/1995', '03/01/1995', '03/01/1995', '03/01/1995', 100, 90, 1, 0, '', '', 1, 1, 'Não', 0, 'pessoaFisica', 3, '03/01/1995', 2, 'Não', 'Dinheiro', 'Não Iniciado', '35.170-370', 'Rua Vinte e Quatro', 12, '', 'Belvedere', 'Coronel Fabriciano', 'MG', 'A', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetocurso`
--

CREATE TABLE `projetocurso` (
  `CDCURSOPROJ` int(11) NOT NULL,
  `CDPROJETO` int(11) NOT NULL,
  `NMCURSO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projetocurso`
--

INSERT INTO `projetocurso` (`CDCURSOPROJ`, `CDPROJETO`, `NMCURSO`) VALUES
(0, 28, 'Arquitetura e Urbanismo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CDUSUARIO` int(10) UNSIGNED NOT NULL,
  `NMUSUARIO` varchar(100) NOT NULL,
  `SENHA` varchar(40) NOT NULL,
  `NIVEL` enum('Administrador','Diretor','Membro') NOT NULL,
  `STATUS` enum('A','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CDUSUARIO`, `NMUSUARIO`, `SENHA`, `NIVEL`, `STATUS`) VALUES
(1, 'alberttaurelio@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Administrador', 'A'),
(2, 'teste@teste.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Membro', 'A'),
(3, 'fernanda@politechjr.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Diretor', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`CDCARGO`),
  ADD UNIQUE KEY `CDCARGO` (`CDCARGO`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CDCATEGORIA`),
  ADD UNIQUE KEY `CDCATEGORIA` (`CDCATEGORIA`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CDCLIENTE`),
  ADD UNIQUE KEY `cliente` (`CDCLIENTE`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`CDFORNECEDOR`),
  ADD UNIQUE KEY `fornecedor` (`CDFORNECEDOR`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`CDFUNCIONARIO`),
  ADD UNIQUE KEY `funcionario` (`CDFUNCIONARIO`),
  ADD KEY `FK_FUNCIONARIO_CDCARGO` (`CDCARGO`);

--
-- Indexes for table `pessoaj`
--
ALTER TABLE `pessoaj`
  ADD PRIMARY KEY (`CDPESSOAJ`),
  ADD UNIQUE KEY `cliente` (`CDPESSOAJ`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`CDPROJETO`),
  ADD UNIQUE KEY `cliente` (`CDPROJETO`);

--
-- Indexes for table `projetocurso`
--
ALTER TABLE `projetocurso`
  ADD PRIMARY KEY (`CDCURSOPROJ`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CDUSUARIO`),
  ADD KEY `NIVEL` (`NIVEL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `CDCARGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CDCATEGORIA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CDCLIENTE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `CDFORNECEDOR` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `CDFUNCIONARIO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pessoaj`
--
ALTER TABLE `pessoaj`
  MODIFY `CDPESSOAJ` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `CDPROJETO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CDUSUARIO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `FK_FUNCIONARIO_CDCARGO` FOREIGN KEY (`CDCARGO`) REFERENCES `cargo` (`CDCARGO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
