<?php
require 'db/connect.php';
if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($db, trim($_POST['nama'])); 
    $tgl_lahir = mysqli_real_escape_string($db, trim(date(
        'Y-m-d',
        strtotime($_POST['tgl_lahir'])
    )));
    $jenis_kelamin =mysqli_real_escape_string($db, trim($_POST['jenis_kelamin'])); 

    $nama_file = uniqid(). '.jpg';
    $tmp_file = $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan filenya
    $path = "./image/" . $nama_file;

    $query = mysqli_query($db, "SELECT nama FROM user WHERE id='$id'")
    or die('Ada kesalahan pada query tampil data id: ' . mysqli_error($db));
    $rows = mysqli_num_rows($query);
   
    if ($rows > 0) {
        // tampilkan pesan gagal simpan data
        header("location: ./index.php?page=adduser");
    }
    else {
        // upload file
        if (move_uploaded_file($tmp_file, $path)) {
            $insert = mysqli_query($db, "INSERT INTO user(nama,tanggal_lahir,jenis_kelamin,foto)
VALUES('$nama','$tgl_lahir','$jenis_kelamin','$nama_file')")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($db));
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ./index.php?&page=user");
            }
        }
    }
}

if (isset($_GET['id'])) {
    // ambil data get dari form
    $id = $_GET['id'];
    // perintah query untuk menampilkan data foto berdasarkan id
    $query = mysqli_query($db, "SELECT foto FROM user WHERE id='$id'")
    or die('Ada kesalahan pada query tampil data foto :' . mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    $foto = $data['foto'];
    // hapus file foto dari folder foto
    $hapus_file = unlink("./image/$foto");
    // cek hapus file
    if ($hapus_file) {
        // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel guru
        $delete = mysqli_query($db, "DELETE FROM user WHERE id='$id'")
        or die('Ada kesalahan pada query delete :' . mysqli_error($db));
        // cek hasil query
        if ($delete) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: ./index.php?page=user");
        }
    }
}

if (isset($_POST['simpan_ubah'])) {
    $id = mysqli_real_escape_string($db, trim($_POST['id']));
    $nama = mysqli_real_escape_string($db, trim($_POST['nama']));
    $tgl_lahir = mysqli_real_escape_string($db, trim(date(
        'Y-m-d',
        strtotime($_POST['tgl_lahir'])
    )));
    $jenis_kelamin = mysqli_real_escape_string($db, trim($_POST['jenis_kelamin']));

    // Periksa apakah ada file yang diunggah
    if (!empty($_FILES['foto']['name'])) {
        $nama_file = uniqid() . '.jpg';
        $tmp_file = $_FILES['foto']['tmp_name'];
        // Set path folder tempat menyimpan filenya
        $path = "./image/" . $nama_file;

        // upload file
        if (move_uploaded_file($tmp_file, $path)) {
            // Jika file diupload, update semua data termasuk foto
            $update = mysqli_query($db, "UPDATE user SET nama='$nama', tanggal_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', foto='$nama_file' WHERE id='$id'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($db));
        }
    } else {
        // Jika tidak ada file yang diupload, update data tanpa foto
        $update = mysqli_query($db, "UPDATE user SET nama='$nama', tanggal_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin' WHERE id='$id'")
            or die('Ada kesalahan pada query update : ' . mysqli_error($db));
    }

    if ($update) {
        // jika berhasil tampilkan pesan berhasil update data
        header("location: ./index.php?&page=user");
    } else {
        // jika gagal, tampilkan pesan gagal update data
        header("location: ./index.php?page=edituser&id=$id");
    }
}
