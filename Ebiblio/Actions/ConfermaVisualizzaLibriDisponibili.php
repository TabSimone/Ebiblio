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
      <h4> Seleziona una biblioteca </h4> <br> <br>
      <form action="/EBIBLIO/Actions/VisualizzaLibriDisponibili.php" method="post">
        <!-- <input type="text" name="psw"> -->

        <?php
        $query = "SELECT Codice, Nome FROM biblioteca";
        $value = "codiceBiblioteca";
        $nome = "Codice";
        $nomeStampato = "Nome";
        echo "<select name=" . $value . ">";
        dropMenu($conn, $query, $nomeStampato, $nome);
        echo "</select>";
        ?>

        <br>
        <br>
        <input type="submit" class="btn btn-primary" name="Inserisci" value="Visualizza">
        <br>
        <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>