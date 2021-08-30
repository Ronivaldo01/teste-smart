
-- Host: localhost
-- Tempo de geração: 30/08/2021 às 23:28
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `DB_devedores`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `devedores`
--

CREATE TABLE `devedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cpf` bigint(22) NOT NULL,
  `dataNasc` date NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `valor` float NOT NULL,
  `dataVencimento` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `devedores`
--

INSERT INTO `devedores` (`id`, `nome`, `cpf`, `dataNasc`, `endereco`, `descricao`, `valor`, `dataVencimento`, `updated`) VALUES
(10, 'Harry Porter Mello', 30676064850, '1988-07-28', 'Rua pedro Rodrigues', 'webcam', 3.334, '2021-08-19', '2021-08-30');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `devedores`
--
ALTER TABLE `devedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `devedores`
--
ALTER TABLE `devedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
