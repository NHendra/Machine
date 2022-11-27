<!doctype html>
<html>
<head>
	<title>Perpustakaan Online</title>
	<link rel="stylesheet" href="baju.css" type="text/css">
</head>
<body>
<?php include "header.php"; ?>
<?php
	include('php/conn.php');
	if(isset($_GET['id'])){
		$id	= $_GET['id'];
		$query	= mysql_query('select * from buku where id = "'.$id.'"');
		$data  	= mysql_fetch_array($query);
		$judul	= $data['judul'];
		$stok	=$data['stok'];
		$jenis	=$data['jenis'];
		$pengarang=$data['pengarang'];
	}
	else{
	$judul = '';
	$stok	= '';
	$jenis	= '';
	$pengarang = '';
	}
?>
<div class="conteudo">
				<div class="post-info">
					<b>COVER</b>
				</div>
				<img src="media/cover/<?php echo $data['id']; ?>.jpg">
				<h1><?php echo $judul; ?></td></h1>
				<hr>
				<p>
					
		<form name="update_data" action="aksi_pinjam.php" method="post">
<table cellpadding="5" cellspacing="0">


        <tr>
            <td>Pengarang</td>
            <td>:</td>
            <td><?php echo $pengarang; ?></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>:</td>
            <td><?php echo $jenis; ?></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>:</td>
            <td><?php if($stok<=0){echo'Habis';}else{echo $stok;} ?></td></td>
            </td>
        </tr>
        <tr>
            <td>
            <?php if($stok>=0){ ?>
            <a href="php/masuk_keranjang.php?id=<?php echo $data['id']; ?>"><div class="des" align="center">AMBIL</div></a>
            <?php } ?>
            </td>
</div>
        </tr>
    
</table>
</form>
				</p>				
			</div>

<?php include "footer.php"; ?>
</body>
</html>