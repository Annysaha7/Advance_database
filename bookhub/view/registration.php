<!DOCTYPE html>
<html>
<head>
	<title>Login Form with Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="container">
    <?php
    include("./utilities/navbar.php")
    ?>
	<div class="container">
    <form class="register-form" id="register" action="#" method="post">
			<h2>Register</h2>
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Username">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" placeholder="Email">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Password">
			<label for="confirm-password">Confirm Password</label>
			<input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
			<input type="submit" value="Register">
			<div class="register-link">
				<p>Already have an account? <a href="./login.php">Login here</a></p>
			</div>
		</form>
	</div>
</body>
</html>
