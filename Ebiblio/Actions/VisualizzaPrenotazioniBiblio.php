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
      <h2> <b> Prenotazioni dei libri presso la biblioteca da te gestita </b> </h2>
      <br> <br> <br>
      <?php
      $CodiceBiblioteca = $_SESSION["biblioteca"];
      StampaTab($conn, "call VisualizzaTuttePrenotazioniDiUnaBiblio('$CodiceBiblioteca')");
      echo "<br> <br>";
      echo BackHome($_SESSION["tipoUtente"]);
      echo "<br> <br>";
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>