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
      <h2> <b> Seleziona il libro che vuoi modificare </b> </h2> <br> <br> 
      <h5> Puoi scegliere tra i libri gestiti dalla biblioteca da te gestita </h5> <br> <br>
      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Codice Libro:
        <?php
        $biblioteca = $_SESSION["biblioteca"];
        $query = "SELECT Codice FROM libro INNER JOIN librocartaceo ON Codice=CodiceLibro and CodiceBiblioteca = '" . $_SESSION["biblioteca"] . "'";
        $value = "codiceLibro";
        $nome = "Codice";
        $nomeStampato = "Codice";
        echo "<select name=" . $value . ">";
        dropMenu($conn, $query, $nomeStampato, $nome);
        echo "</select>";
        ?>
        <br> <br>
        <input type="submit" class="btn btn-primary" name="Inserisci" value="Ricerca">
      </form>
      <br> <br> <br>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codiceLibro = $_POST["codiceLibro"];
        echo "<br> <br>";
        echo "<h4> <center> Dati Attuali: </h4> </center>";
        $conn->next_result();
        $query = "SELECT CodiceLibro as Codice, Titolo, Genere, AnnoPubblicazione as Anno, NomeEdizione, NumeroPagine as N_Pagine, NumeroScaffale as N_Scaffale, StatoPrestito, StatoConservazione FROM libro INNER JOIN librocartaceo ON Codice=CodiceLibro where Codice = $codiceLibro";
        StampaTab($conn, $query);
        $_SESSION["codice"] = $codiceLibro;
      }
      ?>

      <form action="/EBIBLIO/Actions/ModificaLibro.php" method="post">
        <br> <br>
        <h4> Nuovi dati : </h4> <br>
        Titolo:<br>
        <input type="text" name="Titolo"> <br> <br>
        Genere:<br>
        <input type="text" name="Genere"> <br> <br>
        AnnoPubblicazione: <br>
        <input type="number" name="AnnoPubblicazione" min="1800" max="2021"> <br> <br>
        NomeEdizione:<br>
        <input type="text" name="NomeEdizione"> <br> <br>
        NumeroPagine:<br>
        <input type="number" name="NumeroPagine" min="1" max="1000"> <br> <br>
        NumeroScaffale:<br>
        <input type="number" name="NumeroScaffale" min="1" max="100"> <br> <br>
        Stato Conservazione:<br>
        <select name="StatoConservazione">
          <option value="Ottimo">Ottimo</option>
          <option value="Buono">Buono</option>
          <option value="Non Buono">Non Buono</option>
          <option value="Scadente">Scadente</option>
        </select> <br> <br>
        <input type="submit" name="Aggiorna Dati" class="btn btn-primary" value="Aggiorna Dati"> <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>