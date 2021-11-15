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
      <h2> <b> Libri Disponibili </b> </h2> <br> <br>
      <?php
      $cod = $_POST['codiceBiblioteca'];
      StampaTab($conn, "call VisualizzaLibriDisponibili('$cod')");
      echo "<br> <br>";
      echo BackHome($_SESSION["tipoUtente"]);
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>