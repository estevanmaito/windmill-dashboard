<?php
namespace app\controllers ;
// Include the necessary files
require "vendor/autoload.php";


// Use the User class from the app\models namespace
use \app\models\Item;


class ItemController  extends BaseController
{

    public static function getModelItem()
    {
        // Check if the model instance is null
        if (is_null(static::$model)) {
            // Create a new instance of the Item model
            static::$model = new Item();
        }
        return static::$model;
    }
    

    public static function indexActionItem()
    {
        // Retrieve the search input from the POST request
        $searchType = isset($_POST['search_type']) ? $_POST['search_type'] : null;
        $searchValue = isset($_POST['search']) ? $_POST['search'] : null;
        
        // Retrieve the request method
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($searchValue !== "" && $searchType !== "" && $requestMethod === 'POST') {
            // Search for items based on the provided search input
            $items = static::getModelItem()->findItem($searchType, $searchValue);
        } else {
            // Retrieve the latest items
            $items = static::getModelItem()->latestItem();
        }

        // Render the view "Items/propertyList" and pass the items as data
        static::requir("Items/propertyList", $items);
    }

    public static function lengthActionItem()
    {
        // Retrieve the length of the "item" table
        return static::getModelItem()->length('item');
    }

    public static function retrieveSettresItem()
    {
        $Item = static::getModelItem();

        // Set the properties of the user object using the values from the form inputs
        $Item->setItemName($_POST['name']);
        $Item->setItemTypeId($_POST['typeId']);
        $Item->setItemLocationId($_POST['locationId']);
        $Item->setItemLocation($_POST['itemLocation']);
        $Item->setItemDescription($_POST['description']);
        $Item->setOwnerId($_POST['ownerId']);
        $Item->setPricePerUnit($_POST['price']);
        $Item->setItemUnitId($_POST['unitId']);

        return $Item ;
    }

    public static function createActionItem()
    {
        static::requir("Items/createItem");
        
    }

    public static function storeActionItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $ItemCreated = static::retrieveSettresItem();
            $ItemCreated->createItem();
            if($ItemCreated >0){
                static::redirect('propertyList');
            }
            else{
                echo "Erreur";
            }

        }

    }

    public static function editActionItem()
    {
        $id=$_GET['id'];
        $item = self::getModelItem()::viewItem($id);
        static::requir('Items/editItem',$item);

    }

    public static function SelectOptionItem($referencedTable , $column ,  $cond = NULL )
    {
        
        return static::getModelItem()::SelectInputs($referencedTable, $column ,  $cond ) ;
    }

    public static function updateActionItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userUpdated = static::retrieveSettresItem();
            $userUpdated->updateItem($_POST['id']);
            if($userUpdated >0 ){
                static::redirect('propertyList');
            }
            else{
                echo "Erreur";
            }

        }

    }

    public static function destroyActionItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $userdeleted = static::getModelItem();
            $userdeleted->destroy('item',$_GET['id']);
            if($userdeleted >0 ){
                static::redirect('propertyList');
            }
            else{
                echo "Erreur";
            }

        }

    }

    public static function statutActionItem($id)
    {
        $statut = static::getModelItem()->statut($id);
        $etat = '';
    
        if ($statut) {
            // Assuming $statut contains the result from the database query
            // If you have a specific condition to check for "app", modify it accordingly
            $etat = '<span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">occupée<span>';
        }
        else
        {
            $etat = '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Disponible</span>';
        }
    
        return $etat;
    }

    public static function sendData($id)
    {
        $item = static::getModelItem() ;
        $itemData = $item::fetch_data($id);
        $itemLatestData = $item::fetch_latest_data($id);
    
        if ($itemData !== null)
        {
            // Prepare the data to be sent back in JSON format
            $responseData = array(
                'titre' => $itemData[0]['item_name'], 
                'desc' => $itemData[0]['description'], 
                'price' => $itemData[0]['price_per_unit'],   
            );

            if($itemLatestData !== null)
            {
                $responseData += array(
                    'from' => $itemLatestData['time_from'], 
                    'to' => $itemLatestData['time_to'], 
                    'lastprice' => $itemLatestData['price_total'],   
                );
            }

            $status = $item->statut($id);
            $responseData += array(
                'statut' => $status ? 'occupé' : 'disponible',
            );

            header('Content-Type: application/json');
    
            // Output the JSON data
            echo json_encode($responseData);
        }
        
        return null; // Return null if user data is not found or there's an error
    }

/*
    public static function lengthAction()
    {
        return static::getModel()::length();
    }
*/
}



?>
 