<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit Hotel Information</title>
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
        <?php
        session_start();
        require_once('connect.php');

        // make text fields to edit information of HotelName, Tel, PostCode, District, City, Country, FullAddress, Picture, Email
        $sql = "SELECT * FROM hotel WHERE hotel_id = '".$_GET['HotelID']."'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        echo "Edit Hotel Information for Hotel ID: ".$_GET['HotelID'];
        echo "<form action='hotel_edit_finish.php' method='post'>";
        echo "<table>";
        // hidden field to pass HotelID
        echo "<input type='hidden' name='HotelID' value='".$_GET['HotelID']."'>";
        echo "<tr><td>Hotel Name:</td><td><input type='text' name='HotelName' value='".$row['HotelName']."'></td></tr>";
        echo "<tr><td>Tel:</td><td><input type='text' name='Tel' value='".$row['Tel']."'></td></tr>";
        echo "<tr><td>PostCode:</td><td><input type='text' name='PostCode' value='".$row['PostCode']."'></td></tr>";
        echo "<tr><td>District:</td><td><input type='text' name='District' value='".$row['District']."'></td></tr>";
        echo "<tr><td>City:</td><td><input type='text' name='City' value='".$row['City']."'></td></tr>";
        echo "<tr><td>Country:</td><td><input type='text' name='Country' value='".$row['Country']."'></td></tr>";
        echo "<tr><td>FullAddress:</td><td><input type='text' name='FullAddress' value='".$row['FullAddress']."'></td></tr>";
        echo "<tr><td>Picture:</td><td><input type='text' name='Picture' value='".$row['Picture']."'></td></tr>";
        echo "<tr><td>Email:</td><td><input type='text' name='Email' value='".$row['Email']."'></td></tr>";
        echo "<tr><td><input type='submit' value='Edit'></td></tr>";
        echo "</table>";
        echo "</form>";




        ?>
    </div>
</body>
</html>
