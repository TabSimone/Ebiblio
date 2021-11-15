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
      <h2> <b> Prenotazione posto lettura </b> </h2> <br> <br> <br>
      <form action="/EBIBLIO/Actions/PrenotaPostoLettura.php" method="post">
        Giorno: <br>
        <input type="date" name="data"> <br> <br>
        Orario:<br>
        <div class="offset">
          <input type="radio" name="orario" value="1"> 1) Dalle 08:00 alle 11:00
          <br>
          <input type="radio" name="orario" value="2"> 2) Dalle 11:00 alle 14:00
          <br>
          <input type="radio" name="orario" value="3"> 3) Dalle 14:00 alle 17:00
          <br>
          <input type="radio" name="orario" value="4"> 4) Dalle 17:00 alle 20:00
        </div> <br>
        Numero Posto <br>
        <input type="text" name="numeroPosti"> <br> <br>
        Nome Biblioteca:<br>
        <!-- <input type="text" name="codiceBiblioteca"> <br> <br> -->
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
        <input type="submit" name="Inserisci" class="btn btn-primary" value="Prenota"> <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>