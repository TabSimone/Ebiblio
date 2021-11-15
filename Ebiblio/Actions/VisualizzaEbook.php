<!DOCTYPE html>
<html lang="it">

<?php
include 'funzioni.php';
include 'connessioneDB.php';
session_start()
?>

<head>
  <meta charset="utf-8">
</head>

<body>
  <?php
    $mail = $_SESSION['utente'];
    $codiceLibro = $_POST['codiceLibro'];

    $path2 = StampaRisultato($conn, "call VisualizzaEbook('$codiceLibro','$mail')");
    $path1 = "C:/xampp/htdocs/EBIBLIO/PDF/";
    $url = $path1.$path2;
    header('Content-Type: application/pdf');

    @readfile($url);

    $conn->close();
  ?>
</body>

</html>