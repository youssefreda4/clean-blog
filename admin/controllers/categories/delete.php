<?php

if (checkrequestmethod("GET")) {
    $category_id = sanitizeinput($_GET["id"]);

    if (!numeric($_GET["id"])) {
        setsession("errors", "id must be a numeric");
    } else if (!check_id("categories", $category_id)) {
        setsession("errors", "id not found");
        redirect("index.php?page=categories");
    }

    if (!empty(getsession("errors"))) {
        redirect("index.php?page=categories");
    } else {
        deleterow("categories", $category_id);
    }
    redirect("index.php?page=categories");
}
