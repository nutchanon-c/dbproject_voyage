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
        <header class="infoheader">
        </header>
        <?php
        session_start();
        require_once('connect.php');

        // make text fields to edit information of HotelName, Tel, PostCode, District, City, Country, FullAddress, Picture, Email
        $sql = "SELECT * FROM room WHERE room_id = '".$_GET['RoomID']."'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        echo "Edit Room Information for Room ID: ".$_GET['RoomID'];
        echo "<form action='room_edit_finish.php' method='post'>";
        echo "<table>";
        // hidden field to pass HotelID
        echo "<input type='hidden' name='RoomID' value='".$_GET['RoomID']."'>";
        echo "<tr><td>Hotel ID:</td><td><input type='text' name='Hotel ID' value='".$row['Hotel_ID']."'></td></tr>";
        echo "<tr><td>Room Type:</td><td><input type='text' name='Room_Type' value='".$row['Room_Type']."'></td></tr>";
        echo "<tr><td>Room Description:</td><td><input type='text' name='Room_Desc' value='".$row['Room_Desc']."'></td></tr>";
        echo "<tr><td>Status:</td><td><input type='number' name='Status' value='".$row['Status']."'></td></tr>";
        echo "<tr><td>Bed Amount:</td><td><input type='number' name='BedAmt' value='".$row['BedAmt']."'></td></tr>";
        echo "<tr><td>BedType ID:</td><td><input type='number' name='BedType_ID' value='".$row['BedType_ID']."'></td></tr>";
        echo "<tr><td>Size:</td><td><input type='number' name='Size' value='".$row['Size']."'></td></tr>";
        echo "<tr><td>Price:</td><td><input type='text' name='Price' value='".$row['Price']."'></td></tr>";
        echo "<tr><td><input type='submit' value='Edit'></td></tr>";
        echo "</table>";
        echo "</form>";

        $sql1 = "SELECT * from BedType;";
        if($result1 = $mysqli->query($sql1)){
           echo "<table>";
           echo "<tr><td>BedType ID</td><td>BedType</td></tr>";
            while($row = $result1->fetch_array()){
                
                // display BedType_ID and BedType
                echo "<tr><td>".$row['BedType_ID']."</td><td>".$row['BedType']."</td></tr>";
                
            }
           echo "</table>";
        }
        else{
            echo "Error: ".$mysqli->error;
        }
        


        ?>
        </div>
    </div>
</body>
</html>
