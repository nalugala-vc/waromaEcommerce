<?php
require 'database.php';

$name=$_POST['name'];
$ID=$_POST['categoryname'];

$categoryidd="SELECT * FROM `category` WHERE `Name`=?";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$categoryidd)){
    echo"connection error";
    exit();
}
else{
    mysqli_stmt_bind_param($stmt,"s",$ID);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($result)){
            $categoryid=(int) $row['ID'];
            //echo $categoryid;
            }
                }



$sql="INSERT INTO `sub-categories`( `Name`, `category-id`) VALUES ('$name','$categoryid')";

if(mysqli_query($conn,$sql)){
     echo "<script> alert('Record added successfully') </script>";
}else{
    echo "error".mysqli_error($conn);
}