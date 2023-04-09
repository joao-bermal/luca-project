<?php

require_once 'routes/api.php';
require_once 'config/Database.php';

$conn = (new Database())->getConnection();

$sql = "CREATE TABLE IF NOT EXISTS `Product` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `sku` varchar(255) DEFAULT NULL,
        `name` varchar(255) DEFAULT NULL,
        `price` decimal(10,2) DEFAULT NULL,
        `type` varchar(255) DEFAULT NULL,
        `properties` json DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$conn->exec($sql);

// phpinfo();