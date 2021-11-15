<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addtional Services</title>
    <!-- user admincss.css -->
    <link rel="stylesheet" href="admincss.css">
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
</body>
</html>

