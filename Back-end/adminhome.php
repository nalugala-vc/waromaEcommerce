<?php
    require "includes/functions.php";
    require "includes/database.php";
    $sql=mysqli_query($conn,"SELECT * FROM `bought items` ORDER BY ID DESC LIMIT 5");
    $sql4=mysqli_query($conn,"SELECT * FROM `users` ORDER BY ID DESC LIMIT 4");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="adminhome.css?v=<?php echo time()?>">
    <title>Document</title>
</head>
<body>

    <header class="header">
        <nav class="main-nav">
            <div class="name"> aAdmin</div>
            <div class="name">Dashboard</div>
        </nav>
        <div class="logo"><p class="logo-name">waroma shop</p> <img src="shopping cart.png" alt="" id="sc1"> </div>
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
                        <i class="fa-solid fa-chart-line" ></i>
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
        <div class="container">
                <a href="table.php" class="adlink"><div class="con">
                    <div class="sub-con">
                        <div><?php numRows("users")?></div>
                        <div>Users</div>
                    </div>
                    <div>
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div></a>
                <div class="con">
                    <div class="sub-con">
                        <div><?php sales()?></div>
                        <div>Sales</div>
                    </div>
                    <div>
                        <i class="fa-solid fa-sack-dollar"></i>
                    </div>
                </div>
                <a href="orderadmin2.php" class="adlink">
                    <div class="con">
                    <div class="sub-con">
                        <div class="count"><?php numRows("orderdetails")?></div>
                        <div>Orders</div>
                    </div>
                    <div>
                        <i class="fa-brands fa-cc-amazon-pay"></i>
                    </div>
                </div>
                </a>
                <a href="adminproducts.php" class="adlin"><div class="con con1">
                    <div class="sub-con con1">
                        <div class="count"><?php numRows("products")?></div>
                        <div>Products</div>
                    </div>
                    <div>
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                </div></a>
            
            
            </div>
            <div class="container2">
                <div class="container3">
                    <div class="headi">
                        <div class="LO">Latest Orders</div>
                        <button onclick="window.location.href='orderadmin2.php'">See All</button>
                    </div>
                    <?php while($row=mysqli_fetch_array($sql)){
                            ?>
                    <div class="OI">
                        <div class="order-info">
                            <div><?php echo $row['ID']?></div><br>
                            <div><?php 
                            $ID=$row['UserID'];
                            $sql2=mysqli_query($conn,"SELECT `Username` FROM users WHERE ID='$ID'");
                            $row2=mysqli_fetch_array($sql2);
                            echo $row2[0]?></div>
                            <div class="email"><?php 
                            $ID2=$row['UserID'];
                            $sql3=mysqli_query($conn,"SELECT `Email` FROM users WHERE ID='$ID2'");
                            $row3=mysqli_fetch_array($sql3);
                            echo $row3[0]?></div>
                            <div><?php echo $row['Price']?></div>
            
                        </div>
                        
                        <div><?php echo $row['Date added']?></div>
                        
            
                    </div>
                    <?php
                        }
                        ?>
            
                </div>
            
                <div class="container4">
                    <div class="headi">
                        <div class="LO">New Customers</div>
                        <button onclick="window.location.href='table.php'">See All</button>
                    </div>
                    <?php while($rows=mysqli_fetch_array($sql4)){
                        ?>
                    
                    <div class="OI">
                        <div class="order-info">
                            <div><i class="fa-solid fa-user"></i></div>
                            <div class="index2"><?php echo $rows['Username']?></div>
                        </div>
                        <div>
                            <i class="fa-solid fa-user"></i>
                            <i class="fa-solid fa-at"></i>
                            <i class="fa-solid fa-phone"></i>
                        </div>
            
                    </div>
                    <?php
                    }
                    ?>
            
                </div>
            
            
            
            </div>

                <!--Javascript-->
                <script type="text/javascript">
                    let btn=document.querySelector('#btn');
                    let sidebar = document.querySelector('.sidebar');

                    btn.onclick=function(){
                        sidebar.classList.toggle("active");
                    }
            

                </script>


    
    
    
</body>
</html>