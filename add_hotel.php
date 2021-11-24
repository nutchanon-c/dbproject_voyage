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
    <div class="container">
    <nav class="navbar">
            <!--This is a ApeTech logo section-->
            <div class="navhead">
                <div class="cir">
                    <!--This is the circle around the logo-->
                    <img src="./assets/logo.png" alt="ApeTech">
                    <!--This is the ApeTech logo itself-->
                </div>
            </div>
            <!--This is a nav hyperlink list section-->
            <div class="navmenu">
                <list class="Llink">
                    <ul class="Plink">
                        <li class="bullet"><a href="admin_hotel.php">Hotel Information</a></li>
                        <li class="bullet"><a href="admin_room.php">Room Information</a></li>
                        <li class="bullet"><a href='admin_userinfo.php'>User Information</a></li>
                        <li class="bullet"><a href='admin_reservation.php'>Reservation Information</a></li>
                        <li class="bullet"><a href='admin_transaction.php'>Transaction Information</a></li>
                        <li class="bullet"><a href='admin_comment.php'>User Comment</a></li>
                        <li class="bullet"><a href='admin_addser.php'>Additional Service</a></li>
                        <li class="bullet"><a href='admin_Staff.php'>Staff Information</a></li>
                    </ul>
                </list>
                <div class="navfooter">
                    <a href="logout.php" class="signout">Signout</a>
                </div>
            </div>
        </nav>
        
        <div class="infoContent">
        <?php
        session_start();
        require_once('connect.php');
        // create form to type in Service Name and Service Price
        echo "<form action='admin_addhotel_add_process.php' method='post' style='display: flex; flex-direction: column; justify-content:center; align-items:center;'>";
        echo "<h2>Add New Hotel</h2>";
        // form to add HotelName, Tel, PostCode, District, City, Country, FullAddress, Picture, Rating, Email
        echo "<label for='hotel_name'>Hotel Name:</label>";
        echo "<input type='text' name='hotel_name' id='hotel_name' required>";
        echo "<label for='tel'>Tel:</label>";
        echo "<input type='text' name='tel' id='tel' required>";
        echo "<label for='postcode'>Postcode:</label>";
        echo "<input type='text' name='postcode' id='postcode' required>";
        echo "<label for='district'>District:</label>";
        echo "<input type='text' name='district' id='district' required>";
        echo "<label for='city'>City:</label>";
        echo "<input type='text' name='city' id='city' required>";
        echo "<label for='country'>Country:</label>";
        echo "<input type='text' name='country' id='country' required>";
        echo "<label for='fulladdress'>Full Address:</label>";
        echo "<input type='text' name='fulladdress' id='fulladdress' required>";
        echo "<label for='picture'>Picture (file name):</label>";
        echo "<input type='text' name='picture' id='picture' required>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='text' name='email' id='email' required>";
        echo "<input type='submit' value='Add'>";
        echo "</form>";



        

        ?>
        </div>
    </div>
</body>
</html>

