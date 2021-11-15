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
        echo "<h4> Le mie consegne </h4>";
        echo "<br> <br>";
        StampaTab($conn, "call VisualizzaEventiConsegna('$mail')");
        echo "<br> <br>";
        echo BackHome($_SESSION["tipoUtente"]);
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>