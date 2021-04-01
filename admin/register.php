 <?php
include "connect.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //assign Variables
    $first =  $_POST['first'];
    $last =  $_POST['last'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];

    $hashPass = sha1($password );
    $stmt = $con->prepare("INSERT INTO `register` (`first`, `last`, `email`, `password`) VALUES ( '$first', '$last', '$email', '$password');");
    $stmt->execute();
    header("location:login.html");
}