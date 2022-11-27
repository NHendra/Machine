<?php
include('conn.php');
$id_pinjam = $_POST['id_pinjam'];
$username = $_POST['peminjam'];
$n = $_POST['now'];

$query	= mysql_query('select * from pinjam where id_pinjam = "'.$id_pinjam.'"');
		$data  	= mysql_fetch_array($query);
		$k	= $data['tglkembali'];
		$id = $data['id'];


$datetime1 = strtotime($k);
$datetime2 = strtotime($n);

$secs = $datetime2 - $datetime1;
$days = $secs / 86400;

if($days>=1){
$denda=$days*1000;
}else{
$denda=0;	
}

$query = mysql_query("update pinjam set status='kembali', denda='{$denda}' where id_pinjam='{$id_pinjam}'") or die(mysql_error());

if ($query) {
	$query	= mysql_query('select * from buku where id = "'.$id.'"');
		$data  	= mysql_fetch_array($query);
		$stok	= $data['stok'];
		$stok = $stok+1;
		$query = mysql_query("update buku set stok='{$stok}' where id ='{$id}'") or die(mysql_error());
		if($query){
			$query	= mysql_query('select * from akun where username = "'.$username.'"');
			$data  	= mysql_fetch_array($query);
			$jmlh	= $data['jmlh_pinjam'];
			$jmlh = $jmlh-1;
			$query = mysql_query("update akun set jmlh_pinjam='{$jmlh}' where username ='".$username."'") or die(mysql_error());
		}
    if($denda==0){
		echo '<script language="javascript">alert("Buku Berhasil Di Kembalikan!"); document.location="../pengembalian.php";</script>';
	}else{
		echo '<script language="javascript">alert("Buku Berhasil Di Kembalikan, Karena Keterlambatan Pengembalian Selama '.$days.' Hari, Maka Mendapat Denda Sebanyak : Rp.'.$denda.';-"); document.location="../pengembalian.php";</script>';
	}
}
?>
