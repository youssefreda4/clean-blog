<?php

function setsession($key,$value){
    $_SESSION[$key] = $value;
}

function getsession($key){
    return $_SESSION[$key] ?? NULL ;
}

function deletesessioin($key){
    unset($_SESSION[$key]);
}


function flashsession($key){
    $flash_message = getsession($key);
    deletesessioin($key);
    return $flash_message;
}