<?php

$conn = mysqli_connect(“localhost”,“root”,“”,“music_db”);

mysqli_set_charset($conn,“utf8”);


if (!$conn) {

die(“Database connection failed”);

}

?>
