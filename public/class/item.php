<?php
class item
{
    private $id;
    private $item_name;
    private $item_type_id;
    private $location_id;
    private $item_location;
    private $description;
    private $owner_id;
    private $price_per_unit;
    private $unit_id;

    public function __construct($id_, $item_name_, $item_type_id_, $location_id_, $item_location_, $description_, $owner_id_, $price_per_unit_, $unit_id_)
    {
        $this->id = $id_;
        $this->item_name = $item_name_;
        $this->item_type_id = $item_type_id_;
        $this->location_id = $location_id_;
        $this->item_location = $item_location_;
        $this->description = $description_;
        $this->owner_id = $owner_id_;
        $this->price_per_unit = $price_per_unit_;
        $this->unit_id = $unit_id_;
    }

    // Getters
    public function getItemId()
    {
        return $this->id;
    }

    public function getItemName()
    {
        return $this->item_name;
    }

    public function getItemTypeId()
    {
        return $this->item_type_id;
    }

    public function getItemLocationId()
    {
        return $this->location_id;
    }

    public function getItemLocation()
    {
        return $this->item_location;
    }

    public function getItemDescription()
    {
        return $this->description;
    }

    public function getOwnerId()
    {
        return $this->owner_id;
    }

    public function getPricePerUnit()
    {
        return $this->price_per_unit;
    }

    public function getItemUnitId()
    {
        return $this->unit_id;
    }

    // Setters
    public function setItemId($id)
    {
        $this->id = $id;
    }

    public function setItemName($item_name)
    {
        $this->item_name = $item_name;
    }

    public function setItemTypeId($item_type_id)
    {
        $this->item_type_id = $item_type_id;
    }

    public function setItemLocationId($location_id)
    {
        $this->location_id = $location_id;
    }

    public function setItemLocation($item_location)
    {
        $this->item_location = $item_location;
    }

    public function setItemDescription($description)
    {
        $this->description = $description;
    }

    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
    }

    public function setPricePerUnit($price_per_unit)
    {
        $this->price_per_unit = $price_per_unit;
    }

    public function setItemUnitId($unit_id)
    {
        $this->unit_id = $unit_id;
    }
}

?>
