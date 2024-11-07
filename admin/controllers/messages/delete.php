<?php


if (checkrequestmethod("GET")) {
    $message_id = sanitizeinput($_GET["id"]);

    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("messages", $message_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=messages");
    }
    
    if (!empty(getsession("errors"))) {
        redirect("index.php?page=messages");
    } else {
        deleterow("messages", $message_id);
    }
    redirect("index.php?page=messages");
}
