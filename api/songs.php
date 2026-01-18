<?php

include “…/database.php”;


header(“Content-Type: application/json”);


$q = mysqli_query($conn, “SELECT * FROM songs ORDER BY id DESC”);


$data = [];

while ($r = mysqli_fetch_assoc($q)) $data[] = $r;


echo json_encode($data);

?>
