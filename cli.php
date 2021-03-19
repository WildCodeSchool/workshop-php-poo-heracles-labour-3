<?php

require 'src/Fighter.php';

$hercules = new Fighter('🧔 Hercules', 20, 6);
$lion = new Fighter('🦁 Lion de Némée', 11, 13);

$i = 1;

while ($hercules->isAlive() && $lion->isAlive()) {
    echo '🕛 Round #' . $i . PHP_EOL;

    $hercules->fight($lion);
    echo $hercules->getName() . ' 🗡️  ' . $lion->getName();
    echo ' 💙 ' . $lion->getName() . ': ' .  $lion->getLife() . PHP_EOL;
    $lion->fight($hercules);
    echo $lion->getName() . ' 🗡️  ' . $hercules->getName();
    echo ' 💙 ' . $hercules->getName() . ': ' .  $hercules->getLife() . PHP_EOL;
    $i++;
}

if (!$hercules->isAlive()) {
    $winner = $lion;
    $loser = $hercules;
} else {
    $winner = $hercules;
    $loser = $lion;
}

echo PHP_EOL;
echo '💀 ' . $loser->getName() . ' is dead' . PHP_EOL;
echo '🏆 ' . $winner->getName() . ' wins (💙 ' . $winner->getLife() . ')' .  PHP_EOL;
