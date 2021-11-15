<?php require('../../components/head.php'); ?>
<?php require('../../components/navbar.php'); ?>

<?php
include '..\..\Actions\funzioni.php';
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
        <br> <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaPostiLettura.php">
            <li>Visualizza i posti lettura presenti in ogni biblioteca</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/ConfermaVisualizzaLibriDisponibili.php">
            <li>Visualizza i libri disponibili in ogni biblioteca</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaPrenotazionePostoLettura.php">
            <li>Prenota un posto lettura</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaPrenotazioneLibro.php">
            <li>Prenota un libro cartaceo</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/confermaVisualizzaEbook.php">
            <li>Visualizza un ebook</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaPrenotazioni.php">
            <li>Visualizza le tue prenotazioni</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaConsegne.php">
            <li>Visualizza le mie consegne</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaMessaggi.php">
            <li>Visualizza i messaggi ricevuti</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaSegnalazioni.php">
            <li>Visualizza le segnalazioni ricevute</li>
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
      </div>
    </div>
  </div>
</section>

<?php require('../../components/footer.php'); ?>