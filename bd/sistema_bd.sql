-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema
-- ------------------------------------------------------
-- Server version	5.7.14-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bairros`
--

DROP TABLE IF EXISTS `bairros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bairros` (
  `idbairros` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bairro` varchar(90) NOT NULL,
  `id_cidades` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbairros`),
  KEY `fk_bairros_cidades1_idx` (`id_cidades`) USING BTREE,
  CONSTRAINT `fk_bairros_cidades` FOREIGN KEY (`id_cidades`) REFERENCES `cidades` (`idcidades`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairros`
--

LOCK TABLES `bairros` WRITE;
/*!40000 ALTER TABLE `bairros` DISABLE KEYS */;
/*!40000 ALTER TABLE `bairros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Camisas'),(2,'Calças'),(3,'Sapatos'),(4,'CD\'s');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidades`
--

DROP TABLE IF EXISTS `cidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidades` (
  `idcidades` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cidade` varchar(90) NOT NULL,
  `id_ufs` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`idcidades`),
  KEY `fk_cidades_ufs1_idx` (`id_ufs`) USING BTREE,
  CONSTRAINT `fk_cidades_ufs` FOREIGN KEY (`id_ufs`) REFERENCES `ufs` (`idufs`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidades`
--

LOCK TABLES `cidades` WRITE;
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enderecos` (
  `idenderecos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `complemento` varchar(90) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cep` int(8) unsigned NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_bairros` int(10) unsigned NOT NULL,
  `id_logradouros` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idenderecos`),
  KEY `fk_enderecos_usuarios1_idx` (`id_usuarios`) USING BTREE,
  KEY `fk_enderecos_bairros1_idx` (`id_bairros`) USING BTREE,
  KEY `fk_enderecos_logradouros1_idx` (`id_logradouros`) USING BTREE,
  CONSTRAINT `fk_enderecos_bairros` FOREIGN KEY (`id_bairros`) REFERENCES `bairros` (`idbairros`) ON UPDATE CASCADE,
  CONSTRAINT `fk_enderecos_logradouros` FOREIGN KEY (`id_logradouros`) REFERENCES `logradouros` (`idlogradouros`) ON UPDATE CASCADE,
  CONSTRAINT `fk_enderecos_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`idusuarios`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logradouros`
--

DROP TABLE IF EXISTS `logradouros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logradouros` (
  `idlogradouros` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(90) NOT NULL,
  `id_tp_logradouros` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idlogradouros`),
  KEY `fk_logradouros_tp_logradouros1_idx` (`id_tp_logradouros`) USING BTREE,
  CONSTRAINT `fk_logradouros_tp_logradouros` FOREIGN KEY (`id_tp_logradouros`) REFERENCES `tp_logradouros` (`idtp_logradouros`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logradouros`
--

LOCK TABLES `logradouros` WRITE;
/*!40000 ALTER TABLE `logradouros` DISABLE KEYS */;
/*!40000 ALTER TABLE `logradouros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orgao_expedidores`
--

DROP TABLE IF EXISTS `orgao_expedidores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orgao_expedidores` (
  `idorgao_expedidores` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `orgao_expedidor` varchar(130) NOT NULL,
  PRIMARY KEY (`idorgao_expedidores`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgao_expedidores`
--

LOCK TABLES `orgao_expedidores` WRITE;
/*!40000 ALTER TABLE `orgao_expedidores` DISABLE KEYS */;
INSERT INTO `orgao_expedidores` VALUES (1,'ABNC – Academia Brasileira de Neurocirurgia'),(2,'CBM - Corpo de Bombeiros Militar'),(3,'CGPI – Coordenação-Geral de Privilégios e Imunidades'),(4,'CGPI/DUREX/DPF – Coordenação Geral de Polícia de Imigração da Polícia Federal'),(5,'CGPMAF – Coordenadoria Geral de Polícia Marítima, Aeronáutica e de Fronteiras'),(6,'CNIG – Conselho Nacional de Imigração'),(7,'CNT - Carteira Nacional de Habilitação'),(8,'CORECON - Conselho Regional de Economia'),(9,'COREN – Conselho Regional de Enfermagem'),(10,'CRA - Conselho Regional de Administração'),(11,'CRAS – Conselho Regional de Assistentes Sociais'),(12,'CRB – Conselho Regional de Biblioteconomia'),(13,'CRC – Conselho Regional de Contabilidade'),(14,'CRE – Conselho Regional de Estatística'),(15,'CREA – Conselho Regional de Engenharia, Arquitetura e Agronomia'),(16,'CRECI – Conselho Regional de Corretores de Imóveis'),(17,'CREFIT – Conselho Regional de Fisioterapia e Terapia Ocupacional'),(18,'CRF - Conselho Regional de Farmácia'),(19,'CRM-AC - Conselho Regional de Medicina do Estado do Acre'),(20,'CRM-AL - Conselho Regional de Medicina do Estado de Alagoas'),(21,'CRM-AP - Conselho Regional de Medicina do Estado do Amapá'),(22,'CRM-AM - Conselho Regional de Medicina do Estado do Amazonas'),(23,'CRM-BA - Conselho Regional de Medicina do Estado da Bahia'),(24,'CRM-CE - Conselho Regional de Medicina do Estado do Ceará'),(25,'CRM-DF - Conselho Regional de Medicina Distrito Federal'),(26,'CRM-ES - Conselho Regional de Medicina do Estado do Espírito Santo'),(27,'CRM-GO - Conselho Regional de Medicina do Estado do Goiás'),(28,'CRM-MA - Conselho Regional de Medicina do Estado do Maranhão'),(29,'CRM-MT - Conselho Regional de Medicina do Estado do Mato Grosso'),(30,'CRM-MS - Conselho Regional de Medicina do Estado do Mato Grosso do Sul'),(31,'CRM-MG - Conselho Regional de Medicina do Estado de Minas Gerais'),(32,'CRM-PA - Conselho Regional de Medicina do Estado do Pará'),(33,'CRM-PB - Conselho Regional de Medicina do Estado da Paraíba'),(34,'CRM-PR - Conselho Regional de Medicina do Estado do Paraná'),(35,'CRM-PE - Conselho Regional de Medicina do Estado do Pernambuco'),(36,'CRM-PI - Conselho Regional de Medicina do Estado do Piauí'),(37,'CRM-RJ - Conselho Regional de Medicina do Estado do Rio de Janeiro'),(38,'CRM-RN - Conselho Regional de Medicina do Estado do Rio Grande do Norte'),(39,'CRM-RS - Conselho Regional de Medicina do Estado do Rio Grande do Sul'),(40,'CRM-RO - Conselho Regional de Medicina do Estado de Rondônia'),(41,'CRM-RR - Conselho Regional de Medicina do Estado de Roraima'),(42,'CRM-SC - Conselho Regional de Medicina do Estado de Santa Catarina'),(43,'CRM-SP - Conselho Regional de Medicina do Estado de São Paulo'),(44,'CRM-SE - Conselho Regional de Medicina do Estado de Sergipe'),(45,'CRM-TO - Conselho Regional de Medicina do Estado de Tocantins'),(46,'CRMV – Conselho Regional de Medicina Veterinária'),(47,'CRN – Conselho Regional de Nutrição'),(48,'CRO - Conselho Regional de Odontologia'),(49,'CRP – Conselho Regional de Psicologia'),(50,'CRPRE – Conselho Regional de Profissionais de Relações Públicas'),(51,'CRQ – Conselho Regional de Química'),(52,'CRRC – Conselho Regional de Representantes Comerciais'),(53,'CSC - Carteira Sede Carpina de Pernambuco'),(54,'CTPS – Carteira de Trabalho e Previdência Social'),(55,'DIC - Diretoria de Identificação Civil'),(56,'DIREX – Diretoria-Executiva'),(57,'DPMAF – Divisão de Polícia Marítima, Área e de Fronteiras'),(58,'DPT – Departamento de Polícia Técnica Geral'),(59,'DST – Programa Municipal DST/Aids'),(60,'FGTS - Fundo de Garantia do Tempo de Serviço'),(61,'FIPE – Fundação Instituto de Pesquisas Econômicas'),(62,'FLS - Fundação Lyndolpho Silva'),(63,'GOVGO - Governo do Estado de Goiás'),(64,'I CLA – Carteira de Identidade Classista'),(65,'IFP - Instituto Félix Pacheco'),(66,'IGP – Instituto Geral de Perícias'),(67,'IIMG - Inter-institutional Monitoring Group'),(68,'IML - Instituto Médico-Legal'),(69,'IPC - Índice de Preços ao Consumidor'),(70,'IPF - Instituto Pereira Faustino'),(71,'MAE - Ministério da Aeronáutica'),(72,'MEX - Ministério do Exército'),(73,'MMA - Ministério da Marinha'),(74,'MTE - Ministério do Trabalho e Emprego'),(75,'OAB - Ordem dos Advogados do Brasil'),(76,'OMB – Ordens dos Músicos do Brasil'),(77,'PC - Policia Civil'),(78,'PM - Polícia Militar'),(79,'PF - Polícia Federal'),(80,'DPF - Polícia Federal'),(81,'SDS – Secretaria de Defesa Social'),(82,'SECC – Secretaria de Estado da Casa Civil'),(83,'SEJUSP – Secretaria de Estado de Justiça e Segurança Pública'),(84,'SES - Carteira de Estrangeiro'),(85,'SES ou EST - Carteira de Estrangeiro'),(86,'SESP – Secretaria de Estado da Segurança Pública'),(87,'SJS - Secretaria da Justiça e Segurança'),(88,'SJTC – Secretaria da Justiça do Trabalho e Cidadania'),(89,'SNJ – Secretaria Nacional de Justiça / Departamento de Estrangeiros'),(90,'SPTC - Secretaria de Polícia Técnico-Científica'),(91,'SSP - Secretaria de Segurança Pública'),(92,'ZZZ - Outros (inclusive exterior)');
/*!40000 ALTER TABLE `orgao_expedidores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamentos` (
  `idpagamentos` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`idpagamentos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
INSERT INTO `pagamentos` VALUES (1,'Grátis'),(2,'Pagseguro'),(3,'Paypal'),(4,'Boleto'),(5,'MoiP');
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `idprodutos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `preco` double NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`idprodutos`),
  KEY `fk_produtos_categorias_idx` (`categoria_id`) USING BTREE,
  CONSTRAINT `fk_produtos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`idcategorias`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Produto Camisa 1','camisa.jpg',85,15,'Camisa Polo',1),(2,'Produto Camisa 2','camisa.jpg',310,10,'Camiseta Social',1),(3,'Produto Camisa 3','camisa.jpg',50,20,'Camisa Regata',1),(14,'Produto Calça 1','calca.jpg',95,25,'Calça Social',2),(15,'Produto Calça 2','calca.jpg',120,0,'Calça Sarja',2),(16,'Produto Calça 3','calca.jpg',95,6,'Calça Moletom',2),(17,'Sapato Social Bigioni Em Couro Preto','sapato1.jpg',185,15,'Sapato Social Bigioni em Couro Legítimo',3),(18,'Sapato Social Democrata Recorte Preto','sapato2.jpg',255,20,'Sapato Social Democrata Recorte preto, confeccionado em couro com recortes pespontados e fechamento por amarração de cadarço. Interior em couro, palmilha macia e solado de borracha.',3),(19,'Sapato Social Bigioni Marrom','sapato3.jpg',195,0,'Calçados Bigioni Homem. Sapatos produzidos com forma estilo italiano bico fino, 100% em Couro legítimo. ',3),(20,'Sapato Social Estilo Italiano Em Couro Legítimo','sapato5.jpg',189,20,'Produção diretamente de Franca, a capital dos Calçados Masculinos',3),(21,'CD - All You Need Is Love - Ao Vivo na Inglaterra - Vol. 1','beatles.jpg',25.99,0,'All You Need is Love apresenta este CD duplo composto por um CD gravado no estúdio Abbey Road, e um CD com show ao vivo no Cavern Club. As canções gravadas em Abbey Road foram executadas exatamente da mesma forma que os Beatles gravaram. A ideia do musical é levar o público para dentro da magia que foi a época de 1960 e 1970, fazendo uma viagem a Inglaterra e Liverpool. ',4),(22,'CD - AC/DC - Blow Up Your Video','acdc.jpg',39.44,20,'Blow Up Your Video é o décimo primeiro álbum de estúdio da banda AC/DC, foi bem sucedido, mas não tanto quanto os álbuns anteriores: Back In Black de 1980 e For Those About to Rock (We Salute You) de 1981.',4),(23,'CD - Prong - Rude Awakening','prong.jpg',80,15,'O álbum Rude Awakening é da banda Prong. Destaque para as faixas \"Avenue of the Finest\", \"Rude Awakening\" e \"Controller\". Nâo deixe faltar em sua casa este incrível CD !!!',4),(24,'CD - Queen - The Miracle - Duplo','queen.jpg',60,0,'The Miracle é o décimo terceiro álbum de estúdio da banda inglesa Queen. Foi lançado oficialmente na década de 80 para 90 no Reino Unido e nos EUA. Foi o primeiro álbum do Queen a sair em CD, LP e fita cassete simultaneamente.',4),(25,'CD - Stratovarius - Dreamspace ','strato.jpg',30,58,'This edition [IMPORT] entitled Dreamspace, is the Stratovarius release, one of the greatest names in the \"Scandinavian Metal\". The album brings together fantastic songs along with the best of its style, as its very clear thru tracks such as \"Chasing Shadows\" and \"Hold on to Your Dream\", some of the highlights. An incredible work.',4),(26,'CD - Girlschool - The Collection (Duplo)','girl.jpg',35.99,45,'A banda inglesa feminina de rock que se consagrou nos anos 80 está de volta, em dose dupla! Confira uma coleção com os grandes sucessos de carreira do grupo.',4),(27,'CD - Hellfueled - Born II Rock','hell.jpg',45.26,0,'Born II Rock é o segundo álbum dos suecos do Hellfueled, lançado após o grande sucesso de Volume One. São 11 faixas com o melhor do heavy metal simples e direto, marcadas pelos incríveis vocais do vocalista Andy Alkman, incluindo os destaques \"Regain Dour Cromn\", \"On The Run\" e \"Make It Home\". Um CD que não pode faltar em sua coleção. Confira!',4),(28,'Sapato Social Perfuros Marrom','sapato4.jpg',69.55,45,'Sapato Social Perfuros Marrom, com bico quadrado, recorte em perfuros, fivela decorativa e elástico para calce.',3),(29,'Sapato Social Couro Democrata Denver Marrom','sapato6.jpg',195.55,35,'Sapato Social Couro Democrata Denver Marrom, com bico quadrado, cabedal com acabamento envernizado e pespontos aparentes. Possui acabamento jateado e fechamento por amarração.',3),(30,'Sapato FiveBlu Ealing Preto','sapato7.jpg',154,26,'Sapato FiveBlu Ealing Preto, possui acabamento envernizado, tira frontal com adereço metalizado e bico quadrado.',3),(31,'Sapato Social Couro Democrata Marrom','sapato8.jpg',148.99,30,'Sapato Social Couro Democrata Marrom, com bico quadrado, acabamento pespontado e fecho por cadarço.',3),(32,'Sapato Sandro Moscoloni Matthew Oxford','sapato9.jpg',250,15,'Os sapatos Oxford foram criados para o homem elegante e atraente, eles nunca deixaram de marcar presença na vida do homem clássico, proporciona um toque todo especial de sofisticação e elegância e dá um diferencial ao estilo de qualquer um. Para ser usado especialmente em looks mais clássicos.',3),(36,'Calça Kaisan','8adf6334d9fb270a50abd7bdcabd3530.jpg',150,45,'Calça Kaisan Legging Jeans Escura. A legging jeans é prática e muito estilosa, conquistando a preferência das mulheres.',2);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_pagamento`
--

DROP TABLE IF EXISTS `status_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_pagamento` (
  `idstatus_pagamento` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `status_pagamento` varchar(80) NOT NULL,
  PRIMARY KEY (`idstatus_pagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_pagamento`
--

LOCK TABLES `status_pagamento` WRITE;
/*!40000 ALTER TABLE `status_pagamento` DISABLE KEYS */;
INSERT INTO `status_pagamento` VALUES (1,'Aguardando Pagamento'),(2,'Aprovado'),(3,'Cancelado');
/*!40000 ALTER TABLE `status_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `idtelefone` int(11) NOT NULL AUTO_INCREMENT,
  `ddd_tel_res` tinyint(2) unsigned NOT NULL,
  `telefone_residencial` bigint(9) unsigned NOT NULL,
  `ddd_tel_cel` tinyint(2) NOT NULL,
  `telefone_celular` bigint(9) unsigned NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  PRIMARY KEY (`idtelefone`),
  KEY `fk_telefone_usuarios_idx` (`id_usuarios`) USING BTREE,
  CONSTRAINT `fk_telefone_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`idusuarios`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_logradouros`
--

DROP TABLE IF EXISTS `tp_logradouros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp_logradouros` (
  `idtp_logradouros` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `tp_logradouro` varchar(45) NOT NULL,
  PRIMARY KEY (`idtp_logradouros`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_logradouros`
--

LOCK TABLES `tp_logradouros` WRITE;
/*!40000 ALTER TABLE `tp_logradouros` DISABLE KEYS */;
INSERT INTO `tp_logradouros` VALUES (1,'Aeroporto'),(2,'Alameda'),(3,'Área'),(4,'Avenida'),(5,'Balneário'),(6,'Bosque'),(7,'Calçada'),(8,'Campo'),(9,'Chácara'),(10,'Colônia'),(11,'Condomínio'),(12,'Conjunto'),(13,'Distrito'),(14,'Esplanada'),(15,'Estação'),(16,'Estrada'),(17,'Favela'),(18,'Feira'),(19,'Ferrovia'),(20,'Jardim'),(21,'Ladeira'),(22,'Lago'),(23,'Lagoa'),(24,'Largo'),(25,'Loteamento'),(26,'Morro'),(27,'Núcleo'),(28,'Parque'),(29,'Passarela'),(30,'Pátio'),(31,'Praça'),(32,'Quadra'),(33,'Recanto'),(34,'Residencial'),(35,'Rodovia'),(36,'Rua'),(37,'Serra'),(38,'Setor'),(39,'Sítio'),(40,'Travessa'),(41,'Trecho'),(42,'Trevo'),(43,'Vale'),(44,'Vereda'),(45,'Via'),(46,'Viaduto'),(47,'Viela'),(48,'Vila'),(49,'Outro');
/*!40000 ALTER TABLE `tp_logradouros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ufs`
--

DROP TABLE IF EXISTS `ufs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ufs` (
  `idufs` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`idufs`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ufs`
--

LOCK TABLES `ufs` WRITE;
/*!40000 ALTER TABLE `ufs` DISABLE KEYS */;
INSERT INTO `ufs` VALUES (1,'AC'),(2,'AL'),(3,'AP'),(4,'AM'),(5,'BA'),(6,'CE'),(7,'DF'),(8,'ES'),(9,'GO'),(10,'MA'),(11,'MT'),(12,'MS'),(13,'MG'),(14,'PA'),(15,'PB'),(16,'PR'),(17,'PE'),(18,'PI'),(19,'RJ'),(20,'RN'),(21,'RS'),(22,'RO'),(23,'RR'),(24,'SC'),(25,'SP'),(26,'SE'),(27,'TO');
/*!40000 ALTER TABLE `ufs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) DEFAULT NULL,
  `cpf` bigint(11) unsigned zerofill NOT NULL,
  `email` varchar(90) NOT NULL,
  `senha` varchar(190) NOT NULL,
  `tipo` enum('Cliente','Admin') NOT NULL,
  `rg` varchar(10) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `id_orgao_expedidores` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idusuarios`),
  KEY `fk_usuarios_orgao_expedidores1_idx` (`id_orgao_expedidores`) USING BTREE,
  CONSTRAINT `fk_usuarios_orgao_expedidores1` FOREIGN KEY (`id_orgao_expedidores`) REFERENCES `orgao_expedidores` (`idorgao_expedidores`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jorgito',00000000000,'jorgito@gmail.com','123456','Cliente',NULL,NULL,NULL,0),(2,'Jorge Toledo',00000000000,'jorge@gmail.com','123456','Cliente',NULL,NULL,NULL,0),(3,'Jorgito',00000000000,'jspaiva.1977@gmail.com','123456','Cliente',NULL,NULL,NULL,0),(4,'Thadeu',00000000000,'exemplo@gmail.com','123456','Cliente',NULL,NULL,NULL,0),(5,'Thadeu',00000000000,'siscadcons@gmail.com','123456','Cliente',NULL,NULL,NULL,0),(6,'Carlos',00000000000,'algumemail@gmail.com','123456','Cliente',NULL,NULL,NULL,0),(7,'Comprador',00000000000,'comprador@gmail.com','e10adc3949ba59abbe56e057f20f883e','Cliente',NULL,NULL,NULL,0),(8,'Cláudio',00000000000,'claudio@gmail.com','e10adc3949ba59abbe56e057f20f883e','Admin',NULL,NULL,NULL,0),(9,'Admin',00000000000,'admin@gmail.com','e10adc3949ba59abbe56e057f20f883e','Admin',NULL,NULL,NULL,0),(10,'Jorgito',00000000000,'454545454@gmail.com','e10adc3949ba59abbe56e057f20f883e','Cliente',NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas` (
  `idvendas` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(100) NOT NULL,
  `valor` double NOT NULL,
  `forma_pag` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `status_pag` tinyint(3) unsigned NOT NULL,
  `pg_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idvendas`),
  KEY `fk_status_pagamento_idx` (`status_pag`) USING BTREE,
  KEY `fk_forma_pagamento_idx` (`forma_pag`) USING BTREE,
  KEY `fk_vendas_usuarios1_idx` (`usuario_id`) USING BTREE,
  CONSTRAINT `fk_forma_pagamento` FOREIGN KEY (`forma_pag`) REFERENCES `pagamentos` (`idpagamentos`) ON UPDATE CASCADE,
  CONSTRAINT `fk_status_pagamento` FOREIGN KEY (`status_pag`) REFERENCES `status_pagamento` (`idstatus_pagamento`) ON UPDATE CASCADE,
  CONSTRAINT `fk_vendas_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (1,'Quadra 16',240,1,0,2,'/carrinho/obrigado'),(2,'Quadra 16',240,1,0,2,'/carrinho/obrigado'),(3,'Quadra 16',240,1,0,2,'/carrinho/obrigado'),(4,'Quadra 16',240,1,0,2,'/carrinho/obrigado'),(5,'Quadra 19',240,1,0,2,'/carrinho/obrigado'),(6,'Quadra 16',80,1,0,2,'/carrinho/obrigado'),(7,'Quadra 16',440,2,0,1,''),(8,'Quadra 16',225,2,0,1,''),(9,'Algum endereço',230,2,0,1,''),(10,'Algum endereço',240,2,0,1,''),(11,'Alguem endereço',80,2,8,1,''),(12,'Algum endereço',170,2,8,1,''),(13,'Algum endereço',90,1,7,2,''),(14,'Quadra 14',170,1,8,2,''),(15,'Algum',350,1,7,2,''),(16,'Quadra 16',95,1,10,2,'');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas_produtos`
--

DROP TABLE IF EXISTS `vendas_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas_produtos` (
  `idvendas_produtos` int(11) NOT NULL AUTO_INCREMENT,
  `venda_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` mediumint(9) NOT NULL,
  PRIMARY KEY (`idvendas_produtos`),
  KEY `fk_vendas_produtos_vendas1_idx` (`venda_id`) USING BTREE,
  KEY `fk_vendas_produtos_produtos1_idx` (`produto_id`) USING BTREE,
  CONSTRAINT `fk_vendas_produtos_produtos1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`idprodutos`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_vendas_produtos_vendas1` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`idvendas`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas_produtos`
--

LOCK TABLES `vendas_produtos` WRITE;
/*!40000 ALTER TABLE `vendas_produtos` DISABLE KEYS */;
INSERT INTO `vendas_produtos` VALUES (1,13,1,1),(2,15,2,1),(3,15,14,1),(4,15,15,1),(5,11,3,1),(6,12,16,1),(7,14,19,1),(8,0,0,1),(9,0,0,1),(10,0,0,1),(11,0,0,1),(12,0,0,1),(13,0,0,1),(14,0,0,1),(15,0,0,1),(16,0,0,1),(17,0,0,1),(18,0,0,1),(19,0,0,1),(20,0,0,1),(21,0,0,1),(22,0,0,1),(23,0,0,1),(24,0,0,1),(25,0,0,1),(26,0,0,1),(27,0,0,1),(28,0,0,1),(29,16,14,1);
/*!40000 ALTER TABLE `vendas_produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-11 10:43:19
