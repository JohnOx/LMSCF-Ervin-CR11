<?php

    function protect() {
        session_start();
        if (!isset($_SESSION["user"])) {
            $_SESSION = [];
            header("Location: login.php");
            exit;
        }
    }

    function protect_admin() {
        session_start();
        if (!isset($_SESSION["admin"])) {
            $_SESSION = [];
            header("Location: login.php");
            exit;  
        }
    }

    function protect_super_admin() {
        session_start();
        if (!isset($_SESSION["superadmin"])) {
            $_SESSION = [];
            header("Location: login.php");
            exit;  
        }
    }

    function logout() {
        $_SESSION = [];
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        header("Location: login.php");
        exit;
    }

    function check_login() {
        $error = false;

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
       
        $pass = trim($_POST['pwd']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);

        if(empty($email)){
            $error = true;
            $emailError = "Please enter your email address.";
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $emailError = "Please enter valid email address.";
        }
          
        if (empty($pass)){
            $error = true;
            $passError = "Please enter your password.";
        }
        
        if (!$error) {
            require_once "config/db_connect.php";
            $sql = $conn->query("SELECT * FROM users WHERE email = '$email'");
            $res = $sql->fetch_assoc();
                if (password_verify($pass, $res["pwd"])) {
                    session_start();
                    if ($res["status"] == "superadmin") {
                        $_SESSION["superadmin"] = $res["user_id"];
                        $_SESSION['admin'] = $res['user_id'];
                        $_SESSION['user'] = $res['user_id'];
                        header("Location: super_admin.php");
                        exit;
                    } elseif ($res["status"] == "admin"){
                        $_SESSION['admin'] = $res['user_id'];
                        $_SESSION['user'] = $res['user_id'];
                        header("Location: admin.php");
                        exit;
                    } else {
                        $_SESSION['user'] = $res['user_id'];
                        header("Location: index.php");
                        exit;
                    }
                }
        }
    }