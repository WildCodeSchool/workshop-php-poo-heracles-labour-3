<?php

namespace App;

class Shield
{
    private int $protection = 10; 

    public function render(): string
    {
        return 'assets/images/shield.svg';
    }

    /**
     * Get the value of protection
     */ 
    public function getProtection()
    {
        return $this->protection;
    }

    /**
     * Set the value of protection
     *
     * @return  self
     */ 
    public function setProtection($protection)
    {
        $this->protection = $protection;

        return $this;
    }
}