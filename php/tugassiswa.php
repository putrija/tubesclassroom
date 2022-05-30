<?php
require("function.php");
error_reporting(0);
if (empty($_SESSION['username'])) {
  header("Location: ../html/error.html");
}

$idtugas = $_SESSION['idtugas'];
$query = "SELECT * FROM tugas WHERE id_tugas = $idtugas";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 1 SBD</title>
  <!-- Styles -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/common.css" />
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/components.css" />

</head>

<body>
  <!----NAVBAR----->
  <nav class="navbar navbar-expand-lg navbar-light container-fluid sticky-top border mb-2 pb-1" style="background-color: white">
    <div class="container navbar-head">
      <div class="sidebutton">
        <!---Side Button--->
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-bars"></i></button>
        <!---Span button-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <!----Nama kelas-->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-start">
          <li class="nav-item active">
            <a class="nav-link" href="forumguru.html">
              <b>Kelas SBD 21 </b><br>
              Teknologi Informasi
              <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
      <!--NAV ACTIVE-->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-between">
          <li class="nav-item">
            <a class="nav-link active" href="tugaskelas.html">Tugas Siswa</a>
          </li>
        </ul>
      </div>
      <!---tambah dan akun-->
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="editkelas.html">
              <i class="fa-solid fa-gear me-3"></i>
            </a>
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
              <img class="popup__avatar cursor-pointer" src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
              <p class="popup__email"><?php echo "$_SESSION[email]"; ?></p>
              <a class="popup__link" href="logout.php">Log Out</a>
              <div class="popup__pseudo"></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!------SIDEBAR----->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 350px;">
    <!-- offcanvas-Body -->
    <div class="offcanvas-body">
      <!--isi-->
      <ul class="nav nav-pills flex-column">
        <li class="nav-item mb-3">
          <a href="dashboardguru.html" class="nav-link text-black">
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
          <a href="#" class="nav-link text-black">
            <i class="fa-solid fa-table-list me-3"></i>
            untuk diperiksa
          </a>
        </li>
        <li class="nav item mb-3">
          <a href="forumguru.html" class="nav-link text-black">
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

  <!----ISI--->

  <div class="row">

    <div class="col-lg-4 container-left ms-5">

      <h5>Semua Siswa</h5>

      <div class="my-4 list-student">

        <h6>Diberikan</h6>

        <ol class="list-group list-group-numbered shadow">

          <div class="overflow-auto" style="height: 210px;">

            <li class="list-group-item">
              <i class="fa-solid fa-circle-user me-2"></i> Al Anhar Sufi
            </li>
            <li class="list-group-item">
              <i class="fa-solid fa-circle-user me-2"></i> Reza Rahardian
            </li>
            <li class="list-group-item">
              <i class="fa-solid fa-circle-user me-2"></i> Ronaldo
            </li>

          </div>
        </ol>
      </div>
    </div>

    <div class="col-lg-6 container-right mt-5">

      <!-- DESCRIPTION BOX -->
      <div class="task-desc shadow pt-1">
        <h4 class="my-3">Tugas 1 SBD </h4>

        <!-- Description TUGAS -->
        <div class="description my-2 pb-2">
          <ul class="list-inline">
            <li class="list-inline-item border-start px-3">
              <h2>3</h2> diberikan
            </li>
            <li class="list-inline-item border-start px-3">
              <h2>0</h2> dinilai
            </li>
          </ul>
        </div>


      </div>

      <!-- ASSIGNMENT BOX -->
      <div class="assignment-box shadow border my-3">

        <h4 class="text-center my-1">Jawaban Siswa</h4>

        <div class="assignment-card px-3 py-1">

          <div class="row">
            <?php

            $ambildata = mysqli_query($connection, "SELECT * FROM pengumpulan_tugas AS p INNER JOIN user AS u ON p.iduser = u.iduser");
            while ($row = mysqli_fetch_assoc($ambildata)) {
            ?>
              <div class="col-lg-3 my-2">
                <div class="card w-100 text-center">
                  <div class="card-body">
                    <h6 class="card-title"><?= $row['nama_user']; ?></h6>
                    <a class="" href="" download=""><?= $row['jwbn_siswa']; ?></a>
                    <form method="POST">
                      <input type="number" name="inputnilai" class="form-control" placeholder="0" style="text-align: center;">
                      <button name="nilai" class="mt-2 btn btn-primary">nilai</button>
                    </form>
                  </div>
                </div>

              </div>
            <?php
            }
            ?>

          </div>

        </div>

      </div>

    </div>

  </div>

  <?php
  if (isset($_POST['nilai'])) {
    $inputnilai = $_POST['inputnilai'];
    $iduser = $_SESSION['iduser'];

    $ambil_id_p_tugas = mysqli_query($connection, "SELECT * FROM pengumpulan_tugas WHERE iduser='{$iduser}' AND id_tugas='{$idtugas}' ");
    $id_p_tugas = mysqli_fetch_array($ambil_id_p_tugas);

    $nilaidb = mysqli_query($connection, "INSERT INTO nilai (nilai, id_p_tugas, id_tugas, status) values ('$inputnilai', '$id_p_tugas', '$idtugas','dinilai') ");
  }
  ?>



  <!---SCRIPT-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>