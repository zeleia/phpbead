<?php
$error = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    include_once("userstorage.php");
    $userStorage = new UserStorage();
    $user = $userStorage->findById($_POST['username']);
    if($user && $_POST['password'] === $user['password']) {
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['password'] = $user['password'];
        header('Location: index.php');
    }
} else {
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | Sign in </title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/details.css">
</head>

<body>
    <header>
        <h1><a href="index.php">IKémon</a> Sign in</h1>
    </header>
        <form action="" method="POST">
            <span id="error" style="color: red; display: <?php echo $error ? 'none' : 'block' ?>">Invalid username or password!</span>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="submit" value="Sign in">
        </form>
    <a href="sign-up.php">Don't have an account?</a>
    <footer>
        <p>IKémon | ELTE IK Webprogramozás</p>
    </footer>
</body>

</html>