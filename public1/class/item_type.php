<?php
class item_type
{
    private $id;
    private $type_name;

    public function __construct($id_, $type_name_)
    {
        $this->id = $id_;
        $this->type_name = $type_name_;
    }

    // Getters
    public function getItemTypeId()
    {
        return $this->id;
    }

    public function getTypeName()
    {
        return $this->type_name;
    }

    // Setters
    public function setItemTypeId($id)
    {
        $this->id = $id;
    }

    public function setTypeName($type_name)
    {
        $this->type_name = $type_name;
    }
}


?>