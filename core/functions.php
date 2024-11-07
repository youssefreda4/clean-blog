<?php

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function url($path)
{
    return BASE_URL . $path;
}

function activelink($active_id, $id)
{
    if ($active_id == $id) {
        return 'active-link';
    }
    return '';
}

function activeadminlink($links)
{
    if (in_array($_GET["page"], $links)) {
        return 'active';
    }
    return '';
}
