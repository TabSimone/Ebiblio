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
      //$Data = $_POST['Data'];
      $Nota = $_POST['Nota'];
      $EmailUtilizzatore = $_POST['EmailUtilizzatore'];
      $utente = $EmailAmministratore;
      $modifica = "Segnalazione";
      $EmailAmministratore = $_SESSION["utente"];

      $query = "call InsSegnalazione('$Nota','$EmailAmministratore','$EmailUtilizzatore')";
      $fraseSi = "Segnalazione inserita correttamente";
      $fraseNo = "Errore durante l'inseriemnto della segnalazione";
      ControlloModificaMongo($conn, $query, $utente, $modifica, $fraseSi, $fraseNo);
      echo "<br> <br>";
      echo BackHome($_SESSION["tipoUtente"]);
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>