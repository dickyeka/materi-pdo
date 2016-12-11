<?php
    require_once "koneksi.php";

    if(isset($_POST['submit'])){
        try {

            $params  = [
                'nama'   => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'tlp'    => $_POST['tlp'],
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
    <title>Tambah Data</title>
</head>
<body>
<h1>Tambah data</h1>
<form action="create.php" method="post">
    <p>Nama</p>
    <input type="text" name="nama" >
    <p>Alamat</p>
    <input type="text" name="alamat" >
    <p>Tlp</p>
    <input type="text" name="tlp" >
    <br>
    <input type="submit" name="tambah" value="Tambah">

</form>

</body>
</html>
