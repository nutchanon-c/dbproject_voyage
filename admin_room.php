<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information</title>
    <!-- user admincss.css -->
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        img{
            width: 10em;
            height: 10em;
            object-fit: cover;
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
        
        <main class="infobox">
        <div class="infoTopic">
                    <h1>Hotel Information</h1>
                </div>
            <div class="infoContent">
            <?php 
                //Start session and Connect to the database
                session_start();
                require_once('connect.php');
                //The Topic of the page
                //Query the data from the hotel tables
                $q = "SELECT *, BedType AS bt  FROM room, bedtype WHERE room.BedType_ID = bedtype.BedType_ID ORDER BY hotel_id";
                
                if($result = $mysqli->query($q)){
                    while($row = $result->fetch_array()){


                        // new table layout
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Room ID</th>";
                        echo "<th>Hotel ID</th>";
                        echo "<th>Room Type</th>";
                        echo "<th>Room Description</th>";
                        echo "<th>Status</th>";
                        echo "<th>Bed Amount</th>";
                        echo "<th>Bed Type</th>";
                        echo "<th>Size</th>";
                        echo "<th>Price</th>";
                        // add edit and delete button
                        echo "<th></th>";
                        // echo "<th></th>";
                        echo "</tr>";
                        while($row = $result->fetch_array()){
                            echo "<tr>";
                            echo "<td>" . $row['room_id'] . "</td>";
                            echo "<td>" . $row['Hotel_ID'] . "</td>";
                            echo "<td>" . $row['Room_Type'] . "</td>";
                            echo "<td>" . $row['Room_Desc'] . "</td>";
                            echo "<td>" . $row['Status'] . "</td>";
                            echo "<td>" . $row['BedAmt'] . "</td>";
                            echo "<td>" . $row['bt'] . "</td>";
                            echo "<td>" . $row['Size'] . "</td>";
                            echo "<td>" . $row['Price'] . "</td>";
                            
                            // add edit and delete button
                            echo "<td><a href='room_edit.php?RoomID=".$row['room_id']."'><button>Edit</button></a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        
                        // "Add New Hotel" button links to add_hotel.php
                        echo "<a href='add_room.php'><button>Add New Room</button></a>";


                        

                    }
                
                }
                else{
                    echo "Wrong coding nibba";
                }

            ?>
            </div>
        </main>
    </div>
</body>
</html>
