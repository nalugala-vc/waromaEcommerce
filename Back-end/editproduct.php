<?php
$conn=mysqli_connect("localhost","root","","waroma");
$select=mysqli_query($conn,"SELECT * FROM category");
$select2=mysqli_query($conn,"SELECT * FROM `sub-categories`");
$select3=mysqli_query($conn,"SELECT * FROM products");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="adminprod.css?v=<?php echo time()?>">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <nav class="main-nav">
            <div class="name">pProducts</div>
        </nav>
        <div class="logo">
            <p class="logo-name">waroma shop</p> <img src="shopping cart.png" alt="" id="sc1">
        </div>
    </header>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo-namee">waroma shop</div>
            <div class="logo">
                <img src="reglogo.png" alt="" id="sc2">
            </div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
        <ul class="nav-links">
            <li>
                <a href="">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-user-group"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-users"></i>
                    <span>Sellers</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-hat-cowboy"></i>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-dollar-sign"></i>
                    <span>Sales</span>
                </a>
            </li>
        </ul>
    
    </div>
    <div class="cate">
        <div class="arrowbut"><button class="mybutton" onclick="window.location.href='adminproducts.php'"><i class="fa-solid fa-arrow-left"></i></button></div>
        <div class="mydivfom">
            <div class="form">
            <div class="cat">Edit Your Products</div>
            <form action="includes/Products.php" method="post" enctype="multipart/form-data">
                <div class="myform">
                    <div class="fom1">
                        <select id="" class="categsel" name="Product ID">
                    <?php
                        while($r=mysqli_fetch_array($select3)){
                    ?>o

                        
                    <option value="<?php echo $r['name'];?>"><?php echo $r['name'];?></option>

    
                    <?php
                        }
                    ?>

                    </select>
                    <input type="text" name="brand" placeholder="Brand" class="input"><br>
                    <input type="text" name="name" placeholder="Name" class="input"><br>
                    <input type="text" name="description" placeholder="Description" class="input"><br>
                    <input type="number" name="price" id="" step="0.01" placeholder="Price" class="input"><br>
                    <input type="number" name="quantity" id="" placeholder="Quantity" class="input"><br>
                    .0

                </div>

                <div class="fom1">
                    <label for="" class="head">Sizes Available</label><br><br>
                    <input type="number" name="small" id="" class="input" placeholder="Small"><br>
                    <input type="number" name="medium" id="" class="input" placeholder="Medium"><br>
                    <input type="number" name="large" id="" class="input" placeholder="Large"><br><br>

                </div>
                </div>
                <div>
                    <div class="myselect">
                        <label for="" class="headaa">category</label>
                        <select id="" class="categsel" name="categoryname">
                    <?php
                        while($r=mysqli_fetch_array($select)){
                    ?>

                        
                    <option value="<?php echo $r['Name'];?>"><?php echo $r['Name'];?></option>

    
                    <?php
                        }
                    ?>

                    </select>
                    <label for="" class="headaa">subcategory</label>
                    <select  id="" class="categsel" name="subcategoryname">
                    <?php
                        while($r=mysqli_fetch_array($select2)){
                    ?>                  
                    <option  value="<?php echo $r['Name'];?>"><?php echo $r['Name'];?></option>
                    <?php
                        }
                    ?>

                    </select>
            
            
                <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png" class="i1"><br>

                    </div>
                    
                <div class="heada"><label for="" class="head">Colours Available</label></div><br>
                <div class="mycolcontain">
                    <div><label for="small">Colour #1</label><input type="color" name="color1" id=""></div><br>
                    <div><label for="medium">Colour #2</label><input type="color" name="color2" id=""></div><br>
                    <div><label for="large">Colour #3</label><input type="color" name="color3" id=""></div><br>
                    <div><label for="large">Colour #4</label><input type="color" name="color4" id=""></div><br>
                    <div><label for="large">Colour #5</label><input type="color" name="color5" id=""></div>
                </div>
                

                </div>
                <br>
                <br>
                
                <div class="mybutton"><button type="submit" class="button" name="submit">submit</button></div>
            </form>
            
        </div>

        </div>
        <div class="arrowbut"><button class="mybutton" onclick="window.location.href='productdisplay.php'"><i class="fa-solid fa-arrow-right"></i></button></div>
        
        
    </div>
    <!--Javascript-->
    <script type="text/javascript">
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        }


    </script>

</body>

</html>