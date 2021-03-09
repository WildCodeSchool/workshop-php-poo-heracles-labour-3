<?php

namespace App;

class Weapon
{
    private $damage = 10;

    /**
     * Get the value of damage
     */ 
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Set the value of damage
     *
     * @return  self
     */ 
    public function setDamage(int $damage)
    {
        $this->damage = $damage;

        return $this;
    }

    public function render() 
    {
        return 'assets/images/sword.svg';
    }
}
