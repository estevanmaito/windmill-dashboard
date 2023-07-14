<?php
namespace app\controllers ;
 // Include the necessary files
require "BaseController.php";
require 'public/app/models/User.php';

// Use the User class from the app\models namespace
use \app\models\User;


class UserController extends \app\controllers\BaseController
{
    
    private static $productsPerPage = 3;

    // Get the instance of the User model
    public static function  getModel()
    {
        if(is_null(static::$model))
        {
            static::$model = new User();
        }
        return static::$model ;
    }

    public static function makeProductPager()
    {
        // Get the total number of pages
        $totalPages = static::lengthAction();
    
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
            $rightLimit = $allProducts; // Variable $allProducts is undefined, you might need to define it
        } else {
            // If 'page' parameter is valid, set the page number based on the value in the URL
            $pageNumber = intval($_GET['page']);
            $leftLimit = static::$productsPerPage * ($pageNumber - 1);
            $rightLimit = static::$productsPerPage;
        }
        
        // Call the 'getLimitProducts()' method of the model to fetch the products within the specified limits
        return static::getModel()->getLimitProducts($leftLimit, $rightLimit);
    }
    

    public static function indexAction()
    {
        // Retrieve the search value from the form input
        $search = isset($_POST['search']) ? $_POST['search'] : null;
        
        // Get the request method (POST or GET)
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        if ($search !== "" && $requestMethod === 'POST') {
            // If a search value is provided and the request method is POST,
            // perform a search using the User model's 'find' method
            $users = static::getModel()->find('user_account', $search);
        } else {
            // If no search value is provided or the request method is not POST,
            // retrieve the users using the 'makeProductPager' method
            $users = static::makeProductPager();
        }
        
        // Render the "Users/list" view and pass the users data to it
        static::requir("Users/list", $users);
    }

    public static function retrieveSettres()
    {
        $userUpdated = static::getModel();

        // Set the properties of the user object using the values from the form inputs
        $userUpdated->setUsername($_POST['username']);
        $userUpdated->setPassword($_POST['password']);
        $userUpdated->setUserLocationId($_POST['locationId']);
        $userUpdated->setLocationDetails($_POST['locationdetails']);
        $userUpdated->setPhone($_POST['phone']);
        $userUpdated->setMobile($_POST['mobile']);
        $userUpdated->setUserEmail($_POST['email']);
        $userUpdated->setRegistrationTime(date('Y-m-d H:i:s'));
    }
    

    public static function createAction()
    {
        // Render the "Users/create" view
        static::requir("Users/create");
    }
    
    public static function storeAction()
    {
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Create a new instance of the User model
            $userCreated = static::getModel();
    
            // Set the properties of the user object using the values from the form inputs
            $userCreated->setUsername($_POST['username']);
            $userCreated->setPassword($_POST['password']);
            $userCreated->setUserLocationId($_POST['location_id']);
            $userCreated->setLocationDetails($_POST['location_details']);
            $userCreated->setPhone($_POST['phone']);
            $userCreated->setMobile($_POST['mobile']);
            $userCreated->setUserEmail($_POST['email']);
            $userCreated->setRegistrationTime($_POST['registration_time']);
    
            // Call the 'create()' method of the User model to store the user in the database
            $userCreated->create();
    
            if ($userCreated > 0) {
                // If the user creation is successful, redirect to the "list" page
                static::redirect('list');
            } else {
                // If there is an error during user creation, display an error message
                echo "Erreur";
            }
        }
    }
    
    public static function editAction()
    {
        // Get the user ID from the URL parameter
        $id = $_GET['id'];
        
        // Retrieve the user data using the 'view' method of the User model
        $user = self::getModel()::view($id);
        
        // Render the "Users/edit" view and pass the user data to it
        static::requir('Users/edit', $user);
    }

    
    public static function updateAction()
{
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Create a new instance of the User model
        $userUpdated = static::getModel();

        // Set the properties of the user object using the values from the form inputs
        $userUpdated->setUsername($_POST['username']);
        $userUpdated->setPassword($_POST['password']);
        $userUpdated->setUserLocationId($_POST['locationId']);
        $userUpdated->setLocationDetails($_POST['locationdetails']);
        $userUpdated->setPhone($_POST['phone']);
        $userUpdated->setMobile($_POST['mobile']);
        $userUpdated->setUserEmail($_POST['email']);
        $userUpdated->setRegistrationTime(date('Y-m-d H:i:s'));

        // Call the 'update()' method of the User model to update the user in the database
        $userUpdated->update($_POST['id']);

        if ($userUpdated > 0) {
            // If the user update is successful, redirect to the "list" page
            static::redirect('list');
        } else {
            // If there is an error during user update, display an error message
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
        return static::getModel()::length('user_account');
    }


    


}



?>
 