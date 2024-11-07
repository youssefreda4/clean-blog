<?php



if (checkrequestmethod("GET")) {
    $user_id = sanitizeinput($_GET["id"]);

    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("users", $user_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=users");
    }
    
    if (!empty(getsession("errors"))) {
        redirect("index.php?page=users");
    } else {
        deleterow("users", $user_id);
    }
    redirect("index.php?page=users");
}