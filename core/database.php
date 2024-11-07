<?php

$conn = mysqli_connect("localhost", "root", "", "clean-blog");

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

function getall($table_name, $fildes = "*", $limit = '', $where = '')
{
    global $conn;
    $Sql =  "SELECT $fildes FROM `$table_name` $where $limit";
    $result = mysqli_query($conn, $Sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function jointable($table1, $table2, $field1, $field2, $where = '')
{
    global $conn;
    $Sql =  "SELECT $table1.*,$table2.$field2 AS cat_id ,$table2.name 
    FROM $table1
        INNER JOIN `$table2`
        ON `$table1`.$field1 = `$table2`.`$field2`
        $where
    ";
    $result = mysqli_query($conn, $Sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function jointableusercomment($table1, $table2, $field1, $field2, $where = '')
{
    global $conn;
    $Sql =  "SELECT $table1.*,$table2.$field2 AS user_id ,$table2.username 
    FROM $table1
        INNER JOIN `$table2`
        ON `$table1`.$field1 = `$table2`.`$field2`
        $where
    ";
    $result = mysqli_query($conn, $Sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getrow($table_name, $id)
{
    global $conn;
    $sql =  "SELECT * FROM `$table_name` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function getsettings($table_name)
{
    global $conn;
    $Sql =  "SELECT * FROM `$table_name` LIMIT 1";
    $result = mysqli_query($conn, $Sql);
    return mysqli_fetch_assoc($result);
}


function insert($table_name, array $data)
{
    global $conn;
    $fields = "`" . implode('`,`', array_keys($data)) . "`";
    $values = "'" . implode("','", array_values($data)) . "'";

    $sql = "INSERT INTO `$table_name` ($fields) VALUES ($values)";
    $result = mysqli_query($conn, $sql);
    return mysqli_insert_id($conn);
}


function check_id($table_name, $id)
{
    global $conn;
    $sql = "SELECT `id` FROM `$table_name` WHERE id= $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    return true;
}


function check_username($table_name, $username)
{
    global $conn;
    $sql = "SELECT `username` FROM `$table_name` WHERE `username`= '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    return true;
}

function check_password($table_name, $password)
{
    global $conn;
    $sql = "SELECT `password` FROM `$table_name` WHERE `password`= '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    return true;
}

function check_type($table_name, $username)
{
    global $conn;
    $sql = "SELECT `type` FROM `$table_name` WHERE `username`= '$username'";
    $result = mysqli_query($conn, $sql);

    $type = mysqli_fetch_assoc($result);

    if ($type["type"] == "admin") {
        return false;
    }
    return true;
}


function get_id($table_name, $username)
{
    global $conn;
    $sql = "SELECT `id` FROM `$table_name` WHERE `username`= '$username'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}



function deleterow($table_name, $field)
{
    global $conn;
    $sql = "DELETE FROM `$table_name` WHERE `id` = $field";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        setsession("success", "deleted successfully");
    }
    return $result;
}

function update($table_name,  $data, $id)
{
    global $conn;

    $updatecolumnsvaluesdata = "";
    foreach ($data as $columns => $values) {
        $updatecolumnsvaluesdata .= $columns . '=' . "'$values',";
    }

    $finalupdatedata = substr($updatecolumnsvaluesdata, 0, -1);

    $sql = "UPDATE `$table_name` SET $finalupdatedata WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        setsession("success", "updated successfully");
    }
    return $result;
}



function countthismonth($table_name)
{
    global $conn;

    $sql = "SELECT COUNT(*) FROM `$table_name`
       WHERE MONTH(created_at) = MONTH(NOW())
       AND YEAR(created_at) = YEAR(NOW())";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row['COUNT(*)'];
}
