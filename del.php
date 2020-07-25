<?php
require_once "config/functions.php";
protect_admin();
// FILE FOR DB CONNECTION
require_once "config/db_connect.php";
// HEADER TEMPLATE 
require_once "temp/header_temp.php";


if(isset($_GET["anim_id"])) {
    $anim_id = $_GET["anim_id"];
    $result = $conn->query("DELETE FROM `animals` WHERE `animal_id` = '$anim_id'");
    echo "<div class='alert alert-success' role='alert'>
            <h4 class='alert-heading'>You have successfully deleted the entry</h4>
            <hr>
            <p class='mb-0'>You will be redirected to the homepage</p>
        </div>"; 
    header("Refresh: 2; url=admin.php");
    exit;
}

if (isset($_GET["del_user"])){
    $id = $_GET["del_user"];
    $result = $conn->query("DELETE FROM users WHERE user_id = $id");
        echo "<div class='alert alert-success' role='alert'>
                <h4 class='alert-heading'>You have successfully deleted the entry</h4>
                <hr>
                <p class='mb-0'>You will be redirected to the user page</p>
             </div>"; 
        header("refresh:2 url=super_admin.php");  
}

$conn->close();


// FOOTER TEMPLATE
include "temp/footer_temp.php";
