<?php
session_start();

$error = false;

if(isset($_POST['username']) && isset($_POST['password'])) {
    include_once("userstorage.php");
    $userStorage = new UserStorage();
    $user = $userStorage->findById($_POST['username']);
    if($user && $user['password'] === $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
        if(isset($_SESSION['username'])){
            header('Location: index.php');
            exit();
        }
        
    } else {
        $error = true;
    }
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
            <span style="color: red; display: <?php echo $error ? 'block' : 'none' ?>">Invalid username or password!</span>
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