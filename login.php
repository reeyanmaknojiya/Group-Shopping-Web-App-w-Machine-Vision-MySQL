<?php

session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password))
        {
            // read details from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "Wrong username or password!";
        }
        else {
            echo "Please enter valid login information.";
        }
    }
?>

<?php include('resources/header.php'); ?>
	<div class="container">
		<h1>Login</h1><br>
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
			
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
                    <a href="signup.php">Click to Sign Up</a>
				</div>
			</fieldset>
		</form>
	</div>
<?php include('resources/footer.php'); ?>