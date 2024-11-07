<?php


if (checkrequestmethod("GET")) {
    $post_id = sanitizeinput($_GET["id"]);

    $post = getrow("posts", $post_id);
    $image_path = $post["image"];

    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("posts", $post_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=posts");
    }

    if (!empty(getsession("errors"))) {
        redirect("index.php?page=posts");
    } else {
        if(!isset($image_path)){
            unlink(BASE_PATH . "database/uploads/img/" . $image_path);
        }
        
        deleterow("comments", $post_id);
        deleterow("posts", $post_id);
    }
    redirect("index.php?page=posts");
}
