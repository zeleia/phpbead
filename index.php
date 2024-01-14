<?php
session_start();
include_once("cardstorage.php");
include_once("userstorage.php");

$cardStorage = new CardStorage();
$userStorage = new UserStorage();

$cards = $cardStorage->findAll();

$admin = $userStorage->findById('admin');

function isforSale($piece){
  global $admin;
  foreach($admin['cards'] as $cardForSale){
    if($cardForSale === $piece){
      return true;
    }
  }
  return false;
}

if(isset($_GET['buy'])){
  $piece = $cardStorage->findById($_GET['buy']);
  if(purchase($piece)){
    header('Location: index.php');
  }
}

function length($array){
  $count = 0;
  foreach($array as $item){
    $count++;
  }
  return $count;
}

function purchase($piece){
  global $userStorage, $admin;
  $user = $userStorage->findById($_SESSION['username']);
  if(length($user['cards']) < 5 && $user['balance'] >= $piece['price']){
    $userStorage->update($admin['id'],[
      'id' => $admin['id'],
      'password' => $admin['password'],
      'email' => $admin['email'],
      'balance' => $admin['balance'] + $piece['price'],
      'cards' => array_diff($admin['cards'], [$piece['id']])
    ]);
    $userStorage->update($user['id'],[
      'id' => $user['id'],
      'password' => $user['password'],
      'email' => $user['email'],
      'balance' => $user['balance'] - $piece['price'],
      'cards' => array_merge($user['cards'], [$piece['id']])
    ]);
    return true;
  }
  return false;
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
    <?php
      if(isset($_SESSION['username'])){
        if($_SESSION['username'] !== 'admin'){
          echo '<span>You are loggedin as <a href="user-details.php?user='.$_SESSION['username'].'">'.$_SESSION['username'].'</a>!</span><br>';
        }else{
          echo '<span>You are logged in as admin!</span><br>';
        }
      } else {
        echo '<span>You are not logged in!</span><br>';
      }
    ?>
    <?php echo isset($_SESSION['username']) ? '<span>Your balance: ' . $userStorage->findById($_SESSION['username'])['balance'] . ' coin.</span>' : '' ?>
    <h1><a href="index.php">IKémon</a> > Home</h1> 
    <?php echo isset($_SESSION['username']) ? '<a href="logout.php">Logout</a>' : '<a href="sign-in.php">Sign in</a>' ?>
  </header>
  <div class="content">
    <?php echo (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') ? '<input type="button" value="Create new card" onclick="location.href=\'create-card.php\'">' : ''?>
    <div class="card-list">
      <?php
      $id = 0;
      foreach ($cards as $card) {
        echo '<div class="pokemon-card">';
        echo '<div class="image clr-' . $card['type'] . '">';
        echo '<img src="' . $card['image'] . '" alt="">';
        echo '</div>';
        echo '<div class="details">';
        echo '<h2><a href="card-details.php?id=' . $id . '">' . $card['name'] . '</a></h2>';
        echo '<span class="card-type"><span class="icon">🏷</span> ' . $card['type'] . '</span>';
        echo '<span class="attributes">';
        echo '<span class="card-hp"><span class="icon">❤</span> ' . $card['hp'] . '</span>';
        echo '<span class="card-attack"><span class="icon">⚔</span> ' . $card['attack'] . '</span>';
        echo '<span class="card-defense"><span class="icon">🛡</span> ' . $card['defense'] . '</span>';
        echo '</span>';
        echo '</div>';
        echo (isset($_SESSION['username']) && isForSale($card['id'])) ? '<div class="buy" style="display: block" onclick="location.href=\'index.php?buy='.$card['id'].'\'">' : '<div class="buy" style="display: none">';
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