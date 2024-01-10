<?php
$errors = array();

$allSet = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $allSet = true;
    if (!isset($_POST['username']) || empty($_POST['username'])) {
        $errors[] = 'Username is required!';
        $allSet = false;
    }
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $errors[] = 'Password is required!';
        $allSet = false;
    }
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $errors[] = 'Email is required!';
        $allSet = false;
    }
    if (!isset($_POST['password-again']) || empty($_POST['password-again'])) {
        $errors[] = 'Password again is required!';
        $allSet = false;
    }
}
if ($allSet) {
    include_once("userstorage.php");
    $userStorage = new UserStorage();
    $user = $userStorage->findById($_POST['username']);

    if ($user) {
        $errors[] = 'Username already exists!';
    }

    $user = $userStorage->findOne(['email' => $_POST['email']]);

    if ($user) {
        $errors[] = 'Email already exists!';
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address!';
    }

    if ($_POST['password'] !== $_POST['password-again']) {
        $errors[] = 'Passwords do not match!';
    }

    if(empty($errors)){
        $userStorage->add([
            'id' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'admin' => false,
            'balance' => 1000000,
            'cards' => []
        ], $_POST['username']);
        header('Location: sign-in.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | Sign up </title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/details.css">
</head>

<body>
    <header>
        <h1><a href="index.php">IKémon</a> Sign up</h1>
    </header>
    <form action="" method="POST">
        <span id="errors" style="color: red; display:<?php echo empty($errors) ? 'none' : 'block'?>">
            <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . '<br>';
                }
            }
            ?>
        </span>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Username"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password"><br>
        <label for="password-again">Password again:</label>
        <input type="password" id="password-again" name="password-again" placeholder="Password again"><br>
        <input type="submit" value="Sign in">
    </form>
    <footer>
        <p>IKémon | ELTE IK Webprogramozás</p>
    </footer>
</body>

</html>