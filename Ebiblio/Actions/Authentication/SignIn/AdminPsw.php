<?php require('../../../components/head.php'); ?>
<?php require('../../../components/navbar.php'); ?>

<section>
  <br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center col-12">
      <h2> Richiesta Password Amministratore </h2> <br>
      <h5 class="text-danger font-weight-bolder"> Inserisci la password fornita per poterti registrare come amministratore </h5> <br> <br> <br>
      <form action="/EBIBLIO/Actions/confermaAdmin.php" method="post" class="form-control">
        Password:<br> 
        <input type="password" name="psw">
        <br> <br>
        <input type="submit" name="Iscriviti" value="Iscriviti" class='btn btn-danger btn-lg'>
      </form>
      <center> <br> 
        <a href="/EBIBLIO/HomePage.php"><button type="button" class="btn btn-info btn-lg">Torna indietro</button>
      </center>
    </div>
  </div>
</section>

<?php require('../../../components/footer.php'); ?>