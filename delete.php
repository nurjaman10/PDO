<?php
    require_once "koneksi.php";
    $aksi=isset($_GET['aksi'])?$_GET['aksi']:"";
    if ($aksi=="hapus")
    {
        $id=isset($_GET['id'])?$_GET['id']:"";
        $query=$db->prepare("delete from user where id_user='$id'");
        $query->execute();
        echo"<script>alert('Data anda berhasil dihapus mass');location.href='index.php'</script>";
    }
?>