<?php
    $mysqli = new mysqli('localhost', 'root', '', 'phonebook') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM companies") or die($mysqli->error);

    if ($result) {
        while($row = $result->fetch_array()) {
            $myArray[] = $row;
        }
        echo json_encode($myArray);
    }
?>