<?php
include 'funzioni.php';
session_start();
?>

<?php require('../components/head.php'); ?>
<?php require('../components/navbar.php'); ?>

<section> <br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-12">
        <h2> <b> Statistiche </b> </h2>
        <br>
        <button type="button" class="btn btn-success btn-lg">
          <a href="/EBIBLIO/Actions/S1_BiblioConPostLetturaMenoUtilizzate.php">
            <li>Biblioteche con posti lettura meno utilizzate</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-success btn-lg">
          <a href="/EBIBLIO/Actions/S2_VisualizzaVolontariConPiuConsegne.php">
            <li>Visualizza i volontari con più consegne</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-success btn-lg">
          <a href="/EBIBLIO/Actions/S3_VisualizzaLibriCartPiuPrenotati.php">
            <li>Visualizza i libri cartacei più prenotati</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-success btn-lg">
          <a href="/EBIBLIO/Actions/S4_EbookPiuAcceduti.php">
            <li>Ebook più acceduti</li>
          </a>
        </button>
        <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </div>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>