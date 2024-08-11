<?php 


$db = mysqli_connect('localhost', 'root', '', 'crud_php');
if (!$db) {
    die("Koneksi dengan database gagal: " . mysqli_connect_error());
}
?>