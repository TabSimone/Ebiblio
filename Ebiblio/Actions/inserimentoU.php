<?php require('../components/head.php'); ?>
<?php require('../components/navbar.php'); ?>

<section> <br> <br>
    <?php
    include 'connessioneDB.php';
    include 'funzioni.php';
    session_start();

    $nome =  $_POST['nome'];
    $cognome = $_POST['cognome'];
    $mail = $_POST['mail'];
    $psw = $_POST['psw'];
    $cell =  $_POST['cell'];
    $data = $_POST['data'];
    $luogo = $_POST['luogo'];
    $professione = $_POST['professione'];
    $datacreazione = date("Y-m-d");

    if (
        str_contains($mail, "@") && strlen($psw) >= 8 && strtotime($data) == TRUE && empty($cognome) == FALSE && empty($nome) == FALSE &&
        empty($cell) == FALSE && empty($luogo) == FALSE && empty($professione) == FALSE && is_numeric($cell) == TRUE && ControlloEta($data) >= 16
    ) {

        $utente = $_SESSION["utente"];
        $modifica = "Inserimento utente Utilizzatore";
        //ControlloModificaMongo($conn, $riga, $utente, $modifica);


        $query = "call RegistrazioneUtilizzatore('$mail', '$cognome', '$nome', '$cell', '$psw', '$data', '$luogo', '$professione', 'Attivo', '$datacreazione')";
        $fraseSi = "utente utilizzatore inserito correttamente";
        $fraseNo = "Errore durante l'inseriemnto dell'utente utilizzatore";
        ControlloModificaMongo($conn, $query, $utente, $modifica, $fraseSi, $fraseNo);
    }
    ?>
    <div> <br> <br>
        <center>
            <a href="/EBIBLIO/Actions/Authentication/LogIn.php"><button type="button" class="btn btn-info btn-lg">Login</button> </a>
        </center>';
    </div>
</section>

<?php require('../components/footer.php'); ?>