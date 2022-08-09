<?php
    require_once "includes/header.php";
    require "includes/database.php";
    $sql=mysqli_query($conn,"SELECT * FROM products");

    //echo $Userid;

    
    if(isset($_POST['mysubmitt'])){
    $product_name=$_POST['product_name'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    //$product_name=$_POST['product_name'];

    $select=mysqli_query($conn,"SELECT * FROM cart WHERE name='$product_name' AND User_ID='$Userid' ");

    if(mysqli_num_rows($select)>0){
        echo "<script> alert('Product already added')</script>";
        //header ("Location:../index.php");
    }else{
        mysqli_query($conn,"INSERT INTO `cart`( `User_ID`, `name`, `price`, `brand`, `image`) VALUES ('$Userid','$product_name','$product_price','$product_brand','$product_image')");
        echo "<script> alert('Product added successfully')</script>";
        //header ("Location:../index.php");
}
}

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userhome.css?v=<?php echo time()?>">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <title>Document</title>
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
            <label for="check" class="checkbtn" id="btn"><i class="fa-solid fa-bars" ></i></label>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="men.php">Men</a></li>
                <li><a href="women.php">Women</a></li>
                <li><a href="kids.php">Kids</a></li>
                <li><a href="account.php" class="account"><img src="account.png" id="user" alt=""> <?php echo $Username?>
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
    <div class="banner1">
        <div class="exp">
            <div class="p1">Embrace your body types with <b>SHEIN</b> bralettes</div>
            <button id="b1">View More</button>
        </div>
        <div><img src="models.jpg" alt="" id="models"></div>
        <div class="braimg">
            <img src="bralette1.jpg" alt="" id="bra1">
            <img src="brallette2.jpg" alt="" id="bra2">
            <img src="Untitled.jpg" alt="" id="bra3">
        </div>
    </div>
    <!--Javascript-->
    <script type="text/javascript">
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.mydivul');

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        }
    </script>
<div class="banners">
    <div class="banner2">
        <div class="sum">
            <div class="p2">This <b>summer</b> get the best deals on summer dresses!</div>
            <button id="b2">view more</button>
            
        </div>
        <div>
        <img src="summerdress.jpg" alt="" class="summerdress">
        </div>
        <!--add link i create the brallete section-->
    </div>
    <div class="banner3">
        <div class="sum">
            <div class="p3">Up to <b>30%</b> off on prom and dinner dresses!</div>
            <button id="b2">view more</button>
        </div>
        <div>
            <img src="promdress.jpg" alt="" class="promdress">
        </div>
    </div>
</div>
<h1 class="h1">All Products</h1>

<?php
echo"<div class='container'>";
$j=0;
while($j<12){
    $row=mysqli_fetch_array($sql);
    if(!$row){
        break;
        
    } ?>  
        <form method="post" action="">
        <a href="<?php printf('%s?item_id=%s','product-click.php',$row['ID']) ?>" class="productsss">
        <input type="hidden" name="product_brand" value="<?php echo $row['brand']?>">
        <input type="hidden" name="product_name" value="<?php echo $row['name']?>">
        <input type="hidden" name="product_price" value="<?php echo $row['price']?>">
        <input type="hidden" name="product_image" value="<?php echo $row['image']?>">
        <?php
        echo "<div class='products'>";
        echo"<div>";?>
        <img src="includes/img/<?php echo $row['image'] ?>" alt="" class="product-img"><?php echo"</div>";
        echo"<div class='brand'>";echo $row['brand'];echo"</div>";
        echo"<div class='product-name'>";echo $row['name'];echo"</div>";
        echo"<div class='product-price'>";echo "US $".$row['price'];echo"</div>";
        echo"<div>";
        ?>
        <button class='' type='submit' name='mysubmitt'><i class='fa-solid fa-cart-shopping'></i></button>
        <?php
        echo"</div>";
        echo"</div>";
        ?>
        
        </a>
        </form>
        <?php
        $j++;
    
}
echo"</div>";
?>
<div id="men-banner">
    <div class="mendiv">
        <div id="p40">Men also dress Well!!</div>
        <div id="p41">Get up to <b>30%</b> discount for mens clothes this winter!</div>
        <div><button id="b4">View More</button></div>
    </div>
    <div><img src="men-models.jpg" alt="" class="men-models">
    </div>
</div>
<div class="mybannercon">
<div >
    <div id="men-banner2">
        <div class="mydivmen">
            <div id="p42">Stylish mens fashion</div>
            <div><button id="b5">View More</button></div>
        </div>
        <div><img src="stylishman.jpg" alt="" class="stylishman"></div>
    </div>
    <div id="men-banner3">
        <div class="mydivmen">
            <div id="p43">Be more presenttable</div>
            <button id="b6">View More</button>
        </div>
        <div><img src="presenatble.jpg" alt="" class="presentable"></div>
    </div>
</div>
<div>
    <div id="men-banner4">
        <div class="mydivmen">
            <div id="p44">Men Pajamas</div>
            <div><button id="b7">View More</button></div>
        </div>      
        <div><img src="manpjs.jpg" alt="" class="manpjs"></div>
    </div>
</div>
</div>

