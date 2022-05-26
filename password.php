<?php


$koneksi = mysqli_connect("localhost", "root", "", "classroom");

$password = sha1('123');
$berhasil = $koneksi->query("UPDATE user SET password = '$password'");

echo $berhasil ? 'berhasil' : 'gagal';
