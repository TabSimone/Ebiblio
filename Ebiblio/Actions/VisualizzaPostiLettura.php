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
      <h2> <b> Posti Lettura Disponibili </b> </h2> <br> <br>
      <?php
      StampaTab($conn, "call VisualizzaPostiLettura()");
      echo BackHome($_SESSION["tipoUtente"]);
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>