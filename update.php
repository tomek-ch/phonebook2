<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mysqli = new mysqli('localhost', 'root', '', 'phonebook') or die(mysqli_error($mysqli));

        $id = stripslashes(trim(htmlspecialchars($_POST['company-id'])));
        $name = stripslashes(trim(htmlspecialchars($_POST['company-name'])));
        $description = stripslashes(trim(htmlspecialchars($_POST['company-description'])));
        $phone = stripslashes(trim(htmlspecialchars($_POST['company-phone-number'])));
        $email = stripslashes(trim(htmlspecialchars($_POST['company-email'])));
        $website = stripslashes(trim(htmlspecialchars($_POST['company-website'])));
        $address = stripslashes(trim(htmlspecialchars($_POST['company-address'])));

        $mysqli->query(
            "UPDATE companies SET
            name = '$name',
            description = '$description',
            phone = '$phone',
            email = '$email',
            website = '$website',
            address = '$address'
            WHERE id = {$id}"
            ) or die($mysqli->error);
    } else {
        http_response_code(404);
    }
?>