<?php
require_once BASE_PATH . "core/request.php";
require_once BASE_PATH . "core/validation.php";
$errors = [];
if (checkrequestmethod("POST")) {
    $name = sanitizeinput($_POST["name"]);
    $subject = sanitizeinput($_POST["subject"]);
    $email = sanitizeinput($_POST["email"]);
    $content = sanitizeinput($_POST["content"]);

    //name 
    if (!required($name)) {
        $errors[] = "name is required";
    } else if (!minlenght($name, 3)) {
        $errors[] = "name should be at least 3 characters lon";
    } else if (!maxlenght($name, 50)) {
        $errors[] = "name must be less than 50 characters";
    }

    //subject
    if (!required($subject)) {
        $errors[] = "subject is required";
    } else if (!minlenght($subject, 3)) {
        $errors[] = "subject should be at least 3 characters lon";
    } else if (!maxlenght($subject, 20)) {
        $errors[] = "subject must be less than 20 characters";
    }

    //email
    if (!required($email)) {
        $errors[] = "email is required";
    } else if (!validemail($email)) {
        $errors[] = "please enter a valid email";
    }

    //content
    if (!required($content)) {
        $errors[] = "content is required";
    } else if (!minlenght($content, 10)) {
        $errors[] = "content should be at least 10 characters lon";
    } else if (!maxlenght($content, 150)) {
        $errors[] = "content must be less than 150 characters";
    }

    if (!empty($errors)) {
        setsession("errors", $errors);
    } else {
        $dbinsert = insert("messages", ["name" => $name, "subject" => $subject, "email" => $email, "content" => $content]);

        if (!$dbinsert) {
            setsession("errors", "failed to send message");
        } else {
            setsession("success", "message send successfully");
        }
    }



    header("location:" . url("index.php?page=contact"));
}
