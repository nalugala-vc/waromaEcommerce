<?php
    require_once "includes/header.php";
    require "includes/database.php";
    $sql=mysqli_query($conn,"SELECT * FROM `orderdetails`");

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
        <div class="ogg"><h2>Orders</h2></div>
        <table>
        <tr>
            <thead>
                <th>ID </th>
                <th>Date </th>
                <th>Username </th>
                <th>Total Amount</th>
                <th>Status </th>
                <th>Payement Type</th>
                <th>Is Deleted</th>
            </thead>
            
            
        </tr>
        <?php
        while($row=mysqli_fetch_array($sql)){
            echo "<tr bgcolor=' #C5F0FA'>";
            echo "<td>";
            echo $row['ID'];
            echo"</td>";
            echo "<td>";
            echo $row['Date'];
            echo"</td>";
            echo "<td>";
            $ID=$row['User_Id'];
            $sql2=mysqli_query($conn,"SELECT `Username` FROM users WHERE ID='$ID'");
            $row2=mysqli_fetch_array($sql2);
            echo $row2[0];
            echo"</td>";
            echo "<td>";
            echo $row['amount'];
            echo"</td>";
            echo "<td>";
            echo $row['status'];
            echo"</td>";
            echo"<td>";
            $ID=$row['payementType'];
            $sql3=mysqli_query($conn,"SELECT `Name` FROM payement WHERE ID='$ID'");
            $row3=mysqli_fetch_array($sql3);
            echo $row3[0];
            echo"</td>";
            echo "<td>";
            echo $row['isDeleted'];
            echo"</td>";
            echo "</tr>";


        }


        ?>
    </table>
    <br>
    <div class="ogg"><button class="button" onclick="window.location.href='orderadmin2.php'">Ordered Goods</button></div>
    
    </div>

    </div>
</body>
</html>