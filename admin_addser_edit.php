<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
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
            <!-- logout button to go back to home.php -->
            <a href='logout.php' class='navbar-brand'>Logout</a>
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

</body>
</html>

