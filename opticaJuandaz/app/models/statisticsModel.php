<?php
class statisticsModel{
    private $connection;

    function __construct($connection)
    {
        $this->connection=$connection;
    }
}