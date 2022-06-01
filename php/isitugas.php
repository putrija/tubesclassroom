<?php
require("function.php");
error_reporting(0);
if (empty($_SESSION['username'])) {
    header("Location: ../html/error.html");
}
$idKelas = $_SESSION['idkelas'];
$idUser = $_SESSION['iduser'];
$idtugas = $_SESSION['idtugas'];
$query = "SELECT * FROM tugas AS t INNER JOIN jawaban AS j WHERE t.id_tugas = $idtugas AND j.iduser = $idUser  AND t.idkelas = $idKelas";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

//Upload tugas
if (isset($_POST["upload"])) {

    //var_dump($_FILES);
    if (addJawaban($_POST) > 0) {
        header("Location: isitugas.php");
    }
}

if (isset($_POST["update"])) {

    if (updateJawaban($_POST) > 0) {
        header("Location: isitugas.php");
    }
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
                        <a class="nav-link" href="forum.php">
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

    <!---SIDEBAR--->
    <?php include 'sidebar.php' ?>

    <!------ISI---->
    <div class="row">

        <div class="col-md-8">
            <div class="container mt-3 ms-5">
                <h1><?php echo $row['nama']; ?></h1> <br>
                <!--nama tugas--->
                <?php $date = date('d M Y', strtotime($row["create"])); ?>
                <h5><?php echo $_SESSION['teacher']; ?>, dibuat pada: <?= $date ?> </h5>

                <div class="row mt-3">
                    <div class="col-md-9">
                        <h5>100 poin</h5>
                    </div>
                    <div class="col-md-3">
                        <?php $tengat = date('d M', strtotime($row["date"])); ?>
                        <h5>Tenggat: <?= $tengat ?> </h5>
                    </div>
                </div>

                <hr class="solid">

                <h4><?php echo $row['status'] ?></h4>
                <h4><?php echo $row['description'] ?></h4>
                <object class="mt-3" data="berkas/<?php echo $row['upload']; ?>" width="400" height="200"></object>
                <?php
                if ($row['jenis'] == 'pertanyaan') :
                ?>
                    <form action="" method="POST">
                        <div class="card mt-3" style="width: 90%;">
                            <div class="card-body">
                                <h5 class="card-title">Jawaban Anda</h5>
                                <textarea name="jawaban_pertanyaan" id="jawaban_pertanyaan" cols="100%" rows="7"></textarea>
                                <button type="submit" class="btn btn-primary" name="btnserahkan">Serahkan</button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-4">

            <?php
            $jenis = $row['jenis'];
            if ($jenis == 'tugas') :
            ?>
                <div class="sbmt-task px-3 my-4">
                    <div class="box-sbmt border shadow px-3 py-3">
                        <h5 class="card-title">Tugas Anda</h5>
                        <?php

                        if ($row['status'] == 'diserahkan') :
                        ?>
                            <h5 class="card-title"><?php echo $row['status'] ?></h5>
                            <p><?php echo $row['jwbn_siswa'] ?></p>
                            <form action="" method="POST"><button type="submit" name="btnbatal">Batalkan pengiriman</button></form>

                        <?php
                        elseif ($row['status'] == 'dinilai') :
                        ?>
                            <h5 class="card-title"><?php echo $row['status'] ?></h5>
                            <p><?php echo $row['jwbn_siswa'] ?></p>

                        <?php
                        else :
                        ?>
                            <?php
                            $userID = $_SESSION['iduser'];
                            $check = mysqli_query($connection, "SELECT * FROM jawaban WHERE iduser = $userID AND id_tugas = $idtugas");
                            $checkJawaban = mysqli_num_rows($check);
                            if ($checkJawaban > 0) {
                                $jawaban = show("SELECT * FROM jawaban WHERE iduser = $userID AND id_tugas = $idtugas")[0];
                                $jawabanID = $jawaban["id"];
                            }
                            ?>

                            <?php if ($checkJawaban == 0) : ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <p class="my-0 mx-auto">Document file : <span>pdf</span></p>
                                    <input type="file" id="formFile" class="form-control-sm form-control" name="file">
                                    <input type="hidden" name="tugas" value="<?= $idtugas ?>">
                                    <input type="hidden" name="user" value="<?= $userID ?>">
                                    <input type="hidden" name="status" value="diserahkan">
                                    <button class="btn mx-auto btn-outline-primary my-2" name="upload">Upload Tugas<i class="mx-2 fas fa-file-upload"></i></button>
                                </form>
                            <?php else : ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <p class="my-0 mx-auto">Document file : <span>pdf</span></p>
                                    <input type="file" id="formFile" class="form-control-sm form-control" name="file">
                                    <input type="hidden" name="jawaban" value="<?= $jawabanID ?>">
                                    <button class="btn mx-auto btn-primary my-2" name="update">Update<i class="mx-2 fas fa-file-upload"></i></button>
                                </form>
                                <!-- ?= var_dump($jawabanID)?> -->
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>


        </div>

    </div>



    <!----FUNGSI PHP--->

    <?php
    ?>

    <?php
    if (isset($_POST['btnserahkan'])) {
        $iduser = $_SESSION['iduser'];
        $jawaban = $_POST['jawaban_pertanyaan'];

        $insertjawaban = mysqli_query($connection, "INSERT INTO jawaban (iduser, id_tugas, jwbn_siswa, status) values('$iduser', '$idtugas', '$jawaban', 'diserahkan')");
    }
    ?>

    <?php
    if (isset($_POST['selesai'])) {
        $iduser = $_SESSION['iduser'];

        $direktori = "berkas/";
        //random angka agar foto dengan nama yang sama tidak terganti
        $file_name = rand(1000, 10000) . "-" . $_FILES['upload_tugas']['name'];
        move_uploaded_file($_FILES['upload_tugas']['tmp_name'], $direktori . $file_name);

        $insertjawaban = mysqli_query($connection, "INSERT INTO jawaban (iduser, id_tugas, jwbn_siswa, status) values('$iduser', '$idtugas', '$jawaban', 'diserahkan')");

        echo "<script>location='isitugas.php'</script>";
    }
    ?>


    <!---SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9c0c4e63c7.js" crossorigin="anonymous"></script>

</body>

</html>