<?php 	
		
		
		include "conn.php";
		
		$sql = "DELETE FROM akun WHERE username='{$_GET['username']}'";
		$query = mysql_query($sql);
		
		
		
		if ($query) {
			//alternatif kirim redirect page pada index.php
		    header('location:kelola_akun.php?message=success');
		}
	
	
?>