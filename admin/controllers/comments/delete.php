<?php



if (checkrequestmethod("GET")) {

    $comment_id = sanitizeinput($_GET["id"]);
// dd($comment_id);
    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("comments", $comment_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=comments");
    }

    if (!empty(getsession("errors"))) {
        redirect("index.php?page=comments");
    } else {
        deleterow("comments",  $comment_id);
    }
    redirect("index.php?page=comments");
}
