<?php
include ('includes/db.php');

if (mysqli_connect_errno())
    exit('Error, create SHOP db');
mysqli_query($mysqli,"CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  `date` int(25) DEFAULT NULL,
  `action` int(1) NOT NULL DEFAULT '1',
  `qty` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

mysqli_query($mysqli, "CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

mysqli_query($mysqli, "INSERT INTO `categories` (`id`, `name`, `cat_id`) VALUES
(1, 'Ноутбуки', 'notebook'),
(2, 'Персональные компьютеры', 'pc')");

mysqli_query($mysqli, "CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `price` int(8) DEFAULT NULL,
  `qty` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `post_index` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

mysqli_query($mysqli,"CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

echo "OK";