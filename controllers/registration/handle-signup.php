<?php
$errors = [];

if (checkrequestmethod("POST")) {

    $name = sanitizeinput($_POST["name"]);
    $username = sanitizeinput($_POST["username"]);
    $password = sanitizeinput($_POST["password"]);
    $repeatedpassword = sanitizeinput($_POST["repeatedpassword"]);

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

    //password 
    if (!required($password)) {
        $errors[] = "password is required";
    } else if (!minlenght($password, 3)) {
        $errors[] = "password should be at least 3 characters long";
    } else if (!maxlenght($password, 15)) {
        $errors[] = "password must be less than 15 characters";
    }

    if($password != $repeatedpassword){
        $errors[] = "password does not match";
        
    }


    if (!empty($errors)) {
        setsession("errors", $errors);
        redirect("index.php?page=sign-up");
        exit;
        die;
    } else {
        $dbinsert = insert("users", [
            "name" => $name,
            "username" => $username,
            "password" => sha1($password),
        ]);

        if (!$dbinsert) {
            setsession("errors", "failed to signup");
        }
    }
    redirect("index.php?page=login");
}
