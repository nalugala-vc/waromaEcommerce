<?php
require_once "includes/header.php";
require "includes/database.php";

if (isset($_POST['buynow'])) {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $AD1 = $_POST['ad1'];
    $AD2 = $_POST['ad2'];
    $City = $_POST['city'];
    $Country = $_POST['country'];
    $Phone = $_POST['phoneno'];

    if (empty($Name) or empty($Email)  or empty($AD1)  or empty($AD2)  or empty($City)  or empty($Country) or empty($Phone)) {
        echo "<script> alert('Empty Fields') </script>";
    } else {

        $insert = "INSERT INTO `address`( `UserID`, `Name`, `Email`, `Address line1`, `Address line 2`, `City`, `Country`, `Phone no`) VALUES ('$Userid','$Name','$Email','$AD1','$AD2','$City','$Country','$Phone')";
        
    if(mysqli_query($conn,$insert)){
            echo "<script> alert('Address added successfully') </script>";
            header("Location:FinalOrders.php");
    }else{
            echo "<script> alert('An Error Occured') </script>".mysqli_error($conn);
    }

        
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Buy now.css?v=<?php echo time() ?>">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <header class="main-header">
        <a href="index.php" class="logo">
            <div class="logo-name">waroma shop</div><img src="shopping cart.png" id="sc1" alt="">
        </a>

        <nav class="main-nav">
            <input type="checkbox" name="check" id="check">
            <label for="check" class="checkbtn" id="btn"><i class="fa-solid fa-bars"></i></label>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="men.php">Men</a></li>
                <li><a href="women.php">Women</a></li>
                <li><a href="kids.php">Kids</a></li>
                <li><a href="account.php" class="account"><img src="account.png" id="user" alt="">
                        <?php echo $Username ?>
                    </a></li>
                <li><a href="cart.php" class="cart active"><img src="shopping cart 2.png" id="sc2" alt="">Cart
                    </a></li>
            </ul>
        </nav>

    </header>
    <div class="mydivul">
        <ul class="myul">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="men.php">Men</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="account.php" class="account">Vanessa</a></li>
            <li><a href="cart.php" class="cart">Cart
                </a></li>
        </ul>
    </div>
    <!--Javascript-->
    <script type="text/javascript">
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.mydivul');

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }
    </script>
    <div class="head">
        <h1>Complete Your Order</h1>
    </div>
    <div class="myfomcont">
        <div>
            <form action="" method="post" class="myform">
                <input type="text" name="name" id="" class="myinput" placeholder="Full Name eg : John Smith"><br>
                <input type="text" name="email" id="" class="myinput"
                    placeholder="Email eg : johnsmith@example.com"><br>
                <input type="text" name="ad1" id="" class="myinput"
                    placeholder="Address Line 1 eg : Flat / Building"><br>
        </div>
        <div class="myform">
            <input type="text" name="ad2" id="" class="myinput" placeholder="Address Line 2 eg : Street Name "><br>
            <input type="text" name="city" id="" class="myinput" placeholder="City eg : Nairobi"><br>
            <input type="text" name="country" id="" class="myinput" placeholder="Country eg : Kenya"><br>
        </div>

    </div>
    <div class="cont2">
        <div>
            <input type="number" name="phoneno" id="" class="myinput2"
                placeholder="Phone Number eg : 0712345678"><br><br>
            <div class="mybutton"><input type="submit" value="Submit" id="subbutton" name="buynow"></div>
        </div>

        </form>
    </div>

</body>

</html>