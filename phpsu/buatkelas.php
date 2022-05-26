<?php
require 'function.php';
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
}

$userID = $_SESSION["userID"];
$user = show("SELECT * FROM user WHERE id = $userID")[0];

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
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/components.css" />

  </head>

<body>

<!----NAVBAR----->
<nav class="navbar navbar-expand-lg navbar-light container-fluid sticky-top border mb-2 py-3" style="background-color: white" >
<div class="container navbar-head">
    <div class="sidebutton">
        <!---Side Button--->
        <a href="dashboard.php" class="btn btn-close"></a>
    </div>
    <!----Nama kelas-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-start">
            <li class="nav-item mx-2">
                <a class="nav-link" href="">
                <h4>  Buat kelas </h4>
                <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>

         <!---tambah dan akun-->
         <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" >
           <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fas fa-th pt-2"></i>
                  </a>
                </li>
                <li class="popup mx-3 ">
                  <div class="avatar me-3 cursor-pointer">
                    <i class="fas fa-user pt-3"></i>
                  </div>
                <!--ISI POPUP-->
                  <div class="popup__content d-flex flex-column align-items-center shadow rounded-3 bg-white">
                    <img class="popup__avatar cursor-pointer mx-2"
                         src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                         alt="Avatar"/>
                    <!---Nama Dan Email-->
                    <p class="popup__email px-5">
                    <h6 class="text-black"> <?=$user["nama_user"]?> </h6>
                    <h6 class="text-secondary"> <?=$user["email"]?> </h6>
                    </p>
                    <a class="popup__link" href="editprofil.php">Kelola akun anda</a>
                    <div class="popup__logout mt-auto cursor-pointer">
                      <a href="logout.php">  Log Out </a> </div>
                    <div class="popup__pseudo"></div>
                  </div>
                </li>
            </ul>
          </div>
        </div>
  </nav>

<!---- Tambah kelas ---->
    <form class="add-class mt-5" method="POST" action="" >

    <!---Kode kelas--->
    <div style="visibility:hidden">
      <?php 
          function generate_code($len = 8){
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $code = substr( str_shuffle( $chars ), 0, $len );
            return $code;
          }
          $code = generate_code();
        ?>
      <input type="text" class="form-control" readonly
             name="kodekelas" Value="<?php echo $code ;?>">
      </div>
      
      <!--for tabel guru--->
      <!--User id-->
      <div style="visibility:hidden">
      <?php  $id = $user["id"] ?>
        <?php $query = mysqli_query($connection, "SELECT * FROM guru WHERE id_user = $id") ?>
            <input Value="<?php echo $userID;?>" class="form-control" readonly
                   name="userid">
      </div>
      
      <!--Guru id-->
      <div style="visibility:hidden">
      <?php $query = mysqli_query($connection, "SELECT max(id) as maxGID FROM guru");
            $data = mysqli_fetch_array($query);
           
            $tesg = $data["maxGID"];
            $idg = (int)substr($tesg, 1, 3);
            $idg++;
            $ketg = "G";
            $kodeG = $ketg . sprintf("%03s", $idg);
            $kodeG;
            ?>
        <input class="form-control" readonly
               name="guruid" Value="<?php echo $kodeG; ?>">
      </div>

       <!--kelas id-->
       <div style="visibility:hidden">
      <?php $query = mysqli_query($connection, "SELECT max(id) as maxKID FROM kelas");
            $data = mysqli_fetch_array($query);
           
            $tesk = $data["maxKID"];
            $idk = (int)substr($tesk, 1, 3);
            $idk++;
            $ketk = "K";
            $kodeK = $ketk . sprintf("%03s", $idk);
            $kodeK;
            ?>
        <input class="form-control" readonly
               name="kelasid" Value="<?php echo $kodeK; ?>">
      </div>

      <!---STATUS GURU----->
      <div style="visibility:hidden">
      <input class="form-control" readonly
               name="roleg" Value="GURU">
      </div>

      <!---FORM--->
      <div>
        <h1>Buat kelas</h1>
      </div>
      <div class="mx-3 my-3">

      <!--Nama Kelas-->
        <div class="mb-3">
          <input class="form-control py-3" placeholder="Nama kelas (wajib)"
           name="namakelas"  required/>
        </div>
      <!--Bagian-->
        <div class="mb-3">
          <input class="form-control py-3" placeholder="Bagian" 
           name="bagian" required/>
        </div>
      <!--Mapel-->
        <div class="mb-3">
          <input class="form-control py-3" placeholder="Mata Pelajaran"
           name="mapel" required />
        </div>
      <!--Ruang-->
        <div class="mb-0">
          <input class="form-control py-3" placeholder="Ruang"
           name="ruang" required/>
        </div>

      <!--Add class-->
      <div class="modal-footer">
        <button class="btn btn-primary" name="add" >
          Buat</button>
      </div>

       <!--Alert-->
       <?php
       // cek tombol ditekan atau belum
        if( isset($_POST["add"]) ) {
            if( addkelas($_POST) > 0 ) {
              echo "
              <script>
                    alert('Kelas berhasil dibuat!');
                    document.location.href = 'forumguru.php';
              </script> ";
            }else {
              echo "
              <script>
                    alert('Kelas gagal dibuat !');
              </script> ";
            }
        }
        ?>

    </form>

    <!-- Scripts -->
    <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/main.js" defer></script>

  </body>
</html>