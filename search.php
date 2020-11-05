<?php
    session_start();
    
    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = false;
    }

    if (!$_SESSION['auth']) {
        header('location: sign-in.php');
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $query = trim(htmlspecialchars(stripslashes($_GET['search'])));

        $mysqli = new mysqli('localhost', 'root', '', 'phonebook') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM companies WHERE name LIKE '{$query}%'") or die($mysqli->error);
    
        if ($result) {
            $arr = [];
            while($row = $result->fetch_array()) {
                $arr[] = $row;
            }
            echo json_encode($arr);
        }
    }
?>