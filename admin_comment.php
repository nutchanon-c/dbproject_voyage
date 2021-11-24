<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reviews</title>
    <!-- use admincss.css -->
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
    <header class="infoheader">
                <!--This this the header Display the current information type displayed-->
                <div class="infoTopic">
                    <h1>User Comments</h1>
                </div>
                <!--This this the add information button (In case the page the function to add the information to the database)-->
 
            </header>
    <div class="infoContent">
    <?php
    session_start();
    require_once('connect.php');
    $sql = "SELECT * FROM user_review";
    // display Review_ID, User_ID, Reservation_ID, Comment, Rating, Date, Time and add DELETE button
    echo "<table>";
    echo "<tr>";
    echo "<th>Review_ID</th>";
    echo "<th>User_ID</th>";
    echo "<th>Reservation_ID</th>";
    echo "<th>Comment</th>";
    echo "<th>Rating</th>";
    echo "<th>Date</th>";
    echo "<th>Time</th>";
    echo "<th>DELETE</th>";
    echo "</tr>";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row['Review_ID'] . "</td>";
                echo "<td>" . $row['User_ID'] . "</td>";
                echo "<td>" . $row['Reservation_ID'] . "</td>";
                echo "<td>" . $row['Comment'] . "</td>";
                echo "<td>" . $row['Rating'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['Time'] . "</td>";
                echo "<td><a href='delete_review.php?Review_ID=" . $row['Review_ID'] . "'><button>DELETE</button></a></td>";
                echo "</tr>";
            }
        }
    }


    ?>
    </div>
    </main>
</div>
</body>

</html>