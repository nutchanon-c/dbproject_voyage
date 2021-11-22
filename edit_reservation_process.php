<?php
    session_start();
    require_once('connect.php');
    $rrid = $_POST['RRID'];
    $rid = $_POST['ReservationID'];

    
    // if POST status = 1, set $st = 1, else set $st = 0
    if($_POST['Status'] == '1'){
        $st = 1;
    }
    else{
        $st = 0;
    }
    $res = $_POST['Status'];

    // echo $st;
    // echo "<br>";
    // echo $rrid;
    $sql = "UPDATE room SET Status = '$st' WHERE room_id = (SELECT room_id FROM room_reservation WHERE RR_ID = $rrid);";
    if($mysqli->query($sql)){
        echo "Room Status Updated";
        $sql = "UPDATE reservation SET status = $res WHERE `Reservation_ID` = $rid";
        if($mysqli->query($sql)){
            echo "Reservation Status Updated";
            header("Location: admin_reservation.php");
        }
        else{
            echo "Error updating record: " . $mysqli->error;
        }
    }
    else{
        echo "Error updating record: " . $mysqli->error;
    }




?>