<?php


require_once (__DIR__ . '/vendor/tommyknocker/pdo-database-class/PDODb.php');

const MSQL_CONNECT_DATA = [
        'type' => 'mysql',
        'host' => '127.0.0.1',
        'username' => 'root', 
        'password' => '',
        'dbname'=> 'welover',
        'port' => 3306,
        'prefix' => '',
        'charset' => 'utf8'];
           