<?php
session_start();
require_once('connect.php');


$hotelid = $_POST['Hotel_ID'];
$roomtype = $_POST['Room_Type'];
$roomdesc = $_POST['Room_Desc'];
$status = $_POST['Status'];
$bedamt = $_POST['BedAmt'];
$size = $_POST['Size'];
$price = $_POST['Price'];
$bedtypeid = $_POST['BedType_ID'];

$sql = "INSERT INTO room (Hotel_ID, Room_Type, Room_Desc, Status, BedAmt, Size, Price, BedType_ID) VALUES ( '$hotelid', '$roomtype', '$roomdesc', '$status', '$bedamt', '$size', '$price', '$bedtypeid')";
if($mysqli->query($sql) === TRUE){
    echo "Record updated successfully";
    header("location: admin_room.php");
} else {
    echo "Error updating record: " . $mysqli->error;
}


?>