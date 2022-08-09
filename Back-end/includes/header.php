<?php

session_start();
require_once 'database.php';
require_once 'register-inc.php';

if (isset($_SESSION['sessionid'])){
    $Username=$_SESSION['sessionuser'];
    $Userid=$_SESSION['sessionid'];

}else{
    $Username="login";
}




?>

