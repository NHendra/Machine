<?php
include('conn.php');
 
//tangkap data dari form
$username = $_POST['username'];
$pass = $_POST['pass'];
$nohp = $_POST['nohp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
 

$query = mysql_query("update akun set pass='{$pass}', nohp='{$nohp}', nama='{$nama}', alamat='{$alamat}' where username='{$username}'") or die(mysql_error());

if ($query) {
    echo '<script language="javascript">alert("Data Berhasil Di Ubah!"); document.location="../kelola_akun.php";</script>';
}
?>
