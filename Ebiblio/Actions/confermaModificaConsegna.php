<?php
include 'funzioni.php';
include 'connessioneDB.php';
session_start();
?>

<?php require('../components/head.php'); ?>
<?php require('../components/navbar.php'); ?>

<section>
  <br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center col-12">
      <h2> <b> Aggiornamento Consegna </b> </h2> <br> <br>
      <h4> Contrassegna una prenotazione di un libro come consegnato </h4> <br> <br>
      <form action="/EBIBLIO/Actions/ModificaConsegna.php" method="post">
        Codice prenotazione libro in affidamento:<br>
        <?php
          $query = "SELECT CodicePrenotazioneLibro FROM consegna where Tipo='Affidamento' and EmailVolontario = '" . $_SESSION["utente"] . "'";
          $value = "codicePrenotazione";
          $nome = "CodicePrenotazioneLibro";
          $nomeStampato = "CodicePrenotazioneLibro";
          echo "<select name=" . $value . ">";
          dropMenu($conn, $query, $nomeStampato, $nome);
          echo "</select>";
          echo "<br><br>"
        ?>

        Note:<br>
        <input type="text" name="note"> <br> <br>
        <input type="submit" class="btn btn-primary" name="Inserisci" value="Ricerca"> <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>