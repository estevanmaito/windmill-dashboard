<?php
namespace app\controllers ;
 // Include the necessary files
require "vendor/autoload.php";

// Use the User class from the app\models namespace
use \app\models\User;

class UserController extends BaseController
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

    public static function makeProductPager($key)
    {
        // Get the total number of pages
        $totalPages = static::lengthAction($key);
    
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
        return static::getModel()->getLimitProducts($leftLimit, $rightLimit,$key);
    }
    
    public static function indexAction($key)
    {
        
        $searchType = isset($_POST['search_type']) ? $_POST['search_type'] : null;
        $searchValue = isset($_POST['search']) ? $_POST['search'] : null;
    
    // Get the request method (POST or GET)
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        if ($searchValue !== "" && $searchType !== "" && $requestMethod === 'POST') {
            // If a search value is provided and the request method is POST,
            // perform a search using the User model's 'find' method
            
            $users = static::getModel()->find('user_account', $searchType, $searchValue);
        } else {
            // If no search value is provided or the request method is not POST,
            // retrieve the users using the 'makeProductPager' method
            $users = static::makeProductPager($key);
        }
    
        $file = $key == 2 ? 'list' : 'listRenter' ;
        // Render the "Users/list" view and pass the users data to it
        static::requir("Users/$file", $users);
    }

    public static function retrieveSettres()
    {
        $user = static::getModel();

        // Set the properties of the user object using the values from the form inputs
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setUserLocationId($_POST['locationId']);
        $user->setPhone($_POST['phone']);
        $user->setMobile($_POST['mobile']);
        $user->setUserEmail($_POST['email']);
        $user->setRegistrationTime($_POST['registration_time']);
        $user->setRoleId($_POST['present']);

        return $user ;
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
            $userCreated = static::retrieveSettres();
        
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
            $userUpdated = static::retrieveSettres();

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
        // Check if the request method is GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Create a new instance of the User model
            $userDeleted = static::getModel();

            // Call the 'destroy()' method of the User model to delete the user
            $userDeleted->destroy('user_account', $_GET['id']);

            if ($userDeleted > 0) {
                // If the user deletion is successful, redirect to the "list" page
                static::redirect('list');
            } else {
                // If there is an error during user deletion, display an error message
                echo "Erreur";
            }
        }
    }

    public static function lengthAction($key= NULL)
    {
        // Call the 'length()' method of the User model to get the length/count of users
        return static::getModel()::length('user_account',$key );
        
    }

    public static function SelectOption($referencedTable , $column ,  $cond = NULL)
    {
        
        return static::getModel()::SelectInputs($referencedTable , $column , $cond) ;
    }

    // Function to handle the AJAX request and retrieve user data by ID

    
}

?>
 