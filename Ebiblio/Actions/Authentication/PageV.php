<?php require('../../components/head.php'); ?>
<?php require('../../components/navbar.php'); ?>

<?php
// Start the session
session_start();
echo '<section> <div class="container"> <div class="row align-items-center justify-content-center"> <div class="col-11"> <br> <br>';
echo "<h4> Ciao " . $_SESSION['nome'];
echo "<br> Hai effettuato l'accesso come utente " . $_SESSION['tipoUtente'];
echo '</h4> </div> </div> </div> </section>';
?>

<section>
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-11">
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaBibliotechePresenti.php">
            <li>Visualizza le biblioteche presenti</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaVisualizzaLibriDisponibili.php">
            <li>Visualizza i libri disponibili in ogni biblioteca</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaTuttePrenotazioni.php">
            <li>Visualizza tutte le prenotazioni di libri inserite nella piattaforma</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaInserisciConsegna.php">
            <li>Inserisci un nuovo evento di consegna</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaModificaConsegna.php">
            <li>Aggiorna un evento di consegna</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaMappa.php">
            <li>Localizza le biblioteche nella mappa</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/Statistiche.php">
            <li>Statistiche</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-danger btn-lg">
          <a href="/EBIBLIO/HomePage.php">
            <li>Log Out</li>
          </a>
        </button>
        <br>
        <br>
      </div>
    </div>
  </div>
</section>

<?php require('../../components/footer.php'); ?>