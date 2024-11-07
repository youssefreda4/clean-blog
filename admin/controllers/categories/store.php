<?php



if (checkrequestmethod("POST")) {
    $category_name = sanitizeinput($_POST["name"]);

    //name 
    if (!required($category_name)) {
        setsession("errors", "name is required");
    } else if (!minlenght($category_name, 3)) {
        setsession("errors", "name should be at least 3 characters long");
    } else if (!maxlenght($category_name, 50)) {
        setsession("errors", "name must be less than 50 characters");
    }

    if (!empty(getsession("errors"))) {
        redirect("index.php?page=add-category");
        exit;
        die;
    } else {

        
        $dbinsert = insert("categories", ["name" => $category_name]);

        if (!$dbinsert) {
            setsession("errors", "failed to save category");
        } else {
            setsession("success", "data saved successfully");
        }
    }

    redirect("index.php?page=add-category");
}
