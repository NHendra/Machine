<?php 
session_start();
include "akses_login.php";
include "conn.php";
$id=$_GET['id'];



$sql = mysql_query("SELECT * FROM pinjam WHERE peminjam='".$_SESSION['username']."' AND id='".$id."' AND status='pinjam'");
	$ketemu=mysql_num_rows($sql);
	if ($ketemu==0){

$query	= mysql_query('select * from akun where username = "'.$_SESSION['username'].'"');
		$data  	= mysql_fetch_array($query);
		$jmlh	= $data['jmlh_pinjam'];
$query = mysql_query("SELECT * FROM keranjang WHERE username='".$_SESSION['username']."'");
	$jml=mysql_num_rows($query);
	$total=$jmlh+$jml;
	
	if($total>=5){
		echo '<script language="javascript">alert("Anda Hanya Bisa Meminjam Maksimal 5 Buku!"); document.location="../daftar_buku.php";</script>';
	}else{

$sql = mysql_query("SELECT * FROM keranjang WHERE id='".$id."' AND username='".$_SESSION['username']."'");
	$ketemu=mysql_num_rows($sql);
	if ($ketemu==0){
		mysql_query("INSERT INTO keranjang (id, username)
				VALUES ('".$id."', '".$_SESSION['username']."')");
				
		//======
		$query	= mysql_query('select * from buku where id = "'.$id.'"');
		$data  	= mysql_fetch_array($query);
		$stok	= $data['stok'];
		$stok = $stok-1;
		$query = mysql_query("update buku set stok='{$stok}' where id ='{$id}'") or die(mysql_error());
		//======
		
		
		echo '<script language="javascript">document.location="../daftar_buku.php";</script>';
	} else {
		echo '<script language="javascript">alert("Buku Sudah di Cart!"); document.location="../daftar_buku.php";</script>';		
	}	
	}
	}else{echo '<script language="javascript">alert("Buku Sudah Anda Pinjam, Kembalikan Dulu!"); document.location="../daftar_buku.php";</script>';}
?>