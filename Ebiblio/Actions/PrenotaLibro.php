<?php
include 'funzioni.php';
include 'connessioneDB.php';
session_start()
?>

<?php require('../components/head.php'); ?>
<?php require('../components/navbar.php'); ?>

<section>
  <br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center col-12">
      <?php
      $mail = $_SESSION['utente'];
      $codiceLibro = $_POST['codiceLibro'];
      $oggi = date("Y-m-d");

      //ControlloModifica($conn, "call PrenotaLibroCartaceo('$oggi', '$data', '$codiceLibro', '$mail')");
      $query = "call PrenotaLibroCartaceo('$oggi', '$data', '$codiceLibro', '$mail')";
      $fraseSi = "<h4> Prenotazione libro avvenuta </h4>";
      $fraseNo = "<h4> Si è verificato un errore durante la prenotazione del libro </h4>";
      ControlloModifica2($conn, $query, $fraseSi, $FraseNo);


      echo "<br> <br>";
      echo BackHome($_SESSION["tipoUtente"]);

      $conn->close();
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>