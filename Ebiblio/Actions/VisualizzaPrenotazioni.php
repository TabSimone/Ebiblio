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
      <?php
      $mail = $_SESSION['utente'];
      echo " <h2> <b> Libri Prenotati </b> </h2>";
      echo "<b> (la data di fine prenotazione sarà visibile appena riceverai il libro a casa) </b> <br>";
      echo "<br>";
      StampaTab($conn, "call VisualizzaPropriePrenotazioniDiLibri('$mail')");
      echo "<br> <br> <br>";
      echo "<h2> <b> Posti Lettura Prenotati </b> </h2>";
      echo "<br>";
      $conn->next_result();
      StampaTab($conn, "call VisualizzaPropriePrenotazioniPostiLettura('$mail')");
      ?>
    </div>

    <br>
    <div class="row align-items-center justify-content-center col-5">
      <table id='tbl' class='table'>
        <thead class="h6 text-danger strong">
          <tr>
            <th> <b> Legenda orari posti lettura </b> </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td> Codice 1 </td>
            <td> Dalle ore 08:00 alle 11:00 </td>
          </tr>
          <tr>
            <td> Codice 2 </td>
            <td> Dalle ore 11:00 alle 14:00 </td>
          </tr>
          <tr>
            <td> Codice 3 </td>
            <td> Dalle ore 14:00 alle 17:00 </td>
          </tr>
          <tr>
            <td> Codice 3 </td>
            <td> Dalle ore 17:00 alle 20:00 </td>
          </tr>
        </tbody>
      </table>
      <br> <br>
    </div>

    <div class="row align-items-center justify-content-center col-12">
      <?php
        echo BackHome($_SESSION["tipoUtente"]);
        $conn->close();
      ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>