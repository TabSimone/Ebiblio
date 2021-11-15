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
      <h2> <b> Tutte le segnalazioni </b> </h2> <br> <br> <br>
      <?php
        $mail = $_SESSION['utente'];
        StampaTab($conn, "call VisualizzaSegnalazioni('$mail')");
        echo "<br><br>";
        echo BackHome($_SESSION["tipoUtente"]);        
        $conn->close();
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>