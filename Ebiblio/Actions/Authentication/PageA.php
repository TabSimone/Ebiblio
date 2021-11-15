<?php require('../../components/head.php'); ?>
<?php require('../../components/navbar.php'); ?>

<?php
include '..\..\Actions\funzioni.php';
session_start();
echo '<section> <div class="container"> <div class="row align-items-center justify-content-center"> <div class="col-11"> <br> <br>';
echo "<h4> Ciao " . $_SESSION['nome'];
echo "<br> Hai effettuato l'accesso come utente " . $_SESSION['tipoUtente'];
echo "<br> Sei associato alla biblioteca cod. " . $_SESSION['biblioteca'];
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
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/ConfermaVisualizzaLibriDisponibili.php">
            <li>Visualizza i libri disponibili in ogni biblioteca</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaInserisciLibro.php">
            <li>Inserisci un nuovo libro</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaModificaLibro.php">
            <li>Modifica un libro</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaEliminaLibro.php">
            <li>Elimina un libro</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaPrenotazioniBiblio.php">
            <li>Visualizza prenotazioni associate alla bibioteca da te gestita</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaMessaggiAmm.php">
            <li>Visualizza tutti i messaggi</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaInviaMessaggio.php">
            <li>Invia un messaggio privato</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaSegnalazioniAmm.php">
            <li>Visualizza tutte le segnalazioni </li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaInviaSegnalazione.php">
            <li>Inserisci una segnalazione</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaEliminaSegnalazioni.php">
            <li>Elimina tutte le segnalazione di utente</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaMappa.php">
            <li>Localizza le biblioteche nella mappa</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/Statistiche.php">
            <li>Statistiche</li>
          </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-danger btn-lg">
          <a href="/EBIBLIO/HomePage.php">
            <li>Log Out</li>
          </a>
        </button>
        </div>
    </div>
  </div>
</section>

<?php require('../../components/footer.php'); ?>