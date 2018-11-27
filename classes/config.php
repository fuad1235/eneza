<?php
//error_reporting(0);
require('clean.php'); 
ob_start();
session_start(); 
//database credentials
$DB_HOST = 'localhost';
$DB_USER = 'fuad123';
$DB_PASS = 'rapper123';
$DB_NAME = 'msmservice';

try{
$db_conx = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
$db_conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
echo "sorry could not connect to the database";
}
?>
