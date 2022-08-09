<?php

require_once 'includes/header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sellerrlogin.css">
    <title>Document</title>
</head>

<body>
    <div class="mycontain">
        <div class="main">
            <div class="maincont">
                <div class="container">
                    <div class="hello">Hello Friend</div>
                    <div class="new">New to Waroma? Sign up here!</div>
                    <div class="signupbtn"><button class="sign-up" onclick="window.location.href='registerr.php'">sign-up</button></div>
                </div>
                <div class="container2">
                    <div class="login">Login to Your Account</div>
                    <br>
                    <form action="includes/Userlogin-inc.php" class="myform" method="post">
                        <input type="text" name="username" placeholder="Username" class="input">
                        <input type="password" name="password" id="" placeholder="Password" class="input">
                        <div class="mybutonz">
                            <div class="loginbtn"><button class="loginn" type="submit" name="submit">login</button><br></div>
                            <div class="loginbtn b1"><button class="loginn">sign-up</button><br></div>
                        </div>
                    </form>
                    <div class="link-cont">
                        <div><a href="sellerlogin.php" class="links">Seller? Login Here</a></div>
                        <div><a href="adminlogin.php" class="links">Admin?? Login Here</a><br></div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>