<?php include('component/menu.php');?>
<?php include('connect.php') ?>


<div class=" main-content">
<div class="wrapper">
<h1>Update Admin</h1>



<?php 
//1 Get the id  of selected admin
$id =$_GET['id'];
$q = $con->prepare("SELECT *FROM `tbl_admin` WHERE Id= '$id'");

$q->execute();
if($q == TRUE)
{
  $count = $q->rowCount();
}
if ($count == 1)
{
    //echo 'Admin Available ';
    $row = $q->fetch();
    $full_name = $row['full_name'];
    $username = $row['username'];


  }
  else 
  {
  Header('location: manage-admin.php');
}
  




?>

<form action=""  method="POST">

    <table class="tbl-30">
   
   
                    <td> Full Name: </td> 
                    <td> <input required type="text" name="full_name" value="<?php echo $full_name ;?>"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td> <input required type="text" name="username"  value="<?php echo $username ;?>" ></td>
                </tr>
                 <td>  <input required name="id" value="<?php echo $id ;?>"></td>
                     </tr>

   

                <tr>

               <td colspan="2">
                   <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
               </td>
                </tr>
                <tr>
   

                </table>

</form>

</div>
</div>

<?php 

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
    //  //  // 
    $q = $con->prepare("UPDATE `tbl_admin` SET 
    full_name = '$full_name', username = '$username' WHERE id= $id");
    //   //   // 
    $q->execute();

    if ($q == TRUE) {
      $_SESSION['Update'] = "<div class='success' Admin Update Successfully.</din>";
      header('location: manage-admin.php');
     }else{
      $_SESSION['Update'] = "<div class='error' Failed To  Update Successfully.</din>";
      header('location: manage-admin.php');
     }

}

?>











