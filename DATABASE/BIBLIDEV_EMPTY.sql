CREATE DATABASE  IF NOT EXISTS `biblidev` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `biblidev`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: biblidev
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `categorias_livros`
--

DROP TABLE IF EXISTS `categorias_livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias_livros` (
  `idcategoria` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(40) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `delrg` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_livros`
--

LOCK TABLES `categorias_livros` WRITE;
/*!40000 ALTER TABLE `categorias_livros` DISABLE KEYS */;
INSERT INTO `categorias_livros` VALUES (1,'Ação',1,0),(2,'Pedagogia',1,0),(3,'Aventura',1,0),(4,'Biografia',1,0),(5,'Poesia',1,0),(6,'História',1,0),(7,'Contos Brasileiros',1,0),(8,'Contos',1,0),(9,'Literatura Brasileira',1,0),(10,'Contos Russos',1,0),(11,'Literatura Infanto Juvenil',1,0),(12,'Educacional',1,0),(13,'Crônicas Brasileiras',1,0),(14,'Medicina',1,0),(15,'Direitos Humanos',1,0),(16,'Ecologia',1,0),(17,'Ficção',1,0),(18,'Ficção Policial',1,0),(19,'Literatura Portuguesa',1,0),(20,'Literatura Inglesa',1,0),(21,'Literatura Juvenil',1,0),(22,'Paradidatico',1,0),(23,'Matemática',1,0),(24,'Fabula Francesa',1,0),(25,'Romance',1,0),(26,'Romance Brasileiro',1,0),(27,'Romance Angolano',1,0),(28,'Português',1,0),(29,'Física',1,0),(30,'Teatro',1,0),(31,'Psicologia',1,0),(32,'Romance Ingles',1,0),(33,'Romance Chileno',1,0),(34,'Romance Israelence',1,0),(35,'Romance Italiano',1,0),(36,'Saúde',1,0),(37,'Sociologia',1,0),(38,'Geografia',1,0),(39,'Artes',1,0),(40,'Literatura Portuguesa',1,0),(41,'Inglês',1,0),(42,'Romance Português',1,0),(43,'Arquitetura e Urbanismo',1,0),(44,'Cidadania',1,0),(45,'Educação Ambiental',1,0),(46,'Botânica',1,0),(47,'Literatura de Cordel',1,0),(48,'Crônica Brasileira',1,0),(49,'Romance Francês',1,0),(50,'Quimica',1,0),(51,'História em Quadrinhos',1,0),(52,'Ciências',1,0),(53,'Teatro',1,0),(54,'Biologia',1,0),(55,'Educação Sexual',1,0),(56,'Agricultura',1,0),(57,'Cães',1,0),(58,'Comunicação',1,0),(59,'Conto de Fadas',1,0),(60,'Ciências Sociais',1,0),(61,'Entendendo o Brasil',1,0),(62,'Alimentação',1,0),(63,'Cinema',1,0),(64,'Filosofia',1,0),(65,'Esportes',1,0),(66,'Educação Física',1,0),(67,'Folclore',1,0),(68,'Espanhol',1,0),(69,'Economia',1,0),(70,'Música',1,0),(71,'Terror',1,0),(72,'Televisão',1,0),(73,'Biodiversidade',1,0),(74,'Egito',1,0),(75,'Religião',1,0),(76,'Romance Argentino',1,0),(77,'Tecnologia',1,0),(78,'Conhecimentos Gerais',1,0),(79,'Ações Afirmativas',1,0),(80,'Jornalismo',1,0),(81,'Elétrica',1,0),(82,'Drama',1,0);
/*!40000 ALTER TABLE `categorias_livros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimos`
--

DROP TABLE IF EXISTS `emprestimos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimos` (
  `idemprestimo` int NOT NULL AUTO_INCREMENT,
  `iduser` int DEFAULT NULL,
  `data_reserva` date DEFAULT NULL,
  `hora_reserva` time DEFAULT NULL,
  `data_locacao` date DEFAULT NULL,
  `hora_locacao` time DEFAULT NULL,
  `data_devolucao` date DEFAULT NULL,
  `hora_devolucao` time DEFAULT NULL,
  `delrg` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idemprestimo`),
  KEY `iduser` (`iduser`),
  CONSTRAINT `emprestimos_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimos`
--

