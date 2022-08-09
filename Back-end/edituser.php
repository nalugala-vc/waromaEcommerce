<?php
    require_once "includes/register-inc.php";
     $conn=mysqli_connect("localhost","root","","waroma");
    $select=mysqli_query($conn,"SELECT * FROM users");
   


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
</head>

<body>
    <div class="mycontain">
        <div class="main">
            <div class="muconny">
                <div class="logo-div">
                    <div class="loggo">
                        <p class="waroma">waroma</p>
                    </div>
                    <div><img src="reglogo.png" alt="" class="reglogo"></div>
                </div>
                <div class="registerr">
                    <div class="reg">Edit your users</div>
                    <form action="includes/register-inc.php" class="myform" method="post">
                        <select id="" class="categsel" name="Product ID">
                    <?php
                        while($r=mysqli_fetch_array($select)){
                    ?>

                        
                    <option value="<?php echo $r['Username'];?>"><?php echo $r['Username'];?></option>

    
                    <?php
                        }
                    ?>

                    </select>
                        <input type="text" id="" name="firstname" class="input" placeholder="First Name"><br>
                        <input type="text" id="" name="lastname" class="input" placeholder="Last Name"><br>
                        <input type="text" id="" name="age" class="input" placeholder="Age"><br>
                        <input type="text" id="" name="username" class="input" placeholder="Username"><br>
                        <input type="text" id="" name="email" class="input" placeholder="Email"><br>
                        <input type="password" id="" name="password" class="input" placeholder="Password"><br>
                        <input type="password" id="" name="confirm" class="input" placeholder="Confirm Password"><br>
                        <input type="text" id="" name="phoneno" class="input" placeholder="Phone Number"><br>
                        <button class="button" type="submit" name="submit">Submit</button>
                        
            
                    </form>
                </div>
            
            </div>
        </div>
    </div>
    <br>
    <div class="main-footerr">
        <footer class="main-footer" id="footer">
            <div class="mylogg"><div class="mylognm">waroma</div><img src="reglogo.png" alt="" class="reglogo"></div>
        </footer>
    </div>
    
</body>
</html>