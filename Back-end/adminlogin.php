<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminlogin.css?v=<?php echo time();?>">
    <title>Document</title>
</head>

<body>
    <div class="container2">
        <div class="login">Login to Your Account</div>
        <br>
        <form action="includes/adminlogin-inc.php" class="myform" method="post">
            <input type="text" placeholder="Username" name="username" class="input">
            <input type="password" name="password" id="" placeholder="Password" class="input">
            <div class="loginbtn"><button class="loginn" name="submit" type="submit">login</button><br></div>
        </form>
        <div class="link-cont">
            <div><a href="sellerlogin.php" class="links">Buyer? Login Here</a></div>
            <div><a href="userrlogin.php" class="links">User? Login Here</a><br></div>

        </div>

    </div>

</body>

</html>