LOCK TABLES `emprestimos` WRITE;
/*!40000 ALTER TABLE `emprestimos` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprestimos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimos_livros`
--

DROP TABLE IF EXISTS `emprestimos_livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimos_livros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idemprestimo` int NOT NULL,
  `iduser` int DEFAULT NULL,
  `idlivro` int NOT NULL,
  `comentario` text,
  `delrg` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `iduser` (`iduser`),
  KEY `idemprestimo` (`idemprestimo`),
  KEY `idlivro` (`idlivro`),
  CONSTRAINT `emprestimos_livros_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`iduser`),
  CONSTRAINT `emprestimos_livros_ibfk_3` FOREIGN KEY (`idemprestimo`) REFERENCES `emprestimos` (`idemprestimo`),
  CONSTRAINT `emprestimos_livros_ibfk_4` FOREIGN KEY (`idlivro`) REFERENCES `livros` (`idlivro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimos_livros`
--

LOCK TABLES `emprestimos_livros` WRITE;
/*!40000 ALTER TABLE `emprestimos_livros` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprestimos_livros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livros`
--

DROP TABLE IF EXISTS `livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livros` (
  `idlivro` int NOT NULL AUTO_INCREMENT,
  `isbn` varchar(20) NOT NULL,
  `titulo` varchar(120) DEFAULT NULL,
  `autores` varchar(120) DEFAULT NULL,
  `ano_publicacao` year DEFAULT NULL,
  `edicao` int DEFAULT NULL,
  `editora` varchar(120) DEFAULT NULL,
  `paginas` smallint DEFAULT NULL,
  `idcategoria` int NOT NULL,
  `quantidade` tinyint DEFAULT NULL,
  `disponivel` tinyint(1) DEFAULT '1',
  `ativo` tinyint(1) DEFAULT '1',
  `delrg` tinyint(1) DEFAULT '0',
  `resumo` longtext,
  PRIMARY KEY (`isbn`),
  UNIQUE KEY `idlivro` (`idlivro`),
  KEY `idcategoria` (`idcategoria`),
  CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categorias_livros` (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livros`
--

LOCK TABLES `livros` WRITE;
/*!40000 ALTER TABLE `livros` DISABLE KEYS */;
/*!40000 ALTER TABLE `livros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `idlogin` int NOT NULL AUTO_INCREMENT,
  `iduser` int DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `idtipo_usuario` int NOT NULL,
  `delrg` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idlogin`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `iduser` (`iduser`),
  KEY `tipo_usuario` (`idtipo_usuario`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`iduser`),
  CONSTRAINT `login_ibfk_2` FOREIGN KEY (`idtipo_usuario`) REFERENCES `tipos_usuario` (`idtipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,1,'admin','21232f297a57a5a743894a0e4a801fc3',1,0);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_usuario`
--

DROP TABLE IF EXISTS `tipos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_usuario` (
  `idtipo_usuario` int NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(30) DEFAULT NULL,
  `administrar_usuarios` tinyint(1) DEFAULT '0',
  `administrar_livros` tinyint(1) DEFAULT '0',
  `administrar_emprestimos` tinyint(1) DEFAULT '0',
  `limite_livros_emprestimo` int NOT NULL DEFAULT '0',
  `limite_dias_emprestimo` int NOT NULL DEFAULT '15',
  `ativo` tinyint(1) DEFAULT '1',
  `delrg` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idtipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_usuario`
--

LOCK TABLES `tipos_usuario` WRITE;
/*!40000 ALTER TABLE `tipos_usuario` DISABLE KEYS */;
INSERT INTO `tipos_usuario` VALUES (1,'Administrador',1,1,1,999,30,1,0);
/*!40000 ALTER TABLE `tipos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `sobrenome` varchar(70) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `rua` varchar(70) DEFAULT NULL,
  `num` varchar(10) DEFAULT NULL,
  `complemento` varchar(10) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `estado` varchar(2) DEFAULT 'SP',
  `cidade` varchar(50) DEFAULT 'São Paulo',
  `ativo` tinyint(1) DEFAULT '1',
  `delrg` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cpf`),
  UNIQUE KEY `iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'12345678910','Maluhy','Biblidev','1900-01-01','M','maluly.biblidev@gmail.com','05752590','Estrada dos Mirandas','40','','Jardim Maria Duarte','SP','São Paulo',1,0);
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

-- Dump completed on 2021-11-21  1:27:17
