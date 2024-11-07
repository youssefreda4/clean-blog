<?php
session_start();
define("BASE_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("ADMIN_PATH", BASE_PATH . "admin" . DIRECTORY_SEPARATOR);
define("BASE_URL", "http://localhost/database/clean-blog/admin/");

require_once(BASE_PATH . "core/functions.php");
require_once(BASE_PATH . "core/database.php");
require_once(BASE_PATH . "core/session.php");
require_once(BASE_PATH . "core/validation.php");
require_once(BASE_PATH . "core/request.php");
require_once(BASE_PATH . "core/response.php");

if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {
        case 'home':
            require_once ADMIN_PATH . "controllers/home.php";
            break;
        case 'categories':
            require_once ADMIN_PATH . "controllers/categories/index.php";
            break;
        case 'delete-category':
            require_once ADMIN_PATH . "controllers/categories/delete.php";
            break;
        case 'edit-category':
            require_once ADMIN_PATH . "controllers/categories/edit.php";
            break;
        case 'update-category':
            require_once ADMIN_PATH . "controllers/categories/update.php";
            break;
        case 'add-category':
            require_once ADMIN_PATH . "controllers/categories/create.php";
            break;
        case 'store-category':
            require_once ADMIN_PATH . "controllers/categories/store.php";
            break;
        case 'users':
            require_once ADMIN_PATH . "controllers/users/index.php";
            break;
        case 'edit-user':
            require_once ADMIN_PATH . "controllers/users/edit.php";
            break;
        case 'update-user':
            require_once ADMIN_PATH . "controllers/users/update.php";
            break;
        case 'delete-user':
            require_once ADMIN_PATH . "controllers/users/delete.php";
            break;
        case 'messages':
            require_once ADMIN_PATH . "controllers/messages/messages.php";
            break;
        case 'delete-message':
            require_once ADMIN_PATH . "controllers/messages/delete.php";
            break;
        case 'posts':
            require_once ADMIN_PATH . "controllers/posts/index.php";
            break;
        case 'delete-post':
            require_once ADMIN_PATH . "controllers/posts/delete.php";
            break;
        case 'comments':
            require_once ADMIN_PATH . "controllers/comments/index.php";
            break;
        case 'delete-comment':
            require_once ADMIN_PATH . "controllers/comments/delete.php";
            break;

        default:
            require_once ADMIN_PATH . "views/errors/404.php";
            break;
    }
} else {
    echo "404";
}
