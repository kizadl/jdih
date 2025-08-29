CREATE TABLE `izin_dokumen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) NOT NULL,
  `dokumen_id` varchar(255) NOT NULL,
  `status` tinyint DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx-izin_dokumen-client_id` (`client_id`),
  KEY `idx-izin_dokumen-dokumen_id` (`dokumen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;