<?php
namespace public\app\controllers ;
// require "BaseController.php";
 require 'public/app/models/Item.php';
use public\app\models\Item;


class ItemController  
{
    /*
    on a supprimer cette partie et on la remplacer par getModel
    public function __construct()
    {
        $this->setModel(new User());
    }*/

   

    public static function  getModelItem()
    {
        if(is_null(static::$model))
        {
            static::$model = new Item();
        }
        return static::$model ;
    }

    public static function indexActionItem()
    {
        $search = isset($_POST['search']) ? $_POST['search'] : null;
        $requestMethod = $_SERVER['REQUEST_METHOD'];
    
        if ($search !== "" && $requestMethod === 'POST') {
            $item = static::getModelItem()->findItem($search);
        } else {
            $item = static::getModelItem()->latestItem();
        }
       
        static::requir("propertyList", $item);
    }
    
/*
    public static function searchAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search']) ) {

            $userSearch = static::getModel();
            $userSearch->find($_POST['search']);
            static::requir("list",$userSearch);
        }

    }*/
/*
    public static function createAction()
    {
        static::requir("create");
        echo 'hello';
    }
    public static function storeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userCreated = static::getModel();
            $userCreated->setUsername( $_POST['username']);
            $userCreated->setPassword($_POST['password']);
            $userCreated->setUserLocationId($_POST['location_id']);
            $userCreated->setLocationDetails($_POST['location_details']);
            $userCreated->setPhone($_POST['phone']);   
            $userCreated->setMobile($_POST['mobile']);
            $userCreated->setUserEmail($_POST['email']);
            $userCreated->setRegistrationTime($_POST['registration_time']);
            $userCreated->create();
            if($userCreated >0){
                static::redirect('list');
            }
            else{
                echo "Erreur";
            }

        }

    }
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
$itemC = new ItemController();
$itemC->indexActionItem();


?>
 