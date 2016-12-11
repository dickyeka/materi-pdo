<?php

$hostname   = 'localhost';
$dbname     = 'crud';
$username   = 'root';
$password   = '';

try {
    $pdo = new PDO("mysql:host={$hostname};dbname={$dbname}", $username, $password);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

