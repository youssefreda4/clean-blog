<?php

$sql = "CREATE TABLE IF NOT EXISTS `users`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) UNIQUE NOT NULL,
    `type` ENUM('admin','user') NOT NULL DEFAULT 'user',
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$result = mysqli_query($conn, $sql);

//add users
// $password = password_hash("123456", PASSWORD_DEFAULT);
// $sql = "INSERT INTO `users` (`name`,`username`,`type`,`password`)
//         VALUES ('youssef reda' , 'youssef101' , 1 , '$password'),
//                ('ahmed reda' , 'ahmed102' , 1 , '$password'),
//                ('mustafa sherif' , 'mustafa103' , 1 , '$password'),
//                ('zyad ahmed' , 'zyad104' , 1 , '$password')";
// $result = mysqli_query($conn, $sql);