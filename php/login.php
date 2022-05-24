<?php  
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/reset.css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  </head>
  <body>
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
      <div class="board">
        <img src="../gambar/board.svg" alt="Board" />
      </div>
      <h1 class="fs-2 mb-3">Sign In</h1>

      <form method="POST" class="my-login-validation" novalidate="">
        <div class="mb-3">
          <input
            type="text"
            class="form-control py-3"
            name="username"
            id="username"
            placeholder="Username"
          />
        </div>
        <div class="mb-3">
          <input
            type="password"
            class="form-control py-3"
            name="password"
            placeholder="Password"
          />
        </div>
        <div class="d-flex form-check mb-3">
          <input
            class="form-check-input me-2"
            type="checkbox"
            value=""
            id="flexCheckDefault"
          />
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div>
        <button type="submit" class="w-100 py-3 btn btn-primary" name="btnlogin">
          Sign In
        </button>
        <div class="my-2">OR</div>
        <a href="#" class="d-block mb-3 text-primary">Forgot password?</a>
        <a href="register.php" class="w-100 py-3 btn btn-dark">Sign up</a>
      </form>
    </div>

    <?php 
    if(isset($_POST['btnlogin']))
    {

        require ("function.php");
        $user_login=$_POST['username'];
        $pass_login=sha1($_POST['password']);
        $sql = "SELECT * FROM user WHERE username = '{$user_login}' OR email = '{$user_login}' and password = '{$pass_login}'";
        $query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_array($query)){
            $iduser = $row['id'];
            $user=$row['username'];
            $pass=$row['password'];
            $email=$row['email'];
            $nama_user=$row['nama_user'];
        }
        if($user_login == $user || $email && $pass_login ==$pass){
            echo "Username: $user_login dan Password: $pass_login";
            header ("Location: dashboardsiswa.php");
            $_SESSION['iduser'] = $iduser;
            $_SESSION['username'] = $user ;
            $_SESSION['email'] = $email;
            $_SESSION['nama_user'] = $nama_user;
        } else{
            echo "LOGIN GAGAL";
        }
    }
?>

  </body>
</html>
