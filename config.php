<?php
error_reporting(E_ALL);
/**
 * @author Tom Heek
 * @copyright 2014
 */

session_start();
ob_start();

$mysqldb    = 'localhost';  //Mysql database
$dbname     = 'urlshortener';   //Mysql database name
$mysqluser  = 'root';           //Mysql username
$mysqlpass  = '';           //Mysql password

try{
    $handler = new PDO('mysql:host=' . $mysqldb . ';dbname=' . $dbname, $mysqluser, $mysqlpass);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    //echo $e->getMessage();
    die('Something went wrong, please try again.');
}

$website_url = 'http://localhost/';
?>