<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($user_name) && !empty($password))
        {
            // save details to database
            $user_id = random_num(8);
            $query = "insert into users (user_id, user_name, email, password) values ('$user_id', '$user_name', '$email', '$password')";

            mysqli_query($con,$query);

            header("Location: login.php");
            die;
        }
        else {
            echo "Please enter valid login information.";
        }
    }
?>

<?php include('resources/header.php'); ?>
	<div class="container">
		<h1>Sign Up</h1><br>
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
            
                <div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email"> <br>
					</div>
                </div>
                
				<div class="form-group">
					<label for="inputUsername" class="col-lg-2 control-label">Username</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="inputUsername" name="user_name" placeholder="Username"> <br>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputPassword" class="col-lg-2 control-label">Password</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password"> <br>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-l0 col-lg-offset-2">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button> <br> <br>
                    <a href="login.php">Click to Login</a>
				</div>
			</fieldset>
		</form>
	</div>
<?php include('resources/footer.php'); ?>