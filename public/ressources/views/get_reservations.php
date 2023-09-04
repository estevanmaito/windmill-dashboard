<?php

require "vendor/autoload.php";

use app\controllers\CalendarController;

// Get the item ID from the URL query parameter
if (isset($_GET['id'])) {
    $itemID = intval($_GET['id']);

    // Call the static function from the controller to retrieve data
    $reservations = CalendarController::getData($itemID);

    // Output the data as JSON
    header('Content-Type: application/json');
    echo json_encode($reservations);
} else {
    // Return an empty array if no ID is provided
    echo json_encode([]);
}
