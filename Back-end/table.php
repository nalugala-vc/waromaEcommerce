<?php
    require_once "includes/header.php";
    require "includes/database.php";
    $sql=mysqli_query($conn,"SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userdisplay.css?v=<?php echo time()?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Josefin+Sans&family=Just+Another+Hand&family=Pacifico&family=Roboto+Condensed:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="header_fixed">
        <table>
            <thead>
                <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>ID</th>
                <th>Age</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone No</th>
                <th>Action</th>
        </tr>
            </thead>
        <?php
        while($row=mysqli_fetch_array($sql)){
            echo "<tr bgcolor=' #C5F0FA'>";
            echo "<td>";
            echo $row['FirstName'];
            echo"</td>";
            echo "<td>";
            echo $row['LastName'];
            echo"</td>";
            echo "<td>";
            echo $row['ID'];
            echo"</td>";
            echo "<td>";
            echo $row['Age'];
            echo"</td>";
            echo "<td>";
            echo $row['Username'];
            echo"</td>";
            echo "<td>";
            echo $row['Email'];
            echo"</td>";
            echo "<td>";
            echo $row['Password'];
            echo"</td>";
            echo "<td>";
            echo $row['PhoneNo'];
            echo"</td>";
            echo "<td>";
            ?>
             <button onclick="window.location.href='edituser.php'">Edit</button>
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