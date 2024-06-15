-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: formulario-telecall
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `data_nasc` date NOT NULL,
  `mother_name` varchar(45) NOT NULL,
  `telefone_fixo` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `username` varchar(6) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `tipo_perfil` enum('comum','master') NOT NULL DEFAULT 'comum',
  `cep` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'ADMIN ADMIN ADMIN','2001-01-01','ADMIN ADMIN ADMIN','(+55)1234123412','(+55)1234123412','rua teste','asdsadsad@gmail.com','11111111111','WEBMKM','$2y$10$6nV4CQub3i1WNazh9yJNLedcx1INbz04NJ4.mUTdCiU9LvREFbr.O','P','master','12312-321'),(16,'asdasdasdasdasdsa','2000-01-01','asdasdasdasdasdsa','(+55)1234123412','(+55)1234123412','rua teste','dasdas@gmail.com','111.111.111','testdn','$2y$10$HaNYNGvej/O6BsAkkzLvDecmCQ1SdUkLJ9MdNqgFTQX7VUv7Re.RW','M','comum','25030-060'),(22,'teste data nasc com mask','2000-11-18','asdasdasdasdasdasda','(+55)1234123412','(+55)1234123412','rua teste','mascaradata@gmail.com','131.312.312','mascdt','$2y$10$Iw5bRhXgoISLCV8YjgkXuOPbzGDxqPf/iREwRDu1h1D7QwTyye5Z.','P','master','12312-321'),(24,'pericles melhor eu ir','2000-11-18','pericles final de tarde','(+55)1234123412','(+55)1234123412','rua da sofrencia','periclao@gmail.com','123.123.123','pericl','$2y$10$qzFQf1jIJd8j08aP0iJRY.9jAiPZVjhjFTKuSZYF2gWqUVeWB/.b6','P','comum','25550-555'),(25,'chamber of reflection','2024-06-14','a musica mais triste do ano luiz lins','(+55)1234123412','(+55)1234123412','Centro, Xique-Xique, BA','tristaomttriste@gmail.com','191.191.406','triste','$2y$10$ZUWvHpL1NHTzbCs6yF5DMe2A1leQK5bvaC7RsaiUYoL2XNrGGEO7.','P','comum','47403-086'),(26,'soweto farol das estrelas','2001-01-01','é tarde demais raça negra','(+55)1234123412','(+55)1234123412','Vila Leopoldina, Duque de Caxias, RJ','walmirjun77@gmail.com','123.123.123','soweto','$2y$10$Ibkny.eiulw1wsYOgXviX.yvFrBAgo5smwHXs7e70Ff4cxymmBL0i','M','comum','25030-060');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-15 19:45:43
