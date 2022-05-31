<?php

require_once 'function.php';
error_reporting(0);

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
  <link rel="stylesheet" href="../css/reset.css" />
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
            <a class="nav-link" href="forum.php">
              <b><?php echo $_SESSION['namakelas'] ?></b><br>
              <?php echo $_SESSION['bagian'] ?>
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
            <a class="nav-link" href="tugaskelas.php">Tugas kelas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="anggota.php">Anggota</a>
          </li>
          <?php if ($_SESSION['level'] == 'teacher') : ?>
            <li class="nav-item">
              <a class="nav-link" href="nilai.php">Nilai</a>
            </li>
          <?php endif; ?>
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

<!---SIDEBAR--->
<?php include 'sidebar.php' ?>

  <!---ISI-->

  <!-- Teacher -->
  <section class="container py-4 bg-white col-7 ">
    <div>
      <h2 class="text-primary border-bottom border-primary pb-3 mb-4">Pengajar</h2>
      <div class="d-flex align-items-center justify-content-between">
        <?php
        $idkelas = $_SESSION['idkelas'];
        $ambildata = mysqli_query($connection, "SELECT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher FROM user AS u INNER JOIN user_level AS ul ON u.iduser=ul.iduser INNER JOIN kelas AS k ON ul.idkelas=k.idkelas WHERE ul.idkelas='$idkelas' AND ul.level='teacher'");

        while ($data = mysqli_fetch_assoc($ambildata)) {
          $user = $data['nama_user'];
        ?>
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img src="https://avatars.dicebear.com/api/micah/<?= $user; ?>.svg?w=400&h=400" alt="Avatar" />
            </div>
            <span class="fs-5"><?php echo $user; ?></span>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>

  <!-- Anggota -->
  <section class="container mt-4 py-4 bg-white col-7">
    <div class="d-flex align-items-center justify-content-between border-bottom border-primary pb-3 mb-4">
      <h2 class="text-primary ">Siswa</h2>
      <?php
      $idkelas = $_SESSION['idkelas'];
      $ambildata = mysqli_query($connection, "SELECT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher FROM user AS u INNER JOIN user_level AS ul ON u.iduser=ul.iduser INNER JOIN kelas AS k ON ul.idkelas=k.idkelas WHERE ul.idkelas='$idkelas' AND ul.level='student'");
      ?>
      <h4 class="text-primary "> <?= $ambildata->num_rows; ?> </h2>
    </div>

    <ul class="d-flex flex-column gap-4">
    <?php
    while ($data = mysqli_fetch_assoc($ambildata)) {
      $user = $data['nama_user'];
    ?>

      <li class="d-flex align-items-center justify-content-between">
        
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img src="https://avatars.dicebear.com/api/micah/<?= $user; ?>.svg?w=400&h=400" alt="Avatar" />
            </div>
            <span class="fs-5"><?php echo $user; ?></span>
          </div>
      </li>
      <?php
        }
        ?>
    </ul>
  </section>




  <!---Script-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>