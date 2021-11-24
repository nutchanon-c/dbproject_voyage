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
    <title>User Information</title>
</head>
<body>
<div class="container">
        <!-- This is the left navbar of the page-->
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
        <!-- This is the main information display section-->
        <main class="infobox">
        
        <?php
                //Start session and Connect to the database
                session_start();
                require_once('connect.php');
                //Get the userID and FirstName
                $uid = $_SESSION['User_ID'];
                $name = $_SESSION['FirstName'];
                //Display the information Section
            ?>
            <!--This is the header of the information display box-->
            <header class="infoheader">
                <!--This this the header Display the current information type displayed-->
                <div class="infoTopic">
                    <h1>User Information</h1>
                </div>
                <!--This this the add information button (In case the page the function to add the information to the database)-->
 
            </header>
            <!--This is the information content section-->
            <div class="infoContent">
            <?php 

// session_start();
require_once('connect.php');

// select * from user
$sql = "SELECT * FROM user";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
        // display user_id, Username, Password, FirstName, LastName, Email, Address, Tel, DOB, Gender, Role of each user into a table


        echo "<table border='1'><tr></td><td><b>User ID:</b> ".$row['user_id']."<br><b>Username:</b> ".$row['Username']."<br><b>Password:</b> ".$row['Password']."<br><b>First Name:</b> ".$row['FirstName']."<br><b>Last Name:</b> ".$row['LastName']."<br><b>Email:</b> ".$row['Email']."<br><b>Address:</b> ".$row['Address']."<br><b>Tel:</b> ".$row['Tel']."<br><b>DOB:</b> ".$row['DOB']."<br><b>Gender:</b> ".$row['Gender']."<br><b>Role:</b> ".$row['Role']."</td></tr></table>";
        // add edit button
        echo "<a href='user_edit.php?UserID=".$row['user_id']."'><button>Edit</button></a>";
    }
} else {
    echo "0 results";
}


?>
            </div>

        </main>

    </div>

</body>
</html>
