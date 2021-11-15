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
      <h2> <b> Inserimento di una nuova segnalazione </b> </h2> <br> <br> <br>
      <h5> Inserisci il motivo e il destinatario </h5>
      <form action="/EBIBLIO/Actions/InviaSegnalazione.php" method="post">
        <br>Nota: <br>
        <input type="text" name="Nota"> <br> <br>
        Email Utilizzatore: <br>


        <?php
        $query = "SELECT EmailUtilizzatore FROM utilizzatore";
        $value = "EmailUtilizzatore";
        $nome = "EmailUtilizzatore";
        $nomeStampato = "EmailUtilizzatore";
        echo "<select name=" . $value . ">";
        dropMenu($conn, $query, $nomeStampato, $nome);
        echo "</select>";
        ?>

        <br> <br>
        <input type="submit" class="btn btn-primary" name="invia">
        <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>