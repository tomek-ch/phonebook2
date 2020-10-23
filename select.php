<?php
    $mysqli = new mysqli('localhost', 'root', '', 'phonebook') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM companies") or die($mysqli->error);

    if ($result) {
        $arr = [];
        while($row = $result->fetch_array()) {
            $arr[] = $row;
        }
        echo json_encode($arr);
    }
?>