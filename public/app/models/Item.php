<?php
namespace app\models;

// Reste du code de la classe User
require_once __DIR__ . '/Model.php';
use \app\models\Model;


use PDO;

class Item extends \app\models\Model
{
   // private $id;
    private $item_name;
    private $item_type_id;
    private $location_id;
    private $item_location;
    private $description;
    private $owner_id;
    private $price_per_unit;
    private $unit_id;
/*
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
    }*/

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

    public static function latestItem(  )
  {
      return static::database()->query('SELECT I.id , I.item_name, It.type_name, l.name , I.item_location , I.description ,
       U.username , I.price_per_unit , Un.unit_name , I.avaible FROM user_account U INNER JOIN item I ON I.owner_id  = U.id 
       INNER JOIN item_type It ON I.item_type_id  =  It.id INNER JOIN location l ON I.location_id = l.id 
       INNER JOIN unit Un ON I.unit_id = Un.id')
          ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
  }

    public function createItem()
    {
        $statement = static::database()->prepare( " INSERT INTO `item` (`id`, `item_name`, `item_type_id`, `location_id`, 
        `item_location`, `description`, `owner_id`, `price_per_unit`, `unit_id` )  VALUES (NULL,  ?, ?, ?, ?, ?, ?, ?, ?)" );
        return $statement->execute([$this->item_name, $this->item_type_id, $this->location_id, $this->item_location, 
        $this->description, $this->owner_id , $this->price_per_unit, $this->unit_id] );
  
    }

    public function updateItem($id)
    {
        $statement = static::database()->prepare("UPDATE item SET item_name = ?, item_type_id = ?, location_id = ?,
         item_location = ?, description = ?, owner_id = ?, price_per_unit = ?, unit_id = ?, avaible= ? WHERE id = ".$id);
        $parameters = [$this->item_name, $this->item_type_id, $this->location_id, $this->item_location, 
        $this->description, $this->owner_id , $this->price_per_unit, $this->unit_id, $this->avaible];
        return $statement->execute($parameters);
    }

}

    // $item = new Item();
    // $item->latestItem();
    
/*
// Use the setters to set the properties of the item
$item->setItemName('Example Item');
$item->setItemTypeId(1);
$item->setItemLocationId(2);
$item->setItemLocation('Example Location');
$item->setItemDescription('This is an example item');
$item->setOwnerId(3);
$item->setPricePerUnit(10.99);
$item->setItemUnitId(4);
//$item->setAvailable(true);

// Call the createItem() function
$result = $item->createItem();

// Check the result
if ($result) {
    echo "Item created successfully!";
} else {
    echo "Failed to create item.";
}*/


?>

