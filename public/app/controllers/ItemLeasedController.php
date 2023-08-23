<?php
namespace app\controllers ;
// Include the necessary files
require "vendor/autoload.php";


// Use the User class from the app\models namespace
use \app\models\ItemLeased;


class ItemLeasedController  extends BaseController
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

    public static function indexActionItemLeased()
    {
        // Retrieve the search input from the POST request
        $searchType = isset($_POST['search_type']) ? $_POST['search_type'] : null;
        $searchValue = isset($_POST['search']) ? $_POST['search'] : null;
        
        // Retrieve the request method
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($searchValue !== "" && $searchType !== "" && $requestMethod === 'POST') {
            // Search for itemLeased based on the provided search input
            $itemLeased = static::getModelItemLeased()->findItemLeased($searchType, $searchValue);
           
        } else {
            // Retrieve the latest itemLeased
            $itemLeased = static::getModelItemLeased()->latestItemLeased();
        }
        if(is_null($itemLeased))
        {
            $itemLeased = static::getModelItemLeased()->latestItemLeased();
        }

        // Render the view "ItemLeased/itemLeasedList" and pass the itemLeased as data
        static::requir("ItemLeased/itemLeasedList", $itemLeased);
    }

    public static function lengthActionItemLeased()
    {
        // Retrieve the length of the "item" table
        return static::getModelItemLeased()->length('item_leased');
    }

}