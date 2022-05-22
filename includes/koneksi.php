<?php 

if(!isset($_SESSION)){
    session_start();
}

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'classroom';

     //membuat koneksi ke database
     $koneksi = mysqli_connect($host , $user , $pass, $database);

?>