<?php
    require_once "includes/header.php";
    require "includes/database.php";
    $sql=mysqli_query($conn,"SELECT * FROM products");

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
        <table>
        <tr>
            <thead>
                <th>ID</th>
                <th>Image</th>
                <th>CategoryID</th>
                <th>subCategoryID</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Price</th>
                <th>description</th>
                <th>Action</th>
            </thead>
            
            
        </tr>
        <?php
        while($row=mysqli_fetch_array($sql)){
            echo "<tr>";
            echo "<td>";
            echo $row['ID'];
            echo"</td>";
            echo "<td>";?>
            <img src="includes/img/<?php echo $row['image'] ?>" alt="" class="product-img">
            <?php echo"</td>";
            echo "<td>";
            echo $row['CategoryID'];
            echo"</td>";
            echo "<td>";
            echo $row['subCategoryID'];
            echo"</td>";
            echo "<td>";
            echo $row['brand'];
            echo"</td>";
            echo "<td>";
            echo $row['name'];
            echo"</td>";
            echo "<td>";
            echo $row['price'];
            echo"</td>";
            echo "<td>";
            echo $row['description'];
            echo"</td>";
            echo "<td>";
            ?>
             <button onclick="window.location.href='editproduct.php'">Edit</button>
             <?php
            echo"</td>";          
            echo "</tr>";

        }


        ?>
    </table>
    <div class="mybutony">
    <button class="adda">Add</button>
    <button class="adda">Edit</button>
    </div>

    </div>
</body>
</html>