<?php
namespace public\app\models;
require 'Model.php' ;

use PDO;

class User extends Model
{
    private $username;
    private $password;
    private $location_id;
    private $location_details;
    private $phone;
    private $mobile;
    private $email;
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

  public function setRegistrationTime($registration_time)
  {
      $this->registration_time = $registration_time;
  }

  public static function latest( $cond = NULL )
  {
      return static::database()->query('SELECT U.username, U.email, I.item_name FROM user_account U INNER JOIN item I ON U.id = I.owner_id')
          ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
  }
  

    public function create()
    {
        $statement = static::database()->prepare( " INSERT INTO `user_account` (`id`, `username`, `password`, `location_id`, 
        `location_details`, `phone`, `mobile`, `email`, `registration_time`)  VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)" );
        return $statement->execute([$this->username, $this->password, $this->location_id, 
        $this->location_details, $this->phone, $this->mobile , $this->email, $this->registration_time] );
    }

    public static function view($id)
    {
        $sqlstate = static::database()->prepare( "SELECT * FROM  user_account WHERE id = ?" );
        $sqlstate->execute([$id] );
        return current($sqlstate->fetchAll( PDO::FETCH_CLASS, __CLASS__));
    }

    //public static function update($id,$username,$password,$location_id,$location_details,$phone,$mobile,$email)
    public function update($id)
    {
        $statement = static::database()->prepare( "UPDATE user_account SET username = ? , password = ? ,
        location_id = ? , location_details = ?, phone = ? , mobile = ? , email = ? , registration_time = ?
        WHERE id = ".$id );
        return $statement->execute([$this->username,$this->password, $this->location_id, 
        $this->location_details, $this->phone, $this->mobile , $this->email, $this->registration_time] );
    }

    public function destroy($id)
    {
        $statement = static::database()->prepare("DELETE FROM table_name WHERE id = ?");
        return $statement->execute([$id] );
    }

    public function find($username)
    {
        $statement = static::database()->prepare('SELECT U.username, U.email, I.item_name FROM user_account U INNER JOIN item I ON U.id = I.owner_id WHERE username LIKE :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
    

} 
?>
