<?php
namespace app\controllers ;

// Include the necessary files
require "vendor/autoload.php";

// Use the User class from the app\models namespace
use \app\controllers\UserController;

if (isset($_POST['action']) && $_POST['action'] === 'getUserDataAjax') {
    // Get the user ID from the POST data
    if (isset($_POST['param1'])) {
        $userId = $_POST['param1'];
        
        // Assuming you have a method sendData in your UserController
        // Modify this part according to your actual implementation
        $userData = UserController::sendData($userId);
    
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
            echo json_encode($responseData);
        } else {
            // If the user data was not found, return an error response
            http_response_code(404);
            echo json_encode(array('error' => 'User data not found'));
        }
    }
    exit; // This should be outside the "if" block
}
?>
