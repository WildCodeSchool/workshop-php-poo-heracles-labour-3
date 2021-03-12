<?php

require 'src/Fighter.php';

$hercules = new Fighter('Hercules', '🧔', 20, 6);
$lion = new Fighter('Lion de Némée', '🦁', 11, 13);

$i = 1;

while ($hercules->isDead() === false && $lion->isDead() === false) {
    echo '🕛 Round #' . $i . PHP_EOL;

    $hercules->fight($lion);
    echo $hercules->getIcon() . '  ' . $hercules->getName() . ' 🗡️  ' . $lion->getName();
    echo ' 💙 ' . $lion->getIcon() . ': ' .  $lion->getLife() . PHP_EOL;
    $lion->fight($hercules);
    echo $lion->getIcon() . '  ' . $lion->getName() . ' 🗡️  ' . $hercules->getName();
    echo ' 💙 ' . $hercules->getIcon() . ': ' .  $hercules->getLife() . PHP_EOL;
    $i++;
}

if ($hercules->isDead()) {
    $winner = $lion;
    $loser = $hercules;
} else {
    $winner = $hercules;
    $loser = $lion;
}

echo PHP_EOL;
echo '💀 ' . $loser->getName() . ' is dead' . PHP_EOL;
echo '🏆 ' . $winner->getName() . ' wins (💙 ' . $winner->getLife() . ')' .  PHP_EOL;
