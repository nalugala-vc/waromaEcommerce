<?php

require "database.php";
require "header.php";

if(isset($_POST['mysubmitt'])){
    $product_name=$_POST['product_name'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    //$product_name=$_POST['product_name'];

    $select=mysqli_query($conn,"SELECT * FROM cart WHERE name='$product_name' AND User_ID='$Userid' ");

    if(mysqli_num_rows($select)>0){
        echo "<script> alert('Product already added')</script>";
        header ("Location:../index.php");
    }else{
        mysqli_query($conn,"INSERT INTO `cart`( `User_ID`, `name`, `price`, `brand`, `image`) VALUES ('$Userid','$product_name','$product_price','$product_brand','$product_image')");
        echo "<script> alert('Product added successfully')</script>";
        header ("Location:../index.php");
}
}