<?php 



$active_id =  0 ;
if(isset($_GET["category"])  && is_numeric($_GET["category"])){

    $category_id = $_GET["category"];
    // $posts = getall('posts',where:"WHERE `category_id` = $category_id");
    
    $posts = jointable('posts','categories','category_id',"id","WHERE category_id = $category_id");
    $active_id = $category_id;
    
    
}else{
    
    // $posts = getall('posts');
     $posts = jointable('posts','categories','category_id','id');
    //  dd($posts);
}

$categories = getall('categories');

require_once BASE_PATH . "views/posts.php";
