<?php

session_start();

$table="";

function connect():mysqli{
    $dbHost="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="waroma";
    
    return mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
}


function numRows($table){
    $conn=connect();
    $sql="SELECT * FROM $table";
    $result=mysqli_query($conn,$sql);
    
    if($result){
        $row=mysqli_num_rows($result);

        echo ($row);
    }
}

function sales(){
    $conn=connect();
    $sql=mysqli_query($conn,"SELECT * FROM `bought items`");
    $totalprice=0;
    while($row=mysqli_fetch_array($sql)){
        $price=$row['Price'];
        $totalprice=$totalprice+$price;

    }
    echo ($totalprice);
}