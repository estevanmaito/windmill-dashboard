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

    public static function latest($table)
    {
        // Execute a query to fetch the latest records from the specified table
        return static::database()->query('SELECT * FROM '.$table.' ORDER BY id DESC')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
    

    public function destroy($table, $id)
    {
        // Prepare the SQL statement with a placeholder for the ID value
        $statement = static::database()->prepare("DELETE FROM ".$table." WHERE id = ?");

        // Execute the prepared statement with the actual ID value
        return $statement->execute([$id]);
    }

    public static function length($table , $key = NULL )
    {
        // Execute a query to count the number of rows in the specified table

        $comm = 'SELECT COUNT(*) FROM '.$table ;
        if(!empty($key) )
        {
            $comm .=' WHERE role_id = '. $key;
        }    
        
        $requete = static::database()->query($comm);
        // Fetch the result of the query and return the count
        return $requete->fetch()['COUNT(*)'];
    }

    public static function SelectInputs($referencedTable , $column , $cond = NULL)
    {
        $query = 'SELECT '. $column .' , id FROM ' . $referencedTable;
        if(!empty($cond))
        {
            $query .= ' WHERE  '.$cond ;
        }
         $statement = static::database()->prepare($query );
        
        
        // Execute the prepared statement
        $statement->execute();
            
        // Fetch all rows as an array of objects of the current class and return the result
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }



}
