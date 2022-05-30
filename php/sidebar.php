  <!------SIDEBAR----->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 350px;">
    <!-- offcanvas-Body -->
    <div class="offcanvas-body">
      <!--isi-->
      <ul class="nav nav-pills flex-column">
        <li class="nav-item mb-3">
          <a href="dashboard.php" class="nav-link active" aria-current="page">
            <i class="fa-solid fa-house me-3"></i>
            Kelas</a>
        </li>
        <li class="nav-item mb-3">
          <a href="kalender.html" class="nav-link text-black">
            <i class="fa-regular fa-calendar me-3"></i>
            Kalender
          </a>
        </li>
<!---php side daftar kelas untuk Murid--->
<?php
        $iduser = $_SESSION['iduser'];
        $ambildatakelas = mysqli_query($connection, "SELECT * FROM user AS u INNER JOIN user_level AS ul ON u.iduser=ul.iduser INNER JOIN kelas AS k ON ul.idkelas=k.idkelas
                                                     WHERE ul.iduser='{$iduser}' AND ul.level ='student'");
 ?>      
       <li class="nav item border-top py-3">
          Terdaftar
        </li>
        <li class="nav item mb-2">
          <a href="daftartugas.html" class="nav-link text-black">
            <i class="fa-solid fa-list-check me-3"></i>
            Daftar tugas
          </a>
        </li>
<?php
while ($data = mysqli_fetch_array($ambildatakelas)) {
$namakelas = $data['namakelas'];
$bagian = $data['bagian'];
$namaguru = $data['teacher'];
$idkelass = $data['idkelas'];
?>
        <!--isi-->
        <li class="nav item mb-3">
            <form method="POST">
              <input type="hidden" value="<?= $idkelass ?>" name="idkelas">
              <button name="btnbukakelas" type="submit" class="btn">
                <i class="fa-solid fa-users-rectangle me-3"></i>
                <?=$namakelas?>
              </button>
            </form>
        </li>
<?php  }; ?>
<!------------------>
        
<!---php side daftar kelas untuk guru--->
<?php
        $iduser = $_SESSION['iduser'];
        $ambildatakelas = mysqli_query($connection, "SELECT * FROM user AS u INNER JOIN user_level AS ul ON u.iduser=ul.iduser INNER JOIN kelas AS k ON ul.idkelas=k.idkelas
                                                     WHERE ul.iduser='{$iduser}' AND ul.level ='teacher'");
 ?>      
        <li class="nav item border-top py-3">
        Mengajar
        </li>
        <li class="nav item mb-2">
            <a href="daftartugas.html" class="nav-link text-black">
            <i class="fa-solid fa-list-check me-3"></i>
            Untuk Diperiksa
          </a>
        </li>
<?php
while ($data = mysqli_fetch_array($ambildatakelas)) {
$namakelas = $data['namakelas'];
$bagian = $data['bagian'];
$namaguru = $data['teacher'];
$idkelass = $data['idkelas'];
?>
        <!--isi-->
        <li class="nav item mb-3">
            <form method="POST">
              <input type="hidden" value="<?= $idkelass ?>" name="idkelas">
              <button name="btnbukakelas" type="submit" class="btn">
                <i class="fa-solid fa-users-rectangle me-3"></i>
                <?=$namakelas?>
              </button>
            </form>
        </li>
<?php  }; ?>
<!------------------>
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




