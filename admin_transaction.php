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
    
    <ul>
            <label>Status: </label>
            <li>0: Pending</li>
            <li>1: Confirmed</li>
            <li>2: Finished</li>
            <li>3: Cancelled</li>
        </ul>
    <?php

    echo "<hr><h2>All Reservation Information</h2>";

    session_start();
    require_once('connect.php');

    $sql = "SELECT * FROM transaction;";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {

            // display Reservation_ID, Hotel_ID, HotelName, User_ID, UserName, FirstName, LastName, Room_ID, Room_Type, CheckIn_Date, CheckOut_Date, TotalPrice, Status
            echo "<table style='border: 1px solid black;'><tr><th>Transaction_ID</th><th>Reservation_ID</th><th>CardInfo_ID</th><th>Transaction Date</th><th>Transaction Time</th><th>Total</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $rid = $row['Reservation_ID'];
                // echo $rid;
                echo "<tr style='border: 1px solid black;'><td>" . $row["Transaction_ID"] . "</td><td>" . $row["Reservation_ID"] . "</td><td>" . $row["CardInfo_ID"] . "</td><td>" . $row["Transaction_Date"] . "</td><td>" . $row["Transaction_Time"] . "</td><td>" . $row["Total"] ."</tr>";
            }
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }


    ?>
</body>

</html>