<!doctype html>
<html>
<head>
	<title>Perpustakaan Online</title>
	<link rel="stylesheet" href="baju.css" type="text/css">
</head>
<body>
<?php include "header.php"; ?>

<div class="conteudo">
				<div class="post-info">
					Selamat <b>Datang</b>
				</div>
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
                
                
				</div>
                
                
				<img src="">
				<h1>BEBERAPA BUKU KAMI</h1>
				<hr>
				<p>
					<?php include('php/conn.php') ?>
                    
                    <div style="height:325px;overflow:auto;">
                    
<table>

    
    
    <?php
	
  
	$query = mysql_query("select * from buku order by RAND() LIMIT 3");
 
    //$no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
	<div class="buku">
    <img src="media/cover/<?php echo $data['id']; ?>.jpg">
    <a href="lihat.php?id=<?php echo $data['id']; ?>"><div class="des" align="center">LIHAT</div></a>
    
</div>
    
	<?php   }?>	
        </table>
        </div>
				<img src="media/well.gif">
				<h1> Perpustakaan Library </h1>
				<hr>
                <p>
                Situs ini ditujukan untuk anggota Perpustakaan Library secara khusus dan masyarakat pada umumnya. Layanan-layanan jarak jauh disediakan pada situs ini untuk memberikan kemudahan bagi pengguna jasa Perpustakaan Library untuk meningkatkan pengetahuannya.
                </p>		
				<a href="#" class="continue-lendo"></a>
			</div>

<?php include "footer.php"; ?>
</body>
</html>