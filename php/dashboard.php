<?php
require("function.php");
if (empty($_SESSION['username'])) {
  header("Location: ../html/error.php");
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
  <nav class="navbar navbar-expand-lg navbar-light container-fluid sticky-top border mb-2 pt-3 pb-1" style="background-color: white">
    <div class="container navbar-head">
      <div class="logo">
        <!---Side Button--->
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-bars"></i></button>
        <!---Logo--->
        <img src="../gambar/google.png" style="width: 190px;">
        <!---Span button-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <!---tambah dan akun-->
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item dropdown mx-4">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

  <!------ISI-------->
  <!-- Kartu kelas -->

  <div class="container py-3 class-list">
    <div class="list-class my-3">
      <div class="row">
        <?php
        $iduser = $_SESSION['iduser'];
        $ambildatakelas = mysqli_query($connection, "SELECT * FROM user AS u INNER JOIN user_level AS ul ON u.iduser=ul.iduser INNER JOIN kelas AS k ON ul.idkelas=k.idkelas WHERE ul.iduser='{$iduser}'");
        while ($data = mysqli_fetch_array($ambildatakelas)) {
          $namakelas = $data['namakelas'];
          $bagian = $data['bagian'];
          $namaguru = $data['teacher'];
          $idkelass = $data['idkelas'];
        ?>
          <div class="col-lg-4 col-md-4 my-3">
            <div class="card text-white">
              <img src="../gambar/img_code.jpg" class="card-img-top" height="100px" width="200px">
              <div class="card-img-overlay">
                <h5 class="card-title mb-1"><?= $namakelas ?></h5>
                <p class="card-text"><?= $bagian ?><br>
                  <?= $namaguru ?>
                </p>
              </div>
              <div class="card-body">
                <br><br><br>
              </div>
            </div>
            <form method="POST">
              <input type="hidden" value="<?= $idkelass ?>" name="idkelas">
              <button name="btnbukakelas" type="submit" class="btn btn-primary">Buka Kelas</button>
            </form>
          </div>
        <?php
        };
        ?>
      </div>

    </div>
  </div>



  <?php
  if (isset($_POST['btnbukakelas'])) {
    $idkelas = $_POST['idkelas'];
    $idUser = $_SESSION['iduser'];
    $innerjoinkelas = "SELECT * FROM user AS u INNER JOIN user_level AS ul ON u.iduser=ul.iduser INNER JOIN kelas AS k ON ul.idkelas=k.idkelas WHERE ul.idkelas= '$idkelas' AND u.iduser='$idUser'";
    $query = mysqli_query($connection, $innerjoinkelas);

    $row = $query->fetch_assoc();
    $nama_user = $row['nama_user'];
    $email = $row['email'];
    $namakelas = $row['namakelas'];
    $bagian = $row['bagian'];
    $mapel = $row['mapel'];
    $ruang = $row['ruang'];
    $kodekelas = $row['kodekelas'];
    $level = $row['level'];
    $teacher = $row['teacher'];


    $_SESSION['nama_user'] = $nama_user;
    $_SESSION['email'] = $email;
    $_SESSION['namakelas'] = $namakelas;
    $_SESSION['bagian'] = $bagian;
    $_SESSION['mapel'] = $mapel;
    $_SESSION['ruang'] = $ruang;
    $_SESSION['kodekelas'] = $kodekelas;
    $_SESSION['level'] = $level;
    $_SESSION['idkelas'] = $idkelas;
    $_SESSION['teacher'] = $teacher;


    echo "<script>location='forum.php';</script>";
  }

  ?>




  <!---SCRIPT-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>