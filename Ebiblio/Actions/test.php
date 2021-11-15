<?php
include 'funzioni.php';
include 'connessioneDB.php';

// dropMenu($conn, 'SELECT Codice FROM biblioteca');
?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP Retrieve Data from MySQL using Drop Down Menu</title>
</head>

<body>

    <form>
        <!-- City: -->
        <select>
            <!-- <option disabled selected>Select.<?php $value ?> </option> -->

            <?php
            // $records = mysqli_query($conn, "SELECT Codice FROM biblioteca");  // Use select query here 

            // while ($data = mysqli_fetch_array($records)) {
            //     echo "<option value='" . $data['Codice'] . "'>" . $data['Codice'] . "</option>";  // displaying data in option menu
            // }
            $query = "SELECT Codice FROM biblioteca";
            $value = "Codice";
            dropMenu($conn, $query, $value)
            ?>
        </select>
    </form>
</body>

</html>