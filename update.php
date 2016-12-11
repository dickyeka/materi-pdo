<?php
    require_once "koneksi.php";
    if(isset($_POST['submit'])){

            $user_id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id =:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id'=>$user_id]);
            $user = $stmt->fetch();

            try {

                $nama = empty($_POST['nama']) ? $_POST['nama'] : $user['nama'];
                var_dump($nama)
                die();

                $params =[
                    'nama'       => ,
                    'alamat'     => $_POST['alamat'],
                    'tlp'        => $_POST['tlp'],
                    'id'        => $_POST['id'],
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
