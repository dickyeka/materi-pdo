<?php

require_once "koneksi.php";
require_once "User.php";

$sql = "SELECT * FROM  users";

$stmt = $pdo->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
//$stmt->setFetchMode(PDO::FETCH_OBJ);
//$stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt->execute();

$users = $stmt->fetchAll();


foreach ($users as $user) {
    echo $user->info();
}


