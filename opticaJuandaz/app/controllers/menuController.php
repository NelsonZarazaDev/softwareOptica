<?php
require_once "app/views/menuView.php";
class menuController
{
    function validateMenu()
    {
        $menuView=new menuView(); 
        $menuView->showMenu();
    }
}
?>