<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addtional Services</title>
    <!-- user admincss.css -->
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
                    <h1>Additional Services</h1>
                </div>
                <!--This this the add information button (In case the page the function to add the information to the database)-->
 
            </header>
    <div class="infoContent">
        <?php
            session_start();
            require_once('connect.php');
            $sql = "SELECT * FROM additional_service";
            if($result = $mysqli->query($sql)){
                if($result->num_rows > 0){
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Service ID</th>";
                    echo "<th>Service Name</th>";
                    echo "<th>Service Price</th>";
                    // add edit and delete button
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "</tr>";
                    while($row = $result->fetch_array()){
                        echo "<tr>";
                        echo "<td>" . $row['AS_ID'] . "</td>";
                        echo "<td>" . $row['Type'] . "</td>";
                        echo "<td>" . $row['Price'] . "</td>";
                        // add edit and delete button
                        echo "<td><a href='admin_addser_edit.php?AS_ID=".$row['AS_ID']."'><button>Edit</button></a></td>";
                        echo "<td><a href='admin_addser_delete.php?AS_ID=".$row['AS_ID']."'><button>Delete</button></a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            // add new service a tag
            echo "<a href='admin_addser_add.php'><button>Add New Service</button></a>";



        ?>
    </div>
    </main>
</div>
</body>
</html>

