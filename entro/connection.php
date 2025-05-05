<?php

//4 IMPORTANT INFORMATION NEEDED BY DB
define("DB_HOST", "localhost");
define("DB_USER","root");
define("DB_PASS", "");
define("DB_NAME","account");
$dbhost = 'localhost';
$dbuser= 'root';
$dbpass = '';
$dbname = 'account';

//connect to the databse

$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$con){
    echo ('failed to connect the database');
    die();
}