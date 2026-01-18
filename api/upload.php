
<?php

include “…/database.php”;


$title = $_POST[“title”];

$artist = $_POST[“artist”];


$file = $_FILES[“file”][“name”];

$cover = $_FILES[“cover”][“name”];


move_uploaded_file($_FILES[“file”][“tmp_name”], “…/assets/uploads/” . $file);

move_uploaded_file($_FILES[“cover”][“tmp_name”], “…/assets/images/” . $cover);


mysqli_query($conn,

“INSERT INTO songs(title,artist,file,cover)

VALUES(‘$title’,‘$artist’,‘$file’,‘$cover’)”

);


echo “success”;

?>
