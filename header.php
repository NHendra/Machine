<?php session_start(); ?>
<div class="header">
<div class="logo">
<a href="index.php"><img src="ui/logo.png" height="50px" style="position:absolute;"></a>
</div>
<?php if($_SESSION==NULL){ ?>
<div class="login" style="width:90px;">
<a id="myBtn">
<img src="ui/avatar.png" style="
float:left; height:46px; border-radius:80%; position:absolute; object-fit:fill;
margin:2px 0px 0px 30px;">
<img src="ui/login.png" style="float:left; height:50px; ">
</a>
</div>
<?php }else{ ?>
<div class="login" style="width:190px;">
<a id="myBtn">
<img src="media/avatar/<?php echo $_SESSION['username'] ?>.jpg" style="
float:left; height:46px; width:46px; border-radius:80%; position:absolute; object-fit:cover;
margin:2px 0px 0px 30px;">
<h3 style="position:absolute; margin:12px 0px 0px 90px; text-transform:uppercase; max-width:150px; max-height:30px; overflow:hidden; "><?php echo $_SESSION['username'] ?></h3>
<img src="ui/login.png" style="float:left; height:50px; ">
</a>
</div>
<?php } ?>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php if($_SESSION==NULL){ ?>
    <p>	<form action='' method='post'>
	<center><h2>Login</h2></center>
	<table align='center' width='100%' height='100%'>
		<tr>
			<td>User</td>
			<td>:</td>
			<td><input type='text' name='username' placeholder='Username' required /></td>
		</tr>
		<tr>
			<td>Pass</td>
			<td>:</td>
			<td><input type='password' name='password' placeholder='Password' required /></td>
		</tr>
		<tr>
        	<td><input type='submit' name='login' value='LOGIN' /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	</form>
    </p>
    <div style="height:2px; width:100%; background:#3498db;"></div>
    <p>
    <form id="form1" name="form1" method="POST" action="" enctype="multipart/form-data">
    <center><h2>DAFTAR</h2></center>
  <table width="100%">
    <tr>
      <td>Username</td>
      <td>:</td>
      <td><label>
        <input type="text" name="username" id="textfield" required />
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><label>
        <input type="password" name="pass" id="textfield2" required /> 
      </label></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><label>
        <input type="text" name="nama" id="textfield3" required />
      </label></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><label>
        <input type="text" name="alamat" id="text" required /> 
      </label></td>
    </tr>
    <tr>
      <td>No HP</td>
      <td>:</td>
      <td><label>
        <input type="text" name="nohp" id="text" required /> 
      </label></td>
    </tr>
    <tr>
      <td>Foto</td>
      <td>:</td>
      <td><label>
        <input type="file" name="avatar" id="avatar" required> 
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input type="submit" name="daftar" id="daftar" value="DAFTAR" />
      </label></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['daftar'])){ 
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nohp  = $_POST['nohp'];
	//?????????
	if($_FILES["avatar"]["name"]!=''){
$target_dir = "media/avatar/";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script language="javascript">alert("File Bukan Gammbar!");</script>';
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo '<script language="javascript">alert("Data sudah ada!");</script>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg") {
    echo '<script language="javascript">alert("Hanya BIsa Menggunakan Gambar jpg!");</script>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script language="javascript">alert("Cover Gagal Disimpan!"); document.location="index.php";</script>';
// if everything is ok, try to upload file
} else {
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$targett = $target_dir . $username . '.' . $imageFileType;
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targett)) {
		//----
		
		include "php/conn.php";
		
		$sql = "INSERT INTO akun(username,pass,nama,alamat,nohp,status,admin) VALUES('$username','$pass','$nama','$alamat','$nohp','aktif','0')";
		

		$query = mysql_query($sql);
		
		if($query){
echo '<script language="javascript">alert("Akun Berhasil Tersimpan!"); document.location="index.php";</script>';
		}else{
echo '<script language="javascript">alert("Data Gagal Disimpan!"); document.location="index.php";</script>';
		}
		
		//----
    } else {
        echo '<script language="javascript">alert("Gagal mengupload foto!"); document.location="index.php?";</script>';
    }
}
}
	//?????????
	
}
?>
    </p>
    <?php }else{ ?><div class="lg">
    <form action='php/logout.php'>
    <input type='submit' name="logout" value='LOGOUT' class="close">
    </form></div>
    <br>
    <br>
    <img src="media/avatar/<?php echo $_SESSION['username'] ?>.jpg" style=" height:150px; width:150px; border-radius:80%; display:block; margin:auto; object-fit:cover;">
    
    <p>
					<?php if($_SESSION['tipe']!='Admin'){
	include('php/conn.php');
		$query	= mysql_query('select * from akun where username = "'.$_SESSION['username'].'"');
		$data  	= mysql_fetch_array($query);
		$username	= $data['username'];
		$pass	= $data['pass'];
		$nama	= $data['nama'];
		$alamat	= $data['alamat'];
		$nohp	= $data['nohp'];   
?>
	
    <form action="riwayat.php"><input type="submit"  value="RIWAYAT PINJAM"></form>
				<form name="update_data" action="" method="post" enctype="multipart/form-data">
                
<table width="100%" align="center" >
	
    <tr>
    <td colspan="3"><div style="height:2px; width:100%; background:#3498db;"></div><center>EDIT AKUN</center></td>
    </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>
            <input type="text" name="username" maxlength="20" required="required" value="<?php echo $username; ?>" disabled />
            <input type="hidden" name="username" maxlength="20" required="required" value="<?php echo $username; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="pass" maxlength="20" required="required" value="<?php echo $pass; ?>" /></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" maxlength="100" required="required" value="<?php echo $nama; ?>" /></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" maxlength="100" required="required" value="<?php echo $alamat; ?>" /></td>
            </td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td><input type="text" name="nohp" maxlength="100" required="required" value="<?php echo $nohp; ?>" /></td>
            </td>
        </tr>
        <tr>
      <td>Foto Baru?</td>
      <td>:</td>
      <td><label>
        <input type="file" name="avatar" id="avatar">
      </label></td>
    </tr>
        <tr>
            <td align="right" colspan="3"><input type="submit" name="edit" value="EDIT"></td>
        </tr>
    
</table>
</form>
<?php }else{ ?>
<div style="height:2px; width:100%; background:#3498db;"></div>
	
	<table width="100%" align="center" >
        <tr>
            <td align="right" ><form action="pengembalian.php"><input type="submit"  value="PENGEMBALIAN"></form></td>
        </tr>
         <tr>
            <td align="right" ><form action="kelola_akun.php"><input type="submit"  value="KELOLA AKUN"></form></td>
        </tr>
        <tr>
            <td align="right" ><form action="kelola_buku.php"><input type="submit"  value="KELOLA BUKU"></form></td>
        </tr>
    
</table>
	
	<?php }} ?>
