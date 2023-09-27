-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2023 às 19:06
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tp1voiture`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) UNSIGNED NOT NULL,
  `marque` varchar(100) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `annee` smallint(11) UNSIGNED DEFAULT NULL,
  `couleur` varchar(50) NOT NULL,
  `prix` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `voiture`
--

INSERT INTO `voiture` (`id`, `marque`, `modele`, `annee`, `couleur`, `prix`) VALUES
(1, 'Toyota', 'Corolla', 2022, 'gris', '25000'),
(2, 'Honda', 'Civic', 2021, 'noir', '20000'),
(3, 'Ford', 'Fusion', 2020, 'blanc', '28000'),
(4, 'Toyota', 'RAV4', 2023, 'noir', '35000'),
(5, 'Hyundai', 'Elantra', 2018, 'rouge', '19000');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
