/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE bd_bembarato
    DEFAULT CHARACTER SET = 'utf8mb4';
USE bd_bembarato;
DROP TABLE IF EXISTS tb_produtos;
CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_barras` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `validade` date NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `codigo_fiscal` varchar(50) NOT NULL,
  `data_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;