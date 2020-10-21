<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mysqli = new mysqli('localhost', 'root', '', 'phonebook') or die(mysqli_error($mysqli));

        $name = $_POST['company-name'];
        $description = $_POST['company-description'];
        $phone = $_POST['company-phone-number'];
        $email = $_POST['company-email'];
        $website = $_POST['company-website'];
        $address = $_POST['company-address'];

        $mysqli->query(
            "INSERT INTO companies VALUES
            (null, '$name', '$description', '$phone', '$email', '$website', '$address')"
            ) or die($mysqli->error);
    } else {
        http_response_code(404);
    }
?>