<?php
$errors = [];

if (checkrequestmethod("POST")) {

    $username = sanitizeinput($_POST["username"]);
    $password = sanitizeinput($_POST["password"]);
    $hashedpass = sha1($password);

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

    if (!check_username("users", $username)) {
        $errors[] = "password or username incorrect ";
    } elseif (!check_password("users", $hashedpass)) {
        $errors[] = "password or username incorrect ";
    }



    if (!empty($errors)) {
        setsession("errors", $errors);
        redirect("index.php?page=login");
        exit;
        die;
    } else {

        if (!check_type("users", $username)) {
            $userid = get_id("users", $username);
            setsession("userid", $userid);
            redirect("admin/index.php?page=home");
            die;
        }
        
        $userid = get_id("users", $username);
        
        setsession("userid", $userid);
    }
    redirect("index.php?page=home");
}
