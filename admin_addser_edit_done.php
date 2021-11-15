<?php
    session_start();
    require_once('connect.php');
    $asid = $_POST['AS_ID'];
    $type = $_POST['AS_Name'];
    $price = $_POST['AS_Price'];

    $sql = "UPDATE additional_service SET Type = '$type', Price = '$price' WHERE AS_ID = '$asid'";
    if($mysqli->query($sql)){
        echo "Service Updated";
        header("Location: admin_addser.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }


?>