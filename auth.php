<?php
    session_start();

    $credentials = explode("\n", file_get_contents('credentials.txt'));
    $login = trim($credentials[0]);
    $password = $credentials[1];
    
    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = false;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        if (isset($_POST['login']) && isset($_POST['password'])) {
    
            if ($_POST['login'] === $login && $_POST['password'] === $password) {
    
                $_SESSION['auth'] = true;
                header('location: index.php');
    
            } else {
    
                $_SESSION['auth'] = false;
                header('location: sign-in.php');
    
            }
        }
    } else {
        http_response_code(404);
    }
?>