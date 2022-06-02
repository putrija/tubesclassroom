<?php
require("function.php");
if (empty($_SESSION['username'])) {
  header("Location: ../html/error.html");
}

$idkelas = $_SESSION['idkelas'];
$query = "SELECT * FROM tugas WHERE tugas.idkelas='$idkelas'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
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
            <a class="nav-link" href="anggota.php">Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="nilai.php">Nilai</a>
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
  <div>
    <div class="list-tugas ">
      <div class="accordion container py-2 bg-white col-7" id="accordionExample">
        <!---list 1-->
        <?php
        $idkelas = $_SESSION['idkelas'];
        $ambildata = mysqli_query($connection, "SELECT * FROM tugas WHERE idkelas='$idkelas'");
        while ($data = mysqli_fetch_array($ambildata)) {
        ?>
          <div class="accordion-item px-4 py-3 my-4" data-bs-toggle="collapse" data-bs-target="#collapse<?= $data['id_tugas']; ?>" aria-expanded="true" aria-controls="collapse<?= $data['id_tugas']; ?>">
            <div class="d-flex justify-content-between">
              <h6 class="accordion-header" id="headingOne">
                <span class="fa-stack" style="font-size: 18px;">
                  <i class="fa-solid fa-circle fa-stack-2x text-primary"></i>
                  <i class="fa-solid fa-clipboard-list fa-stack-1x text-white"></i>
                </span>
                <?= $data['nama']; ?>
                <!--nama tugas--->
              </h6>
            </div>

            <!--isi collapse-->
            <div id="collapse<?= $data['id_tugas']; ?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">

                <!---DINILAI LIST--->
                <div class="my-4 list-student">
                  <?php
                  $idkelas = $_SESSION['idkelas'];
                  $idtugas = $row['id_tugas'];
                  // $query123 = "SELECT * FROM jawaban WHERE id_tugas = $idtugas AND status='dinilai'";
                  // $datadinilai = mysqli_query($connection, $query123);
                  $datadinilai = mysqli_query(
                    $connection,
                    "SELECT DISTINCT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher, j.nilai, j.id_tugas
                FROM user AS u 
                JOIN user_level AS ul 
                ON u.iduser=ul.iduser 
                JOIN kelas AS k 
                ON ul.idkelas=k.idkelas 
                JOIN tugas AS t
                ON k.idkelas=t.idkelas 
                JOIN jawaban as j
                ON u.iduser=j.iduser
                WHERE ul.idkelas='$idkelas' AND ul.level='student' AND j.id_tugas = $idtugas"
                  );
                  ?>
                  <!--Batas--->

                  <ol class="list-group list-group-numbered shadow pt-3">
                    <div class="overflow-auto" style="height: 210px;">
                      <?php
                      while ($data = mysqli_fetch_assoc($datadinilai)) {
                        $user = $data['nama_user'];
                        $nilai = $data['nilai'];

                      ?>
                        <li class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center">
                            <div class="avatar ms-3 me-2 my-2">
                              <img src="https://avatars.dicebear.com/api/micah/<?= $user; ?>.svg?w=350&h=350" alt="Avatar" />
                            </div>
                            <span class="fs-5"><?php echo $user; ?></span>
                            <span class="fs-5">=</span>
                            <span class="fs-5"><?php echo $nilai; ?></span>
                          </div>
                        </li>
                      <?php } ?>
                    </div>
                  </ol>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>


  </div>

  <!---SCRIPT-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>