<?php

$connection = mysqli_connect("localhost","root","","classroomsu");

function daftar($data) {

    global $connection;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connection, $data["password1"]);
    $password2 = mysqli_real_escape_string($connection, $data["password2"]);
    $namaUser = htmlspecialchars($data["namauser"]);
    $email = stripslashes($data["email"]);

    //check data kosong
    if (empty($username) || empty($password) || empty($namaUser) || empty($email) || empty($password2) ) {
        return false;
    }

    //Check Ketersediaan email
    $emailCheck = mysqli_query($connection, "SELECT email FROM user WHERE email = '$email'");

    if(mysqli_fetch_assoc($emailCheck)) {
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

    $password = password_hash($password, PASSWORD_DEFAULT);

    $insert = mysqli_query($connection, "INSERT INTO user(username,password,nama_user,email) VALUES ('$username','$password','$namaUser','$email')");

   //$insert = mysqli_query($connection, "INSERT INTO user_roles(nama_user) VALUES ('$namaUser')");
  
    return mysqli_affected_rows($connection) ;

}

function login($data) {

    global $connection ;

    $username = $data["username"];
    $password = $password;

    //check username

    $dataCheck = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($dataCheck) > 0) {

        $row = mysqli_fetch_assoc($dataCheck);


    }

}

// function addUser($data){

//     global $connection;

//     $userid = $data["userid"];
//     $namaUser = $data["namauser"];
//     $roomid = $data["roomid"];

//     if(empty($namaUser)) {
//         return false ;
//     }

//     $query = mysqli_query($connection, "INSERT INTO user_roles(user_id,nama_user,room_id) VALUES($userid,'$namaUser',$roomid)");

//     return mysqli_affected_rows($connection);

// }

// $userID = $_SESSION["userID"];
// $user = show("SELECT * FROM user WHERE id = $userID")[0];
// $user["nama_user"]

function addkelas($data) {

    global $connection;

    $namakelas = $data["namakelas"];
    $bagian = $data["bagian"];
    $mapel = $data["mapel"];
    $ruang = $data["ruang"];
    $kode = $data["kodekelas"];
    $userid = $data["userid"];
    $guruid = $data["guruid"];
    $kelasid = $data["kelasid"];
    $roleg = $data["roleg"];

    //insert kelas
    $query = mysqli_query($connection, "INSERT INTO kelas(id,id_guru,nama_kelas,bagian,mapel,ruang,kode_kelas) VALUES('$kelasid','$guruid','$namakelas',' $bagian','$mapel','$ruang','$kode')");
    //insert guru
    $query = mysqli_query($connection, "INSERT INTO guru(id,id_user,role,id_kelas) VALUES('$guruid','$userid','$roleg','$kelasid')");

    return mysqli_affected_rows($connection) ;


}

function addmurid($data) {

    global $connection;

    $muridid = $data["muridid"];
    $userm = $data["userm"];
    $rolem = $data["rolem"];
    $kelid = $data["kelid"];
    
    //insert guru
    $query ="INSERT INTO murid VALUES('$muridid','$userm','$rolem','$kelid')";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection) ;

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

function carikodekelas($data) {

    $keyword = $data["keyword"];

    $query = "SELECT * FROM kelas WHERE kode_kelas = '$keyword'";

    return show($query);

}

//last savezone

function addTugas($data) {

    global $connection;

    $kelasId = $data["kelasID"];
    $guruId = $data["guruID"];
    $judul = $data["nama"];
    $deskripsi = $data["desc"];
    $deadline = $data["date"];

    if(empty($judul) || empty($deskripsi)) {
        return false;
    }

    $query = mysqli_query($connection,"INSERT INTO tugas(id_kelas,id_guru,nama_tugas,deskripsi,deadline) VALUES('$kelasId','$guruId','$judul','$deskripsi','$deadline')");

    return mysqli_affected_rows($connection);


}


?>