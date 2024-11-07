<?php

$errors = [];
if (checkrequestmethod("POST") && isset($_POST["title"])) {

    $post_id = $_POST["id"];
    $user_id = ($_POST["user_id"]);

    $post = getrow("posts", $post_id);
    $old_image = $post["image"];

    $title = sanitizeinput($_POST["title"]);
    $content = sanitizeinput($_POST["content"]);
    $small_desc = sanitizeinput($_POST['small_desc']);
    $selected_val = sanitizeinput($_POST["category"]);
    $image = $_FILES['image'];

    //title 
    if (!required($title)) {
        $errors[] = "title is required";
    } else if (!minlenght($title, 3)) {
        $errors[] = "title should be at least 3 characters long";
    } else if (!maxlenght($title, 50)) {
        $errors[] = "title must be less than 50 characters";
    }

    //content 
    if (!required($content)) {
        $errors[] = "content is required";
    } else if (!minlenght($content, 15)) {
        $errors[] = "content should be at least 15 characters long";
    } else if (!maxlenght($content, 70)) {
        $errors[] = "content must be less than 70 characters";
    }

    //small_desc 
    if (!required($small_desc)) {
        $errors[] = "Description is required";
    } else if (!minlenght($title, 10)) {
        $errors[] = "Description should be at least 10 characters long";
    } else if (!maxlenght($title, 50)) {
        $errors[] = "Description must be less than 50 characters";
    }

    if (!required($selected_val)) {
        $errors[] = "Category is required";
    }


    if (empty($image['tmp_name'])) {
        $image_name = $old_image;

    } else {

        if (file_exists(BASE_PATH . "database/uploads/img/$old_image")) {
            unlink(BASE_PATH . "database/uploads/img/$old_image");
        }

        $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
        $image_name = uniqid("", true) . "." . $ext;
        $destnotion = BASE_PATH . "database/uploads/img/" . $image_name;
        move_uploaded_file($image["tmp_name"], $destnotion);
    }


    if (!empty($errors)) {
        setsession("errors", $errors);
        redirect("index.php?page=edit-post&id=$post_id");
        exit;
        die;
    } else {
        $data = [
            "title" => $title,
            "content" => $content,
            "small_desc" => $small_desc,
            "user_id" => $user_id,
            "category_id" => $selected_val,
            "image" => $image_name
        ];

        $dbupdate = update("posts", $data, $post_id);
        if (!$dbupdate) {
            $errors[] =  "failed to save category";
            setsession("errors", $errors);
        }
    }
    redirect("index.php?page=edit-post&id=$post_id");
}
