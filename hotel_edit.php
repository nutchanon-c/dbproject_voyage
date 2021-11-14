<?php
session_start();
require_once('connect.php');

// make text fields to edit information of HotelName, Tel, PostCode, District, City, Country, FullAddress, Picture, Email
$sql = "SELECT * FROM hotel WHERE hotel_id = '".$_GET['HotelID']."'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
echo "<form action='hotel_edit_finish.php' method='post'>";
echo "<table>";
// hidden field to pass HotelID
echo "<input type='hidden' name='HotelID' value='".$_GET['HotelID']."'>";
echo "<tr><td>Hotel Name:</td><td><input type='text' name='HotelName' value='".$row['HotelName']."'></td></tr>";
echo "<tr><td>Tel:</td><td><input type='text' name='Tel' value='".$row['Tel']."'></td></tr>";
echo "<tr><td>PostCode:</td><td><input type='text' name='PostCode' value='".$row['PostCode']."'></td></tr>";
echo "<tr><td>District:</td><td><input type='text' name='District' value='".$row['District']."'></td></tr>";
echo "<tr><td>City:</td><td><input type='text' name='City' value='".$row['City']."'></td></tr>";
echo "<tr><td>Country:</td><td><input type='text' name='Country' value='".$row['Country']."'></td></tr>";
echo "<tr><td>FullAddress:</td><td><input type='text' name='FullAddress' value='".$row['FullAddress']."'></td></tr>";
echo "<tr><td>Picture:</td><td><input type='text' name='Picture' value='".$row['Picture']."'></td></tr>";
echo "<tr><td>Email:</td><td><input type='text' name='Email' value='".$row['Email']."'></td></tr>";
echo "<tr><td><input type='submit' value='Edit'></td></tr>";
echo "</table>";
echo "</form>";




?>