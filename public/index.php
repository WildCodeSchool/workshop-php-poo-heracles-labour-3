<?php
require '../src/Fighter.php';

$player1 = new Fighter('Hercules', '🧔', 20, 8);
$player2 = new Fighter('Lion de Némée', '🦁', 15, 12);
readline('Start Fight ?');
$i = 1;

// bonus:  creer isDead
while ($player1->isDead() === false && $player2->isDead() === false) {
    echo '🕛 Round #' . $i . PHP_EOL;
    
    $player1->fight($player2);
    echo $player1->getIcon() . '  ' . $player1->getName() . ' 🗡️  ' . $player2->getName() . PHP_EOL;
    $player2->fight($player1);
    echo $player2->getIcon() . '  ' . $player2->getName() . ' 🗡️  ' . $player1->getName() . PHP_EOL;
    echo '💙 ' . $player1->getIcon() . ': ' .  $player1->getLife();
    echo ' 💙 ' . $player2->getIcon() . ': ' .  $player2->getLife() . PHP_EOL;
    $i++;
}

if ($player1->isDead()) {
    $winner = $player2;
    $loser = $player1;
} else {
    $winner = $player1;
    $loser = $player2;
}

echo PHP_EOL;
echo '💀 ' . $loser->getName(). ' is dead' . PHP_EOL;
echo '🏆 '. $winner->getName() . ' wins (💙' . $winner->getLife() . ')' .  PHP_EOL;
