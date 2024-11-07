<?php

$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS `clean-blog`";

$result = mysqli_query($conn, $sql);

if ($result) {
    mysqli_close($conn);
    $conn = mysqli_connect("localhost", "root", "", "clean-blog");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
}

require_once BASE_PATH . "database/users.php";
require_once BASE_PATH . "database/categories.php";
require_once BASE_PATH . "database/posts.php";
require_once BASE_PATH . "database/comments.php";
require_once BASE_PATH . "database/massages.php";
require_once BASE_PATH . "database/settings.php";
