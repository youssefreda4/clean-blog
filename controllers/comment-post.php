<?php

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $post_id = $_GET["id"];

    if (!check_id("posts", $post_id)) {
        redirect("index.php?page=notfound");
        die;
    }

    // $comments = getall("comments" , where: $post_id);
    $comments = jointableusercomment('comments', 'users', 'user_id', 'id', 'WHERE comments.post_id =' . $post_id);
    
    // dd($comments);
    // die;
    $posts = jointable('posts', 'categories', 'category_id', 'id', 'WHERE posts.id =' . $post_id);

    // $post = getrow(`posts`, $post_id);
} else {

    redirect("index.php?page=notfound");
    die;
}

require_once BASE_PATH . "views/comment-post.php";
