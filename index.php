<?php
include_once("cardstorage.php");
include_once("userstorage.php");

$username = '';
$password = '';
if (isset($_GET['username']) && isset($_GET['password'])) {
  $username = $_GET['username'];
  $password = $_GET['password'];
}
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
      <div class="pokemon-card">
        <div class="image clr-electric">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/025.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card0">Pikachu</a></h2>
          <span class="card-type"><span class="icon">🏷</span> electric</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 60</span>
            <span class="card-attack"><span class="icon">⚔</span> 20</span>
            <span class="card-defense"><span class="icon">🛡</span> 20</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 160</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-fire">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/006.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card1">Charizard</a></h2>
          <span class="card-type"><span class="icon">🏷</span> fire</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 78</span>
            <span class="card-attack"><span class="icon">⚔</span> 84</span>
            <span class="card-defense"><span class="icon">🛡</span> 78</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 534</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-grass">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card2">Bulbasaur</a></h2>
          <span class="card-type"><span class="icon">🏷</span> grass</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 45</span>
            <span class="card-attack"><span class="icon">⚔</span> 49</span>
            <span class="card-defense"><span class="icon">🛡</span> 49</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 318</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-water">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/007.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card3">Squirtle</a></h2>
          <span class="card-type"><span class="icon">🏷</span> water</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 44</span>
            <span class="card-attack"><span class="icon">⚔</span> 48</span>
            <span class="card-defense"><span class="icon">🛡</span> 65</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 314</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-bug">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/010.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card4">Caterpie</a></h2>
          <span class="card-type"><span class="icon">🏷</span> bug</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 45</span>
            <span class="card-attack"><span class="icon">⚔</span> 30</span>
            <span class="card-defense"><span class="icon">🛡</span> 35</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 195</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-bug">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/013.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card5">Weedle</a></h2>
          <span class="card-type"><span class="icon">🏷</span> bug</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 40</span>
            <span class="card-attack"><span class="icon">⚔</span> 35</span>
            <span class="card-defense"><span class="icon">🛡</span> 30</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 195</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-normal">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/016.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card6">Pidgey</a></h2>
          <span class="card-type"><span class="icon">🏷</span> normal</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 40</span>
            <span class="card-attack"><span class="icon">⚔</span> 45</span>
            <span class="card-defense"><span class="icon">🛡</span> 40</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 251</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-normal">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/019.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card7">Rattata</a></h2>
          <span class="card-type"><span class="icon">🏷</span> normal</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 30</span>
            <span class="card-attack"><span class="icon">⚔</span> 56</span>
            <span class="card-defense"><span class="icon">🛡</span> 35</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 253</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-normal">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/021.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card8">Spearow</a></h2>
          <span class="card-type"><span class="icon">🏷</span> normal</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 40</span>
            <span class="card-attack"><span class="icon">⚔</span> 60</span>
            <span class="card-defense"><span class="icon">🛡</span> 30</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 262</span>
        </div>
      </div>
      </a>
      <div class="pokemon-card">
        <div class="image clr-poison">
          <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/023.png" alt="">
        </div>
        <div class="details">
          <h2><a href="details.php?id=card9">Ekans</a></h2>
          <span class="card-type"><span class="icon">🏷</span> poison</span>
          <span class="attributes">
            <span class="card-hp"><span class="icon">❤</span> 35</span>
            <span class="card-attack"><span class="icon">⚔</span> 60</span>
            <span class="card-defense"><span class="icon">🛡</span> 44</span>
          </span>
        </div>
        <div class="buy">
          <span class="card-price"><span class="icon">💰</span> 288</span>
        </div>
      </div>
      </a>
    </div>
  </div>
  <footer>
    <p>IKémon | ELTE IK Webprogramozás</p>
  </footer>
</body>

</html>