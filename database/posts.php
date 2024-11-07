<?php

$sql = "CREATE TABLE IF NOT EXISTS `posts`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `small_desc` VARCHAR(255) NOT NULL,
    `status` ENUM('active','not_active') NOT NULL DEFAULT 'active',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `user_id` INT(11) NOT NULL,
    `comment_id` INT(11) NOT NULL,
    `category_id` INT(11) NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`),
    FOREIGN KEY (`comment_id`) REFERENCES `comments`(`id`),
    `image` VARCHAR(200) DEFAULT `NULL`
)";

$result = mysqli_query($conn, $sql);




// add posts
// $sql = "INSERT INTO `posts` (`title`,`content`,`small_desc`,`user_id`,`category_id`)
//                     VALUE ('Man must explore, and this is exploration at its greatest','I believe every human has a finite number of heartbeats. I dont intend to waste any of mine.','Problems look mighty small from 150 miles up','1','1'),
//                     ('Man must explore, and this is exploration at its greatest','I believe every human has a finite number of heartbeats. I dont intend to waste any of mine.','Problems look mighty small from 150 miles up','2','2'),
//                     ('Man must explore, and this is exploration at its greatest','I believe every human has a finite number of heartbeats. I dont intend to waste any of mine.','Problems look mighty small from 150 miles up','3','3'),
//                     ('Man must explore, and this is exploration at its greatest','I believe every human has a finite number of heartbeats. I dont intend to waste any of mine.','Problems look mighty small from 150 miles up','2','1'),
//                     ('Man must explore, and this is exploration at its greatest','I believe every human has a finite number of heartbeats. I dont intend to waste any of mine.','Problems look mighty small from 150 miles up','3','1'),
//                     ('Man must explore, and this is exploration at its greatest','I believe every human has a finite number of heartbeats. I dont intend to waste any of mine.','Problems look mighty small from 150 miles up','2','3')

// ";
// $result = mysqli_query($conn, $sql);

