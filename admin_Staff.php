<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- user admincss.css -->
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Staff Information</title>
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
            <hr>
        </nav>

        <h2>Staff (Admin) Information</h2>

        <?php

        session_start();
        require_once('connect.php');
        $sql = "SELECT * FROM user WHERE role = 1";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){
                echo "<table>";
                echo "<tr>";
                echo "<th>Staff ID</th>";
                // First Name, Last Name, Email, Address, Tel, DOB
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Email</th>";
                echo "<th>Address</th>";
                echo "<th>Tel</th>";
                echo "<th>DOB</th>";
                echo "<th>Gender</th>";
                // add edit and delete button
                echo "<th>Edit</th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo "<td>".$row['user_id']."</td>";
                    echo "<td>".$row['FirstName']."</td>";
                    echo "<td>".$row['LastName']."</td>";
                    echo "<td>".$row['Email']."</td>";
                    echo "<td>".$row['Address']."</td>";
                    echo "<td>".$row['Tel']."</td>";
                    echo "<td>".$row['DOB']."</td>";
                    echo "<td>".$row['Gender']."</td>";
                    // add edit button
                    echo "<td><a href='user_edit.php?UserID=".$row['user_id']."'><button>Edit</button></a></td>";
                    // add delete button
                    // echo "<td><a href='user_delete.php?UserID=".$row['user_id']."'><button>Delete</button></a></td>";
                }
                echo "</table>";
            }
        }

        // add new staff button
        echo "<a href='admin_add.php'><button>Add New Staff</button></a>";

                

        
        ?>
</body>
</html>
