<?php



$id= getsession("userid")["id"];
$user = getrow("users",$id);
$posts = jointable('posts','categories','category_id','id','WHERE posts.user_id =' . $id);





require_once BASE_PATH . "views/profile.php";
