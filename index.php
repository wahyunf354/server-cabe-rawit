<?php
require "functions.php";
$santri = query("SELECT * FROM tb_santri ORDER BY id_santri DESC");

if (isset($_POST['cari'])) {
  $santri = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Caberawit</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
  <div class="container pt-3">
    <h1 class="text-center">Daftar Cabe Rawit</h1>
    <a class="btn btn-primary btn-sm mb-2" href="tambah.php">Tambah Data Cabe Rawit</a>

    <form class="form-inline" method="post" action="">
      <div class="form-group mr-2 mb-2">
        <label for="inputPassword2" class="sr-only"></label>
        <input type="text" class="form-control" id="inputPassword2" name="keyword" placeholder="Cari" autofocus autocomplete="off">
      </div>
      <button type="submit" name="cari" class="btn btn-primary mb-2">Cari</button>
    </form>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th> No. </th>
          <th> Aksi </th>
          <th> Foto </th>
          <th> Nama </th>
          <th> Tgl Lahir </th>
          <th> Alamat </th>
          <th> Nama Ayah </th>
          <th> Nama Ibu </th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($santri as $row) : ?>
          <tr>
            <td> <?= $i; ?> </td>
            <td>
              <a class="btn btn-success btn-sm" href="ubah.php?id=<?= $row["id_santri"] ?>"> <i class="fa fa-edit"></i> </a>
              <a class="btn btn-danger btn-sm" href="hapus.php?id=<?= $row["id_santri"] ?>"> <i class="fa fa-trash"></i> </a>
            </td>
            <td>
              <img src="img/<?= $row["img_santri"] ?>" alt="img" class="img-thumbnail rounded" style="width: 75px; height: 75px; ">
            </td>
            <td> <?= $row["nama_santri"] ?> </td>
            <td> <?= $row["tgl_lahir"] ?> </td>
            <td> <?= $row["alamat"] ?> </td>
            <td> <?= $row["nama_ayah"] ?> </td>
            <td> <?= $row["nama_ibu"] ?> </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>