<?php
require "functions.php";

// cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
  // ambil data dari tiap element form
  $nama = $_POST["nama"];
  $tgl_lahir = $_POST["tgl_lahir"];
  $alamat = $_POST["alamat"];
  $nama_ayah = $_POST["nama_ayah"];
  $nama_ibu = $_POST["nama_ibu"];
  $img_santri = $_POST["foto"];

  // query insert data
  $query = "INSERT INTO tb_santri 
            VALUES
            (null, '$nama', '$alamat', '$tgl_lahir', '$nama_ayah', '$nama_ibu', '$img_santri')
            ";
  mysqli_query($conn, $query);
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Cabe Rawit</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <div class="container pt-2">
    <h2 class="text-center">Tambah Data Cabe Rawit</h2>

    <form action="" method="POST">
      <div class="form-group">
        <label for="nama"> Nama </label>
        <input placeholder="Masukan Nama" class="form-control" type="text" id="nama" name="nama">
      </div>
      <div class="form-group">
        <label for="tgl_lahir">Tanggal Lahir </label>
        <input placeholder="YYYY-MM-DD" class="form-control" type="text" id="tgl_lahir" name="tgl_lahir">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat </label>
        <input placeholder="Masukan Alamat" class="form-control" type="text" id="alamat" name="alamat">
      </div>
      <div class="form-group">
        <label for="nama_ayah">Nama Ayah </label>
        <input placeholder="Masukan Nama Ayah" class="form-control" type="text" id="nama_ayah" name="nama_ayah">
      </div>
      <div class="form-group">
        <label for="nama_ibu">Nama Ibu </label>
        <input placeholder="Masukan Nama Ibu" class="form-control" type="text" id="nama_ibu" name="nama_ibu">
      </div>
      <div class="form-group">
        <label for="img_santri">Foto </label>
        <input placeholder="contoh.png" class="form-control" type="text" id="img_santri" name="foto">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>