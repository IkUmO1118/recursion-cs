-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: practice_db
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.20.04.1

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('book-search-title-cee9cf2d30c165db805e581a6f58c9aa','{\"author_key\":[\"OL27349A\"],\"author_name\":[\"F. Scott Fitzgerald\"],\"cover_edition_key\":\"OL22570129M\",\"cover_i\":10590366,\"edition_count\":1174,\"first_publish_year\":1920,\"has_fulltext\":true,\"ia\":[\"in.ernet.dli.2015.184960\",\"el_gran_gatsby_edincr\",\"greatgatsby0000fitz_c5u7\",\"elgrangatsby0000fitz_w6o4\",\"gatsby0000fitz\",\"liaobuqidegaicib0000fitz_p7x9\",\"isbn_9783257236927\",\"elgrangatsby0000unse_x0a7\",\"liaobuqidegaicib0000meif\",\"greatgatsbyfitzg0000fsco\",\"liaobuqidegaizib0000fitz\",\"greatgatsby0000fitz_u2y5\",\"isbn_9780582329164\",\"greatgatsby0039fitz\",\"greatgatsby1995fitz\",\"greatgatsby0000fitz_q1i5\",\"greatgatsby0000fitz_e1p9\",\"greatgatsby1953fitz\",\"elgrangatsby0000fitz\",\"liaobuqidegaicib0000fitz\",\"greatgatsbyfitzrich\",\"wielkigatsby00fitz\",\"greatgatsby0000fitz_t1j1\",\"greatgatsbyreiss00fitz\",\"greatgatsby00fitz\",\"dahengxiaozhuan0000fitz\",\"elgrangatsby0000fitz_o1j9\",\"greatgatsby0000fitz_y7h1\",\"greatgatsby0000fitz_u2h3\",\"greatgatsby0000fitz_o4u5\",\"greatgatsbyfitz00fitz\",\"elgrangatsby0000fsco_j8u1\",\"elgrangatsby0000fitz_y8k4\",\"elgrangatsby0000fitz_w0g3\",\"greatgatsbywiseh0000fitz\",\"gatsbylemagnifiq0000fitz\",\"greatgatsby0000fitz_d0s0\",\"elgrangatsby0000fsco\",\"greatgatsby00fitzrich\",\"greatgatsby0000fitz_k0u5\",\"greatgat00fitz\",\"greatgat00fitz\",\"isbn_B0007DQHPM\",\"greatgatsb00fitz\",\"isbn_9780023957109\",\"greatgatsby000fitz\",\"greatgatsbyfacsi0000fitz\",\"dergroegatsby00fitz_590\",\"dergroegatsbyrom00fitz\",\"greatgatsbywords00fitz\"],\"ia_collection_s\":\"JaiGyan;americana;americanuniversity-ol;bannedbooks;belmont-ol;binghamton-ol;booksbylanguage;booksbylanguage_danish;bostonuniversitylibraries-ol;cnusd-ol;cua-ol;dartmouthlibrary-ol;delawarecountydistrictlibrary;delawarecountydistrictlibrary-ol;denverpubliclibrary-ol;digitallibraryindia;drakeuniversity-ol;hamiltonpubliclibrary-ol;inlibrary;internetarchivebooks;johnshopkins-ol;kalamazoocollege-ol;library_of_atlantis;marymount-ol;miltonpubliclibrary-ol;occidentalcollegelibrary-ol;openlibrary-d-ol;popularchinesebooks;printdisabled;randolph-macon-college-ol;riceuniversity-ol;rochester-ol;salisburyfreelibrary-ol;spokanepubliclibrary-ol;stmaryscountylibrary;the-claremont-colleges-ol;tulsacc-ol;udc-ol;unb-ol;uni-ol;universityofcoloradoboulder-ol;universityofoklahoma-ol;universityofthewest-ol;uslprototype;wilsoncollege-ol;worthingtonlibraries-ol\",\"key\":\"/works/OL468431W\",\"language\":[\"eng\",\"por\",\"pol\",\"spa\",\"ind\",\"rum\",\"ger\",\"chi\",\"ita\",\"kor\",\"fre\",\"dan\",\"heb\",\"dut\",\"jpn\",\"swe\"],\"lending_edition_s\":\"OL26441901M\",\"lending_identifier_s\":\"in.ernet.dli.2015.184960\",\"public_scan_b\":true,\"title\":\"The Great Gatsby\",\"id_project_gutenberg\":[\"64317\"]}','2025-02-10 08:58:32');
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentLikes`
--

DROP TABLE IF EXISTS `commentLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentLikes` (
  `userID` int NOT NULL,
  `postID` int DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `fk_posts_commentLike` (`postID`),
  CONSTRAINT `commentLikes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_posts_commentLike` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentLikes`
--

LOCK TABLES `commentLikes` WRITE;
/*!40000 ALTER TABLE `commentLikes` DISABLE KEYS */;
INSERT INTO `commentLikes` VALUES (1,NULL);
/*!40000 ALTER TABLE `commentLikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commentText` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `userID` int DEFAULT NULL,
  `postID` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `postID` (`postID`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Comment 1','2025-02-06','2025-02-06',1,1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-12_1739333405_CreateUserTable1.php'),(2,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-13_1739415037_CreatePostTable1.php');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postLikes`
--

DROP TABLE IF EXISTS `postLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postLikes` (
  `userID` int NOT NULL,
  `postID` int NOT NULL,
  PRIMARY KEY (`userID`,`postID`),
  KEY `postID` (`postID`),
  CONSTRAINT `postLikes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  CONSTRAINT `postLikes_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postLikes`
--

LOCK TABLES `postLikes` WRITE;
/*!40000 ALTER TABLE `postLikes` DISABLE KEYS */;
INSERT INTO `postLikes` VALUES (1,1);
/*!40000 ALTER TABLE `postLikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postTags`
--

DROP TABLE IF EXISTS `postTags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postTags` (
  `postID` int NOT NULL,
  `tagID` int NOT NULL,
  PRIMARY KEY (`postID`,`tagID`),
  KEY `tagID` (`tagID`),
  CONSTRAINT `postTags_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`),
  CONSTRAINT `postTags_ibfk_2` FOREIGN KEY (`tagID`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postTags`
--

LOCK TABLES `postTags` WRITE;
/*!40000 ALTER TABLE `postTags` DISABLE KEYS */;
/*!40000 ALTER TABLE `postTags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `userID` int DEFAULT NULL,
  `categoryID` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `fk_posts_category` (`categoryID`),
  CONSTRAINT `fk_posts_category` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Post 1','Content of post 1','2025-02-06','2025-02-06',1,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tagName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userSettings`
--

DROP TABLE IF EXISTS `userSettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userSettings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int DEFAULT NULL,
  `metaKey` varchar(50) DEFAULT NULL,
  `metaValue` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  CONSTRAINT `userSettings_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userSettings`
--

LOCK TABLES `userSettings` WRITE;
/*!40000 ALTER TABLE `userSettings` DISABLE KEYS */;
/*!40000 ALTER TABLE `userSettings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `subscription` varchar(255) DEFAULT NULL,
  `subscription_status` varchar(255) DEFAULT NULL,
  `subscriptionCreatedAt` date DEFAULT NULL,
  `subscriptionEndsAt` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user1','test@example.com','password','2025-02-06','2025-02-06',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-14 12:48:12
