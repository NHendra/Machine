<?php
include('conn.php');
 
//tangkap data dari form
$id = $_POST['id'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$jenis = $_POST['jenis'];
$stok = $_POST['stok'];
 //------
 
 if($_FILES["cover"]["name"]!=''){
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
    echo '<script language="javascript">alert("Cover Gagal Disimpan!"); document.location="../edit_buku.php?id='.$id.'";</script>';
// if everything is ok, try to upload file
} else {
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$targett = $target_dir . $id . '.' . $imageFileType;
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $targett)) {
		//----
		
		$query = mysql_query("update buku set judul='{$judul}', pengarang='{$pengarang}', jenis='{$jenis}', stok='{$stok}' where id='{$id}'") or die(mysql_error());

if ($query) {
    echo '<script language="javascript">alert("Data Berhasil Di Ubah!"); document.location="../kelola_buku.php";</script>';


}
		
		//----
    } else {
        echo '<script language="javascript">alert("Gagal mengupload cover!"); document.location="../edit_buku.php?id='.$id.'";</script>';
    }
}
}else{
	$query = mysql_query("update buku set judul='{$judul}', pengarang='{$pengarang}', jenis='{$jenis}', stok='{$stok}' where id='{$id}'") or die(mysql_error());

if ($query) {
    echo '<script language="javascript">alert("Data Berhasil Di Ubah!"); document.location="../kelola_buku.php";</script>';
}

}

?>
