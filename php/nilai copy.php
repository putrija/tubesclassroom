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
        $ambildata = mysqli_query($connection, "SELECT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher 
                                                FROM user AS u 
                                                INNER JOIN user_level AS ul ON u.iduser=ul.iduser 
                                                INNER JOIN kelas AS k ON ul.idkelas=k.idkelas 
                                                JOIN jawaban as j ON u.iduser=j.iduser
                                                WHERE ul.idkelas='$idkelas' AND ul.level='student'");

        while ($data = mysqli_fetch_assoc($ambildata)) {
          $user = $data['nama_user'];
        ?>
          <?php for ($j = 0; $j < 1; $j++) { ?>
            <tr>
              <td><?= $user ?></td>

              <?php for ($k = 0; $k < 5; $k++) { ?>
                <td> <?php $data['level']; ?><?= $k; ?></td>
              <?php } ?>
            </tr>
          <?php } ?>
        <?php
        }
        ?>
      </tbody>
    </table>


    <div class="row">

                <?php
                $ambildata = mysqli_query($connection, "SELECT * FROM jawaban AS j INNER JOIN user AS u ON j.iduser = u.iduser");
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
                          <button name="nilaiTugas" class="mt-2 ms-4 btn btn-primary">nilai</button>
                        </form>
                      </div>
                    </div>                    
                  </div>

                <?php
                }
                ?>

            </div>
  </div>




  <!---SCRIPT-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>