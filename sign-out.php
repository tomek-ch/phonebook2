<?php
    session_start();
    $_SESSION['auth'] = false;
    header('location: sign-in.php');
?>