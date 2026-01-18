<?php

include “…/database.php”;

include “jwt.php”;


header(“Content-Type: application/json”);


$headers = getallheaders();


if (!isset($headers[“Authorization”])) {

echo json_encode([“error” => “No token”]);

exit;

}


$token = str_replace("Bearer ", “”, $headers[“Authorization”]);


$user = verify_jwt($token);


if (!$user) {

echo json_encode([“error” => “Invalid token”]);

exit;

}


$action = $_GET[“action”];


if ($action == “list”) {

$q = mysqli_query($conn, “SELECT * FROM songs”);

$d = [];

while ($r = mysqli_fetch_assoc($q)) $d[] = $r;

echo json_encode($d);

}


if ($action == “delete”) {

$id = intval($_GET[“id”]);

mysqli_query($conn, “DELETE FROM songs WHERE id = $id”);

echo json_encode([“status” => “ok”]);

}


?>

