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
      <h2> <b> Visualizza un eBook </b> </h2> <br> <br>
      <h4> Scrivi il codice dell'eBook scelto </h4> <br> <br>
      <form action="/EBIBLIO/Actions/VisualizzaEbook.php" method="post">
        <?php
        $query = "SELECT Codice,Titolo  from libro ";
        $value = "codiceLibro";
        $nome = "Codice";
        $nomeStampato = "Titolo";
        echo "<select name=" . $value . ">";
        dropMenu($conn, $query, $nomeStampato, $nome);
        echo "</select>";
        ?>
        <br> <br>
        <input type="submit" class="btn btn-primary" name="Inserisci" value="Visualizza">
        <br>
        <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>