<?php


// Tạo JWT

function create_jwt($payload, $secret = “MY_SECRET_KEY”) {

$header = base64_encode(json_encode([“alg” => “HS256”, “typ” => “JWT”]));

$payload = base64_encode(json_encode($payload));

$signature = hash_hmac(“sha256”, “$header.$payload”, $secret);


return "$header.$payload.$signature";
Copy

}


// Xác thực JWT

function verify_jwt($token, $secret = “MY_SECRET_KEY”) {

$parts = explode(“.”, $token);


if (count($parts) != 3) return false;

list($header, $payload, $signature) = $parts;

$check = hash_hmac("sha256", "$header.$payload", $secret);

if ($check !== $signature) return false;

return json_decode(base64_decode($payload), true);
Copy

}


?>

