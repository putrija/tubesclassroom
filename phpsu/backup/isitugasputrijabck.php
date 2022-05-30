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
            <!---tambah dan akun-->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
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
    <div class="row">
        <div class="col-md-8">
            <div class="container mt-3">
                <h1><?php echo $row['nama']; ?></h1> <br>
                <h5><?php echo $_SESSION['teacher']; ?>, Created at: <?php echo $row['create']; ?></h5>
                <div class="row mt-3">
                    <div class="col-md-10">
                        <h5>100 poin</h5>
                    </div>
                    <div class="col-md-2">
                        <h5>Tenggat: <?php echo $row['date'] ?></h5>
                    </div>
                </div>
                <hr class="solid">
                <h4><?php echo $row['description'] ?></h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <form action="" method="post">
                        <label for="">Masukkan Jawaban Anda</label>
                        <textarea name="jawaban" class="form-control mb-3" rows="5"></textarea>
                        <button type="submit" name="kumpul" class=" btn btn-primary">Tandai sebagai selesai</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php
    if (isset($_POST['kumpul'])) {
        $jawaban = $_POST['jawaban'];
        $iduser = $_SESSION['iduser'];

        $insertjawaban = mysqli_query($connection, "INSERT INTO pengumpulan_tugas (iduser, id_tugas, jwbn_siswa) values('$iduser', '$idtugas', '$jawaban')");

        echo "<script>location='isitugas.php'</script>";
    }
    ?>


    <!---SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>