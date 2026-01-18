<?php

session_start();

include “…/database.php”;


$id = $_GET[“id”];

mysqli_query($conn, “DELETE FROM songs WHERE id=$id”);


header(“Location: dashboard.php”);

?>
