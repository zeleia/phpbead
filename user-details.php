<?php
include_once("userstorage.php");
include_once("cardstorage.php");
$userStorage = new UserStorage();
$cardStorage = new CardStorage();
$user;
if (isset($_GET['user']) && !empty($_GET['user'])) {
    $user = $userStorage->findById($_GET['user']);
    if (!$user) {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
;

$cards = array();
foreach ($user['cards'] as $card) {
    $cards[] = $cardStorage->findById($card);
}

if(isset($_GET['sell'])){
    sell($_GET['sell']);
}

function sell($piece)
{
    global $userStorage, $cardStorage, $user;
    $card = $cardStorage->findById($piece);
    if(!$card){
        exit();
    }
    $userStorage->update($user['id'], [
        'id' => $user['id'],
        'password' => $user['password'],
        'email' => $user['email'],
        'balance' => $user['balance'] + $card['price'] * 0.9,
        'cards' => array_diff($user['cards'], [$piece])
    ]);
    $admin = $userStorage->findById('admin');
    $userStorage->update($admin['id'], [
        'id' => $admin['id'],
        'password' => $admin['password'],
        'email' => $admin['email'],
        'balance' => $admin['balance'] - $card['price'] * 0.9,
        'cards' => array_merge($admin['cards'], [$piece])
    ]);
    header('Location: user-details.php?user=' . $user['id']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon |
        <?php echo $user['id'] ?>
    </title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/cards.css">
    <link rel="stylesheet" href="styles/details.css">
</head>

<body>
    <header>
        <h1><a href="index.php">IKémon</a> >
            <?php echo $user['id']; ?>
        </h1>
    </header>
    <div class="content">
        <?php
            echo 'Username: '.$user['id'].'<br>';
            echo 'Email: '.$user['email'].'<br>';
            echo 'Balance: '.$user['balance'].' coin<br>';
        ?>
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
                echo '<div class="buy" style="display: block" onclick="location.href=\'user-details.php?sell=' . $card['id'] . '&user=' . $user['id'] . '\'">';
                echo '<span class="card-price"><span class="icon">💰</span>Sell for ' . ceil($card['price'] * 0.9) . '</span>';
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