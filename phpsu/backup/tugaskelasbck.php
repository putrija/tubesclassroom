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
  <title>Tugas Kelas</title>
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
            <a class="nav-link active" href="tugaskelas.php">Tugas kelas</a>
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


  <!-----Isi---->

  <!---Buat tugas-->
  <?php if ($_SESSION['level'] == 'teacher') : ?>
    <div class="create-tugas container py-2 bg-white col-8 ">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus"></i> Buat
      </button>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width: 700px;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="" method="POST">
            <div class="modal-body">

              <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
              </svg>

              <table class="table table-borderless">

                <tr>
                  <td>
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                      </svg>
                      <div>
                        Data Berhasil di input
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <label for="nama">Nama tugas</label>
                    <input class="form-control" placeholder="Masukkan nama tugas" type="text" name="nama" id="nama">
                  </td>
                </tr>

                <tr>
                  <td>
                    <label for="description">Deskripsi Tugas</label>
                    <textarea class="form-control" placeholder="Masukkan Deskripsi Tugas" id="description" name="description"></textarea>
                  </td>
                </tr>

                <tr>
                  <td>
                    <label for="date">Tanggal Deadline</label>
                    <input class="form-control" type="date" id="date" name="date">
                  </td>
                </tr>

              </table>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="btncreate" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    </div>

    <!----List tugas-->
    <div class="list-tugas ">
      <div class="accordion container py-2 bg-white col-8" id="accordionExample">
        <!---list 1-->
        <?php
        $idkelas = $_SESSION['idkelas'];
        $ambildata = mysqli_query($connection, "SELECT * FROM tugas WHERE idkelas='$idkelas'");
        while ($data = mysqli_fetch_array($ambildata)) {
        ?>
          <div class="accordion-item px-4 py-3" data-bs-toggle="collapse" data-bs-target="#collapse<?= $data['id_tugas']; ?>" aria-expanded="true" aria-controls="collapse<?= $data['id_tugas']; ?>">
            <div class="d-flex justify-content-between">
              <h6 class="accordion-header" id="headingOne">
                <i class="fa-solid fa-clipboard-list me-3"></i>
                <?= $data['nama']; ?>
              </h6>
              <h6>
                Tenggat : <?= $data['date']; ?>
              </h6>
            </div>
            <!--isi collapse-->
            <div id="collapse<?= $data['id_tugas']; ?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="d-flex justify-content-between border-top">
                  <div class="p-2">
                    <?= $data['description']; ?>
                  </div>
                  <div class="p-2">
                    <ul class="list-inline">
                      <li class="list-inline-item border-start px-3">
                        <h3>1</h3> diserahkan
                      </li>
                      <li class="list-inline-item border-start px-3">
                        <h3>2</h3> diberikan
                      </li>
                      <li class="list-inline-item border-start px-3">
                        <h3>1</h3> dinilai
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="see-tugas p-2 border-top p-3">
                  <form method="POST">
                    <input type="hidden" value="<?= $data['idtugas']; ?>" name="idtugas">
                    <button name="btnlihattugas" type="submit" class="btn btn-primary">Lihat Tugas</button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        <?php } ?>


      </div>
    </div>


    <?php
    if (isset($_POST['btncreate'])) {
      $nama = $_POST['nama'];
      $description = $_POST['description'];
      $date = $_POST['date'];
      $idkelas = $_SESSION['idkelas'];

      $buattugas = mysqli_query($connection, "INSERT INTO tugas (idkelas, nama, description, date) values('$idkelas','$nama', '$description', '$date')");

      echo "<script>location='tugaskelas.php';</script>";
    }

    ?>

    <?php
    if (isset($_POST['btnlihattugas'])) {
      $_SESSION['idtugas'] = $_POST['idtugas'];
      echo "<script>window.location.href='tugassiswa.php';</script>";
    }
    ?>










    <!---SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>