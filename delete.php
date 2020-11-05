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
        $id = stripslashes(trim(htmlspecialchars($_POST['id'])));
        $mysqli->query("DELETE FROM companies WHERE id = {$id}") or die($mysqli->error);
    } else {
        http_response_code(404);
    }
?>