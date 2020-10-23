<?php
    session_start();
    
    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = false;
    }

    if (!$_SESSION['auth']) {
        header('location: sign-in.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body>
    <nav>
        <button class="open-insert-form btn">Add</button>
        <input type="text" name="search" class="search" placeholder="Search">
        <a href="sign-out.php" class="btn delete-btn">Sign out</a>
    </nav>
    <main>
        
    </main>
    <form class="insert-form hidden">
        <label for="company-name">
            Company name:
        </label>
        <input type="text" name="company-name" required placeholder="Januszex Sp. z.o.o">
        <label for="company-description">
            Description:
        </label>
        <textarea name="company-description" rows="3" placeholder="Budujemy domy..."></textarea>
        <label for="company-phone-number">
            Phone number
        </label>
        <input type="tel" name="company-phone-number" placeholder="997">
        <label for="company-email">
            E-mail address:
        </label>
        <input type="email" name="company-email" placeholder="janusz@januszex.com">
        <label for="company-email">
            Address:
        </label>
        <input type="text" name="company-website" placeholder="janusz.pl">
        <label for="company-email">
            Website:
        </label>
        <input type="text" name="company-address" placeholder="Al. Jana Pawła II 21/37 Warszawa">
        <button class="btn submit-btn add-btn" type="submit" name="update">
            Add to database
        </button>
        <button class="btn submit-btn delete-btn close-insert-form" type="reset" name="reset">
            Close
        </button>
    </form>
    <form class="edit-form hidden">
        <input type="hidden" name="company-id" id="company-id">
        <label for="company-name">
            Company name:
        </label>
        <input type="text" name="company-name" id="company-name" required placeholder="Januszex Sp. z.o.o">
        <label for="company-description">
            Description:
        </label>
        <textarea name="company-description" id="company-description" rows="3" placeholder="Budujemy domy..."></textarea>
        <label for="company-phone-number">
            Phone number
        </label>
        <input type="tel" name="company-phone-number" id="company-phone" placeholder="997">
        <label for="company-email">
            E-mail address:
        </label>
        <input type="email" name="company-email" id="company-email" placeholder="janusz@januszex.com">
        <label for="company-email">
            Address:
        </label>
        <input type="text" name="company-website" id="company-website" placeholder="janusz.pl">
        <label for="company-email">
            Website:
        </label>
        <input type="text" name="company-address" id="company-address" placeholder="Al. Jana Pawła II 21/37 Warszawa">
        <button class="btn submit-btn add-btn" type="submit" name="update">
            Save changes
        </button>
        <button class="btn submit-btn delete-btn close-edit-form" type="reset" name="reset">
            Close
        </button>
    </form>
</body>
</html>