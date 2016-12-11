<?php
    require_once "koneksi.php";

    if(isset($_POST['submit'])){
        try {

            $params  = [
                ':nama'   => $_POST['nama'],
                ':alamat' => $_POST['alamat'],
                ':tlp'    => $_POST['tlp'],
            ];

            $sql = "INSERT INTO users (nama,alamat,tlp) VALUES  (:nama,:alamat,:tlp)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute($params);

            header("location: index.php");
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="create.php" method="post" accept-charset="utf-8">
        <p>Nama</p>
        <input type="text" name="nama" value="" placeholder="" >
        <p>Alamat</p>
        <textarea name="alamat" required></textarea>
        <p>No Tlp</p>
        <input type="tel" name="tlp" value="" placeholder="">
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
