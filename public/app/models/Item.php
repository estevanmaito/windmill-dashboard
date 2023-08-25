<?php
namespace app\models;

require "vendor/autoload.php";

use \app\models\Model;

use PDO;

class Item extends Model
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
    private $titrePropriete;

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

    public function getItemTitle()
    {
        return $this->titrePropriete;
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

    public function setItemTitle($titrePropriete)
    {
         $this->titrePropriete = $titrePropriete;
    }

    public static function latestItem($leftLimit = '' ,$rightLimit ='')
    {
        // Perform a database query to retrieve the latest items
        $comm = 'SELECT I.id, I.item_name, It.type_name, l.name, I.item_location, I.description,
            U.username, I.price_per_unit, Un.unit_name, I.avaible FROM user_account U 
            INNER JOIN item I ON I.owner_id = U.id 
            INNER JOIN item_type It ON I.item_type_id = It.id 
            INNER JOIN location l ON I.location_id = l.id 
            INNER JOIN unit Un ON I.unit_id = Un.id';
        if(!empty($rightLimit) || !empty($leftLimit) )
        {
            $comm .= ' LIMIT '.$leftLimit.', '.$rightLimit ;
        }
        $statement = static::database()->query($comm);

        return  $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
    
    public function createItem()
    {
        // Prepare the SQL statement with placeholders for values
        $statement = static::database()->prepare("INSERT INTO `item` (`id`, `item_name`, `item_type_id`, `location_id`, 
            `item_location`, `description`, `owner_id`, `price_per_unit`, `unit_id` , `titrePropriete`) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
        // Execute the prepared statement with the actual values
        return $statement->execute([$this->item_name, $this->item_type_id, $this->location_id, $this->item_location, 
            $this->description, $this->owner_id, $this->price_per_unit, $this->unit_id , $this->titrePropriete]);
    }

    public static function viewItem($id)
    {
        // Prepare the SQL statement to select a record from the "user_account" table based on the given id
        $sqlstate = static::database()->prepare("SELECT * FROM item WHERE id = ?");
        
        // Execute the prepared statement with the provided id
        $sqlstate->execute([$id]);
        
        // Fetch the result as an array of objects of the current class and return the first element
        return current($sqlstate->fetchAll(PDO::FETCH_CLASS, __CLASS__));
    }
    
    public function updateItem($id)
    {
        // Prepare the SQL statement with placeholders for values
        $statement = static::database()->prepare("UPDATE item SET item_name = ?, item_type_id = ?, location_id = ?, 
            item_location = ?, description = ?, owner_id = ?, price_per_unit = ?, unit_id = ?, avaible = ? WHERE id = ".$id);

        // Create an array of parameters containing the updated values
        $parameters = [
            $this->item_name, 
            $this->item_type_id, 
            $this->location_id, 
            $this->item_location, 
            $this->description, 
            $this->owner_id, 
            $this->price_per_unit, 
            $this->unit_id, 
            $this->avaible
        ];

        // Execute the prepared statement with the actual values
        return $statement->execute($parameters);
    }

    public function findItem( $searchType, $searchValue)
    {
        // Define the allowed search types (you can customize this as needed)
        $allowedSearchTypes = ['id', 'item_name' ];
        $search = $searchType == 'username' ? 'item_name' : $searchType ;
        // Validate the search type parameter
        if (!in_array($search, $allowedSearchTypes)) 
        {
            var_dump('nothing');
            // throw new InvalidArgumentException('Invalid search type. Allowed types: ' . implode(', ', $allowedSearchTypes));
        }

        // Prepare the SQL statement to select records from the specified table where the search type matches the provided value
        $statement = static::database()->prepare('SELECT I.id, I.item_name, It.type_name, l.name, I.item_location, I.description,
        U.username, I.price_per_unit, Un.unit_name, I.avaible FROM user_account U 
        INNER JOIN item I ON I.owner_id = U.id 
        INNER JOIN item_type It ON I.item_type_id = It.id 
        INNER JOIN location l ON I.location_id = l.id 
        INNER JOIN unit Un ON I.unit_id = Un.id WHERE ' . $search . ' LIKE :search_value');

        // Bind the value of the search_value parameter to the corresponding placeholder in the query
        $statement->bindValue(':search_value', $searchValue);

        // Execute the prepared statement
        $statement->execute();

        // Fetch all rows as an array of objects of the current class and return the result
        return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public  function statut($id)
    {
        $statement = static::database()->prepare('SELECT * FROM item I
            INNER JOIN item_leased Il ON I.id = Il.item_id
            WHERE I.id = :id AND Il.time_to >= CURRENT_DATE;'); // Adding the WHERE condition based on the provided $id
        $statement->bindParam(':id', $id, PDO::PARAM_INT); // Binding the $id parameter
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetching the results as an associative array
        return $result;
    }

    // public static function fetch_data($id) 
    // {
    //     $db = static::database(); // Get the database connection.

    //     $query = "SELECT I.item_name, I.description, Il.price_total 
    //             FROM item I
    //             INNER JOIN item_leased Il ON I.id = Il.item_id
    //             WHERE I.id = :id"; // SQL query to fetch data.

    //     $stmt = $db->prepare($query);
    //     $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    //     $exec = $stmt->execute();

    //     if ($exec) {
    //         $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $row;
    //     } else {
    //         return [];
    //     }
    // }

    public static function fetch_data($id) 
    {
        $db = static::database(); // Get the database connection.

        $query = "SELECT item_name, description, price_per_unit 
                FROM item 
                WHERE id = :id"; // SQL query to fetch data.

        $stmt = $db->prepare($query); // Prepare the SQL query.
        $stmt->execute(['id' => $id]); // Execute the prepared statement with the 'id' parameter.

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return the fetched data as an associative array.
    }

    public static function fetch_latest_data($id) 
    {
        $db = static::database(); // Get the database connection.

        $query = "SELECT time_from, time_to, price_total 
                FROM item_leased 
                WHERE item_id = :id
                ORDER BY time_to DESC
                "; // SQL query to fetch the latest data for the item.

        $stmt = $db->prepare($query); // Prepare the SQL query.
        $stmt->execute(['id' => $id]); // Execute the prepared statement with the 'id' parameter.

        return ($stmt->fetch(PDO::FETCH_ASSOC)); // Return the fetched data as an associative array.
    }


}


// $item = new Item();
// $itemLatestData = $item::fetch_latest_data(1); // <-- Corrected the variable name from $itme to $item
// var_dump( $itemLatestData) ;
// if ($itemLatestData !== null) {
 
//         $responseData = array(
//                         'name' => $itemLatestData['time_from'], // Assuming the 'username' field is in the first row of the returned data
//                         'phone' => $itemLatestData['time_to'],  
//                         'd' => $itemLatestData['price_total'],   
//                           // Assuming the 'email' field is in the first row of the returned data
//                         // Add more properties as needed
//                     );

//                     var_dump($responseData );
// }





?>

