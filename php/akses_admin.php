<?php
if($_SESSION==NULL){
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="index.php";</script>';
}else{
	if($_SESSION['akun']!==3){
		echo '<script language="javascript">alert("Area ini hanya untuk Admin!"); document.location="index.php";</script>';}
};
?>