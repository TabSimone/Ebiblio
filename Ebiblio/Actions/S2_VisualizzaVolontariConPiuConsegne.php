<?php
include 'funzioni.php';
include 'connessioneDB.php';
session_start()
?>

<?php require('../components/head.php'); ?>
<?php require('../components/navbar.php'); ?>

<section> <br> <br>
    <div class="container">
        <div class="row align-items-center justify-content-center col-12">
            <h2> <b> Visualizza Volontari con più consegne </b> </h2> <br> <br>
            <?php
                StampaTab($conn, "call VisualizzaVolontariConPiuConsegne()"); 
                echo "<br> <br> <center> <div> <a href= 'Statistiche.php'> <button class='btn btn-info btn-lg' type='button'> Torna indietro </button> </a> </div> </center> <br> <br>"
            ?>
        </div>
    </div>
</section>

<?php require('../components/footer.php'); ?>