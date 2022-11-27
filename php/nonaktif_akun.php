<?php 	
		
		
		include "conn.php";
		
		$query = mysql_query("select * from akun where username='{$_GET['username']}'");
 
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
			if($data['status']=='aktif'){
				$query = mysql_query("update akun set status='tidak' where username='{$_GET['username']}'") or die(mysql_error());

if ($query) {
   header('location:../kelola_akun.php?message=success');
}
			}else{
				
				$query = mysql_query("update akun set status='aktif' where username='{$_GET['username']}'") or die(mysql_error());

if ($query) {
   header('location:../kelola_akun.php?message=success');
}
				
			}
		
		}
		

	
?>