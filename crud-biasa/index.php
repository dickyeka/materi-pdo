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
            <th>Hapus</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($users as $user)  : ?>
        <tr>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['alamat'] ?></td>
            <td><?= $user['tlp'] ?></td>
            <td>
                <a href="delete.php?id=<?= $user['id']?>" title="">Hapus</a>
            </td>
            <td>
                <a href="edit.php?id=<?= $user['id']?>" title="">Edit</a>
            </td>
        </tr>
        <?php endforeach ;?>
    </table>
</body>
</html>
