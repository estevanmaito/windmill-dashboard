<?php
  // require "vendor/autoload.php";
require "public/app/controllers/UserController.php";
   require "public/app/controllers/ItemController.php";


   use \app\controllers\UserController;
   use \app\controllers\ItemController;

    // Création d'un routeur.
    if (isset($_GET['action'])) 
    {
        $action = $_GET['action'];
        switch ($action) {
            case 'create':
                UserController::createAction();
            break;
            case 'list' :
            case 'search': 
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
            case 'update':
                UserController::updateAction();
            break;
            case 'propertyList':
                ItemController::indexActionItem();
            break;
            case 'createItem':
                ItemController::createActionItem();
            break;

            default :
            echo " page not found 404";
            break;
            }
    }

