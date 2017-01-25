<?php
    require_once "koneksi.php";
    if(isset($_GET["id"])){
        $user_id = $_GET['id'];
        $stmt = $db->prepare("select * from user where id_user='$user_id'");
        $stmt->execute();
        $user = $stmt->fetch();
    }
    if(isset($_POST['btnsimpan'])){
        $user_id = $_POST['id'];
        $stmt = $db->prepare("select * from user where id_user='$user_id'");
        $stmt->execute(); 
        $user = $stmt->fetch();
        try {
            $params =[
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'telepon' => $_POST['telepon'],
                'email' => $_POST['email'],
                'id' => $_POST['id'],
            ];
            $stmt = $db->prepare("update user SET nama=:nama,alamat=:alamat,telepon=:telepon,email=:email where id_user=:id");
            $stmt->execute($params);
            echo"<script>alert('Data anda telah diedit mass');location.href='index.php'</script>";
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="edit.php" method="post" accept-charset="utf-8">
            <h1>Edit</h1>
            <p>ID</p>
            <input type="text" name="id" id="id" value="<?=$user['id_user']?>">
            <p>Nama</p>
            <input type="text" name="nama" id="nama" value="<?=$user['nama']?>">
            <p>Alamat</p>
            <input type="text" name="alamat" id="alamat" value="<?=$user['alamat']?>" required="required"></textarea>
            <p>No.Telepon</p>
            <input type="text" name="telepon" id="telepon" value="<?=$user['telepon']?>">
            <p>Email</p>
            <input type="text" name="email" id="email" value="<?=$user['email']?>">
            <br>
            <br>
            <input type="submit" name="btnsimpan" id ="btnsimpan" value="Simpan">
        </form>
    </body>
</html>