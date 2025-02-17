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
-- Table structure for table `commentLikes`
--

DROP TABLE IF EXISTS `commentLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentLikes` (
  `user_id` bigint NOT NULL,
  `comment_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`comment_id`),
  KEY `fk_commentLikes_comments` (`comment_id`),
  CONSTRAINT `fk_commentLikes_comments` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  CONSTRAINT `fk_commentLikes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentLikes`
--

LOCK TABLES `commentLikes` WRITE;
/*!40000 ALTER TABLE `commentLikes` DISABLE KEYS */;
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
  `user_id` bigint DEFAULT NULL,
  `post_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-12_1739333405_CreateUserTable1.php'),(2,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-13_1739415037_CreatePostTable1.php'),(3,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-14_1739528035_CreateUserSettingsTable1.php'),(4,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-14_1739532185_CreatePostLikesTable1.php'),(6,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-15_1739611759_CreateCategoriesTable1.php'),(7,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-15_1739612614_CreateTagsTable1.php'),(8,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-15_1739612750_CreatePostTagsTable1.php'),(9,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-15_1739613835_CreateCommentsTable1.php'),(10,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-15_1739614024_CreateCommentLikesTable1.php'),(12,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-16_1739674475_UpdateUserTable1.php'),(13,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-16_1739675476_UpdatePostTable1.php'),(14,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739789845_UpdateUserTable2.php'),(15,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739790075_CreateSubscriptionTable1.php'),(16,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739793693_UpdatePostTable2.php'),(17,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739793867_DeleteCategoryTable1.php'),(18,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739794446_CreateTaxonomyTable1.php'),(19,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739794901_DeletePostTagTable1.php'),(20,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739795062_DeleteTagTable1.php'),(21,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739795467_CreateTaxonomyTermTable1.php'),(22,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739796159_CreatePostTaxonomyTable1.php'),(23,'/home/ikumo1118/web/recursion-cs/backend-project-5/practice/Commands/Programs/../../Database/Migrations/2025-02-17_1739797238_UpdateTaxonomyTable.php');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postLikes`
--

DROP TABLE IF EXISTS `postLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postLikes` (
  `user_id` bigint NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`post_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `postLikes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `postLikes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postLikes`
--

LOCK TABLES `postLikes` WRITE;
/*!40000 ALTER TABLE `postLikes` DISABLE KEYS */;
/*!40000 ALTER TABLE `postLikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postTaxonomies`
--

DROP TABLE IF EXISTS `postTaxonomies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postTaxonomies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int DEFAULT NULL,
  `taxonomy_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_postTaxonomies_posts` (`post_id`),
  KEY `fk_postTaxonomies_taxonomyTerms` (`taxonomy_id`),
  CONSTRAINT `fk_postTaxonomies_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `fk_postTaxonomies_taxonomyTerms` FOREIGN KEY (`taxonomy_id`) REFERENCES `taxonomyTerms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postTaxonomies`
--

LOCK TABLES `postTaxonomies` WRITE;
/*!40000 ALTER TABLE `postTaxonomies` DISABLE KEYS */;
/*!40000 ALTER TABLE `postTaxonomies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subscription` varchar(255) DEFAULT NULL,
  `subscription_status` varchar(255) DEFAULT NULL,
  `subscriptionCreatedAt` datetime DEFAULT NULL,
  `subscriptionEndsAt` datetime DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomies`
--

DROP TABLE IF EXISTS `taxonomies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `taxonomyName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomies`
--

LOCK TABLES `taxonomies` WRITE;
/*!40000 ALTER TABLE `taxonomies` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxonomies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomyTerms`
--

DROP TABLE IF EXISTS `taxonomyTerms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomyTerms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `taxonomyTermName` varchar(255) NOT NULL,
  `taxonomyType_id` int DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `parentTaxonomyTerm` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taxonomyType_id` (`taxonomyType_id`),
  CONSTRAINT `fk_taxonomyType_id` FOREIGN KEY (`taxonomyType_id`) REFERENCES `taxonomies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomyTerms`
--

LOCK TABLES `taxonomyTerms` WRITE;
/*!40000 ALTER TABLE `taxonomyTerms` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxonomyTerms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userSettings`
--

DROP TABLE IF EXISTS `userSettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userSettings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `metaKey` varchar(255) NOT NULL,
  `metaValue` varchar(255) NOT NULL,
  `user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `userSettings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2025-02-17 22:03:10
