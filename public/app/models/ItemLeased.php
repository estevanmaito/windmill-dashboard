<?php
namespace app\models;

require "vendor/autoload.php";

use \app\models\Model;
use PDO;

class ItemLeased extends Model
{
    // private $id;
    private $item_id;
    private $renter_id;
    private $time_from;
    private $time_to;
    private $unit_id;
    private $price_per_unit;
    private $discount;
    private $fee;
    private $price_total;
    private $rentier_grade_description;



    // Getters

    public function getItemLeasedId()
    {
        return $this->id;
    }

    public function getItemId()
    {
        return $this->item_id;
    }

    public function getRenterId()
    {
        return $this->renter_id;
    }

    public function getTimeFrom()
    {
        return $this->time_from;
    }

    public function getTimeTo()
    {
        return $this->time_to;
    }

    public function getItemLeasedUnitId()
    {
        return $this->unit_id;
    }

    public function getPricePerUnit()
    {
        return $this->price_per_unit;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getFee()
    {
        return $this->fee;
    }

    public function getPriceTotal()
    {
        return $this->price_total;
    }

    public function getRentierGradeDescription()
    {
        return $this->rentier_grade_description;
    }

    // Setters
    
    // public function setItemLeasedId($id)
    // {
    //     $this->id = $id;
    // }

    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
    }

    public function setRenterId($renter_id)
    {
        $this->renter_id = $renter_id;
    }

    public function setTimeFrom($time_from)
    {
        $this->time_from = $time_from;
    }

    public function setTimeTo($time_to)
    {
        $this->time_to = $time_to;
    }

    public function setItemLeasedUnitId($unit_id)
    {
        $this->unit_id = $unit_id;
    }

    public function setPricePerUnit($price_per_unit)
    {
        $this->price_per_unit = $price_per_unit;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    public function setPriceTotal($price_total)
    {
        $this->price_total = $price_total;
    }

    public function setRentierGradeDescription($rentier_grade_description)
    {
        $this->rentier_grade_description = $rentier_grade_description;
    }

    public static function latestItemLeased($leftLimit = '',$rightLimit ='')
    {
        // Perform a database query to retrieve the latest items
        $comm = 'SELECT IL.id, I.item_name, U.username, IL.time_from, IL.time_to, IL.price_total
         FROM item_leased IL
            INNER JOIN item I ON IL.item_id = I.id
            INNER JOIN user_account U  ON IL.renter_id = U.id
            WHERE NOW() < IL.time_to';

        if(!empty($rightLimit) || !empty($leftLimit)  )
        {
            $comm .= ' LIMIT '.$leftLimit.', '.$rightLimit ;
        }
        $statement = static::database()->query($comm);

        return  $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function findItemLeased( $searchType, $searchValue)
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
        $statement = static::database()->prepare('SELECT IL.id, I.item_name, U.username, IL.time_from, IL.time_to, IL.Price_total
        FROM item_leased IL
           INNER JOIN item I ON IL.item_id = I.id
           INNER JOIN user_account U  ON IL.renter_id = U.id
           WHERE ' . $search . ' LIKE :search_value
           &&  NOW() < IL.time_to;');

        // Bind the value of the search_value parameter to the corresponding placeholder in the query
        $statement->bindValue(':search_value', $searchValue);

        // Execute the prepared statement
        $statement->execute();

        // Fetch all rows as an array of objects of the current class and return the result
        return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function TimeDifference($dateTo)
    {
        $currentDateTime = new \DateTime();
        $dateTimeTo = new \DateTime($dateTo);

        // Calculate the difference between the two dates
        $dateInterval = $dateTimeTo->diff($currentDateTime);

        // Get the difference in days, hours, minutes, and seconds
        return $dateInterval->days;
    }

    function TimePercentage($startDate, $endDate) {
        // Create DateTime objects for the provided start and end dates
        $dateTimeFrom = new \DateTime($startDate);
        $dateTimeTo = new \DateTime($endDate);
    
        // Get the current DateTime
        $currentDateTime = new \DateTime();
    
        // Calculate the time difference in seconds between the start date and the current date
        $timeDifference = $currentDateTime->getTimestamp() - $dateTimeFrom->getTimestamp();
    
        // Calculate the total time difference in seconds between the start and end dates
        $totalTimeDifference = $dateTimeTo->getTimestamp() - $dateTimeFrom->getTimestamp();
    
        // Calculate the percentage
        $percentage = ($timeDifference / $totalTimeDifference) * 100;
    
        return number_format($percentage, 2);
    }
    
}

?>