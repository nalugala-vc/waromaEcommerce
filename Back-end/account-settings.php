<?php
    require_once "includes/header.php";

?>
<?php
    if(!isset($_SESSION['sessionid'])){
         header ("Location:userrlogin.php?loggedin");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="account.css?v=<?php echo time();?>">
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
                <li><a class="active" href="account.php" class="account"><img src="account.png" id="user" alt="">
                        <?php echo $Username?>
                    </a></li>
                <li><a href="cart.php" class="cart"><img src="shopping cart 2.png" id="sc2" alt="">Cart
                    </a></li>
            </ul>
        </nav>

    </header>
    <br><br>
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

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        }
    </script>
    <div class="navmydiv">
        <div class="navigation">
            <nav class="pri-nav">
                <ul>
                    <li class="overview"><a href="account.php">Overview</a></li>
                    <li class="orders"><a href="account-orders.php">Orders</a></li>
                    <li class="feedback"><a href="account-feedback.php">Feedback</a></li>
                    <li class="ship"><a href="account-shipping.php">Shipping Address</a></li>
                    <li class="return"><a href="account-refunds.php">Return and refund</a></li>
                    <li class="setting"><a href="account-settings.php">Settings</a></li>
                    <li class="help"><a href="account-helpcenter.php">Help</a></li>
                </ul>
            </nav>
        </div>
        <div>
            <div class="heada">
                <div class="sett">Settings</div>
            </div>
            <div class="boddy">
                <nav class="nav">
                    <ul>
                        <li><a href="">Upload Picture</a></li><br>
                        <li><a href="">Edit Picture</a></li><br>
                        <li><a href="">Activate Dark Mode</a></li><br>
                    </ul>
                </nav>
                <div class="infom">Security Information</div>
                <nav class="nav">
                    <ul>
                        <li><a href="">Change email address</a></li><br>
                        <li><a href="">Change Password</a></li><br>
                        <li><a href="">Set security question</a></li><br>
                    </ul>
                </nav>
                <div class="infom">Activate Email Notification</div>
                <nav class="nav">
                    <ul>
                        <li><a href="">Activate</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="services">
        <div class="Serv">Services</div>
        <div class="myiconi">
            <div class="subiconi">
                <a href="account.php">
                    <div><i class="fa-solid fa-book"></i></div>
                    <span>Overview</span>
                </a>
            </div>
            <div class="subiconi">
                <a href="account-orders.php">
                    <div><i class="fa-solid fa-folder-tree"></i></div>
                    <span>Orders</span>
                </a>

            </div>
            <div class="subiconi">
                <a href="account-feedback.php">
                    <div><i class="fa-solid fa-envelope-open-text"></i></div>
                    <span>Feedback</span>
                </a>

            </div>
            <div class="subiconi">
                <a href="account-shipping.php">
                    <div><i class="fa-solid fa-address-book"></i></div>
                    <span>Shipping <br> Address</span>
                </a>

            </div>
            <div class="subiconi">
                <a href="account-refunds.php">
                    <div><i class="fa-solid fa-arrow-right-arrow-left"></i></div>
                    <span>Return <br> and refund</span>
                </a>

            </div>
            <div class="subiconi">
                <a href="account-settings.php">
                    <div><i class="fa-solid fa-gear"></i></div>
                    <span>Settings</span>
                </a>

            </div>
            <div class="subiconi">
                <a href="account-helpcenter.php">
                    <div><i class="fa-solid fa-circle-question"></i></div>
                    <span>Help</span>
                </a>

            </div>

        </div>



    </div>
    <br>
        </div>
    </div>
    <footer class="main-footer">
        <div class="more-info">
            <div class="footer-logo">
                <div class="logoname">waroma shop <img src="footer-cart.png" alt="" class="footer-cart"></div>
            </div>
            <div class="info">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi reprehenderit autem
                praesentium veritatis laudantium repellat, ipsa quia aut enim, dignissimos voluptatem voluptatum</div>
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
    </footer>

</body>

</html>