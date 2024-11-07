<?php
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $post_id = $_GET["id"];

    if (!check_id("posts", $post_id)) {
        redirect("index.php?page=notfound");
        die;
    }

    $posts = jointable('posts', 'categories', 'category_id', 'id', 'WHERE posts.id =' . $post_id);

    // $post = getrow(`posts`, $post_id);
} else {

    redirect("index.php?page=notfound");
    die;
}

// dd($posts);
require_once BASE_PATH . "views/post.php";
