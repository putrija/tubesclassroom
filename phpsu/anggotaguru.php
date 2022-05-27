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
    <title>Anggota</title>

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
                    <li class="nav-item">
                        <a class="nav-link" href="forumguru.php">
                            <b> kls</b><br>
                            bagian
                            <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
            <!--NAV ACTIVE-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav justify-content-between">
                <li class="nav-item active">
                    <a class="nav-link" href="forumguru.php">Forum </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tugaskelasguru.php">Tugas kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="anggotaguru.php">Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nilaiguru.php">Nilai</a>
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
                         src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                         alt="Avatar"/>
                    <!---Nama Dan Email-->
                    <p class="popup__email px-5">
                    <h6 class="text-black"> <?=$user["nama_user"]?> </h6>
                    <h6 class="text-secondary"> <?=$user["email"]?> </h6>
                    </p>
                    <a class="popup__link" href="editprofil.php" target="_blank">Kelola akun anda</a>
                    <div class="popup__logout mt-auto cursor-pointer">
                      <a href="logout.php">  Log Out </a> </div>
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
          <a href="dashboard.php" class="nav-link text-black">
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
          Mengajar
        </li>
        <li class="nav item mb-2">
            <a href="daftartugas.html" class="nav-link text-black">
            <i class="fa-solid fa-list-check me-3"></i>
            Untuk Diperiksa
           </a>
        </li>
        <!--isi-->
        <li class="nav item mb-3">
            <a href="forumguru.php" class="nav-link text-black">
            <i class="fa-solid fa-users-rectangle me-3"></i>
          kls
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

    <!-- Teacher -->
    <section class="container py-4 bg-white col-7 ">
      <div>
        <h2 class="text-primary border-bottom border-primary pb-3 mb-4">Pengajar</h2>
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img
                src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                alt="Avatar"
              />
            </div>
            <span class="fs-5"> nama guru </span>
          </div>
        </div>
      </div>
    </section>

    <!-- Anggota -->
    <section class="container mt-4 py-4 bg-white col-7">
      <div class="d-flex align-items-center justify-content-between border-bottom border-primary pb-3 mb-4">
        <h2 class="text-primary "> Anggota</h2>
        <h4 class="text-primary ">  </h2>
      </div>

      <ul class="d-flex flex-column gap-4">
        <li class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img
                src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                alt="Avatar"
              />
            </div>
            <span class="fs-5"></span>
          </div>
        </li>
      </ul>
    </section>

    


<!---Script-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>
</html>
