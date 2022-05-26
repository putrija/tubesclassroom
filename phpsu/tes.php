<?php
require 'function.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

 <!----id guru auto--->
 <div style="visibility:hidden mb-1 ">
      <?php $query = mysqli_query($connection, "SELECT max(id) as maxGID FROM guru");
      $data = mysqli_fetch_array($query);
      
      $idg = $data["maxGID"];
      $idg++;
      $ketg = "G";
      $kodeG = $ketg . sprintf("%03s", $idg);
      $kodeG;
      ?>
        <input Value="<?= $kodeG; ?>" class="form-control" readonly name="idguru">
      </div>

       <!----id kelas auto--->
       <div style="visibility:hidden my-5">
      <?php $query = mysqli_query($connection, "SELECT max(id) as maxID FROM kelas");
      $data = mysqli_fetch_array($query);
      
      $kodek = $data["maxID"];
      $kodek++;
      $ketk = "K";
      $kodeauto = $ketk . sprintf("%3s", $kodek);
      $kodeauto;
      ?>
        <input Value=<?= $kodeauto; ?> class="form-control" readonly name="idkelas">
      </div>

<div class="container">
  
<?php $sql = $connection->query("SELECT * FROM kelas");
  while($rs=$sql->fetch_object()){
?>

  <tr>
    <td><?php echo $rs->id; ?></td>
  </tr>

<?php
  }
?>


</body>
</html>