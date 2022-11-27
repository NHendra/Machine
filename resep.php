<!doctype html>
<html>
<head>
	<title>Perpustakaan Online</title>
	<link rel="stylesheet" href="baju.css" type="text/css">
</head>
<body>
<?php include "header.php"; ?>
<?php include "php/akses_login.php"; ?>

<div class="conteudo">
				<div class="post-info">
				</div>
				<img src="">
				<h1>ORDER</h1>
				<hr>
				<p>
<?php
	include('php/conn.php');
	if(isset($_GET['id_pinjam'])){
		$id_pinjam	= $_GET['id_pinjam'];
		$query	= mysql_query('select * from pinjam where id_pinjam = "'.$id_pinjam.'"');
		$data  	= mysql_fetch_array($query);
		$id		= $data['id'];
		$tglpinjam	= $data['tglpinjam'];
		$peminjam		= $data['peminjam'];
		$denda		= $data['denda'];
		$tglkembali		= $data['tglkembali'];
		$status	= $data['status'];
	}
	else{
	$pass = '';
	$jenis_akun = '';
	$nama = '';
	$alamat = '';
	}    
?>
 
<form>
<table cellpadding="5" cellspacing="0">

        <tr>
            <td>ID PINJAM</td>
            <td>:</td>
            <td>
            <input type="text" name="id_pinjam" maxlength="20" required value="<?php echo $id_pinjam; ?>" disabled />
            <input type="hidden" name="id_pinjam" maxlength="20" required value="<?php echo $id_pinjam; ?>"/>
            </td>
        </tr>
        <tr>
            <td>ID Buku</td>
            <td>:</td>
            <td><input type="text" name="idbuku" maxlength="20" required value="<?php echo $id; ?>" disabled/></td>
        </tr>
        <tr>
            <td>Tgl Pinjam</td>
            <td>:</td>
            <td><input type="date" name="tglpinjam" maxlength="100" required value="<?php echo $tglpinjam; ?>" disabled/></td>
        </tr>
        <tr>
            <td>Tgl Kembali</td>
            <td>:</td>
            <td><input type="date" name="udud" maxlength="100" required value="<?php echo $tglkembali; ?>" disabled/></td>
            </td>
        </tr>
        <tr>
            <td>Peminjam</td>
            <td>:</td>
            <td>
            <input type="text" name="udud" maxlength="100" required value="<?php echo $peminjam; ?>" disabled/>
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>
            <input type="text" name="udud" maxlength="100" required value="<?php echo $status; ?>" disabled/>
            </td>
        </tr>
        <tr>
            <td>Denda</td>
            <td>:</td>
            <td>
            <input type="text" name="udud" maxlength="100" required value="<?php if($data['denda']==0){echo'-';}else{ echo $data['denda']; } ?>" disabled/>
            </td>
        </tr>
    
</table>
</form>
				</p>				
				Halaman Ini Bisa Digunakan Sebagai Bukti Untuk Mengambil & Mengembalikan Buku
			</div>
<?php include "footer.php"; ?>
</body>
</html>