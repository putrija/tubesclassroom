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

<!---- Tambah kelas ---->
    <form class="add-class" method="POST">
      <div>
        <h1>Buat kelas</h1>
      </div>
      <div class="mx-3 my-3">
        <div class="mb-3">
          <input class="form-control py-3" name="namakelas" type="text" placeholder="Nama namakelas (wajib)" required="" />
        </div>
        <div class="mb-3">
          <input class="form-control py-3" name="bagian" type="text" placeholder="Bagian" required="" />
        </div>
        <div class="mb-3">
          <input class="form-control py-3" name="mapel" type="text" placeholder="Mata Pelajaran" required="" />
        </div>

        <?php
        
        ?>
        <div class="mb-3">
          <input class="form-control py-3" name="ruang" type="text" placeholder="Ruang" required="" />
        </div>
        <input type="hidden" name="kode_kelas">
        <?php 
          function generate_code($len = 8){
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $code = substr( str_shuffle( $chars ), 0, $len );
            return $code;
          }
          $code = generate_code();
        ?>
        

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-modal" data-bs-dismiss="modal">
          Batal</button>
        <button type="submit" name="btnbuatkelas" class="btn btn-primary" data-bs-dismiss="modal">
          Buat</button>
      </div>

    </form>



    <?php
    if (isset($_POST['btnbuatkelas'])) {
    $namakelas = $_POST['namakelas'];
    $bagian = $_POST['bagian'];
    $mapel = $_POST['mapel'];
    $ruang = $_POST['ruang'];
    $nama_user=$_SESSION['nama_user'];


    $buatkelasbaru= mysqli_query($connection, "INSERT INTO kelas (namakelas, bagian, mapel, ruang, kodekelas, teacher) values('$namakelas', '$bagian', '$mapel', '$ruang', '$code', '$nama_user') ");

    $iduser=$_SESSION['iduser'];
    $iduserdb = mysqli_query($connection,"INSERT INTO user_level (iduser) values('$iduser')");

    echo "<script>location='buat-kelas2.php';</script>";
    }  

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
