<?php
namespace public\app\controllers ;
//require "../../vendor/autoload.php";
require "BaseController.php";
require 'public/app/models/User.php';
use public\app\models\User;


class UserController extends BaseController
{
    /*
    on a supprimer cette partie et on la remplacer par getModel
    public function __construct()
    {
        $this->setModel(new User());
    }*/

   

    public static function  getModel()
    {
        if(is_null(static::$model))
        {
            static::$model = new User();
        }
        return static::$model ;
    }


    public static function indexAction()
    {
        if($_POST['search'] != NULL && $_SERVER['REQUEST_METHOD'] )
        {
            $users = static::getModel()->find($_POST['search']);
            
        }
        else
        {
            $users = static::getModel()->latest();   
        }
       
      
        static::view("list",$users);

    }
/*
    public static function searchAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search']) ) {

            $userSearch = static::getModel();
            $userSearch->find($_POST['search']);
            static::view("list",$userSearch);
        }

    }*/

    public static function createAction()
    {
        static::view("create");
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
        static::view('edit',$user);

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
            $userdeleted->destroy($_GET['id']);
            if($userdeleted >0 ){
                static::redirect('list');
            }
            else{
                echo "Erreur";
            }

        }

    }

}



?>
 