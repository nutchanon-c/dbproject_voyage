<?php
session_start();
require_once('connect.php');
$asid = $_GET['AS_ID'];

$sql = "DELETE FROM additional_service WHERE AS_ID = $asid";
if($mysqli->query($sql)){
    echo "Service Deleted";
    header("Location: admin_addser.php");
}
else{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


?>