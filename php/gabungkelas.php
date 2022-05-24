<?php 
require ("function.php");
if(empty($_SESSION['username'])){
    header("Location: ../html/error.html");
}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Styles -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/components.css" />
    <link rel="stylesheet" href="../css/style.css" />

    <title>Gabung ke kelas</title>
  </head>
  <body>
    <!----NAVBAR----->
    <form action="#" method="POST">
    <div class="row mt-3">
      <div class="col-md-1">
        <a href="dashboard.php" class="btn btn-close"></a>
      </div>
      <div class="col-md-10"><h5>Gabung ke kelas</h5></div>
      <div class="col-md-1">
          <button name="btngabung" type="button" class="btn btn-primary">Gabung</button>
      </div>
    </div>
    <hr class="solid" />
    <div class="row justify-content-center">
      <div class="col col-lg-6 col-md-8">
        <div class="card">
          <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
              Saat ini Anda login sebagai
            </h6>

            <div class="row">
              <div class="col-md-1">
                <div class="avatar me-3 cursor-pointer">
                  <i class="fas fa-user"></i>
                </div>
              </div>
              <div class="col-md-8">
                <div class="body-text-3"><?php echo "$_SESSION[nama_user]"; ?></div>
                <div class="body-text-6"><?php echo "$_SESSION[email]"; ?></div>
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-outline-secondary">
                  <div class="button-transparent">Ganti akun</div>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-2">
          <div class="card-body">
            <h5>Kode kelas</h5>
            <div>
              Mintalah kode kelas kepada pengajar, lalu masukkan kode di sini.
            </div>
            <form action="#" method="POST">
            <input
              name="kodekelas"
              style="width: 10rem"
              type="text"
              class="form-control"
              aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-lg"
              placeholder="Kode kelas"
            />
            </form>
          </div>
        </div>
        <div class="mt-5">
          <h5>Untuk login menggunakan kode kelas</h5>
          <ul>
            <li>Gunakan akun yang diberi otorisasi</li>
            <li>
              Gunakan kode kelas yang terdiri dari 5-7 huruf atau angka, tanpa
              spasi atau simbol
            </li>
          </ul>
        </div>
      </div>
    </div>

    <?php
    if(isset($_POST['btnlogin']))
    {
    $kodekelas = $_POST['kodekelas'];

    $pemeriksaan_kodekelas = (mysqli_query($connection, "SELECT kodekelas FROM kelas WHERE kodekelas='$_POST[kodekelas]'"));
      if ($pemeriksaan_kodekelas > 0 ) {
        echo "<script>location='forum.php';</script>";
      } else{
        echo "GAGAL";
        }
      }
    ?>

    <!---SCRIPT-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/9c0c4e63c7.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
