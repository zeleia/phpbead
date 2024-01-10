<?php
include_once("cardstorage.php");
include_once("userstorage.php");

$cardStorage = new CardStorage();

$cards = $cardStorage->findAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IKémon - Home</title>
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/cards.css">
</head>

<body>
  <header>
    <h1><a href="index.php">IKémon</a> > Home</h1>
  </header>
  <div id="content">
    <div id="card-list">
      <?php
      $id = 0;
      foreach ($cards as $card) {
        echo '<div class="pokemon-card">';
        echo '<div class="image clr-' . $card['type'] . '">';
        echo '<img src="' . $card['image'] . '" alt="">';
        echo '</div>';
        echo '<div class="details">';
        echo '<h2><a href="details.php?id=' . $id . '">' . $card['name'] . '</a></h2>';
        echo '<span class="card-type"><span class="icon">🏷</span> ' . $card['type'] . '</span>';
        echo '<span class="attributes">';
        echo '<span class="card-hp"><span class="icon">❤</span> ' . $card['hp'] . '</span>';
        echo '<span class="card-attack"><span class="icon">⚔</span> ' . $card['attack'] . '</span>';
        echo '<span class="card-defense"><span class="icon">🛡</span> ' . $card['defense'] . '</span>';
        echo '</span>';
        echo '</div>';
        echo '<div class="buy">';
        echo '<span class="card-price"><span class="icon">💰</span> ' . $card['price'] . '</span>';
        echo '</div>';
        echo '</div>';
        $id++;
      }
      ?>
    </div>
  </div>
  <footer>
    <p>IKémon | ELTE IK Webprogramozás</p>
  </footer>
</body>

</html>