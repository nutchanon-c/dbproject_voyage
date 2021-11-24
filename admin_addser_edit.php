<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit Service</title>
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
        $asid = $_GET['AS_ID'];
        $sql = "SELECT * FROM additional_service WHERE AS_ID = '$asid'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_array();

        echo "<form action='admin_addser_edit_done.php' method='POST'>";
        // hidden input AS_ID
        echo "<input type='hidden' name='AS_ID' value='$asid'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Service ID: </td>";
        echo "<td><input type='text' name='AS_ID' value='".$row['AS_ID']."' disabled></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Service Name: </td>";
        echo "<td><input type='text' name='AS_Name' value='".$row['Type']."'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Service Price: </td>";
        echo "<td><input type='text' name='AS_Price' value='".$row['Price']."'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><input type='submit' value='Submit'></td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";

        

        ?>
    </div>
</body>
</html>

