/*
SQLyog Community Edition- MySQL GUI v8.03 
MySQL - 5.0.51b-community-nt : Database - hms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`hms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hms`;

/*Table structure for table `tb_appointment` */

DROP TABLE IF EXISTS `tb_appointment`;

CREATE TABLE `tb_appointment` (
  `apno` int(11) NOT NULL auto_increment,
  `pname` varchar(50) default NULL,
  `age` varchar(5) default NULL,
  `pmob` varchar(15) default NULL,
  `pdoctor` varchar(50) default NULL,
  `apdate` varchar(15) default NULL,
  `pdisease` varchar(100) default NULL,
  `currdate` varchar(15) default NULL,
  `tno` varchar(10) default NULL,
  `pstatus` varchar(5) default NULL,
  UNIQUE KEY `apno` (`apno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_appointment` */

/*Table structure for table `tb_contactus` */

DROP TABLE IF EXISTS `tb_contactus`;

CREATE TABLE `tb_contactus` (
  `mno` int(11) NOT NULL auto_increment,
  `mname` varchar(50) default NULL,
  `email` varchar(100) default NULL,
  `msg` varchar(1000) default NULL,
  `mdate` varchar(15) default NULL,
  `mstatus` varchar(5) default NULL,
  PRIMARY KEY  (`mno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_contactus` */

/*Table structure for table `tb_doctor` */

DROP TABLE IF EXISTS `tb_doctor`;

CREATE TABLE `tb_doctor` (
  `dno` int(11) NOT NULL auto_increment,
  `dname` varchar(50) default NULL,
  `did` varchar(20) NOT NULL,
  `ddob` varchar(20) default NULL,
  `dgender` varchar(10) default NULL,
  `ddegree` varchar(50) default NULL,
  `path` varchar(200) default NULL,
  `dept` varchar(50) default NULL,
  `daddress` varchar(200) default NULL,
  `dmob` varchar(15) default NULL,
  `demail` varchar(50) default NULL,
  PRIMARY KEY  (`dno`),
  UNIQUE KEY `dno` (`dno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_doctor` */

/*Table structure for table `tb_login` */

DROP TABLE IF EXISTS `tb_login`;

CREATE TABLE `tb_login` (
  `slno` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `pass` varchar(50) default NULL,
  `typ` varchar(20) default NULL,
  `lastaccess` varchar(50) default NULL,
  `stat` varchar(5) default NULL,
  `block` varchar(5) default NULL,
  PRIMARY KEY  (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_login` */

insert  into `tb_login`(`slno`,`username`,`pass`,`typ`,`lastaccess`,`stat`,`block`) values (1,'admin','admin','Admin','First Time','1','0'),(2,'pharmacy','pharmacy','Pharmacy','First Time','1','0'),(3,'lab','lab','Laboratory','First Time','1','0');

/*Table structure for table `tb_medicine` */

DROP TABLE IF EXISTS `tb_medicine`;

CREATE TABLE `tb_medicine` (
  `mno` int(11) NOT NULL auto_increment,
  `pname` varchar(50) default NULL,
  `pid` varchar(50) default NULL,
  `dname` varchar(50) default NULL,
  `medicine` varchar(1000) default NULL,
  `mdate` varchar(15) default NULL,
  `mstatus` varchar(5) default NULL,
  PRIMARY KEY  (`mno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_medicine` */

/*Table structure for table `tb_patient` */

DROP TABLE IF EXISTS `tb_patient`;

CREATE TABLE `tb_patient` (
  `pno` int(11) NOT NULL auto_increment,
  `pname` varchar(50) default NULL,
  `pid` varchar(20) NOT NULL,
  `age` int(5) default NULL,
  `pdob` varchar(15) default NULL,
  `pgender` varchar(10) default NULL,
  `pdisease` varchar(200) default NULL,
  `path` varchar(200) default NULL,
  `pdoctor` varchar(50) default NULL,
  `proom` varchar(20) default NULL,
  `paddress` varchar(200) default NULL,
  `pmob` varchar(15) default NULL,
  `pemail` varchar(100) default NULL,
  `pdate` varchar(15) default NULL,
  `pstatus` varchar(5) default NULL,
  UNIQUE KEY `pno` (`pno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_patient` */

/*Table structure for table `tb_test` */

DROP TABLE IF EXISTS `tb_test`;

CREATE TABLE `tb_test` (
  `tno` int(11) NOT NULL auto_increment,
  `pname` varchar(50) default NULL,
  `pid` varchar(50) default NULL,
  `dname` varchar(50) default NULL,
  `test` varchar(1000) default NULL,
  `tdate` varchar(15) default NULL,
  `tstatus` varchar(5) default NULL,
  PRIMARY KEY  (`tno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_test` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
