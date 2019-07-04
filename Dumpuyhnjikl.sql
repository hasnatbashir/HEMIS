CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Dumping data for table `arrears`
--

LOCK TABLES `arrears` WRITE;
/*!40000 ALTER TABLE `arrears` DISABLE KEYS */;
/*!40000 ALTER TABLE `arrears` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cash_payment`
--

LOCK TABLES `cash_payment` WRITE;
/*!40000 ALTER TABLE `cash_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `cash_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cheque_payment`
--

LOCK TABLES `cheque_payment` WRITE;
/*!40000 ALTER TABLE `cheque_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `cheque_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'CS');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,1,'Malik','Male','abdullah@gmail.com','03135648834','1997-01-20','America','3702-366464-4','America','Single','Punjab','-','13','14','Permanent','-','-','1'),(2,1,'Bilal','Male','bilal@gmail.com','5023865','1998-09-30','Pakistan','4336263262','Pakistan','Married','Sindh','-','31','23','Contract','2019-06-01','-','2'),(3,1,'Alvi','Male','bilal@gmail.com','5023865','1998-09-30','Pakistan','4336263262','Pakistan','Married','Sindh','-','31','23','Contract','2019-06-01','-','2');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_salary`
--

LOCK TABLES `employee_salary` WRITE;
/*!40000 ALTER TABLE `employee_salary` DISABLE KEYS */;
INSERT INTO `employee_salary` VALUES (2,1,100032),(4,2,3222),(5,3,5);
/*!40000 ALTER TABLE `employee_salary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_salary_allowances`
--

LOCK TABLES `employee_salary_allowances` WRITE;
/*!40000 ALTER TABLE `employee_salary_allowances` DISABLE KEYS */;
INSERT INTO `employee_salary_allowances` VALUES (1,2,100,200,193,321,213,435),(2,4,232,35443,43534,345,435,4352),(3,5,1,1,1,1,1,1);
/*!40000 ALTER TABLE `employee_salary_allowances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_salary_deductions`
--

LOCK TABLES `employee_salary_deductions` WRITE;
/*!40000 ALTER TABLE `employee_salary_deductions` DISABLE KEYS */;
INSERT INTO `employee_salary_deductions` VALUES (2,2,131,123,345),(3,4,23423,324,423),(4,5,1,1,1);
/*!40000 ALTER TABLE `employee_salary_deductions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_salary_payslip_allowances`
--

LOCK TABLES `employee_salary_payslip_allowances` WRITE;
/*!40000 ALTER TABLE `employee_salary_payslip_allowances` DISABLE KEYS */;
INSERT INTO `employee_salary_payslip_allowances` VALUES (4,6,100,200,1767,213,123,123),(5,7,21,21,13,13,123,123);
/*!40000 ALTER TABLE `employee_salary_payslip_allowances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_salary_payslip_deductions`
--

LOCK TABLES `employee_salary_payslip_deductions` WRITE;
/*!40000 ALTER TABLE `employee_salary_payslip_deductions` DISABLE KEYS */;
INSERT INTO `employee_salary_payslip_deductions` VALUES (4,6,21312,123,123),(5,6,123,123,123);
/*!40000 ALTER TABLE `employee_salary_payslip_deductions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_salary_payslips`
--

LOCK TABLES `employee_salary_payslips` WRITE;
/*!40000 ALTER TABLE `employee_salary_payslips` DISABLE KEYS */;
INSERT INTO `employee_salary_payslips` VALUES (6,2,10000,5,2019),(7,2,11000,6,2019);
/*!40000 ALTER TABLE `employee_salary_payslips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-04 23:40:32
