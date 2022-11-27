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
				<h1> EDIT AKUN</h1>
				<hr>
				<p>
<?php
	include('php/conn.php');
	if(isset($_GET['username'])){
		$username	= $_GET['username'];
		$query	= mysql_query('select * from akun where username = "'.$username.'"');
		$data  	= mysql_fetch_array($query);
		$pass		= $data['pass'];
		$nama		= $data['nama'];
		$alamat		= $data['alamat'];
		$nohp		= $data['nohp'];
	}
	else{
	$pass = '';
	$jenis_akun = '';
	$nama = '';
	$alamat = '';
	$nohp='';
	}    
?>
 
<form name="update_data" action="php/update_akun.php" method="post">
<table cellpadding="5" cellspacing="0">

        <tr>
            <td>Username</td>
            <td>:</td>
            <td>
            <input type="text" name="username" maxlength="20" required value="<?php echo $username; ?>" disabled />
            <input type="hidden" name="username" maxlength="20" required value="<?php echo $username; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="pass" maxlength="20" required value="<?php echo $pass; ?>" /></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" maxlength="100" required value="<?php echo $nama; ?>" /></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" maxlength="100" required value="<?php echo $alamat; ?>" /></td>
            </td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td>:</td>
            <td><input type="text" name="nohp" maxlength="100" required value="<?php echo $nohp; ?>" /></td>
        </tr>
        <tr>
            <td align="right" colspan="3"><input type="submit" name="tedit" value="EDIT"></td>
        </tr>
    
</table>
</form>
				</p>				
				becareful
			</div>

<?php include "footer.php"; ?>
</body>
</html>