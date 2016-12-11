<?php

require_once "database/Connection.php";
require_once "database/QueryBuilder.php";
require_once "config/database.php";

$connection = Connection::make($config);

$db = new QueryBuilder($connection);

// $users = $db->select('users');

// foreach ($users as $user) {
//     echo $user->nama.'</br>';
//     echo $user->alamat.'</br>';
//     echo "</br>";
// }


$db->insert('users', [
        'nama' => 'Eko',
        'alamat' => 'Candi'
    ]);


