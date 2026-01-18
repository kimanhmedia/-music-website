<?php

session_start();

include “…/database.php”;


if ($_POST) {

$t = $_POST[“title”];

$a = $_POST[“artist”];


$file = $_FILES["file"]["name"];
$cover = $_FILES["cover"]["name"];

move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/uploads/" . $file);
move_uploaded_file($_FILES["cover"]["tmp_name"], "../assets/images/" . $cover);

mysqli_query($conn,
    "INSERT INTO songs(title,artist,file,cover)
     VALUES('$t','$a','$file','$cover')"
);

echo "Tải lên thành công!";
Copy

}

?>


<h2>Upload bài hát</h2>


<form method=“post” enctype=“multipart/form-data”>

<input name=“title” placeholder=“Tên bài hát”><br><br>

<input name=“artist” placeholder=“Ca sĩ”><br><br>

File nhạc: <input type=“file” name=“file”><br><br>

Ảnh cover: <input type=“file” name=“cover”><br><br>

<button>Upload</button>

</form>

