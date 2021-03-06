<?php
require "functions.php";

// ambil data di URL
$id = $_GET["id"];

// query data masasiswa berdasarkan id
$mhs = query("SELECT * FROM tb_santri WHERE id_santri = $id")[0];


// cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
  // cek apakah data berhasil ditambahkan
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil diubah')
            document.location.href = 'index.php'
          </script>";
  } else {
    echo "<script>
            alert('Data gagal diubah')
          </script>";
  }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Cabe Rawit</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <div class="container pt-2">
    <h2 class="text-center">Ubah Data Cabe Rawit</h2>

    <form action="" method="POST">
      <input type="hidden" name="id_santri" value="<?= $mhs["id_santri"] ?>">
      <div class="form-group">
        <label for="nama"> Nama </label>
        <input placeholder="Contoh: Budi" class="form-control" type="text" id="nama" name="nama" required value="<?= $mhs["nama_santri"] ?>">
      </div>
      <div class="form-group">
        <label for="tgl_lahir">Tanggal Lahir </label>
        <input placeholder="Contoh: 2002-05-03" pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" class="form-control" type="text" id="tgl_lahir" name="tgl_lahir" required value="<?= $mhs["tgl_lahir"] ?>">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat </label>
        <input placeholder="Contoh: Jl. Pelajar Timur, Gg. Kelapa, Lrg. Gabe, No. 9" class="form-control" type="text" id="alamat" name="alamat" required value="<?= $mhs["alamat"] ?>">
      </div>
      <div class="form-group">
        <label for="nama_ayah">Nama Ayah </label>
        <input placeholder="Contoh: Ayah Budi" class="form-control" type="text" id="nama_ayah" name="nama_ayah" required value="<?= $mhs["nama_ayah"] ?>">
      </div>
      <div class="form-group">
        <label for="nama_ibu">Nama Ibu </label>
        <input placeholder="Contoh: Ibu Budi" class="form-control" type="text" id="nama_ibu" name="nama_ibu" required value="<?= $mhs["nama_ibu"] ?>">
      </div>
      <div class="form-group">
        <label for="img_santri">Foto </label>
        <input placeholder="Contoh: contoh.png" class="form-control" type="text" id="img_santri" name="foto" value="<?= $mhs["img_santri"] ?>">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>