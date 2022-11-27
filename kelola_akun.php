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
				<h1> KELOLA AKUN</h1>
				<hr>
				<p>
					<?php include('php/conn.php') ?>
                    <div style="height:250px;overflow:auto;">
<table width="100%">
           <tr>
            <td><b>Username</td>
            <td><b>Nama</td>
            <td><b>Alamat</td>
            <td><b>No Hp</td>
            </tr>
    
    <?php
    $query = mysql_query("select * from akun where admin='0'");
 
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
        <tr <?php if($data['status']=='tidak'){ ?> bgcolor="red"<?php } ?>>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['nohp']; ?></td>
            <td bgcolor="#fff"><a href="edit_akun.php?username=<?php echo $data['username']; ?>">Edit</a>|
            <a href="php/nonaktif_akun.php?username=<?php echo $data['username']; ?>">Suspend</a></td>
        </tr>
    
	<?php
    }
	?>
        </table>
        </div>

				</p>				
			</div>
<?php include "footer.php"; ?>
</body>
</html>