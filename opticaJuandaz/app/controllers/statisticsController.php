<?php
require_once "app/models/statisticsModel.php";
require_once "app/views/statisticsView.php";

class statisticsController{
    function paginateStatistics(){
        $connection=new connection();
        $statisticsModel=new statisticsModel($connection);
        $statisticsView=new statisticsView();

        $statisticsView->paginateStatistics();
    }
}
?>