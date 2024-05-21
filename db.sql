/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.11-MariaDB : Database - donationdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`donationdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `donationdb`;

/*Table structure for table `blood_groups` */

DROP TABLE IF EXISTS `blood_groups`;

CREATE TABLE `blood_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blood_groups` */

insert  into `blood_groups`(`id`,`name`,`short`,`created_at`,`updated_at`) values (1,'A+ (A Positive)','A+','2023-05-27 18:47:44','2023-05-27 18:47:44'),(2,'A- (A Negative)','A-',NULL,NULL),(3,'B+ (B Positive)','B+',NULL,NULL),(4,'B- (B Negative)','B-',NULL,NULL),(5,'AB+ (AB Positive)','AB+',NULL,NULL),(6,'AB- (AB Negative)','AB-',NULL,NULL),(7,'O+ (O Positive)','O+',NULL,NULL),(8,'O- (O Negative)','O-',NULL,NULL);

/*Table structure for table `districts` */

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `districts` */

insert  into `districts`(`id`,`name`,`created_at`,`updated_at`) values (1,'Comilla',NULL,NULL),(2,'Feni',NULL,NULL),(3,'Brahmanbaria',NULL,NULL),(4,'Rangamati',NULL,NULL),(5,'Noakhali',NULL,NULL),(6,'Chandpur',NULL,NULL),(7,'Lakshmipur',NULL,NULL),(8,'Chattogram',NULL,NULL),(9,'Coxsbazar',NULL,NULL),(10,'Khagrachhari',NULL,NULL),(11,'Bandarban',NULL,NULL),(12,'Sirajganj',NULL,NULL),(13,'Pabna',NULL,NULL),(14,'Bogura',NULL,NULL),(15,'Rajshahi',NULL,NULL),(16,'Natore',NULL,NULL),(17,'Joypurhat',NULL,NULL),(18,'Chapainawabganj',NULL,NULL),(19,'Naogaon',NULL,NULL),(20,'Jashore',NULL,NULL),(21,'Satkhira',NULL,NULL),(22,'Meherpur',NULL,NULL),(23,'Narail',NULL,NULL),(24,'Chuadanga',NULL,NULL),(25,'Kushtia',NULL,NULL),(26,'Magura',NULL,NULL),(27,'Khulna',NULL,NULL),(28,'Bagerhat',NULL,NULL),(29,'Jhenaidah',NULL,NULL),(30,'Jhalakathi',NULL,NULL),(31,'Patuakhali',NULL,NULL),(32,'Pirojpur',NULL,NULL),(33,'Barisal',NULL,NULL),(34,'Bhola',NULL,NULL),(35,'Barguna',NULL,NULL),(36,'Sylhet',NULL,NULL),(37,'Moulvibazar',NULL,NULL),(38,'Habiganj',NULL,NULL),(39,'Sunamganj',NULL,NULL),(40,'Narsingdi',NULL,NULL),(41,'Gazipur',NULL,NULL),(42,'Shariatpur',NULL,NULL),(43,'Narayanganj',NULL,NULL),(44,'Tangail',NULL,NULL),(45,'Kishoreganj',NULL,NULL),(46,'Manikganj',NULL,NULL),(47,'Dhaka',NULL,NULL),(48,'Munshiganj',NULL,NULL),(49,'Rajbari',NULL,NULL),(50,'Madaripur',NULL,NULL),(51,'Gopalganj',NULL,NULL),(52,'Faridpur',NULL,NULL),(53,'Panchagarh',NULL,NULL),(54,'Dinajpur',NULL,NULL),(55,'Lalmonirhat',NULL,NULL),(56,'Nilphamari',NULL,NULL),(57,'Gaibandha',NULL,NULL),(58,'Thakurgaon',NULL,NULL),(59,'Rangpur',NULL,NULL),(60,'Kurigram',NULL,NULL),(61,'Sherpur',NULL,NULL),(62,'Mymensingh',NULL,NULL),(63,'Jamalpur',NULL,NULL),(64,'Netrokona',NULL,NULL);

/*Table structure for table `donate_records` */

DROP TABLE IF EXISTS `donate_records`;

CREATE TABLE `donate_records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `donate_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `donate_records` */

insert  into `donate_records`(`id`,`user_id`,`donate_date`,`location`,`created_at`,`updated_at`) values (1,10,'2023-05-28','sdfsd','2023-05-28 11:49:39','2023-05-28 11:49:39'),(2,10,'2023-05-15','sdfs','2023-05-28 11:50:35','2023-05-28 11:50:35'),(3,10,'2023-05-14','sdfsdf','2023-05-28 11:51:54','2023-05-28 11:51:54'),(4,10,'2023-05-31','sdfsdf','2023-05-28 11:58:31','2023-05-28 11:58:31');

/*Table structure for table `donors` */

DROP TABLE IF EXISTS `donors`;

CREATE TABLE `donors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `donor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `last_donate_date` date DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `donors` */

insert  into `donors`(`id`,`user_id`,`donor_id`,`name`,`mobile`,`email`,`area`,`blood_group_id`,`district_id`,`last_donate_date`,`picture`,`created_at`,`updated_at`) values (1,3,'1003D1003','Ali Akbar','01837023812','mdaliakbar812@gmail.com','chandgoan',7,8,NULL,NULL,'2023-05-27 19:38:35','2023-05-27 19:38:35'),(2,5,'D1005','Ali Akbar','01837023812','mdaliakbar@gmail.com','chandgoan',7,8,NULL,NULL,'2023-05-27 19:40:37','2023-05-27 19:40:37'),(3,6,'D1006','Ali Akbar','01837023812','mdaliakbar1@gmail.com','chandgoan',7,8,NULL,NULL,'2023-05-27 19:41:06','2023-05-27 19:41:06'),(4,7,'D1007','Ali Akbar','01837023812','mdaliakbar11@gmail.com','chandgoan',7,8,NULL,NULL,'2023-05-27 19:41:26','2023-05-27 19:41:26'),(5,8,'D1008','Ali Akbar','01837023812','mdaliakbar22@gmail.com','chandgoan',7,8,NULL,NULL,'2023-05-27 19:42:36','2023-05-27 19:42:36'),(7,10,'D1010','Ali Akbar','01837023812','akbarcpi2014@gmail.com','chandoan',2,8,'2023-03-08',NULL,'2023-05-28 11:36:33','2023-05-28 11:58:31');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_05_27_183503_create_districts_table',2),(6,'2023_05_27_184120_create_blood_groups_table',3),(7,'2023_05_27_190944_create_donors_table',4),(8,'2023_05_28_113922_create_donate_records_table',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` tinyint(4) DEFAULT 1 COMMENT '1=admin,2=donor',
  `user_status` tinyint(4) DEFAULT 1 COMMENT '1=active,2=inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`user_type`,`user_status`,`remember_token`,`created_at`,`updated_at`) values (3,'Ali Akbar','mdaliakbar812@gmail.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',1,1,NULL,'2023-05-27 19:38:35','2023-05-27 19:38:35'),(5,'Ali Akbar','mdaliakbar@gmail.com',NULL,'$2y$10$XFGJdR/ENHMZbkKPEibnnO1mo0f0xOcK1acpUvrGJXHcBAF2kODyK',1,1,NULL,'2023-05-27 19:40:37','2023-05-27 19:40:37'),(6,'Ali Akbar','mdaliakbar1@gmail.com',NULL,'KlV5V8puan',1,1,NULL,'2023-05-27 19:41:06','2023-05-27 19:41:06'),(7,'Ali Akbar','mdaliakbar11@gmail.com',NULL,'mrVtvb',1,1,NULL,'2023-05-27 19:41:26','2023-05-27 19:41:26'),(8,'Ali Akbar','mdaliakbar22@gmail.com',NULL,'mdaliakbar22',1,1,NULL,'2023-05-27 19:42:36','2023-05-27 19:42:36'),(10,'Ali Akbar','akbarcpi2014@gmail.com',NULL,'$2y$10$kk5sCrVR0aDf48.JFHzJ5exH9uRaUSyGF8Dl5fgLG47bNsMCMVBMa',1,1,NULL,'2023-05-28 11:36:33','2023-05-28 11:36:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
