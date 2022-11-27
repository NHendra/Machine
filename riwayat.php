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
					<b>DAFTAR</b>
				</div>
				<img src="">
				<h1>DAFTAR PINJAMAN BUKU</h1>
				<hr>
				<p>
					<?php include('php/conn.php') ?>
                    <div style="overflow-x:auto; height:600px;">
<table width="100%">
           <tr>
            <td><b>ID Pinjam</td>
            <td><b>ID Buku</td>
            <td><b>Tgl. Pinjam</td>
            <td><b>Tgl. Kembali</td>
            <td><b>Status</td>
            <td><b>Denda</td>
            </tr>
    
    <?php
	$peminjam = $_SESSION['username'];
    $query = mysql_query("select * from pinjam where peminjam='".$peminjam."'");
 
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
        <tr>
            <td><?php echo $data['id_pinjam']; ?></td>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['tglpinjam']; ?></td>
            <td><?php echo $data['tglkembali']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td><?php if($data['denda']==0){echo'-';}else{ echo $data['denda']; } ?></td>
            <?php echo '<td><a href="resep.php?id_pinjam='.$data["id_pinjam"].'">Lihat</a></td>'; ?>
        </tr>
    
	<?php
    }
	?>
        </table>
        </div>

				</p>				
				List
			</div>

<?php include "footer.php"; ?>
</body>
</html>