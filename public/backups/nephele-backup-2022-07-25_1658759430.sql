-- MySQL dump 10.13  Distrib 5.6.51, for Linux (x86_64)
--
-- Host: localhost    Database: nephele_datebase
-- ------------------------------------------------------
-- Server version	5.6.51

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'superadmin','superadmin@nephele.com',NULL,'$2y$10$XzY1ppjV/XFrKE2xsaB2sOf/Yt3yuye4ICyScUMCeZ8tYOKHYIO42',NULL,1,NULL,'2022-04-16 20:21:00','2022-04-16 20:21:00');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backups`
--

DROP TABLE IF EXISTS `backups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backups`
--

LOCK TABLES `backups` WRITE;
/*!40000 ALTER TABLE `backups` DISABLE KEYS */;
INSERT INTO `backups` VALUES (1,'elshotby-backup-2022-06-15_1655323592','2022-06-15 18:06:32','2022-06-15 18:06:32'),(2,'elshotby-backup-2022-06-15_1655323677','2022-06-15 18:07:57','2022-06-15 18:07:57'),(3,'nephele-backup-2022-07-25_1658759430','2022-07-25 12:30:30','2022-07-25 12:30:30');
/*!40000 ALTER TABLE `backups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_storages`
--

DROP TABLE IF EXISTS `cart_storages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_storages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartData` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_storages_user_id_foreign` (`user_id`),
  KEY `cart_storages_session_key_index` (`session_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_storages`
--

LOCK TABLES `cart_storages` WRITE;
/*!40000 ALTER TABLE `cart_storages` DISABLE KEYS */;
INSERT INTO `cart_storages` VALUES (1,'SAR_16526589401617','{\"20\":{\"id\":20,\"name\":\"p[[[[[\",\"description\":\"<p>asasa<\\/p>\",\"price\":130,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/19\\/16518030498895_2022_05_06.jpeg\",\"attributes\":{\"size\":\"xl\",\"color\":\"blue\"}}}',NULL,'2022-05-15 21:55:40','2022-05-15 21:55:40'),(2,'SAR_16527879845553','{\"14\":{\"id\":14,\"name\":\"\\u0628\\u0633\\u0634\",\"description\":\"<p>\\u0624\\u0633\\u0634<\\/p>\",\"price\":200,\"quantity\":\"3\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/10\\/1650575415443_2022_04_21.jpeg\",\"attributes\":{\"size\":\"sm\",\"color\":\"blue\"}}}',NULL,'2022-05-17 09:46:24','2022-05-17 09:46:24'),(3,'SAR_16542289652544','{\"14\":{\"id\":14,\"name\":\"\\u0628\\u0633\\u0634\",\"description\":\"<p>\\u0624\\u0633\\u0634<\\/p>\",\"price\":200,\"quantity\":\"2\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/10\\/1650575415443_2022_04_21.jpeg\",\"attributes\":{\"size\":\"sm\",\"color\":\"blue\"}}}',NULL,'2022-06-03 02:02:45','2022-06-03 02:02:45'),(4,'SAR_16550027914417','{\"21\":{\"id\":21,\"name\":\"\\u062d\\u062c\\u0631 \\u0646\\u0631\\u062f \\u0627\\u0632\\u0631\\u0642\",\"description\":\"\",\"price\":2500,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/22\\/16518105297027_2022_05_06.jpeg\",\"attributes\":{\"size\":null,\"color\":null}}}',NULL,'2022-06-12 00:59:51','2022-06-12 00:59:51'),(5,'SAR_16550173718404','{\"22\":{\"id\":22,\"name\":\"\\u0627\\u0633\\u0627\\u0648\\u0631\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u062a\\u0647 \\u0644\\u062a\\u062c\\u0631\\u0628\\u0647 \\u0641\\u0642\\u0637&nbsp; \\u060c&nbsp;<span style=\\\"letter-spacing: normal;\\\">\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u062a\\u0647 \\u0644\\u062a\\u062c\\u0631\\u0628\\u0647 \\u0641\\u0642\\u0637&nbsp; .<\\/span>\",\"price\":100,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/34\\/16547566561852_2022_06_09.png\",\"attributes\":{\"size\":null,\"color\":null}}}',NULL,'2022-06-12 05:02:51','2022-06-12 05:02:51'),(8,'SAR_16550557441930','{\"22\":{\"id\":22,\"name\":\"\\u0627\\u0633\\u0627\\u0648\\u0631\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u062a\\u0647 \\u0644\\u062a\\u062c\\u0631\\u0628\\u0647 \\u0641\\u0642\\u0637&nbsp; \\u060c&nbsp;<span style=\\\"letter-spacing: normal;\\\">\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u062a\\u0647 \\u0644\\u062a\\u062c\\u0631\\u0628\\u0647 \\u0641\\u0642\\u0637&nbsp; .<\\/span>\",\"price\":100,\"quantity\":3,\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/34\\/16547566561852_2022_06_09.png\",\"attributes\":{\"size\":null,\"color\":null}},\"21\":{\"id\":21,\"name\":\"\\u062d\\u062c\\u0631 \\u0646\\u0631\\u062f \\u0627\\u0632\\u0631\\u0642\",\"description\":\"\",\"price\":2500,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/22\\/16518105297027_2022_05_06.jpeg\",\"attributes\":{\"size\":null,\"color\":null}},\"17\":{\"id\":17,\"name\":\"\\u0633\\u0644\\u0633\\u0644\\u0647 \\u062f\\u0647\\u0628 \\u062e\\u0627\\u0644\\u0635\",\"description\":\"\\u0633\\u0644\\u0633\\u0644\\u0647 \\u0645\\u0635\\u0646\\u0648\\u0639\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0630\\u0647\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0644\\u0635 \\u0628\\u0627\\u0644\\u0625\\u0636\\u0627\\u0641\\u0647 \\u0627\\u0644\\u0649 \\u062d\\u062c\\u0631 \\u0646\\u0627\\u062f\\u0631\",\"price\":0,\"quantity\":\"2\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/13\\/16505919555453_2022_04_22.jpeg\",\"attributes\":{\"size\":\"xl\",\"color\":\"blue\"}},\"14\":{\"id\":14,\"name\":\"\\u0628\\u0633\\u0634\",\"description\":\"<p>\\u0624\\u0633\\u0634<\\/p>\",\"price\":0,\"quantity\":\"2\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/10\\/1650575415443_2022_04_21.jpeg\",\"attributes\":{\"size\":\"sm\",\"color\":\"blue\"}}}',8,'2022-06-12 15:42:24','2022-06-12 15:50:56'),(9,'SAR_16550496466222','{\"24\":{\"id\":24,\"name\":\"\\u0634\\u0646\\u0637\\u0647 \\u064a\\u062f\",\"description\":\"<p>\\u0634\\u0646\\u0637\\u0647 \\u064a\\u062f<img src=\\\"data:image\\/jpeg;base64,\\/9j\\/4AAQSkZJRgABAQAAAQABAAD\\/2wCEAAoHCBUVFRgVFRUYGBgaGBoZGhgYHBkaGBoYGhgaGh0cHBgcIS4lHB4sHxkaJjgmKy8xNTU1HCQ7QDs0Py40NTEBDAwMEA8QHhISHDErJCs0NDQ0MTQ0NDQ0MTQxNDQ0NDQ0NDQ0NDQ0NDE0NDQ0NDQ0NDQ0NDQxNDQxNDQxMTQ0NP\\/AABEIAPsAyQMBIgACEQEDEQH\\/xAAcAAABBQEBAQAAAAAAAAAAAAAAAQIDBQYEBwj\\/xAA8EAABAwIEAwUHAgQGAwEAAAABAAIRAyESMUFRBGFxBQYigZETMkKhscHwUtFyguHxBxQjYpKiJLLCJf\\/EABkBAAMBAQEAAAAAAAAAAAAAAAABAgMEBf\\/EACURAAICAgEFAAIDAQAAAAAAAAABAhEDITESIkFRcTJhBBMzI\\/\\/aAAwDAQACEQMRAD8A9YlAKEqRQShCEACEJUACEIQAISpEAKkQhACoSJlR4AmUDEq1cIn5DMrmfTc7N7m7BpiP387J7G\\/G7y2aP3TX8XTGb2Dq4LNtPljS9CUeJc0hlTX3XjInZw+E\\/Vdsqr4ni2EBkhxeHQARENiTI2Lh5lPZXe1oPvAG83IbvPQfNClWrG42WSFBwtfG2Y1\\/Cp1dkNUCRKhMBEickQAJEqEAIhCEACRKo6rw0EmwAv8AX7JXQFd2x2iaeFrBLnTvYBUDOI4oHHhJkgw8mQL6\\/bmu3ggalRxdJg4hrPicB5ARCvTREZLCnO3Zrajqiv7K7Wc4htQgOMxpdsSJFrgg+quwsr2nwwY7FuDbIYhlfeB9FpOGfiY05yB9FeOTvpZM4qrRMlSIWpAIlEphcgAe5UPanauF5DfERYN0mMzvtC6+1uO9myR7xsP3hZjC7P6\\/n5dcmfJWkdGHHe2JXrVahlzyZvGnpkuGuwxhb7ziALxn5rtrOgEiOp+y5uyuHc\\/iMcgtYC7lJ8I62JK5dykdTpRZd9mcG1lfDn\\/pMDdoDjiM7lxBPkryPDYcx5Kqp04rY7jwObFozB+ys+HfYA7XjpddUXyjFrVh2bxzHEhpETplKtAsPW\\/8fiMY9wnC8bNcfC7nBPzWx4WpibfP7LXFLqVPwYZY9Lv2TpUiFsZAhCEACRCEAIgIQgAVX3ge0UXBxjFDfMmFaFUPeWoIYw5veAOok\\/YnyKzm6iyoK5C9gNs6cwQ2egkD5q6hcHZNOGAnM+ImIknWNFYIgqihydyZWdq0A5hkZX9EvYtQYS29jadl08S2RCrOynEVIiBDhl7wBznkplqSZS3Fl8ClTQlK2MhCVDUcpHFctcqWxpGa7Yql9bDo23n\\/AHUVQQP32tZMrGaz5vDj5QSf2U1RkiNxnz\\/AvNnttnfDSSOPisLWgnrytv8Am67+7XDktL\\/1ONr5Nt9ZVb2gwvYGtPjsB1Nh+c1rez+H9kxjAB4WwSInmepK0xRt\\/BTeiOu3xt2wkfnomcRxOBuI6gQMrwpuOEFrvyFTdpVCXNA0y6pzl02OK6kjm4txeTj1t0nkr7u5xOJgBPiAwO6tP3AlUPEDwzsfqju6XCvVIPgc+RH6g0A21HhzSwyakTmjcTdoQhegcIIRCEAIhCEAIhEoJQAjlmu8bpfRaR4Ze4nUFrDH1Wg4iu1gJcYA\\/IWd7Tqh9RhNgwvsLy4gQQ7SIPzWOV6o0xp3ZecF7jf4R9F0yslVqZy55BthDjECwtIErlfxWXjqDl7R3yM8lCzVqiv6r3Zf94O2afDMxvkzIaxvvOIEkDbqsp3e76UKvEkHGwHEAXYS0S7OWmw08gs93tbUqMY9jnudTe8lhc57sJDQXAOuYLRIG6pO6PZr6lbJzRfE9zXNYMRi5I5mwVpqSTM5dUXSPoAFKSo6YgAZwAN5gRnqnLQkHLk4hdTll+8L31Xt4ZjnNBGOo5pg4MmtBGU3nkApk6VlxVuiq48YeJcMsQD28yAGOg8i0FdFWrDQf7D+n5ZZvvF2U7hXMexxDC4Ai+FjzYOGwOR6ro4Xjy4WuPiYfhI16fT68E1TZ3QSaRddjgVOIDv0ieU6T6rXtbt+eSx3dyswVHOtJbAabE3vG61zHg3BH\\/105LXA107IzJ3obXbMg\\/36cgs\\/xT24+lup\\/IurDtrtJtNsAw85DYbn8us9w\\/ET7t+Z9Tn9VGaSbpFY01Ek7QrBgJPusBe49NPt1IXT3MxOoB7mgOeS4+ZJt6rKd5KxeGU2GWl4xkfEWgkDoDBO5A5Le92qOGhTEZMb9J+6MX5IrJH\\/AJmjYbBOUVE2Uq9BHnNUwQhImIEIQgBqa5yUlVXbHGYQGjM59FMpKKscVbo5OJ4o1HeEwBiAi4InPcZLOurPbULHOBLQXMdlijQ7GM42VnQOEOdOQifK\\/PdUntCQHYg7\\/UMHMYT57n5c1xSdnVFVosS6TbUA7xEbcvooahG867HXQjy1zTj8RcDa05A\\/uegCVzAN5B\\/SQJyEGIHSUijheIMgTAyjUkWJ8tlV8R3pp0XubNR7WvIJYQBijd0yREbSFa1XhoDjJAMATJmbiSJ0FpsvMO1aDmVHtdIklzZ+JpcSD+arTEk9MyytraR7N3Z7yMqtlhkAjGx1nMnUXIDc4ExnBWvY8EAjI9V4p3FY+m41jIYQGAZYgXAkwcwI+ZXrfZNWWkaDL7\\/MLWMql0mbTas7qr4BWf7BHtHVK5+N5Df4W+EfSfNd\\/eHiiyhUcMwwx1IgD1ITuw+F9nRYzZonrAlVLckgWov9ld3s7PFXh3sOojodD6wstw3Yjn02VKZwuLQeUjMcr2W\\/7VZNJ\\/T6XVT3ebDXs\\/S+R0ff64llKKc6fk0jJxjaMdW4aoz32EOGThlMWMhWNHtl5ZhxXyxAeL\\/kHfbVbh3DAqFnZlMfA30Ch\\/xpX2s0X8lV3Iw9Jge4hrS9xztJ8zdVfeHiatDBSa3C5zmN6YnAZan6L1SlwrGe60CdrSsH3ooB\\/F0G5zVYfJrg77FT\\/Qobk7Ljm6n0pGc7r0MXDMJMn2z5JuSC0fuvUey7MaBkAAAvPe4dHFw7f43fRi3\\/AADrROX5miP+jZeVdqiXdDJSrl4Ym3z0XUF2x4POmqYIhCSVQgQlQgCF5WX7RfiqO5W8gtNUWT4tsOcc\\/EQufNwa4jn7RrFlMkTMtNhObhin+XELbqtYAx5IgseJAn3TmfK0efNdvaLyHgxIiCJ6Ax0gH1XHw4DHYTAY\\/QiYdBIj\\/bnZc7OgsKTMTsUZNdOpBdBI65eUJgbABkEEOyEG5nfyRSDmuOAgifECbXv+dU6nUZIFsUuDZLizA0mLxGPLbJJActemCbiJtMZSLeXPmPLkp04cC8Mdhg4SA5pBsQMXWZ891aPZq5snIwdgL+hH4VxgeKYkTmNMrG2dynxtASMptA3ORiScjrrmfLotD3aqEh4PwwJ3gAT9VSBgi72jMfPnoVad3ne+7n6q4PuREl2kveF+N1Kl+uq2R\\/tp\\/wCof\\/Qeq0NJsABZbhn+1446tpMj+aoZP\\/Vv\\/ZatoXRDbbMZaSRFxLJY4clQ9kHBVj9bS3+ZpxD5Fy0dRtlm6\\/geHfoe13lMH5EqMupKRWLcWjSAJQENCdC6DEjeLLG8Twxdx9HZoJy3D1sauSy9F7Tx4Zq1k\\/8AQfusM3hfs3xOrf6Kf\\/Dvgx7KtTuHUqzmHyEZfyrUVOHexrnAgwCRnmBqFV916TaXEcWJAD3l9zrjdl\\/yWneA4bqYxi1f0rJOSlRn\\/wDD7tl\\/E8O51SMYeZAsAHQWgchktWvNf8OK2CrXp\\/prupn\\/AJPwH1YR5r0oLWDbWzLKqegQhC0MwRKISIAgqLP9q8JfHzvbQn8C0Dlx1okB2TvCspxtFxdMx\\/aVMl4cJBF5M3kGW9CLeqGmGtxNBE3MXAJIk7wfy6n4unL3NIu10X0wiQQcgSMLvNRBkEg5bycMmLTuY6el+V60dN2NoiDa0+HQHf5Z8lM0jAWAERrzjMRlckpCwjITytMetgnUXHEQcW5IwxblMj5pDFAgwCcLiOedyb8h8+i5hJk3EktLc4OUibSLG+oU5IgDn4QTJwzNwMkxpDibQHGWuGRJ3G0nXa8aKxEgb4ZYQYHQxGo6gaKx7MGCmSban86R6quwYnBhE4b2yjrmdLLq7eqmnwzh8REfzOt9\\/ktY836Jk\\/BJ3IZja+sc6j3O\\/lHhb8gtaFU93OF9nQYzZrR5gX+ZVst8a0YZH3A\\/JUXHU\\/E4bhXrlVcd7wSyq4jxOpHZ2c\\/FTYTnhg9RY\\/RdaruyXeFzdnH0N13q4O4pkSVSZFxGRWG4Wv8A\\/p13fpZ\\/8sEeq23Emx6Lzfg3k9pcSNhhPU4P2WeXlfTbF+L+FtwtUDiKpfecUNBIl7iyBbLVdvEMfTaxwkjF48y4A\\/pnIZwuPh+G\\/wDPe34QZ88DR9ytLx9LExw3acvUfRZYo3F\\/WVldSXxGV7JNF1Xim0wGVSWyWiGuewipSeW6EyAfNbrhqwexrhk5oMbSMvLJeWcDT\\/8A0ngH3+HFS2uEBpB\\/lBXoXdzicdMtObHlp8\\/F+61xy3TM8sdWWyVIiVuZCoSIhKwoqqnFua+Hi0xI23+xCdxDZBEnqD8wp69IHMZZKnrMex+JpkHNmhF7s2P7LJ2i7TOLtJha9pdGJ0Am8OIEZblu0bZJgIhxdprIIga2yz2+yn7wUxU4Z7myCwYxoRhIJnYxfyS03sq0GVRchgdb3pAg5X36rKUdsuM\\/Byuolx\\/a3P0vn9UjqThfSRBjXbO1sl00eBJAc0hwItpA2j7KV\\/BPIi4M52M8rqOl+jTqXsqOJpuYLfDB0sdRpM809pBxEWZvoBAkjF129V3v7Nfo3EIEiQL3yv09VP2b2IWxjAa0GcAMkndx553KFCTfAOaSHdl8JbGRA0BiTzP2XF26zG+lT0L8R6N\\/utNUFlmeJf8A673RPs6dh\\/ueTA+i0yLpjSM4y6nZpWVWsYC4xZVvE9p1HGGQwGwxGHH9lHRD3vDbTbGcw1se63mVcs4VoEQFqrktEOk7M07iKuYqjoC43\\/5KCp2s9r6bKubjAccjNrO1PI3Wqq8Iw5tB8h+yznbvZgwHDlnhMkAtuHAaERoonFpFRasuOzqkPcNx9FZ4lRcGXEseAYi+liNlaBzjkPVPE+0WRd2hOJfZeb9lVgO1OLaYvUp6gWkHJelDhCfeMBc7Ow+GD3VBRbjcZc\\/CMTiNSd7JyVhGVJoqacDjXExmc\\/4BCuarxyVDwz8PGua5pcMTrmCAcIj0kLVGkzVoPoVOPaf0rLyvh5twFL\\/z6Tx7p4biGZ2s0kR5fRaPu9UwcQ9hyqMDwOYJ+0q54jgaTWue2kwOwnxBoBhwh1xe4Wd7JJPHuvIbLWz+nBOet3KZdrRUakn8NmhMDk4FdNmAqJQhMCNwVB3gdxLGl9FjKrdWEllQReWOFndCJ5lX7nDKQkcFLViZ4\\/U7yPe9tFzsL3nCysPCHB5wmnXp5Ez4ZV\\/3cqF3Dscyz6TnU6rORdIkb7dCurvt3SZWY+tSbhrDxnBm8tvijV4z3MReVluE7wu4dxqYQ5lQMNdmoqNBa+Nrua4HIhzvLJrwyU3F2z0jsj3I0kx0JJ\\/p5KxYASRqFlO6\\/bLKjnjGPeL2HIupu8TXAcvE07Fq0PZvHsrNZWYfC6W3N7EjQ7hVHguywaxOITpTXFai5ObiHWWb4aC97jfHWwj+GmwD\\/wBpWg4p0ArNl4Y+k3cOd5vJzC5sz2jbGtNlz3aafZlzs3Oc6epJ+kK6JWb7v9qMDHMmSxzxhb4iA1xzj3TlYq3d2i2Jwv6YTOU5LWMkkZtM6nuVZxr7fNMq9sM\\/S\\/yY7blnPJU3avbtNrCQTiNmggiScs\\/yymU0\\/JUYs0fDVQ5oIysQeULsY78yWM7o9sNq+0p4vFTcBJJJLXCQQORkei1rD+H9kot0EkdLXT\\/VAHmmN\\/Nk6VoQUdDgHt4t1SDgIN5tdgGU7jZXkgpAR\\/YJIH9goSUeCm3Ic4rMdk03\\/wCbqEiG\\/wCpEtI1YBB2IBK0sSgolHqocZdKaCfwJJ\\/Mik\\/NlE939jl0lNslInpPkxt8uRUqipNgc0+VpHgDO8ZUrUXeNpqUtHC72Tz1HXRd\\/B9pMfADsQPk4ciDf0Vg5s5qn7Q7CpPEgNY6ZBFr8tvJZtNbEW9lhe8\\/dBlQv4ikSPaNIc0e7iOT+QtDuoOhmwrdo1+EGKoDVYCMR911MT72zmxrpquPgW8M6q+lVxOecT6Ti+qA+m6XYGtDw0OblEXEG90OSZMvTM1xHAOZRHEhhpVKZdTrMFmzMYwNA4EHY4pVt3G7S9hSfw1Vwa+nVAa1xAL2vLbt3sTkuPju0WUnxiqPDxhqcPxDXkvpOdAcxxEusTDJMwQ0iYTu8nZBLKVal430miHWJqUCAPezJaIdvAOqXAJVs9H4mt4SWnY+U\\/snvqLJ9gdse0pupvMPZ4XA2vo7oV28T7aq9zGuDGNIa55AJOROC\\/USm5Uhx2HaXa7S8UmeJziGujJoMiSfJPrdlsfUD3SXABrdm6TAzz1T28GxgYxjYGMEuJxEnC+XS7WVM9zpIAuAYJyysZ1IIEjosHbezdajodTa0RhYLk5C+pInWwTHvy0ytMXmw88uUJr\\/ABAz7uE2BLYAwjqDi3ygp9OmP0gHciYPnMWvzlUBA9wOTgegzOdhNrZbZrk4lhcD4RF7RMwbQNtzzXY+iw\\/CLDpA2MRaDJ5SoK3DkZOINoBva413EQOUrOSGmZjgKTeG4k1WggPEPib+K1zrn5Lf8NWnUesmc1kO06DiRItNw3+ab5A3HqrPu3xeJpYfeYY93NsWMqYTkpNMqUU42jSsP5qplBTIt97rob+SutHOxUkIlJbkmIPVJPRBIznkkcDogYpHXyuomNkzaPr5bpTP5YqVghCVhdDkIQtBCEKOpTDhDhIUqQqQK9\\/CRYEluWF1x67FZHvH2GQ0YWH2QIePZx7Wg8H3mA+8zUt9FunBVHbPC1DTf7Aw8gw0gOY7k5pj1BBUOIPaMV2tRbxXCFjgwvZam+Rge6JIGrZzAOUxoq\\/\\/AA57cd7T\\/KVHEQHeyxbC7qZn4hmJ0BXbULaJjiaDmOqQDgdDHkGZAMyeYvBPlje2aGCtjoueHl7TSfcHGSMIOzhlOvQpRfhmTezdcH2I9\\/H1nSW0WuaSR8eJvuC9oIkxOa2riANgPOMj1sZXL2fQcyk0PdieYNRwDRLyPEfDl\\/RTObJgiQLkbnUbgjONZUSezeMaQ2o8uIv4Q7ITNgZJtlcEJ4cIOV7XkA62PlqlLQJkkzYayYiw5gj0UZxQS48oizZbaRrebpF3qhTXyw2G5B1EgWuDiIzEFIWuHxm8WaBHhMm3Ww6p1QgTf9VhckNcTmOiQ1MxhO2IxkNehBk+SBAwHc5kwQNBl0E5qN9RwF\\/FzEXLiBrzmTzEKQvd+nXIGTY5XzOH+qia8E4bh1vDrYGxI960ZRmpGkcvEMBy+Ei21vKPqqt3DupvNRogzdswCA0i5MkiYFgrx7LyLE\\/yyR5zER6KNgDrXBI1gG+8Xg9dFDjuy1KlRNwnazSLy0wLQ6PJxAtNl3Djm\\/hkqkdQDDi8IaQcUi8gkzJdYX+Sl\\/y4lpAFoIN4LZudRlPqrUpIlpFszj2HWOsJ7eKlNotBFl0tYtUn7IbRAas7pzQ85C3P+i6WtT4VKP7FYxjIzP3hSykhCtIkVCREqgFKQpUFAEZC5OMxx4C3Fu6SBzgZ+q7CoqilgjB9t9icXVIYOJa4Ey4PEsEXBbTFjBi8zbyXH2H3Nq0uJbVqVmVGMxPhogyR4QWuEYROKRq0LY1nEVdLtbE3BMkXA6j1QHkmToBeQfj1tAyyWF0V0LknfU3gGNYzOQM5iU1hjSIyyzGk21kdCEx5sP4if7g2idMxonVfdnKbSbgTa4GYjJIoWA6+mgmYzBdG\\/JI61oucjoBmL5xn6hOY2AL5R5CLDyynIhMa8eJ2pgcwI8IyuRn0ISYDQwiYmTN4veDI3uTbqnve0SJJzsATZxJm2lvKISVXwYyGZAdrpBi1xttdOdAAOWlxeCB9zPNMbGMcDoWk4gJOUzeRaTEznDkPAcIOWesxFiALnPMp7I1IORjMGAZjzGZ3UFRuG4Mics7yTrtA8pQMQgiZBiDcBwkZZDWybWBa7FOUNMlw8MSDJHSVI+7ZiwM3AgQbzGsXytKeCCI093MkbwYkE5ypoLInmW5Qcr4c8wbjqjh32MzIM7+uHbaCLJaE4SL2g9YN7D+qjYfE5vnERY7EWHTM3QAj+HeXl7KmG3uGC22si4\\/pyK7eyXVZc2o5rr+EgEECLgz\\/AFsQuei\\/xRvfUXIOseI6QYyuuvs9hL3O0gCNQ4TOXkqjyiXwyzanJAhdBmBSpJSSqAVEpEIAfCREoQAiiepSonpMCp48gOZMXMX8rjfon0mmcouIzEnDoSbjkfqm9pN8OcbxnEac0cORJA1vYkggtnN2eUxp5rml+Rp4B7Yc236sgc\\/DlOSH\\/Df4jlYmx+uoSueLEXEOG2xyPTdJUMDo4EgXMZ5H8CCgxZxcx5i05HTlBzSUoMZCbbggDKTnnrcJzRHOJBH9zYTCgiCZucyIF2xa0iBFr7FJgODIN5IxzpYbyPVNqOc50XaAQQZgFpBkRvO+3kpMVzsbyY8ovbKf7plSniIJziLai5vpnESdSkAntMjMTAyibx85+alrNBHMze822GRz0UbyRlN7GLtDb36bplV\\/gvnsCBc2i5kEDIyJBQJErHywGBeYiTFtHG863RRPhm4MtBklsGcpyn5XQ2zQJ3zImMrwSIm2dkrBbLUDMzFz8ViP9qBiUhc2zk5D0A1+qja7xuH8EGNMNxO+efkil8etusjqLx9ElIHG85xY2Og1OROV9J6oAcwy4R4hGUl1ptJ\\/TbM5mAV38B7zrWyne51XGw7yYBMuj6b\\/ANV39mtOEk6n5AACOUBXDkmXB2oQhdJmCEJCpAEiJQgCSUiEKgEKjcpITHBJgcXFMkEfW48wubh7Ta\\/OchbM8o9V31Aqt8tkATBnnhviuRGU6rCap2XEmrGx1iLRJg7c4n8CjbEZCDbUTbkbAhPp9NxbCBFj8Nzn9VBxTMBJiGn0aNdbWyUP2UiVh0NoEGQBbQ3z5pXgHxDeJFgRbMkX1K53Om+WmIA2FxBO2cjUp7KsO8RIcYE7yCRESZvB8krGNa8ixEQLg9Rlk0C0zeye59zabCDfnNpyuPTROwiIOVt7CRMxkTlCRjBNomeZk\\/FI1i3qgCMOII0gmMpgR5i056bplESPECABEG9myLyLmLwVJggWBzgTtijPURIO4CHPk4c7kxBgAHSc7OHqkAlZ2QBi4mMMAAWi1pBvbNSVCGttYW0wgzZo5cjoeSjFODMkmMhnAvm3kT1TXvxEgXM3N4MxaMriLA2lPgB9KzBExaM5tfyP9tlFwbXEF5BGI\\/7iIPI7Xy0KTiHggBpF7DOw1uPIi+if7LC0ZCxmBABjOAdjlsSpGSMABcfKM5Olj9tFc8OyGgbD5qs4ChiLSb4fFniiRA55TnlKtwVvjXkzk\\/AsolEpCVqQBKSUspCUACEkon8ugCRCRCoAKaUsoKkCN4VfxlOPGBJbpfxDb5qxIUT2KZRtDTKyhUjwgkXOEui9h4QLZDfbVdmGxEW53B+W+wXFW4fA4n4DFpuDy55QnNrlsSZAsH7CIhzhkQVjdaZZz8TQLCYBcyZEZt3kmdXWiTdDagP3EeKDcjebETZd7Xg7ZSMvdMZnIC2iY\\/hmEzEHcW+LP+uqmvQ7OfIAzA15ROXnARgINnRpzzt9R18k\\/wDyzhAD7DQgE2G+u3K2qa+m+3hDrjK2U5+R6y5FDBmknOPofuD5FAeGiYAiDBtBBbrvmJUbeHeRBceUDMRcnpEEbdUr6TTdxMnnoTjj5ehRsWhjwXEhvrvmL2vpYaQpbNBGVrmd+cTqDfJIXYSBYDUaxO50z+abSaSACCLRFzOGAZM\\/VIaGcO3xF5BAOQmRdpkQRBkiR1U2EkwLkwbzNvdxR\\/ttPJOdbKMh+nSd+ui7OA4UgBzoLoFwNhnfLkqjG9BJ0dPC0sLYOeqnCaEq6UqVGTFSEoJSFAgJSEoQUAEpEkolIZJKVNCVMQqCkQgBE0hOQgCJ7JsuOpwhBlkfwnLXXTNWBTCpcUxplT7PCcsFt5FspOuZT2vdtnGWfUzb52XdUuI\\/MiqzjfC4gWECyxcaNE7HuqSBMiYORkHFa2sR5m6cyu0j3gLb6XF+k36hMc8mb\\/p+ZhObkeQJ9ClYCCqYI1gt3uBEbWbCa5752HPONSByAAvuioYdAykW6yVG24HUHzIclYwEA3k2EwIF3SSPpnun06bnyAJvJNgMWKSevqn8BRa65EmPLM6ZK2FlcY2JuiDh+FDQMUOI5WB3A3XShyFskkZ2KhIEhTAWUhKRCAFJTShNKQCoSJEAf\\/\\/Z\\\" style=\\\"width: 201px;\\\" data-filename=\\\"images.jpg\\\"><br><\\/p>\",\"price\":195,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/38\\/16551444113796_2022_06_13.jpg\",\"attributes\":{\"size\":\"one size\",\"color\":\"\\u0628\\u0646\\u064a\"}},\"21\":{\"id\":21,\"name\":\"\\u062d\\u062c\\u0631 \\u0646\\u0631\\u062f \\u0627\\u0632\\u0631\\u0642\",\"description\":\"\",\"price\":2500,\"quantity\":2,\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/22\\/16518105297027_2022_05_06.jpeg\",\"attributes\":{\"size\":null,\"color\":null}}}',4,'2022-06-15 18:44:19','2022-06-15 18:49:39'),(10,'SAR_16567813789147','{\"20\":{\"id\":20,\"name\":\"p[[[[[\",\"description\":\"<p>asasa<\\/p>\",\"price\":130,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/19\\/16518030498895_2022_05_06.jpeg\",\"attributes\":{\"color\":\"blue\"}}}',3,'2022-07-02 15:02:58','2022-07-02 15:05:46'),(11,'SAR_16567814819294','{\"22\":{\"id\":22,\"name\":\"\\u0627\\u0633\\u0627\\u0648\\u0631\",\"description\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u062a\\u0647 \\u0644\\u062a\\u062c\\u0631\\u0628\\u0647 \\u0641\\u0642\\u0637&nbsp; \\u060c&nbsp;<span style=\\\"letter-spacing: normal;\\\">\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u062a\\u0645 \\u0625\\u0636\\u0627\\u0641\\u062a\\u0647 \\u0644\\u062a\\u062c\\u0631\\u0628\\u0647 \\u0641\\u0642\\u0637&nbsp; .<\\/span>\",\"price\":100,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/34\\/16547566561852_2022_06_09.png\",\"attributes\":{\"color\":null}}}',NULL,'2022-07-02 15:04:41','2022-07-02 15:04:41'),(12,'SAR_16570559608087','{\"18\":{\"id\":18,\"name\":\"p[[[[[\",\"description\":\"<p>asasa<\\/p>\",\"price\":180,\"quantity\":2,\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/19\\/16518030498895_2022_05_06.jpeg\",\"attributes\":{\"color\":null}}}',NULL,'2022-07-05 19:19:21','2022-07-05 19:19:36'),(14,'SAR_16572420646578','{\"19\":{\"id\":19,\"name\":\"p[[[[[\",\"description\":\"<p>asasa<\\/p>\",\"price\":150,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/19\\/16518030498895_2022_05_06.jpeg\",\"attributes\":{\"color\":\"blue\"}},\"21\":{\"id\":21,\"name\":\"\\u062d\\u062c\\u0631 \\u0646\\u0631\\u062f \\u0627\\u0632\\u0631\\u0642\",\"description\":\"\",\"price\":2500,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/22\\/16518105297027_2022_05_06.jpeg\",\"attributes\":{\"color\":null}}}',NULL,'2022-07-07 23:01:04','2022-07-07 23:01:27'),(15,'SAR_16579757996332','{\"25\":{\"id\":25,\"name\":\"\\u0634\\u0646\\u0637\\u0647 \\u064a\\u062f\",\"description\":\"<p>\\u0634\\u0646\\u0637\\u0647 \\u064a\\u062f<img src=\\\"data:image\\/jpeg;base64,\\/9j\\/4AAQSkZJRgABAQAAAQABAAD\\/2wCEAAoHCBUVFRgVFRUYGBgaGBoZGhgYHBkaGBoYGhgaGh0cHBgcIS4lHB4sHxkaJjgmKy8xNTU1HCQ7QDs0Py40NTEBDAwMEA8QHhISHDErJCs0NDQ0MTQ0NDQ0MTQxNDQ0NDQ0NDQ0NDQ0NDE0NDQ0NDQ0NDQ0NDQxNDQxNDQxMTQ0NP\\/AABEIAPsAyQMBIgACEQEDEQH\\/xAAcAAABBQEBAQAAAAAAAAAAAAAAAQIDBQYEBwj\\/xAA8EAABAwIEAwUHAgQGAwEAAAABAAIRAyESMUFRBGFxBQYigZETMkKhscHwUtFyguHxBxQjYpKiJLLCJf\\/EABkBAAMBAQEAAAAAAAAAAAAAAAABAgMEBf\\/EACURAAICAgEFAAIDAQAAAAAAAAABAhEDITESIkFRcTJhBBMzI\\/\\/aAAwDAQACEQMRAD8A9YlAKEqRQShCEACEJUACEIQAISpEAKkQhACoSJlR4AmUDEq1cIn5DMrmfTc7N7m7BpiP387J7G\\/G7y2aP3TX8XTGb2Dq4LNtPljS9CUeJc0hlTX3XjInZw+E\\/Vdsqr4ni2EBkhxeHQARENiTI2Lh5lPZXe1oPvAG83IbvPQfNClWrG42WSFBwtfG2Y1\\/Cp1dkNUCRKhMBEickQAJEqEAIhCEACRKo6rw0EmwAv8AX7JXQFd2x2iaeFrBLnTvYBUDOI4oHHhJkgw8mQL6\\/bmu3ggalRxdJg4hrPicB5ARCvTREZLCnO3Zrajqiv7K7Wc4htQgOMxpdsSJFrgg+quwsr2nwwY7FuDbIYhlfeB9FpOGfiY05yB9FeOTvpZM4qrRMlSIWpAIlEphcgAe5UPanauF5DfERYN0mMzvtC6+1uO9myR7xsP3hZjC7P6\\/n5dcmfJWkdGHHe2JXrVahlzyZvGnpkuGuwxhb7ziALxn5rtrOgEiOp+y5uyuHc\\/iMcgtYC7lJ8I62JK5dykdTpRZd9mcG1lfDn\\/pMDdoDjiM7lxBPkryPDYcx5Kqp04rY7jwObFozB+ys+HfYA7XjpddUXyjFrVh2bxzHEhpETplKtAsPW\\/8fiMY9wnC8bNcfC7nBPzWx4WpibfP7LXFLqVPwYZY9Lv2TpUiFsZAhCEACRCEAIgIQgAVX3ge0UXBxjFDfMmFaFUPeWoIYw5veAOok\\/YnyKzm6iyoK5C9gNs6cwQ2egkD5q6hcHZNOGAnM+ImIknWNFYIgqihydyZWdq0A5hkZX9EvYtQYS29jadl08S2RCrOynEVIiBDhl7wBznkplqSZS3Fl8ClTQlK2MhCVDUcpHFctcqWxpGa7Yql9bDo23n\\/AHUVQQP32tZMrGaz5vDj5QSf2U1RkiNxnz\\/AvNnttnfDSSOPisLWgnrytv8Am67+7XDktL\\/1ONr5Nt9ZVb2gwvYGtPjsB1Nh+c1rez+H9kxjAB4WwSInmepK0xRt\\/BTeiOu3xt2wkfnomcRxOBuI6gQMrwpuOEFrvyFTdpVCXNA0y6pzl02OK6kjm4txeTj1t0nkr7u5xOJgBPiAwO6tP3AlUPEDwzsfqju6XCvVIPgc+RH6g0A21HhzSwyakTmjcTdoQhegcIIRCEAIhCEAIhEoJQAjlmu8bpfRaR4Ze4nUFrDH1Wg4iu1gJcYA\\/IWd7Tqh9RhNgwvsLy4gQQ7SIPzWOV6o0xp3ZecF7jf4R9F0yslVqZy55BthDjECwtIErlfxWXjqDl7R3yM8lCzVqiv6r3Zf94O2afDMxvkzIaxvvOIEkDbqsp3e76UKvEkHGwHEAXYS0S7OWmw08gs93tbUqMY9jnudTe8lhc57sJDQXAOuYLRIG6pO6PZr6lbJzRfE9zXNYMRi5I5mwVpqSTM5dUXSPoAFKSo6YgAZwAN5gRnqnLQkHLk4hdTll+8L31Xt4ZjnNBGOo5pg4MmtBGU3nkApk6VlxVuiq48YeJcMsQD28yAGOg8i0FdFWrDQf7D+n5ZZvvF2U7hXMexxDC4Ai+FjzYOGwOR6ro4Xjy4WuPiYfhI16fT68E1TZ3QSaRddjgVOIDv0ieU6T6rXtbt+eSx3dyswVHOtJbAabE3vG61zHg3BH\\/105LXA107IzJ3obXbMg\\/36cgs\\/xT24+lup\\/IurDtrtJtNsAw85DYbn8us9w\\/ET7t+Z9Tn9VGaSbpFY01Ek7QrBgJPusBe49NPt1IXT3MxOoB7mgOeS4+ZJt6rKd5KxeGU2GWl4xkfEWgkDoDBO5A5Le92qOGhTEZMb9J+6MX5IrJH\\/AJmjYbBOUVE2Uq9BHnNUwQhImIEIQgBqa5yUlVXbHGYQGjM59FMpKKscVbo5OJ4o1HeEwBiAi4InPcZLOurPbULHOBLQXMdlijQ7GM42VnQOEOdOQifK\\/PdUntCQHYg7\\/UMHMYT57n5c1xSdnVFVosS6TbUA7xEbcvooahG867HXQjy1zTj8RcDa05A\\/uegCVzAN5B\\/SQJyEGIHSUijheIMgTAyjUkWJ8tlV8R3pp0XubNR7WvIJYQBijd0yREbSFa1XhoDjJAMATJmbiSJ0FpsvMO1aDmVHtdIklzZ+JpcSD+arTEk9MyytraR7N3Z7yMqtlhkAjGx1nMnUXIDc4ExnBWvY8EAjI9V4p3FY+m41jIYQGAZYgXAkwcwI+ZXrfZNWWkaDL7\\/MLWMql0mbTas7qr4BWf7BHtHVK5+N5Df4W+EfSfNd\\/eHiiyhUcMwwx1IgD1ITuw+F9nRYzZonrAlVLckgWov9ld3s7PFXh3sOojodD6wstw3Yjn02VKZwuLQeUjMcr2W\\/7VZNJ\\/T6XVT3ebDXs\\/S+R0ff64llKKc6fk0jJxjaMdW4aoz32EOGThlMWMhWNHtl5ZhxXyxAeL\\/kHfbVbh3DAqFnZlMfA30Ch\\/xpX2s0X8lV3Iw9Jge4hrS9xztJ8zdVfeHiatDBSa3C5zmN6YnAZan6L1SlwrGe60CdrSsH3ooB\\/F0G5zVYfJrg77FT\\/Qobk7Ljm6n0pGc7r0MXDMJMn2z5JuSC0fuvUey7MaBkAAAvPe4dHFw7f43fRi3\\/AADrROX5miP+jZeVdqiXdDJSrl4Ym3z0XUF2x4POmqYIhCSVQgQlQgCF5WX7RfiqO5W8gtNUWT4tsOcc\\/EQufNwa4jn7RrFlMkTMtNhObhin+XELbqtYAx5IgseJAn3TmfK0efNdvaLyHgxIiCJ6Ax0gH1XHw4DHYTAY\\/QiYdBIj\\/bnZc7OgsKTMTsUZNdOpBdBI65eUJgbABkEEOyEG5nfyRSDmuOAgifECbXv+dU6nUZIFsUuDZLizA0mLxGPLbJJActemCbiJtMZSLeXPmPLkp04cC8Mdhg4SA5pBsQMXWZ891aPZq5snIwdgL+hH4VxgeKYkTmNMrG2dynxtASMptA3ORiScjrrmfLotD3aqEh4PwwJ3gAT9VSBgi72jMfPnoVad3ne+7n6q4PuREl2kveF+N1Kl+uq2R\\/tp\\/wCof\\/Qeq0NJsABZbhn+1446tpMj+aoZP\\/Vv\\/ZatoXRDbbMZaSRFxLJY4clQ9kHBVj9bS3+ZpxD5Fy0dRtlm6\\/geHfoe13lMH5EqMupKRWLcWjSAJQENCdC6DEjeLLG8Twxdx9HZoJy3D1sauSy9F7Tx4Zq1k\\/8AQfusM3hfs3xOrf6Kf\\/Dvgx7KtTuHUqzmHyEZfyrUVOHexrnAgwCRnmBqFV916TaXEcWJAD3l9zrjdl\\/yWneA4bqYxi1f0rJOSlRn\\/wDD7tl\\/E8O51SMYeZAsAHQWgchktWvNf8OK2CrXp\\/prupn\\/AJPwH1YR5r0oLWDbWzLKqegQhC0MwRKISIAgqLP9q8JfHzvbQn8C0Dlx1okB2TvCspxtFxdMx\\/aVMl4cJBF5M3kGW9CLeqGmGtxNBE3MXAJIk7wfy6n4unL3NIu10X0wiQQcgSMLvNRBkEg5bycMmLTuY6el+V60dN2NoiDa0+HQHf5Z8lM0jAWAERrzjMRlckpCwjITytMetgnUXHEQcW5IwxblMj5pDFAgwCcLiOedyb8h8+i5hJk3EktLc4OUibSLG+oU5IgDn4QTJwzNwMkxpDibQHGWuGRJ3G0nXa8aKxEgb4ZYQYHQxGo6gaKx7MGCmSban86R6quwYnBhE4b2yjrmdLLq7eqmnwzh8REfzOt9\\/ktY836Jk\\/BJ3IZja+sc6j3O\\/lHhb8gtaFU93OF9nQYzZrR5gX+ZVst8a0YZH3A\\/JUXHU\\/E4bhXrlVcd7wSyq4jxOpHZ2c\\/FTYTnhg9RY\\/RdaruyXeFzdnH0N13q4O4pkSVSZFxGRWG4Wv8A\\/p13fpZ\\/8sEeq23Emx6Lzfg3k9pcSNhhPU4P2WeXlfTbF+L+FtwtUDiKpfecUNBIl7iyBbLVdvEMfTaxwkjF48y4A\\/pnIZwuPh+G\\/wDPe34QZ88DR9ytLx9LExw3acvUfRZYo3F\\/WVldSXxGV7JNF1Xim0wGVSWyWiGuewipSeW6EyAfNbrhqwexrhk5oMbSMvLJeWcDT\\/8A0ngH3+HFS2uEBpB\\/lBXoXdzicdMtObHlp8\\/F+61xy3TM8sdWWyVIiVuZCoSIhKwoqqnFua+Hi0xI23+xCdxDZBEnqD8wp69IHMZZKnrMex+JpkHNmhF7s2P7LJ2i7TOLtJha9pdGJ0Am8OIEZblu0bZJgIhxdprIIga2yz2+yn7wUxU4Z7myCwYxoRhIJnYxfyS03sq0GVRchgdb3pAg5X36rKUdsuM\\/Byuolx\\/a3P0vn9UjqThfSRBjXbO1sl00eBJAc0hwItpA2j7KV\\/BPIi4M52M8rqOl+jTqXsqOJpuYLfDB0sdRpM809pBxEWZvoBAkjF129V3v7Nfo3EIEiQL3yv09VP2b2IWxjAa0GcAMkndx553KFCTfAOaSHdl8JbGRA0BiTzP2XF26zG+lT0L8R6N\\/utNUFlmeJf8A673RPs6dh\\/ueTA+i0yLpjSM4y6nZpWVWsYC4xZVvE9p1HGGQwGwxGHH9lHRD3vDbTbGcw1se63mVcs4VoEQFqrktEOk7M07iKuYqjoC43\\/5KCp2s9r6bKubjAccjNrO1PI3Wqq8Iw5tB8h+yznbvZgwHDlnhMkAtuHAaERoonFpFRasuOzqkPcNx9FZ4lRcGXEseAYi+liNlaBzjkPVPE+0WRd2hOJfZeb9lVgO1OLaYvUp6gWkHJelDhCfeMBc7Ow+GD3VBRbjcZc\\/CMTiNSd7JyVhGVJoqacDjXExmc\\/4BCuarxyVDwz8PGua5pcMTrmCAcIj0kLVGkzVoPoVOPaf0rLyvh5twFL\\/z6Tx7p4biGZ2s0kR5fRaPu9UwcQ9hyqMDwOYJ+0q54jgaTWue2kwOwnxBoBhwh1xe4Wd7JJPHuvIbLWz+nBOet3KZdrRUakn8NmhMDk4FdNmAqJQhMCNwVB3gdxLGl9FjKrdWEllQReWOFndCJ5lX7nDKQkcFLViZ4\\/U7yPe9tFzsL3nCysPCHB5wmnXp5Ez4ZV\\/3cqF3Dscyz6TnU6rORdIkb7dCurvt3SZWY+tSbhrDxnBm8tvijV4z3MReVluE7wu4dxqYQ5lQMNdmoqNBa+Nrua4HIhzvLJrwyU3F2z0jsj3I0kx0JJ\\/p5KxYASRqFlO6\\/bLKjnjGPeL2HIupu8TXAcvE07Fq0PZvHsrNZWYfC6W3N7EjQ7hVHguywaxOITpTXFai5ObiHWWb4aC97jfHWwj+GmwD\\/wBpWg4p0ArNl4Y+k3cOd5vJzC5sz2jbGtNlz3aafZlzs3Oc6epJ+kK6JWb7v9qMDHMmSxzxhb4iA1xzj3TlYq3d2i2Jwv6YTOU5LWMkkZtM6nuVZxr7fNMq9sM\\/S\\/yY7blnPJU3avbtNrCQTiNmggiScs\\/yymU0\\/JUYs0fDVQ5oIysQeULsY78yWM7o9sNq+0p4vFTcBJJJLXCQQORkei1rD+H9kot0EkdLXT\\/VAHmmN\\/Nk6VoQUdDgHt4t1SDgIN5tdgGU7jZXkgpAR\\/YJIH9goSUeCm3Ic4rMdk03\\/wCbqEiG\\/wCpEtI1YBB2IBK0sSgolHqocZdKaCfwJJ\\/Mik\\/NlE939jl0lNslInpPkxt8uRUqipNgc0+VpHgDO8ZUrUXeNpqUtHC72Tz1HXRd\\/B9pMfADsQPk4ciDf0Vg5s5qn7Q7CpPEgNY6ZBFr8tvJZtNbEW9lhe8\\/dBlQv4ikSPaNIc0e7iOT+QtDuoOhmwrdo1+EGKoDVYCMR911MT72zmxrpquPgW8M6q+lVxOecT6Ti+qA+m6XYGtDw0OblEXEG90OSZMvTM1xHAOZRHEhhpVKZdTrMFmzMYwNA4EHY4pVt3G7S9hSfw1Vwa+nVAa1xAL2vLbt3sTkuPju0WUnxiqPDxhqcPxDXkvpOdAcxxEusTDJMwQ0iYTu8nZBLKVal430miHWJqUCAPezJaIdvAOqXAJVs9H4mt4SWnY+U\\/snvqLJ9gdse0pupvMPZ4XA2vo7oV28T7aq9zGuDGNIa55AJOROC\\/USm5Uhx2HaXa7S8UmeJziGujJoMiSfJPrdlsfUD3SXABrdm6TAzz1T28GxgYxjYGMEuJxEnC+XS7WVM9zpIAuAYJyysZ1IIEjosHbezdajodTa0RhYLk5C+pInWwTHvy0ytMXmw88uUJr\\/ABAz7uE2BLYAwjqDi3ygp9OmP0gHciYPnMWvzlUBA9wOTgegzOdhNrZbZrk4lhcD4RF7RMwbQNtzzXY+iw\\/CLDpA2MRaDJ5SoK3DkZOINoBva413EQOUrOSGmZjgKTeG4k1WggPEPib+K1zrn5Lf8NWnUesmc1kO06DiRItNw3+ab5A3HqrPu3xeJpYfeYY93NsWMqYTkpNMqUU42jSsP5qplBTIt97rob+SutHOxUkIlJbkmIPVJPRBIznkkcDogYpHXyuomNkzaPr5bpTP5YqVghCVhdDkIQtBCEKOpTDhDhIUqQqQK9\\/CRYEluWF1x67FZHvH2GQ0YWH2QIePZx7Wg8H3mA+8zUt9FunBVHbPC1DTf7Aw8gw0gOY7k5pj1BBUOIPaMV2tRbxXCFjgwvZam+Rge6JIGrZzAOUxoq\\/\\/AA57cd7T\\/KVHEQHeyxbC7qZn4hmJ0BXbULaJjiaDmOqQDgdDHkGZAMyeYvBPlje2aGCtjoueHl7TSfcHGSMIOzhlOvQpRfhmTezdcH2I9\\/H1nSW0WuaSR8eJvuC9oIkxOa2riANgPOMj1sZXL2fQcyk0PdieYNRwDRLyPEfDl\\/RTObJgiQLkbnUbgjONZUSezeMaQ2o8uIv4Q7ITNgZJtlcEJ4cIOV7XkA62PlqlLQJkkzYayYiw5gj0UZxQS48oizZbaRrebpF3qhTXyw2G5B1EgWuDiIzEFIWuHxm8WaBHhMm3Ww6p1QgTf9VhckNcTmOiQ1MxhO2IxkNehBk+SBAwHc5kwQNBl0E5qN9RwF\\/FzEXLiBrzmTzEKQvd+nXIGTY5XzOH+qia8E4bh1vDrYGxI960ZRmpGkcvEMBy+Ei21vKPqqt3DupvNRogzdswCA0i5MkiYFgrx7LyLE\\/yyR5zER6KNgDrXBI1gG+8Xg9dFDjuy1KlRNwnazSLy0wLQ6PJxAtNl3Djm\\/hkqkdQDDi8IaQcUi8gkzJdYX+Sl\\/y4lpAFoIN4LZudRlPqrUpIlpFszj2HWOsJ7eKlNotBFl0tYtUn7IbRAas7pzQ85C3P+i6WtT4VKP7FYxjIzP3hSykhCtIkVCREqgFKQpUFAEZC5OMxx4C3Fu6SBzgZ+q7CoqilgjB9t9icXVIYOJa4Ey4PEsEXBbTFjBi8zbyXH2H3Nq0uJbVqVmVGMxPhogyR4QWuEYROKRq0LY1nEVdLtbE3BMkXA6j1QHkmToBeQfj1tAyyWF0V0LknfU3gGNYzOQM5iU1hjSIyyzGk21kdCEx5sP4if7g2idMxonVfdnKbSbgTa4GYjJIoWA6+mgmYzBdG\\/JI61oucjoBmL5xn6hOY2AL5R5CLDyynIhMa8eJ2pgcwI8IyuRn0ISYDQwiYmTN4veDI3uTbqnve0SJJzsATZxJm2lvKISVXwYyGZAdrpBi1xttdOdAAOWlxeCB9zPNMbGMcDoWk4gJOUzeRaTEznDkPAcIOWesxFiALnPMp7I1IORjMGAZjzGZ3UFRuG4Mics7yTrtA8pQMQgiZBiDcBwkZZDWybWBa7FOUNMlw8MSDJHSVI+7ZiwM3AgQbzGsXytKeCCI093MkbwYkE5ypoLInmW5Qcr4c8wbjqjh32MzIM7+uHbaCLJaE4SL2g9YN7D+qjYfE5vnERY7EWHTM3QAj+HeXl7KmG3uGC22si4\\/pyK7eyXVZc2o5rr+EgEECLgz\\/AFsQuei\\/xRvfUXIOseI6QYyuuvs9hL3O0gCNQ4TOXkqjyiXwyzanJAhdBmBSpJSSqAVEpEIAfCREoQAiiepSonpMCp48gOZMXMX8rjfon0mmcouIzEnDoSbjkfqm9pN8OcbxnEac0cORJA1vYkggtnN2eUxp5rml+Rp4B7Yc236sgc\\/DlOSH\\/Df4jlYmx+uoSueLEXEOG2xyPTdJUMDo4EgXMZ5H8CCgxZxcx5i05HTlBzSUoMZCbbggDKTnnrcJzRHOJBH9zYTCgiCZucyIF2xa0iBFr7FJgODIN5IxzpYbyPVNqOc50XaAQQZgFpBkRvO+3kpMVzsbyY8ovbKf7plSniIJziLai5vpnESdSkAntMjMTAyibx85+alrNBHMze822GRz0UbyRlN7GLtDb36bplV\\/gvnsCBc2i5kEDIyJBQJErHywGBeYiTFtHG863RRPhm4MtBklsGcpyn5XQ2zQJ3zImMrwSIm2dkrBbLUDMzFz8ViP9qBiUhc2zk5D0A1+qja7xuH8EGNMNxO+efkil8etusjqLx9ElIHG85xY2Og1OROV9J6oAcwy4R4hGUl1ptJ\\/TbM5mAV38B7zrWyne51XGw7yYBMuj6b\\/ANV39mtOEk6n5AACOUBXDkmXB2oQhdJmCEJCpAEiJQgCSUiEKgEKjcpITHBJgcXFMkEfW48wubh7Ta\\/OchbM8o9V31Aqt8tkATBnnhviuRGU6rCap2XEmrGx1iLRJg7c4n8CjbEZCDbUTbkbAhPp9NxbCBFj8Nzn9VBxTMBJiGn0aNdbWyUP2UiVh0NoEGQBbQ3z5pXgHxDeJFgRbMkX1K53Om+WmIA2FxBO2cjUp7KsO8RIcYE7yCRESZvB8krGNa8ixEQLg9Rlk0C0zeye59zabCDfnNpyuPTROwiIOVt7CRMxkTlCRjBNomeZk\\/FI1i3qgCMOII0gmMpgR5i056bplESPECABEG9myLyLmLwVJggWBzgTtijPURIO4CHPk4c7kxBgAHSc7OHqkAlZ2QBi4mMMAAWi1pBvbNSVCGttYW0wgzZo5cjoeSjFODMkmMhnAvm3kT1TXvxEgXM3N4MxaMriLA2lPgB9KzBExaM5tfyP9tlFwbXEF5BGI\\/7iIPI7Xy0KTiHggBpF7DOw1uPIi+if7LC0ZCxmBABjOAdjlsSpGSMABcfKM5Olj9tFc8OyGgbD5qs4ChiLSb4fFniiRA55TnlKtwVvjXkzk\\/AsolEpCVqQBKSUspCUACEkon8ugCRCRCoAKaUsoKkCN4VfxlOPGBJbpfxDb5qxIUT2KZRtDTKyhUjwgkXOEui9h4QLZDfbVdmGxEW53B+W+wXFW4fA4n4DFpuDy55QnNrlsSZAsH7CIhzhkQVjdaZZz8TQLCYBcyZEZt3kmdXWiTdDagP3EeKDcjebETZd7Xg7ZSMvdMZnIC2iY\\/hmEzEHcW+LP+uqmvQ7OfIAzA15ROXnARgINnRpzzt9R18k\\/wDyzhAD7DQgE2G+u3K2qa+m+3hDrjK2U5+R6y5FDBmknOPofuD5FAeGiYAiDBtBBbrvmJUbeHeRBceUDMRcnpEEbdUr6TTdxMnnoTjj5ehRsWhjwXEhvrvmL2vpYaQpbNBGVrmd+cTqDfJIXYSBYDUaxO50z+abSaSACCLRFzOGAZM\\/VIaGcO3xF5BAOQmRdpkQRBkiR1U2EkwLkwbzNvdxR\\/ttPJOdbKMh+nSd+ui7OA4UgBzoLoFwNhnfLkqjG9BJ0dPC0sLYOeqnCaEq6UqVGTFSEoJSFAgJSEoQUAEpEkolIZJKVNCVMQqCkQgBE0hOQgCJ7JsuOpwhBlkfwnLXXTNWBTCpcUxplT7PCcsFt5FspOuZT2vdtnGWfUzb52XdUuI\\/MiqzjfC4gWECyxcaNE7HuqSBMiYORkHFa2sR5m6cyu0j3gLb6XF+k36hMc8mb\\/p+ZhObkeQJ9ClYCCqYI1gt3uBEbWbCa5752HPONSByAAvuioYdAykW6yVG24HUHzIclYwEA3k2EwIF3SSPpnun06bnyAJvJNgMWKSevqn8BRa65EmPLM6ZK2FlcY2JuiDh+FDQMUOI5WB3A3XShyFskkZ2KhIEhTAWUhKRCAFJTShNKQCoSJEAf\\/\\/Z\\\" style=\\\"width: 201px;\\\" data-filename=\\\"images.jpg\\\"><br><\\/p>\",\"price\":250,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/38\\/16551444113796_2022_06_13.jpg\",\"attributes\":{\"color\":\"\\u0627\\u0633\\u0648\\u062f\"}}}',NULL,'2022-07-16 10:49:59','2022-07-16 10:49:59'),(16,'SAR_16587593868808','{\"20\":{\"id\":20,\"name\":\"p[[[[[\",\"description\":\"<p>asasa<\\/p>\",\"price\":130,\"quantity\":\"1\",\"thumb\":\"http:\\/\\/nephele.codedbyme.com\\/uploads\\/media\\/19\\/16518030498895_2022_05_06.jpeg\",\"attributes\":{\"color\":\"blue\"}}}',NULL,'2022-07-25 12:29:46','2022-07-25 12:29:46');
/*!40000 ALTER TABLE `cart_storages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`(191)),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (3,1,'mens',NULL,NULL,NULL),(4,1,'slasels',NULL,NULL,NULL),(5,1,'necklaces',NULL,NULL,NULL),(6,1,'nepheles-collection',NULL,NULL,NULL),(8,1,'bags',NULL,NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_translations`
--

DROP TABLE IF EXISTS `category_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `locale` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_translations`
--

LOCK TABLES `category_translations` WRITE;
/*!40000 ALTER TABLE `category_translations` DISABLE KEYS */;
INSERT INTO `category_translations` VALUES (5,'necklaces',NULL,3,'en',NULL,NULL),(6,'قلادات',NULL,3,'ar',NULL,NULL),(7,'Bracelets',NULL,4,'en',NULL,NULL),(8,'اساور',NULL,4,'ar',NULL,NULL),(9,'discounts',NULL,5,'en',NULL,NULL),(10,'تخفيضات',NULL,5,'ar',NULL,NULL),(11,'nephele’s collection',NULL,6,'en',NULL,NULL),(12,'كولكشن نيفيلي الخاص',NULL,6,'ar',NULL,NULL),(13,'womens',NULL,7,'en',NULL,NULL),(14,'حريمي',NULL,7,'ar',NULL,NULL),(15,'bags',NULL,8,'en',NULL,NULL),(16,'ِاساور',NULL,8,'ar',NULL,NULL);
/*!40000 ALTER TABLE `category_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,NULL,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(2,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(3,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(4,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(5,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(6,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(7,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(8,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(9,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(10,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(11,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(12,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(13,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(14,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(15,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(16,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(17,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(18,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(19,1,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(20,NULL,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(21,20,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(22,20,'2022-05-13 23:35:00','2022-05-13 23:35:00'),(23,20,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(24,20,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(25,20,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(26,20,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(27,20,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(28,20,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(29,20,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(30,20,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(31,NULL,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(32,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(33,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(34,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(35,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(36,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(37,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(38,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(39,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(40,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(41,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(42,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(43,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(44,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(45,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(46,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(47,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(48,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(49,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(50,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(51,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(52,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(53,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(54,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(55,31,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(56,NULL,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(57,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(58,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(59,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(60,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(61,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(62,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(63,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(64,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(65,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(66,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(67,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(68,56,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(69,NULL,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(70,69,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(71,69,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(72,69,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(73,69,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(74,69,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(75,69,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(76,69,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(77,69,'2022-05-13 23:35:01','2022-05-13 23:35:01'),(78,69,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(79,69,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(80,69,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(81,NULL,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(82,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(83,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(84,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(85,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(86,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(87,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(88,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(89,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(90,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(91,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(92,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(93,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(94,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(95,81,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(96,NULL,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(97,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(98,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(99,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(100,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(101,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(102,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(103,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(104,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(105,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(106,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(107,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(108,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(109,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(110,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(111,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(112,96,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(113,NULL,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(114,113,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(115,113,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(116,113,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(117,113,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(118,113,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(119,113,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(120,113,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(121,NULL,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(122,121,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(123,121,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(124,121,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(125,NULL,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(126,125,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(127,125,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(128,125,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(129,125,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(130,NULL,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(131,130,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(132,130,'2022-05-13 23:35:02','2022-05-13 23:35:02'),(133,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(134,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(135,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(136,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(137,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(138,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(139,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(140,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(141,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(142,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(143,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(144,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(145,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(146,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(147,130,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(148,NULL,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(149,148,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(150,148,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(151,148,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(152,148,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(153,148,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(154,148,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(155,148,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(156,148,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(157,NULL,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(158,157,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(159,157,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(160,157,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(161,157,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(162,157,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(163,157,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(164,157,'2022-05-13 23:35:03','2022-05-13 23:35:03'),(165,157,'2022-05-13 23:35:03','2022-05-13 23:35:03');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city_translations`
--

DROP TABLE IF EXISTS `city_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `locale` (`locale`(191)),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=333 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city_translations`
--

LOCK TABLES `city_translations` WRITE;
/*!40000 ALTER TABLE `city_translations` DISABLE KEYS */;
INSERT INTO `city_translations` VALUES (1,'مكة المكرمة','ar',1),(2,'Mecca','en',1),(3,'مكة','ar',2),(4,'Mecca','en',2),(5,'جدة','ar',3),(6,'Jeddah','en',3),(7,'الطائف','ar',4),(8,'Taif','en',4),(9,'القنفذة','ar',5),(10,'Al-Qunfudhah','en',5),(11,'الليث','ar',6),(12,'Laith','en',6),(13,'بحرة','ar',7),(14,'Bahra','en',7),(15,'رابغ','ar',8),(16,'Rabigh','en',8),(17,'الجموم','ar',9),(18,'Al-Jumum','en',9),(19,'خليص','ar',10),(20,'Khulais','en',10),(21,'رنية','ar',11),(22,'Rune','en',11),(23,'الخرمة','ar',12),(24,'Khurma','en',12),(25,'العرضيات','ar',13),(26,'Al-Eardiaat','en',13),(27,'أضم','ar',14),(28,'Adham','en',14),(29,'تربة','ar',15),(30,'Turubah','en',15),(31,'الكامل','ar',16),(32,'Alkamil','en',16),(33,'المويه','ar',17),(34,'Almoeh','en',17),(35,'ميسان','ar',18),(36,'Missan','en',18),(37,'مدينة الملك عبد الله الاقتصادية','ar',19),(38,'King Abdullah Economic City','en',19),(39,'المدينة المنورة','ar',20),(40,'Medina El Monawara','en',20),(41,'المدينة المنورة','ar',21),(42,'Medina','en',21),(43,'ينبع','ar',22),(44,'Yanbu','en',22),(45,'العلا','ar',23),(46,'Al-\'Ula','en',23),(47,'مهد الذهب','ar',24),(48,'Mahd adh Dhahab','en',24),(49,'الحناكية','ar',25),(50,'Hanakia','en',25),(51,'بدر','ar',26),(52,'Badr','en',26),(53,'خيبر','ar',27),(54,'Khaybar','en',27),(55,'الفريش','ar',28),(56,'Al-Furaysh','en',28),(57,'دثير','ar',29),(58,'Dthir','en',29),(59,'الصويدرة','ar',30),(60,'Essaouira','en',30),(61,'الرياض','ar',31),(62,'Riyadh','en',31),(63,'الرياض','ar',32),(64,'Riyadh','en',32),(65,'السيح','ar',33),(66,'Seeh','en',33),(67,'الزلفي','ar',34),(68,'Zulfi','en',34),(69,'الدرعية','ar',35),(70,'Diriyah','en',35),(71,'الدلم','ar',36),(72,'Al-dilm','en',36),(73,'الهياثم','ar',37),(74,'Al-Hayatham','en',37),(75,'الدوادمي','ar',38),(76,'Dawadmi','en',38),(77,'المجمعة','ar',39),(78,'Al-Majma\'ah','en',39),(79,'القويعية','ar',40),(80,'Al-Quway\'iyah','en',40),(81,'وادي الدواسر','ar',41),(82,'Wadi Al Dawasir','en',41),(83,'ليلى (الأفلاج)','ar',42),(84,'Layla (town)','en',42),(85,'شقراء','ar',43),(86,'Shaqraa','en',43),(87,'حوطة بني تميم','ar',44),(88,'Hotat Bani Tamim','en',44),(89,'عفيف','ar',45),(90,'Afif','en',45),(91,'مرات','ar',46),(92,'Maraat','en',46),(93,'السليل','ar',47),(94,'As Sulayyil','en',47),(95,'ضرما','ar',48),(96,'Dhurma','en',48),(97,'المزاحمية','ar',49),(98,'Muzahimiyah','en',49),(99,'رماح','ar',50),(100,'Ramah','en',50),(101,'ثادق','ar',51),(102,'Thadiq','en',51),(103,'حريملاء','ar',52),(104,'Huraymila','en',52),(105,'الحريق','ar',53),(106,'Al-hariq','en',53),(107,'الغاط','ar',54),(108,'Ghat','en',54),(109,'أشيقر','ar',55),(110,'Ushaiger','en',55),(111,'المنطقة الشرقية','ar',56),(112,'Eastern Province','en',56),(113,'الدمام','ar',57),(114,'Dammam','en',57),(115,'الخبر','ar',58),(116,'Khobar','en',58),(117,'الظهران','ar',59),(118,'Dhahran','en',59),(119,'الأحساء','ar',60),(120,'Al-Ahsa','en',60),(121,'حفر الباطن','ar',61),(122,'Hafar al-Batin','en',61),(123,'الخفجي','ar',62),(124,'Khafji','en',62),(125,'الجبيل','ar',63),(126,'Jubail','en',63),(127,'القطيف','ar',64),(128,'Qatif','en',64),(129,'النعيرية','ar',65),(130,'Al-Nairyah','en',65),(131,'بقيق','ar',66),(132,'Abqaiq','en',66),(133,'رأس تنورة','ar',67),(134,'Ras Tanura','en',67),(135,'قرية العليا','ar',68),(136,'Qaryat al-Ulya','en',68),(137,'القصيم','ar',69),(138,'Al-Qassim','en',69),(139,'بريدة','ar',70),(140,'Buraidah','en',70),(141,'عنيزة','ar',71),(142,'Unaizah','en',71),(143,'الرس','ar',72),(144,'Ar Rass','en',72),(145,'البكيرية','ar',73),(146,'Bukayriyah','en',73),(147,'البدائع','ar',74),(148,'Al-Badayea','en',74),(149,'النبهانية','ar',75),(150,'Nabhani','en',75),(151,'المذنب','ar',76),(152,'Al-mudhanib','en',76),(153,'رياض الخبراء','ar',77),(154,'Riyadh Al Khabra','en',77),(155,'عيون الجواء','ar',78),(156,'Oyoun Al-Jawa','en',78),(157,'الشماسية','ar',79),(158,'Al-shamasia','en',79),(159,'عقلة الصقور','ar',80),(160,'Uqlat Al-Suqur','en',80),(161,'حائل','ar',81),(162,'Hail','en',81),(163,'حائل','ar',82),(164,'Hail','en',82),(165,'بقعاء','ar',83),(166,'Baqaa','en',83),(167,'الغزالة','ar',84),(168,'Ghazala','en',84),(169,'الشنان','ar',85),(170,'Al-Shinan','en',85),(171,'الشملي','ar',86),(172,'Shamli','en',86),(173,'سميراء','ar',87),(174,'Samira','en',87),(175,'موقق','ar',88),(176,'Muqaq','en',88),(177,'الحائط','ar',89),(178,'Al-Hayit','en',89),(179,'السليمي','ar',90),(180,'Sulaimi','en',90),(181,'أم القلبان','ar',91),(182,'Umm Al Qalban','en',91),(183,'طابة','ar',92),(184,'Taba','en',92),(185,'قفار','ar',93),(186,'Qafaar','en',93),(187,'الكهفة','ar',94),(188,'Al-Kahfa','en',94),(189,'فيد','ar',95),(190,'Fid','en',95),(191,'عسير','ar',96),(192,'Asir','en',96),(193,'أبها','ar',97),(194,'Abha','en',97),(195,'خميس مشيط','ar',98),(196,'Khamis Mushait','en',98),(197,'بيشة','ar',99),(198,'Bisha','en',99),(199,'محايل عسير','ar',100),(200,'Muhail Asir','en',100),(201,'بارق','ar',101),(202,'Bareq','en',101),(203,'النماص','ar',102),(204,'Al-Namas','en',102),(205,'أحد رفيدة','ar',103),(206,'Ahad Rafidah','en',103),(207,'ظهران الجنوب','ar',104),(208,'Dhahran Al Janoub','en',104),(209,'سبت العلاية','ar',105),(210,'Sabbat Al Alaya','en',105),(211,'سراة عبيدة','ar',106),(212,'Sarat Abidah','en',106),(213,'المجاردة','ar',107),(214,'Al-Majaridah','en',107),(215,'رجال ألمع','ar',108),(216,'Rijal Almaa ','en',108),(217,'تثليث','ar',109),(218,'Trinity','en',109),(219,'تنومة','ar',110),(220,'Tanomah','en',110),(221,'طريب','ar',111),(222,'Trib','en',111),(223,'البرك','ar',112),(224,'Al-barak','en',112),(225,'تبوك','ar',113),(226,'Tabuk','en',113),(227,'تبوك','ar',114),(228,'Tabuk','en',114),(229,'تيماء','ar',115),(230,'Taima','en',115),(231,'أملج','ar',116),(232,'Umluj','en',116),(233,'الوجه','ar',117),(234,'Al-Wajh','en',117),(235,'ضباء','ar',118),(236,'Duba','en',118),(237,'حقل','ar',119),(238,'Haql','en',119),(239,'البدع','ar',120),(240,'Al-Bad\'','en',120),(241,'الجوف','ar',121),(242,'Al-Jawf','en',121),(243,'سكاكا','ar',122),(244,'Sakakah','en',122),(245,'القريات','ar',123),(246,'Qurayyat','en',123),(247,'دومة الجندل','ar',124),(248,'Dumat al-Jandal','en',124),(249,'منطقة الحدود الشمالية','ar',125),(250,'Northern Borders Province','en',125),(251,'عرعر','ar',126),(252,'Arar','en',126),(253,'طريف','ar',127),(254,'Turaif','en',127),(255,'رفحاء','ar',128),(256,'Rafha','en',128),(257,'العويقيلة','ar',129),(258,'Al-Awaqilah','en',129),(259,'جازان','ar',130),(260,'Jazan','en',130),(261,'جيزان','ar',131),(262,'Jizan','en',131),(263,'صبيا','ar',132),(264,'Sabya','en',132),(265,'أبو عريش','ar',133),(266,'Abu Arish','en',133),(267,'صامطة','ar',134),(268,'Samtah','en',134),(269,'فيفاء','ar',135),(270,'Fifa','en',135),(271,'بيش','ar',136),(272,'Bish','en',136),(273,'الدرب','ar',137),(274,'Al-Darb','en',137),(275,'العيدابي','ar',138),(276,'Al-Aydabi','en',138),(277,'الدائر','ar',139),(278,'Al-Daayir','en',139),(279,'الخوبة','ar',140),(280,'Al-Khubah','en',140),(281,'العارضة','ar',141),(282,'Arida','en',141),(283,'أحد المسارحة','ar',142),(284,'Ahad Almusaraha','en',142),(285,'الريث','ar',143),(286,'Al-Reeth','en',143),(287,'ضمد','ar',144),(288,'Dammed','en',144),(289,'فرسان','ar',145),(290,'Farasan','en',145),(291,'الطوال','ar',146),(292,'Al-Tiwal','en',146),(293,'هروب','ar',147),(294,'Harub','en',147),(295,'نجران','ar',148),(296,'Najran','en',148),(297,'نجران','ar',149),(298,'Najran','en',149),(299,'شرورة','ar',150),(300,'Sharurah','en',150),(301,'حبونا','ar',151),(302,'Hubuna','en',151),(303,'ثار','ar',152),(304,'Thar','en',152),(305,'يدمة','ar',153),(306,'Yadamah','en',153),(307,'بدر الجنوب','ar',154),(308,'Badr Al Janub','en',154),(309,'خباش','ar',155),(310,'Khubash','en',155),(311,'الخرخير','ar',156),(312,'Al-Kharkhir','en',156),(313,'الباحة','ar',157),(314,'Al-Bahah','en',157),(315,'الباحة','ar',158),(316,'Al Bahah','en',158),(317,'المخواة','ar',159),(318,'Al-Makhwah','en',159),(319,'بلجرشي','ar',160),(320,'Baljurashi','en',160),(321,'المندق','ar',161),(322,'Al-Mandaq','en',161),(323,'قلوة','ar',162),(324,'Qilwah','en',162),(325,'القرى','ar',163),(326,'Al-Qara','en',163),(327,'العقيق','ar',164),(328,'Al-Eaqiq','en',164),(329,'الحجرة','ar',165),(330,'Hajrah','en',165),(331,'بني حسن','ar',166),(332,'Beni Hassan','en',166);
/*!40000 ALTER TABLE `city_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `replay` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'ahmed shreef','blogshreef@gmail.com',NULL,'ada','asffaa','2022-05-13 18:58:47','2022-05-13 20:06:46',1);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` bigint(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('amount','percentage') COLLATE utf8mb4_unicode_ci DEFAULT 'amount',
  `maximum_discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `coupon` (`coupon`(191))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (3,'ahmed',10,1,'2022-04-26 00:46:49','2022-04-26 00:46:49','amount',0.00),(4,'only',10,1,'2022-05-06 20:35:33','2022-05-06 23:46:17','percentage',0.00),(5,'777',15,1,'2022-06-15 18:34:14','2022-06-15 18:46:46','percentage',1000.00);
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons_has_categories`
--

DROP TABLE IF EXISTS `coupons_has_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons_has_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_id` bigint(20) unsigned DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `coupon_id` (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons_has_categories`
--

LOCK TABLES `coupons_has_categories` WRITE;
/*!40000 ALTER TABLE `coupons_has_categories` DISABLE KEYS */;
INSERT INTO `coupons_has_categories` VALUES (9,3,3,'2022-05-06 23:24:53','2022-05-06 23:24:53'),(10,3,4,'2022-05-06 23:24:53','2022-05-06 23:24:53');
/*!40000 ALTER TABLE `coupons_has_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons_has_products`
--

DROP TABLE IF EXISTS `coupons_has_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons_has_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coupon_id` (`coupon_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons_has_products`
--

LOCK TABLES `coupons_has_products` WRITE;
/*!40000 ALTER TABLE `coupons_has_products` DISABLE KEYS */;
INSERT INTO `coupons_has_products` VALUES (4,5,23,'2022-06-15 18:46:46','2022-06-15 18:46:46');
/*!40000 ALTER TABLE `coupons_has_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `conversions_disk` longtext COLLATE utf8mb4_unicode_ci,
  `generated_conversions` longtext COLLATE utf8mb4_unicode_ci,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_type` (`model_type`(191)),
  KEY `model_id` (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (5,'App\\Product',7,'images','16501582677604_2022_04_17','16501582677604_2022_04_17.jpeg','image/jpeg','media',211886,'[]','[]','[]',3,'public','[]','7489b213-112c-49cc-8d21-52e7e2634d05','2022-04-16 23:17:47','2022-04-16 23:17:47'),(6,'App\\Product',7,'thumb','16501585514713_2022_04_17','16501585514713_2022_04_17.jpeg','image/jpeg','media',195105,'[]','[]','[]',4,'public','[]','da6f53b3-b6fb-4bb1-a8fd-7fa3ad826f56','2022-04-16 23:22:31','2022-04-16 23:22:31'),(7,'App\\Product',10,'thumb','16501623249104_2022_04_17','16501623249104_2022_04_17.jpeg','image/jpeg','media',198691,'[]','[]','[]',5,'public','[]','66d350e6-1e6e-4d46-b781-70977bfd702f','2022-04-17 00:25:24','2022-04-17 00:25:24'),(8,'App\\Product',10,'images','16501623241966_2022_04_17','16501623241966_2022_04_17.jpeg','image/jpeg','media',146435,'[]','[]','[]',6,'public','[]','345257a3-d5fc-48cf-b0f4-395581ab6c15','2022-04-17 00:25:24','2022-04-17 00:25:24'),(9,'App\\Product',10,'images','16501623249612_2022_04_17','16501623249612_2022_04_17.jpeg','image/jpeg','media',146435,'[]','[]','[]',7,'public','[]','f3cf5a68-b90a-4a32-80da-9802611420a9','2022-04-17 00:25:24','2022-04-17 00:25:24'),(10,'App\\Product',13,'thumb','1650575415443_2022_04_21','1650575415443_2022_04_21.jpeg','image/jpeg','media',203848,'[]','[]','[]',8,'public','[]','a75a6031-e428-4056-a3ad-b27d3bcb4637','2022-04-21 19:10:15','2022-04-21 19:10:15'),(11,'App\\Product',13,'images','16505754156669_2022_04_21','16505754156669_2022_04_21.jpeg','image/jpeg','media',204019,'[]','[]','[]',9,'public','[]','4044ea4f-4552-4653-988a-8418208f64ba','2022-04-21 19:10:15','2022-04-21 19:10:15'),(12,'App\\Product',13,'images','16505754158678_2022_04_21','16505754158678_2022_04_21.jpeg','image/jpeg','media',198691,'[]','[]','[]',10,'public','[]','fe72d363-9273-4cb9-a08b-e643dafb1f85','2022-04-21 19:10:15','2022-04-21 19:10:15'),(13,'App\\Product',15,'thumb','16505919555453_2022_04_22','16505919555453_2022_04_22.jpeg','image/jpeg','media',137463,'[]','[]','[]',11,'public','[]','2f6df6c1-75f7-47a1-b574-4bade2ec1989','2022-04-21 23:45:55','2022-04-21 23:45:55'),(14,'App\\Product',15,'images','1650591955516_2022_04_22','1650591955516_2022_04_22.jpeg','image/jpeg','media',146435,'[]','[]','[]',12,'public','[]','2483a4c3-10f4-47a8-b7ec-86df66f81748','2022-04-21 23:45:55','2022-04-21 23:45:55'),(15,'App\\Product',15,'images','16505919559773_2022_04_22','16505919559773_2022_04_22.jpeg','image/jpeg','media',142020,'[]','[]','[]',13,'public','[]','cae87180-e120-4c14-9a0f-d2846657d2e5','2022-04-21 23:45:55','2022-04-21 23:45:55'),(16,'App\\Product',15,'images','16505919554533_2022_04_22','16505919554533_2022_04_22.jpeg','image/jpeg','media',147775,'[]','[]','[]',14,'public','[]','7fd4bddb-f123-474c-809e-1e3fda270374','2022-04-21 23:45:55','2022-04-21 23:45:55'),(17,'App\\Category',2,'thumb','16517227422699_2022_05_05','16517227422699_2022_05_05.jpeg','image/jpeg','media',204019,'[]','[]','[]',15,'public','[]','778f2a19-0241-458d-a0c1-db6f824cedd6','2022-05-05 01:52:22','2022-05-05 01:52:22'),(18,'App\\Category',1,'thumb','16518021488695_2022_05_06','16518021488695_2022_05_06.jpeg','image/jpeg','media',142020,'[]','[]','[]',16,'public','[]','e62f3bc4-d43d-4404-a192-eb0d01f82174','2022-05-05 23:55:48','2022-05-05 23:55:48'),(19,'App\\Product',18,'thumb','16518030498895_2022_05_06','16518030498895_2022_05_06.jpeg','image/jpeg','media',195105,'[]','[]','[]',17,'public','[]','5bf8f441-2576-4d73-8d5f-af5ac32592eb','2022-05-06 00:10:49','2022-05-06 00:10:49'),(20,'App\\Product',18,'images','16518030495422_2022_05_06','16518030495422_2022_05_06.jpg','image/jpeg','media',49993,'[]','[]','[]',18,'public','[]','b841f887-8120-4c83-b700-6889a75966ae','2022-05-06 00:10:49','2022-05-06 00:10:49'),(21,'App\\Product',18,'images','16518030493399_2022_05_06','16518030493399_2022_05_06.jpeg','image/jpeg','media',195105,'[]','[]','[]',19,'public','[]','54c4ef3a-54a0-4ca7-a5e3-65e75de12baf','2022-05-06 00:10:49','2022-05-06 00:10:49'),(22,'App\\Product',21,'thumb','16518105297027_2022_05_06','16518105297027_2022_05_06.jpeg','image/jpeg','media',198691,'[]','[]','[]',20,'public','[]','c59a7fe2-6eb1-43f2-9af0-d2f600111739','2022-05-06 02:15:29','2022-05-06 02:15:29'),(23,'App\\Product',21,'images','16518105295692_2022_05_06','16518105295692_2022_05_06.jpeg','image/jpeg','media',190928,'[]','[]','[]',21,'public','[]','7afd1986-c848-46ff-821f-eb4c7543ab23','2022-05-06 02:15:29','2022-05-06 02:15:29'),(24,'App\\Product',21,'images','16518105292626_2022_05_06','16518105292626_2022_05_06.jpeg','image/jpeg','media',142020,'[]','[]','[]',22,'public','[]','a1165d3b-4190-4420-9fd6-678ed273743c','2022-05-06 02:15:29','2022-05-06 02:15:29'),(30,'App\\Category',5,'thumb','16542180612201_2022_06_03','16542180612201_2022_06_03.jpg','image/jpeg','media',18829,'[]','[]','[]',28,'media','[]','79fe0582-733a-4ba4-93b0-52446a030e41','2022-06-02 23:01:01','2022-06-02 23:01:01'),(32,'App\\Category',6,'thumb','16542182481301_2022_06_03','16542182481301_2022_06_03.jpg','image/jpeg','media',29622,'[]','[]','[]',30,'media','[]','316d666e-f8bd-4044-a072-088785385ab7','2022-06-02 23:04:08','2022-06-02 23:04:08'),(33,'App\\Category',4,'thumb','16542184805344_2022_06_03','16542184805344_2022_06_03.jpg','image/jpeg','media',19342,'[]','[]','[]',31,'media','[]','225c66cd-86de-4127-993b-40042ec39ff5','2022-06-02 23:08:00','2022-06-02 23:08:00'),(34,'App\\Product',22,'thumb','16547566561852_2022_06_09','16547566561852_2022_06_09.png','image/png','media',374108,'[]','[]','[]',32,'media','[]','aff296d5-3857-4113-89fc-37087f922ed8','2022-06-09 04:37:36','2022-06-09 04:37:36'),(35,'App\\Product',22,'images','165475665657_2022_06_09','165475665657_2022_06_09.png','image/png','media',374108,'[]','[]','[]',33,'media','[]','6259744c-2747-4a68-9320-fcaf80409a2e','2022-06-09 04:37:36','2022-06-09 04:37:36'),(38,'App\\Product',23,'thumb','16551444113796_2022_06_13','16551444113796_2022_06_13.jpg','image/jpeg','media',8761,'[]','[]','[]',36,'media','[]','d17698fc-36f7-4c8b-833e-9b1c234d0724','2022-06-13 16:20:11','2022-06-13 16:20:11'),(39,'App\\Product',23,'images','16551444115007_2022_06_13','16551444115007_2022_06_13.jpg','image/jpeg','media',35674,'[]','[]','[]',37,'media','[]','73881f6a-c4ce-41b7-8111-0701baafe50c','2022-06-13 16:20:11','2022-06-13 16:20:11'),(40,'App\\Product',23,'images','16551444627544_2022_06_13','16551444627544_2022_06_13.jpg','image/jpeg','media',7827,'[]','[]','[]',38,'media','[]','9f9cb741-a072-4181-8a89-cbf2a1236f12','2022-06-13 16:21:02','2022-06-13 16:21:02'),(41,'App\\Category',8,'thumb','1657694557828_2022_07_13','1657694557828_2022_07_13.PNG','image/png','media',90469,'[]','[]','[]',39,'media','[]','3e4088b7-e6c2-4fac-a108-2696f7174854','2022-07-13 04:42:37','2022-07-13 04:42:37'),(43,'App\\Category',3,'thumb','16576954615511_2022_07_13','16576954615511_2022_07_13.jpg','image/jpeg','media',17571,'[]','[]','[]',40,'media','[]','1666a658-8bf7-476f-aef3-ffa35133a005','2022-07-13 04:57:41','2022-07-13 04:57:41');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_01_21_093731_create_admins_table',1),(5,'2020_01_21_104118_create_permission_tables',1),(6,'2020_01_29_114403_create_settings_table',1),(7,'2020_02_02_061533_create_categories_table',1),(8,'2020_02_13_012729_create_product_sizes_table',1),(9,'2020_02_14_200758_create_products_table',1),(10,'2020_12_01_023934_create_backups_table',1),(11,'2022_03_10_085036_create_media_table',1),(12,'2022_03_18_224854_create_pages_table',1),(13,'2022_03_18_224927_create_page_translations_table',1),(14,'2022_03_19_153637_create_contacts_table',1),(15,'2022_04_17_215220_create_coupons_table',2),(16,'2022_04_19_000616_create_subscriptions_table',3),(17,'2022_04_23_232041_add_column_special_price_to_products_table',4),(18,'2022_04_24_021104_create_cart_storages_table',5),(19,'2022_05_05_054247_create_wishlists_table',6),(20,'2022_05_06_221843_add_column_type_to_coupons_table',7),(23,'2020_02_15_071037_create_product_reviews_table',8),(24,'2021_10_22_035701_alter_user_addresses_table',8),(25,'2021_12_03_204505_create_cities_table',9),(26,'2022_05_09_202419_create_orders_table',10),(27,'2022_05_09_211651_create_order_has_products_table',10),(28,'2022_05_09_212609_add_columns_to_users_table',10),(29,'2022_05_09_214752_create_payments_table',10),(30,'2022_05_09_220528_add_columns_to_orders_table',11),(31,'2022_05_10_191944_add_column_to_orders_table',12),(32,'2022_05_13_025912_add_paid_to_orders_table',13),(33,'2022_05_13_213605_add_column_replay_to_contacts_table',14),(34,'2022_05_14_012809_create_slider_items_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `model_type` (`model_type`(191)),
  KEY `model_id` (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`),
  KEY `model_type` (`model_type`(191)),
  KEY `model_id` (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Admin',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_has_products`
--

DROP TABLE IF EXISTS `order_has_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_has_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` decimal(12,4) NOT NULL,
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`,`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_has_products`
--

LOCK TABLES `order_has_products` WRITE;
/*!40000 ALTER TABLE `order_has_products` DISABLE KEYS */;
INSERT INTO `order_has_products` VALUES (22,3,150.0000,11,19),(23,1,130.0000,11,20),(24,3,2500.0000,11,21),(26,1,150.0000,13,19),(27,1,2500.0000,13,21),(28,1,100.0000,14,17),(29,1,150.0000,14,19),(30,3,2500.0000,14,21),(31,1,200.0000,15,14),(32,2,0.0000,16,16),(33,1,150.0000,16,19),(34,1,2500.0000,17,21),(35,3,2500.0000,18,21);
/*!40000 ALTER TABLE `order_has_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` enum('pending','confirmed','paid','waiting_for_shipping','shipped','delivered','cancelled','refunded','refund_received') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` enum('credit','pay_on_delivery') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'credit',
  `refunded` tinyint(1) NOT NULL DEFAULT '0',
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_item_count` bigint(20) DEFAULT NULL,
  `sub_total` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `shipping_price` decimal(12,2) DEFAULT NULL,
  `street_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `notes` mediumtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_holder_name` text COLLATE utf8mb4_unicode_ci,
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visa',
  `card_issuing_bank` text COLLATE utf8mb4_unicode_ci,
  `card_number` text COLLATE utf8mb4_unicode_ci,
  `card_expiration_month` text COLLATE utf8mb4_unicode_ci,
  `card_expiration_year` text COLLATE utf8mb4_unicode_ci,
  `card_security_code` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `coupon_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `area_id` bigint(20) unsigned DEFAULT NULL,
  `city_id` bigint(20) unsigned DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '1',
  `total_weight` double(15,4) DEFAULT '0.0000',
  `vatAmount` decimal(12,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`coupon_id`,`area_id`,`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (11,'051122-1011','cancelled','credit',0,NULL,7,8080.00,30.00,0.00,'0125458888',NULL,NULL,NULL,NULL,'visa',NULL,NULL,NULL,NULL,NULL,2,3,'2022-05-10 22:59:37','2022-05-13 21:31:06',NULL,NULL,8080.00,1,0.0000,0.00),(13,'051122-1013','confirmed','pay_on_delivery',0,NULL,2,2650.00,0.00,0.00,'fsgsdgdsgsd',NULL,'sahmed Shreef','01065454118',NULL,'visa',NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-05-11 21:00:37','2022-06-13 17:44:53',31,37,2650.00,1,0.0000,0.00),(14,'051322-1014','pending','pay_on_delivery',0,NULL,5,7750.00,30.00,0.00,'بول 10 اعلي مول العرب',NULL,'sahmed Shreef','01065454118',NULL,'visa',NULL,NULL,NULL,NULL,NULL,1,3,'2022-05-13 00:35:40','2022-05-13 00:35:40',69,70,7750.00,1,0.0000,0.00),(15,'051322-1015','pending','credit',0,NULL,1,200.00,10.00,0.00,'بول 10 اعلي مول العرب',NULL,'sahmed Shreef','01065454118',NULL,'visa',NULL,NULL,NULL,NULL,NULL,1,3,'2022-05-13 00:53:42','2022-05-13 01:09:50',56,57,200.00,0,0.0000,0.00),(16,'061222-1016','pending','pay_on_delivery',0,NULL,3,150.00,0.00,0.00,'156',NULL,'Test','01150266058',NULL,'visa',NULL,NULL,NULL,NULL,NULL,4,NULL,'2022-06-12 14:03:31','2022-06-12 14:03:31',56,60,150.00,1,0.0000,0.00),(17,'061522-1017','pending','pay_on_delivery',0,NULL,1,2500.00,15.00,0.00,'156',NULL,'Test','01150266058',NULL,'visa',NULL,NULL,NULL,NULL,NULL,4,5,'2022-06-15 18:42:28','2022-06-15 18:42:28',56,NULL,3110.00,1,0.0000,625.00),(18,'070722-1018','pending','pay_on_delivery',0,NULL,3,7500.00,0.00,0.00,'الفيوم',NULL,'ahmed shreef','01065454118',NULL,'visa',NULL,NULL,NULL,NULL,NULL,1,NULL,'2022-07-06 22:14:14','2022-07-06 22:14:14',81,82,9375.00,1,0.0000,1875.00);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_translations`
--

DROP TABLE IF EXISTS `page_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `page_id` bigint(20) unsigned DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`,`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_translations`
--

LOCK TABLES `page_translations` WRITE;
/*!40000 ALTER TABLE `page_translations` DISABLE KEYS */;
INSERT INTO `page_translations` VALUES (1,'من نحن','نيفل&nbsp;<br>شركة متتخصصه في بيع وشراء المنتجات',1,'ar',NULL,NULL),(2,'About Us','asfafasf',1,'en',NULL,NULL),(3,'السياسات','',2,'ar',NULL,NULL),(4,'Policy','',2,'en',NULL,NULL),(5,'الأحكام والشروط','',3,'ar',NULL,NULL),(6,'terms and conditions','',3,'en',NULL,NULL);
/*!40000 ALTER TABLE `page_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`(191))
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'about-us',NULL,NULL),(2,'policy',NULL,NULL),(3,'terms-and-conditions',NULL,NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `email` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SAR',
  `amount` decimal(12,2) NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci,
  `transactionId` text COLLATE utf8mb4_unicode_ci,
  `cc_number` text COLLATE utf8mb4_unicode_ci,
  `refunded` tinyint(1) NOT NULL DEFAULT '0',
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (2,'paid','SAR',2700.00,'Succeeded!','c722d2e7-d8ff-401d-b7bb-9edb8974101c',NULL,0,NULL,1,'2022-05-10 17:34:32','2022-05-10 17:34:32');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'list-roles','List Roles','عرض الأدوار','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(2,'create-roles','Create Roles','إضافة الأدوار','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(3,'edit-roles','Edit Roles','تعديل الأدوار','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(4,'delete-roles','Delete Roles','حذف الأدوار','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(5,'list-categories','List Categories','عرض الأقسام','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(6,'create-categories','Create Categories','إضافة الأقسام','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(7,'edit-categories','Edit Categories','تعديل الأقسام','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(8,'delete-categories','Delete Categories','حذف الأقسام','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(9,'list-products','List Products','عرض المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(10,'create-products','Create Products','إضافة المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(11,'edit-products','Edit Products','تعديل المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(12,'delete-products','Delete Products','حذف المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(13,'list-product-colors','List Product Colors','عرض الوان المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(14,'create-product-colors','Create Product Colors','إضافة الوان المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(15,'edit-product-colors','Edit Product Colors','تعديل الوان المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(16,'delete-product-colors','Delete Product Colors','حذف الوان المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(17,'list-product-sizes','List Product Sizes','عرض احجام المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(18,'create-product-sizes','Create Product Sizes','إضافة احجام المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(19,'edit-product-sizes','Edit Product Sizes','تعديل احجام المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(20,'delete-product-sizes','Delete Product Sizes','حذف احجام المنتجات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(21,'list-coupons','List coupons','عرض كوبونات الخصم','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(22,'create-coupons','Create coupons','إضافة كوبونات الخصم','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(23,'edit-coupons','Edit coupons','تعديل كوبونات الخصم','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(24,'delete-coupons','Delete coupons','حذف كوبونات الخصم','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(25,'list-orders','List Orders','عرض الطلبات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(26,'create-orders','Create Orders','إضافة الطلبات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(27,'edit-orders','Edit Orders','تعديل الطلبات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(28,'delete-orders','Delete Orders','حذف الطلبات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(29,'list-pages','List pages','عرض الصفحات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(30,'create-pages','Create pages','إضافة الصفحات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(31,'edit-pages','Edit pages','تعديل الصفحات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(32,'delete-pages','Delete pages','حذف الصفحات','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(33,'list-admins','List Admin Users','عرض المشرفين','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(34,'create-admins','Create Admin Users','إضافة المشرفين','admin','2022-05-13 23:34:59','2022-05-13 23:34:59'),(35,'edit-admins','Edit Admin Users','تعديل المشرفين','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(36,'delete-admins','Delete Admin Users','حذف المشرفين','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(37,'list-users','List Users','عرض المستخدمون','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(38,'create-users','Create Users','إضافة المستخدمون','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(39,'edit-users','Edit Users','تعديل المستخدمون','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(40,'delete-users','Delete Users','حذف المستخدمون','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(41,'list-slider_items','List Home Slider Items','عرض الصور المتحركه','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(42,'create-slider_items','Create Home Slider Items','إضافة الصور المتحركه','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(43,'edit-slider_items','Edit Home Slider Items','تعديل الصور المتحركه','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(44,'delete-slider_items','Delete Home Slider Items','حذف الصور المتحركه','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(45,'manage-settings','Settings','الأعدادات','admin','2022-05-13 23:35:00','2022-05-13 23:35:00'),(46,'manage-backup','Manage Backup','التحكم فى النسخ الاحتياطية','admin','2022-05-13 23:35:00','2022-05-13 23:35:00');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_colors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_colors`
--

LOCK TABLES `product_colors` WRITE;
/*!40000 ALTER TABLE `product_colors` DISABLE KEYS */;
INSERT INTO `product_colors` VALUES (1,'blue','#0008ff','2022-04-16 20:35:56','2022-04-16 20:35:56'),(2,'بني','#4f300d','2022-06-13 16:08:55','2022-06-13 16:08:55'),(3,'احمر','#ff0000','2022-06-13 16:09:05','2022-06-13 16:09:05'),(4,'اسود','#171616','2022-06-13 16:09:23','2022-06-13 16:09:23'),(5,'ذهبي','#fbff00','2022-06-13 16:09:47','2022-06-13 16:09:47'),(6,'فضي','#bfbfbf','2022-06-13 16:10:33','2022-06-13 16:10:33');
/*!40000 ALTER TABLE `product_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_reviews`
--

LOCK TABLES `product_reviews` WRITE;
/*!40000 ALTER TABLE `product_reviews` DISABLE KEYS */;
INSERT INTO `product_reviews` VALUES (1,NULL,'4','asffafafa',1,18,1,'2022-05-13 02:02:59','2022-05-13 03:31:42'),(2,NULL,'1','aasdasdas',0,21,8,'2022-06-12 15:49:06','2022-06-12 15:49:06'),(3,NULL,'1','bad',0,23,4,'2022-06-13 16:45:37','2022-06-13 16:45:37'),(4,NULL,'3','good',1,23,4,'2022-06-13 16:50:16','2022-07-17 06:08:37'),(5,NULL,'5','test',1,23,4,'2022-06-14 15:26:14','2022-06-15 18:27:07');
/*!40000 ALTER TABLE `product_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sizes`
--

LOCK TABLES `product_sizes` WRITE;
/*!40000 ALTER TABLE `product_sizes` DISABLE KEYS */;
INSERT INTO `product_sizes` VALUES (2,NULL,'S','2022-04-16 20:51:22','2022-06-13 16:12:06'),(3,NULL,'xl','2022-04-16 20:51:31','2022-04-16 20:51:31'),(4,NULL,'one size','2022-06-13 16:11:39','2022-06-13 16:11:39'),(5,NULL,'M','2022-06-13 16:11:56','2022-06-13 16:11:56');
/*!40000 ALTER TABLE `product_sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_translations`
--

DROP TABLE IF EXISTS `product_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `product_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`,`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_translations`
--

LOCK TABLES `product_translations` WRITE;
/*!40000 ALTER TABLE `product_translations` DISABLE KEYS */;
INSERT INTO `product_translations` VALUES (9,'mohamed ahmed','<p>ؤششش</p>',13,'en',NULL,NULL),(10,'بسش','<p>ؤسش</p>',13,'ar',NULL,NULL),(11,'Series Gold','<p>A chain made of pure gold in addition to a rare stone<br></p>',15,'en',NULL,NULL),(12,'سلسله دهب خالص','سلسله مصنوعه من الذهب الخالص بالإضافه الى حجر نادر',15,'ar',NULL,NULL),(13,'ljfslj','<p>sagaa</p>',18,'en',NULL,NULL),(14,'p[[[[[','<p>asasa</p>',18,'ar',NULL,NULL),(15,'nard blue hagar','',21,'en',NULL,NULL),(16,'حجر نرد ازرق','',21,'ar',NULL,NULL),(17,'Bracelets','',22,'en',NULL,NULL),(18,'اساور','هذا المحتوى تم إضافته لتجربه فقط&nbsp; ،&nbsp;<span style=\"letter-spacing: normal;\">هذا المحتوى تم إضافته لتجربه فقط&nbsp; .</span>',22,'ar',NULL,NULL),(19,'Hand bag','<p>Hand bag<img src=\"data:image/jpeg;base64,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\" style=\"width: 225px;\" data-filename=\"images (1).jpg\"><br></p>',23,'en',NULL,NULL),(20,'شنطه يد','<p>شنطه يد<img src=\"data:image/jpeg;base64,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\" style=\"width: 201px;\" data-filename=\"images.jpg\"><br></p>',23,'ar',NULL,NULL);
/*!40000 ALTER TABLE `product_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `color_id` bigint(20) unsigned DEFAULT NULL,
  `size_id` bigint(20) unsigned DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special_price` decimal(12,2) DEFAULT NULL,
  `weight` double(15,4) DEFAULT '0.0000',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`,`color_id`,`size_id`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (13,'sss',200.00,1,1,10,3,NULL,NULL,NULL,'2022-04-21 19:10:14','2022-06-13 15:34:29',190.00,100.0000,1),(14,NULL,200.00,1,1,5,3,1,NULL,13,'2022-04-21 19:10:14','2022-06-13 15:34:29',0.00,100.0000,0),(15,'series-gold',200.00,1,1,2600,3,NULL,NULL,NULL,'2022-04-21 23:45:55','2022-06-12 03:58:08',180.00,0.0000,1),(16,NULL,120.00,1,1,200,3,1,NULL,15,'2022-04-21 23:45:55','2022-06-12 03:58:08',0.00,0.0000,0),(17,NULL,100.00,1,1,200,3,1,NULL,15,'2022-04-21 23:45:55','2022-06-12 03:58:08',0.00,0.0000,0),(18,'ljfslj',200.00,1,1,969,4,NULL,NULL,NULL,'2022-05-06 00:10:49','2022-06-13 17:44:53',180.00,0.0000,1),(19,NULL,200.00,1,1,99,4,1,NULL,18,'2022-05-06 00:10:49','2022-06-13 17:44:53',150.00,0.0000,0),(20,NULL,220.00,1,1,10,4,1,NULL,18,'2022-05-06 00:19:32','2022-05-06 23:32:43',130.00,0.0000,0),(21,'nard-blue-hagar',3000.00,1,1,19,4,NULL,NULL,NULL,'2022-05-06 02:15:29','2022-06-13 17:44:53',2500.00,0.0000,1),(22,'bracelets',100.00,1,0,50,5,NULL,NULL,NULL,'2022-06-09 04:37:36','2022-06-12 03:59:12',NULL,0.0000,1),(23,'hand-bag',200.00,1,1,70,8,NULL,NULL,NULL,'2022-06-13 16:20:09','2022-06-15 18:28:05',150.00,NULL,1),(24,NULL,200.00,1,1,3,8,2,NULL,23,'2022-06-13 16:20:10','2022-06-13 16:22:11',195.00,0.0000,1),(25,NULL,250.00,1,1,4,8,4,NULL,23,'2022-06-13 16:20:11','2022-06-13 16:25:27',250.00,0.0000,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super-Admin','Super-Admin','','admin','2022-04-16 20:21:01','2022-04-16 20:21:01');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'logo','/uploads/logo7918_2022_06_15.jpg',1),(2,'site_name_ar','Nephele',1),(3,'site_name_en','Nephele',1),(4,'email','nephele@nephele.com',1),(5,'site_description_ar',NULL,1),(6,'site_description_en',NULL,1),(7,'site_key_words',NULL,1),(8,'mobile','9454546',1),(9,'location','المملكه العربيه السعوديه',1),(10,'facbook_link','www.facebook.com',1),(11,'twitter_link','https://twitter.com',1),(12,'instagram_link','https://www.instagram.com',1),(13,'shipping','10',1),(14,'contact_us_map_html','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d475324.739284423!2d38.93096382656665!3d21.44988977649765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2sJeddah%20Saudi%20Arabia!5e0!3m2!1sen!2seg!4v1652475181285!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>',1),(15,'maroof_link','www.',1),(16,'vat','25',1);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_items`
--

DROP TABLE IF EXISTS `slider_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overlay_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_items`
--

LOCK TABLES `slider_items` WRITE;
/*!40000 ALTER TABLE `slider_items` DISABLE KEYS */;
INSERT INTO `slider_items` VALUES (1,'/uploads/slider/2022_05_161652662102.jpg',NULL,NULL,1,'2022-05-15 22:48:22','2022-05-15 22:48:22',NULL),(3,'/uploads/slider/2022_06_031654227560.png',NULL,NULL,1,'2022-06-03 01:39:20','2022-06-03 01:39:20',NULL);
/*!40000 ALTER TABLE `slider_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,'blogshreef@gmail.com','2022-05-13 03:46:10','2022-05-13 03:46:10'),(2,'a@a.com','2022-05-13 03:47:47','2022-05-13 03:47:47'),(3,'asdasd@asd','2022-06-12 15:39:04','2022-06-12 15:39:04'),(4,'mai.awad.off@gmail.com','2022-07-07 18:19:49','2022-07-07 18:19:49');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address_line1` text COLLATE utf8mb4_unicode_ci,
  `street_address_line2` text COLLATE utf8mb4_unicode_ci,
  `city_department` text COLLATE utf8mb4_unicode_ci,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `state_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `card_holder_name` text COLLATE utf8mb4_unicode_ci,
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visa',
  `card_issuing_bank` text COLLATE utf8mb4_unicode_ci,
  `card_number` text COLLATE utf8mb4_unicode_ci,
  `card_expiration_month` text COLLATE utf8mb4_unicode_ci,
  `card_expiration_year` text COLLATE utf8mb4_unicode_ci,
  `card_security_code` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_addresses`
--

LOCK TABLES `user_addresses` WRITE;
/*!40000 ALTER TABLE `user_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `area_id` bigint(20) unsigned DEFAULT NULL,
  `city_id` bigint(20) unsigned DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`(191),`email`(191),`area_id`,`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'sahmed Shreef','01065454118','blogshreef@gmail.com','$2y$10$R76Zf/A.f8jOVOqvn2PP/uEVxDcpFmYa4NAcCDlGMeDZPwa3RsaCG',1,'eAuehAcJ0qrjEFloIqyWoKuiZlSJ7Efr675yeUoImP3XSh6GjzjGPsPIn9i0','2022-04-27 22:14:19','2022-07-06 22:14:14',81,82,'الفيوم'),(2,'mohamed sayed','01065454119','mo@mo.com','$2y$10$36NQkhTIxSNmRML/sMqOT.bo1SzVBydnuMdO1qGZVSpvqVkT4MMAS',1,NULL,'2022-05-10 22:00:56','2022-05-10 22:23:42',NULL,NULL,'0125458888'),(3,'reem','0555000123','reem@cstech.ai','$2y$10$pEZ1oFMDl4K7USBR4Yfl0eS3CsSR0n0CqNTTu6SLkz6x.q/hRmmr2',1,NULL,'2022-06-03 02:52:06','2022-06-03 02:52:06',NULL,NULL,NULL),(4,'Test','01150266058','test@test.com','$2y$10$lteaNu6RkdFPEayNvW7p7.5.R2iwUfDiPzEk1BGwmVyaVgsQeCV7i',1,'0ruCMAYCSHMCUC222ilqSCxTQQHIpOaSilJHQTi35LcvzD0vE0BSC1aYgyQj','2022-06-12 12:55:08','2022-06-15 18:42:28',56,NULL,'156'),(5,'test user','011555044454','testuser@test.com','$2y$10$HcC9xv2oDWO4kMzJ6Wt.qee9Sm2JL1s/daAvyabC2QrgNA31DGxYm',1,NULL,'2022-06-12 12:57:15','2022-06-12 12:57:15',NULL,NULL,NULL),(6,'test user1','01004527507','testuser1@test.com','$2y$10$bKJ3t7PonmjrH7TIV4tcrOktz27w8B56BxNutTBKCMwrsXtOjxY/6',1,'XwxnVfjUFnfd54mQWhjISeNdmy4EgxMj5tKOL9gXsoySbsTfGZ8vSKU1t81a','2022-06-12 12:58:38','2022-06-12 12:58:38',NULL,NULL,NULL),(7,'test02','01010101010','test02@site.com','$2y$10$TLHv2G3KFBfkaP4RXuoeC.9Iut0GM8EQt7OTcZT4nwULHOs95nQl6',1,NULL,'2022-06-12 15:34:31','2022-06-12 15:34:31',NULL,NULL,NULL),(8,'test','h123gj','test@sd','$2y$10$JFM1dBxPbsCy2s.iOUYV0eqYdZhEqpv6Jcrcx2JoGqr1xHzhvZivq',1,NULL,'2022-06-12 15:35:40','2022-06-12 15:35:40',NULL,NULL,NULL),(9,'aya','99887766554433','test@t.com','$2y$10$zsNhYyUn44Gj6QGMdGHvjO1O5GwVsHFDLv1bzu8wJ0rehJ5kJaK52',1,NULL,'2022-06-13 16:49:16','2022-06-13 16:49:16',NULL,NULL,NULL),(10,'aaa','99999454545','testngfgf@test.com','$2y$10$aw9i33eb7qBsCSmIJkrntuqHZ308DUK148.J97RO/ECd/CDR3hBge',1,NULL,'2022-06-14 15:23:55','2022-06-14 15:23:55',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (3,3,13),(4,4,22),(1,8,22);
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-25 16:30:31