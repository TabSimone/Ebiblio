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
        $Titolo = $_POST['Titolo'];
        $Testo = $_POST['Testo'];
        //$Data = $_POST['Data'];
        $EmailUtilizzatore = $_POST['EmailUtilizzatore'];
        $EmailAmministratore = $_SESSION["utente"];
        $utente = $EmailAmministratore;
        $modifica = "Messaggio";
        $query = "call InviaMessaggio('$Titolo','$Testo','$EmailAmministratore','$EmailUtilizzatore')";
        $fraseSi = "Messaggio inviato correttamente";
        $fraseNo = "Errore durante l'invio del messaggio";
        ControlloModificaMongo($conn, $query, $utente, $modifica, $fraseSi, $fraseNo);
        echo "<br> <br>";
        echo BackHome($_SESSION["tipoUtente"]);
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>