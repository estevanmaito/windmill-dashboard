<?php
namespace app\controllers ;
require "vendor/autoload.php";


class DashController extends BaseController
{
    

    public static function dashFile()
    {
        static::requir("dashboard");
    }
}

?>

