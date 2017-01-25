<html>
	<head>
		<title>PDO</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<center>
		<a href="create.php">Tambah Data</a>
		<table border="5" width="70%">
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Opsi</th>
			</tr>
			<?php
				include_once"koneksi.php";
				$query=$db->prepare("select * from user");
				$query->execute();
				$data=$query->fetchAll();
				foreach ($data as $user){
					?> 
					<tr>
						<td><?=$user['id_user']?></td>
						<td><?=$user['nama']?></td>	
						<td><?=$user['alamat']?></td>
						<td><?=$user['telepon']?></td>
						<td><?=$user['email']?></td>
						<td><a href="edit.php?id=<?=$user['id_user']?>">
							Edit</a>|<a href="delete.php?aksi=hapus&id=<?=$user['id_user']?>">
							Hapus</a></td>
					</tr>
					<?php
				}
			?>
		</table>
		</center>
	</body>
</html>