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
      $codicePrenotazione = $_POST['codicePrenotazione'];
      $tipo = "Affidamento";
      $note = $_POST['note'];
      $emailVolontario = $_SESSION["utente"];
      $data = date('Y-m-d');
      $dataFine = date('Y-m-d', strtotime($data . ' + 15 days'));
      $utente = $emailVolontario;

      $modifica = "Consegna";
      $query = "call InserisciEventoConsegna('$data','$tipo','$note','$emailVolontario','$codicePrenotazione', '$dataFine')";
      $fraseSi = "Consegna inserita correttamente";
      $fraseNo = "Errore durante l'inserimento della consegna";
      ControlloModificaMongo($conn, $query, $utente, $modifica, $fraseSi, $fraseNo);
      echo "<br> <br>";
      echo BackHome($_SESSION["tipoUtente"]);
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>