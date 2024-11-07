<?php

$sql = "CREATE TABLE IF NOT EXISTS `settings`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `site_name` VARCHAR(255) NOT NULL,
    `logo` VARCHAR(255) NOT NULL,
    `home_title` VARCHAR(255) NOT NULL,
    `about_title` VARCHAR(255) NOT NULL,
    `contact_title` VARCHAR(255) NOT NULL,
    `about_content` TEXT NOT NULL,
    `facebook` VARCHAR(255) NOT NULL,
    `linkedin` VARCHAR(255) NOT NULL,
    `github` VARCHAR(255) NOT NULL,
    `sign-up`VARCHAR(255)  NOT NULL,
    `login` VARCHAR(255) NOT NULL
)";

$result = mysqli_query($conn, $sql);


// $sql = "INSERT INTO `settings` (`site_name`,`logo`,`home_title`,`about_title`,`contact_title`,`about_content`,`facebook`,`linkedin`,`github`,`sign-up`)
//                     VALUES('CLEAN BLOG','logo.png','home page','about page','contact page','about content','www.facebook.com','www.linkedin.com','www.github.com','sign-up')
// ";
$result = mysqli_query($conn, $sql);