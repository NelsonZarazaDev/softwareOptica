
<?php
class FrontController
{
    function __construct($route)
    {
        if($route)
        {
            list($class,$method)=explode('/',$route);         
        }
        else
        {
            $class="MenuController";
            $method="validateMenu";
        }

        require_once "app/controllers/$class.php";

        $instance=new $class();
        $instance->$method();    
    }
}
?>