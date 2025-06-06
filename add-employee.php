<?php include "design/header.php";?>
<?php include "database.php";?>
<?php include "design/navbar.php";?>

   
    
<?php 

$error = "";
$success = "";

if(isset($_POST["submit"])) {

    $name = trim(htmlspecialchars( htmlentities($_POST['name'])));
    $department = trim(htmlspecialchars( htmlentities( $_POST['department'])));
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $password =  trim(htmlspecialchars( htmlentities( $_POST['password'])));



    if(empty($name) || empty($department) || empty($email) || empty($password)) {

        $error = " Please fill in the fields ";

    } else {

        if(strlen($password) > 6) {

            $db = new Database();
            $newPassword= $db->enc_password($password);
            $sql = "INSERT INTO employees (`name`,`department`,`email`,`password`) 
                 VALUES ('$name','$department',' $email',' $newPassword') ";
            $success= $db->insert($sql);

        } else {

            $error = " Please must be than 6 char";
        }
    }
}

?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Add New Employee </h2>
        </div>

        <div class="col-sm-12">
            <?php if($error !=''): ?>
            <h2 class="p-2 col text-center mt-5  alert alert-danger"> <?php echo $error; ?>  </h2>
            <?php endif; ?>

            <?php if($success !=''): ?>
            <h2 class="p-2 col text-center mt-5  alert alert-success"> <?php echo $success; ?>  </h2>
            <?php endif; ?>
        </div>
        <div class="col-sm-12">
            <form method="post" >
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name"  placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" name="department" class="form-control" id="department"  placeholder="Enter department">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>





<?php include "design/footer.php";?>