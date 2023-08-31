<?php
namespace app\controllers ;
// Include the necessary files
require "vendor/autoload.php";


// Use the User class from the app\models namespace
use \app\models\Item;

class CalendarController extends BaseController
{
    public static function getModelItemClendar()
    {
        // Check if the model instance is null
        if (is_null(static::$model)) {
            // Create a new instance of the Item model
            static::$model = new Item();
        }
        return static::$model;
    }

    public static function calendarFile()
    {
        $item = static::getModelItemClendar()->latestItem();
        static::requir('Calendrier', $item);

    }

    public static function getData()
    {
        $item = static::getModelItemClendar();
        
    }
  
}

?>

