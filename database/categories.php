<?php

$sql = "CREATE TABLE IF NOT EXISTS `categories`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL
)";

$result = mysqli_query($conn, $sql);

// add categorys
// $sql = "INSERT INTO `categories` (`name`)
//          VALUES ('Historical'),
//                 ('News'),
//                 ('Health')";
// $result = mysqli_query($conn, $sql);