<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reservation Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        tr {
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
        }
    </style>
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
    <main class="infobox">
    <header class="infoheader">
                <!--This this the header Display the current information type displayed-->
                <div class="infoTopic">
                    <h1>Reservation Information</h1>
                </div>
                <!--This this the add information button (In case the page the function to add the information to the database)-->
 
            </header>
    <div class="infoContent">
    <ul>
            <label>Status: </label>
            <li>0: Pending</li>
            <li>1: Confirmed</li>
            <li>2: Finished</li>
            <li>3: Cancelled</li>
        </ul>

    <?php

    // echo "<hr><h2>All Reservation Information</h2>";

    session_start();
    require_once('connect.php');

    $sql = "SELECT *, r.status AS resStatus FROM user u, reservation r, room_reservation rr, room rm, hotel h WHERE r.reservation_id = rr.reservation_id AND rr.room_id = rm.room_id AND rm.hotel_id = h.hotel_id AND r.user_id = u.user_id ORDER BY r.reservation_id;";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {

            // display Reservation_ID, Hotel_ID, HotelName, User_ID, UserName, FirstName, LastName, Room_ID, Room_Type, CheckIn_Date, CheckOut_Date, TotalPrice, Status
            echo "<table style='border: 1px solid black;'><tr><th>Reservation_ID</th><th>Hotel_ID</th><th>HotelName</th><th>User_ID</th><th>UserName</th><th>FirstName</th><th>LastName</th><th>Room_ID</th><th>Room_Type</th><th>CheckIn_Date</th><th>CheckOut_Date</th><th>TotalPrice</th><th>Status</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $rid = $row['Reservation_ID'];
                // echo $rid;
                echo "<tr style='border: 1px solid black;'><td>" . $row["Reservation_ID"] . "</td><td>" . $row["hotel_id"] . "</td><td>" . $row["HotelName"] . "</td><td>" . $row["User_ID"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>" . $row["room_id"] . "</td><td>" . $row["Room_Type"] . "</td><td>" . $row["CheckIn_Date"] . "</td><td>" . $row["CheckOut_Date"] . "</td><td>" . $row["TotalPrice"] . "</td><td>" . $row["resStatus"] . "</td><td><a href='edit_reservation.php?ReservationID=" . $rid . "'>Edit</a></td></tr>";
            }
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }


    ?>
    </div>
    </main>
    </div>
</body>

</html>