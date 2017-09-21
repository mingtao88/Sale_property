<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "sale_property";
$link = mysqli_connect($host, $username, $password, $db);

if (!$link) {
    die(mysqli_error($link));
}

?>
