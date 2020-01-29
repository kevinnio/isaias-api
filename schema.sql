-- MySQL dump 10.13  Distrib 8.0.19, for osx10.15 (x86_64)
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `api_tokens`
--

DROP TABLE IF EXISTS `api_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `api_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `token` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `contra` varchar(20) NOT NULL,
  `RazonSocial` varchar(200) DEFAULT NULL,
  `RFC` varchar(15) DEFAULT NULL,
  `Calle` varchar(45) DEFAULT NULL,
  `NoExt` varchar(10) DEFAULT NULL,
  `Colonia` varchar(45) DEFAULT NULL,
  `Municipio` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `CP` int NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `visita` datetime DEFAULT NULL,
  `lvl` int DEFAULT NULL,
  `modpor` varchar(45) DEFAULT NULL,
  `puertoOrigen` varchar(45) DEFAULT NULL,
  `seco` varchar(45) DEFAULT NULL,
  `refrigerado` varchar(45) DEFAULT NULL,
  `viajesva` varchar(45) DEFAULT NULL,
  `naviera` varchar(45) DEFAULT NULL,
  `FechaAlta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login` datetime NOT NULL,
  `Enero` double NOT NULL,
  `Cntr1` varchar(45) DEFAULT NULL,
  `Febrero` double NOT NULL,
  `Cntr2` varchar(45) DEFAULT NULL,
  `Marzo` double NOT NULL,
  `Cntr3` varchar(45) DEFAULT NULL,
  `Abril` double NOT NULL,
  `Cntr4` varchar(45) DEFAULT NULL,
  `Mayo` double NOT NULL,
  `Cntr5` varchar(45) DEFAULT NULL,
  `Junio` double NOT NULL,
  `Cntr6` varchar(45) DEFAULT NULL,
  `Julio` double NOT NULL,
  `Cntr7` varchar(45) DEFAULT NULL,
  `Agosto` double NOT NULL,
  `Cntr8` varchar(45) DEFAULT NULL,
  `Septiembre` double NOT NULL,
  `Cntr9` varchar(45) DEFAULT NULL,
  `Octubre` double NOT NULL,
  `Cntr10` varchar(45) DEFAULT NULL,
  `Noviembre` double NOT NULL,
  `Cntr11` varchar(45) DEFAULT NULL,
  `Diciembre` double NOT NULL,
  `Cntr12` varchar(45) DEFAULT NULL,
  `Rem1` double NOT NULL,
  `Rem2` double NOT NULL,
  `Rem3` double NOT NULL,
  `Rem4` double NOT NULL,
  `Rem5` double NOT NULL,
  `Rem6` double NOT NULL,
  `Rem7` double NOT NULL,
  `Rem8` double NOT NULL,
  `Rem9` double NOT NULL,
  `Rem10` double NOT NULL,
  `Rem11` double NOT NULL,
  `Rem12` double NOT NULL,
  `Sin1` int NOT NULL,
  `Sin2` int NOT NULL,
  `Sin3` varchar(20) NOT NULL,
  `Sin4` varchar(20) NOT NULL,
  `Sin5` varchar(20) NOT NULL,
  `Sin6` varchar(15) NOT NULL,
  `Sin7` varchar(20) NOT NULL,
  `Sin8` int NOT NULL,
  `Sin9` int NOT NULL,
  `Sin10` int NOT NULL,
  `Sin11` int NOT NULL,
  `Sin12` int NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=428 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `merca`
--

