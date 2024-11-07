<?php

if (checkrequestmethod("POST")) {
    $category_name = sanitizeinput($_POST["name"]);
    $category_id = sanitizeinput($_POST["id"]);

    //name 
    if (!required($category_name)) {
        setsession("errors", "name is required");
    } else if (!minlenght($category_name, 3)) {
        setsession("errors", "name should be at least 3 characters long");
    } else if (!maxlenght($category_name, 50)) {
        setsession("errors", "name must be less than 50 characters");
    }

    if (!empty(getsession("errors"))) {
        redirect("index.php?page=categories");
        exit;
        die;
    } else {
        $data = [
            "name" => $category_name
        ];
        $dbupdate = update("categories", $data, $category_id);

        if ($dbupdate == false) {
            setsession("errors", "failed to update category");
        } else {
            setsession("success", "data updated successfully");
        }
    }

    redirect("index.php?page=categories");
}
