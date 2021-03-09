<?php
require '../src/Hero.php';
require '../src/Weapon.php';
require '../src/Shield.php';

use App\Hero;
use App\Shield;
use App\Weapon; 

$sword = new Weapon;
$shield = new Shield;
$hero = new Hero();
// $hero->setWeapon($sword);
// $hero->setShield($shield);

require 'hero.php';
