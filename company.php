<?php
    $result = null;

    if (isset($_GET['id'])) {

        $id = htmlspecialchars(stripslashes(trim($_GET['id'])));
        $mysqli = new mysqli('localhost', 'root', '', 'phonebook') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM companies WHERE id = {$id}") or die(mysqli_error($mysqli));

        if (!$result) {
            http_response_code(404);
        }

        $row = $result->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <header>
            <h1><?php echo $row['name']; ?></h1>
        </header>
        <p><?php echo $row['description']; ?></p>
        <p>Website: </p>
        <p><?php echo $row['website']; ?></p>
        <p>Email: </p>
        <p><?php echo $row['email']; ?></p>
        <p>Phone number: </p>
        <p><?php echo $row['phone']; ?></p>
        <p>Address: </p>
        <p><?php echo $row['address']; ?></p>
    </main>
</body>
</html>