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
      <h2> <b> Eliminazione delle segnalazioni ad un utente </b> </h2> <br> <br> <br>
      <h5> Seleziona l'email dell'utente </h5>
      <form action="/EBIBLIO/Actions/EliminaSegnalazioni.php" method="post">
        <br>Email Utilizzatore: <br>
        <!-- <input type="text" name="EmailUtilizzatore"> -->
        <?php
        $query = "SELECT EmailUtilizzatore FROM utilizzatore";
        $value = "EmailUtilizzatore";
        $nome = "EmailUtilizzatore";
        $nomeStampato = "EmailUtilizzatore";
        echo "<select name=" . $value . ">";
        dropMenu($conn, $query, $nomeStampato, $nome);
        echo "</select>";
        ?>
        <br> <br>
        <input type="submit" class="btn btn-primary" name="invia"> <br>
        <br> <br>
        <?php echo BackHome($_SESSION["tipoUtente"]); ?>
      </form>
    </div>

    <script>

    </script>

    <style>

    </style>



    </body>

    </html>