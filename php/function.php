<?php

$connection = mysqli_connect("localhost","root","","classroom");

function daftar($data) {

    global $connection;

    $username = strtolower(stripslashes($data["uname"]));
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

    return mysqli_affected_rows($connection) ;

}

?>