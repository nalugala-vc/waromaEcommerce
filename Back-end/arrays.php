<?php
require "includes/database.php";

$sql="SELECT `FirstName`, `LastName`, `ID`, `Age`, `Username`, `Email`, `Password`, `PhoneNo` FROM `users`";
        
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);

        print_r($result);
if(mysqli_num_rows($result)>0){

    
    echo"<pre>";
    print_r($row);
    echo"</pre>";

    while($row=mysqli_fetch_assoc($result)){
        echo"First Name:".$row["FirstName"];
        echo "<br>";
    }
}
