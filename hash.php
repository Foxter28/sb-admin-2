<?php
$password = "farris"; // ganti dengan password yang kamu mau
$hash = password_hash($password, PASSWORD_DEFAULT);

echo $hash;
?>
