<?php
require_once "config/session.php";
require_once "config/Connection.php";

if(isset($_SESSION,$_SESSION['id_access']) and $_SESSION['auth']=='OK' and $_SESSION['status_access']=='t')
{
    require_once "config/FrontController.php";
    
    if(isset($_GET['route']))
    {
        $route=$_GET['route'];
    }
    else
    {
        $route=''; 
    }
    
    $FrontController=new FrontController($route);
}
else if(isset($_POST['email'],$_POST['password']))
{
    require_once "app/controllers/loginController.php";
    $loginController=new loginController();
    $loginController->validateFormSession($_POST);   
}
else
{
    require_once "app/controllers/loginController.php";
    $loginController=new loginController();
    $loginController->validateUrl(); 
}