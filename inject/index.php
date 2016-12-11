<?php

require_once "koneksi.php";


$params = [
    ':email'    => $_POST['email'],
    ':password' => $_POST['password']
];

$sql = "SELECT * FROM  admin WHERE email=:email AND password=:password";


// $email = $_POST['email'];
// $password = $_POST['password'];
// $sql = "SELECT * FROM  admin WHERE email={$email} AND password={$password}";

$stmt = $pdo->prepare($sql);
$stmt->execute();

if ($stmt->rowCount()){
    echo 'berhasil';
}else{
    echo 'gagal login';
}


