<?php

//4 IMPORTANT INFORMATION NEEDED BY DB
define("DB_HOST", "localhost");
define("DB_USER","root");
define("DB_PASS", "");
define("DB_NAME","admin");
$dbhost = 'localhost';
$dbuser= 'root';
$dbpass = '';
$dbname = 'admin';

//connect to the databse

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$conn){
    echo ('failed to connect the database');
    die();
}
