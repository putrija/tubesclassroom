<?php

if (!isset($_SESSION)) {
    session_start();
}

$connection = mysqli_connect("localhost", "root", "", "classroom");


function daftar($data)
{

    global $connection;

    $username = strtolower(stripslashes($data["uname"]));
    $password = mysqli_real_escape_string($connection, $data["password1"]);
    $password2 = mysqli_real_escape_string($connection, $data["password2"]);
    $namaUser = htmlspecialchars($data["namauser"]);
    $email = stripslashes($data["email"]);


    //check data kosong
    if (empty($username) || empty($password) || empty($namaUser) || empty($email) || empty($password2)) {
        return false;
    }

    //Check Ketersediaan email
    $emailCheck = mysqli_query($connection, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($emailCheck)) {
        return false;
    }

    //check ketersedian username
    $usernameCheck = mysqli_query($connection, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($usernameCheck)) {
        return false;
    }

    //passwordconfirmation
    if ($password !== $password2) {
        return false;
    }

    //passwordhash

    $password = sha1($password);

    $insert = mysqli_query($connection, "INSERT INTO user(username,password,nama_user,email) VALUES ('$username','$password','$namaUser','$email')");

    return mysqli_affected_rows($connection);
}


function show($query) {

    global $connection;

    $box = [];

    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($result)) {

        $box[] = $row;

    }

    return $box;
}

function addJawaban($data) {

    global $connection;

    $idtugas = $data["tugas"];
    $user = $data["user"];
    $status = $data["status"];
    $file = upload();

    if(!$file) {
        return false;
    }

    mysqli_query($connection, "INSERT INTO jawaban(id_tugas,iduser,jwbn_siswa,status) VALUES('$idtugas','$user','$file','$status')");

    return mysqli_affected_rows($connection);
    } 


function upload(){
    $nama = $_FILES["file"]["name"];
    $type = $_FILES["file"]["type"];
    $location = $_FILES["file"]["tmp_name"];
    $error = $_FILES["file"]["error"];
    $size = $_FILES["file"]["size"];

    //file kosong
    if($error == 4) {
        echo "<script>alert('Sialhkan masukkan file terlebih dahulu')</script>";
        return false;
    }

    $validFileExtension = ["jpg", "jpeg", "pdf"];
    $fileExtension = explode('/', $type);
    $fileExtension =strtolower( end($fileExtension));

    //Format FIle
    if( !in_array($fileExtension, $validFileExtension)) {
        echo "<script>alert('Format file tidak dapat diterima')</script>";
        return false;
    }

    //Lolos Pengecekan
    move_uploaded_file($location, 'file/'.$nama) ;

    return $nama;

}


    function updateJawaban($data) {

    global $connection;

    $id = $data["jawaban"];
    $file = upload();

    if(!$file) {
        return false;
    }

    mysqli_query($connection, "UPDATE jawaban set jwbn_siswa = '$file' WHERE id = $id");

    return mysqli_affected_rows($connection);

    }


function editNilai($data) {
    
    global $connection;
    
    $id = $data["id"];
    $nilai = $data["nilai"];
    $status = $data["status"];
    
    mysqli_query($connection, "UPDATE jawaban SET nilai = '$nilai', status = '$status' WHERE id = $id");
    
    return mysqli_affected_rows($connection);
    
    } 
?>
