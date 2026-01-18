<?php

include “…/database.php”;

include “jwt.php”;


$user = $_POST[“user”];

$pass = md5($_POST[“pass”]);


$sql = mysqli_query($conn, “SELECT * FROM admin WHERE username=‘$user’ AND password=‘$pass’”);


if (mysqli_num_rows($sql) == 1) {

$token = create_jwt([

“user” => $user,

“exp” => time() + 3600

]);


echo json_encode(["token" => $token]);
Copy

} else {

echo json_encode([“error” => “Login failed”]);

}

?>
