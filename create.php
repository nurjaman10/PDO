<?php
	include"koneksi.php";
	$id=isset($_POST['id'])?$_POST['id']:"";
	$nama=isset($_POST['nama'])?$_POST['nama']:"";
	$alamat=isset($_POST['alamat'])?$_POST['alamat']:"";
	$telepon=isset($_POST['telepon'])?$_POST['telepon']:"";
	$email=isset($_POST['email'])?$_POST['email']:"";
	$btnsimpan=isset($_POST['btnsimpan'])?$_POST['btnsimpan']:"";
	if ($btnsimpan=="Simpan")
	{
		$query=$db->prepare("insert into user values('$id','$nama','$alamat','$telepon','$email')");
		$query->execute();
		echo"<script>alert('Data anda telah disimpan mass');location.href='index.php'</script>";
	}
?>
<html>
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<title></title>
    	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
    	<form action="create.php" method="post" accept-charset="utf-8">
    		<h1>Create</h1>
    		<p>ID</p>
        	<input type="text" name="id" value="" placeholder="" id="id">
        	<p>Nama</p>
        	<input type="text" name="nama" value="" placeholder="" id="nama">
        	<p>Alamat</p>
        	<textarea name="alamat" required="required" id="alamat"></textarea>
        	<p>No.Telepon</p>
        	<input type="text" name="telepon" value="" placeholder="" id="telepon">
        	<p>Email</p>
        	<input type="text" name="email" value="" placeholder="" id="email">
        	<br>
        	<br>
        	<input type="submit" name="btnsimpan" value="Simpan" id ="btnsimpan">
    	</form>
	</body>
</html>