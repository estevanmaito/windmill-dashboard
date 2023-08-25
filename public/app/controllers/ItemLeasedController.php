<?php
namespace app\controllers ;
// Include the necessary files
require "vendor/autoload.php";


// Use the User class from the app\models namespace
use \app\models\ItemLeased;


class ItemLeasedController  extends BaseController
{
    private static $productsPerPage = 3;

    public static function getModelItemLeased()
    {
        // Check if the model instance is null
        if (is_null(static::$model)) {
            // Create a new instance of the Item model
            static::$model = new ItemLeased();
        }
        return static::$model;
    }
    public static function makeItemLeasedProductPager()
    {
        // Get the total number of pages
        $totalPages = static::lengthActionItemLeased();
    
        // Check the value of the 'page' parameter in the URL
        if (!isset($_GET['page']) || intval($_GET['page']) == 0 || intval($_GET['page']) == 1 || intval($_GET['page']) < 0) {
            // If 'page' parameter is not set or is invalid, set the page number to 1
            $pageNumber = 1;
            $leftLimit = 0;
            $rightLimit = static::$productsPerPage; // Set the limit based on the number of products per page
        } elseif (intval($_GET['page']) > $totalPages || intval($_GET['page']) == $totalPages) {
            // If 'page' parameter is greater than the total number of pages, set the page number to the last page
            $pageNumber = $totalPages;
            $leftLimit = static::$productsPerPage * ($pageNumber - 1);
            $rightLimit = $leftLimit + static::$productsPerPage; // Variable $allProducts is undefined, you might need to define it
        } else {
            // If 'page' parameter is valid, set the page number based on the value in the URL
            $pageNumber = intval($_GET['page']);
            $leftLimit = static::$productsPerPage * ($pageNumber - 1);
            $rightLimit = static::$productsPerPage;
        }
        
        // Call the 'getLimitProducts()' method of the model to fetch the products within the specified limits
        return static::getModelItemLeased()->latestItemLeased($leftLimit, $rightLimit);
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
            // Retrieve the leased items using the fetchLeasedItems function
            $itemLeased = static::makeItemLeasedProductPager();
        }
        
        if (empty($itemLeased)) {
            // If no leased items are found, retrieve the latest itemLeased
            $itemLeased = static::makeItemLeasedProductPager();
        }
    
        // Render the view "ItemLeased/itemLeasedList" and pass the itemLeased as data
        static::requir("ItemLeased/itemLeasedList", $itemLeased);
    }
    
    public static function lengthActionItemLeased()
    {
        // Retrieve the length of the "item" table
        return static::getModelItemLeased()->length('item_leased' , ' NOW() < time_to;');
    }

    public static function CountNewItemLeased()
    {
        // Retrieve the length of the "item" table
        return static::getModelItemLeased()->countNewIU('item_leased' , ' time_from ');
    }



}