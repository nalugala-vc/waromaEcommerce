<?php
require 'database.php';

$name=$_POST['name'];

$sql="INSERT INTO `category`(`Name`) VALUES ('$name')";

if(mysqli_query($conn,$sql)){
    echo "record added sucessfully";

}else{
    echo "error".mysqli_error($conn);
}