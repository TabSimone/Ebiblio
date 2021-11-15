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
      $EmailUtilizzatore = $_POST['EmailUtilizzatore'];
      $query = "call EliminaSegnalazioni('$EmailUtilizzatore')";
      $fraseSi = "Segnalazioni eliminate";
      $fraseNo = "Si è verificato un errore durante l'eliminazione delle segnalazioni";

      ControlloModifica2($conn, $query, $fraseSi, $FraseNo);
      echo "<br> <br>";
      echo BackHome($_SESSION["tipoUtente"]);
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>