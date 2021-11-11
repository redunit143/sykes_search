<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RawSqlToCreateAndPopulate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('create_and_populate', function (Blueprint $table) {
            DB::unprepared("
/*
SQLyog Ultimate v11.26 (64 bit)
MySQL - 5.5.36 : Database - sykes_interview
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sykes_interview` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sykes_interview`;

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_fk_property` int(10) unsigned DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `bookings` */

insert  into `bookings`(`__pk`,`_fk_property`,`start_date`,`end_date`) values
	(1,1,'2020-08-26','2020-09-02'),
	(2,1,'2020-12-06','2020-12-13');

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `locations` */

insert  into `locations`(`__pk`,`location_name`) values
	(1,'Cornwall'),
	(2,'Lake District'),
	(3,'Yorkshire'),
	(4,'Wales'),
	(5,'Scotland');

/*Table structure for table `properties` */

DROP TABLE IF EXISTS `properties`;

CREATE TABLE `properties` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_fk_location` int(10) unsigned DEFAULT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `near_beach` tinyint(1) unsigned DEFAULT NULL,
  `accepts_pets` tinyint(1) unsigned DEFAULT NULL,
  `sleeps` tinyint(3) unsigned DEFAULT NULL,
  `beds` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `properties` */

insert  into `properties`(`__pk`,`_fk_location`,`property_name`,`near_beach`,`accepts_pets`,`sleeps`,`beds`) values
	(1,1,'Sea View',1,1,4,2),
	(2,3,'Cosey',0,0,6,4),
	(3,5,'The Retreat',1,0,2,1),
	(4,5,'Coach House',0,1,5,3),
	(5,4,'Beach Cottage',1,1,8,6);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
            ");

            //DB::unprepared($raw);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('create_and_populate', function (Blueprint $table) {
            //
        });
    }
}
