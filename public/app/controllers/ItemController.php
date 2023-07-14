<?php
namespace app\controllers ;
// Include the necessary files
// require "BaseController.php";
require 'public/app/models/Item.php';

// Use the User class from the app\models namespace
use \app\models\Item;


class ItemController  extends \app\controllers\BaseController
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
    $search = isset($_POST['search']) ? $_POST['search'] : null;
    
    // Retrieve the request method
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if ($search !== "" && $requestMethod === 'POST') {
        // Search for items based on the provided search input
        $items = static::getModelItem()->findItem($search);
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

    
/*
    public static function searchActionItem()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search']) ) {

            $userSearch = static::getModel();
            $userSearch->find($_POST['search']);
            static::requir("list",$userSearch);
        }

    }*/

    public static function createActionItem()
    {
        static::requir("Items/createItem");
        echo 'hello';
    }
    public static function storeActionItem()
    {
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //     $userCreated = static::getModelItem();
        //     $userCreated->setUsername( $_POST['username']);
        //     $userCreated->setPassword($_POST['password']);
        //     $userCreated->setUserLocationId($_POST['location_id']);
        //     $userCreated->setLocationDetails($_POST['location_details']);
        //     $userCreated->setPhone($_POST['phone']);   
        //     $userCreated->setMobile($_POST['mobile']);
        //     $userCreated->setUserEmail($_POST['email']);
        //     $userCreated->setRegistrationTime($_POST['registration_time']);
        //     $userCreated->create();
        //     if($userCreated >0){
        //         static::redirect('list');
        //     }
        //     else{
        //         echo "Erreur";
        //     }

        // }

    }/*
    public static function editAction()
    {
        $id=$_GET['id'];
        $user = self::getModel()::view($id);
        static::requir('edit',$user);

    }

    public static function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userUpdated = static::getModel();
            
            $userUpdated->setUsername( $_POST['username']);
            $userUpdated->setPassword($_POST['password']);
            $userUpdated->setUserLocationId($_POST['locationId']);
            $userUpdated->setLocationDetails($_POST['locationdetails']);
            $userUpdated->setPhone($_POST['phone']);   
            $userUpdated->setMobile($_POST['mobile']);
            $userUpdated->setUserEmail($_POST['email']);
            $userUpdated->setRegistrationTime(date('Y-m-d H:i:s'));
            $userUpdated->update($_POST['id']);
            if($userUpdated >0 ){
                static::redirect('list');
            }
            else{
                echo "Erreur";
            }

        }

    }

    public static function destroyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $userdeleted = static::getModel();
            $userdeleted->destroy('user_account',$_GET['id']);
            if($userdeleted >0 ){
                static::redirect('list');
            }
            else{
                echo "Erreur";
            }

        }

    }

    public static function lengthAction()
    {
        return static::getModel()::length();
    }


*/
}



?>
 