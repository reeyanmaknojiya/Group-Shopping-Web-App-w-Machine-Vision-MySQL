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
    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
        $user_name = $user_data['user_name'];
        $query = "select id from users where user_name = '$user_name'";

        $result = mysqli_query($con, $query);
        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                $id = $user_data['id'];
            }
        }
        //echo "Error! Could not find user";

        //$query2 = "select distinct groups.name AS 'Groups of User' from groups, group_memberships, users where groups.group_id = group_memberships.group_id and group_memberships.user_id = $id";
        $query = "SELECT g.group_name from group_memberships m join groups g on g.group_id = m.group_id where m.user_id = '$id'";
        $result = mysqli_query($con, $query);
        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $userGroups = [];
                while($row = mysqli_fetch_assoc($result)){
                    foreach($row as $key => $element) {
                        $new = array_push($userGroups, $element);
                        //echo $key . " - " . $element."<br />";
                    }
                  }
                mysqli_close($con);
            }
        }
    }
?>

<?php include('resources/header.php'); ?>
	<div class="container">
		<h1>Your Shopping Groups</h1><br>
		<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
            
                <?php
                for ($i=0; $i < count($userGroups); $i++) {
                    $temp_name = $userGroups[$i];
                    echo '<div class="form-group">
                    <div class="col-lg-10 col-lg-offset-1">
                        <button type="submit" name="submit" class="btn btn-primary">'.$userGroups[$i].'</button> <br>
                        </div>
                    </div>';
                    
                }
                ?>
				
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-1">
                    <a href="joinGroup.php">Join a New Group</a>
				</div>
			</fieldset>
		</form>
	</div>
<?php include('resources/footer.php'); ?>