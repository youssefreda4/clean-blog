<?php
$errors = [];

if (isset($_POST['title']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $title = sanitizeinput($_POST["title"]);
    $content = sanitizeinput($_POST["content"]);
    $small_desc = sanitizeinput($_POST['small_desc']);
    $selected_val = sanitizeinput($_POST["category"]);
    $image = $_FILES['image'];

    $user_id = ($_POST["user_id"]);

   
    //title 
    if (!required($title)) {
        $errors[] = "title is required";
    } else if (!minlenght($title, 3)) {
        $errors[] = "title should be at least 3 characters lon";
    } else if (!maxlenght($title, 50)) {
        $errors[] = "title must be less than 50 characters";
    }

    //content
    if (!required($content)) {
        $errors[] = "content is required";
    } else if (!minlenght($content, 10)) {
        $errors[] = "content should be at least 10 characters lon";
    } else if (!maxlenght($content, 150)) {
        $errors[] = "content must be less than 150 characters";
    }

    //small_desc
    if (!required($small_desc)) {
        $errors[] = "Small Description is required";
    } else if (!minlenght($small_desc, 10)) {
        $errors[] = "Small Description should be at least 10 characters lon";
    } else if (!maxlenght($small_desc, 100)) {
        $errors[] = "Small Description must be less than 100 characters";
    }

    //selected_val
    if (!required($selected_val)) {
        $errors[] = "Category is required";
    } 

    if (!empty($image['tmp_name'])) {
        $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
        $new_name = uniqid("", true) . "." . $ext;
        $destnotion = BASE_PATH . "database/uploads/img/" . $new_name;
        move_uploaded_file($image["tmp_name"], $destnotion);
    }else{
        $new_name = NULL;
    }


    if (!empty($errors)) {
        setsession("errors", $errors);
    } else {
        $dbinsert = insert("posts", [
            "title" => $title,
            "content" => $content,
            "small_desc" => $small_desc,
            "user_id" => $user_id,
            "category_id" => $selected_val,
            "image" => $new_name
        ]);
        
        if (!$dbinsert) {
            setsession("errors", "failed to save category");
        } else {
            setsession("success", "data saved successfully");
        }

        header("location:index.php?page=add-post");
    }
    header("location:index.php?page=add-post");

}
