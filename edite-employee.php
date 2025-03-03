<?php include "design/header.php";?>
<?php include "database.php";?>
<?php include "design/navbar.php";?>

   
    
<?php 
$db = new Database();
$row = $db->find('employees',$_GET['id']);

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

        if(!empty($password))
        {
            $password   = trim(htmlentities(htmlspecialchars( $_POST['password'])));
            if (strlen($password) >= 6) 
            {
                $password = $db->enc_password($password); 
            }
            else 
            {
                $error = "password Must be Grater Than 6 chars !";
            }

        }
        else 
        {
            $password = $row['password'];
        }
            
                $sql = "UPDATE employees SET `name`='$name',`email`='$email',`department`='$department',
                `password`='$password' WHERE `id`='$row[id]' ";
                $success = $db->update($sql);
            
                        
        }
    }
      





?>

<?php if(isset($_GET['id']) && is_numeric($_GET['id'])):?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Edit Employee </h2>
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
                    <input type="text" name="name" class="form-control" id="name"  placeholder="Enter name" value="<?php echo $row['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" name="department" class="form-control" id="department"  placeholder="Enter department"  value="<?php echo $row['department'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $row['email'] ?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $row['password'] ?>">
                </div>
            
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php endif; ?>




<?php include "design/footer.php";?>