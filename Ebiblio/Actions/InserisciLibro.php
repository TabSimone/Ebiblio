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
            $Titolo = $_POST['Titolo'];
            $Genere = $_POST['Genere'];
            $AnnoPubblicazione = $_POST['AnnoPubblicazione'];
            $NomeEdizione = $_POST['NomeEdizione'];
            $NumeroPagine = $_POST['NumeroPagine'];
            $NumeroScaffale = $_POST['NumeroScaffale'];
            $StatoConservazione = $_POST['StatoConservazione'];
            $utente = $_SESSION["utente"];
            $modifica = "Libro";

            $CodiceBiblioteca = $_SESSION["biblioteca"];
            $query = "call InserisciLibro('$Titolo','$Genere','$AnnoPubblicazione','$NomeEdizione','$CodiceBiblioteca','$NumeroPagine','$NumeroScaffale','Disponibile','$StatoConservazione')";
            $fraseSi = "Libro inserito correttamente";
            $fraseNo = "Errore durante l'inserimento del libro";
            ControlloModificaMongo($conn, $query, $utente, $modifica, $fraseSi, $fraseNo);
            echo "<br> <br>";
            echo BackHome($_SESSION["tipoUtente"]);
        ?>
    </div>
  </div>
</section>

<?php require('../components/footer.php'); ?>