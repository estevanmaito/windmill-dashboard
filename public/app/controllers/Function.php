<?php
namespace app\controllers ;
include 'UserController.php';
// require "vendor/autoload.php";
use \app\controllers\UserController;

switch($_GET['action'])
{
    case "getUserDataAjax":
        echo 'hello' ;
     UserController::sendData($_GET['param1']);
    break;
    case "2":
     someOtherFunction();
    break;
}
   
   ?>