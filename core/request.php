<?php

function checkrequestmethod($method){
    if($_SERVER["REQUEST_METHOD"] == $method){
        return true;
    }
    return false;
}

function sanitizeinput($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlentities($input);
    $input = htmlspecialchars($input);
    return $input;
}