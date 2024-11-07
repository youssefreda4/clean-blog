<?php

//required
function required($input)
{
    if (empty($input)) {
        return false;
    }
    return true;
}
//is numeric
function numeric($input)
{
    if (!is_numeric($input)) {
        return false;
    }
    return true;
}
//min
function minlenght($input, $lenght)
{
    if (strlen($input) < $lenght) {
        return false;
    }
    return true;
}
//max
function maxlenght($input, $lenght)
{
    if (strlen($input) > $lenght) {
        return false;
    }
    return true;
}
//is a email
function validemail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}
