<?php
namespace app\models;

// Import the base Model class
require_once __DIR__ . '/Model.php';
use \app\models\Model;

use PDO;

class User extends \app\models\Model
{
    private $username;
    private $password;
    private $location_id;
    private $location_details;
    private $phone;
    private $mobile;
    private $email;
    private $role_id;
    private $registration_time;

    

  // Getters
   

  public function getUsername()
  {
      return $this->username;
  }

  public function getPassword()
  {
      return $this->password;
  }

  public function getUserLocationId()
  {
      return $this->location_id;
  }

  public function getLocationDetails()
  {
      return $this->location_details;
  }

  public function getPhone()
  {
      return $this->phone;
  }

  public function getMobile()
  {
      return $this->mobile;
  }

  public function getUserEmail()
  {
      return $this->email;
  }

  public function getRoleId()
  {
      return $this->role_id;
  }

  public function getRegistrationTime()
  {
      return $this->registration_time;
  }

  // Setters

  public function setUsername($username)
  {
      $this->username = $username;
  }

  public function setPassword($password)
  {
      $this->password = $password;
  }

  public function setUserLocationId($location_id)
  {
      $this->location_id = $location_id;
  }

  public function setLocationDetails($location_details)
  {
      $this->location_details = $location_details;
  }

  public function setPhone($phone)
  {
      $this->phone = $phone;
  }

  public function setMobile($mobile)
  {
      $this->mobile = $mobile;
  }

  public function setUserEmail($email)
  {
      $this->email = $email;
  }

  public function setRoleId($role_id)
  {
      $this->role_id = $role_id;
  }

  public function setRegistrationTime($registration_time)
  {
      $this->registration_time = $registration_time;
  }

  public static function latest($table)
  {
      // Execute a query to fetch the latest records from the specified table
      return static::database()->query('SELECT * FROM '.$table.' ORDER BY id DESC')
          ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
  }

  public function getLimitProducts($leftLimit, $rightLimit , $key) 
  {
      // Construct the SQL query with placeholders for left and right limit values
      $sql = "SELECT * FROM user_account WHERE role_id = ".$key." LIMIT ".$leftLimit.", ".$rightLimit;
      
      // Prepare the SQL statement
      $stmt = static::database()->prepare($sql);
      
      // Bind the leftLimit and rightLimit values to the placeholders in the query
     
      
      // Execute the prepared statement
      $stmt->execute();
      
      // Fetch all rows as an array of objects of the current class
      return $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
  }

  public function create()
  {
      // Prepare the SQL statement with placeholders for values
      $statement = static::database()->prepare("INSERT INTO `user_account` (`id`, `username`, `password`, `location_id`, 
      `location_details`, `phone`, `mobile`, `email`, `registration_time`, `role_id`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      
      // Execute the prepared statement with the corresponding values
      return $statement->execute([$this->username, $this->password, $this->location_id, 
      $this->location_details, $this->phone, $this->mobile , $this->email , $this->registration_time, $this->role_id]);
  }
  
  public static function view($id)
  {
      // Prepare the SQL statement to select a record from the "user_account" table based on the given id
      $sqlstate = static::database()->prepare("SELECT * FROM user_account WHERE id = ?");
      
      // Execute the prepared statement with the provided id
      $sqlstate->execute([$id]);
      
      // Fetch the result as an array of objects of the current class and return the first element
      return current($sqlstate->fetchAll(PDO::FETCH_CLASS, __CLASS__));
  }
      
    public function update($id)
    {
        // Prepare the SQL statement to update the "user_account" table based on the given id
        $statement = static::database()->prepare("UPDATE user_account SET username = ?, password = ?, location_id = ?,
        location_details = ?, phone = ?, mobile = ?, email = ?, registration_time = ?, role_id = ? WHERE id = " . $id);
        
        // Prepare an array of parameters with the values to be updated
        $parameters = [$this->username, $this->password, $this->location_id, $this->location_details,
        $this->phone, $this->mobile, $this->email, $this->registration_time, $this->role_id];
        
        // Execute the prepared statement with the parameters
        return $statement->execute($parameters);
    }

    public function find($table, $username)
    {
        // Prepare the SQL statement to select records from the specified table where the username matches the provided value
        $statement = static::database()->prepare('SELECT * FROM ' . $table . ' WHERE username LIKE :username');
        
        // Bind the value of the username parameter to the corresponding placeholder in the query
        $statement->bindValue(':username', $username);
        
        // Execute the prepared statement
        $statement->execute();
        
        // Fetch all rows as an array of objects of the current class and return the result
        return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }   



} 


?>
