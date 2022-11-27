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
				<h1> EDIT BUKU</h1>
				<hr>
				<p>
<?php
	include('php/conn.php');
	if(isset($_GET['id'])){
		$id	= $_GET['id'];
		$query	= mysql_query('select * from buku where id = "'.$id.'"');
		$data  	= mysql_fetch_array($query);
		$judul		= $data['judul'];
		$pengarang	= $data['pengarang'];
		$jenis		= $data['jenis'];
		$stok		= $data['stok'];
	}
	else{
	$judul = '';
	$pengarang = '';
	$jenis = '';
	$stok = '';
	}    
?>
 
<form name="update_data" action="php/update_buku.php" method="post" enctype="multipart/form-data">
<table cellpadding="5" cellspacing="0">

        <tr>
            <td>ID Buku</td>
            <td>:</td>
            <td>
            <input type="text" name="id" maxlength="20" required value="<?php echo $id; ?>" disabled />
            <input type="hidden" name="id" maxlength="20" required value="<?php echo $id; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td><input type="text" name="judul" maxlength="20" required value="<?php echo $judul; ?>" /></td>
        </tr>
        <tr>
            <td>Pengarang</td>
            <td>:</td>
            <td><input type="text" name="pengarang" maxlength="100" required value="<?php echo $pengarang; ?>" /></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>:</td>
            <td><input type="number" name="stok" maxlength="100" required value="<?php echo $stok; ?>" /></td>
            </td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>:</td>
            <td><input type="radio" name="jenis"
				<?php if (isset($jenis) && $jenis=="fiksi") echo "checked";?>
				value="fiksi">Fiksi
				<input type="radio" name="jenis"
				<?php if (isset($jenis) && $jenis=="nonfiksi") echo "checked";?>
				value="nonfiksi">Nonfiksi 
        </tr>
        <tr>
      <td>Cover Baru?</td>
      <td>:</td>
      <td><label>
        <input type="file" name="cover" id="cover">*Kosongkan bila tidak
      </label></td>
    </tr>
        <tr>
            <td align="right" colspan="3"><input type="submit" name="tedit" value="EDIT"></td>
        </tr>
    	<div class="bukue">
    <img src="media/cover/<?php echo $data['id']; ?>.jpg">
</div>
</table>

</form>
				</p>				
				becareful
			</div>

<?php include "footer.php"; ?>
</body>
</html>