<?php
include "connect.php";
    

// Delete admin start ------------------------------------------------------
        if(isset($_GET['delete']))  
        {
            echo "delete";
            $id = $_GET['delete'];
                $q = $con->prepare("DELETE FROM `tbl_admin` WHERE Id= '$id'");

                $q->execute();
                if($q)
                {
                    header("Location: ./manage-admin.php");
                }
                   
        }

        


        





        
                        
                        
            