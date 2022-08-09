<?php
require_once "includes/header.php";

$conn=mysqli_connect("localhost","root","","waroma");
$select=mysqli_query($conn,"SELECT * FROM payement");
$select2 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");
$select3 = mysqli_query($conn, "SELECT * FROM `address` WHERE UserID='$Userid' ");
$select4 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");
$select5 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="FinalOrders.css?v=<?php echo time() ?>">
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

    <div class="maiin">
        <div class="bod">
            <div class="shipping">
                <div class="s">
                    <h2>Shipping Information</h2>
                </div>
                <?php
                while($myrow=mysqli_fetch_array($select3)){                
                ?>
                <div class="shh"><?php echo "Full Name: ".$myrow['Name']?></div>
                <div class="shh"><?php echo "Address Line 1: ".$myrow['Address line1']?></div>
                <div class="shh"><?php echo "Address Line 2: ". $myrow['Address line 2']?></div>
                <div class="shh"><?php echo "City: ". $myrow['City']?></div>
                <div class="shh"><?php echo "Country: ".$myrow['Country']?></div>
                <div class="shh"><?php echo "Phone Number :0".$myrow['Phone no']?></div>
                <?php
                }
                ?>
            </div>
            <div class="pay">
                <div>
                    <h2>Select Payment Method</h2>
                </div>
                <div>
                    <form action="includes/finalorders.php" method="post">
                    
                    <select name="pay" id="">
                    <?php while($row=mysqli_fetch_array($select)){?>
                    <option value="<?php echo $row['Name'];?>"><?php echo $row['Name'];?></option>
                    <?php
                    }
                    ?>
                </select></div>

            </div>
            <br>

            <div class="orderrev">
            <div><h2>Your Order Review</h2></div>
            <?php
            $numrow=mysqli_num_rows($select2);
            ?>

            <input type="hidden" name="n" value="<?php $numrow ?>;">
            <?php 
            while($row=mysqli_fetch_array($select2)){?>
            <div class="orderrr">
                <div>
                    <img class="myimage" src="includes/img/<?php echo $row['image'] ?>" alt="">
                    
                </div>
                <div class="orderinf">
                    <div><?php echo "Name: ". $row['name'] ?>           
            </div>
                    <div><?php echo  "Price US $ " . $row['price'] ?>
                </div>
                    <div><?php echo "Quantity: ". $row['quantity'] ?>
                </div>
                    <div><?php echo "Subtotal: US $ " . $subtotal = ($row['price'] * $row['quantity']);?></div>
                </div>
            </div>
            <?php
                }
                ?>

            </div>
        </div>
        <div class="pos">
            <div class="orders">
            <div><h2 class="os">Order Summary</h2></div>
            <div class="st">SubTotal   : 
                <?php
                    $grandtotal = 0;
                    while ($row = mysqli_fetch_array($select4)) {
                        $subtotal = ($row['price'] * $row['quantity']);
                        $grandtotal = $subtotal + $grandtotal;
                    }
                    echo "US $" . $grandtotal ?>
            </div><br>
            <div class="sh">Shipping : <?php
                                $shipping = 0;
                                while ($row = mysqli_fetch_array($select5)) {
                                    $shipping = $shipping + 7;
                                }
                                echo "US $" . $shipping;
                                ?> </div><br>
            <div class="total">Total: <?php echo "US $ " . ($grandtotal + $shipping) ?></div><br>
            <?php
            $grand=($grandtotal + $shipping);
            ?>
            <input type="hidden" name="total" value="<?php echo $grand?>">
            <div class="mybutt"><Button class="mybutton"type="submit" name="po" onclick="openPopup()">Place Order</Button>
            
                            </form>
        </div>

            </div>
        </div>
    </div>
    <div class="popup" id="popup">
        <img src="bluetick.png" alt="">
        <h2>Thanks For Shopping</h2>
        <p>Your order has been recorded and is being processed.<br>Payment is on Delivery!</p>
        <button type="button" onclick="closePopup()">OK</button>
        <br>
        <div class="q">" "</div>
    </div>

    <script>
        let popup=document.getElementById("popup");
        function openPopup(){
            popup.classList.add("open-popup");
        }
        function closePopup(){
            popup.classList.remove("open-popup");
        }
    </script>
    
</body>

</html>