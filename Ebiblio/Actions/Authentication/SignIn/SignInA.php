<?php require('../../../components/head.php'); ?>
<?php require('../../../components/navbar.php'); ?>

<section>
  <br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <h2> Registrazione nuovo Amministratore </h2>
      <form action="/EBIBLIO/Actions/inserimentoA.php" method="post" class="form-control"> <br>
        <b> Nome: </b> <br>
        <input type="text" name="nome"> <br> <br>
        <b> Cognome: </b> <br>
        <input type="text" name="cognome"> <br> <br>
        <b> Email: </b> <br>
        <input type="text" name="mail"> <br>
        <b> (Inserisci una mail valida) </b> <br> <br>
        <b> Password: </b> <br>
        <input type="password" name="psw"> <br> <br>
        <b> Recapito Telefonico: </b> <br>
        <input type="text" name="cell"> <br> <br>
        <b> Data Nascita: </b> <br>
        <input type="date" name="data"> <br>
        <b> (Per registrarti devi avere più di 16 anni) </b> <br> <br>
        <b> Luogo Nascita: </b> <br>
        <input type="text" name="luogo"> <br> <br>
        <b> Codice Biblioteca: </b> <br>
        <input type="text" name="codbiblio"> <br> <br>
        <b> Qualifica: </b> <br>
        <input type="text" name="qualifica"> <br> <br>
        <input type="submit" name="Iscriviti" class="btn btn-danger btn btn-lg" value="Iscriviti">
      </form>
      <center> <br> <br>
        <a href="/EBIBLIO/HomePage.php"><button type="button" class="btn btn-info btn-lg">Torna indietro</button>
        </a>
      </center>
    </div>
  </div>
</section>

<?php require('../../../components/footer.php'); ?>