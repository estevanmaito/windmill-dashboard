<?php
  require "vendor/autoload.php";



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
            case 'searchlist': 
                UserController::indexAction(2);
            break;
            case 'listRenter' :
                case 'searchlistRenter': 
                    UserController::indexAction(3);
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
                case 'searchpropertyList' :
                ItemController::indexActionItem();
            break;
            case 'createItem':
                ItemController::createActionItem();
            break;
            case 'storeItem':
                ItemController::storeActionItem();
            break;
            case 'editItem':
                ItemController::editActionItem();
            break;
            case 'updateItem':
                ItemController::updateActionItem();
            break;
            case 'destroyItem':
                ItemController::destroyActionItem();
            break;
            case "getUserDataAjax":
                // echo 'hello' ;
             ItemController::sendData($_GET['param1']);
            break;

            default :
            echo " page not found 404";
            break;
            }
    }

