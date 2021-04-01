<?php include('component/menu.php') ?>

     
     
     <!-- main content section start-->
     <div class=" main-content">
     <div class="wrapper">
          <h1>Dashboard</h1>
          <?php 
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
           unset($_SESSION['login']) ;
        }
        ?>

         <div class="col-4">
             <h3>5 Categories </h3>
            </div>

            <div class="col-4">
             <h3>5 Categories </h3>
            </div>

            <div class="col-4">
             <h3>5 Categories </h3>
            </div>

            <div class="col-4">
             <h3>5 Categories </h3>
            </div>

          <div class="clearfix"></div>
          
            
             
      </div>
      </div>
     <!--  main content section end-->
    
     
    
