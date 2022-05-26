<?php

require_once 'function.php';
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <!-- Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/components.css" />

</head>

<body>    
<!----NAVBAR----->
    <nav class="navbar navbar-expand-lg navbar-light container-fluid sticky-top border mb-2 pb-1"
        style="background-color: white">
        <div class="container navbar-head">
            <div class="sidebutton">
                <!---Side Button--->
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight"><i class="fas fa-bars"></i></button>
                <!---Span button-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!----Nama kelas-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav justify-content-start">
                    <li class="nav-item active">
                        <a class="nav-link" href="forum.php">
                            <b>Kelas SBD 21 </b><br>
                            Teknologi Informasi
                            <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
            <!--NAV ACTIVE-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav justify-content-between">
                    <li class="nav-item active">
                        <a class="nav-link" href="forum.php">Forum </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary" href="tugaskelassiswa.php">Tugas kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="anggotasiswa.php">Anggota</a>
                    </li>
                </ul>
            </div>
            <!---tambah dan akun-->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
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
                                src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
                            <p class="popup__email">youremail@gmail.com</p>
                            <a class="popup__link" href="editprofil.php" target="_blank">Manage your account</a>
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
          <a href="dashboardsiswa.php" class="nav-link text-black">
            <i class="fa-solid fa-house me-3"></i>
            Kelas</a>
        </li>
        <li class="nav-item mb-3">
            <a href="kalender.php" class="nav-link text-black">
              <i class="fa-regular fa-calendar me-3"></i>
              Kalender
             </a>
        </li>
        <li class="nav item border-top py-3">
          Terdaftar
        </li>
        <li class="nav item mb-2">
            <a href="daftartugas.php" class="nav-link text-black">
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
            <a href="editprofil.php" class="nav-link text-black">
              <i class="fa-solid fa-gear me-3"></i>
              setelan
            </a>
        </li>
    </ul>

</div>
</div>

<!---ISI-->

<!----List tugas-->
<div class="list-tugas ">
    <div class="accordion container py-2 bg-white col-8" id="accordionExample">
       <!---list 1-->
      <div class="accordion-item px-4 py-3" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div class="d-flex justify-content-between">
          <h6 class="accordion-header" id="headingOne">
            <i class="fa-solid fa-clipboard-list me-3"></i>
              Tugas 1 sbd
          </h6>
          <h6>
              Tengat: 25 maret
          </h6>
        </div>
        <!--isi collapse-->
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">         
            <div class="d-flex justify-content-between border-top"> 
              <div class="p-2">
                Kerjakan halaman 3
              </div>
            </div>
            <div class="see-tugas p-2 border-top p-3">
              <a href="">
                <p>lihat tugas</p>
              </a>
            </div>
  
          </div>
        </div>
      </div>
  
      <!---list 2-->
      <div class="accordion-item px-4 py-3" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <div class="d-flex justify-content-between">
          <h6 class="accordion-header" id="headingTwo">
            <i class="fa-solid fa-clipboard-list me-3"></i>
              Tugas 2 sbd
          </h6>
          <h6>
              Tengat: 26 maret
          </h6>
        </div>
        <!--isi collapse-->
        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">         
            <div class="d-flex justify-content-between border-top">
              <div class="p-2">
                Kerjakan halaman 5
              </div>
            </div>
            <div class="see-tugas p-2 border-top pt-3">
              <a href="">
              <p>lihat tugas</p>
              </a>
            </div>
  
          </div>
        </div>
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