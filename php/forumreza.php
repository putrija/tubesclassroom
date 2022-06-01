<?php
require("function.php");
error_reporting(0);
if (empty($_SESSION['username'])) {
  header("Location: ../html/error.html");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
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
  <nav class="navbar navbar-expand-lg navbar-light container-fluid sticky-top border pb-1" style="background-color: white">
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
            <a class="nav-link" href="dashboard.php">
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
            <a class="nav-link active" href="forum.php">Forum </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tugaskelas.php">Tugas kelas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="anggota.php">Anggota</a>
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
              <a class="popup__link" href="editprofil.html" target="_blank">Manage your account</a>
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
          <a href="dashboard.php" class="nav-link text-black">
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
          <a href="forum.php" class="nav-link text-black">
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

  <!------ISI---->

  <div class="container pt-1">
    <!-- Banner -->
    <section class="d-flex flex-column gap-1 space-header banner text-white bg-secondary px-3 py-4 rounded ">
      <h1 class="banner__class"><?php echo $_SESSION['namakelas'] ?></h1>
      <div class="fs-4">
        <span>Teacher : </span><span class="banner__teacher"><?php echo $_SESSION['nama_user'] ?></span>
      </div>
      <div class="fs-4">
        <span>Subject : </span><span class="banner__subject"><?php echo $_SESSION['mapel'] ?></span>
      </div>
      <div class="fs-4">
        <span>Room : </span><span class="banner__room"><?php echo $_SESSION['ruang'] ?></span>
      </div>
    </section>

    <!-- Class Code -->

    <div class="row">
      <div class="col-md-3 mt-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Class Code</h5>
            <h1 class="mb-6"><?php echo $_SESSION['kodekelas'] ?></h1>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Upcoming</h5>
            <h6 class="card-subtitle mb-2 text-muted">No work due soon</h6>
          </div>
        </div>
      </div>
      <div class="col-md-9 mt-3">
        <!-- Click to show input area -->
        <button class="
            d-flex
            align-items-center
            shadow
            rounded
            px-3
            py-4
            bg-success
            text-primary
            cursor-pointer
            w-100
            mb-4
          " data-bs-toggle="modal" data-bs-target="#modal-input">
          <div class="avatar me-3">
            <img src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
          </div>
          <span class="text-white">Announce something to your class</span>
        </button>

        <div class="modal fade" id="modal-input" tabindex="-1" style="display: none" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header mb-3">
                <div class="d-flex align-items-center">
                  <img class="avatar me-3" src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
                  <div class="text-success">Write your announcement</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post">

              <div class="px-3 mb-3">
                <div class="form-floating">
                  <textarea name="postingan" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                  <label for="floatingTextarea2" class="text-black-50">Announcement</label>
                </div>
              </div>

              <div class="modal-footer d-flex justify-content-between">
                <div>
                  <label class="upload cursor-pointer" for="upload">
                    <img class="img-cover" src="svgs/upload.svg" alt="Upload" />
                  </label>
                  <input id="upload" type="file" />
                </div>
                <div class="d-flex">
                  <button type="button" class="btn btn-secondary py-2 me-2" data-bs-dismiss="modal">
                    Cancel
                  </button>
                  <button name="btnadd" type="submit" class="btn btn-primary py-2" data-bs-dismiss="modal">
                    Post
                  </button>
                </div>
              </div>
            </form>
            <?php
            if (isset($_POST['btnadd'])){
              $id = $_SESSION['iduser'];
              $postingan = $_POST['postingan'];
              $sql = "INSERT INTO posting (postingan, iduser) values ('$postingan', '$id')";
              if ($connection->query($sql)===TRUE){
                echo "";
              }else{
                echo "Terjadi kesalahan";
              }
        
            }
            ?>
            </div>
          </div>
        </div>
        <ul>
          <?php
          $query = "SELECT * FROM tugas WHERE idkelas = '$_SESSION[idkelas]'";
          $result = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <li class="bg-white px-3 py-4 rounded shadow">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center mb-3">
                  <img class="avatar me-3" src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
                  <form action="" method="POST">
                    <input type="hidden" value="<?= $row['id_tugas']; ?>" name="idtugas">
                    <button name="btnisitugas" type="submit">
                      <h3 class="fs-5"><?php echo $_SESSION['teacherr'] ?> memposting Tugas Baru </h3>
                    </button>
                  </form>
                </div>
              </div>
            </li>
            <br>

          <?php } ?>
        </ul>
       
        <?php
        $query = mysqli_query($connection, "SELECT * FROM posting JOIN user ON posting.iduser = user.iduser ORDER BY tgl_posting DESC");
        foreach ($query as $row){
        ?>
        <ul>
            <li class="bg-white px-3 py-4 rounded shadow">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center mb-3">
                  <img
                    class="avatar me-3"
                    src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                    alt="Avatar"
                  />
                  <div>
                        <h3 class="fs-6"><?php echo $row['nama_user'] ?></h3>
                        <time class="text-black-50"><?php echo strftime("%H.%M", strtotime($row['tgl_posting'])) ?></time>
                  </div>
                </div>
                <form method="post" onsubmit="return confirm ('Are you sure want to delete this data?');">
                  <input hidden name="id_posting" type="text" value="<?php echo $row['id_posting']  ?>">
                <button name="btnhapus" type="submit" class="btn btn-dark text-white">&#x2716;</button>
                </form>
                <?php 
                 if (isset($_POST['btnhapus'])){
                  $id = $_post['id_posting'];
                  print_r($id);
                  if ($connection){
                   $sql = "DELETE FROM posting WHERE id_posting = $id";
                   mysqli_query ($connection, $sql);
                  }else{
                    echo "Terjadi kesalahan";
                  }
            
                }
                ?>
              </div>

              <p class="border-bottom pb-3"><?php echo $row['postingan']?></p>
              <form>
             
              <div class="fw-bold text-decoration-underline mb-4">
                Comments:
              </div>

              <?php 
              $id_posting = $row['id_posting'];
               $queryy = mysqli_query($connection, "SELECT * FROM komentar WHERE id_posting = $id_posting");
               foreach ($queryy as $roww){
               ?>
              <ul class="mt-2 border-bottom">
                <li>
                  <div
                    class="
                      d-flex
                      align-items-center
                      justify-content-between
                      mb-3
                    "
                  >
                    <div class="d-flex align-items-center">
                      <img
                        class="avatar me-3"
                        src="https://avatars.dicebear.com/api/adventurer-neutral/12345.svg"
                        alt="Avatar"
                      />
                      <div>
                        <h3 class="fs-6"><?php echo $row['nama_user']?></h3>
                        <time class="text-black-50"><?php echo strftime("%H.%M", strtotime($row['tgl_posting'])) ?></time>
                      </div>
                    </div>
                    <div class="btn btn-dark text-white">&#x2716;</div>
                  </div>
                  <p><?php echo $roww['komentar']?></p>
                </li>
              </ul>
              <?php
              }
              ?>

              <form method="post" class="d-flex align-items-center mt-4">
              <input type="hidden" name="id_posting" value="<?php echo $row['id_posting'] ?>">
             
                <img
                  class="avatar me-3 mt-2"
                  src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                  alt="Avatar"
                />
                
                <input
                  class="flex-grow-1 border me-2 p-2 mt-2"
                  placeholder="Write your comment..."
                />
                
                <button name="btnkomentar" type="submit" class="btn btn-primary mt-2">Send</button>
               </li>
              </form>
              </form>
             
            </li>
          </ul>
          <br>
          <?php
           }
          ?>
        </div>
      </div>
    </section>
    </div>
      </div>
    </div>
  </div>
  </div>

            <?php
            if (isset($_POST['btnkomentar'])){
              $id = $_SESSION['iduser'];
              $id_posting =  $_POST['id_posting'];
              $komentar = $_POST['komentar'];
              mysqli_query($connection, "INSERT INTO komentar (komentar, iduser, id_posting) VALUES ('$komentar', '$id', '$id_posting')");

              header("Location:forum.php");
              
        
            }
            ?>

  <?php
  if (isset($_POST['btnisitugas'])) {
    $_SESSION['idtugas'] = $_POST['idtugas'];
    if ($_SESSION['level'] == 'teacher') {
      echo "<script>window.location.href='tugassiswa.php';</script>";
    } else {
      echo "<script>window.location.href='isitugas.php';</script>";
    }
  }
  ?>

  


  <!---SCRIPT-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>