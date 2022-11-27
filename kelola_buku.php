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
					<b>KELOLA</b>
				</div>
				<img src="">
				<h1> KELOLA BUKU</h1>
				<hr>
				<p>
					<?php include('php/conn.php') ?>
                    <div style="height:300px;overflow:auto;">
<table>
           <tr>
            <td><b>ID</td>
            <td><b>Judul</td>
            <td><b>Pengarang</td>
            <td><b>Jenis</td>
            <td><b>Stok</td>
            </tr>
    
    <?php
    $query = mysql_query("select * from buku");
 
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['pengarang']; ?></td>
            <td><?php echo $data['jenis']; ?></td>
            <td><?php echo $data['stok']; ?></td>
            <td><a href="edit_buku.php?id=<?php echo $data['id']; ?>">Edit</a>||<a href="php/delete_buku.php?id=<?php echo $data['id']; ?>"onclick="return  confirm('Anda Yakin?')">Hapus</a></td>
        </tr>
    
	<?php
    }
	?>
        </table>
        </div>

				</p>				
				<a href="tambah_buku.php"><h2>TAMBAH BUKU</a>
			</div>

<?php include "footer.php"; ?>
</body>
</html>