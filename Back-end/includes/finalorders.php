<?php
require_once "header.php";

$conn=mysqli_connect("localhost","root","","waroma");
$select=mysqli_query($conn,"SELECT * FROM payement");
$select2 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");
$select3 = mysqli_query($conn, "SELECT * FROM `address` WHERE UserID='$Userid' ");
$select4 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");
$select5 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");

if(isset($_POST['po'])){
    $select6 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");

    $payement=$_POST['pay'];
    $amount=$_POST['total'];
    }
    $payementtt="SELECT * FROM `payement` WHERE `Name`=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$payementtt)){
            echo"connection error";
            exit();
    }

    else{
            mysqli_stmt_bind_param($stmt,"s",$payement);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($roww=mysqli_fetch_assoc($result)){
                $paymentid=(int)$roww['ID'];
                
            }
        
    }
    $sql="INSERT INTO `orderdetails`( `User_Id`, `amount`,  `payementType`) VALUES ('$Userid','$amount','$paymentid')";

        while($ord=mysqli_fetch_array($select6)){
        $name=$ord['name'];
        $Price=$ord['price'];
        $brand=$ord['brand'];
        $image=$ord['image'];
        $Quantity=$ord['quantity'];

        $ins="INSERT INTO `bought items`(`UserID`, `name`, `Price`, `brand`, `image`, `Quantity`,`Payment type`) VALUES ('$Userid','$name','$Price','$brand','$image','$Quantity','$paymentid')";

        if(mysqli_query($conn,$ins)){
            //echo "<script> alert('Order added sucessfully') </script>";
            
    }else{
            echo "<script> alert('An Error Occured') </script>".mysqli_error($conn);
    }
    }

    if(mysqli_query($conn,$sql)){
            //echo "<script> alert('Order added sucessfully') </script>";
            
    }else{
            echo "<script> alert('An Error Occured') </script>".mysqli_error($conn);
    }

    $sql2="DELETE FROM cart WHERE User_ID='$Userid'";

    if(mysqli_query($conn,$sql2)){
            //echo "<script> alert('Your Cart has been emptied') </script>";
            header("Location:../index.php?Continue Shopping");
    }else{
            echo "<script> alert('An Error Occured') </script>".mysqli_error($conn);
    }



?>