DROP TABLE IF EXISTS `merca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merca` (
  `idViaje` int NOT NULL AUTO_INCREMENT,
  `idCliente` int NOT NULL,
  `Cliente` varchar(50) NOT NULL,
  `rfc` varchar(50) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `mercancia` varchar(50) NOT NULL,
  `importe` varchar(45) NOT NULL,
  `TipoOperacion` varchar(240) NOT NULL,
  `FechaAlta` datetime NOT NULL,
  `detalles` varchar(250) NOT NULL,
  `TipoTransporte` varchar(50) NOT NULL,
  `FechaSalida` date NOT NULL,
  `FechaLlegada` date NOT NULL,
  `folio` varchar(245) NOT NULL,
  `porigen` varchar(50) NOT NULL,
  `eorigen` varchar(50) NOT NULL,
  `corigen` varchar(50) NOT NULL,
  `pdestino` varchar(50) NOT NULL,
  `edestino` varchar(50) NOT NULL,
  `cdestino` varchar(50) NOT NULL,
  `Coberturas1` varchar(300) NOT NULL,
  `Coberturas2` varchar(300) NOT NULL,
  `Coberturas3` varchar(300) NOT NULL,
  `Coberturas4` varchar(300) NOT NULL,
  `poliza` varchar(50) NOT NULL,
  `cuota` float NOT NULL,
  `prima` varchar(45) NOT NULL,
  `gastosexp` int NOT NULL,
  `iva` varchar(45) NOT NULL,
  `total` varchar(45) NOT NULL,
  PRIMARY KEY (`idViaje`)
) ENGINE=MyISAM AUTO_INCREMENT=631 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reporte`
--

DROP TABLE IF EXISTS `reporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reporte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mes` varchar(45) NOT NULL,
  `ingresos` double NOT NULL,
  `orbe` double NOT NULL,
  `reembolsos` double NOT NULL,
  `neto` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reporte2018`
--

DROP TABLE IF EXISTS `reporte2018`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reporte2018` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mes` varchar(45) NOT NULL,
  `ingresos` double NOT NULL,
  `orbe` double NOT NULL,
  `reembolsos` double NOT NULL,
  `neto` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reporte2019`
--

DROP TABLE IF EXISTS `reporte2019`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reporte2019` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mes` varchar(45) NOT NULL,
  `ingresos` double NOT NULL,
  `orbe` double NOT NULL,
  `reembolsos` double NOT NULL,
  `neto` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Servicios`
--

DROP TABLE IF EXISTS `Servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Servicios` (
  `idServicio` int NOT NULL AUTO_INCREMENT,
  `idCliente` int NOT NULL,
  `idTipoContenedor` int NOT NULL,
  `Precio` varchar(45) NOT NULL,
  `LimitMaxRespons` varchar(15) NOT NULL,
  `DeducibleMaterial` int NOT NULL,
  `DeducibleRobo` int NOT NULL,
  `FechaAlta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Demoras` varchar(12) NOT NULL,
  `LimpiezaExtraordinaria` varchar(12) NOT NULL,
  PRIMARY KEY (`idServicio`),
  UNIQUE KEY `Unico` (`idCliente`,`idTipoContenedor`)
) ENGINE=MyISAM AUTO_INCREMENT=552 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `TipoPoliza`
--

DROP TABLE IF EXISTS `TipoPoliza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TipoPoliza` (
  `idTipoPoliza` int NOT NULL AUTO_INCREMENT,
  `TipoPoliza` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoPoliza`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `TiposContenedores`
--

DROP TABLE IF EXISTS `TiposContenedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TiposContenedores` (
  `idTipoContenedor` int NOT NULL AUTO_INCREMENT,
  `TipoContenedor` varchar(25) NOT NULL,
  `FechaAlta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTipoContenedor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `viajes`
--

DROP TABLE IF EXISTS `viajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `viajes` (
  `idViaje` int NOT NULL AUTO_INCREMENT,
  `idCliente` int NOT NULL,
  `idTipoPoliza` int NOT NULL,
  `Cliente` varchar(50) NOT NULL,
  `idTipoContenedor` int NOT NULL,
  `Contenedor1` varchar(20) NOT NULL,
  `Contenedor2` varchar(20) NOT NULL,
  `Contenedor3` varchar(45) NOT NULL,
  `Contenedor4` varchar(45) NOT NULL,
  `Contenedor5` varchar(45) NOT NULL,
  `Contenedor6` varchar(45) NOT NULL,
  `Contenedor7` varchar(45) NOT NULL,
  `Contenedor8` varchar(45) NOT NULL,
  `Contenedor9` varchar(45) NOT NULL,
  `Contenedor10` varchar(45) NOT NULL,
  `CantCont` int NOT NULL,
  `Referencia` varchar(20) NOT NULL,
  `CartaPorte` varchar(20) NOT NULL,
  `Origen` varchar(25) NOT NULL,
  `Destino` varchar(25) NOT NULL,
  `Placas` varchar(10) NOT NULL,
  `Operador` varchar(25) NOT NULL,
  `TipoOperacion` varchar(25) NOT NULL,
  `Pagado` int NOT NULL,
  `FechaAlta` datetime NOT NULL,
  PRIMARY KEY (`idViaje`)
) ENGINE=MyISAM AUTO_INCREMENT=16492 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-29 13:47:20
