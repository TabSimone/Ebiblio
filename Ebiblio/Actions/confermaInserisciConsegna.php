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
      <h2> <b> Inserimento nuovo evento di consegna </b> </h2> <br> <br> <br>
      <h5> Inserisci il codice della prenotazione del libro </h5>
      <form action="/EBIBLIO/Actions/InserisciConsegna.php" method="post">
        <?php
        //$query = "SELECT Codice FROM prenotazione_libro_cartaceo ";
        $query = "SELECT Codice FROM prenotazione_libro_cartaceo inner join librocartaceo on prenotazione_libro_cartaceo.CodiceLibro=librocartaceo.CodiceLibro WHERE StatoPrestito='Prenotato'";
        $value = "codicePrenotazione";
        $nome = "Codice";
        $nomeStampato = "Codice";
        echo "<select name=" . $value . ">";
        dropMenu($conn, $query, $nomeStampato, $nome);
        echo "</select>";
        echo "<br><br>"
        ?>
        Note:<br>
        <input type="text" name="note"> <br> <br>
        <input type="submit" class="btn btn-primary" name="Inserisci" value="Inserisci"> <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>