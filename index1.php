<?php
   require "vendor/autoload.php";
   require "public/app/controllers/UserController.php";

   use public\app\controllers\UserController;
    // Création d'un routeur.
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'create':
                UserController::createAction();
            break;
            case 'list':
                UserController::indexAction();
            break;
            case 'store':
                UserController::storeAction();
            break;
            case 'destroy':
                UserController::destroyAction();
            break;
            case 'edit':
                UserController::editAction();
            break;
            default :
            echo " page not found 404";
            break;
        }
    }