<?php
if(isset($_POST['edit'])){
$username = $_POST['username'];
$pass = $_POST['pass'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];


if($_FILES["avatar"]["name"]!=''){
$target_dir = "media/avatar/";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script language="javascript">alert("File Bukan Gammbar!");</script>';
        $uploadOk = 0;
    }


// Allow certain file formats
if($imageFileType != "jpg") {
    echo '<script language="javascript">alert("Hanya BIsa Menggunakan Gambar jpg!");</script>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script language="javascript">alert("Cover Gagal Disimpan!"); document.location="index.php";</script>';
// if everything is ok, try to upload file
} else {
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$targett = $target_dir . $username . '.' . $imageFileType;
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targett)) {
		//----
		
		$query = mysql_query("update akun set pass='{$pass}', nama='{$nama}', alamat='{$alamat}', nohp='{$nohp}' where username='{$username}'") or die(mysql_error());
if ($query) {
    echo '<script language="javascript">alert("Data Berhasil Di Ubah!"); document.location="index.php";</script>';
}
		
		//----
    } else {
        echo '<script language="javascript">alert("Gagal mengupload foto!"); document.location="index.php?";</script>';
    }
}
}else{
	$query = mysql_query("update akun set pass='{$pass}', nama='{$nama}', alamat='{$alamat}', nohp='{$nohp}' where username='{$username}'") or die(mysql_error());
if ($query) {
    echo '<script language="javascript">alert("Data Berhasil Di Ubah!"); document.location="index.php";</script>';
}
	}
}
////????????????????
include('php/conn.php');
 
//tangkap data dari form

 




?>
				</p>
  </div>

</div>

<?php

if(isset($_POST['login'])){
 $user = $_POST['username'];
 $pass = $_POST['password'];

 $conn = mysqli_connect('localhost', 'root', '', 'machine');
  if(mysqli_connect_errno()){
   echo "Koneksi Ke Database Gagal";
   exit();
  }

 $sql="select * from akun where username='".$user."'AND pass='".$pass."'";
    $result=mysqli_query($conn, $sql);
    $num_rows=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
	
	if($num_rows>0){
  		if($row['status']=='aktif'){
		if($row['admin'] == "1"){
			$_SESSION['username']=$user;
			$_SESSION['tipe']='Admin';
			$_SESSION['akun']=3;
			header("location:index.php");
		}else if($row['admin'] == "0"){
			$_SESSION['username']=$user;
			$_SESSION['tipe']='Member';
			$_SESSION['akun']=2;
			header("location:index.php");
		}else{
			echo '<script language="javascript">alert("Username atau Password Salah!");
			document.location="index.php";</script>';
		}}else{echo '<script language="javascript">alert("Akun Anda Di Suspend!");
		document.location="index.php";</script>';}
	}else{
		echo '<script language="javascript">alert("Username atau Password Salah!");
		document.location="index.php";</script>';
	}   
	}
?>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<div class="butt" style=" height:40px;"><a href="daftar_buku.php">
<img src="ui/buku.png" style="float:left; height:40px; "></a></div>