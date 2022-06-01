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

//nilaiTugas
if(isset($_POST["nilaiTugas"])) {
    if(editNilai($_POST) > 0) {
        header("Location: tugassiswa.php");    
    }
}

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
  <link rel="stylesheet" href="../css/reset.css" />
  <style>
        body {
          background-color: white;
        }
  </style>

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

  <!---SIDEBAR--->
<?php include 'sidebar.php' ?>

<div class="row">
      <!----ISI--->
    <div class="col-lg-4 container-left ms-5 ps-5">
          <h5>Semua Siswa</h5>

         <!---DISERAHKAN LIST--->
          <div class="my-4 list-student">
            <?php
              $idkelas = $_SESSION['idkelas'];
              $idtugas = $row['id_tugas'];
              $datadiserahkan = mysqli_query($connection,
               "SELECT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher
                FROM user AS u 
                JOIN user_level AS ul 
                ON u.iduser=ul.iduser 
                JOIN kelas AS k 
                ON ul.idkelas=k.idkelas 
                JOIN tugas AS t
                ON k.idkelas=t.idkelas 
                JOIN jawaban as j
                ON u.iduser=j.iduser
                WHERE ul.idkelas='$idkelas' AND ul.level='student' AND j.id_tugas = $idtugas
                AND j.status='diserahkan'");
              ?><!--Batas--->
              <h6>Diserahkan  <?= $datadiserahkan->num_rows; ?> </h6>
                
                <ol class="list-group list-group-numbered shadow pt-3">
                 <div class="overflow-auto" style="height: 210px;">
                  <?php
                    while ($data = mysqli_fetch_assoc($datadiserahkan)) {
                    $user = $data['nama_user'];
                    ?>   
                      <li class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center">
                            <div class="avatar ms-3 me-2 my-2">
                              <img src="https://avatars.dicebear.com/api/micah/<?= $user; ?>.svg?w=350&h=350" alt="Avatar" />
                            </div>
                            <span class="fs-5"><?php echo $user; ?></span>
                          </div>
                      </li> 
                    <?php } ?>
                 </div>  
                </ol>
          </div>

          <!---DINILAI LIST--->
          <div class="my-4 list-student">
            <?php
              $idkelas = $_SESSION['idkelas'];
              $idtugas = $row['id_tugas'];
              $datadinilai = mysqli_query($connection,
               "SELECT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher
                FROM user AS u 
                JOIN user_level AS ul 
                ON u.iduser=ul.iduser 
                JOIN kelas AS k 
                ON ul.idkelas=k.idkelas 
                JOIN tugas AS t
                ON k.idkelas=t.idkelas 
                JOIN jawaban as j
                ON u.iduser=j.iduser
                WHERE ul.idkelas='$idkelas' AND ul.level='student' AND j.id_tugas = $idtugas
                AND j.status='dinilai'");
              ?><!--Batas--->
              <h6>Dinilai  <?= $datadinilai->num_rows; ?> </h6>
                
                <ol class="list-group list-group-numbered shadow pt-3">
                 <div class="overflow-auto" style="height: 210px;">
                  <?php
                    while ($data = mysqli_fetch_assoc($datadinilai)) {
                    $user = $data['nama_user'];
                    ?>   
                      <li class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center">
                            <div class="avatar ms-3 me-2 my-2">
                              <img src="https://avatars.dicebear.com/api/micah/<?= $user; ?>.svg?w=350&h=350" alt="Avatar" />
                            </div>
                            <span class="fs-5"><?php echo $user; ?></span>
                          </div>
                      </li> 
                    <?php } ?>
                 </div>  
                </ol>
          </div>

          <!---DITUGASKAN LIST--->
          <div class="my-4 list-student">
              <?php
                $idkelas = $_SESSION['idkelas'];
                $idtugas = $row['id_tugas'];
                $dataditugaskan = mysqli_query($connection,
                "SELECT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher
                  FROM user AS u 
                  JOIN user_level AS ul 
                  ON u.iduser=ul.iduser 
                  JOIN kelas AS k 
                  ON ul.idkelas=k.idkelas 
                  WHERE ul.idkelas='$idkelas' AND ul.level='student' 
                  ");
                ?><!--Batas--->
                <h6>ditugaskan <?= $dataditugaskan->num_rows - $datadiserahkan->num_rows -$datadinilai->num_rows; ?> </h6>
                  
                  <ol class="list-group list-group-numbered shadow pt-3">
                  <div class="overflow-auto" style="height: 210px;">
                    <?php
                      while ($data = mysqli_fetch_assoc($dataditugaskan)) {
                      $user = $data['nama_user'];
                      ?>   
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                              <div class="avatar ms-3 me-2 my-2">
                                <img src="https://avatars.dicebear.com/api/micah/<?= $user; ?>.svg?w=350&h=350" alt="Avatar" />
                              </div>
                              <span class="fs-5"><?php echo $user; ?></span>
                            </div>
                        </li> 
                      <?php } ?>
                  </div>  
                  </ol>
            </div>  

    </div><!--Batas akhir container left--->


    
    <div class="col-lg-6 container-right mt-5">
      <!-- DESCRIPTION BOX -->

        <!---Nama tugas--->
        <div class="task-desc shadow pt-1 ps-4">
          
          <h4 class="my-3"><?php echo $row['nama']; ?> </h4>
          <!-- Description TUGAS -->
          <div class="description my-2 pb-2">
            <ul class="list-inline">
              <li class="list-inline-item border-start px-3">
                <h2> <?= $datadiserahkan->num_rows; ?> </h2> diserahkan
              </li>
              <li class="list-inline-item border-start px-3">
                <h2><?= $dataditugaskan->num_rows - $datadiserahkan->num_rows -$datadinilai->num_rows; ?>
                    </h2> ditugaskan
              </li>
              <li class="list-inline-item border-start px-3">
                <h2> <?= $datadinilai->num_rows; ?> </h2> dinilai
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
                $idtugas = $row['id_tugas'];
                $ambildata = mysqli_query($connection, "SELECT * FROM jawaban AS j INNER JOIN user AS u ON j.iduser = u.iduser WHERE j.id_tugas = $idtugas");
                while ($row = mysqli_fetch_assoc($ambildata)) {
                ?>
                  <div class="col-lg-3 my-2">
                    <div class="card w-100 text-center">
                      <div class="card-body">
                        <h6 class="card-title"><?= $row['nama_user']; ?></h6>
                        <a class="" href="file/<?=$row['jwbn_siswa']?>" download="<?=$row['jwbn_siswa']?>"> <?= $row['jwbn_siswa']; ?></a>
                        <form method="POST">
                          <input type="hidden" name="status" value="dinilai">
                          <input type="hidden" name="id" value="<?=$row["id"]?>">
                          <input type="number" name="nilai" class="form-control" value="<?=$row["nilai"]?>" style="text-align: center;">
                          <button name="nilaiTugas" class="mt-2 btn btn-primary">nilai</button>
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

    </div><!--Batas akhir container right--->

</div>




  <!---SCRIPT-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>
  
</body>

</html>