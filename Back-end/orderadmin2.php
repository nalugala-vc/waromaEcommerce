<?php
    require_once "includes/header.php";
    require "includes/database.php";
    $sql=mysqli_query($conn,"SELECT * FROM `bought items`");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productdisplay.css?v=<?php echo time()?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Josefin+Sans&family=Just+Another+Hand&family=Pacifico&family=Roboto+Condensed:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="header_fixed">
        <div class="ogg"><h2>Ordered Goods</h2></div>
        <table>
        <tr>
            <thead>
                <th>Image </th>
                <th>Username </th>
                <th>Name </th>
                <th>Price </th>
                <th>Brand </th>
                <th>Quantity </th>
                <th>Payment type</th>
                <th>Status</th>
                <th>Date added</th>
            </thead>
            
            
        </tr>
        <?php
        while($row=mysqli_fetch_array($sql)){
            echo "<tr bgcolor=' #C5F0FA'>";
            echo "<td>";
            ;?>
            <img src="includes/img/<?php echo $row['image'] ?>" alt="" class="product-img">
            <?php
            echo"</td>";
            echo "<td>";
            $ID=$row['UserID'];
            $sql2=mysqli_query($conn,"SELECT `Username` FROM users WHERE ID='$ID'");
            $row2=mysqli_fetch_array($sql2);
            echo $row2[0];
            echo"</td>";
            echo "<td>";
            echo $row['name'];
            echo"</td>";
            echo "<td>";
            echo $row['Price'];
            echo"</td>";
            echo "<td>";
            echo $row['brand'];
            echo"</td>";
            echo "<td>";
            echo $row['Quantity'];
            echo"</td>";
            echo "<td>";
            $ID=$row['Payment type'];
            $sql3=mysqli_query($conn,"SELECT `Name` FROM payement WHERE ID='$ID'");
            $row3=mysqli_fetch_array($sql3);
            echo $row3[0];
            echo"</td>";
            echo "<td>";
            echo $row['Status'];
            echo"</td>";
            echo "<td>";
            echo $row['Date added'];
            echo"</td>";
            echo "</tr>";


        }


        ?>
    </table>
    <br>
    <div class="ogg"><button class="button" onclick="window.location.href='Orderdetails.php'">Order Details</button></div>
    
    </div>

    </div>
</body>
</html>