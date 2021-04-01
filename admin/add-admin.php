<?php include('component/menu.php');?>



<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br> <br> <br> <br> <br> <br>

<?php 

if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
   unset($_SESSION['add']) ;
}

?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td> Full Name: </td>
                    <td> <input required type="text" name="full_name" id="full_name" placeholder="Enter your name "></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td> <input required type="text" name="username" id="userName" placeholder="Your username " ></td>
                </tr>


                  
               

                <tr>
                    <td>Password:</td>
                    <td> <input required type="password"  id="password" name="password" placeholder="Your password " ></td>
                </tr>

                <tr>
                    <td class="Sub">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                    
                </tr>
                   

                  
            </table>
        </form>
      
    </div>
</div>




<?php 


        if(isset($_POST['submit']))
{
$pdo=new PDO("mysql:host=localhost;dbname=hosfood","root","");

  $full_name =$_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $q ="INSERT INTO tbl_admin(full_name , username ,Password) 
  VALUES (:f,:u , :p)";
  $r = $pdo->prepare($q);
  $r->execute(array(":f"=>$full_name,":u"=> $username,":p"=> $password ));
//  if($q==TRUE){
//      echo "Admin Added Successfully";

// //     
//  }
//  else {
//    echo "Failed to add admin";
// //     header('location:'.SITEURL.'admin/add-admin.php');
header('location: manage-admin.php');
// 
// }
 
}
  
     
//   }
?>


 


  
 
   



