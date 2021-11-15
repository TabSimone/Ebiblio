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
        $data = date('Y-m-d');
        $tipo = "Consegnato";
        $note = $_POST['note'];
        $emailVolontario = $_SESSION['utente'];
        $codicePrenotazione =  $_POST["codicePrenotazione"];
        
        //ControlloModifica($conn, "call AggiornaEventoConsegna('$codicePrenotazione','$data','$tipo','$note','$emailVolontario')");
        //$conn->next_result();
        $query = "call AggiornaEventoConsegna('$codicePrenotazione','$data','$tipo','$note','$emailVolontario')";
        $fraseSi = "<h4> Consegna modificata </h4>";
        $fraseNo = "<h4> Si è verificato un errore durante l'aggiornamento dell'evento consegna </h4>";
        ControlloModifica2($conn, $query, $fraseSi, $FraseNo);
        echo "<br> <br>";
        echo BackHome($_SESSION["tipoUtente"]);
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>