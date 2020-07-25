<?php
require_once "config/functions.php";

if (count($_POST) > 0) {
    check_login();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
    <!-- BOOTSTRAP CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- GOOGLE FONTS  -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/main.style.css"> -->
    <link rel="stylesheet" href="css/login.style.css">
</head>
<body>

<div class="wrapper fadeInDown">
    <div id="formContent">
 
     <!-- Login Formular -->
      <form class="p-5" action="<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete="on" method="POST">
        <input type="text" id="login" class="fadeIn second" name="email" placeholder="email adresse">
        <input type="password" id="password" class="fadeIn third" name="pwd" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Einloggen">
      </form>

      <div id="formFooter">
        <a class="underlineHover" href="reg.php">Sign Up here</a><br>
      </div>

    </div>
    <div class="mt-4 p-3" style="border:1px solid black">
      <h3>CREDENTIALS:</h3>
      <p>USER: user@user.com PASSWORD: user</p>
      <p>ADMIN: admin@admin.com PASSWORD: admin</p>
      <p>SUPER-ADMIN: superadmin@superadmin.com PASSWORD: test</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>