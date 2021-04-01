<?php include('component/menu.php') ?>
<?php include('./connect.php') ?>

     
<!-- main content section start-->
<div class=" main-content">
<div class="wrapper">
     <h1>Manage Admin</h1>
    
    

    <br> 
    <?php 
    if(isset($_SESSION['Update']))
    {
        echo $_SESSION['Update'];
        unset ($_SESSION['Update']);
    }
    ?>
  <!-- Button to Admin -->
  <a href="add-admin.php" class="btn-primary "> Add Admin</a>
   <br> <br> <br> <br>
       <table class="tbl-full">
           <tr>
               <th>S.N.</th>
               <th>Full Name</th>
               <th>Username</th>
               <th>Actions</th>
           </tr>

           <?php 
        
           
           
               $q = "SELECT * FROM tbl_admin ";    //query to get all admin
               
           
           $pdo=new PDO("mysql:host=localhost;dbname=hosfood","root","");
           
               $r = $pdo->prepare($q);
               //execute the query
               $r -> execute();
           // check whether the query is executed   or not
           {
               $count = $r->fetchAll();
            //    $cont = $r->rowCount();
               // check the num of rows
               if( $count > 0 ) {
                   // We have data in database
                   foreach ($count as $rows)
                   {
                       $Id=$rows["Id"] ;
                       $Full_Name=$rows["full_name"];
                       $username=$rows["username"];
                       
                       // display the values in our table
                       ?>
                   
                   <tr>
                      <td><?php echo $Id ; ?> .</td>
                      <td><?php echo $Full_Name ; ?></td>
                      <td><?php echo $username ; ?></td>
       
                     <td> 


                                <a href="Update-adm.php?id=<?php echo $rows["Id"]?>"   class="btn-secondary"> Update Admin </a>
                               <a href="process.php?delete=<?php echo $rows["Id"] ?>"   class="btn-danger" > Delete Admin</a>
                               <!-- <input type="submit" name="Update" value="Update Admin" class="btn-secondary">
                               <input  type="submit" name="Delete" value="Delete Admin" class="btn-danger"> -->
                       
                       </td>
                   </tr>
                   <?php  
                   }
                   }
                   else {
                       print "there is nothing to show.";
                   }
               }
               ?>




                
                     
               
            </table>
            
        </div>
        </div>
                    
              
          
   
               

               
                

                
                    
               
                   
                    
 
    
    

            
            
            
            





                
            
<!--  main content section end-->
     

     
                   
                  
                    
                    

                    

                  
                  
                    


                          
                  
                           
                       
                         
                           
           
            
                           
                           
            