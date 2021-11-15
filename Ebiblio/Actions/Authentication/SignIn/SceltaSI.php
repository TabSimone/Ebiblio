<?php require('../../../components/head.php'); ?>
<?php include('../../../components/navbar.php'); ?>

<section">
  <br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div>
      <h2> <b> Registrazione </b> </h2> <br> 
      <h4> Scegli il tipo di utente </h4> <br>
        <button type="button" class="btn btn-success btn-lg">
          <a href="/EBIBLIO/Actions/Authentication/SignIn/SignInU.php">
            <li>Sei un utilizzatore?</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-success btn-lg">
          <a href="/EBIBLIO/Actions/Authentication/SignIn/SignInV.php">
            <li>Sei un volontario?</li>
          </a>
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-success btn-lg">
          <a href="/EBIBLIO/Actions/Authentication/SignIn/AdminPsw.php">
            <li>Sei un amministratore?</li>
          </a>
        </button>
        <br> <br>
        <center> <br> 
        <a href="/EBIBLIO/HomePage.php"><button type="button" class="btn btn-info btn-lg">Torna indietro</button>
      </center>
      </div>
    </div>
  </div>
  </section>

  <?php require('../../../components/footer.php'); ?>