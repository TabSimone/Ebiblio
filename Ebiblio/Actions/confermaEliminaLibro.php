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
      <h2> <b> Eliminazione di un libro </b> </h2> <br> <br> <br>
      <h5> Seleziona il codice del libro che vuoi eliminare </h5> <br> <br>
      <form action="/EBIBLIO/Actions/EliminaLibro.php" method="post">
        Codice Libro:<br>
        <?php
          $query = "SELECT * FROM libro INNER JOIN librocartaceo ON Codice=CodiceLibro and CodiceBiblioteca = '" . $_SESSION["biblioteca"] . "'";
          $value = "Codice";
          $nome = "Codice";
          $nomeStampato = "Codice";
          echo "<select name=" . $value . ">";
          dropMenu($conn, $query, $nomeStampato, $nome);
          echo "</select>";
        ?>
        <br> <br>
        <input type="submit" class="btn btn-primary" name="Elimina Libro" value="Elimina Libro">
        <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>