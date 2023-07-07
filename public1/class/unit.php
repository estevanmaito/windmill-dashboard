<?php
class unit
{
    private $id;
    private $unit_name;

    public function __construct($id_, $unit_name_)
    {
        $this->id = $id_;
        $this->unit_name = $unit_name_;
    }

    // Getters
    public function getUnitId()
    {
        return $this->id;
    }

    public function getUnitName()
    {
        return $this->unit_name;
    }

    // Setters
    public function setUnitId($id)
    {
        $this->id = $id;
    }

    public function setUnitName($unit_name)
    {
        $this->unit_name = $unit_name;
    }
}


?>