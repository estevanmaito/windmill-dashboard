<?php
namespace public\app\controllers ;


// require_once 'C:\wamp64\wamp64\www\SAM\public\app\controllers\UserController.php';
require "vendor/autoload.php";



$x = $_POST["param1"];

if (isset($_POST['action']) && $_POST['action'] === 'getUserDataAjax') {
    // Get the user ID from the POST data
    if (isset($_POST['param1'])) {
        $userId = $_POST['param1'];
        

        // Assuming you have a method getUserDataById in your UserController
        // Modify this part according to your actual implementation
        var_dump("lloha");
        exit;
    $userData = UserController::sendData($userId);
    
        // $userData = new User();
        // $userData = $userData::fetch_data($userId);
        // Call the getUserDataById() method to get the user data

        // Check if the user data is found
        if ($userData !== null) {
        // Prepare the data to be sent back in JSON format
        $responseData = array(
            'name' => $userData['username'],
            'phone' => $userData['phone'],
            'email' => $userData['email'],
            // Add more properties as needed
        );

        // Set the response header to JSON
        
        header('Content-Type: application/json');

        // Output the JSON data
        echo json_encode($userData);
        
        }
     else {
        // If the user data was not found, return an error response
        http_response_code(404);
        echo json_encode(array('error' => 'User data not found'));
        }
    }
    exit;
    }
// echo json_encode($x);
// exit;


?>