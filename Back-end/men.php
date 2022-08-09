<?php
    require_once "includes/header.php";
    require "includes/database.php";
    $sql=mysqli_query($conn,"SELECT * FROM products");

    if(isset($_POST['mysubmittit'])){
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
    <title>Document</title>
    <link rel="stylesheet" href="men.css?v=<?php echo time()?>">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
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
                <li><a  href="index.php">Home</a></li>
                <li><a class="active" href="men.php">Men</a></li>
                <li><a href="women.php">Women</a></li>
                <li><a href="kids.php">Kids</a></li>
                <li><a href="account.php" class="account"><img src="account.png" id="user" alt="">
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
        echo"<div class='container'>";

        $j=1;
        while($j>0){
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
            <button class='' type='submit' name='mysubmittit'><i class='fa-solid fa-cart-shopping'></i></button>
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