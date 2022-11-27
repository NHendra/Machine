<!doctype html>
<html>
<head>
	<title>Perpustakaan Online</title>
	<link rel="stylesheet" href="baju.css" type="text/css">
</head>
<body>
<?php include "header.php"; ?>

<div class="conteudo">
                <?php 
	include 'php/conn.php' ;
	if($_SESSION!=NULL){
	$sql = mysql_query("SELECT * FROM keranjang WHERE username='".$_SESSION['username']."'");
	$ketemu=mysql_num_rows($sql);
	if ($ketemu!=0){
?>
<div style="height:200px; width:100%; overflow:auto;">
            		<h2>Cart</h2>
                    <table width="100%" style="max-height:20px; " align="center">
           <tr>
            <td align="center"><b>Judul</td>
            <td align="center"><b>Hapus</td>
            </tr>
    <?php
    $query = mysql_query("select * from keranjang WHERE username='".$_SESSION['username']."'");
    while ($data = mysql_fetch_array($query)) {
		$qq = mysql_query("select * from buku WHERE id='".$data['id']."'");
    	while ($data = mysql_fetch_array($qq)) {
    ?>
        <tr>
  
            <td><div style="max-width: 200px;min-width: 200px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;"><?php echo $data['judul']; ?></td></div>
            <td><a href="php/delete_keranjang.php?id=<?php echo $data['id']; ?>">Hapus</a></</td>
        </tr>
	<?php
    }}
	?>
        </table>
		<form action='php/aksi_pinjam.php' method='post'>
<input type='submit' name='PINJAM' value='PINJAM' />
	</form>
    </div>
<?php }} ?>
                
				<div class="post-info">
                
                
<br>
<br>
                
					<form action="" method="POST">CARI BUKU
                    <input type="text" name="cari" maxlength="20" value="" />
                    <input type="hidden" name="c" maxlength="20" value=""/>
                     <input type="radio" name="c" value="fiksi">Fiksi
				<input type="radio" name="c" value="nonfiksi">Nonfiksi 
      					<input type="submit" name="submit" value="CARI  ">
    				</form>
				</div>
                
                
				<img src="">
				<h1>DAFTAR BUKU</h1>
				<hr>
				<p>
					<?php include('php/conn.php') ?>
                    
                    <div style="height:500px;overflow:auto;">
                    
<table>

    
    
    <?php
  if (isset($_POST['submit'])) {
		$s = $_POST['cari'];
		$r = $_POST['c'];
		if($s==''&&$r==''){
		$query = mysql_query("select * from buku");
		}else if($s==''){
		$query = mysql_query("select * from buku where jenis ='".$r."'");
		if(mysql_num_rows($query)== 0){
		echo '<script language="javascript">alert("Buku Tidak Ada!");</script>';
		}
		}else if($r==''){
		$query = mysql_query("select * from buku where judul LIKE '%".$s."%'");
		if(mysql_num_rows($query)== 0){
		echo '<script language="javascript">alert("Buku Tidak Ada!");</script>';
		}
		}else{
		$query = mysql_query("select * from buku where jenis = '".$r."' AND  judul LIKE '%".$s."%'");
		if(mysql_num_rows($query)== 0){
		echo '<script language="javascript">alert("Buku Tidak Ada!");</script>';
		}
		}
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
    <div class="buku">
    <img src="media/cover/<?php echo $data['id']; ?>.jpg">
    <a href="lihat.php?id=<?php echo $data['id']; ?>"><div class="des" align="center">LIHAT</div></a>
</div>
    
	<?php
    }
		
		
		
  }else{
	$query = mysql_query("select * from buku");
 
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
	<div class="buku">
    <img src="media/cover/<?php echo $data['id']; ?>.jpg">
    <a href="lihat.php?id=<?php echo $data['id']; ?>"><div class="des" align="center">LIHAT</div></a>
    
</div>
    
	<?php }  }?>	
        </table>
        </div>

				</p>
                </div>			
<?php include "footer.php"; ?>
</body>
</html>