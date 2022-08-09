<?php
$conn=mysqli_connect("localhost","root","","waroma");
$select=mysqli_query($conn,"SELECT * FROM category");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="adminproducts.css?v=<?php echo time()?>">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <nav class="main-nav">
            
            <div class="name">PProducts</div>
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
        <div class="form">
            <div class="cat">Categories </div>
            <form action="includes/categories.php" method="post" class="myform" >
                <input type="text" placeholder="Category Name" name="name" class="input" ><br>
                <div class="mybutton"><button type="submit" class="button">submit</button></div>
            </form>
            <div class="cat">Sub-Categories</div>
            <form action="includes/subcat.php" method="post" class="myform">
                <input type="text" name="name"placeholder="Sub-Category Name" class="input"><br>
                <label for="" class="headaa">category</label>
                        <select id="" class="categsel" name="categoryname">
                    <?php
                        while($r=mysqli_fetch_array($select)){
                    ?>

                        
                    <option value="<?php echo $r['Name'];?>"><?php echo $r['Name'];?></option>

    
                    <?php
                        }
                    ?>

                    </select><br>
                <div class="mybutton"><button type="submit" class="button">submit</button></div>
            </form>
            </div>
            <div><button class="mybutton" onclick="window.location.href='adminproducts2.php'"><i class="fa-solid fa-arrow-right"></i></button></div>
    
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