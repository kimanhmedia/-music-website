
<?php

session_start();

if (!isset($_SESSION[“admin”])) header(“Location: index.php”);


include “…/database.php”;


$songs = mysqli_query($conn, “SELECT * FROM songs”);

?>


<h2>Quản lý bài hát</h2>

<a href=“upload.php”>+ Thêm bài hát</a>

<br><br>


<?php while ($r = mysqli_fetch_assoc($songs)) { ?>

<div>

<b><?php echo $r[“title”]; ?></b> - <?php echo $r[“artist”]; ?>

| <a href=“edit.php?id=<?php echo $r[‘id’]; ?>”>Sửa</a>

| <a href=“delete.php?id=<?php echo $r[‘id’]; ?>”>Xóa</a>

</div>

<?php } ?>
