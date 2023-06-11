<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $fname=$_POST["fn"];
    $lname=$_POST["ln"];
    $mobile=$_POST["m"];
    $nic=$_POST["n"];
    
    Database::iud("UPDATE `user` SET `fname`='".$fname."',`lname`='".$lname."',`mobile`='".$mobile."',`NIC`='".$nic."'
     WHERE`email`='".$_SESSION["u"]["email"]."'");

     echo("success");
}else{
    echo ("Please login first");
}
