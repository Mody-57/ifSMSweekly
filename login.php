<?php
    require 'fungsi.php';

     if(isset($_SESSION["login"]))
      {
        header("Location: mahasiswa.php");
        exit;
      }

    if(isset($_POST["login"]))
        {
            $error = login($_POST);
        }




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>Login</h1>
    <?php
    if(isset($error))
        {

    ?>
    <p style="color=red">username/password salah</p>
    <?php
        }
    ?>
    <form
     action="" method="post">
        <label for="username">Username:</label> <br>
        <input type="text" name = "username" id= "username" ><br>

         <label for="password">Password:</label> <br>
        <input type="password" name = "password" id= "password" ><br>

        <button type= "submit" name="login">Login</button>
        <br>
        <p>Belum punya akun? <a href= "register.php"> Register</a></p>

    </form>
</body>
</html>