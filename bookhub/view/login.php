<?php
	include("../control/login.php")
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
  <div class="container">
      <?php
      include("./others/navbar.php")
    ?>
  </div>

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Vertically centered hero sign-up form</h1>
        <p class="col-lg-10 fs-4"></p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="1000" name="id">
            <label for="floatingInput">User ID</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign up</button>
          <hr class="my-4">
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
