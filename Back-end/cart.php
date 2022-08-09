<?php
require_once "includes/header.php";

if (!isset($_SESSION['sessionid'])) {
    header("Location:userrlogin.php?PleaseLogin");
    exit();
}
if (isset($_POST['update'])) {
    $updatequantity = $_POST['quantity'];
    $cartid = $_POST['cartid'];

    mysqli_query($conn, "UPDATE `cart` SET quantity= '$updatequantity' WHERE id='$cartid'");
    echo "<script> alert('Quantity sucessfully added') </script>";
}
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE ID='$remove_id'");
    echo "<script> alert('Item removed from cart') </script>";
}

$select = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");
$select2 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");
$select3 = mysqli_query($conn, "SELECT * FROM cart WHERE User_ID='$Userid' ");

if(isset($_POST['by'])){
    $mysel= mysqli_query($conn, "SELECT * FROM `address` WHERE UserID='$Userid' ");

    $MYROWS=mysqli_fetch_array($mysel);

    if($MYROWS==0){
        header("Location:Buy Now.php");
    }else{
        header("Location:FinalOrders.php");
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
    <link rel="stylesheet" href="cartt.css?v=<?php echo time() ?>">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="mycontain">
        <div class="main">
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

            <script>
            
            
            </script>
            <div class='myconny'>
                <div>
                    <div class="div-head">
                        <?php
                        if (mysqli_num_rows($select) == 0) {
                            echo "<div class='sc'>shopping Cart Empty
                            </div>";
                            exit();
                            

                        } else {


                            echo "<div class='sc'>shopping Cart</div>";
                            echo "</div>";
                            echo "<div class='the-body'>";

                            while ($row = mysqli_fetch_array($select)) {
                        ?>
                        <div class='div-bod b1'>
                            <div class='pic'>
                                <img class="pic" src="includes/img/<?php echo $row['image'] ?>" alt="">
                            </div>
                            <div>
                                <div class='pic-info'>
                                    <div><?php echo $row['brand'] ?>
                                    </div>
                                    <div><?php echo $row['name'] ?> </div>
                                    <div><?php echo "US $" . $row['price'] ?></div>
                                </div>
                                <div>
                                    <div class="pic-info">
                                        <?php echo "Subtotal: US $ " . $subtotal = ($row['price'] * $row['quantity']); ?>
                                    </div>
                                </div>

                                <div class='butonns'>
                                    <div>
                                        <form action="" method="post" class="myfomm">
                                            <input type="number" min="1" value="<?php echo $row['quantity'] ?>"
                                                name="quantity" id="quant">
                                            <input type="hidden" name="cartid" value="<?php echo $row['ID'] ?>">
                                            <input type="submit" value="Update" name="update" class="button">
                                            <a href="cart.php?remove=<?php echo $row['ID']; ?>" class="buttona"
                                                onclick="return confirm('remove this item from cart?');">
                                                <p class="myp">remove</p>
                                            </a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                        }
                ?>
                </div>
                <div class="mypos">
                    <div class="order" id="order">
                        <div class="summary">
                            <div class="os">Order Summary</div>
                            <div class="order-sum">
                                <div class="st">
                                    <div>Subtotal</div>

                                    <div> <?php
                                            $grandtotal = 0;
                                            while ($row = mysqli_fetch_array($select2)) {
                                                $subtotal = ($row['price'] * $row['quantity']);
                                                $grandtotal = $subtotal + $grandtotal;
                                            }
                                            echo "US $" . $grandtotal ?>
                                    </div>
                                </div>
                                <div class="sh">
                                    <div>Shipping</div>
                                    <div><?php
                                            $shipping = 0;
                                            while ($row = mysqli_fetch_array($select3)) {
                                                $shipping = $shipping + 7;
                                            }
                                            echo "US $" . $shipping;
                                            ?></div>
                                </div>
                                <div class="total">
                                    <div>Total</div>
                                    <div><?php echo "US $ " . ($grandtotal + $shipping) ?></div>
                                </div>
                            </div>
                        </div>
                        <form action="" method="post">
                        <div class="mybutt"><button class="mybutton" name="by">Buy Now</button></div>
                        </form>

                    </div>
                </div>
                <div class="smcc">
                <div class="smsc">
                    <div class="mywhprod">
                        <div><input type="checkbox" name="" id="mychecki"></div>
                        <div class="myprod"></div>
                        <div class="myprodinf">
                            <div class="namee">Sexy dinner dress</div>
                            <div class="donno">
                                <div class="monies">$ US 5.00</div>
                                <div><input type="number" name="" id="myinp"></div>
                            </div>
                        </div>
                    </div>

                </div>

                </div>
            </div>
            <br>
            

        </div>
        <br>
        <footer id="footer">
            <div class="myodsumm">
                <div class="myodsum">
                    <div class="mycheckbtn"><input type="checkbox" name="" id="mychecki">
                        <div>All</div>
                    </div>
                    <div class="totall">Total $US 5.00</div>
                    <div><button class="checkoutbt">checkout(1)</button></div>
                </div>

            </div>
            <br>
            <div class="main-footer">
                <div class="more-info">
                    <div class="footer-logo">
                        <div class="logoname">waroma shop <img src="footer-cart.png" alt="" class="footer-cart"></div>
                    </div>
                    <div class="info">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi reprehenderit
                        autem
                        praesentium veritatis laudantium repellat, ipsa quia aut enim, dignissimos voluptatem voluptatum
                    </div>
                </div>
                <div class="contacts">
                    <div class="contact-us">Contact us</div>
                    <div class="number">+(254) 775 09762</div>
                    <div class="waromaemail">waromaenterprise@gmail.com</div>
                    <div class="location">Mamulaka rd 7803 avenue Nairobi County</div>
                </div>
                <div class="about">
                    <div class="About">About</div>
                    <div class="faq">FAQ</div>
                    <div class="support">Support</div>
                    <div class="pp">Privacy & Policies</div>
                </div>

            </div>
        </footer>

</body>

</html>