<?php
include_once('cardstorage.php');

$cardStorage = new CardStorage();

$id = $_GET['id'];

$card = $cardStorage->findById('card' . $id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon |
        <?php echo $card['name'] ?>
    </title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/details.css">
</head>

<body>
    <header <?php 
    if($card['type'] === "electric"){
        echo 'style="background-color: #f5f583;"';
    } elseif($card['type'] === "water"){
        echo 'style="background-color: #6188a1;"';
    } elseif($card['type'] === "fire"){
        echo 'style="background-color: #e96933;"';
    } elseif($card['type'] === "grass"){
        echo 'style="background-color: #87cf87;"';
    } elseif($card['type'] === "colorless"){
        echo 'style="background-color: #c5c5a1;"';
    } elseif($card['type'] === "fighting"){
        echo 'style="background-color: #db93db;"';
    } elseif($card['type'] === "psychic"){
        echo 'style="background-color: #c04f8b;"';
    } elseif($card['type'] === "metal"){
        echo 'style="background-color: #c5c5c5;"';
    } elseif($card['type'] === "dragon"){
        echo 'style="background-color: #844784;"';
    } elseif($card['type'] === "darkness"){
        echo 'style="background-color: #1f1f1f;"';
    } elseif($card['type'] === "fairy"){
        echo 'style="background-color: #7ce1e1;"';
    }?>>
        <h1><a href="index.php">IKémon</a> >
            <?php echo $card['name'] ?>
        </h1>
    </header>
    <div id="content">
        <div id="details">
            <div class="image clr-<?php echo $card['type'] ?>">
                <img src="<?php echo $card['image'] ?>" alt="">
            </div>
            <div class="info">
                <div class="description">
                    <?php echo $card['description'] ?>
                </div>
                <span class="card-type"><span class="icon">🏷</span> Type:
                    <?php echo $card['type'] ?>
                </span>
                <div class="attributes">
                    <div class="card-hp"><span class="icon">❤</span> Health:
                        <?php echo $card['hp'] ?>
                    </div>
                    <div class="card-attack"><span class="icon">⚔</span> Attack:
                        <?php echo $card['attack'] ?>
                    </div>
                    <div class="card-defense"><span class="icon">🛡</span> Defense:
                        <?php echo $card['defense'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>IKémon | ELTE IK Webprogramozás</p>
    </footer>
</body>

</html>