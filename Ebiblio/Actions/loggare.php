<?php

include 'connessioneDB.php';
include 'funzioni.php';

// Start the session
$status = session_status();
if ($status == PHP_SESSION_NONE) {
  //There is no active session
  session_start();
} else
if ($status == PHP_SESSION_DISABLED) {
  //Sessions are not available
} else
if ($status == PHP_SESSION_ACTIVE) {
  //Destroy current and start new one
  session_destroy();
  session_start();
}



$mail = $_POST['mail'];
$psw = $_POST['psw'];
//$nome = $_POST['nome'];


$result = $conn->query("select * from utente where Email = '$mail' AND Password = '$psw'");

if ($result->num_rows > 0) {
  //$aa= "select * from utente inner join utilizzatore on Email=EmailUtilizzatore"
  $resultA = $conn->query("select * from Amministratore where EmailAmministratore = '$mail'");
  if ($resultA->num_rows > 0) {
    $_SESSION["utente"] = "$mail";
    $_SESSION["tipoUtente"] = "Amministratore";
    $_SESSION["nome"] = StampaRisultato($conn, "SELECT Nome FROM Amministratore inner join utente on Email=EmailAmministratore and Email = '$mail'");
    $row = $resultA->fetch_assoc();
    $_SESSION["biblioteca"] = $row["CodiceBiblioteca"];

    header("Location: /EBIBLIO/Actions/Authentication/PageA.php");
    exit();
  }

  $resultV = $conn->query("select * from Volontario where EmailVolontario = '$mail'");
  if ($resultV->num_rows > 0) {
    $_SESSION["utente"] = "$mail";
    $_SESSION["tipoUtente"] = "Volontario";
    $_SESSION["nome"] = StampaRisultato($conn, "SELECT Nome FROM Volontario inner join utente on Email=EmailVolontario and Email = '$mail'");
    header("Location: /EBIBLIO/Actions/Authentication/PageV.php");
    exit();
  }

  $resultU = $conn->query("select * from Utilizzatore where EmailUtilizzatore = '$mail'");
  if ($resultU->num_rows > 0) {
    $_SESSION["utente"] = "$mail";
    $_SESSION["tipoUtente"] = "Utilizzatore";
    $_SESSION["nome"] = StampaRisultato($conn, "SELECT Nome FROM utilizzatore inner join utente on Email=EmailUtilizzatore and Email = '$mail'");
    header("Location: /EBIBLIO/Actions/Authentication/PageU.php");
    exit();
  }
} else {
  echo "<script>
    alert('Hai sbagliato username o password');
    window.location.href='/EBIBLIO/Actions/Authentication/LogIn.php';
   </script>";
}
