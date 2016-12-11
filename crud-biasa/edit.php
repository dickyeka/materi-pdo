<?php
    require_once "koneksi.php";

    if(isset($_GET["id"])){
        $user_id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id'=>$user_id]);
        $user = $stmt->fetch();

    }

    if(isset($_POST['submit'])){

        try {

            $params =[
                'nama'       => $_POST['nama'],
                'alamat'     => $_POST['alamat'],
                'tlp'        => $_POST['tlp'],
                'id'    => $_POST['id'],
            ];

            $sql = "UPDATE users SET nama=:nama,alamat=:alamat,tlp=:tlp WHERE id=:id ";

            $statement = $pdo->prepare($sql);
            $statement->execute($params);

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
    <form action="edit.php" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?= $user['id']?>">
        <p>Nama</p>
        <input type="text" name="nama" value="<?= $user['nama']?>" placeholder="" >
        <p>Alamat</p>
        <textarea name="alamat" required><?= $user['alamat']?></textarea>
        <p>No Tlp</p>
        <input type="tel" name="tlp" value="<?= $user['tlp']?>" placeholder="">
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
