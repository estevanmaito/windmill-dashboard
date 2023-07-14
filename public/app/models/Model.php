<?php
namespace app\models;

// Reste du code de la classe User


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
        if (is_null(static::$db)) {
            static::$db = new PDO('mysql:dbname=SAM;host=localhost', "root", "");
        }
        return static::$db;
    }

   /* public static function view($table,$id)
    {
        $sqlstate = static::database()->prepare( "SELECT * FROM  ".$table." WHERE id = ?" );
        $sqlstate->execute([$id] );
        return current($sqlstate->fetchAll( PDO::FETCH_CLASS, __CLASS__));
    }*/

    public function destroy($table,$id)
    {
        $statement = static::database()->prepare("DELETE FROM ".$table." WHERE id = ?");
        return $statement->execute([$id] );
    }
    
    public static function length($table)
    {
        $requete = static::database()->query('SELECT COUNT(*) FROM '.$table);
        return $requete->fetch()['COUNT(*)'];
/*
        $resultat=mysql_fetch_row($result);
        echo $resultat[0];
*/
    }
    // public static function view($table , $id)
    // {
    //     $sqlstate = static::database()->prepare( "SELECT * FROM  ".$table." WHERE id = ?" );
    //     $sqlstate->execute([$id] );
    //     return current($sqlstate->fetchAll( PDO::FETCH_CLASS, __CLASS__));
    // }

}
