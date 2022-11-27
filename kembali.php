<!doctype html>
<html>
<head>
	<title>Perpustakaan Online</title>
	<link rel="stylesheet" href="baju.css" type="text/css">
</head>
<body>
<?php include "header.php"; ?>
<?php include "php/akses_admin.php"; ?>
<div class="conteudo">
				<div class="post-info">
					<b>EDIT</b>
				</div>
				<img src="">
				<h1>PENGEMBALIAN</h1>
				<hr>
				<p>
<?php
	include('php/conn.php');
	if(isset($_GET['id_pinjam'])){
		$id_pinjam	= $_GET['id_pinjam'];
		$query	= mysql_query('select * from pinjam where id_pinjam = "'.$id_pinjam.'"');
		$data  	= mysql_fetch_array($query);
		$id		= $data['id'];
		$pinjam		= $data['peminjam'];
		$tglpinjam	= $data['tglpinjam'];
		$tglkembali		= $data['tglkembali'];
	}
	else{
	$pass = '';
	$jenis_akun = '';
	$nama = '';
	$alamat = '';
	}    
?>
 
<form name="update_data" action="php/retur.php" method="post">
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
            <td>Peminjam</td>
            <td>:</td>
            <td><input type="text" name="peminjam" maxlength="20" required value="<?php echo $pinjam; ?>" disabled/>
            <input type="hidden" name="peminjam" maxlength="20" required value="<?php echo $pinjam; ?>"/></td>
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
            <td>Tgl Dikembalikan</td>
            <td>:</td>
            <td>
            <input type="date" name="now" required>
            </td>
        </tr>
        <tr>
            <td align="right" colspan="3"><input type="submit" name="tedit" value="KEMBALIKAN"></td>
        </tr>
    
</table>
</form>
				</p>				
				becareful
			</div>

<?php include "footer.php"; ?>
</body>
</html>