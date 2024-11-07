<?php

if (checkrequestmethod("GET")) {
    $category_id = sanitizeinput($_GET["id"]);
    $category_name = getrow("categories",$category_id);
   

    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("categories", $category_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=edit-category");
    }


    // redirect("index.php?page=add-category");
}





require_once(ADMIN_PATH. "views/categories/edit.php");