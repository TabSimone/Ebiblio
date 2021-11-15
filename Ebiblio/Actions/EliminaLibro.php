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
                $Codice = $_POST['Codice'];
                $result = $conn->query("call EliminaLibro('$Codice')");
                if ($result) {
                    /*try {
                    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $bulk = new MongoDB\Driver\BulkWrite();
                    $doc = ['_id' => new MongoDB\BSON\ObjectID(), 'data' => $data, 'tipo' => $tipo];
                    $bulk->insert($doc);
                    $mng->executeBulkWrite('log.eventi', $bulk);
                } catch (MongoDB\Driver\Exception\Exception $e) {
                    //Errore
                }*/
                    echo "<h4> <center> Libro " . $Codice . " eliminato correttamente! </center> </h4>";
                } else {
                    echo '<h4> <center> Errore nei dati! <center> </h4>';
                }
                echo "<br> <br>";
                echo BackHome($_SESSION["tipoUtente"]);
                $conn->close();
            ?>
        </div>
    </div>
</section>

<?php require('../components/footer.php'); ?>