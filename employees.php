<?php include "design/header.php";?>
<?php include "database.php"?>
<?php include "design/navbar.php";?>

   
    

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="p-3 col text-center mt-5 text-white bg-primary">  All Employees </h2>
            </div>

            <?php $db = new Database();
            ?>
            <div class="col-sm-12">
            <table class="table table-dark">
                <thead >
                       <tr>
                           <th scope="col">id</th>
                           <th scope="col">name</th>
                           <th scope="col">Department</th>
                           <th scope="col">Email</th>
                           <th scope="col">Edit</th>
                           <th scope="col">Delete</th>
                       </tr>
                </thead>
                  <tbody>
                    <?php foreach( $db->select("employees") as $select):?>
                    <tr>
                        <td><?php echo $select["id"]?></td>
                        <td><?php echo $select["name"]?></td>
                        <td><?php echo $select["department"]?></td>
                        <td><?php echo $select["email"]?></td>
                        <td>
                            <a href="edite-employee.php?id=<?php echo $select['id']?>"class="text-primary">
                            <i class="fa fa-pencil-square-o fa-2x" ></i>
                            </a>
                        </td>
                        <td>
                            <a href="delete-employee.php?id=<?php echo $select['id']?>"class="text-danger">
                            <i class="fa fa-times fa-2x" ></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </div>
        </div>
    </div>
    




<?php include "design/footer.php";?>