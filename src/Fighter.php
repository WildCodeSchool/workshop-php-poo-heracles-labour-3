<?php

class Fighter
{
    public const MAX_LIFE = 100;

    private string $name;
    private string $icon;

    private int $strength;
    private int $dexterity;

    private int $life = self::MAX_LIFE;

    public function __construct(string $name, string $icon, int $strength = 10, int $dexterity = 5)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    public function render()
    {
        return 'assets/images/hercules_flat.svg';
    }


    public function getDamage(): int
    {
        $damage = rand(1, $this->getStrength());

        return $damage;
    }

    public function fight(Fighter $adversary): void
    {
        $damage = $this->getDamage() - $adversary->getDefense();
        if ($damage < 0) {
            $damage = 0;
        }
        $adversary->setLife($adversary->getLife() - $damage);
    }

    public function getDefense(): int
    {
        $defense = $this->getDexterity();

        return $defense;
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

    public function isDead(): bool
    {
        return $this->getLife() <= 0;
    }

    /**
     * Get the value of icon
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set the value of icon
     *
     * @return  self
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
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
}
