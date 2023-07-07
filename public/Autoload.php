
<?php
class Autoloader
{

public static function register()
{
spl_autoload_register(static function ($class) {
    $filename = $class. ".php";
    $filename = str_replace(  '\\',  '/', $filename);
    if (file_exists($filename)) {
        require $filename;
    }
    });
}
}

