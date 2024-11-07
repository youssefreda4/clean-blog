<?php


$sql = "CREATE TABLE IF NOT EXISTS `comments`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `content` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `post_id` INT(11) NOT NULL,
    `user_id` INT(11) NOT NULL,
    `category_id` INT(11) NOT NULL,
    FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
)";

$result = mysqli_query($conn, $sql);