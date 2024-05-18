CREATE DATABASE  IF NOT EXISTS `formulario-telecall` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `formulario-telecall`;
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
  `senha` varchar(8) NOT NULL,
  `gender` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Walmir Machado da silva junior','2000-11-18','valda azevedo da silva','(+55)1234123412','(+55)1234123412','rua teste','walmirjun7@gmail.com','12312312312','tester','12345678',''),(2,'Walmir Machado da silva junior','2000-11-18','valda azevedo da silva','(+55)1234123412','(+55)1234123412','rua teste','walmirjun77@gmail.com','12312312312','tester','12345678','M'),(3,'Walmir Machado da silva junior','2000-11-18','valda azevedo da silva','(+55)1234123412','(+55)1234123412','rua teste','walmirjun77@gmail.com','12312312312','tester','12345678','M'),(4,'Walmir Machado da silva junior','2000-11-18','valda azevedo da silva','(+55)1234123412','(+55)1234123412','rua teste','walmirjun77@gmail.com','12312312312','tester','12345678','M'),(5,'Walmir Machado da silva junior','2000-11-18','valda azevedo da silva','(+55)1234123412','(+55)1234123412','rua teste','walmirjun77@gmail.com','12312312312','tester','12345678','M'),(6,'Walmir Machado da silva junior','2000-11-18','valda azevedo da silva','(+55)1234123412','(+55)1234123412','rua teste','walmirjun77@gmail.com','12312312312','tester','12345678','M'),(7,'Walmir Machado da silva junior','2000-11-18','valda azevedo da silva','(+55)1234123412','(+55)1234123412','rua teste','walmirjun77@gmail.com','12312312312','tester','12345678','M'),(8,'Walmir Machado da silva junior','2000-11-18','valda azevedo da silva','(+55)1234123412','(+55)1234123412','rua teste','walmirjun7@gmail.com','12312312312','juntzu','12345678','M');
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

-- Dump completed on 2024-05-18 13:06:35