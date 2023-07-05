<?php 
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Welcome to GROCER</h1>
    <h3>Login</h3>
    <form method="POST">
        <input type="text" placeholder="ID" name="id"><br><br>
        <input type="text" placeholder="password" name="password"><br><br>
        <button name="login" type="submit">Login</button>
    </form>
</body>
</html>