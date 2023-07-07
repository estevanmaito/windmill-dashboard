<?php
namespace public\app\models;
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
}
