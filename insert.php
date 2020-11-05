<?php
    session_start();
    
    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = false;
    }

    if (!$_SESSION['auth']) {
        header('location: sign-in.php');
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mysqli = new mysqli('localhost', 'root', '', 'phonebook') or die(mysqli_error($mysqli));

        $name = stripslashes(trim(htmlspecialchars($_POST['company-name'])));
        $description = stripslashes(trim(htmlspecialchars($_POST['company-description'])));
        $phone = stripslashes(trim(htmlspecialchars($_POST['company-phone-number'])));
        $email = stripslashes(trim(htmlspecialchars($_POST['company-email'])));
        $website = stripslashes(trim(htmlspecialchars($_POST['company-website'])));
        $address = stripslashes(trim(htmlspecialchars($_POST['company-address'])));

        $mysqli->query(
            "INSERT INTO companies VALUES
            (null, '$name', '$description', '$phone', '$email', '$website', '$address')"
            ) or die($mysqli->error);
    } else {
        http_response_code(404);
    }
?>