<?php require('../../../components/head.php'); ?>
<?php require('../../../components/navbar.php'); ?>

<section>
<br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <h2> Registrazione nuovo Utilizzatore </h2>
      <form action="/EBIBLIO/Actions/inserimentoU.php" method="post" class="form-control"> <br>
        <b> Nome: </b> <br>
        <input type="text" name="nome"> <br> <br>        
        <b> Cognome: </b> <br>
        <input type="text" name="cognome"> <br> <br>
        <b> Email: </b> <br>
        <input type="text" name="mail"> <br>
        <b> (Inserisci una mail valida) </b> <br> <br>
        <b> Password: </b> <br>
        <input type="password" name="psw"> <br>
        <b> (Inserisci una password di lunghezza minima di 8 caratteri) </b> <br> <br>
        <b> Recapito Telefonico: </b> <br>
        <input type="text" name="cell"> <br> <br>
        <b> Data Nascita: </b> <br>
        <input type="date" name="data"> <br>
        <b> (Per registrarti devi avere più di 16 anni) </b> <br> <br>
        <b> Luogo Nascita: </b> <br>
        <input type="text" name="luogo"> <br> <br>
        <b> Professione: </b> <br>
        <input type="text" name="professione"> <br> <br>
        <input type="submit" name="Iscriviti" class="btn btn-danger btn btn-lg" value="Iscriviti">
      </form>
      <center> <br> <br>
      <a href="/EBIBLIO/HomePage.php"><button type="button" class="btn btn-info btn-lg">Torna indietro</button> </a>
      </center>
    </div>
  </div>
</section>

<?php require('../../../components/footer.php'); ?>