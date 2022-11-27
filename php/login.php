<?php

if(isset($_POST['login'])){
 $user = $_POST['username'];
 $pass = $_POST['password'];

 $conn = mysqli_connect('localhost', 'root', '', 'lyt');
  if(mysqli_connect_errno()){
   echo "Koneksi Ke Database Gagal";
   exit();
  }

 $sql="select * from akun where username='".$user."'AND pass='".$pass."'";
    $result=mysqli_query($conn, $sql);
    $num_rows=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
	
	if($num_rows>0){
  		session_start();
		if($row['jenis_akun'] == "admin"){
			$_SESSION['username']=$user;
			$_SESSION['tipe']='Admin';
			$_SESSION['akun']=3;
			header("location:index.php");
		}else if($row['jenis_akun'] == "member"){
			$_SESSION['username']=$user;
			$_SESSION['tipe']='Member';
			$_SESSION['akun']=2;
			header("location:index.php");
		}else{
			echo '<script language="javascript">alert("Username atau Password Salah!");
			document.location="index.php";</script>';
		}
	}else{
		echo '<script language="javascript">alert("Username atau Password Salah!");
		document.location="index.php";</script>';
	}   
	}
?>