<?php
echo"<div class='container'>";
    echo"<div id='men'>";
        echo"<div id='p45'>WOMEN</div>";
        echo"<div id='p46'>Discover the best deals on women's clothes</div>";
        echo"<button id='b8' onclick='window.location.href='men.php''>Shop Now</button>";
    echo"</div>";
    $j=0;

    while($j<10){
    $row=mysqli_fetch_array($sql);
    if(!$row){
        break;
    }
    $roww=(int)$row['CategoryID'];
    if($roww==1){
        ?>
        <form method="post" action="">
        <a href="<?php printf('%s?item_id=%s','product-click.php',$row['ID']) ?>" class="productsss">
        <input type="hidden" name="product_brand" value="<?php echo $row['brand']?>">
        <input type="hidden" name="product_name" value="<?php echo $row['name']?>">
        <input type="hidden" name="product_price" value="<?php echo $row['price']?>">
        <input type="hidden" name="product_image" value="<?php echo $row['image']?>">
        <?php
        echo "<div class='products'>";
        echo"<div>";?>
        <img src="includes/img/<?php echo $row['image'] ?>" alt="" class="product-img"><?php echo"</div>";
        echo"<div class='brand'>";echo $row['brand'];echo"</div>";
        echo"<div class='product-name'>";echo $row['name'];echo"</div>";
        echo"<div class='product-price'>";echo "US $".$row['price'];echo"</div>";
        echo"<div>";
        ?>
        <button class='' type='submit' name='mysubmitt'><i class='fa-solid fa-cart-shopping'></i></button>
        <?php
        echo"</div>";
        echo"</div>";
        ?>
        
        </a>
        </form>
        <?php

    }
        $j++;
    }
echo"</div>";
?>
<?php
echo"<div class='container'>";
    echo"<div id='men'>";
        echo"<div id='p45'>MEN</div>";
        echo"<div id='p46'>Discover the best deals on men's clothes</div>";
        echo"<button id='b8' onclick='window.location.href='men.php''>Shop Now</button>";
    echo"</div>";
    $j=0;
    while($j<10){
        $row=mysqli_fetch_array($sql);
        if(!$row){
            break;
        }
        $roww=(int)$row['CategoryID'];
        if($roww==2){
            ?>
            <form method="post" action="">
            <a href="<?php printf('%s?item_id=%s','product-click.php',$row['ID']) ?>" class="productsss">
            <input type="hidden" name="product_brand" value="<?php echo $row['brand']?>">
            <input type="hidden" name="product_name" value="<?php echo $row['name']?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image']?>">
            <?php
            echo "<div class='products'>";
            echo"<div>";?>
            <img src="includes/img/<?php echo $row['image'] ?>" alt="" class="product-img"><?php echo"</div>";
            echo"<div class='brand'>";echo $row['brand'];echo"</div>";
            echo"<div class='product-name'>";echo $row['name'];echo"</div>";
            echo"<div class='product-price'>";echo "US $".$row['price'];echo"</div>";
            echo"<div>";
            ?>
            <button class='' type='submit' name='mysubmitt'><i class='fa-solid fa-cart-shopping'></i></button>
            <?php
            echo"</div>";
            echo"</div>";
            ?>
            
            </a>
            </form>
            <?php
        }
        $j++;
            
        
    }
echo"</div>";
?>
<?php
echo"<div class='container'>";
    echo"<div id='men'>";
        echo"<div id='p45'>KIDS:)</div>";
        echo"<div id='p46'>Discover the best deals on kids clothes</div>";
        echo"<button id='b8' onclick='window.location.href='men.php''>Shop Now</button>";
    echo"</div>";
    $j=0;
    
    while($j<11){
    
        $row=mysqli_fetch_array($sql);
        if(!$row){
            break;
        }
        $roww=(int)$row['CategoryID'];
        if($roww==3){
            ?>
            <form method="post" action="">
            <a href="<?php printf('%s?item_id=%s','product-click.php',$row['ID']) ?>" class="productsss">
            <input type="hidden" name="product_brand" value="<?php echo $row['brand']?>">
            <input type="hidden" name="product_name" value="<?php echo $row['name']?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image']?>">
            <?php
            echo "<div class='products'>";
            echo"<div>";?>
            <img src="includes/img/<?php echo $row['image'] ?>" alt="" class="product-img"><?php echo"</div>";
            echo"<div class='brand'>";echo $row['brand'];echo"</div>";
            echo"<div class='product-name'>";echo $row['name'];echo"</div>";
            echo"<div class='product-price'>";echo "US $".$row['price'];echo"</div>";
            echo"<div>";
            ?>
            <button class='' type='submit' name='mysubmitt'><i class='fa-solid fa-cart-shopping'></i></button>
            <?php
            echo"</div>";
            echo"</div>";
            ?>
            
            </a>
            </form>
            <?php
            
        }
        $j++;
    }
echo"</div>";
?>
<br><br>
<div class="news-letter">
    <div class="news-letter-heading">Join Our News Letter</div>
        <div class="nwsl">
            <div class="news-letter-notification">Get exclusive notifications on big sale discounts, New Arrivals and Top Picks
                that meet your style!</div>
            <div class="inputz">
                <div><input type="email" name="" id="" class="email" placeholder="Email"></div>
                <div><button type="submit" class="Subscribe">Subscibe</button></div> 
            </div>
        </div> 
</div>
    </div>
</div>
<br>
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