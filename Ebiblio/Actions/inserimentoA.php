<?php require('../components/head.php'); ?>
<?php require('../components/navbar.php'); ?>

<section> <br> <br>
    <?php
include 'connessioneDB.php';
include 'funzioni.php';
session_start();


$mail = $_POST['mail'];
$cognome = $_POST['cognome'];
$nome =  $_POST['nome'];
$cell =  $_POST['cell'];
$data = $_POST['data'];
$luogo = $_POST['luogo'];
$psw = $_POST['psw'];
$codbiblio = $_POST['codbiblio'];
$qualifica = $_POST['qualifica'];

if (
    str_contains($mail, "@") && strlen($psw) >= 8 && strtotime($data) == TRUE && empty($cognome) == FALSE && empty($nome) == FALSE &&
    empty($cell) == FALSE && empty($luogo) == FALSE && empty($qualifica) == FALSE && is_numeric($cell) == TRUE && ControlloEta($data) >= 16
) {
    $utente = $_SESSION["utente"];
    $frase = "Inserimento utente Amministratore";

    $query = "call RegistrazioneAmministratore('$mail', '$cognome', '$nome', '$cell', '$psw', '$data', '$luogo', '$codbiblio', '$qualifica')";
    $fraseSi = "Amministratore inserimento correttamente";
    $fraseNo = "Errore durante l'inserimento dell'amministratore";
    ControlloModificaMongo($conn, $query, $utente, $modifica, $fraseSi, $fraseNo);
}

?>
    <div> <br> <br>
        <center>
            <a href="/EBIBLIO/Actions/Authentication/LogIn.php"><button type="button"
                    class="btn btn-info btn-lg">Login</button> </a>
        </center>';
    </div>
</section>

<?php require('../components/footer.php'); ?>