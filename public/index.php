<?php

use App\Shield;
use App\Weapon;

require '../src/Fighter.php';

/** ✅ DEBUT DE LA ZONE À MODIFIER ✅ **/


$heracles = new Fighter('Heracles', 20, 6);
$boar = new Fighter('Erymanthian Boar', 25, 12);


/** FIN DE LA ZONE A MODIFIER **/
/** ⛔ Ne pas modifier en dessous ⛔ **/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heracles Labours</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <h1>Heracles vs Erymanthian Boar</h1>
    </header>
    <main>

        <div class="fighters">
            <a href="#hero">
                <figure class="heracles">
                    <img src="<?= $heracles->getImage() ?>" alt="heracles">
                    <figcaption><?= $heracles->getName() ?></figcaption>
                </figure>
            </a>
            <div class="fight">🗡️</div>
            <figure class="monster">
                <img src="<?= $boar->getImage() ?>" alt="monster">
                <figcaption><?= $boar->getName() ?></figcaption>
            </figure>
        </div>

        <?php
        $i = 1;

        while ($heracles->isAlive() && $boar->isAlive()) : ?>
            <section class="round">
                <h2 class="number">Round <?= $i ?></h2>
                <?php $heracles->fight($boar); ?>
                <?php $boar->fight($heracles); ?>
                <div class="life">
                    <div><?= $heracles->getLife() ?></div>
                    <progress max="<?= Fighter::MAX_LIFE ?>" value="<?= $heracles->getLife() ?>"></progress>
                    <progress max="<?= Fighter::MAX_LIFE ?>" value="<?= $boar->getLife() ?>"></progress>
                    <div><?= $boar->getLife() ?></div>
                </div>
                <?php $i++; ?>
            </section>
        <?php endwhile; ?>

        <?php
        if (!$heracles->isAlive()) {
            $winner = $boar;
            $loser = $heracles;
        } else {
            $winner = $heracles;
            $loser = $boar;
        }
        ?>
        <section class="win">
            <p>💀 <?= $loser->getName() ?> is dead</p>
            <p>🏆 <?= $winner->getName() ?> wins (remaining 💙 <?= $winner->getLife() ?>)</p>
        </section>
    </main>

    <?php include 'inventory.php' ?>
</body>

</html>