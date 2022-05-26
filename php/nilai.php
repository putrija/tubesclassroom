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
          <li class="nav-item active">
            <a class="nav-link" href="forumguru.html">Forum </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tugaskelas.html">Tugas kelas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="anggotaguru.html">Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="nilai.html">Nilai</a>
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
              <p class="popup__email">youremail@gmail.com</p>
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

  <!---ISI-->


  <div class="">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>.</th>
          <?php for ($i = 0; $i < 5; $i++) { ?>
            <th>
              <div>

                <hr>
                dari 100
              </div>
            </th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Rata-Rata Kelas</td>
          <?php for ($o = 0; $o < 5; $o++) { ?>
            <td>Nilai ke <?= $o; ?></td>
          <?php } ?>
        </tr>
        <?php
        $idkelas = $_SESSION['idkelas'];
        $ambildata = mysqli_query($connection, "SELECT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher FROM user AS u INNER JOIN user_level AS ul ON u.iduser=ul.iduser INNER JOIN kelas AS k ON ul.idkelas=k.idkelas WHERE ul.idkelas='$idkelas' AND ul.level='teacher'");

        while ($data = mysqli_fetch_assoc($ambildata)) {
          $user = $data['nama_user'];
        ?>
          <?php for ($j = 0; $j < 15; $j++) { ?>
            <tr>
              <td><?= $user ?></td>

              <?php for ($k = 0; $k < 5; $k++) { ?>
                <td>Nilai ke <?= $k; ?></td>
              <?php } ?>
            </tr>
          <?php } ?>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>




  <!---SCRIPT-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>