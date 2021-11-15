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
            $Codice = $_SESSION["codice"];
            $Titolo = $_POST['Titolo'];
            $Genere = $_POST['Genere'];
            $AnnoPubblicazione = $_POST['AnnoPubblicazione'];
            $NomeEdizione = $_POST['NomeEdizione'];
            $NumeroPagine = $_POST['NumeroPagine'];
            $NumeroScaffale = $_POST['NumeroScaffale'];
            $StatoConservazione = $_POST['StatoConservazione'];
            $CodiceBiblioteca = $_SESSION["biblioteca"];

            //ControlloModifica($conn, "call ModificaLibro('$Codice','$Titolo','$Genere','$AnnoPubblicazione','$NomeEdizione','$CodiceBiblioteca','$NumeroPagine','$NumeroScaffale','$StatoPrestito','$StatoConservazione')");

            $query = "call ModificaLibro('$Codice','$Titolo','$Genere','$AnnoPubblicazione','$NomeEdizione','$CodiceBiblioteca','$NumeroPagine','$NumeroScaffale','Disponibile','$StatoConservazione')";
            $fraseSi = "Libro Modificato";
            $fraseNo = "Si è verificato un errore durante la modifica del libro";
            ControlloModifica2($conn, $query, $fraseSi, $FraseNo);
            unset($_SESSION["Codice"]);
            echo "<br> <br>";
            echo BackHome($_SESSION["tipoUtente"]);
            ?>
        </div>
    </div>
</section>

<?php require('../components/footer.php'); ?>