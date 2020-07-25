<?php
const DB_HOST = "localhost"; 
const DB_NAME = "cr11_Ervin_petadoption";
const DB_USER = "root";
const DB_PASS = "";

$conn = "";
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
