<?php 

namespace App;

class Armory
{
    protected int $protection;
    protected string $image;

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

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return 'assets/images/' . $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}