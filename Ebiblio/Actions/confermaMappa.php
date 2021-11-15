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
      <h2> <b> Scopri dove si trova una biblioteca </b> </h2> <br> <br>
      <h4> Seleziona una biblioteca </h4> <br> <br>
      <form action="/EBIBLIO/Actions/VisualizzaMappa.php" method="post">

        <!-- <input type="text" name="codiceBiblioteca">
        <br> <br> -->

        <?php
        $query = "SELECT Codice, Nome FROM biblioteca";
        $value = "codiceBiblioteca";
        $nome = "Codice";
        $nomeStampato = "Nome";
        echo "<select name=" . $value . ">";
        dropMenu($conn, $query, $nomeStampato, $nome);
        echo "</select>";
        echo "<br><br>"
        ?>


        <input type="submit" class="btn btn-primary" value="Open Map">
        <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>