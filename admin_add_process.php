<?php
    session_start();
    require_once('connect.php');
    $role = 1;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO user (Username, Password, FirstName, LastName, Email, Address, Tel, DOB, Gender, Role) VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$address', '$tel', '$dob', '$gender', $role);";
    if($mysqli->query($sql)){
        echo "Admin Added";
        header("Location: admin_Staff.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

?>