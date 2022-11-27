<?php 	
		
		session_start();
		include "conn.php";
		$id = $_GET['id'];
		$sql = "DELETE FROM keranjang WHERE username='".$_SESSION['username']."' AND id='".$id."'";
		$query = mysql_query($sql);
		
		
		if ($query) {
		$query	= mysql_query('select * from buku where id = "'.$id.'"');
		$data  	= mysql_fetch_array($query);
		$stok	= $data['stok'];
		$stok = $stok+1;
		$query = mysql_query("update buku set stok='{$stok}' where id ='{$id}'") or die(mysql_error());
		    header('location:../daftar_buku.php?message=success');
		}
	
	
?>