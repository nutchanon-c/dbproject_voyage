<?php 
echo "Admin User information page";
session_start();
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