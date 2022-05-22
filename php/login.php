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
  </head>

  <body>
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
      <div class="board">
        <img src="../gambar/board.svg" alt="Board" />
      </div>
      <h1 class="fs-2 mb-3">Sign In</h1>

      <form>
        <div class="mb-3">
          <input
            type="email"
            class="form-control py-3"
            placeholder="Username"
          />
        </div>
        <div class="mb-3">
          <input
            type="password"
            class="form-control py-3"
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
        <button type="submit" class="w-100 py-3 btn btn-primary">
          Sign In
        </button>
        <div class="my-2">OR</div>
        <a href="#" class="d-block mb-3 text-primary">Forgot password?</a>
        <button class="w-100 py-3 btn btn-dark">
          <a href="register.php">Sign Up </a></button>
      </form>
    </div>
  </body>
</html>
