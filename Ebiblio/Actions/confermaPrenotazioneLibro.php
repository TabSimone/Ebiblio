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
      <h2> <b> Prenotazione libro cartaceo </b> </h2> <br> <br>
      <h4> Scrivi il codice del libro scelto </h4> <br>
      <b> (la data di fine prenotazione sarà visibile appena riceverai il libro a casa) </b> <br> <br>
      <form action="/EBIBLIO/Actions/PrenotaLibro.php" method="post">
        <!-- <input type="text" name="codiceLibro"> <br> <br> -->

        <?php
        $query = 'SELECT Codice,Titolo  from libro inner join librocartaceo on Codice=CodiceLibro and StatoPrestito="Disponibile"';
        $value = "codiceLibro";
        $nome = "Codice";
        $nomeStampato = "Titolo";
        echo "<select name=" . $value . ">";
        dropMenu($conn, $query, $nomeStampato, $nome);
        echo "</select>";
        echo "<br><br>"
        ?>





        <input type="submit" class="btn btn-primary" name="Inserisci" value="Prenota"> <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>