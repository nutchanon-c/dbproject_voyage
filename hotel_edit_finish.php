<?php
session_start();
require_once('connect.php');
// update table Hotel from the POST data. Update the values HotelName, Tel, PostCode, District, City, Country, FullAddress, Picture, Email
$sql = "UPDATE Hotel SET HotelName = '$_POST[HotelName]', Tel = '$_POST[Tel]', PostCode = '$_POST[PostCode]', District = '$_POST[District]', City = '$_POST[City]', Country = '$_POST[Country]', FullAddress = '$_POST[FullAddress]', Picture = '$_POST[Picture]', Email = '$_POST[Email]' WHERE Hotel_ID = '$_POST[HotelID]'";
$result = $mysqli -> query($sql);
if($result){
    echo "Update Successful";
    // add button to go back to admin_hotel.php
    // echo "<form action='admin_hotel.php' method='post'>";
    header("Location: hotel_edit_success_msg.php");
}
else{
    echo "Update Failed";
    // echo fail message
    echo "error: " . $sql . "<br>" . $mysqli -> error;
}

?>