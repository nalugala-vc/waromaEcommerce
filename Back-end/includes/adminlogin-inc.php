<?php

if(isset($_POST['submit'])){

    require 'database.php';

    $Username=$_POST['username'];
    $Password=$_POST['password'];

    if(empty($Username) or empty($Password)){
        header("Location: ../index.php?error=emptyfields");
        exit();

    }else{
        $sql="SELECT * FROM adminlogin WHERE Username=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../index.php?error=sqlerror");
            exit();

        }else{
            mysqli_stmt_bind_param($stmt,"s",$Username);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            //fetches data from the database as an associative array
            if($row=mysqli_fetch_assoc($result)){
                $passCheck=password_verify($Password,$row['Password']);
                if($passCheck==false){
                    header("Location:../index.php?error=wrongPassword");
                    exit();
                }elseif($passCheck==true){
                    session_start();
                    $_SESSION['sessionid']=$row['ID'];
                    $_SESSION['sessionuser']=$row['Username'];
                    header("Location:../adminhome.php?success=login");
                    exit();

                }else{
                        header("Location:../index.php?error=wrongPassword");
                        exit();

                }

            }else{
                    header("Location:../index.php?error=noUser");
                    exit();

            }
        }
    }

}else{
    header("Location:../index.php?error=accessForbidden");
    exit();
    
}
?>