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
    <h2> <b> Invia un messaggio ad un utente </b> </h2> <br> <br>
      <h5> Scegli il destinatario e scrivi il messaggio </h5>
      <h6> <b> Puoi mandare un messaggio al giorno per utente </b> </h6> <br> 
      <form action="/EBIBLIO/Actions/InviaMessaggio.php" method="post">
        <br>Titolo: <br>
        <input type="text" name="Titolo"> <br>
        <br>Testo: <br>
        <input type="text" name="Testo"> <br> 
        <br>Email Utilizzatore: <br>
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