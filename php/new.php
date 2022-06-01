<!---DISERAHKAN LIST--->
<div class="my-4 list-student">

<h6>Diserahkan</h6>
    <?php
    $idkelas = $_SESSION['idkelas'];
    $ambildata = mysqli_query($connection, "SELECT ul.idkelas, u.nama_user, ul.iduser, ul.level, k.teacher
                                            FROM user AS u 
                                            JOIN user_level AS ul 
                                            ON u.iduser=ul.iduser 
                                            JOIN kelas AS k 
                                            ON ul.idkelas=k.idkelas 
                                            JOIN tugas AS t
                                            ON k.idkelas=t.idkelas 
                                            JOIN jawaban as j
                                            ON u.iduser=j.iduser
                                            WHERE ul.idkelas='$idkelas' AND ul.level='student'
                                            AND j.status='dinilai'");
    ?>
      <h4 class="text-primary "> <?= $ambildata->num_rows; ?> </h2>
    </div>

    <ul class="d-flex flex-column gap-4">
    <?php
    while ($data = mysqli_fetch_assoc($ambildata)) {
      $user = $data['nama_user'];
    ?>

<ol class="list-group list-group-numbered shadow">
  <div class="overflow-auto" style="height: 210px;">

      <li class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img src="https://avatars.dicebear.com/api/micah/<?= $user; ?>.svg?w=400&h=400" alt="Avatar" />
            </div>
            <span class="fs-5"><?php echo $user; ?></span>
          </div>
      </li>

  </div>
</ol>
<?php
  }
?>
</div>