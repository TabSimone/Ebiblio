<?php require('components/head.php'); ?>
<?php require('components/navbar.php'); ?>

<?php
// Start the session
$status = session_status();
if ($status == PHP_SESSION_NONE) {
  //There is no active session
  session_start();
} else
if ($status == PHP_SESSION_ACTIVE) {
  //Destroy current and start new one
  session_destroy();
  session_start();
}
$_SESSION["tipoUtente"] = "";
?>

<section class="bg-white">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-6">
        <h2>EBIBLIO </h2>
        <p>
          Cerca, prenota e ritira libri dalla biblioteca della tua città. <br>
          Prenota il tuo posto in salta lettura tutto direttamente online. <br>
          Iscriviti e scopri tutti i servizi delle biblioteche di Bologna.
        </p>

        <button type="button" class="btn btn-danger btn-lg">
          <a href="/EBIBLIO/Actions/Authentication/SignIn/SceltaSI.php"> Registrati </a>
        </button>
        <button type="button" class="btn btn-success btn-lg">
          <a href="Actions/Authentication/LogIn.php">Login</a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-primary btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaBibliotechePresenti.php"> Visualizza le biblioteche presenti </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-primary btn-lg">
          <a href="/EBIBLIO/Actions/VisualizzaPostiLettura.php"> Visualizza i posti di lettura presenti per biblioteca </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-primary btn-lg">
          <a href="/EBIBLIO/Actions/ConfermaVisualizzaLibriDisponibili.php"> Visualizza i libri disponibili </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-primary btn-lg">
          <a href="/EBIBLIO/Actions/confermaMappa.php"> Localizza le biblioteche nella mappa </a>
        </button>
        <br> <br>
        <button type="button" class="btn btn-primary btn-lg">
          <a href="/EBIBLIO/Actions/Statistiche.php"> Statistiche </a>
        </button>
      </div>

      <div class="col-6">
        <img src="img/online-library.jpg" />
      </div>
    </div>
  </div>
</section>

<?php require('components/footer.php'); ?>