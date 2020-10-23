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
    <main class="company-card">
        <header>
            <h1><?php echo $row['name']; ?></h1>
        </header>
        <p><?php echo $row['description']; ?></p>
        <div><?php echo $row['website']; ?></div>
        <div><?php echo $row['email']; ?></div>
        <div><?php echo $row['phone']; ?></div>
        <div><?php echo $row['address']; ?></div>
    </main>
</body>
</html>