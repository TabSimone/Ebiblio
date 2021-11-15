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
      <h2> <b> Inserimento di un nuovo libro </b> </h2> <br> <br> <br>
      <form action="/EBIBLIO/Actions/InserisciLibro.php" method="post">
        Titolo:<br>
        <input type="text" name="Titolo"> <br> <br>
        Genere:<br>
        <input type="text" name="Genere"> <br> <br>
        Anno Pubblicazione: <br>
        <input type="number" name="AnnoPubblicazione" min="1800" max="2021"> <br> <br>
        Nome Edizione:<br>
        <input type="text" name="NomeEdizione"> <br> <br>
        Numero Pagine:<br>
        <input type="number" name="NumeroPagine" min="1" max="1000"> <br> <br>
        Numero Scaffale:<br>
        <input type="number" name="NumeroScaffale" min="1" max="100"> <br> <br>
        Stato Conservazione:<br>
        <select name="StatoConservazione">
          <option value="Ottimo">Ottimo</option>
          <option value="Buono">Buono</option>
          <option value="Non Buono">Non Buono</option>
          <option value="Scadente">Scadente</option>
        </select> <br> <br>
        <input type="submit" name="Inserisci" class="btn btn-primary" value="Inserisci"> <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>