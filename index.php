<?php
session_start();
define("BASE_PATH", __DIR__ . DIRECTORY_SEPARATOR);
define("BASE_URL", "http://localhost/database/clean-blog/");

require_once(BASE_PATH . "core/functions.php");
require_once(BASE_PATH . "core/database.php");
require_once(BASE_PATH . "core/session.php");
require_once(BASE_PATH . "core/request.php");
require_once(BASE_PATH . "core/validation.php");
require_once(BASE_PATH . "core/response.php");


$setting = getsettings('settings');


if (isset($_GET["page"])) {
    $page = $_GET["page"];
    switch ($page) {
        case 'home':
            $page_name = $setting["site_name"];
            require_once BASE_PATH . "controllers/home.php";
            break;
        case 'about':
            $page_name = $setting["about_title"];
            require_once BASE_PATH . "controllers/about.php";
            break;
        case 'contact':
            $page_name = $setting["contact_title"];
            require_once BASE_PATH . "controllers/contact.php";
            break;
        case 'send-message':
            require_once BASE_PATH . "controllers/send-message.php";
            break;
        case 'sign-up':
            $page_name = $setting["sign-up"];
            require_once BASE_PATH . "controllers/registration/index.php";
            break;
        case 'handle-signup':
            require_once BASE_PATH . "controllers/registration/handle-signup.php";
            break;
        case 'login':
            $page_name = $setting["login"];
            require_once BASE_PATH . "controllers/login/index.php";
            break;
        case 'handle-login':
            require_once BASE_PATH . "controllers/login/handle-login.php";
            break;
        case 'logout':
            require_once BASE_PATH . "controllers/logout/index.php";
            break;
        case 'posts':
            $page_name = "Posts";
            require_once BASE_PATH . "controllers/posts.php";
            break;
        case 'post':
            $page_name = "Post";
            require_once BASE_PATH . "controllers/post.php";
            break;
        case 'add-post':
            $page_name = "Add-Post";
            require_once BASE_PATH . "controllers/add-post.php";
            break;
        case 'store-post':
            require_once BASE_PATH . "controllers/store-post.php";
            break;
        case 'comment':
            $page_name = "Comment Page";
            require_once BASE_PATH . "controllers/comment-post.php";
            break;
        case 'add-comment':
            require_once BASE_PATH . "controllers/store-comment.php";
            break;
        case 'delete-comment':
            require_once BASE_PATH . "controllers/delete-comment.php";
            break;
        case 'profile':
            $page_name = "Profile";
            require_once BASE_PATH . "controllers/profile.php";
            break;
        case 'edit-post':
            $page_name = "Edit Post";
            require_once BASE_PATH . "controllers/edit-post.php";
            break;
        case 'update-post':
            $page_name = "Edit Post";
            require_once BASE_PATH . "controllers/update-post.php";
            break;
        case 'delete-post':
            $page_name = "Edit Post";
            require_once BASE_PATH . "controllers/delete-post.php";
            break;
        case 'notfound':
            $page_name = "Not Found id";
            require_once BASE_PATH . "controllers/errors/notfound.php";
            break;

        default:
            $page_name = "Page Not Found";
            require_once BASE_PATH . "views/errors/404.php";
            break;
    }
} else {
    $page_name = "Page Not Found";
    require_once BASE_PATH . "views/errors/404.php";
}
