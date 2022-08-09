<?php
    require_once "includes/header.php";
    require "includes/database.php";

    $item_id=$_GET['item_id'];
    $sql="SELECT * FROM products WHERE ID=?";

    $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../index.php?error=sqlerror");
            exit();

        }else{
            mysqli_stmt_bind_param($stmt,"i",$item_id);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            //fetches data from the database as an associative array
            if($row=mysqli_fetch_assoc($result))
            
        


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="productclick.css?v=<?php echo time()?>">
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

            <?php
            {

            echo"<div class='mydivconn'>";
            echo   " <div>";
            echo  "<div class='main-pic'>";?>
            <img src="includes/img/<?php echo $row['image'] ?>" alt="" class='main-pic'><?php echo"</div>";
                echo"<div class='mini-pic-cont'>";
                        echo"<div class='mini-pic'></div>";
                        echo"<div class='mini-pic'></div>";
                        echo"<div class='mini-pic'></div>";
                        echo"<div class='mini-pic'></div>";
                        
                echo"    </div>";
            echo"    </div>";
            
            
        
            echo   "<div class='mydivconny'>";
                echo"<div class='desc'>";echo $row['description'];echo"</div>";
                echo  "<div class='more-infoo'>";
                        echo"<div>⭐⭐⭐⭐⭐4.7</div>";
                        echo"<div>1096 Orders</div>";
                        echo"<div>2328 Reviews</div>";
                    echo"</div>";
                    echo"<div class='prices'>";echo "Price US $ ".$row['price'];echo"</div>";
                    echo"<div class='col'>Color</div>";
                    echo"<div class='col-cont'>";
                        echo"<div class='colours c1'></div>";
                        echo"<div class='colours c2'></div>";
                        echo"<div class='colours c3'></div>";
                        echo"<div class='colours c4'></div>";
                        echo"<div class='colours c5'></div>";
                    echo"</div>";
                    echo"<div class='sizes'>Sizes</div>";
                    echo"<div class='sizes-cont'>";
                        echo"<div class='size'></div>";
                        echo"<div class='size'></div>";
                        echo"<div class='size'></div>";
                        echo"<div class='size'></div>";
                        
                    echo"</div>";
                    echo"<div class='quantity'>Quantity</div>
                    <input type='number' name='' id='quantity' min='0' max='99' placeholder='1'>";
                    
                    echo"<div class='ship'>Shipping US $ 2.00</div>";
                    echo"<div class='icons'>";
                        echo"<button class='button1'>Buy Now</button>";
                        echo"<button class='button2'>Add To Cart</button>";
                        echo"<div class='wishcont'>
                            <i class='fa-solid fa-bag-shopping'></i>
                            <div class='wish-count'>3447
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>";
            }
        }

            ?>
            <div class="novis">
                <div class="main-picc"></div>
                <div class="mydivconnyy">
                    <div class="pricess">US $ 10.00 - US $ 12.00</div>
                    <div class="descc">Winter long trench coat with sipper and hoodie and buckle for women</div>
                    <div class="more-infooo">
                        <div>⭐⭐⭐⭐⭐4.7</div>
                        <div>1096 Orders</div>
                        <div>2328 Reviews</div>
                    </div>
                    <div class="coll">Color</div>
                    <div class="col-cont">
                        <div class="colourss c1"></div>
                        <div class="colourss c2"></div>
                        <div class="colourss c3"></div>
                        <div class="colourss c4"></div>
                        <div class="colourss c5"></div>
                    </div>
                    <div class="sizess">Sizes</div>
                    <div class="sizes-cont">
                        <div class="sizee"></div>
                        <div class="sizee"></div>
                        <div class="sizee"></div>
                        <div class="sizee"></div>
                    </div>
                    <div class="quantityy">Quantity</div>
                    <input type="number" name="" id="quantityy" min="0" max="99" placeholder="1">
                
                    <div class="shipp">Shipping US $ 2.00</div>
                    <div class="icons">
                        <button class="button11">Buy Now</button>
                        <button class="button22">Add To Cart</button>
                        <div class="wishcont">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <div class="wish-countt">3447</div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="moree">More Like This</div>
            <div class="container">
                <div class="products">
                    <div><img src="product1.jpg" alt="" class="product-img"></div>
                    <div class="brand">versace</div>
                    <div class="product-name">Men office shirt</div>
                    <div class="product-price">US $ 4.00</div>
                </div>
                <div class="products">
                    <div><img src="product1.jpg" alt="" class="product-img"></div>
                    <div class="brand">versace</div>
                    <div class="product-name">Men office shirt</div>
                    <div class="product-price">US $ 4.00</div>
                </div>
                <div class="products">
                    <div><img src="product1.jpg" alt="" class="product-img"></div>
                    <div class="brand">versace</div>
                    <div class="product-name">Men office shirt</div>
                    <div class="product-price">US $ 4.00</div>
                </div>
                <div class="products">
                    <div><img src="product1.jpg" alt="" class="product-img"></div>
                    <div class="brand">versace</div>
                    <div class="product-name">Men office shirt</div>
                    <div class="product-price">US $ 4.00</div>
                </div>
                <div class="products">
                    <div><img src="product1.jpg" alt="" class="product-img"></div>
                    <div class="brand">versace</div>
                    <div class="product-name">Men office shirt</div>
                    <div class="product-price">US $ 4.00</div>
                </div>
                <div class="products">
                    <div><img src="product1.jpg" alt="" class="product-img"></div>
                    <div class="brand">versace</div>
                    <div class="product-name">Men office shirt</div>
                    <div class="product-price">US $ 4.00</div>
                </div>
                
            </div>
            <div class="reviews">Reviews⭐</div>
            <div class="crws">
                <div class="customer-rev">
                    <div>Marryanne ⭐⭐⭐⭐</div>
                    <div>Color:Black Size:S Arrived very fast.The size was alittle too big for me.</div>
            
                </div>
                <div class="customer-rev">
                    <div>Marryanne ⭐⭐⭐⭐</div>
                    <div>Color:Black Size:S Arrived very fast.The size was alittle too big for me.</div>
            
                </div>
                <div class="customer-rev">
                    <div>Marryanne ⭐⭐⭐⭐</div>
                    <div>Color:Black Size:S Arrived very fast.The size was alittle too big for me.</div>
            
                </div>
            
            </div>
            
        </div>
    </div>
    <footer class="main-footer" id="footer">
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