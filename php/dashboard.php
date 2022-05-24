<?php 
require ("function.php");
if(empty($_SESSION['username'])){
    header("Location: ../html/error.html");
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <!-- Styles -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/common.css" />
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/components.css" />

  <title>Kelas</title>

</head>
<body>

<!----NAVBAR----->
    <nav class="navbar navbar-expand-lg navbar-light container-fluid sticky-top border mb-2 pt-3 pb-1" style="background-color: white" >
        <div class="container navbar-head">
         <div class="logo">
            <!---Side Button--->
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-bars"></i></button>
            <!---Logo--->
            <img src="../gambar/google.png" style="width: 190px;">
            <!---Span button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
         </div>

         <!---tambah dan akun-->
         <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" >
           <ul class="navbar-nav">
                <li class="nav-item dropdown mx-4">
                <a class="nav-link"href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-plus" aria-hidden="true"></i> </a> 
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="gabungkelas.php">Gabung ke kelas </a>
                    <a class="dropdown-item " href="buat-kelas.php">Buat kelas </a>
                </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fas fa-th"></i>
                  </a>
                </li>
                <li class="popup py-2 mx-3 ">
                  <div class="avatar me-3 cursor-pointer">
                    <i class="fas fa-user"></i>
                  </div>
            <!--ISI POPUP-->
                  <div class="popup__content d-flex flex-column align-items-center shadow rounded-3 bg-white">
                    <img class="popup__avatar cursor-pointer"
                         src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                         alt="Avatar"/>
                    <p class="popup__email"><?php echo "$_SESSION[email]"; ?></p>
                    <a class="popup__link" href="editprofil.html" target="_blank">Manage your account</a>
                    <div class="popup__logout mt-auto cursor-pointer">Log Out</div>
                    <div class="popup__pseudo"></div>
                  </div>
                </li>
           </ul>
          </div>
        </div>
    </nav>

<!------SIDEBAR----->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
    style="width: 350px;">
    <!-- offcanvas-Body -->
    <div class="offcanvas-body">
    <!--isi-->
    <ul class="nav nav-pills flex-column">
        <li class="nav-item mb-3">
          <a href="dashboard.php" class="nav-link active" aria-current="page">
            <i class="fa-solid fa-house me-3"></i>
            Kelas</a>
        </li>
        <li class="nav-item mb-3">
            <a href="kalender.html" class="nav-link text-black">
              <i class="fa-regular fa-calendar me-3"></i>
              Kalender
             </a>
        </li>
        <li class="nav item border-top py-3">
          Terdaftar
        </li>
        <li class="nav item mb-2">
            <a href="daftartugas.html" class="nav-link text-black">
            <i class="fa-solid fa-list-check me-3"></i>
            Daftar tugas
           </a>
        </li>
        <li class="nav item mb-3">
            <a href="forum.php" class="nav-link text-black">
            <i class="fa-solid fa-users-rectangle me-3"></i>
            Kelas SBD 21
            </a>
        </li>
        <li class="nav item mb-3">
            <a href="#" class="nav-link text-black">
            <i class="fa-solid fa-users-rectangle me-3"></i>
            Kelas PWL 21
            </a>
        </li>
        <li class="nav-item mb-3 border-top pt-3">
            <a href="#" class="nav-link text-black">
              <i class="fa-solid fa-box-archive me-3"></i>
              Kelas yang diarsipkan
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="editprofil.html" class="nav-link text-black">
              <i class="fa-solid fa-gear me-3"></i>
              setelan
            </a>
        </li>
    </ul>

</div>
</div>

<!------ISI-------->
 <!-- Kartu kelas -->
<div class="container py-3 class-list">
  <div class="list-class my-3">
      <div class="row">

          <div class="col-lg-4 col-md-4 my-3">
              <div class="card text-white">
                  <img src="../gambar/img_code.jpg" class="card-img-top" height="100px" width="200px">
                  <div class="card-img-overlay">
                    <h5 class="card-title mb-1"><?php echo $_SESSION['namakelas'] ?></h5>
                    <p class="card-text"> <?php echo $_SESSION['bagian'] ?> <br>
                    <?php echo $_SESSION['nama_user'] ?>
                    </p>
                  </div>
                  <div class="card-body">
                    <br><br><br>
                    <a href="forum.php" class="btn btn-outline-primary">buka Kelas</a>
                  </div>
              </div>
          </div>





<!---SCRIPT-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>