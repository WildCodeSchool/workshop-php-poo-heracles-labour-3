<?php

use App\Shield;
use App\Weapon;

require '../src/Fighter.php';
require '../src/Weapon.php';
require '../src/Shield.php';

$weapon = new Weapon();
$shield = new Shield();

$hercules = new Fighter('Hercules', 20, 6, 'hercules.svg');
$hercules->setWeapon($weapon);
$hercules->setShield($shield);

$boar = new Fighter('Erymanthian Boar', 25, 12, 'boar.svg');

$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hercules Labours</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <h1>Hercules vs Erymanthian Boar</h1>
    </header>
    <main>

        <div class="fighters">
            <a href="#hero">
                <figure class="hercules">
                    <img src="<?= $hercules->getImage() ?>" alt="hercules">
                    <figcaption><?= $hercules->getName() ?></figcaption>
                </figure>
            </a>
            <div class="fight">🗡️</div>
            <figure class="monster">
                <img src="<?= $boar->getImage() ?>" alt="monster">
                <figcaption><?= $boar->getName() ?></figcaption>
            </figure>
        </div>

        <?php
        while ($hercules->isAlive() && $boar->isAlive()) : ?>
            <section class="round">
                <h2 class="number">Round <?= $i ?></h2>
                <?php $hercules->fight($boar); ?>
                <?php $boar->fight($hercules); ?>
                <div class="life">
                    <div><?= $hercules->getLife() ?></div>
                    <progress max="<?= Fighter::MAX_LIFE ?>" value="<?= $hercules->getLife() ?>"></progress>
                    <progress max="<?= Fighter::MAX_LIFE ?>" value="<?= $boar->getLife() ?>"></progress>
                    <div><?= $boar->getLife() ?></div>
                </div>
                <?php $i++; ?>
            </section>
        <?php endwhile; ?>

        <?php
        if (!$hercules->isAlive()) {
            $winner = $boar;
            $loser = $hercules;
        } else {
            $winner = $hercules;
            $loser = $boar;
        }
        ?>
        <section class="win">
            <p>💀 <?= $loser->getName() ?> is dead</p>
            <p>🏆 <?= $winner->getName() ?> wins (remaining 💙 <?= $winner->getLife() ?>)</p>
        </section>
    </main>

    <?php include 'hero.php' ?>
</body>

</html>