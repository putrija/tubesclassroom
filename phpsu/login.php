<?php
session_start();

require 'function.php';

if (isset($_POST["login"]) ) {
    
  $username = $_POST["username"];
  $password = $_POST["password"];

  $data = mysqli_query($connection, "SELECT * FROM user 
  WHERE username = '$username'");

  //check username
  if(mysqli_num_rows($data)) {

      //check password
      $row = mysqli_fetch_assoc($data);
      if ( password_verify($password, $row["password"]) ) {

        //user id
        $id = $row["id"] ;
        $_SESSION["userID"] = $id;       
        // set session user
        $_SESSION["login"] = TRUE;    
            header("Location: dashboard.php");
            
        } 

    } 

    $error = TRUE;
} 
  



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

      <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;"> username / password salah </p>
      <?php endif; ?>


      <form action="" method="POST" class="my-login-validation" novalidate="" id="reguser">
      
      <!--username-->
        <div class="mb-3">
          <input type="text"class="form-control py-3" placeholder="Username"
            name="username" id="username" 
          />
        </div>

      <!--Password-->
        <div class="mb-3">
          <input type="password" class="form-control py-3" placeholder="Password"
            name="password" id = "password"/>
        </div>
      
        <button class="w-100 py-3 btn btn-primary" name="login">
          Sign In
        </button>
        <div class="my-2">OR</div>
        <a href="register.php" class="w-100 py-3 btn btn-dark">Sign up</a>
    
      </form>
    </div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>
