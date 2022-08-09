<?php

//check if the user has clicked the submit button
if(isset($_POST['submit'])){
    //add database connection
    require 'database.php';

    $FName=$_POST['firstname'];
    $LName=$_POST['lastname'];
    $Age=$_POST['age'];
    $Username=$_POST['username'];
    $Email=$_POST['email'];
    $Password=$_POST['password'];
    $CPassword=$_POST['confirm'];
    $Phone_No=$_POST['phoneno'];

    //error handling

    //empty fields
    if(empty($FName) or empty($LName)  or empty($Age)  or empty($Username)  or empty($Email)  or empty($Password)  or empty($CPassword)  or empty($Phone_No) ){
        header ("Location:../registerr.php?error=emptyfields");
        exit();
        //allowed characters in username
    }elseif(!preg_match("/^[a-zA-Z0-9]*/",$Username)){
        header ("Location:../registerr.php?error=invalidusernamecharacters");
        exit();
        //if passwords match
    }elseif($Password!==$CPassword){
        header ("Location:../registerr.php?error=passwordsdontmatch!");
        exit();
        
        //if username already exists
    }else{
        $sql="SELECT Username FROM users WHERE Username = ?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header ("Location:../registerr.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"s",$Username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount=mysqli_stmt_num_rows($stmt);

            if($rowCount>0){
                header ("Location:../registerr.php?error=usernameexistsr");
                exit();
            }else{
                //storing data into the database
                $sql="INSERT INTO users (FirstName,LastName,Age,Username,Email,Password,PhoneNo) VALUES (?,?,?,?,?,?,?)";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header ("Location:../registerr.php?error=sqlerror");
                    exit();
                }else{
                    $hashPass=password_hash($Password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ssisssi",$FName,$LName,$Age,$Username,$Email,$hashPass,$Phone_No);
                    mysqli_stmt_execute($stmt);
                    echo "<script> alert('Record added successful')</script>";
                    header ("Location:../userrlogin.php?Success=Registered");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}
if (isset($_POST['login'])){
    header("Location:../userrlogin.php");
    exit();
}
?>