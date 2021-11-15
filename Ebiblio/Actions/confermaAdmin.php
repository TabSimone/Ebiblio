<?php
include 'connessioneDB.php';
/*error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ebiblio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

$psw = $_POST['psw'];

if ($psw == "admin") {
    header("Location: /EBIBLIO/Actions/Authentication/SignIn/SignInA.php");
} else {
    header("Location: /EBIBLIO/Actions/Authentication/SignIn/AdminPsw.php");
}

$conn->close();
