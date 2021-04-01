<?php include('component/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }




        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>


        <br><br>
        <!-- Button to Admin -->
        <a href="add-categories.php" class="btn-primary "> Add Category</a>
        <br /> <br /> <br />
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
            $q = $con->prepare("SELECT * FROM tbl_food");
            $q->execute();
            $count = $q->rowCount();
            $rows = $q->fetch();

            $sn = 1;
            if ($count > 0) {
                foreach ($q as $rows) {
                    $Id = $rows['Id'];
                    $title = $rows['Title'];
                    $image_name = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];
            ?>

                    <tr>

                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>

                        <td>
                            <?php
                            if ($image_name != "") {
                            ?>
                                <img src="../images/category/<?php echo $image_name ?>" width="100px" ?>
                            <?php

                            } else {
                                echo "<div class = 'error' > Image not Added</div>";
                            }

                            ?>
                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active;  ?></td>
                        <td>


                            <a href="update-category.php?id=<?php echo $rows["Id"] ?>&image_name=" <?php echo $rows["image_name"]; ?> class="btn-secondary ">Update Category</a>
                            <a href="delete-category.php?id=<?php echo $rows["Id"] ?>&image_name=" <?php echo $rows["image_name"]; ?> class="btn-danger ">Delete Category</a>
                        </td>
                    </tr>





                <?php


                }
            } else {

                ?>

                <td colspan="6">
                    <div class="error">No Category Added</div>
                </td>
                </tr>

            <?php

            }

            ?>












        </table>

    </div>
</div>


<?php include('component/footer.php') ?>