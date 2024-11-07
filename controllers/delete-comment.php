<?php


if (checkrequestmethod("GET")) {
    $post_id = sanitizeinput($_GET["post_id"]);

    $comment_id = sanitizeinput($_GET["id"]);
    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("comments", $comment_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=comment&id=".$post_id);
    }

    if (!empty(getsession("errors"))) {
        redirect("index.php?page=comment&id=".$post_id);
    } else {
        deleterow("comments", $comment_id);
    }
    redirect("index.php?page=comment&id=".$post_id);
}
