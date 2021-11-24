<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit Reservation</title>
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

        <div class="infoContent">

        <header class="infoheader">
        </header>
        <?php
            session_start();
            require_once('connect.php');
            $rid = $_GET['ReservationID'];
            $sql = "SELECT *, r.status FROM user u, reservation r, room_reservation rr, room rm, hotel h WHERE r.reservation_id = rr.reservation_id AND rr.room_id = rm.room_id AND rm.hotel_id = h.hotel_id AND r.reservation_ID = $rid;";
            $result = $mysqli->query($sql);
            $row = $result->fetch_array();
            // display Reservation_ID, Hotel_ID, HotelName, User_ID, FirstName, LastName, CheckIn_Date, CheckOut_Date, Room_ID, Room_Type, Status
            echo "<hr><h2>Edit Reservation Information</h2>";
            echo "<form action='edit_reservation_process.php' method='POST'>";
            echo "<input type='hidden' name='ReservationID' value='".$row['Reservation_ID']."'>";
            echo "<input type='hidden' name='RRID' value='".$row['RR_ID']."'>";
            // echo $row['RR_ID'];
            echo "<table>";
            echo "<tr><td>Reservation ID: </td><td><input type='text' name='ReservationID' value='".$row['Reservation_ID']."' disabled></td></tr>";
            echo "<tr><td>Hotel ID: </td><td><input type='text' name='HotelID' value='".$row['hotel_id']."'disabled></td></tr>";
            echo "<tr><td>Hotel Name: </td><td><input type='text' disabled name='HotelName' value='".$row['HotelName']."'disabled></td></tr>";
            echo "<tr><td>User ID: </td><td><input type='text' name='UserID' value='".$row['User_ID']."'disabled></td></tr>";
            echo "<tr><td>First Name: </td><td><input type='text' name='FirstName' value='".$row['FirstName']."'disabled></td></tr>";
            echo "<tr><td>Last Name: </td><td><input type='text' name='LastName' value='".$row['LastName']."'disabled></td></tr>";
            echo "<tr><td>Check In Date: </td><td><input type='date' name='CheckInDate' value='".$row['CheckIn_Date']."'disabled></td></tr>";
            echo "<tr><td>Check Out Date: </td><td><input type='date' name='CheckOutDate' value='".$row['CheckOut_Date']."'disabled></td></tr>";
            echo "<tr><td>Room ID: </td><td><input type='text' name='RoomID' value='".$row['room_id']."'disabled></td></tr>";
            echo "<tr><td>Room Type: </td><td><input type='text' name='RoomType' value='".$row['Room_Type']."'disabled></td></tr>";
            // make dropdown list from 0 to 3 for Status
            echo "<tr><td>Status: </td><td><select name='Status' required>";
            for ($i = 0; $i < 4; $i++) {
                if ($i == $row['status']) {
                    echo "<option value='$i' selected>$i</option>";
                } else {
                    echo "<option value='$i'>$i</option>";
                }
            }
            echo "</select></td></tr>";
            // echo "<tr><td>Status: </td><td><input type='text' name='Status' value='".$row['Status']."'></td></tr>";
            echo "<tr><td><input type='submit' value='Submit'></td></tr>";
            echo "</table>";
            echo "</form>";


        ?>

        <ul>
            <label>Status: </label>
            <li>0: Pending</li>
            <li>1: Confirmed</li>
            <li>2: Finished</li>
            <li>3: Cancelled</li>
        </ul>
        </div>
    </div>
</body>
</html>