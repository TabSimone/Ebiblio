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
        $data = $_POST['data'];
        $orario = $_POST['orario'];
        $numeroPosti = $_POST['numeroPosti'];
        $mail = $_SESSION['utente'];
        $codiceBiblioteca = $_POST['codiceBiblioteca'];
        $oggi = date("Y-m-d");

        $valore = StampaRisultato($conn, "call VisualizzaTotalePosti('$codiceBiblioteca')");

        if ($data < $oggi) {
          echo "<center> <h4>";
          echo "Non puoi fare vecchie prenotazioni!";
          echo "</center> </h4>";
        } else if ($valore < $numeroPosti) {
          echo "<center> <h4>";
          echo "La biblioteca ha meno posto di quelli che hai scritto!";
          echo "</center> </h4>";
        } else {
          $conn->next_result();

          $query = "call PrenotaPosto('$data', '$orario', '$numeroPosti', '$mail', '$codiceBiblioteca')";
          $fraseSi = "<h4> Prenotazione posto avvenuta </h4>";
          $fraseNo = "<h4> Si è verificato un errore durante la prenotazione </h4>";
          ControlloModifica2($conn, $query, $fraseSi, $FraseNo);
          //ControlloModifica($conn, $query);
        }
        echo "<br> <br>";
        echo BackHome($_SESSION["tipoUtente"]);
        $conn->close();
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>