<?php
class location
{
    private $id;
    private $postal_code;
    private $name;
    private $description;
    private $country_id;

    public function __construct($id_, $postal_code_, $name_, $description_, $country_id_)
    {
        $this->id = $id_;
        $this->postal_code = $postal_code_;
        $this->name = $name_;
        $this->description = $description_;
        $this->country_id = $country_id_;
    }

    // Getters
    public function getLocationId()
    {
        return $this->id;
    }

    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function getLocationName()
    {
        return $this->name;
    }

    public function getLocationDescription()
    {
        return $this->description;
    }

    public function getCountryId()
    {
        return $this->country_id;
    }

    // Setters
    public function setLocationId($id)
    {
        $this->id = $id;
    }

    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    public function setLocationName($name)
    {
        $this->name = $name;
    }

    public function setLocationDescription($description)
    {
        $this->description = $description;
    }

    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;
    }
}


?>