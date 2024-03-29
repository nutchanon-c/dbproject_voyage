<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Homepage</title>
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class='container'>
  

       
        <div class="admin_menu">
        <nav class='navbar'>
            <!-- link to Admin Home Page -->
            <a href='admin_home.php' class='navbar-brand'>Admin Home</a>
            <div class="navmenu">
            <list class="Llink">
                <ul>
                    <li><a href='admin_hotel.php'>Hotel Information</a></li>
                    <li><a href='admin_userinfo.php'>User Information</a></li>
                    <li><a href='admin_reservation.php'>Reservation Information</a></li>
                    <li><a href='admin_transaction.php'>Transaction Information</a></li>
                    <li><a href='admin_comment.php'>User Comment</a></li>
                    <li><a href='admin_addser.php'>Additional Service</a></li>
                    <li><a href='admin_Staff.php'>Staff Information</a></li>
                    
                </ul>
            </list>
            
            <!-- logout button to go back to home.php -->
            <div class="navfooter">
            <a href='logout.php' class='navbar-brand'>Logout</a>
            </div>
            </div>
            <hr>
        </nav>
        <main>
        <?php
                //Start session and Connect to the database
                session_start();
                require_once('connect.php');
                //Get the userID and FirstName
                $uid = $_SESSION['User_ID'];
                $name = $_SESSION['FirstName'];
                //Display the information Section
                echo '<h2>Administrator Home Page</h2>';
            ?>
        </main>
        </div>

    
</body>
</html>