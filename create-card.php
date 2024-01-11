<?php 
session_start();
if(!isset($_SESSION['username']) || $_SESSION['username'] !== "admin"){
    header('Location: index.php');
    exit();
}

$errors = array();

$allSet = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $allSet = true;
    if (!isset($_POST['card.name']) || empty($_POST['card-name'])) {
        $errors[] = 'Card name is required!';
        $allSet = false;
    }
    if (!isset($_POST['type']) || empty($_POST['type'])) {
        $errors[] = 'Type is required!';
        $allSet = false;
    }
    if (!isset($_POST['hp'])) {
        $errors[] = 'HP is required!';
        $allSet = false;
    }
    if (!isset($_POST['attack'])) {
        $errors[] = 'Attack is required!';
        $allSet = false;
    }
    if (!isset($_POST['defense'])) {
        $errors[] = 'Defense is required!';
        $allSet = false;
    }
    if (!isset($_POST['price'])){
        $errors[] = 'Price is required!';
        $allSet = false;
    }
    if (!isset($_POST['description']) || empty($_POST['description'])) {
        $errors[] = 'Description is required!';
        $allSet = false;
    }
    if (!isset($_POST['image-url']) || empty($_POST['image-url'])){
        $errors[] = 'Image URL is required!';
        $allSet = false;
    }
}

function length($array){
    $count = 0;
    foreach($array as $item){
      $count++;
    }
    return $count;
  }

if ($allSet) {
    include_once("cardstorage.php");
    $cardStorage = new CardStorage();
    $card = $cardStorage->findById($_POST['card-name']);

    if ($card) {
        $errors[] = 'Card already exists!';
    }

    $cards = $cardStorage->findAll();

    $id = 'card0';
    if(length($cards) !== 0){
        $id = 'card' . (length($cards) - 1);
    }
    
    if(empty($errors)){
        $cardStorage->add([
            'id' => $id,
            'name' => $_POST['card-name'],
            'type' => $_POST['type'],
            'hp' => $_POST['hp'],
            'attack' => $_POST['attack'],
            'defense' => $_POST['defense'],
            'price' => $_POST['price'],
            'description'=> $_POST['description'],
            'image' => $_POST['image-url'],
        ], $is);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | Card workshop </title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/details.css">
</head>

<body>
    <header>
        <h1><a href="index.php">IKémon</a> Sign in</h1>
    </header>
        <form action="" method="POST">
            <label for="card-name">Card name:</label>
            <input type="text" id="card-name" name="card-name" placeholder="Card name"><br>
            <label for="type">Type:</label>
            <select name="type" id="type">
                <option value="electric">Electric</option>
                <option value="water">Water</option>
                <option value="fire">Fire</option>
                <option value="grass">Grass</option>
                <option value="colorless">Colorless</option>
                <option value="fighting">Fighting</option>
                <option value="psychic">Psychic</option>
                <option value="metal">Metal</option>
                <option value="dragon">Dragon</option>
                <option value="darkness">Darkness</option>
                <option value="fairy">Fairy</option>
            </select>
            <label for="hp">HP:</label>
            <input type="number" id="hp" name="hp" placeholder="HP" value="0"><br>
            <label for="attack">Attack:</label>
            <input type="number" id="attack" name="attack" placeholder="Attack" value="0"><br>
            <label for="defense">Defense:</label>
            <input type="number" id="defense" name="defense" placeholder="Defense" value="0">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Price" value="0"><br>
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea><br>
            <label for="image-url">Image:</label>
            <input type="text" id="image-url" name="image-url" placeholder="Image URL"><br>
            <input type="submit" value="Create card">
        </form>
    <footer>
        <p>IKémon | ELTE IK Webprogramozás</p>
    </footer>
</body>

</html>