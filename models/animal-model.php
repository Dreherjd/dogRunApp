<?php 
class animal{
    private $animal_id;
    private $name;
    private $species;
    private $breed;
    private $color;
    private $special_needs;
    private $markings;
    private $fixed;
    private $gender;
    private $darter;
    private $remain_caged;
    private $notes;
    
    /**
     * Get the value of animal_id
     */ 
    public function getAnimal_id()
    {
        return $this->animal_id;
    }

    /**
     * Set the value of animal_id
     *
     * @return  self
     */ 
    public function setAnimal_id($animal_id)
    {
        $this->animal_id = $animal_id;

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

    /**
     * Get the value of species
     */ 
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * Set the value of species
     *
     * @return  self
     */ 
    public function setSpecies($species)
    {
        $this->species = $species;

        return $this;
    }

    /**
     * Get the value of breed
     */ 
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set the value of breed
     *
     * @return  self
     */ 
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of special_needs
     */ 
    public function getSpecial_needs()
    {
        return $this->special_needs;
    }

    /**
     * Set the value of special_needs
     *
     * @return  self
     */ 
    public function setSpecial_needs($special_needs)
    {
        $this->special_needs = $special_needs;

        return $this;
    }

    /**
     * Get the value of markings
     */ 
    public function getMarkings()
    {
        return $this->markings;
    }

    /**
     * Set the value of markings
     *
     * @return  self
     */ 
    public function setMarkings($markings)
    {
        $this->markings = $markings;

        return $this;
    }

    /**
     * Get the value of fixed
     */ 
    public function getFixed()
    {
        return $this->fixed;
    }

    /**
     * Set the value of fixed
     *
     * @return  self
     */ 
    public function setFixed($fixed)
    {
        $this->fixed = $fixed;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of darter
     */ 
    public function getDarter()
    {
        return $this->darter;
    }

    /**
     * Set the value of darter
     *
     * @return  self
     */ 
    public function setDarter($darter)
    {
        $this->darter = $darter;

        return $this;
    }

    /**
     * Get the value of remain_caged
     */ 
    public function getRemain_caged()
    {
        return $this->remain_caged;
    }

    /**
     * Set the value of remain_caged
     *
     * @return  self
     */ 
    public function setRemain_caged($remain_caged)
    {
        $this->remain_caged = $remain_caged;

        return $this;
    }

    /**
     * Get the value of notes
     */ 
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set the value of notes
     *
     * @return  self
     */ 
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }
}