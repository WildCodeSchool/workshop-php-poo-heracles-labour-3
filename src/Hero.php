<?php

namespace App;

use App\Shield;
use App\Weapon;

class Hero
{
    private string $name = 'Heracles';

    private string $hair = '#ca745a';

    private ?Weapon $weapon = null;

    private ?Shield $shield = null;

    private int $strength = 10;

    private int $dexterity = 10;

    private int $life = 100;

    /**
     * Get the value of hair
     */
    public function getHair()
    {
        return $this->hair;
    }

    /**
     * Set the value of hair
     *
     * @return  self
     */
    public function setHair($hair)
    {
        $this->hair = $hair;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }



    public function render()
    {
        return 'assets/images/hercules_flat.svg';
    }

    /**
     * Get the value of strength
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set the value of strength
     *
     * @return  self
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    public function getAttack(): int
    {
        $attack = $this->getStrength();

        // if ($this->getWeapon() instanceof Weapon) {
        //     $attack += $this->getWeapon()->getDamage();
        // }

        return $attack;
    }


    public function getDefense(): int
    {
        $defense = $this->getDexterity();

        // if ($this->getShield() instanceof Shield) {
        //     $defense += $this->getShield()->getProtection();
        // }
        return $defense;
    }

    /**
     * Get the value of dexterity
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * Set the value of dexterity
     *
     * @return  self
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    /**
     * Get the value of life
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     * @return  self
     */
    public function setLife($life)
    {
        $this->life = $life;

        return $this;
    }

    /**
     * Get the value of weapon
     */
    public function getWeapon()
    {
        return $this->weapon;
    }

    /**
     * Set the value of weapon
     *
     * @return  self
     */
    public function setWeapon($weapon)
    {
        $this->weapon = $weapon;

        return $this;
    }

    /**
     * Get the value of shield
     */
    public function getShield()
    {
        return $this->shield;
    }

    /**
     * Set the value of shield
     *
     * @return  self
     */
    public function setShield($shield)
    {
        $this->shield = $shield;

        return $this;
    }
}
