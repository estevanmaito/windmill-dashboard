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
       $users = static::getModel()->latest();
      
        static::view("list",$users);

    }

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
            $userCreated->setUserLocationId($_POST['locationId']);
            $userCreated->setLocationDetails($_POST['locationdetails']);
            $userCreated->setPhone($_POST['phone']);   
            $userCreateduserCreated->setMobile($_POST['mobile']);
            $userCreated->setUserEmail($_POST['email']);
            $userCreated->setRegistrationTime(date('Y-m-d H:i:s'));
            $userCreated->create();
            if($userCreated === true){
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
            if($userUpdated === true){
                static::redirect('list');
            }
            else{
                echo "Erreur";
            }

        }

    }
}



?>
 