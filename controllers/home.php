<?php

// $posts = getall('posts',limit :'LIMIT 10');
$posts = jointable('posts','categories','category_id','id');


require_once BASE_PATH . "views/index.php";