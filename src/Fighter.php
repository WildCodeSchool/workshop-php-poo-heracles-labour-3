<?php

namespace App;

use App\Shield;
use App\Weapon;

class Fighter
{
    public const MAX_LIFE = 100;

    private string $name;

    private int $strength;
    private int $dexterity;
    private string $image = 'fighter.svg';

    private int $life = self::MAX_LIFE;

    private ?Weapon $weapon = null;
    private ?Shield $shield = null;

    public function __construct(
        string $name,
        int $strength = 10,
        int $dexterity = 5,
        string $image = 'fighter.svg'
    ) {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->image = $image;
    }

    
    public function getDamage(): int
    {
        $damage = $this->getStrength();
        if($this->getWeapon() !== null) {
            $damage += $this->getWeapon()->getDamage();
        }
        return $damage;
    }

    public function getDefense(): int
    {
        $defense = $this->getDexterity();
        if ($this->getShield() !== null) {
            $defense += $this->getShield()->getProtection();
        }    

        return $defense;
    }

     /**
     * Get the value of weapon
     */ 
    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    /**
     * Set the value of weapon
     *
     */ 
    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    /**
     * Get the value of shield
     */ 
    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    /**
     * Set the value of shield
     *
     */ 
    public function setShield(?Shield $shield): void
    {
        $this->shield = $shield;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of image
     */
    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }


    public function fight(Fighter $adversary): void
    {
        $damage = rand(1, $this->getDamage()) - $adversary->getDefense();
        if ($damage < 0) {
            $damage = 0;
        }
        $adversary->setLife($adversary->getLife() - $damage);
    }

    /**
     * Get the value of life
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     */
    public function setLife(int $life)
    {
        if ($life < 0) {
            $life = 0;
        }
        $this->life = $life;
    }

    public function isAlive(): bool
    {
        return $this->getLife() > 0;
    }

    /**
     * Get the value of strength
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * Set the value of strength
     *
     */
    public function setStrength($strength): void
    {
        $this->strength = $strength;
    }

    /**
     * Get the value of dexterity
     */
    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    /**
     * Set the value of dexterity
     *
     */
    public function setDexterity($dexterity): void
    {
        $this->dexterity = $dexterity;
    }
}
