<?php
// $posts = getall('posts');
$comments = jointableusercomment('comments', 'users', 'user_id', 'id');


require_once(ADMIN_PATH . "views/comments/index.php");
