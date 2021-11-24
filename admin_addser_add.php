<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- use admincss.css -->
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Service</title>
</head>
<body>
<nav class='navbar'>
            <!-- link to Admin Home Page -->
            <a href='admin_home.php' class='navbar-brand'>Admin Home</a>
            <list>
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
            <a href='logout.php' class='navbar-brand'>Logout</a>
            <hr>
        </nav>
        <?php
        session_start();
        require_once('connect.php');
        // create form to type in Service Name and Service Price
        echo "<form action='admin_addser_add_process.php' method='post'>";
        echo "<h2>Add New Service</h2>";
        echo "<label for='service_name'>Service Name:</label>";
        echo "<input type='text' name='service_name' id='service_name' required>";
        echo "<br>";
        echo "<label for='service_price'>Service Price:</label>";
        echo "<input type='text' name='service_price' id='service_price' required>";
        echo "<input type='submit' value='Add Service'>";
        echo "</form>";


        

        ?>

</body>
</html>

