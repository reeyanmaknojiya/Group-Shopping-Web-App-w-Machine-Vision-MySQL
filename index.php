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

<?php include('resources/index_header.php'); ?>

    <div class="container">
        <title>My Website</title><br>
        <body>
        Hello, <?php echo $user_data['user_name']; ?> ! <br>
        <a href="logout.php">Logout</a>
        <h1>This is the index page.</h1>
        
        <br>
        
        </body>
    </div>

<?php include('resources/footer.php'); ?>