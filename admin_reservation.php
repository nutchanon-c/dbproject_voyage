<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        tr{
            border: 1px solid black;
        }
        td{
            border: 1px solid black;
        }
 
    </style>
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
                <li><a href='admin_comment.php'>User Comment</a></li>
                <li><a href='admin_addser.php'>Additional Service</a></li>
                <li><a href='admin_Staff.php'>Staff Information</a></li>
            </ul>
        </list>
    </nav>
    <?php

    echo "<hr><h2>All Reservation Information</h2>";

    session_start();
    require_once('connect.php');

    $sql = "SELECT *, r.status FROM user u, reservation r, room_reservation rr, room rm, hotel h WHERE r.reservation_id = rr.reservation_id AND rr.room_id = rm.room_id AND rm.hotel_id = h.hotel_id;";
    if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){

            // display Reservation_ID, Hotel_ID, HotelName, User_ID, UserName, FirstName, LastName, Room_ID, Room_Type, CheckIn_Date, CheckOut_Date, TotalPrice, Status
            echo "<table style='border: 1px solid black;'><tr><th>Reservation_ID</th><th>Hotel_ID</th><th>HotelName</th><th>User_ID</th><th>UserName</th><th>FirstName</th><th>LastName</th><th>Room_ID</th><th>Room_Type</th><th>CheckIn_Date</th><th>CheckOut_Date</th><th>TotalPrice</th><th>Status</th></tr>";
            while($row = $result->fetch_assoc()){
                $rid = $row['Reservation_ID'];
                // echo $rid;
                echo "<tr style='border: 1px solid black;'><td>".$row["Reservation_ID"]."</td><td>".$row["hotel_id"]."</td><td>".$row["HotelName"]."</td><td>".$row["User_ID"]."</td><td>".$row["Username"]."</td><td>".$row["FirstName"]."</td><td>".$row["LastName"]."</td><td>".$row["room_id"]."</td><td>".$row["Room_Type"]."</td><td>".$row["CheckIn_Date"]."</td><td>".$row["CheckOut_Date"]."</td><td>".$row["TotalPrice"]."</td><td>".$row["Status"]."</td><td><a href='edit_reservation.php?ReservationID=".$rid."'>Edit</a></td></tr>";
            }




            // echo "<table><tr><th>Reservation ID</th><th>User ID</th><th>Room ID</th><th>Hotel ID</th><th>Check In Date</th><th>Check Out Date</th><th>Room Type</th><th>Room Price</th><th>Room Quantity</th><th>Total Price</th></tr>";
            // while($row = $result->fetch_array()){
            //     echo "<tr><td>".$row['Reservation_ID']."</td><td>".$row['User_ID']."</td><td>".$row['room_id']."</td><td>".$row['hotel_id']."</td><td>".$row['CheckIn_Date']."</td><td>".$row['CheckOut_Date']."</td><td>".$row['Room_Type']."</td><td>".$row['Price']."</td><td>".$row['BedAmt']."</td><td>".$row['TotalPrice']."</td></tr>";
            // }
            // echo "</table>";
            // $result->free();
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }


    ?>
</body>

</html>