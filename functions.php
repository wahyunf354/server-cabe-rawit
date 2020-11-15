<?php
// korneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_cabe_rawit");


function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
};

function tambah($data)
{
  global $conn;

  // ambil data dari tiap element form
  $nama = htmlspecialchars($data["nama"]);
  $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $nama_ayah = htmlspecialchars($data["nama_ayah"]);
  $nama_ibu = htmlspecialchars($data["nama_ibu"]);
  $img_santri = htmlspecialchars($data["foto"]);

  // query insert data
  $query = "INSERT INTO tb_santri 
            VALUES
            (null, '$nama', '$alamat', '$tgl_lahir', '$nama_ayah', '$nama_ibu', '$img_santri')
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function hapus($id)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM tb_santri WHERE id_santri = $id");

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;

  // ambil data dari tiap element form
  $id = $data["id_santri"];
  $nama = htmlspecialchars($data["nama"]);
  $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $nama_ayah = htmlspecialchars($data["nama_ayah"]);
  $nama_ibu = htmlspecialchars($data["nama_ibu"]);
  $img_santri = htmlspecialchars($data["foto"]);

  // query insert data
  $query = "UPDATE tb_santri SET
    nama = '$nama', 
    alamat = '$alamat',
    tgl_lahir = '$tgl_lahir',
    nama_ayah = '$nama_ayah',
    nama_ibu = '$nama_ibu',
    img_santri = '$img_santri'
  WHERE id_santri = $id
  ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
