<?php

if (checkrequestmethod("GET")) {
    $post_id = sanitizeinput($_GET["id"]);

    if (!check_id("posts", $post_id)) {
        redirect("index.php?page=notfound");
        die;
    }
    $post = getrow("posts", $post_id);
    $image_path = $post["image"];

    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("posts", $post_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=profile");
    }

    if (!empty(getsession("errors"))) {
        redirect("index.php?page=profile");
    } else {
        if(!isset($image_path)){
            unlink(BASE_PATH . "database/uploads/img/" . $image_path);
        }
        deleterow("posts", $post_id);
    }
    redirect("index.php?page=profile");
}