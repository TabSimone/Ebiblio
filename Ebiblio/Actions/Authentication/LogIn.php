<?php require('../../components/head.php'); ?>
<?php include('../../components/navbar.php'); ?>

<section>
<br> <br>
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <h1>Login </h1>
      <form action="../loggare.php" method="post">
        <div class="mb-3 col-5">
          <label for="mailForm" class="form-label"> Email </label>
          <input type="text" class="form-control" name="mail" id="mailForm" placeholder="username" />
        </div>
        <div class="mb-3 col-5">
          <label for="passForm" class="form-label"> Password </label>
          <input type="password" class="form-control" name="psw" id="passForm" placeholder="********" />
        </div>
        <input type="submit" class="btn btn-success btn-lg"" name=" Accedi" value="Accedi">
      </form>
      <center> <br> 
        <a href="/EBIBLIO/HomePage.php"><button type="button" class="btn btn-info btn-lg">Torna indietro</button>
      </center>
    </div>
  </div>
</section>

<?php include('../../components/footer.php'); ?>