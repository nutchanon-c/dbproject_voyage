<?php

session_start();
require_once('connect.php');

$hotelName = $_POST['hotel_name'];
$tel = $_POST['tel'];
$post = $_POST['postcode'];
$district = $_POST['district'];
$city = $_POST['city'];
$country = $_POST['country'];
$fullAddress = $_POST['fulladdress'];
$email = $_POST['email'];
$picture = $_POST['picture'];
$rt = 0;
$sql = "INSERT INTO hotel (HotelName, Tel, PostCode, District, City, Country, FullAddress, Picture, Rating, Email) VALUES('$hotelName', '$tel', '$post', '$district', '$city', '$country', '$fullAddress', '$picture', '$rt', '$email')";
if($mysqli -> query($sql) === TRUE){
    echo "New record created successfully";
    header('Location: admin_hotel.php');
} else {
    echo "Error: " . $sql . "<br>" . $mysqli -> error;
}

?>