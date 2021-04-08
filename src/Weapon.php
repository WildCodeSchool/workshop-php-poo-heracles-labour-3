<?php

namespace App;

class Weapon
{
    protected int $damage = 10;

    protected string $image = 'sword.svg';

    /**
     * Get the value of damage
     */ 
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * Set the value of damage
     */ 
    public function setDamage($damage): void
    {
        $this->damage = $damage;
    }

    /**
     * Get the value of image
     */ 
    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }
    /**
     * Get the value of image
     */ 
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

}