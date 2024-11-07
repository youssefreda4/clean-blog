<?php



if (checkrequestmethod("GET")) {
    $user_id = sanitizeinput($_GET["id"]);
    $user = getrow("users",$user_id);
   

    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("users", $user_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=edit-user");
    }

    // redirect("index.php?page=users");
    
}




require_once(ADMIN_PATH . "views/users/edit.php");
