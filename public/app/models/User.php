<?php
namespace app\models;

// Reste du code de la classe User

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
/*
  public static function latest( $cond = NULL )
  {
      return static::database()->query('SELECT U.username, U.email, I.item_name FROM user_account U INNER JOIN item I ON U.id = I.owner_id')
          ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
  }*/
  
  public static function latest( $table  )
  {
      return static::database()->query('SELECT * FROM '.$table.' ORDER BY id DESC')
          ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
  }

  public function getLimitProducts($leftLimit, $rightLimit) 
  {
    
    $sql = "SELECT * FROM user_account LIMIT :leftLimit, :rightLimit";
    $stmt = static::database()->prepare($sql);
    $stmt->bindValue(":leftLimit", $leftLimit, PDO::PARAM_INT);
    $stmt->bindValue(":rightLimit", $rightLimit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
   }

  public function create()
  {
      $statement = static::database()->prepare( " INSERT INTO `user_account` (`id`, `username`, `password`, `location_id`, 
      `location_details`, `phone`, `mobile`, `email`, `registration_time`)  VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)" );
      return $statement->execute([$this->username, $this->password, $this->location_id, 
      $this->location_details, $this->phone, $this->mobile , $this->email, $this->registration_time] );
  }
/*
  public static function retrieve($id){
    return static::view('user_account',$id);
  }
    */

    public static function view( $id)
    {
        $sqlstate = static::database()->prepare( "SELECT * FROM  user_account WHERE id = ?" );
        $sqlstate->execute([$id] );
        return current($sqlstate->fetchAll( PDO::FETCH_CLASS, __CLASS__));
    }

    //public static function update($id,$username,$password,$location_id,$location_details,$phone,$mobile,$email)
    
    public function update($id)
    {
        $statement = static::database()->prepare("UPDATE user_account SET username = ?, password = ?, location_id = ?,
         location_details = ?, phone = ?, mobile = ?, email = ?, registration_time = ? WHERE id = ".$id);
        $parameters = [$this->username, $this->password, $this->location_id, $this->location_details,
         $this->phone, $this->mobile, $this->email, $this->registration_time];
        return $statement->execute($parameters);

    }
/*
    public function destroy($id)
    {
        $statement = static::database()->prepare("DELETE FROM user_account WHERE id = ?");
        return $statement->execute([$id] );
    }*/



/*
    public function find($username)
    {
        $statement = static::database()->prepare('SELECT U.username, U.email, I.item_name FROM user_account U INNER JOIN item I ON U.id = I.owner_id WHERE username LIKE :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }*/
    
    public function find($table,$username)
    {
        $statement = static::database()->prepare('SELECT * FROM  '.$table.'  WHERE username LIKE :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    

} 
// $user = new User();
// var_dump($user->latest('user_account'));
?>
