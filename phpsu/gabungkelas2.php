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
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/components.css" />

    <title>Gabung ke kelas</title>
  </head>
  <body>
<!----NAVBAR----->
<nav class="navbar navbar-expand-lg navbar-light container-fluid sticky-top border mb-2 py-3" style="background-color: white" >
    <div class="container navbar-head">
        <div class="sidebutton">
            <!---Side Button--->
            <a href="dashboard.php" class="btn btn-close"></a>
        </div>
        <!----Nama Side-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-start">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="">
                    <h4>  Gabung ke kelas </h4>
                    <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <!---tombol gabung-->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" >
            <div class="col-md-1">
              <button name="btngabung" type="button" class="btn btn-primary">Gabung</button>
            </div>
        </div>

    </div>
</nav>
    
<!--ISI--->
<div class="row justify-content-center pt-3">

  <div class="col col-lg-6 col-md-8">
    <div class="card">
      <div class="card-body ps-4">
           
        <h6 class="card-subtitle my-2 text-muted">
            Saat ini Anda login sebagai
        </h6>

        <div class="row py-2"> 
              <div class="col-md-1">
                <div class="avatar me-3 cursor-pointer">
                  <i class="fas fa-user fa-2x ms-2 mt-1 text-primary"></i>
                </div>
              </div>

              <div class="col-md-10 d-flex justify-content-between">
                <div><b> <?=$user["nama_user"]?></b> <br>
                <?=$user["email"]?>  </div>

                <div>
                <button type="button" class="btn btn-outline-primary">
                  <div class="button-transparent">Ganti akun</div>
                </button>  
                </div>
             </div>
        </div>

    </div>
  </div>

  <!--KODE KELAS--->
  <div class="card mt-3">
    <div class="card-body ps-4">
            
          <h5>Kode kelas</h5>
        <div class ="pb-3">
          Mintalah kode kelas kepada pengajar, lalu masukkan kode di sini.
        </div>

        <input style="width: 15rem" type="text" class="form-control py-3" 
               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
               placeholder="Kode kelas"/>
      </div>
  </div>

<div class="container">
<?php $result = mysqli_query($connection, "SELECT * FROM kelas");?>

<?php while( $row = mysqli_fetch_assoc($result) ) : ?>
<table>
<tr>
  <td>
    <?php echo $row["nama_kelas"]; ?>
  </td>
  <td>
    <?php echo $row["id"]; ?>
  </td>
  <td>
    <?php echo $row["id_guru"]; ?>
  </td>
</tr>
<?php endwhile;?>

<table>
</div>


<!--
//  var_dump($result);
// ambil data dari kelas

// while( $kls = mysqli_fetch_assoc($result) ) {
//   var_dump($kls["nama_kelas"]);
// }
-->

<!----searchinggg---->
  <!-- <div class="container">
<php
 
 if( isset($_POST["cari"]) ) {
    $kelaso = cari($_POST["keyword"]);

  }

?>

<input type="text" name="keyword">
<button type="submit" name="cari"> CARI 
</button>
  </div> -->




  <!---Ket -->
  <!-- <div class="mt-5">
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
    </div> -->


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
