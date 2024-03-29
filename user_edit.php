<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit User Information</title>
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
        <div class="infoContent">
        <header class="infoheader">
        </header>
        <?php
        session_start();
        require_once('connect.php');

        // make text fields to edit information of Password, FirstName, LastName, Email, Address, Tel, DOB, Gender, Role
        $sql = "SELECT * FROM user WHERE user_id = '".$_GET['UserID']."'";
        $result = $mysqli -> query($sql);
        $row = $result->fetch_assoc();
        echo "Edit User Information";
        echo "<form action='user_edit_finish.php' method='post'>";
        echo "<table>";
        echo "<input type='hidden' name='UserID' value='".$_GET['UserID']."'>";
        // echo user id
        echo "<tr><td>User ID:</td><td><input type='text' name='UserID' value='".$row['user_id']."' disabled></td></tr>";
        // echo username
        echo "<tr><td>Username:</td><td><input type='text' name='Username' value='".$row['Username']."' disabled></td></tr>";
        echo "<tr><td>Password:</td><td><input type='text' name='Password' value='".$row['Password']."'></td></tr>";
        // echo FirstName
        echo "<tr><td>First Name:</td><td><input type='text' name='FirstName' value='".$row['FirstName']."'></td></tr>";
        // echo LastName
        echo "<tr><td>Last Name:</td><td><input type='text' name='LastName' value='".$row['LastName']."'></td></tr>";
        // echo Email
        echo "<tr><td>Email:</td><td><input type='text' name='Email' value='".$row['Email']."'></td></tr>";
        // echo Address
        echo "<tr><td>Address:</td><td><input type='text' name='Address' value='".$row['Address']."'></td></tr>";
        // echo Tel
        echo "<tr><td>Tel:</td><td><input type='text' name='Tel' value='".$row['Tel']."'></td></tr>";
        // echo DOB
        echo "<tr><td>DOB:</td><td><input type='date' name='DOB' value='".$row['DOB']."'></td></tr>";

        // make a select box to choose Gender
        echo '
        <tr><td>
        Gender:</td><td>
        <select name="gender" required>
            <option value="none" selected disabled>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        </td></tr>
        ';


        // make a select box to choose between 0 and 1 for Role. 0 for user, 1 for admin
        echo "<tr><td>Role:</td><td><select name='Role'>";
        if ($row['Role'] == 0) {
            echo "<option value='0' selected>User</option>";
            echo "<option value='1'>Admin</option>";
        } else {
            echo "<option value='0'>User</option>";
            echo "<option value='1' selected>Admin</option>";
        }

        echo "</table>";
        // submit button
        echo "<input type='submit' value='Edit'>";
        echo "</form>";





        ?>
        </div>
    </div>
</body>
</html>
