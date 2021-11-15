<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class='container'>
        <nav class='navbar'>
            <!-- link to Admin Home Page -->
            <a href='admin_home.php' class='navbar-brand'>Admin Home</a>
            <list>
                <ul>
                    <li><a href='admin_hotel.php'>Hotel Information</a></li>
                    <li><a href='admin_userinfo.php'>User Information</a></li>
                    <li><a href='admin_reservation.php'>Reservation Information</a></li>
                    <li><a href='admin_comment.php'>User Comment</a></li>
                    <li><a href='admin_addser.php'>Additional Service</a></li>
                    <li><a href='admin_Staff.php'>Staff Information</a></li>
                </ul>
            </list>
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