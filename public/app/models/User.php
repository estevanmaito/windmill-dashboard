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

    public static function latest()
    {
        return static::database()->query('SELECT * FROM user_account ORDER BY id DESC')
        ->fetchAll( PDO::FETCH_CLASS, __CLASS__);
    }

    public function create()
    {
        $statement = static::database()->prepare( "INSERT INTO user_account VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)" );
        return $statement->execute([$this->username, $this->password, $this->location_id, 
        $this->location_details, $this->phone, $this->mobile , $this->email, $this->registration_time] );
    }

} 
?>
