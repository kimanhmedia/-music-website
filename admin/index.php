
<form method=“post”>

<h2>Admin Login</h2>

<input name=“user” placeholder=“Username”><br><br>

<input name=“pass” type=“password” placeholder=“Password”><br><br>

<button>Login</button>

</form>


<?php

session_start();

include “…/database.php”;


if ($_POST) {

$u = $_POST[“user”];

$p = md5($_POST[“pass”]);


$sql = mysqli_query($conn,
    "SELECT * FROM admin WHERE username='$u' AND password='$p'"
);

if (mysqli_num_rows($sql) == 1) {
    $_SESSION["admin"] = $u;
    header("Location: dashboard.php");
} else {
    echo "Sai tài khoản!";
}
Copy

}

?>
