<?php
$userId = $_SESSION["userid"]["id"];

if(!isset($userId)){
    redirect("../index.php?page=home");

}


require_once (ADMIN_PATH . "views/home.php");