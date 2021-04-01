<?php include('component/menu.php'); ?>
<?php include('connect.php') ?>


<div class=" main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br>
        <?php
        if (isset($_GET['id'])) {
            // echo 'getting the data ';

            $id = $_GET['id'];
            $q = $con->prepare("SELECT *FROM `tbl_food` WHERE Id= '$id'");

            $q->execute();
            $count = $q->rowCount();

            if ($count == 1) {
                //echo 'Admin Available ';
                $rows = $q->fetch();
                $title = $rows['Title'];
                $current_image = $rows['image_name'];

                $featured = $rows['featured'];
                $active = $rows['active'];
            } else {
                Header('location:manage.category.php');
            }
        }

        ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">


                <tr>
                    <td> title: </td>
                    <td>
                        <input required type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image : </td>
                    <td>
                        <?php
                        if ($current_image != "") {

                        ?>
                            <img src="../images/category/<?php echo $current_image ?>" width="100px">

                        <?php

                        } else {

                            echo " <div> class ='error' > image not added</div> ";
                        }

                        ?>
                    </td>
                </tr>


                <tr>
                    <td> New Image : </td>
                    <td>
                        <input required type="file" name="image" value="<?php echo $id; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Featured : </td>

                    <td>
                        <input <?php if ($featured == "Yes") {
                                    echo "Checked";
                                } ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if ($featured == "No") {
                                    echo "Checked";
                                } ?>type="radio" name="featured" value="No"> No

                    </td>
                </tr>
                <tr>

                    <td>Action : </td>
                    <td>
                        <input <?php if ($active == "Yes") {
                                    echo "Checked";
                                } ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if ($active == "No") {
                                    echo "Checked";
                                } ?> type="radio" name="active" value="No"> No

                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>




            </table>
        </form>

        <?php

        if (isset($_POST['submit'])) {

            // $current_image = $_POST['current_image'];


            //   $nomPhoto=isset($_FILES['img']['name'])?$_FILES['img']['name']:"";
            //   $imageTemp=$_FILES['img']['tmp_name'];
            //   move_uploaded_file($imageTemp,"../img/".$nomPhoto);

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];
                // $image_name = "";
                if ($image_name != "") {
                    $ext = end(explode('.', $image_name));

                    $image_name = "Food_category_" . rand(000, 999) . '.' . $ext;

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/" . $image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];
                    if ($upload) {
                        $q = $con->prepare("UPDATE `tbl_food` SET 
                             title = '$title', featured = '$featured' , active = ' $active', image_name='$image_name' WHERE id= $id");
                        //   //   // 
                        $q->execute();

                        if ($q == TRUE) {
                            $_SESSION['Update'] = "<div class='success' Category Update Successfully.</din>";
                            header('location: manage.category.php');
                            // echo 'updated';
                        } else {
                            $_SESSION['Update'] = "<div class='error' Failed To  Update Category.</din>";
                            header('location: manage.category.php');
                            // echo 'error';
                        }
                    } else {
                        $_SESSION['upload'] = "<div class='error'>Failed To Upload.</div>";
                        header('location:add-categories.php');
                    }
                }
            } else {
                $image_name = $current_image;
            }
        }

        ?>

    </div>
</div>