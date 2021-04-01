  <?php include('connect.php'); ?> 

<html>
<head>
    <title> Login | admin</title>
    <link rel="stylesheet" href="../css/admin/admin.css">
     <link rel="stylesheet" href="../css/admin/normalise.css">
    </head>
<body>
    <div class="login">
        <h1 class="text-center">Login </h1>
   <br><br>
        <?php 
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
           unset($_SESSION['login']) ;
        }
        ?>
       
        <!--login form start here -->
        <form action="" method="POST">
     Username : <br> <br>
    <input type="text" name="username" placeholder=" Enter Username"> <br><br>
    
    Password : <br> <br>
    <input type="password" name="password" placeholder="Enter Password"> <br><br>

    <input type="submit" name="submit" value="login" class="btn-primary">
        </form>

         <!-- login form ends here -->


    </div>
</body>

</html>



<?php 
if (isset($_POST['submit'])) {

 echo  $username = $_POST['username'];
   $password = md5( $_POST['password']);

   $q=$con->prepare("SELECT * FROM tbl_admin WHERE username = '$username' AND
    password = '$password'  ");
   
   $q->execute();

   $count = $q->rowCount();

   if ($count != 0) {
    $_SESSION['login'] = "<div class='success'>Login successful.</div>";
   
    header('location: '.'index.php');

    
}
else{
    
    $_SESSION['login'] = $_SESSION['login'] = "<div class='error text-center'>Username Or Password did not match.</div>";
    header('location:login-admin.php');
}


    
}
?>