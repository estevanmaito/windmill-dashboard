<?php
namespace app\controllers ;
// Include the necessary files
require "vendor/autoload.php";


// Use the User class from the app\models namespace
use \app\models\ItemLeased;

class DashController extends BaseController
{
    public static function getModelItemLeased()
    {
        // Check if the model instance is null
        if (is_null(static::$model)) {
            // Create a new instance of the Item model
            static::$model = new ItemLeased();
        }
        return static::$model;
    }

    public static function dashFile()
    {
        $itemLeased = static::getModelItemLeased()->latestItemLeased();
        static::requir("dashboard", $itemLeased);

    }

  
}

?>

