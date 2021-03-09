<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
    <style>
        .hair {
            fill: <?= $hero->getHair() ?>;
        }
    </style>
</head>

<body>

    <div class="pilars">

    </div>
    <main class="hero">
        <div class="slots equipment">
            <div data-slot="Main weapon" class="slot">
                <?php if ($hero->getWeapon() instanceof App\Weapon) : 
                     include $hero->getWeapon()->render(); 
                endif; ?>
            </div>
            <div data-slot="Shield" class="slot">
                <?php if ($hero->getShield() instanceof App\Shield) : 
                    include $hero->getShield()->render(); 
                endif; ?>
            </div>
            <div data-slot="Secondary weapon" class="slot"></div>
            <div data-slot="Head" class="slot"></div>
            <div data-slot="Ring" class="slot"></div>
            <div data-slot="Armory" class="slot"></div>
            <div data-slot="Attack" class="slot statistic"><?= $hero->getAttack() ?></div>
            <div data-slot="Defense" class="slot statistic"><?= $hero->getDefense() ?></div>
            <div data-slot="Life" class="slot statistic"><?= $hero->getLife() ?></div>
            <div data-slot="Magic" class="slot statistic"></div>
        </div>
        <div class="character">
            <h2 class="name"><?= $hero->getName() ?></h2>
            <div class="avatar">
                <?php include $hero->render(); ?>
            </div>
            <p class="level">Level 1</p>
        </div>

        <div class="slots inventory">
            <div class="slot"></div>
            <div class="slot"></div>
            <div class="slot"></div>
            <div class="slot"></div>
            <div class="slot"></div>
            <div class="slot"></div>
            <div class="slot"></div>
            <div class="slot"></div>
            <div class="slot"></div>
            <div class="slot"></div>
        </div>
    </main>
</body>

</html>