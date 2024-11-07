<?php



if (checkrequestmethod("POST")) {
    $comment = sanitizeinput($_POST["comment"]);
    $post_id = sanitizeinput($_POST["post_id"]);
    $user_id = sanitizeinput($_POST["user_id"]);
    $cat_id = sanitizeinput($_POST["cat_id"]);
 

    //comment 
    if (!required($comment)) {
        setsession("errors", "comment is required");
    } else if (!minlenght($comment, 5)) {
        setsession("errors", "comment should be at least 5 characters long");
    } else if (!maxlenght($comment, 80)) {
        setsession("errors", "comment must be less than 80 characters");
    }

    if (!empty(getsession("errors"))) {
        redirect("index.php?page=comment&id=" . $post_id);
        exit;
        die;
    } else {

        $data = [
            "content" => $comment,
            "post_id" => $post_id,
            "user_id" => $user_id,
            "category_id" => $cat_id,
        ];
        
        $dbinsert = insert("comments", $data );

        if (!$dbinsert) {
            setsession("errors", "failed to save comment");
        } else {
            setsession("success", "comment saved successfully");
        }
    }

    redirect("index.php?page=comment&id=" . $post_id);
}
