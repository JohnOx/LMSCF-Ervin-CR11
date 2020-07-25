<?php
/**
*Chcek if $_SESSION is already set
*/
session_start();
if( isset($_SESSION['user'])!="" ){
 header("Location: index.php" );
}

// FILE FOR DB CONNECTION
require_once "config/db_connect.php";
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
    <link rel="stylesheet" href="css/reg.style.css">
</head>
<body>
<?php

/**
 * @var array for error output
 */
$errors = [];
$errorstring = "";

if (count($_POST) > 0) {
    $name = trim($_POST["name"]);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $lastname = trim($_POST["lastname"]);
    $lastname = strip_tags($lastname);
    $lastname = htmlspecialchars($lastname);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $psw = trim($_POST['psw']);
    $psw = strip_tags($psw);
    $psw = htmlspecialchars($psw);

    $psw_repeat = trim($_POST['psw_repeat']);
    $psw_repeat = strip_tags($psw_repeat);
    $psw_repeat = htmlspecialchars($psw_repeat);

    if (!isset($name) || !is_string($name) || 
    $name === "" || !preg_match('/^[a-zA-Z\-.\&\s]*$/', $name)) {
    $errors[] = "Please enter your Name";
    }

    if (!isset($name) || !is_string($name) || 
    $name === "" || !preg_match('/^[a-zA-Z\-.\&\s]*$/', $name)) {
    $errors[] = "Please enter your Lastname";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
        $errors[] = "Please enter valid email address.";
    }

    if( (empty($psw)) || strlen($psw ) < 8 ) {
        $errors[] = "Password must have atleast 8 characters.!
        ";
    }

    if (empty($psw_repeat) || $psw != $psw_repeat) {
        $errors[] = "Please confirm your password";
    }

    /**
    * Check if user already exists
    */

    $user_check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $stmt_user = mysqli_query($conn, $user_check_query);
    foreach ($stmt_user as $user) {
            if ($user['email'] === $email) {
                $errors[] = "User already exists";
            }
    }

    if (count($errors) == 0) {
        $psw_hash = password_hash($psw, PASSWORD_DEFAULT);
        $query = "INSERT INTO users(
                                    `firstname`,
                                    `lastname`,
                                    `email`,
                                    `pwd`) 
                                    VALUES( '$name',
                                            '$lastname',
                                            '$email',
                                            '$psw_hash')";
        $res = mysqli_query($conn, $query);
        
        echo "  <div class='container p-0'>
                    <div class='alert alert-success' role='alert'>
                        <h4 class='alert-heading'>You have successfully registerd</h4>
                        <hr>
                        <a class='btn btn-primary' href='index.php'>Back to Login</a>
                    </div>
                </div>";

        // header("Refresh: 3; url=login.php");
        exit;

    } else {
        $errorstring = "<div class='err_out_s'>";
        $errorstring .= "<h5><b><u>Incorrect Data:</u></b></h5>";
        $errorstring .= "<ul style='list-style-type: circle;'><li>";
        $errorstring .= implode("</li><li>", $errors);
        $errorstring .= "</li></ul>";
        $errorstring .= "</div>";
    }
}
?>
    <div class="container">
        <form class = "main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form_header">
                <h1>Sign Up</h1>
                <p>Please fill out the form completely to register</p>
            </div>
            <!-- Output errors -->
            <div class="reg_error">
                <?= $errorstring ?>
            </div>

            <!-- Form -->
            <div class = "form_fields">
                <label for="name"><b>Name:</b></label>
                <input type="text" placeholder="Vorname eingeben" name="name" id="name" value="<?= $_POST["name"] ?? "";?>" required>

                <label for="lastname"><b>Last Name:</b></label>
                <input type="text" placeholder="Nachname eingeben" name="lastname" id="lastname" value="<?= $_POST["lastname"] ?? "";?>" required>

                <label for="email"><b>Email:</b></label>
                <input type="text" placeholder="Email eingeben" name="email" id="email" value="<?= $_POST["email"] ?? "";?>" required>

                <label for="psw"><b>Password:</b></label>
                <input type="password" placeholder="Passwort eingeben" name="psw" id="psw">
                <p class="pwd_info">*Passwort muss enthalten: eine Nummer, einen klein buchstaben, einen gross buchstaben, ein speziellen-character, länge mindestens 8 zeichen</p>

                <label for="psw_repeat"><b>Confirm Password:</b></label>
                <input type="password" placeholder="Passwort wiederholen" name="psw_repeat" id="psw_repeat">
                <hr>
                <button type="submit" class="registerbtn">Sign Up</button>
            </div>
        </form>

        <div class="container signin">
            <p>You already have an account?<a href="login.php">Anmelden</a>.</p>
        </div>
    </div> 
</body>
</html>