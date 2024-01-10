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
    <header>
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