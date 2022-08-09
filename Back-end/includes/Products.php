<?php
require 'database.php';

if(isset($_POST['submit'])){
        $categoryname=$_POST['categoryname'];
        $subcategoryname=$_POST['subcategoryname'];
        $brand=$_POST['brand'];
        $name=$_POST['name'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $small=$_POST['small'];
        $medium=$_POST['medium'];
        $large=$_POST['large'];
        $color1=$_POST['color1'];
        $color2=$_POST['color2'];
        $color3=$_POST['color3'];
        $color4=$_POST['color4'];
        $color5=$_POST['color5'];
        

        if($_FILES['image']['error']){
            echo "<script> alert('image does not exist') </script>";
        }else{
            $filename=$_FILES['image']['name'];
            $filesize=$_FILES['image']['size'];
            $tmpName=$_FILES['image']['tmp_name'];

            $validImageExtension=['jpg','jpeg','png'];
            $imageExtension=explode('.',$filename);
            $imageExtension=strtolower(end($imageExtension));
            if(!in_array($imageExtension,$validImageExtension)){
                echo "<script> alert('invalid file extension') </script>";
            }elseif($filesize>100000000000000000000){
                echo "<script> alert('file too large') </script>";
            }else{
                $newimageName=uniqid();
                $newimageName.='.' . $imageExtension;
                move_uploaded_file($tmpName,'img/'.$newimageName);               
                $categoryidd="SELECT * FROM `category` WHERE `Name`=?";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$categoryidd)){
                        echo"connection error";
                        exit();
                }
                else{
                        mysqli_stmt_bind_param($stmt,"s",$categoryname);
                        mysqli_stmt_execute($stmt);
                        $result=mysqli_stmt_get_result($stmt);
                        if($row=mysqli_fetch_assoc($result)){
                            $categoryid=(int) $row['ID'];
                            //echo $categoryid;

                        }
                    
                }
                
                $subcategoryidd="SELECT * FROM `sub-categories` WHERE `Name`=? ";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$subcategoryidd)){
                        echo"connection error";
                        exit();
                }

                else{
                        mysqli_stmt_bind_param($stmt,"s",$subcategoryname);
                        mysqli_stmt_execute($stmt);
                        $result=mysqli_stmt_get_result($stmt);
                        if($roww=mysqli_fetch_assoc($result)){
                            $subcategoryid=(int)$roww['ID'];
                            echo $subcategoryid;
                        }
                    
                }
                
                $sql="INSERT INTO `products`( `CategoryID`, `subCategoryID`, `brand`, `name`, `description`, `price`, `image`, `quantity`,`Small`, `Medium`, `Large`, `Color1`, `Color2`, `Color3`, `Color4`, `Color5`) VALUES ('$categoryid','$subcategoryid','$brand','$name','$description','$price','$newimageName','$quantity','$small','$medium','$large','$color1','$color2','$color3','$color4','$color5')";
                if(mysqli_query($conn,$sql)){
                        echo "record added succesfully";
                }else{
                        echo "error occurred".mysqli_error($conn);
                }
            }

        }

}


?>
