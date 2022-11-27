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
				<h1>TAMBAH BUKU</h1>
				<hr>
					<form id="form1" method="POST" action="php/aksi_buku.php" enctype="multipart/form-data">
  <table width="400" height="300px">
    <tr>
      <td>ID Buku</td>
      <td><label>
        <input type="text" name="id" id="textfield" required />
      </label></td>
    </tr>
    <tr>
      <td>Judul</td>
      <td><label>
        <input type="text" name="judul" id="textfield2" required /> 
      </label></td>
    </tr>
    <tr>
      <td>Pengarang</td>
      <td><label>
        <input type="text" name="pengarang" id="textfield3" required />
      </label></td>
    </tr>
    <tr>
      <td>Stok</td>
      <td><label>
        <input type="number" name="stok" id="text" required /> 
      </label></td>
    </tr>
    <tr>
      <td>Jenis</td>
      <td><label>
        <input type="radio" name="jenis"
				<input type="radio" name="jenis"
				value="fiksi">Fiksi
				<input type="radio" name="jenis"
				value="nonfiksi" checked>Nonfiksi
    </tr>
     <tr>
      <td>Cover</td>
      <td><label>
        <input type="file" name="cover" id="cover" required>
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input type="submit" name="kirim" id="kirim" value="SIMPAN" />
      </label></td>
    </tr>
  </table>
</form>

			</div>

<?php include "footer.php"; ?>
</body>
</html>