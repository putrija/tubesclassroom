<?php

require_once'function.php';
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Kelas</title>

    <!-- Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/components.css" />

  </head>

  <body>


<?php 

    $ambil_idkelas = mysqli_query($connection,"SELECT idkelas FROM kelas ORDER BY idkelas DESC LIMIT 1");

    $idkelass = mysqli_fetch_array($ambil_idkelas);

    $idkelas = $idkelass[0];

    $idkelasdb = mysqli_query($connection,"UPDATE user_level SET idkelas = '$idkelas', level = 'teacher' WHERE iduserlevel IN (SELECT MAX(iduserlevel) FROM user_level)");   

    $innerjoinkelas = "SELECT * FROM user AS u INNER JOIN user_level AS ul ON u.iduser=ul.iduser INNER JOIN kelas AS k ON ul.idkelas=k.idkelas ORDER BY k.idkelas DESC LIMIT 1  ";
        $query = mysqli_query($connection, $innerjoinkelas);

        while($row = mysqli_fetch_array($query)){
            $nama_user=$row['nama_user'];
            $email=$row['email'];
            $namakelas=$row['namakelas'];
            $bagian=$row['bagian'];
            $mapel=$row['mapel'];
            $ruang=$row['ruang'];
            $kodekelas=$row['kodekelas'];
            $level=$row['level'];
        }
            $_SESSION['nama_user'] = $nama_user;
            $_SESSION['email'] = $email;
            $_SESSION['namakelas'] = $namakelas;
            $_SESSION['bagian'] = $bagian ;
            $_SESSION['mapel'] = $mapel;
            $_SESSION['ruang'] = $ruang;
            $_SESSION['kodekelas'] = $kodekelas;
            $_SESSION['level'] = $level;

    echo "<script>location='forum.php';</script>";
?>

 <!-- Scripts -->
 <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/main.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>

  </body>
</html>
