<?php
class unit
{
    private $id;
    private $name;

    public function __construct($id_, $name_)
    {
        $this->id = $id_;
        $this->name = $name_;
    }

    // Getters
    public function getUnitId()
    {
        return $this->id;
    }

    public function getUnitName()
    {
        return $this->name;
    }

    // Setters
    public function setUnitId($id)
    {
        $this->id = $id;
    }

    public function setUnitName($name)
    {
        $this->name = $name;
    }
}


?>