<?php

session_start();

    include("connection.php");
    include("functions.php");

    //Check if user is logged in or not 
    $user_data = check_login($con);
    if(!isset($_SESSION['user_id']))
    {
        header("Location: login.php");
        die;
    }
?>

<?php include('resources/header.php'); ?>
	<div class="container">
		<h1>All Shopping Groups</h1><br>
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
            
                <div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Grocery</label>
					<div class="col-lg-10">
                    <button type="submit" name="submit" class="btn btn-primary">Join</button> <br>
					</div>
                </div>
                
				<div class="form-group">
					<label for="inputUsername" class="col-lg-2 control-label">Electronics</label>
					<div class="col-lg-10">
                    <button type="submit" name="submit" class="btn btn-primary">Join</button> <br>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputPassword" class="col-lg-2 control-label">Clothing</label>
					<div class="col-lg-10">
                    <button type="submit" name="submit" class="btn btn-primary">Join</button> <br>
					</div>
                </div>
                
                <div class="form-group">
					<label for="inputPassword" class="col-lg-2 control-label">Sports</label>
					<div class="col-lg-10">
                    <button type="submit" name="submit" class="btn btn-primary">Join</button> <br>
					</div>
                </div>
                
                <div class="form-group">
					<label for="inputPassword" class="col-lg-2 control-label">Sneakers</label>
					<div class="col-lg-10">
                    <button type="submit" name="submit" class="btn btn-primary">Join</button> <br> <br>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-l0 col-lg-offset-2">
                    <a href="groupsPage.php">My Groups</a>
				</div>
			</fieldset>
		</form>
	</div>
<?php include('resources/footer.php'); ?>