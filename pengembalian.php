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
					<form action="" method="POST">CARI ID PINJAM BUKU
                    <input type="number" name="cari" maxlength="20" width="20px" value=""/>
                    <br>
      					<input type="submit" name="submit" value="Cari">
    				</form>
				</div>
				<img src="">
				<h1> PENGEMBALIAN BUKU</h1>
				<hr>
				<p>
    <?php include('php/conn.php') ?>
                    <div style="height:250px;overflow:auto;">
<table width="100%">
           <tr>
            <td><b>ID Pinjam</td>
            <td><b>ID Buku</td>
            <td><b>Peminjam</td>
            <td><b>Tgl.Pinjam</td>
            <td><b>Tgl.Kembali</td>
            <td><b>Status</td>
            <td><b>Denda</td>
            </tr>
    
    
     <?php
  if (isset($_POST['submit'])) {
		$s = $_POST['cari'];
      if($s!=''){
		$query = mysql_query("select * from pinjam where id_pinjam = '".$s."'");
		if(mysql_num_rows($query)== 0){
		echo '<script language="javascript">alert("ID Pinjam tidak Ditemukan!");</script>';
		}
      }else{$query = mysql_query("select * from pinjam");}
		
 
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
        <tr>
        	<?php $status=$data['status']; ?>
            <td><?php echo $data['id_pinjam']; ?></td>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['peminjam']; ?></td>
            <td><?php echo $data['tglpinjam']; ?></td>
            <td><?php echo $data['tglkembali']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td><?php if($data['denda']==0){echo'-';}else{ echo $data['denda']; } ?></td>
            <?php if($status=="pinjam"){
			echo '<td><a href="kembali.php?id_pinjam='.$data["id_pinjam"].'">Return</a></td>';
			}
			?>
    
	<?php
    }
		
		
		
  }else{
	$query = mysql_query("select * from pinjam");
 
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
        <tr>
        	<?php $status=$data['status']; ?>
            <td><?php echo $data['id_pinjam']; ?></td>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['peminjam']; ?></td>
            <td><?php echo $data['tglpinjam']; ?></td>
            <td><?php echo $data['tglkembali']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td><?php if($data['denda']==0){echo'-';}else{ echo $data['denda']; } ?></td>
            <?php if($status=="pinjam"){
			echo '<td><a href="kembali.php?id_pinjam='.$data["id_pinjam"].'">Return</a></td>';
			}
			?>
    
	<?php
    }
	
	  
  }
  ?>
    <!--////// -->
        </table>
        </div>
				</p>				
				Bayar Denda Rp.1000;- Per Hari Terlambat Mengembalikan
			</div>

<?php include "footer.php"; ?>
</body>
</html>