-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.14 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para bancoeou
CREATE DATABASE IF NOT EXISTS `bancoeou` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bancoeou`;


-- Copiando estrutura para tabela bancoeou.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bancoeou.users: 175 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nome`, `email`, `cpf`, `telefone`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
	(1, 'Espedito', 'e.jr42@hotmail.com', '42658493851', '111111', '-23.5632103', '-46.6542503', '2018-02-03 16:06:22', '2018-02-03 16:06:22'),
	(2, 'Joao', 'joao@hotmail.com', '11111111111', '222222', '-23.5350593', '-46.9109481', '2018-02-03 16:06:22', '2018-02-03 16:06:22'),
	(3, 'Maria', 'maria@hotmail.com', '22222222222', '333333', '-23.5240513', '-45.5209181', '2018-02-03 16:06:22', '2018-02-03 16:06:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
