<?php
function BackHome($tipo)
{
    if ($tipo == "Utilizzatore") {
        $link = "/EBIBLIO/Actions/Authentication/PageU.php";
    } else if ($tipo == "Volontario") {
        $link = "/EBIBLIO/Actions/Authentication/PageV.php";
    } else if ($tipo == "Amministratore") {
        $link = "/EBIBLIO/Actions/Authentication/PageA.php";
    } else {
        $link = "/EBIBLIO/HomePage.php";
    }
    return "<br> <center> <div> <a href=" . $link . "><button class='btn btn-info btn-lg' type='button'>Torna indietro</button> </a> </div> </center>";
}

function StampaTab($sql_link, $query)
{

    $result = mysqli_query($sql_link, $query);


    if (!empty($result) && $result->num_rows > 0) {
        echo "<table id='tbl' class='table'>";
        echo "<thead> <tr>";

        $field = $result->fetch_fields();
        $fields = array();
        $j = 0;
        foreach ($field as $col) {
            echo "<th>" . $col->name . "</th>";
            array_push($fields, array(++$j, $col->name));
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_array()) {
            echo "<tr>";
            for ($i = 0; $i < sizeof($fields); $i++) {
                $fieldname = $fields[$i][1];
                $filedvalue = $row[$fieldname];

                echo "<td>" . $filedvalue . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo '<center> <h4> Non ci sono risultati </h4> </center>';
    }
}

function ControlloModifica($sql_link, $query)
{

    mysqli_query($sql_link, $query);

    if (mysqli_affected_rows($sql_link) > 0) {
        echo "<center> <h4> Modifica al DB riuscita! </h4> </center>";
    } else {
        echo '<center> <h4> Errore! Modifica non riuscita </h4> </center>';
    }
}
function ControlloModifica2($sql_link, $query, $fraseSi, $fraseNo)
{
    mysqli_query($sql_link, $query);

    if (mysqli_affected_rows($sql_link) > 0) {
        echo "<center> <h4>" . $fraseSi . "</h4> </center>";
    } else {
        echo "<center> <h4>" . $fraseNo . "</h4> </center>";
    }
}

function ControlloModificaMongo($sql_link, $query, $utente, $modifica, $fraseSi, $fraseNo)
{

    mysqli_query($sql_link, $query);

    if (mysqli_affected_rows($sql_link) > 0) {
        try {
            $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $bulk = new MongoDB\Driver\BulkWrite();
            $doc = ['_id' => new MongoDB\BSON\ObjectID(), 'utente' => $utente, 'modifica' => $modifica];
            $bulk->insert($doc);
            $mng->executeBulkWrite('log.eventi', $bulk);
        } catch (MongoDB\Driver\Exception\Exception $e) {
            //Errore
        }

        echo "<center> <h4>" . $fraseSi . "</h4> </center>";
    } else {
        echo "<center> <h4>" . $fraseNo . "</h4> </center>";
    }
}


function StampaRisultato($sql_link, $query)
{
    $result = mysqli_query($sql_link, $query);

    if (!empty($result) && $result->num_rows > 0) {
        $field = $result->fetch_fields();
        $fields = array();
        $j = 0;
        foreach ($field as $col) {
            array_push($fields, array(++$j, $col->name));
        }

        while ($row = $result->fetch_array()) {

            for ($i = 0; $i < sizeof($fields); $i++) {
                $fieldname = $fields[$i][1];
                $filedvalue = $row[$fieldname];
            }
        }

        return $filedvalue;
    } else {
        echo '<center> <h4> Non ci sono risultati </h4> </center>';
    }
}

function ControlloEta($dataNascita)
{

    $dob = new DateTime($dataNascita);

    $now = new DateTime();

    $difference = $now->diff($dob);

    $age = $difference->y;

    return  $age;
}

function dropMenu($sql_link, $query, $nomeStampato, $nome)
{

    //$result = mysqli_query($sql_link, $query);

    // if (!empty($result) && $result->num_rows > 0) {
    //     echo "<table id='tbl'><tr>";

    //     $field = $result->fetch_fields();
    //     $fields = array();
    //     $j = 0;
    //     foreach ($field as $col) {
    //         echo "<th>" . $col->name . "</th>";
    //         array_push($fields, array(++$j, $col->name));
    //     }
    //     echo "</tr>";

    //     while ($row = $result->fetch_array()) {
    //         echo "<tr>";
    //         for ($i = 0; $i < sizeof($fields); $i++) {
    //             $fieldname = $fields[$i][1];
    //             $filedvalue = $row[$fieldname];

    //             echo "<td>" . $filedvalue . "</td>";
    //         }
    //         echo "</tr>";
    //     }
    //     echo "</table>";
    // }

    $result = mysqli_query($sql_link, $query);  // Use select query here 
    //echo "<option disabled selected>Select " . $value . "</option>";
    while ($data = mysqli_fetch_array($result)) {
        // echo "<option value='" . $data['Codice'] . "'>" . $data['Codice'] . "</option>";  // displaying data in option menu
        echo "<option value='" . $data[$nome] . "'>" . $data[$nomeStampato] . "</option>";  // displaying data in option menu
    }
}
