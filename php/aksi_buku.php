<?php
	include "conn.php";
		$id = $_POST['id'];
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$stok = $_POST['stok'];
		$jenis = $_POST['jenis'];
		
		
		
$target_dir = "../media/cover/";
$target_file = $target_dir . basename($_FILES["cover"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["cover"]["tmp_name"]);
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
    echo '<script language="javascript">alert("Cover Gagal Disimpan!"); document.location="../tambah_buku.php";</script>';
// if everything is ok, try to upload file
} else {
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$targett = $target_dir . $id . '.' . $imageFileType;
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $targett)) {
        //echo "The file ". basename( $_FILES["cover"]["name"]). " has been uploaded.";
		//----
		
		$sql = "INSERT INTO buku(id,judul,pengarang,jenis,stok) VALUES('$id','$judul','$pengarang','$jenis','$stok')";
		$query = mysql_query($sql);
		if($query){
echo '<script language="javascript">alert("Buku Berhasil Tersimpan!"); document.location="../kelola_buku.php";</script>';
		}else{
echo '<script language="javascript">alert("Data Gagal Disimpan!"); document.location="../tambah_buku.php";</script>';
		}
		
		//----
    } else {
        echo '<script language="javascript">alert("Gagal mengupload cover!"); document.location="../tambah_buku.php";</script>';
    }
}
?>
	