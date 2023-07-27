<?php
namespace app\oontrollers ;

if (isset($_POST['action']) && $_POST['action'] === 'getUserDataAjax') {
    if (isset($_POST['param1']))
    {
        $shopid = $_POST['param1'];
        // Create a MySQLi database connection
        $db_server = mysqli_connect('localhost', 'root', '');

        if (!$db_server) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        // Select the desired database
        $db_database = 'SAM';
       
// Perform database operations here...

mysqli_select_db($db_server, $db_database);
$query = "SELECT * FROM user_account WHERE ID='" . mysqli_real_escape_string($db_server, $shopid) . "'"; 
$userData = mysqli_query($db_server, $query);

if (!$userData) {
    die("Database access failed: " . mysqli_error($db_server));
}

// Fetch the data from the result object using mysqli_fetch_assoc()
$row = mysqli_fetch_assoc($userData);

if (!$row) {
    die("User data not found.");
}

    $responseData = array(
        'name' => $row['username'],
        'phone' => $row['phone'],
        'email' => $row['email'],
        // Add more properties as needed
    );


            
            header ('Content-Type: application/json');
            echo json_encode($responseData);

    
        }
        else
        {
            http_response_code(404);
            echo json_encode(array('error' => 'User data not found'));
        }
        exit;
    }


  
    // include 'C:\wamp64\wamp64\www\SAM\public\app\controllers\UserController.php' ;
    
    // if (isset($_POST['action']) && $_POST['action'] === 'getUserDataAjax') {
    //     // Get the user ID from the POST data
    //     if (isset($_POST['param1'])) {
    //         $userId = $_POST['param1'];
            
    //         // Assuming you have a method sendData in your UserController
    //         // Modify this part according to your actual implementation
    //         $user =  new UserController();
    //         $userData = $user::sendData($userId);
        
    //         // Check if the user data is found
    //         if ($userData !== null) {
    //             // Prepare the data to be sent back in JSON format
    //             $responseData = array(
    //                 'name' => $userData['username'],
    //                 'phone' => $userData['phone'],
    //                 'email' => $userData['email'],
    //                 // Add more properties as needed
    //             );
    
    //             // Set the response header to JSON
    //             header('Content-Type: application/json');
    
    //             // Output the JSON data
    //             echo json_encode($responseData);
    //         } else {
    //             // If the user data was not found, return an error response
    //             http_response_code(404);
    //             echo json_encode(array('error' => 'User data not found'));
    //         }
    //     }
    //     exit; // This should be outside the "if" block
    // }
    
    
?>