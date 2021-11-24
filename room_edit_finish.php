<?php
session_start();
require_once('connect.php');

$roomid = $_POST['RoomID'];
$hotelid = $_POST['Hotel_ID'];
$roomtype = $_POST['Room_Type'];
$roomdesc = $_POST['Room_Desc'];
$status = $_POST['Status'];
$bedamt = $_POST['BedAmt'];
$size = $_POST['Size'];
$price = $_POST['Price'];

$sql = "UPDATE room SET Hotel_ID = '$hotelid', Room_Type = '$roomtype', Room_Desc = '$roomdesc', Status = '$status', BedAmt = '$bedamt', Size = '$size', Price = '$price' WHERE Room_ID = '$roomid'";
if($mysqli->query($sql) === TRUE){
    echo "Record updated successfully";
    header("location: admin_room.php");
} else {
    echo "Error updating record: " . $mysqli->error;
}


?>