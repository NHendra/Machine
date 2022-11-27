<?php 	
		
		
		include "conn.php";
		$id = $_GET['id'];
		$sql = "DELETE FROM buku WHERE id='".$id."'";
		$query = mysql_query($sql);
		
		
		
		if ($query) {
		    header('location:../kelola_buku.php?message=success');
			unlink('../media/cover/'.$id.'.jpg');
		}
	
	
?>