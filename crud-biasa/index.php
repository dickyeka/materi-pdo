<?php

    require_once "koneksi.php";

    $sql = "SELECT * FROM  users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_BOTH);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <a href="create.php" >Tambah</a>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tlp</th>
        </tr>
        <?php foreach ($users as $user)  : ?>
        <tr>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['alamat'] ?></td>
            <td><?= $user['tlp'] ?></td>
        </tr>
        <?php endforeach ;?>
    </table>
</body>
</html>
