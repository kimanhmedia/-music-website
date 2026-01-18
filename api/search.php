<?php

include “…/database.php”;


$key = $_GET[“key”];


$q = mysqli_query($conn,

“SELECT * FROM songs

WHERE title LIKE ‘%$key%’

OR artist LIKE ‘%$key%’”

);


$data = [];

while ($r = mysqli_fetch_assoc($q)) $data[] = $r;


echo json_encode($data);

?>
