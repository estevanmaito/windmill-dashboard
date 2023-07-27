<?php
namespace app\models;

require "vendor/autoload.php";

use \app\models\Model;

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

  public function getLimitProducts($leftLimit, $rightLimit , $key) 
  {
      // Construct the SQL query with placeholders for left and right limit values
      $sql = "SELECT * FROM user_account WHERE role_id = ".$key." LIMIT ".$leftLimit.", ".$rightLimit;
      
      // Prepare the SQL statement
      $stmt = static::database()->prepare($sql);
      
      // Execute the prepared statement
      $stmt->execute();
      
      // Fetch all rows as an array of objects of the current class
      return $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
  }

//   public function getLimitProducts($leftLimit, $rightLimit , $key) 
//   {
//       // Construct the SQL query with placeholders for left and right limit values
//       $sql = "SELECT U.username, U.password, L.name, U.phone, U.mobile, U.email, U.registration_time
//         FROM user_account U
//         INNER JOIN location L ON U.location_id = L.id
//         WHERE U.role_id = " . $key . "
//         LIMIT " . $leftLimit . ", " . $rightLimit;

//       // Prepare the SQL statement
//       $stmt = static::database()->prepare($sql);  
      
//       // Execute the prepared statement
//       $stmt->execute();
      
//       // Fetch all rows as an array of objects of the current class
//       return $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
//   }


  public function create()
  {
      // Prepare the SQL statement with placeholders for values
      $statement = static::database()->prepare("INSERT INTO `user_account` (`id`, `username`, `password`, `location_id`, 
      `phone`, `mobile`, `email`, `registration_time`, `role_id`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
      
      // Execute the prepared statement with the corresponding values
      return $statement->execute([$this->username, $this->password, $this->location_id, 
       $this->phone, $this->mobile , $this->email , $this->registration_time, $this->role_id]);
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
         phone = ?, mobile = ?, email = ?, registration_time = ?, role_id = ? WHERE id = " . $id);
        
        // Prepare an array of parameters with the values to be updated
        $parameters = [$this->username, $this->password, $this->location_id, 
        $this->phone, $this->mobile, $this->email, $this->registration_time, $this->role_id];
        
        // Execute the prepared statement with the parameters
        return $statement->execute($parameters);
    }

    // public function find($table, $username)
    // {
    //     // Prepare the SQL statement to select records from the specified table where the username matches the provided value
    //     $statement = static::database()->prepare('SELECT * FROM ' . $table . ' WHERE username LIKE :username');
        
    //     // Bind the value of the username parameter to the corresponding placeholder in the query
    //     $statement->bindValue(':username', $username);
        
    //     // Execute the prepared statement
    //     $statement->execute();
        
    //     // Fetch all rows as an array of objects of the current class and return the result
    //     return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    // }   
    public function find($table, $searchType, $searchValue)
    {
        // Define the allowed search types (you can customize this as needed)
        $allowedSearchTypes = ['id', 'username'];
    
        // Validate the search type parameter
        if (!in_array($searchType, $allowedSearchTypes)) {
            var_dump('nothing');
            // throw new InvalidArgumentException('Invalid search type. Allowed types: ' . implode(', ', $allowedSearchTypes));
        }
    
        // Prepare the SQL statement to select records from the specified table where the search type matches the provided value
        $statement = static::database()->prepare('SELECT * FROM ' . $table . ' WHERE ' . $searchType . ' LIKE :search_value');
    
        // Bind the value of the search_value parameter to the corresponding placeholder in the query
        $statement->bindValue(':search_value', $searchValue);
    
        // Execute the prepared statement
        $statement->execute();
    
        // Fetch all rows as an array of objects of the current class and return the result
        return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
    


    // Function to retrieve the referenced table from a foreign key column
//     public static function retrieveTable($column, $table)
//     {
//         $conn = static::database();
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         $query = "SELECT REFERENCED_TABLE_NAME
//                   FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
//                   WHERE TABLE_NAME = :tableName
//                   AND COLUMN_NAME = :column
//                   AND REFERENCED_TABLE_NAME IS NOT NULL";

//         $stmt = $conn->prepare($query);
//         $stmt->bindParam(':tableName', $table, PDO::PARAM_STR);
//         $stmt->bindParam(':column', $column, PDO::PARAM_STR);
//         var_dump($stmt->execute());

//         var_dump( $result = $stmt->fetch(PDO::FETCH_ASSOC));

//         if ($result && var_dump(isset($result['REFERENCED_TABLE_NAME']))) {
//             return $result['REFERENCED_TABLE_NAME'];
//         } else {
//             return null;
//         }
//     }

//     public static function SelectJoin($column, $table)
//     {
//         $referencedTable = static::retrieveTable($column, $table);

//         if ($referencedTable) {
//             $statement = static::database()->prepare('SELECT ' . $referencedTable . '.name FROM ' . $table . ' INNER JOIN ' . $referencedTable . ' ON ' . $table . '.' . $column . ' = ' . $referencedTable . '.id');

//         // Execute the prepared statement
//         $statement->execute();
        
//         // Fetch all rows as an array of objects of the current class and return the result
//         return $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
//         } else {
//             echo "The column '$column' is not a foreign key.";
//         }
//     }


}

// $user = new User();
// $user->SelectJoin('location_id ', 'user_account','location');
// foreach ($user as $row) {
//     echo $row['name'] . '<br>';
// }
