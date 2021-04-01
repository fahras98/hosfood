<?php include "./connect.php";
    if (isset($_GET['id']) && isset($_GET['image_name']) ) {
//   echo 'get value';

            $id = $_GET['id'];
            $image_name = $_GET['image_name'];
            if ($image_name != "") {
                $path="/images".$image_name;
                $remove = unlink($path);
            }
           

             }
             $q = $con->prepare("DELETE FROM `tbl_food` WHERE Id= '$id' ");
             $q->execute();
             if($q)
             {
                $_SESSION['delete'] = "<div class='success'>Category Deleted.</div>";

                 header("Location: ./manage.category.php");
             }


   

?>