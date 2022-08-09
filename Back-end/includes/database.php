<?php

$dbHost="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="waroma";

$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Database connection failed");
}



