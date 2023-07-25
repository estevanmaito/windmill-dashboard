<?php
namespace app\controllers ;



class BaseController
{
    protected static $model ;
 

    public static function requir($view, $data = NULL)
    {
        // Construct the file path of the view file
        $filePath = "ressources/views/" . $view . ".php";
        
        // Include the view file
        require $filePath;
    }
    
    public static function redirect($route)
    {
        // Redirect to the specified route
        header("location: index1.php?action=$route");
    }
    


}

?>

