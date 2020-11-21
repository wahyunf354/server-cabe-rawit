<?php
// korneksi ke database
$conn = mysqli_connect("localhost", "wahyu", "wahyu", "db_cabe_rawit");


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

  // upload img_santri
  $img_santri = upload();

  if (!$img_santri) {
    return false;
  }

  // query insert data
  $query = "INSERT INTO tb_santri 
            VALUES
            (null, '$nama', '$alamat', '$tgl_lahir', '$nama_ayah', '$nama_ibu', '$img_santri')
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error == 4) {
    echo "<script>
            alert('pilih gambar terlebih dahulu);
          </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ektensiGambar = explode('.', $namaFile);
  $ektensiGambar = strtolower(end($ektensiGambar));
  if (!in_array($ektensiGambar, $ektensiGambarValid)) {
    echo "<script>
            alert('yang adan upload bukan gambar!');
          </script>";
    return false;
  }

  // cek jia ukurannya terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
            alert('yang adan upload bukan gambar!');
          </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload

  // generet nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ektensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
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

function cari($keyword)
{
  $query = "SELECT * FROM tb_santri
            WHERE
            nama_santri LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%' OR
            nama_ayah LIKE '%$keyword%' OR
            nama_ibu LIKE '%$keyword%' OR
            tgl_lahir LIKE '%$keyword%'  
            ";
  return query($query);
}

function registrasi($data)
{
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // cek apakah user sudah ada
  $result = mysqli_query($conn, "SELECT username FROM tb_users WHERE username='$username';");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>alert('user sudah terdaftar')</script>";

    return false;
  }

  // cek apakah password sama
  if ($password !== $password2) {
    echo "<script>alert('password tidak sesuai')</script>";

    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Tambahkan user baru ke database 
  mysqli_query($conn, "INSERT INTO tb_users(username, password) VALUE ('$username', '$password');");
  return mysqli_affected_rows($conn);
}
