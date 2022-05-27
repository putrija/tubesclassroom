<?php
require 'function.php';
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
}

$userID = $_SESSION["userID"];
$user = show("SELECT * FROM user WHERE id = $userID")[0];

$kelas = show("SELECT * FROM kelas");

 if( isset($_POST["cari"]) ) {

      $kelas = carikodekelas($_POST);

 }

// cek tombol ditekan atau belum
if( isset($_POST["add"]) ) {
    if( addmurid($_POST) > 0 ) {
      echo "
      <script>
            alert('berhasil gabung ke kelas!');
            document.location.href = 'kelasforum.php' ;
      </script> ";
    }else {
      echo "
      <script>
            alert('gagal gabung ke kelas!');
      </script> ";
    }
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
  
<form action="" method="POST">
  <!--KODE KELAS--->
  <div class="card mt-3">
    <div class="card-body ps-4">
            
          <h5>Kode kelas</h5>
        <div class ="pb-3">
          Mintalah kode kelas kepada pengajar, lalu masukkan kode di sini.
        </div>

        <div>
        <input style="width: 15rem" type="search" class="form-control py-3" 
               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
               name="keyword" placeholder="kode kelas"/>
        <button type="submit" name="cari" class="my-3 px-5 py-2"> CARI </button>
        </div>

      </div>
</div>

</form>

 <!--Menaampilkan kelas-->
 <?php if(isset($_POST["cari"])) : ?>
      <?php if(carikodekelas($_POST) > 3) : ?>

<form method="POST" action="">
         <!-- Kartu kelas -->
          <div class="container py-3 class-list">
            <div class="list-class my-3">
                <div class="row">
<?php foreach( $kelas as $kls ) : ?>
                    <div class="col-lg-12 col-md-12 my-12">
                        <div class="card text-white">
                            <img src="../gambar/img_code.jpg" class="card-img-top" height="100px" width="200px">
                            <div class="card-img-overlay">
                              <h5 class="card-title mb-1">
                                Nama Kelas : <?php echo $kls["nama_kelas"]; ?> </h5>
                              <p class="card-text">
                                bagian     : <?php echo $kls["bagian"]; ?> <br>
                                kode kelas : <?php echo $kls["kode_kelas"]; ?>
                              </p>
                            </div>
                        </div>
                    </div>
                     <!--INSERT MURID KE DB--->
                     <div class="card-body text-black">
                                <button name="add" class="btn btn-primary">Gabung</button>
                      </div>
                     <?php  $lek = $kls["id"] ?>
                        <div style="visibility:hidden">
                                    <?php $query = mysqli_query($connection, "SELECT max(id) as maxMID FROM murid");
                                          $data = mysqli_fetch_array($query);
                                        
                                          $tesm = $data["maxMID"];
                                          $idm = (int)substr($tesm, 1, 3);
                                          $idm++;
                                          $ketm = "M";
                                          $kodeM = $ketm . sprintf("%03s", $idm);
                                          $kodeM;
                                      ?>
                                <input name="muridid" Value="<?php echo $kodeM; ?>" class="form-control" readonly>
                                <input name="userm" Value="<?php echo $userID; ?>" class="form-control" readonly>
                                <input name="rolem" Value="MURID" class="form-control" readonly>
                                <input name="kelid" Value="<?php echo $lek; ?>" class="form-control" readonly>     
                            </div>

            
<?php endforeach;?>
<?php else : ?>
          
<?php endif ; ?>
<?php endif ; ?>  
    

                

</form>


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
