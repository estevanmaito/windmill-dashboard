<?php
namespace public\app\controllers ;
//require "../../vendor/autoload.php";
require "BaseController.php";
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

            $user = static::getModel();
            $user->setUsername( $_POST['username']);
            $user->setPassword($_POST['password']);
            $user->setUserLocationId($_POST['locationId']);
            $user->setLocationDetails($_POST['locationdetails']);
            $user->setPhone($_POST['phone']);   
            $user->setMobile($_POST['mobile']);
            $user->setUserEmail($_POST['email']);
            $user->setRegistrationTime(date('Y-m-d H:i:s'));
            $modelObject->create();
            if($user === true){
                static::redirect('list');
            }

        }

    }
}



?>
 