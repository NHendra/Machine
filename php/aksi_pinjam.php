<?php
		session_start();
		include "akses_login.php";
		$tglpinjam = date("Y/m/d");
		$tglkembali = $tglpinjam;
		$tglkembali= date('Y-m-d H:i:s', strtotime($tglkembali . ' +7 day'));
		$peminjam = $_SESSION['username'];
		
		include "conn.php";
		
		//====
		$quer = mysql_query("select * from keranjang WHERE username='".$_SESSION['username']."'");
    while ($dat = mysql_fetch_array($quer)) {
		//==
		$id	= $dat['id'];
		
		$sql = "INSERT INTO pinjam(id,peminjam,tglpinjam,tglkembali,status) VALUES('$id','$peminjam','$tglpinjam','$tglkembali','pinjam')";
		

		$query = mysql_query($sql);
		
		if($query){
		$query	= mysql_query('select * from akun where username = "'.$_SESSION['username'].'"');
		$data  	= mysql_fetch_array($query);
		$jmlh	= $data['jmlh_pinjam'];
		$jmlh = $jmlh+1;
		$query = mysql_query("update akun set jmlh_pinjam='{$jmlh}' where username ='".$_SESSION['username']."'") or die(mysql_error());

		}else{
		echo '<script language="javascript">alert("Buku Gagal Dipinjam!"); document.location="../daftar_buku.php";</script>';
		}
		
		
		//==
		}
		if($quer){
			echo '<script language="javascript">alert("Buku Berhasil di Pinjam Silahkan Menuju Perpustkaan Ofline Untuk Mengambil Buku! & Kembalikan Buku Pada Tanggal : '.$tglkembali.'"); document.location="../daftar_buku.php";</script>';
			$query	= mysql_query('delete from keranjang where username = "'.$_SESSION['username'].'"');
		}
		//====
		
		
		
	
?>