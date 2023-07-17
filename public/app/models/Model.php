<?php
namespace app\models;

use PDO;

class Model
{
    protected $id;
    protected static $db;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public static function database()
{
    // Check if the database instance is already created
    if (is_null(static::$db)) {
        // If not, create a new PDO instance and assign it to the static property
        static::$db = new PDO('mysql:dbname=SAM;host=localhost', "root", "");
    }
    
    // Return the database instance
    return static::$db;
}

public function destroy($table, $id)
{
    // Prepare the SQL statement with a placeholder for the ID value
    $statement = static::database()->prepare("DELETE FROM ".$table." WHERE id = ?");

    // Execute the prepared statement with the actual ID value
    return $statement->execute([$id]);
}

public static function length($table , $key = NULL)
{
    // Execute a query to count the number of rows in the specified table

    if($key != NULL)
    {
        $requete = static::database()->query('SELECT COUNT(*) FROM '.$table.' WHERE role_id = '. $key);
    }
    else {
        $requete = static::database()->query('SELECT COUNT(*) FROM '.$table );
    }
    
    // Fetch the result of the query and return the count
    return $requete->fetch()['COUNT(*)'];
}



}
