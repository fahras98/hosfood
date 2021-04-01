<?php
include "connect.php";

    
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //assign Variables
    $email =  $_POST['email'];
    $password =   $_POST['password'];
    $hashPass = sha1($password );

    $stmt = $con->prepare("SELECT * FROM `register` where `email`= '$email'  and `password` = '$password'");
    $stmt->execute();
    $row = $stmt->fetchAll();
    $count = $stmt->rowCount();
        echo $count;
        if($count == 1){
           
            header("location:../index.html");
           
        }else{
            echo "not exist";
        }
    
    
}