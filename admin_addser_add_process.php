<?php
    session_start();
    require_once('connect.php');
    $sname = $_POST['service_name'];
    $sprice = $_POST['service_price'];

    $sql = "INSERT INTO additional_service (Type, Price) VALUES ('$sname', '$sprice')";
    if($mysqli->query($sql)){
        echo "Service Added";
        header("Location: admin_addser.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

?>