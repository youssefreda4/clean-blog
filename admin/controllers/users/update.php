<?php
$errors = [];

if (checkrequestmethod("POST")) {
    $userid = sanitizeinput($_POST["userid"]);

    $name = sanitizeinput($_POST["name"]);
    $username = sanitizeinput($_POST["username"]);
    $type = sanitizeinput($_POST["type"]);


    //name 
    if (!required($name)) {
        $errors[] = "name is required";
    } else if (!minlenght($name, 3)) {
        $errors[] = "name should be at least 3 characters long";
    } else if (!maxlenght($name, 15)) {
        $errors[] = "name must be less than 15 characters";
    }

    //username 
    if (!required($username)) {
        $errors[] = "username is required";
    } else if (!minlenght($username, 3)) {
        $errors[] = "username should be at least 3 characters long";
    } else if (!maxlenght($username, 20)) {
        $errors[] = "username must be less than 20 characters";
    }


    if (!required($type)) {
        $errors[] = "type is required";
    }

    if (!empty($errors)) {
        setsession("errors", $errors);
        redirect("index.php?page=edit-user&id=$userid");
        exit;
        die;
    } else {
        $data = [
            "name" => $name,
            "username" => $username,
            "type" => $type,
        ];
        $dbinsert = update("users", $data ,$userid);

        if (!$dbinsert) {
            setsession("errors", "failed to update");
        } else {
            setsession("success", "updated successfully");
        }
    }
    redirect("index.php?page=users");
}
