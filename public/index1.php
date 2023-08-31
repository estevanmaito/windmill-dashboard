<?php
  require "vendor/autoload.php";



   use \app\controllers\UserController;
   use \app\controllers\BaseController;
   use \app\controllers\ItemController;
   use \app\controllers\ItemLeasedController;
   use \app\controllers\DashController;
   use \app\controllers\CalendarController;

    // Création d'un routeur.
    if (isset($_GET['action'])) 
    {
        $action = $_GET['action'];
        switch ($action) {
            case "dash":
                // echo 'hello' ;
             DashController::dashFile('dashboard');
            break;
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
            case 'reserveItem':
                ItemController::reserveActionItem();
            break;
            case "getUserDataAjax":
                // echo 'hello' ;
             ItemController::sendData($_GET['param1']);
            break;
            case 'itemLeasedList':
                case 'searchitemLeasedList' :
                ItemLeasedController::indexActionItemLeased();
            break;
            case 'calendar' :
                CalendarController::calendarFile();
            break;
            default :
            require 'ressources/views/404.php';
            break;
            }
    }

