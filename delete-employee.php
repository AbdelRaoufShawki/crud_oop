<?php include "design/header.php";?>
<?php include "database.php";?>
<?php include "design/navbar.php";?>


<?php 
$db = new Database();
$row = $db->find('employees',$_GET['id']);?>


<div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Welcome </h2>
            </div>
    
         
            
            <h2 class="p-2 col text-center mt-5  alert alert-success"> <?php echo $db->delete("employees",$row['id']); ?>  </h2>
           
            
            
        </div>
    </div>


<?php include "design/footer.php";?>