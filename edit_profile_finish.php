<?php
session_start();
require_once('connect.php');
// get data from POST and update the database where user_id = $user_id
$user_id = $_POST['UserID'];

// get Password, FirstName, LastName, Email, Tel, DOB,  Role from the form
$password = $_POST['Password'];
$first_name = $_POST['FirstName'];
$last_name = $_POST['LastName'];
$email = $_POST['Email'];
$tel = $_POST['Tel'];
$dob = $_POST['DOB'];
$role = 0;
$gender = $_POST['gender'];

// update the user table with the new data
$sql = "UPDATE user SET Password = '$password', FirstName = '$first_name', LastName = '$last_name', Email = '$email', Tel = '$tel', DOB = '$dob', Role = $role, Gender = '$gender' WHERE user_id = '$user_id'";
$result = $mysqli -> query($sql);
if($result){
    echo "Update Successful";
    $_SESSION['FirstName'] = $first_name;
    // add button to go back to admin_hotel.php
    // echo "<form action='admin_hotel.php' method='post'>";
    header("Location: profile.php?signin=69");
}
else{
    echo "Update Failed";
    // echo fail message
    echo "error: " . $sql . "<br>" . $mysqli -> error;
}





?>