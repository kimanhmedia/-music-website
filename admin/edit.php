
PHẦN 14 — Admin Edit (edit.php)

<?php

session_start();

include “…/database.php”;


$id = $_GET[“id”];


$s = mysqli_query($conn, “SELECT * FROM songs WHERE id=$id”);

$data = mysqli_fetch_assoc($s);


if ($_POST) {

$t = $_POST[“title”];

$a = $_POST[“artist”];


mysqli_query($conn,
"UPDATE songs SET title='$t', artist='$a' WHERE id=$id");

echo "Cập nhật thành công!";
Copy

}

?>


<h2>Sửa bài hát</h2>


<form method=“post”>

<input name=“title” value=“<?php echo $data[‘title’]; ?>”><br><br>

<input name=“artist” value=“<?php echo $data[‘artist’]; ?>”><br><br>

<button>Lưu</button>

</form>

